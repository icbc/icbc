<?php
/**
 * @package     gantry
 * @subpackage  ajax-models
 * @version		3.0.3 June 12, 2010
 * @author		RocketTheme http://www.rockettheme.com
 * @copyright 	Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('JPATH_BASE') or die();
jimport( 'joomla.application.module.helper' );
global $gantry;

$module_name = JRequest::getVar('module',null);
$module_id = JRequest::getVar('moduleid',null);

$db		=& JFactory::getDBO();
if (isset($module_name)) {
    $query = "SELECT DISTINCT * from #__modules where title='".$module_name."'";
} else {
    $query = "SELECT DISTINCT * from #__modules where id=".$module_id;
}

$db->setQuery( $query );
$result = $db->loadObject();

if ($result) {
    $module	 = JModuleHelper::getModule(substr_replace($result->module,'',0,4) , $result->title );
    echo JModuleHelper::renderModule( $module, array( 'style' => "raw" ) );
}

?>