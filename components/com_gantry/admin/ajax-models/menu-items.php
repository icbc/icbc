<?php
/**
 * @package gantry
 * @subpackage admin.ajax-models
 * @version        3.0.3 June 12, 2010
 * @author        RocketTheme http://www.rockettheme.com
 * @copyright     Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license        http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('JPATH_BASE') or die();

global $gantry;

$action = JRequest::getString('action');
gantry_import('core.gantryjson');


if ($action == 'pull') {
    $id = JRequest::getString('menuitem');
    if (null == $id){
        return "error: missing menuitem";
    }

    $gantry->currentMenuItem = $id;
    $gantry->repopulateParams();

    $out = new stdClass();
    $params = $gantry->readMenuItemParams($id, true);

    // get the menu item override param items
    $out->params = array($id=>$params);

    //get the count of modules for all the positions based on a menu item
    $module_counts = array();

    foreach ($gantry->_working_params as $param){
        if ($param['type']=='positions'){
            $posName = ($param['name'] == "mainbodyPosition") ? "sidebar" : str_replace("Position", "", $param['name']);
            $realCount = $gantry->countModules($posName);
            if ($posName == 'sidebar') $realCount += 1;
            $module_counts[$posName]=$realCount;
        }
    }
    $out->module_counts=$module_counts;

    $app = &JApplication::getInstance('site', array(), 'J');
    $menus = $app->getMenu();
    $menu = $menus->getItem($id);
    $out->tree = array();
    foreach ($menu->tree as $treeid){
        if ($treeid == $id){
            break;
        }
        $out->tree[$treeid] = $gantry->readMenuItemParams($treeid, true);    
    }


    $outdata = GantryJSON::encode($out);
    $outdata = str_replace('\\\\\\' , '\\', $outdata);
	echo $outdata;
}
elseif ($action == 'push') {
    $data = JRequest::getString('menuitems-data');
    $data = GantryJSON::decode($data, false);
	
	foreach ($data as $menuitem => $content){
		$gantry->writeMenuItemParams($menuitem, $content);
	}
}
elseif ($action == 'erase') {
    $id = JRequest::getString('menuitem');
    if (null == $id){
        return "error: missing menuitem";
    }
    $gantry->writeMenuItemParams($id, array());
}
else {
    return "error";
}

?>