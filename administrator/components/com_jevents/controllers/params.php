<?php
/**
 * JEvents Component for Joomla 1.5.x
 *
 * This file based on Joomla config component Copyright (C) 2005 - 2008 Open Source Matters.
 *
 * @version     $Id: params.php 1975 2011-04-27 15:52:33Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C) 2008-2009 GWE Systems Ltd, 2006-2008 JEvents Project Group
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');


class AdminParamsController extends JController
{
	/**
	 * Custom Constructor
	 */
	function __construct( $default = array())
	{
		$user =& JFactory::getUser();

		if (!JEVHelper::isAdminUser()) {
			JFactory::getApplication()->redirect( "index.php?option=".JEV_COM_COMPONENT."&task=cpanel.cpanel", "Not Authorised - must be admin" );
				return;
		}		

		$default['default_task'] = 'edit';
		parent::__construct( $default );

		$this->registerTask( 'apply', 'save' );
	}

	/**
	 * Show the configuration edit form
	 * @param string The URL option
	 */
	function edit()
	{
		//JRequest::setVar('tmpl', 'component'); //force the component template
		$component = JEV_COM_COMPONENT;

		// get the view
		$this->view = & $this->getView("params","html");

		$model = $this->getModel('params' );
		if (JVersion::isCompatible("1.6.0")) {
			$table =& JTable::getInstance('extension');
			//if (!$table->loadByOption( $component ))
			if (!$table->load( array("element"=>"com_jevents","type"=>"component"))) // 1.6 mod
			{
				JError::raiseWarning( 500, 'Not a valid component' );
				return false;
			}
			// Backwards compatatbility
			$table->id = $table->extension_id;
			$table->option = $table->element;

			// Set the layout
			$this->view->setLayout('edit16');

		}
		else {
			$table =& JTable::getInstance('component');
			if (!$table->loadByOption( $component ))
			{
				JError::raiseWarning( 500, 'Not a valid component' );
				return false;
			}

			// Set the layout
			$this->view->setLayout('edit');

		}

		$this->view->assignRef('component', $table);
		$this->view->setModel( $model, true );
		$this->view->display();
	}

	/**
	 * Save the configuration
	 */
	function save()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$component = JEV_COM_COMPONENT;

		$model = $this->getModel('params' );
		if (JVersion::isCompatible("1.6.0")) {
			$table =& JTable::getInstance('extension');
			//if (!$table->loadByOption( $component ))
			if (!$table->load( array("element"=>"com_jevents","type"=>"component"))) // 1.6 mod
			{
				JError::raiseWarning( 500, 'Not a valid component' );
				return false;
			}
		}
		else {
			$table =& JTable::getInstance('component');
			if (!$table->loadByOption( $component ))
			{
				JError::raiseWarning( 500, 'Not a valid component' );
				return false;
			}
		}

		$post = JRequest::get( 'post' );
		$post['option'] = $component;
		$table->bind( $post );

		// pre-save checks
		if (!$table->check()) {
			JError::raiseWarning( 500, $table->getError() );
			return false;
		}

		// save the changes
		if (!$table->store()) {
			JError::raiseWarning( 500, $table->getError() );
			return false;
		}

		// Now save the form permissions data
		if (JVersion::isCompatible("1.6.0")) {

			$data	= JRequest::getVar('jform', array(), 'post', 'array');			
			$option	= JEV_COM_COMPONENT;
			$comp = JComponentHelper::getComponent(JEV_COM_COMPONENT);
			$id		= $comp->id;
			
			// Validate the posted data.
			JForm::addFormPath(JPATH_COMPONENT);
			JForm::addFieldPath(JPATH_COMPONENT.'/elements');
					
			$form	= $model->getForm();
			$return = $model->validate($form, $data);

			// Check for validation errors.
			if ($return === false) {
				// Get the validation messages.
				$errors	= $model->getErrors();

				$app = JFactory::getApplication();
				// Push up to three validation messages out to the user.
				for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
					if (JError::isError($errors[$i])) {
						$app->enqueueMessage($errors[$i]->getMessage(), 'notice');
					} else {
						$app->enqueueMessage($errors[$i], 'notice');
					}
				}

				// Save the data in the session.
				$app->setUserState('com_config.config.global.data', $data);

				// Redirect back to the edit screen.
				$this->setRedirect(JRoute::_('index.php?option='.JEV_COM_COMPONENT.'&task=params.edit', false));
				return false;
			}

			// Attempt to save the configuration.
			$data	= array(
			'params'	=> $return,
			'id'		=> $id,
			'option'	=> $option
			);
			$return = $model->saveRules($data);

		}

		$this->setRedirect( 'index.php?option='.JEV_COM_COMPONENT."&task=cpanel.cpanel", JText::_( 'CONFIG_SAVED' ) );
		//$this->setMessage(JText::_( 'CONFIG_SAVED' ));
		//$this->edit();
	}

	/**
	 * Cancel operation
	 */
	function cancel()
	{
		$this->setRedirect( 'index.php' );
	}
}