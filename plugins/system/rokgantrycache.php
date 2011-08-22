<?php
/**
 * @package	Gantry Cache Plugin
 * @version	1.0 December 14, 2009
 * @author	RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2009 RocketTheme, LLC
 * @license	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );
jimport('joomla.filesystem.file');

/**
 */
class plgSystemRokGantryCache extends JPlugin
{	
	var $_cleanCacheAfterTasks = 
				array(
					'com_modules' =>
						array(
							'copy',
							'save', 
							'remove',     
							'publish',
							'unpublish',  
							'reorder',  
							'access',  
							'saveOrder'
						),
					'com_templates' =>
						array(
							'publish',
							'save',
							'save_positions',
							'default',
							'apply',
							'save_source',
							'apply_source'
						),
					'com_config' =>
						array(
							'save'
						)
				);
	
	
	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param	object	$subject	The object to observe
	 * @param	array	$config		An array that holds the plugin configuration
	 * @since	1.5
	 */
	function plgSystemRokGantryCache(& $subject, $config)
	{
		parent::__construct($subject, $config);
	}
	
	/**
	 * Catch the routed functions for 
	 */
	function onAfterRoute() {
		global $mainframe;

		$option = JRequest::getString('option');
		if (!$mainframe->isAdmin() || !array_key_exists($option, $this->_cleanCacheAfterTasks)) {
			return; 
		}
		// get the task
		$task = JRequest::getString('task');
		
		//set if we need to export next render
		if (in_array($task, $this->_cleanCacheAfterTasks[$option])) {
			$cache =& JFactory::getCache('', 'callback', 'file');
			$cache->clean( 'Gantry' );
		}
	}
}