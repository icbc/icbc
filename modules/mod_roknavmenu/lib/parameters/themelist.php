<?php
/**
 * @version $Id$
 * @package RocketWerx
 * @subpackage	RokNavMenu
 * @copyright Copyright (C) 2009 RocketWerx. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * Renders a file list from a directory in the current templates directory
 */

class JElementThemelist extends JElement
{
	/**
	* Element name
	*
	* @access	protected
	* @var		string
	*/
	var	$_name = 'TemplateFilelist';

	var $_front_side_template;
	
	function fetchElement($name, $value, &$node, $control_name)
	{
		jimport( 'joomla.filesystem.folder' );
		jimport( 'joomla.filesystem.file' );

		$filter		= $node->attributes('filter');
		$exclude	= $node->attributes('exclude');
			
		// path to directory
		$template_themes_path = '/templates/'.$this->_getFrontSideTemplate().'/html/mod_roknavmenu/themes';
		$template_themes_full_path = JPath::clean(JPATH_ROOT.$template_themes_path);
		$template_theme_text = JText::_("Template theme");
		
		$module_themes_path = '/modules/mod_roknavmenu/themes'; 
		$module_themes_full_path = JPath::clean(JPATH_ROOT.$module_themes_path);
		$module_theme_text = JText::_("Default theme");
		
		/**
		 * check for old school formatter and layout
		 */
		 if ($this->_getOldFormatter() || $this->_getOldLayout()) {
			return JText::sprintf("ROKNAVMENU.MSG.USING_OLD_FORMATTERS_AND_LAYOUTS", ($this->_getOldFormatter())? '<br/>'.$this->_getOldFormatter():'', ($this->_getOldLayout())?'<br/>'.$this->_getOldLayout():'');		 	
		 }
		 
		
		$options = array ();
		if (!$node->attributes('hide_none'))
		{
			$options[] = JHTML::_('select.option', '-1', '- '.JText::_('Do not use').' -');
		}
	
		if (!$node->attributes('hide_default'))
		{
			$options[] = JHTML::_('select.option', '', '- '.JText::_('Use default').' -');
		}
		
		 /** Get the Template Themes **/
		if (JFolder::exists($template_themes_full_path)) { 
			$folders = JFolder::folders($template_themes_full_path, $filter);
			if ( is_array($folders) )
			{
				reset($folders);
				while (list($key, $val) = each($folders)) {
					$folder =& $folders[$key]; 
					if ($exclude)
					{
						if (preg_match( chr( 1 ) . $exclude . chr( 1 ), $folder ))
						{
							continue;
						}
					}
					$options[] = JHTML::_('select.option', $template_themes_path.DS.$folder, $template_theme_text." - ".$folder);
				}
			}
		}
		 /** Get the Default Themes **/
		if (JFolder::exists($module_themes_full_path)) { 
			$folders = JFolder::folders($module_themes_full_path, $filter);
			if ( is_array($folders) )
			{
				reset($folders);
				while (list($key, $val) = each($folders)) {
					$folder =& $folders[$key]; 
					if ($exclude)
					{
						if (preg_match( chr( 1 ) . $exclude . chr( 1 ), $folder ))
						{
							continue;
						}
					}
					$options[] = JHTML::_('select.option', $module_themes_path.DS.$folder, $module_theme_text. " - ". $folder);
				}
			}
		}
		return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox"', 'value', 'text', $value, "param$name");

	}
	
	function _getFrontSideTemplate() {
		if (empty($this->_front_side_template)) { 
			$db =& JFactory::getDBO();
			// Get the current default template
			$query = ' SELECT template '
					.' FROM #__templates_menu '
					.' WHERE client_id = 0 '
					.' AND menuid = 0 ';
			$db->setQuery($query);
			$defaultemplate = $db->loadResult();
			$this->_front_side_template = $defaultemplate;
		}
		return $this->_front_side_template;
	}
	
	function _getOldFormatter() {
		$paths = array(
				JPath::clean('/templates/'.$this->_getFrontSideTemplate().'/html/mod_roknavmenu/formatters/default.php'),
				JPath::clean('/templates/'.$this->_getFrontSideTemplate().'/html/mod_roknavmenu/formatter.php'),
				JPath::clean('/modules/mod_roknavmenu/formatters/default.php')
			);
		
		for ($i = 0; $i < count($paths); $i++){
			if (JFile::exists(JPATH_ROOT.$paths[$i])){
				return $paths[$i];
			} 	
		}
		return false;
	}
	
	function _getOldLayout() {
		$paths = array(
				JPath::clean('/templates/'.$this->_getFrontSideTemplate().'/html/mod_roknavmenu/layouts/default.php'),
				JPath::clean('/templates/'.$this->_getFrontSideTemplate().'/html/mod_roknavmenu/default.php'),
				JPath::clean('/modules/mod_roknavmenu/tmpl/default.php')
			);
		
		for ($i = 0; $i < count($paths); $i++){
			if (JFile::exists(JPATH_ROOT.$paths[$i])){
				return $paths[$i];
			} 	
		}
		return false;
	}
}
