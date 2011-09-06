<?php
/**
 * JEvents Component for Joomla 1.5.x
 *
 * @version     $Id: view.html.php 2321 2011-07-14 14:58:23Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C) 2008-2009 GWE Systems Ltd
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
 * HTML View class for the component frontend
 *
 * @static
 */
include_once(JEV_ADMINPATH."/views/icalevent/view.html.php");

class ICalEventViewIcalEvent extends AdminIcaleventViewIcalevent 
{
	
	function __construct($config = array()){
		include_once(JPATH_ADMINISTRATOR.DS."includes".DS."toolbar.php");
		parent::__construct($config);	
				
		// TODO find the active admin template
		//JEVHelper::stylesheet("system.css", "administrator/templates/system/css/");
		//JEVHelper::stylesheet("icon.css",  "administrator/templates/khepri/css/");
		//JEVHelper::stylesheet("general.css", "administrator/templates/khepri/css/");
	}	
	
	function edit($tpl = null)
	{
		$document =& JFactory::getDocument();		
		include(JEV_ADMINLIBS."/editStrings.php");		
		$document->addScriptDeclaration($editStrings);

		// WHY THE HELL DO THEY BREAK PUBLIC FUNCTIONS !!!
		if (JVersion::isCompatible("1.6.0")) JEVHelper::stylesheet( 'eventsadmin16.css',  'administrator/components/'.JEV_COM_COMPONENT.'/assets/css/' );
		else JEVHelper::stylesheet( 'eventsadmin.css',  'administrator/components/'.JEV_COM_COMPONENT.'/assets/css/' );

		JEVHelper::script('editical.js',  'administrator/components/'.JEV_COM_COMPONENT.'/assets/js/');
		//JEVHelper::script('toolbarfix.js','components/'.JEV_COM_COMPONENT.'/assets/js/');
		
		$document->setTitle(JText::_( 'EDIT_ICAL_EVENT' ));
		
		// Set toolbar items for the page
		JToolBarHelper::title( JText::_( 'EDIT_ICAL_EVENT' ), 'jevents' );
	
		$bar = & JToolBar::getInstance('toolbar');
		if ($this->id>0){
			if ($this->editCopy){
				$this->toolbarConfirmButton("icalevent.save",JText::_("save_copy_warning"),'save','save','Save',false);
				if (JEVHelper::isEventEditor()) $this->toolbarConfirmButton("icalevent.apply",JText::_("save_copy_warning"),'apply','apply','Apply',false);
			}
			else {
				$this->toolbarConfirmButton("icalevent.save",JText::_("save_icalevent_warning"),'save','save','Save',false);
				if (JEVHelper::isEventEditor()) $this->toolbarConfirmButton("icalevent.apply",JText::_("save_icalevent_warning"),'apply','apply','Apply',false);
			}
		}
		else {
			$this->toolbarButton("icalevent.save",'save','save','Save',false);
			if (JEVHelper::isEventEditor()) $this->toolbarButton("icalevent.apply",'apply','apply','Apply',false);
		}		

		$params = JComponentHelper::getParams(JEV_COM_COMPONENT);
		if ($params->get("editpopup",0)) {
			$document->addStyleDeclaration("div#toolbar-box{margin:10px 10px 0px 10px;} div#jevents {margin:0px 10px 10px 10px;} ")	;
			$this->toolbarButton("icalevent.close",'cancel','cancel','Cancel',false);
			JRequest::setVar('tmpl', 'component'); //force the component template
		}
		else {
			if ($this->id>0){
				$this->toolbarButton("icalevent.detail",'cancel','cancel','Cancel',false);
			}
			else {
				$this->toolbarLinkButton("day.listevents",'cancel','cancel','Cancel',false);
			}
		}
					
		JHTML::_('behavior.tooltip');

		// I pass in the rp_id so that I can return to the repeat I was viewing before editing
		$this->assign("rp_id",JRequest::getInt("rp_id",0));

		$this->setCreatorLookup();
				
		$this->_adminStart();			
		parent::displaytemplate($tpl);
		
		$this->_adminEnd();
	}	
	
	function _adminStart(){
		
?>
	<div style="clear:both"  <?php $mainframe = JFactory::getApplication(); $params=JComponentHelper::getParams(JEV_COM_COMPONENT);echo (!JFactory::getApplication()->isAdmin() && $params->get("darktemplate",0))?"class='jeventsdark'":"class='jeventslight'";?>>
		<div id="toolbar-box" >
<?php
		$bar = & JToolBar::getInstance('toolbar');
		$barhtml = $bar->render();
		//$barhtml = str_replace('href="#"','href="javascript void();"',$barhtml);
		//$barhtml = str_replace('submitbutton','return submitbutton',$barhtml);
		echo $barhtml;
		
		$title = JFactory::getApplication()->get('JComponentTitle');
		echo $title;
?>
		</div>
<?php			
	}

	function _adminEnd(){
?>
	</div>
<?php			
	}

	
	function toolbarButton($task = '', $icon = '', $iconOver = '', $alt = '', $listSelect = true){
		include_once(JEV_ADMINPATH."libraries/jevbuttons.php");
		$bar = & JToolBar::getInstance('toolbar');

		// Add a standard button
		$bar->appendButton( 'Jev', $icon, $alt, $task, $listSelect );
		
	}
	
	function toolbarLinkButton($task = '', $icon = '', $iconOver = '', $alt = ''){
		include_once(JEV_ADMINPATH."libraries/jevbuttons.php");
		$bar = & JToolBar::getInstance('toolbar');

		// Add a standard button
		$bar->appendButton( 'Jevlink', $icon, $alt, $task, false );
		
	}

	function toolbarConfirmButton($task = '',  $msg='',  $icon = '', $iconOver = '', $alt = '', $listSelect = true){
		include_once(JEV_ADMINPATH."libraries/jevbuttons.php");
		$bar = & JToolBar::getInstance('toolbar');

		// Add a standard button
		$bar->appendButton( 'Jevconfirm', $msg, $icon, $alt, $task, $listSelect ,false,"document.adminForm.updaterepeats.value" );
		
	}

	
}
