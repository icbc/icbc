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
 * Base class for all Gantry custom features.
 *
 * @package gantry
 * @subpackage core
 */
class GantryFeature {
    var $_feature_name = '';

    var $_feature_prefix = '';

    function isEnabled() {
        if((int) $this->get('enabled') == 1) return true;
        return false;
    }

    function getPosition() {
        return $this->get('position');
    }

    function isInPosition($position){
        if ($this->getPosition() == $position) return true;
        return false;
    }

	function isOrderable(){
		return true;
	}

    function setPrefix($prefix) {
        $this->_feature_prefix = $prefix;
    }

    function get($param, $prefixed=true) {
        global $gantry;

        $gantry_param ='';
        $gantry_param .= ($prefixed && !empty($this->_feature_prefix))?$this->_feature_prefix.'-':'';
        $gantry_param .= $this->_feature_name.'-'.$param;
        $value =  $gantry->get($gantry_param);
        return $value;
    }

    function init(){
        
    }

    function render($position){

    }

    function finalize(){
        
    }


}