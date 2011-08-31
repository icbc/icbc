<?php
/**
 * @package   gantry
 * @subpackage core
 * @version   3.0.3 June 12, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('GANTRY_VERSION') or die();

/**
 * @package   gantry
 * @subpackage core
 */
class GantryDiagnostic {
	
	var $errors = array();
	var $customFolder = false;
	
	function checks() {
		
		$this->templatePerms();
		$this->getAjaxClient();
		$this->getAjaxAdmin();
		$this->customParamsPerms();
		$this->customPresetsPerms();
		$this->variablesCheck();
		
		return $this->errors;		
	}
	
	function templatePerms() {
		global $gantry;
		
		$folder = str_replace($gantry->basePath . DS, "", $gantry->templatePath);
		
		$output = "";
		
		if (!is_writable($gantry->templatePath)) {
			$output .= "<div class='detail'>";
			$output .= "Folder <span>" . $folder . "</span> is not writeable.";
			$output .= "</div>";
			
			$this->errors[] = $output;
		}
		
		return $output;
	}
	
	function getAjaxClient() {
		global $gantry;
		
		$ajax_file = $gantry->templatePath . DS . 'gantry-ajax.php';
		$short_file = str_replace($gantry->basePath . DS, "", $ajax_file);
		$folder = str_replace($gantry->basePath . DS, "", $gantry->templatePath);
		
		$output = "";
		
		if (is_writable($gantry->templatePath) && !file_exists($ajax_file)) {
			$output .= "<div class='detail'>";
			$output .= "File <span>" . $short_file . "</span> is missing.";
			$output .= "</div>";
			
			$this->errors[] = $output;
		}
		
		return $output;
	}
	
	function getAjaxAdmin() {
		global $gantry;
		
		$folder = $gantry->basePath . DS . 'administrator/templates/system/';
		$ajax_file = $folder . 'gantry-ajax-admin.php';
		$short_file = str_replace($gantry->basePath . DS, "", $ajax_file);
		$short_folder = str_replace($gantry->basePath . DS, "", $folder);
		
		$output = "";
		
		if (!is_writable($folder)) {
			$output .= "<div class='detail'>";
			$output .= "Folder <span>" . $short_folder . "</span> is not writeable.";
			$output .= "</div>";
			
			$this->errors[] = $output;
		} else if (!file_exists($ajax_file)) {
			$output .= "<div class='detail'>";
			$output .= "File <span>" . $short_file . "</span> is missing.";
			$output .= "</div>";
			
			$this->errors[] = $output;
		}
		
		return $output;
	}
	
	function paramsPerms() {
		global $gantry;
		
		$params = $gantry->templatePath . DS . 'params.ini';
		$short_file = str_replace($gantry->basePath . DS, "", $params);
		$folder = str_replace($gantry->basePath . DS, "", $gantry->templatePath);
		
		$output = "";
		
		if (!is_writable($params)) {
			$output .= "<div class='detail'>";
			$output .= "File <span>" . $short_file . "</span> is not writeable";
			$output .= "</div>";
			
			$this->errors[] = $output;
		}
		
		return $output;
	}
	
	function customParamsPerms() {
		global $gantry;
		
		$custom = $gantry->custom_dir;
		$params = $gantry->custom_menuitemparams_dir;
		
		$short_custom = str_replace($gantry->basePath . DS, "", $custom);
		$short_folder = str_replace($gantry->basePath . DS, "", $params);
		$folder = str_replace($gantry->basePath . DS, "", $gantry->templatePath);
		
		$output = "";
		
		if (!file_exists($custom) && !$this->customFolder) {
			$output .= "<div class='detail'>";
			$output .= "Folder <span>" . $short_custom . "</span> doesn't exist.";
			$output .= "</div>";
			$this->customFolder = true;
			
			$this->errors[] = $output;
		} else if (!is_writable($custom) && !$this->customFolder) {
			$output .= "<div class='detail'>";
			$output .= "Folder <span>" . $short_custom . "</span> is not writable.";
			$output .= "</div>";
			$this->customFolder = true;
			
			$this->errors[] = $output;
 		} else if (!file_exists($params)) {
			$output .= "<div class='detail'>";
			$output .= "Folder <span>" . $short_folder . "</span> doesn't exist.";
			$output .= "</div>";
			
			$this->errors[] = $output;
		} else if (!is_writable($params)) {
			$output .= "<div class='detail'>";
			$output .= "Folder <span>" . $short_folder . "</span> is not writable.";
			$output .= "</div>";
			
			$this->errors[] = $output;
		}
		
		return $output;
	}
	
	function customPresetsPerms() {
		global $gantry;
		
		$custom = $gantry->custom_dir;
		$presets = $gantry->custom_presets_file;
		
		$short_custom = str_replace($gantry->basePath . DS, "", $custom);
		$short_file = str_replace($gantry->basePath . DS, "", $presets);
		
		$folder = str_replace($gantry->basePath . DS, "", $gantry->templatePath);
		
		$output = "";
		
		if (!file_exists($custom) && !$this->customFolder) {
			$output .= "<div class='detail'>";
			$output .= "Folder <span>" . $short_custom . "</span> doesn't exist.";
			$output .= "</div>";
			$this->custommFolder = true;
			
			$this->errors[] = $output;
		} else if (!is_writable($custom) && !$this->customFolder) {
			$output .= "<div class='detail'>";
			$output .= "Folder <span>" . $short_custom . "</span> is not writable.";
			$output .= "</div>";
			$this->customFolder = true;
			
			$this->errors[] = $output;
 		} else if (file_exists($presets) && !is_writable($presets)) {
			$output .= "<div class='detail'>";
			$output .= "File <span>" . $short_file . "</span> is not writable.";
			$output .= "</div>";
			
			$this->errors[] = $output;
		}
		
		return $output;
	}
	
	function variablesCheck() {
		global $gantry;
		$checks = array();
		
		$list = array(
			'grid' => $gantry->grid, 
			'layoutSchemas' => $gantry->layoutSchemas, 
			'mainbodySchemas' => $gantry->mainbodySchemas, 
			'pushPullSchemas' => $gantry->pushPullSchemas, 
			'mainbodySchemasCombos' => $gantry->mainbodySchemasCombos
		);
		
		foreach($list as $key => $entry) {
			if (!isset($entry)) $checks[] = "Variable <span>" . $key . "</span> is not set.";
		}
		
		$output = "";
		foreach($checks as $check) {
			$output .= "<div class='detail'>";
			$output .= $check;
			$output .= "</div>";
		}
		
		if (!defined('GANTRY_VERSION')) {
			$output .= "<div class='detail'>";
			$output .= "Constant <span>GANTRY_VERSION</span> is not defined.";
			$output .= "</div>";
		}
		
		return $output;
		
	}
	
}