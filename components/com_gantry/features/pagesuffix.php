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
class GantryFeaturePageSuffix extends GantryFeature {

    var $_feature_name = 'pagesuffix';

    function isInPosition($position) {
        return false;
    }
    
	function init() {
        global $gantry;

		$menus = &JSite::getMenu();
		$menu = $menus->getActive();
		$pageclass = "";
		
		if (is_object( $menu )) { 
			$params = new JParameter( $menu->params );
			$pageclass = $params->get( 'pageclass_sfx' );
			$gantry->addBodyClass($pageclass);
		}

	}
}