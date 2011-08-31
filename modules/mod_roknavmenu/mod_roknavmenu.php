<?php
/**
 * @version $Id$
 * @package RocketWerx
 * @subpackage	RokNavMenu
 * @copyright Copyright (C) 2009 RocketWerx. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');
$params->def('menutype', 			'mainmenu');
$params->def('class_sfx', 			'');
$params->def('menu_images', 		0);

// Added in 1.5
$params->def('startLevel', 		0);
$params->def('endLevel', 			0);
$params->def('showAllChildren', 	0);

// Cache this basd on access level
$conf =& JFactory::getConfig();
if ($conf->getValue('config.caching') && $params->get("module_cache", 0)) { 
	$user =& JFactory::getUser();
	$cache =& JFactory::getCache('mod_roknavmenu');
    $cache->setCaching(true);
    $args = array(&$params);
    $checksum = md5($args[0]->_raw);
    
	$menudata = $cache->get(array('modRokNavMenuHelper', 'getMenuData'), $args, 'mod_roknavmenu-'.$user->get('aid', 0).'-'.$checksum);
}
else {
    $menudata = modRokNavMenuHelper::getMenuData($params);
}
$menu = modRokNavMenuHelper::getFormattedMenu($menudata, $params);

$layout_path = modRokNavMenuHelper::getLayoutPath($params);

require($layout_path);
