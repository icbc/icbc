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
 * Populates the parameters and template configuration form the templateDetails.xml and params.ini
 *
 * @package gantry
 * @subpackage core
 */
class GantryTemplateDetails {

	var $xml = null;
	var $positions = array ();
	var $params = array ();
    var $_pramas_ini = null;
    var $_params_content = null;
    var $_ingorables = array('spacer','gspacer','gantry');

    function __sleep()
    {
        return array('positions', 'params');
    }
    
	function GantryTemplateDetails() {
	}

	function init(&$gantry) {
		gantry_import("core.utilities.gantryxml");
		$this->xml = new GantryXML;
		$this->xml->loadFile($gantry->templatePath . '/templateDetails.xml');
		$this->positions = & $this->_getPositions();
		$this->params = $this->_getParams($gantry);
	}

	function & _getPositions() {
		// positions
		$data = array ();
		$positions = $this->xml->document->positions[0]->children();
		foreach ($positions as $position) {
			array_push($data, $position->data());
		}
		return $data;
	}
	
	function &_getUniquePositions() {
		// positions
		$data = array ();
		$positions = $this->xml->document->positions[0]->children();
		foreach ($positions as $position) {
			$name = $position->data();
			$name = preg_replace("/(\-a|\-b|\-c|\-d|\-e|\-f)$/i", "", $name);
			if (!in_array($name, $data)) array_push($data, $name);
		}
		return $data;
	}

	function parsePosition($position, $pattern) {
		if (null == $pattern) {
			$pattern = "(-)?";
		}
		$filtered_positions = array ();

		if (count($this->positions) > 0) {
			$regpat = "/^" . $position . $pattern . "/";
			foreach ($this->positions as $key => $value) {
				if (preg_match($regpat, $value) == 1) {
					$filtered_positions[] = $value;
				}
			}
		}
		return $filtered_positions;
	}

	function _getParams(&$gantry) {
		$this->_params_content="";

		$this->_loadParamsContent($gantry);

		$this->_pramas_ini = new JParameter($this->_params_content);

		$data = array ();
		$params = $this->xml->document->params[0]->children();

		foreach ($params as $param) {
//            //skip for unsupported types
			if (in_array($param->attributes('type'), $this->_ingorables))
				continue;
            $this->_getParamInfo($gantry, $param, $data);
		}
		$this->params = $data;
		return $data;
	}

    /**
     * Loads the params.ini content
     * @param  $gantry
     * @return void
     */
    function _loadParamsContent(&$gantry){
        $params_file = $gantry->templatePath.DS.'params.ini';

        if (is_readable( $params_file ))
		{
			$this->_params_content = file_get_contents($params_file);
            return true;
		}
        return false;
    }

    function getParamsHash(){
        return md5($this->_params_content);
    }

    function _getParamInfo(&$gantry, &$param, &$data, $prefix = ""){
        switch($param->attributes('type')){			
            case 'groupedselection':
                $this->_decodeParamInfo($gantry, $param, $data, $prefix);
                // this should fall through and process children like chain and group
            case 'groupedparams':
            case 'chain':
            case 'group':
                $prename = $prefix.$param->attributes('name')."-";
                foreach($param->children() as $subparam){
                    $this->_getParamInfo($gantry, $subparam, $data, $prename);
                }
                break;
			case 'aliases':
		    	$attributes = $param->attributes();
				$value = $this->_pramas_ini->get($prefix.$attributes['name'],(array_key_exists('default',$attributes))?$attributes['default']:false);
				if ($prefix.$attributes['name'] != $value && strlen($value)) $gantry->_aliases[$prefix.$attributes['name']] = $value;
                $this->_decodeParamInfo($gantry, $param, $data, $prefix);
				break;
            default:
                $this->_decodeParamInfo($gantry, $param, $data, $prefix);
                break;
        }
    }

    function _decodeParamInfo(&$gantry, &$param, &$data, $prefix = ""){
        $attributes = $param->attributes();
        $data[$prefix.$attributes['name']] = array (
            'name' => $prefix.$attributes['name'],
            'type' => $attributes['type'],
            'default' => (array_key_exists('default',$attributes))?$attributes['default']:false,
            'value' => $this->_pramas_ini->get($prefix.$attributes['name'],(array_key_exists('default',$attributes))?$attributes['default']:false),
            'sitebase' => $this->_pramas_ini->get($prefix.$attributes['name'],(array_key_exists('default',$attributes))?$attributes['default']:false), 
            'setbyurl' => (array_key_exists('setbyurl',$attributes))?($attributes['setbyurl'] == 'true')?true:false :false,
            'setbycookie' => (array_key_exists('setbycookie',$attributes))?($attributes['setbycookie'] == 'true')?true:false :false,
            'setbysession' => (array_key_exists('setbysession',$attributes))?($attributes['setbysession'] == 'true')?true:false :false,
            'setincookie' => (array_key_exists('setbycookie',$attributes))?($attributes['setbycookie'] == 'true')?true:false :false,
            'setinsession' => (array_key_exists('setinsession',$attributes))?($attributes['setinsession'] == 'true')?true:false :false,
            'setinmenuitem' => (array_key_exists('setinmenuitem',$attributes))?($attributes['setinmenuitem'] == 'true')?true:false :true,
            'setbymenuitem' => (array_key_exists('setbymenuitem',$attributes))?($attributes['setbymenuitem'] == 'true')?true:false :true,
            'isbodyclass' => (array_key_exists('isbodyclass',$attributes))?($attributes['isbodyclass'] == 'true')?true:false :false,
            'setclassbytag' => (array_key_exists('setclassbytag',$attributes)) ? $attributes['setclassbytag'] : false,
            'setby' => 'default'
        );

        if ($data[$prefix.$attributes['name']]['setbyurl']) $gantry->_setbyurl[] = $prefix.$attributes['name'];
        if ($data[$prefix.$attributes['name']]['setbysession']) $gantry->_setbysession[] = $prefix.$attributes['name'];
        if ($data[$prefix.$attributes['name']]['setbycookie']) $gantry->_setbycookie[] = $prefix.$attributes['name'];
        if ($data[$prefix.$attributes['name']]['setinsession']) $gantry->_setinsession[] = $prefix.$attributes['name'];
        if ($data[$prefix.$attributes['name']]['setincookie']) $gantry->_setincookie[] = $prefix.$attributes['name'];
        if ($data[$prefix.$attributes['name']]['setinmenuitem']) {
            $gantry->_setinmenuitem[] = $prefix.$attributes['name'];
        }
        else {
            $gantry->dontsetinmenuitem[] = $prefix.$attributes['name'];
        }
        if ($data[$prefix.$attributes['name']]['setbymenuitem']) $gantry->_setbymenuitem[] = $prefix.$attributes['name'];
        if ($data[$prefix.$attributes['name']]['isbodyclass']) $gantry->_bodyclasses[] = $prefix.$attributes['name'];
        if ($data[$prefix.$attributes['name']]['setclassbytag']) $gantry->_classesbytag[$data[$prefix.$attributes['name']]['setclassbytag']][] = $prefix.$attributes['name']; 

    }
}
