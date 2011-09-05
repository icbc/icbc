<?php
/**
 * JEvents Component for Joomla 1.5.x
 *
 * @version     $Id: jevents.php 2347 2011-07-26 08:31:58Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C) 2008-2009 GWE Systems Ltd
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */

defined( 'JPATH_BASE' ) or die( 'Direct Access to this location is not allowed.' );

jimport('joomla.filesystem.path');
/*
// JevDate test
jimport("joomla.utilities.date");
$date = new JevDate("1.30pm 12 March 2011", new DateTimeZone('America/New_York'));
echo $date->format("Y-m-d H:i:s")."<br/>";
echo "<hr/>";
$date->add(new DateInterval('P1D'));
echo $date->format("Y-m-d H:i:s")."<br/>";
echo "<hr/>";
$date = new JevDate("1.30pm 12 March 2011", new DateTimeZone('UTC'));
echo $date->format("Y-m-d H:i:s")."<br/>";
echo "<hr/>";
$date->add(new DateInterval('P1D'));
echo $date->format("Y-m-d H:i:s")."<br/>";
echo "<hr/>";

$date = new JevDate("1.30pm 12 March 2011", new DateTimeZone('America/New_York'));
echo $date->format("Y-m-d H:i:s")."<br/>";
echo "<hr/>";
$date->modify("+1 day");
echo $date->format("Y-m-d H:i:s")."<br/>";
echo "<hr/>";
*/
// For development performance testing only
/*
$db	=& JFactory::getDBO();
$db->setQuery("SET SESSION query_cache_type = OFF");
$db->query();

$cfg = & JEVConfig::getInstance();
$cfg->set('jev_debug', 1);
*/

include_once(JPATH_COMPONENT.DS."jevents.defines.php");

$isMobile = false;
jimport("joomla.environment.browser");
$browser = JBrowser::getInstance();

$registry	=& JRegistry::getInstance("jevents");
// In Joomla 1.6 JComponentHelper::getParams(JEV_COM_COMPONENT) is a clone so the menu params do not propagate so we force this here!
if (JVersion::isCompatible("1.6.0")){
	$newparams	= JFactory::getApplication('site')->getParams();
	// Because the application sets a default page title,
	// we need to get it from the menu item itself
	$menu = JFactory::getApplication()->getMenu()->getActive();
	if ($menu) {
		$newparams->def('page_heading', $newparams->get('page_title', $menu->title));
	}
	else {
		$newparams->def('page_heading', JText::_('JGLOBAL_ARTICLES'));
	}
	$component =& JComponentHelper::getComponent(JEV_COM_COMPONENT);
	$component->params =& $newparams;
	
	$isMobile = $browser->isMobile();
}
else {
	$isMobile = $browser->_mobile;
}
$params = JComponentHelper::getParams(JEV_COM_COMPONENT);

if ($isMobile || strpos(JFactory::getApplication()->getTemplate(), 'mobile_')===0 || (class_exists("T3Common") && T3Common::mobile_device_detect())){
	JRequest::setVar("jevsmartphone",1);
	if (JFolder::exists(JEV_VIEWS."/smartphone")){
		//JRequest::setVar("jEV","smartphone");
	}
	$params->set('iconicwidth',485);
	$params->set('extpluswidth',485);
	$params->set('ruthinwidth',485);
}

// See http://www.php.net/manual/en/timezones.php
$tz=$params->get("icaltimezonelive","");
if ($tz!="" && is_callable("date_default_timezone_set")){
	$timezone= date_default_timezone_get();
	date_default_timezone_set($tz);
	$registry->setValue("jevents.timezone",$timezone);
}

// Must also load backend language files
$lang =& JFactory::getLanguage();
$lang->load(JEV_COM_COMPONENT, JPATH_ADMINISTRATOR);

// Load Site specific language overrides
$lang->load(JEV_COM_COMPONENT, JPATH_THEMES.DS.JFactory::getApplication()->getTemplate());

// disable Zend php4 compatability mode
@ini_set("zend.ze1_compatibility_mode","Off");

// Split task into command and task
$cmd = JRequest::getCmd('task', false);

