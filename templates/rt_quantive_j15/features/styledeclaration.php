<?php
/**
 * @package		Gantry Template Framework - RocketTheme
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

class GantryFeatureStyleDeclaration extends GantryFeature {
    var $_feature_name = 'styledeclaration';

    function isEnabled() {
        global $gantry;
        $menu_enabled = $this->get('enabled');

        if (1 == (int)$menu_enabled) return true;
        return false;
    }

	function init() {
        global $gantry;

		//inline css for dynamic stuff
		$css = '#rt-main-surround ul.menu li.active > a, #rt-main-surround ul.menu li.active > .separator, #rt-main-surround ul.menu li.active > .item, #rt-main-surround .square4 ul.menu li:hover > a, #rt-main-surround .square4 ul.menu li:hover > .item, #rt-main-surround .square4 ul.menu li:hover > .separator, .roktabs-links ul li.active span {color:'.$gantry->get('linkcolor').';}'."\n";

        $css .= 'a, #rt-main-surround ul.menu a:hover, #rt-main-surround ul.menu .separator:hover, #rt-main-surround ul.menu .item:hover {color:'.$gantry->get('linkcolor').';}';



        $gantry->addInlineStyle($css);
		$this->_disableRokBoxForiPhone();

		//style stuff
        $gantry->addStyle($gantry->get('cssstyle').".css");
		$gantry->addStyle($gantry->get('bodystyle')."-body.css");

	}
	
	function _disableRokBoxForiPhone() {
		global $gantry;
		
		if ($gantry->browser->platform == 'iphone') {
			$gantry->addInlineScript("window.addEvent('domready', function() {\$\$('a[rel^=rokbox]').removeEvents('click');});");
		}
	}
}