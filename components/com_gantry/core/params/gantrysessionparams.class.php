<?php
/**
 * @package gantry
 * @subpackage core.params
 * @version   3.0.3 June 12, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('GANTRY_VERSION') or die();


gantry_import('core.gantryparams');

/**
 * @package gantry
 * @subpackage core.params
 */
class GantrySessionParams extends GantryParams {
    function store(){
        global $gantry;
        foreach($gantry->_setinsession as $session_var){
            if ($gantry->_working_params[$session_var]['setby'] != 'menuitem') {
                if ($gantry->_working_params[$session_var]['value'] != $gantry->_working_params[$session_var]['sitebase'] && $gantry->_working_params[$session_var]['type'] != 'preset'){
                    $gantry->session->set($gantry->template_prefix.$gantry->_base_params_checksum."-".$session_var,$gantry->_working_params[$session_var]['value']);
                }
                else {
                    $gantry->session->set($gantry->template_prefix.$this->_base_params_checksum."-".$session_var,null);
                }
            }
        }
    }

    function clean(){
        global $gantry;
        foreach($gantry->_setinsession as $session_var){
            $gantry->session->set($gantry->template_prefix.$this->_base_params_checksum."-".$session_var,null);
        }
    }
    
    function populate(){
        global $gantry;

        // get any session param overrides and set to that
        // set preset values
        foreach($gantry->_preset_names as $param_name) {
            $session_param_name = $gantry->template_prefix.$gantry->_base_params_checksum."-".$param_name;
            if (in_array($param_name, $gantry->_setbysession) && $gantry->session->get($session_param_name)) {
                $param =& $gantry->_working_params[$param_name];
                $session_value = $gantry->session->get($session_param_name);
                $session_preset_params = $gantry->presets[$param_name][$session_value];
                foreach($session_preset_params as $session_preset_param_name => $session_preset_param_value) {
                    if (array_key_exists($session_preset_param_name, $gantry->_working_params) && !is_null($session_preset_param_value)){
                        $gantry->_working_params[$session_preset_param_name]['value'] = $session_preset_param_value;
                        $gantry->_working_params[$session_preset_param_name]['setby'] = 'session';
                    }
                }
            }
        }
        // set individual values
        foreach($gantry->_param_names as $param_name) {
            $session_param_name = $gantry->template_prefix.$gantry->_base_params_checksum."-".$param_name;
            if (in_array($param_name, $gantry->_setbysession) && $gantry->session->get($session_param_name)) {
                $param =& $gantry->_working_params[$param_name];
                $session_value = $gantry->session->get($session_param_name);
                if (!is_null($session_value)){
                    $gantry->_working_params[$param['name']]['value'] = $session_value;
                    $gantry->_working_params[$param['name']]['setby'] = 'session';
                }
            }
        }
    }
}