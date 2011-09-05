<?php
/**
 * JEvents Locations Component for Joomla 1.5.x
 *
 * @version     $Id: jevview.php 2110 2011-05-20 12:42:10Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C) 2008-2009 GWE Systems Ltd
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */

// Check to ensure this file is included in Joomla!

defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldJevview extends JFormFieldList
{

	protected $type = 'jevview';

	public function getOptions()
	{
		// Must load admin language files
		$lang =& JFactory::getLanguage();
		$lang->load("com_jevents", JPATH_ADMINISTRATOR);

		$views = array();
		include_once(JPATH_ADMINISTRATOR."/components/com_jevents/jevents.defines.php");

		foreach (JEV_CommonFunctions::getJEventsViewList() as $viewfile) {
			$views[] = JHTML::_('select.option', $viewfile, $viewfile);
		}
		sort( $views );
		if ($this->menu !='hide'){
			array_unshift($views , JHTML::_('select.option', '', JText::_( 'USE_GLOBAL' )));
		}
		return $views;
		
	}
}
