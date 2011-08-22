<?php
/**
 * @package   Quantive Template - RocketTheme
 * @version   1.5.3 June 14, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Rockettheme Quantive Template uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */

defined('JPATH_BASE') or die();

gantry_import('core.gantryfeature');

class GantryFeatureDemoStyles extends GantryFeature {
    var $_feature_name = 'demostyles';

    function isEnabled() {
        return true;
    }

    function isInPosition($position) {
        return false;
    }

	function init() {
        global $gantry;

		//demo styles
        $gantry->addStyle("demo-styles.css");

	}

}