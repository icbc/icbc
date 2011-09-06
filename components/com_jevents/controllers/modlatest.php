<?php
/**
 * JEvents Component for Joomla 1.5.x
 *
 * @version     $Id: modlatest.php 1142 2010-09-08 10:10:52Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C) 2008-2009 GWE Systems Ltd
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */

defined( 'JPATH_BASE' ) or die( 'Direct Access to this location is not allowed.' );

jimport('joomla.application.component.controller');

class ModLatestController extends JController   {


	function __construct($config = array())
	{
		if (!isset($config['base_path'])){
			$config['base_path']=JEV_PATH;
		}
		parent::__construct($config);
		// TODO get this from config
		$this->registerDefaultTask( 'calendar' );

		$cfg = & JEVConfig::getInstance();
		$theme = ucfirst(JEV_CommonFunctions::getJEventsViewName());
		JLoader::register('JEvents'.ucfirst($theme).'View',JEV_VIEWS."/".$theme."/abstract/abstract.php");

		include_once(JEV_LIBS."/modfunctions.php");
		if (!isset($this->_basePath) && JVersion::isCompatible("1.6.0")){
			$this->_basePath = $this->basePath;
			$this->_task = $this->task;
		}
	}

	function rss() {
				
		JRequest::setVar("tmpl","component");

		// get the view
		$this->view = & $this->getView("modlatest","feed");

		// Set the layout
		$this->view->setLayout('rss');
	
		// View caching logic -- simple... are we logged in?
		$cfg	 = & JEVConfig::getInstance();
		$useCache = intval($cfg->get('com_cache', 0));
		$user = &JFactory::getUser();
		if ($user->get('id') || !$useCache) {
			$this->view->rss();
		} else {
			$cache =& JFactory::getCache(JEV_COM_COMPONENT, 'view');
			$cache->get($this->view, 'rss');
		}
	}
	

}

