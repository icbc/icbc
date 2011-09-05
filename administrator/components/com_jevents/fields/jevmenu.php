<?php
/**
 * JEvents Locations Component for Joomla 1.5.x
 *
 * @version     $Id: jevmenu.php 2073 2011-05-13 10:04:27Z geraintedwards $
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

class JFormFieldJEVmenu extends JFormFieldList
{

	protected $type = 'JEVmenu';

	public function getOptions()
	{
		// Trap to stop the config from being editing from the categories page
		if (JRequest::getString("option") =="com_config"){
			?>
			<script type="text/javascript">
				window.parent.SqueezeBox.close();
			</script>
			<?php
			exit();
		}

		$file = JPATH_ADMINISTRATOR . '/components/com_jevents/elements/jevmenu.php';
		if (file_exists($file) ) {
			include_once($file);
		} else {
			die ("JEvents Locations Fields jevmenu.php\n<br />This module needs the JEvents Locations component");
		}		

		return JElementJevmenu::fetchElement($this->name, $this->value, $this->element, $this->type, true);  // RSH 10/4/10 - Use the original code for J!1.6
	}
}
