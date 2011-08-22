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
class GantryFeatureWebFonts extends GantryFeature {

    var $_feature_name = 'webfonts';

    var $_google_fonts = array('Cantarell','Cardo','Crimson','Droid Sans','Droid Sans Mono','Droid Serif', 'IM Fell',
                               'Inconsolata','Josefin Sans Std Light','Lobster','Molengo','Nobile','OFL Sorts Mill Goudy TT',
                               'OFL Standard TT','Reenie Beanie','Tangerine','Vollkorn','Yanone Kaffeesatz');

    function init() {
        global $gantry;

        $font_family = $gantry->get('font-family');

        // Only Google at this point
        if ($this->get('source') == "google" && in_array($font_family,$this->_google_fonts)) {
            $gantry->addStyle('http://fonts.googleapis.com/css?family='.str_replace(" ","+",$font_family));
            $gantry->addInlineStyle("h1, h2 { font-family: '".$font_family."', 'Helvetica', arial, serif; }");
        }



    }

}