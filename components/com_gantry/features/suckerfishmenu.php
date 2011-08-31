<?php
/**
 * @package     gantry
 * @subpackage  features
 * @version		3.0.3 June 12, 2010
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
class GantryFeatureSuckerFishMenu extends GantryFeature {
    var $_feature_name = 'suckerfishmenu';
    var $_feature_prefix = 'menu-type';
	
	function init() {
		global $gantry;
		$gantry->addStyle('suckerfish.css');
		$gantry->addScript('gantry-ie6menu.js');
	}

    function isEnabled() {
        global $gantry;
        $menu_enabled = $gantry->get('menu-enabled');
        $selected_menu = $gantry->get($this->_feature_prefix);
        if (1 == (int)$menu_enabled && $selected_menu == $this->_feature_name) return true;
        return false;
    }
	function isOrderable(){
		return false;
	}
	

	function render($position="") {
        global $gantry;

        $renderer	= $gantry->document->loadRenderer('module');
        $options	 = array( 'style' => "raw" );
        $module	 = JModuleHelper::getModule( 'mod_roknavmenu' );

        $params = $gantry->getParams($this->_feature_prefix."-".$this->_feature_name, true);
        $module->params = '';
        foreach($params as $param_name => $param_value){
            $module->params .=  $param_name."=". $param_value['value']."\n";
        }
        $rendered_menu = $renderer->render( $module, $options );
		return $rendered_menu;
	}
}