if (!$cmd) {
	$view =	JRequest::getCmd('view', false);
	$layout = JRequest::getCmd('layout', "show");
	if ($view && $layout){
		$cmd = $view.'.'.$layout;
	}
	else $cmd = "month.calendar";
}

if (strpos($cmd, '.') != false) {
	// We have a defined controller/task pair -- lets split them out
	list($controllerName, $task) = explode('.', $cmd);

	// Define the controller name and path
	$controllerName	= strtolower($controllerName);
	$controllerPath	= JPATH_COMPONENT.DS.'controllers'.DS.$controllerName.'.php';
	//$controllerName = "Front".$controllerName;

	// If the controller file path exists, include it ... else lets die with a 500 error
	if (file_exists($controllerPath)) {
		require_once($controllerPath);
	} else {
		JError::raiseError(500, 'Invalid Controller '.$controllerName);
	}
} else {
	// Base controller, just set the task
	$controllerName = null;
	$task = $cmd;
}
// Make the task available later
JRequest::setVar("jevtask",$cmd);
JRequest::setVar("jevcmd",$cmd);

JPluginHelper::importPlugin("jevents");

// Make sure the view specific language file is loaded
JEV_CommonFunctions::loadJEventsViewLang();

// Set the name for the controller and instantiate it
$controllerClass = ucfirst($controllerName).'Controller';
if (class_exists($controllerClass)) {
	$controller = new $controllerClass();
} else {
	JError::raiseError(500, 'Invalid Controller Class - '.$controllerClass );
}


// create live bookmark if requested
$cfg = & JEVConfig::getInstance();
if ($cfg->get('com_rss_live_bookmarks')) {
	$Itemid = JRequest::getInt('Itemid', 0);
	$rssmodid = $cfg->get('com_rss_modid', 0);
	// do not use JRoute since this creates .rss link which normal sef can't deal with
	$rssLink = 'index.php?option='.JEV_COM_COMPONENT.'&amp;task=modlatest.rss&amp;format=feed&amp;type=rss&amp;Itemid='.$Itemid.'&amp;modid='.$rssmodid;
	$rssLink = JUri::root().$rssLink;
	
	if (JVersion::isCompatible("1.6.0")){
		if (method_exists(JFactory::getDocument(),"addHeadLink")){
			$attribs = array('type' => 'application/rss+xml', 'title' => 'RSS 2.0');
			JFactory::getDocument()->addHeadLink($rssLink, 'alternate', 'rel', $attribs);
		}
	}
	else {
		$rss = '<link href="' .$rssLink .'"  rel="alternate"  type="application/rss+xml" title="JEvents - RSS 2.0 Feed" />'. "\n";
		JFactory::getApplication()->addCustomHeadTag( $rss );
	}

	$rssLink =  'index.php?option='.JEV_COM_COMPONENT.'&amp;task=modlatest.rss&amp;format=feed&amp;type=atom&amp;Itemid='.$Itemid.'&amp;modid='.$rssmodid;
	$rssLink = JUri::root().$rssLink;
	//$rssLink = JRoute::_($rssLink);
	if (JVersion::isCompatible("1.6.0")){
		if (method_exists(JFactory::getDocument(),"addHeadLink")){
			$attribs = array('type' => 'application/atom+xml', 'title' => 'Atom 1.0');
			JFactory::getDocument()->addHeadLink($rssLink, 'alternate', 'rel', $attribs);
		}
	}
	else {
		$rss = '<link href="' .$rssLink .'"  rel="alternate"  type="application/rss+xml" title="JEvents - Atom Feed" />'. "\n";
		JFactory::getApplication()->addCustomHeadTag( $rss );
	}

}

// Add reference for constructor in registry - unfortunately there is no add by reference method
// we rely on php efficiency to not create a copy
$registry	=& JRegistry::getInstance("jevents");
$registry->setValue("jevents.controller",$controller);
// record what is running - used by the filters
$registry->setValue("jevents.activeprocess","component");

// Perform the Request task
$controller->execute($task);

// Must reset the timezone back!!
if ($tz && is_callable("date_default_timezone_set")){
	date_default_timezone_set($timezone);
}

// Redirect if set by the controller
$controller->redirect();
