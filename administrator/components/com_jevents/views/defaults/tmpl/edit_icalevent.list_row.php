<?php 
/**
 * JEvents Component for Joomla 1.5.x
 *
 * @version     $Id: edit_icalevent.list_row.php 2083 2011-05-15 08:44:27Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C)  2008-2009 GWE Systems Ltd
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */

defined('_JEXEC') or die('Restricted access');
?>
<table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td><?php echo JText::_("JEV_PLUGIN_INSTRUCTIONS",true);?></td>
		<td><select id="jevdefaults" onchange="defaultsEditorPlugin.insert('value','jevdefaults' )" ></select></td>
	</tr>
</table>

<script type="text/javascript">
defaultsEditorPlugin.node($('jevdefaults'),"<?php echo JText::_("JEV_PLUGIN_SELECT",true);?>","");
// built in group
var optgroup = defaultsEditorPlugin.optgroup($('jevdefaults') , "<?php echo JText::_("JEV_CORE_DATA",true);?>");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_TITLE",true);?>", "TITLE");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_TITLE_LINK",true);?>", "TITLE_LINK");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_REPEATSUMMARY",true);?>", "REPEATSUMMARY");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_PREVIOUSNEXT",true);?>", "PREVIOUSNEXT");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_CREATOR_LABEL",true);?>", "CREATOR_LABEL");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_CREATOR",true);?>", "CREATOR");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_HITS",true);?>", "HITS");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_DESCRIPTION",true);?>", "DESCRIPTION");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_TRUNCATED_DESCRIPTION",true);?>", "TRUNCATED_DESC:20");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_LOCATION_LABEL",true);?>", "LOCATION_LABEL");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_LOCATION",true);?>", "LOCATION");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_CONTACT_LABEL",true);?>", "CONTACT_LABEL");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_CONTACT",true);?>", "CONTACT");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_EXTRAINFO",true);?>", "EXTRAINFO");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_CATEGORY",true);?>", "CATEGORY");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_CATEGORY_LINK",true);?>", "CATEGORYLNK");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_COLOUR",true);?>", "COLOUR");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_CREATIONDATE",true);?>", "CREATED");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_LINKSTART",true);?>", "LINKSTART");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_LINKEND",true);?>", "LINKEND");
defaultsEditorPlugin.node(optgroup , "<?php echo JText::_("JEV_FIELD_URL",true);?>", "URL");


<?php
// get list of enabled plugins
$jevplugins = JPluginHelper::getPlugin("jevents");
foreach ($jevplugins as $jevplugin){
	if (JPluginHelper::importPlugin("jevents", $jevplugin->name)){
		$classname = "plgJevents".ucfirst($jevplugin->name);
		if (is_callable(array($classname,"fieldNameArray"))){
			$lang = JFactory::getLanguage();
			$lang->load("plg_jevents_".$jevplugin->name,JPATH_ADMINISTRATOR);
			$fieldNameArray = call_user_func(array($classname,"fieldNameArray"),'list');
			if (!isset($fieldNameArray['labels'])) continue;
			?>
			optgroup = defaultsEditorPlugin.optgroup($('jevdefaults') , '<?php echo $fieldNameArray["group"];?>');
			<?php
			for ($i=0;$i<count($fieldNameArray['labels']);$i++) {
				?>
				defaultsEditorPlugin.node(optgroup , "<?php echo $fieldNameArray['labels'][$i];?>", "<?php echo $fieldNameArray['values'][$i];?>");
				<?php
			}
		}
	}
}
?>
</script>
