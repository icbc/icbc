<?php
/**
 * @package     gantry
 * @subpackage  features
 * @version		1.5.3 June 14, 2010
 * @author		RocketTheme http://www.rockettheme.com
 * @copyright 	Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */

defined('JPATH_BASE') or die();

gantry_import('core.gantryfeature');


/**
 * @package     gantry
 * @subpackage  features
 */
class GantryFeatureSplitMenu extends GantryFeature {
    var $_feature_name = 'splitmenu';
    var $_feature_prefix = 'menu-type';

	function init() {
		global $gantry;
		$gantry->addStyle('splitmenu.css');
		
		if ($this->get('navbar-pill-enabled') || $this->get('topbar-pill-enabled')) $gantry->addScript('gantry-pillanim.js');
	}

    function isEnabled() {
        global $gantry;
        $menu_enabled = $gantry->get('menu-enabled');
        $selected_menu = $gantry->get($this->_feature_prefix);
        if (1 == (int)$menu_enabled && $selected_menu == $this->_feature_name) return true;
        return false;
    }

    function isInPosition($position){
        if ($this->get('mainmenu-position') == $position || $this->get('submenu-position') == $position || $this->get('sidemenu-position') == $position) return true;
        return false;
    }
	function isOrderable(){
		return false;
	}
	

	function render($position="") {
        global $gantry;
        $output='';
        $renderer	= $gantry->document->loadRenderer('module');
        $options	 = array( 'style' => "raw" );

        $group_params_str = '';
        $params=array();
        $group_params = $gantry->getParams($this->_feature_prefix."-".$this->_feature_name, true);

		$browser = $gantry->browser->name;
		$browser_version = $gantry->browser->version;
		$isIE6 = ($browser == "ie" && $browser_version == "6");
       

        foreach($group_params as $param_name => $param_value){
            $group_params_str .=  $param_name."=". $param_value['value']."\n";
        }

        if($position == $this->get('mainmenu-position')) {
            $params = $gantry->getParams($this->_feature_prefix."-".$this->_feature_name."-mainmenu", true);
            $module	 = JModuleHelper::getModule( 'mod_roknavmenu' );
            $module->params = '';
            foreach($params as $param_name => $param_value){
                $module->params .=  $param_name."=". $param_value['value']."\n";
            }
            $module->params .= $group_params_str;

			if (!$this->get('topbar-pill-enabled')) $output .= "<div class='nopill'>" . $renderer->render( $module, $options ) . "</div>";
			else {
				$output .= $renderer->render( $module, $options );
				$gantry->addInlineScript("window.addEvent('domready', function() {new GantryPill('ul.menutop', {duration: ".$this->get('topbar-pill-duration').", transition: Fx.Transitions.".$this->get('topbar-pill-animation').", color: false})});");
			}
			
        }

        if ($position == $this->get('submenu-position')) {
            $params = $gantry->getParams($this->_feature_prefix."-".$this->_feature_name."-submenu", true);
            $module	 = JModuleHelper::getModule( 'mod_roknavmenu' );
            $module->params = '';
            foreach($params as $param_name => $param_value){
                $module->params .=  $param_name."=". $param_value['value']."\n";
            }
            $module->params .= $group_params_str;
			$render = $renderer->render( $module, $options );
			
			if (!$this->get('navbar-pill-enabled') && strlen($render) > 0) $output .= "<div class='nopill'>" . $render . "</div>";
			else if (!$this->get('navbar-pill-enabled') && !strlen($render)) $output .= $render;
			else {
				$output .= $render;
				$gantry->addInlineScript("window.addEvent('domready', function() {new GantryPill('#rt-submenu2', {duration: ".$this->get('navbar-pill-duration').", transition: Fx.Transitions.".$this->get('navbar-pill-animation').", color: '".$gantry->get('linkcolor')."'})});");
			}

        }
        
        if ($position == $this->get('sidemenu-position')) {
            $params = $gantry->getParams($this->_feature_prefix."-".$this->_feature_name."-sidemenu", true);
        	$options = array( 'style' => "sidemenu");
            $module	 = JModuleHelper::getModule( 'mod_roknavmenu' );
            $module->params = '';
            foreach($params as $param_name => $param_value){
                $module->params .=  $param_name."=". $param_value['value']."\n";
            }
           
            $module->params .= $group_params_str;
            $output .= $renderer->render( $module, $options );
        }
        
		return $output;
	}
}