<?php
/**
 * JEvents Component for Joomla 1.5.x
 *
 * @version     $Id: overview.php 2091 2011-05-16 09:12:40Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C)  2008-2009 GWE Systems Ltd
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

$option = JEV_COM_COMPONENT;
$user =& JFactory::getUser();
$db =& JFactory::getDBO();
$pathIMG = JURI::root() . 'administrator/images/';

if( isset( $this->message) &&  $this->message != null ) {?>
<div class="message"><?php echo $this->message;?></div>
<?php
}
$url = JRoute::_("index.php?option=".$option);
?>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
	<div id="jevuser">
	    <form action="<?php echo $url;?>" method="post" name="adminForm"  id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" >
		<tr>
			<td><?php echo JText::_('JEV_SEARCH'); ?>&nbsp;</td>
			<td>
				<input type="text" name="search" id="jevsearch" value="<?php echo $this->search; ?>" class="inputbox" onChange="document.adminForm.submit();" />
			</td>
			<td>
				<button onclick="this.form.submit();"><?php echo JText::_( 'GO' ); ?></button>
				<button onclick="document.getElementById('jevsearch').value='';this.form.submit();"><?php echo JText::_( 'RESET' ); ?></button>
			</td>
		</tr>
	</table>
	<br/>
  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
	<thead>
    <tr>
      <th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->users); ?>);" /></th>
      <th class="title" width="20%" align="left"  nowrap="nowrap"><?php echo JText::_( 'NAME' );?></th>
      <th width="20%" align="left" nowrap="nowrap"><?php echo JText::_( 'USERNAME' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'ENABLED' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'CREATE' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'MAX_EVENTS' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'PUBLISH_OWN' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'DELETE_OWN' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'EDIT_ALL' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'PUBLISH_ALL' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'DELETE_ALL' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'UPLOAD_IMAGES' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'UPLOAD_FILES' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'CREATE_OWN_EXTRAS' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'CREATE_GLOBAL_EXTRAS' );?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_( 'MAX_EXTRAS' );?></th>
   </tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="16">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
    <?php
    $k=0;
    $i=0;
    foreach ($this->users as $row ) {
				?>
    <tr class="<?php echo "row$k"; ?>">
	<td width="20">
		<input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row->id;?>" onclick="isChecked(this.checked);" />
	</td>
	<td>
		<a href="#edit" onclick=" return listItemTask('cb<?php echo $i;?>','user.edit');"><?php echo $row->jname; ?></a>
	</td>
	<td>
		<?php echo $row->username; ?>
	</td>

		<?php
		if (JVersion::isCompatible("1.6.0")) {
			$img =  $row->published?JHTML::_('image','admin/tick.png', '',array('title'=>''),true):JHTML::_('image','admin/publish_x.png', '',array('title'=>''),true);
		}
		else {
			$img = $row->published?'tick.png':'publish_x.png';
			$img = '<img src="'.$pathIMG . $img.'" width="16" height="16" border="0" alt="" />';
		}

		$href='';
		if( $row->published>=0 ) {
			$href = '<a href="javascript: void(0);" ';
			$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->published ? 'user.unpublish' : 'user.publish'). '\')">';
			$href .= $img;
			$href .= '</a>';
		}
		else {
			$href = '<img src="' . JURI::root() .$img. '" width="12" height="12" border="0" alt="" />';
		}
		?>
     <td align="center"><?php echo $href;?></td>

     <?php
		if (JVersion::isCompatible("1.6.0")) {
			$img =  $row->cancreate?JHTML::_('image','admin/tick.png', '',array('title'=>''),true):JHTML::_('image','admin/publish_x.png', '',array('title'=>''),true);
		}
		else {
			$img = $row->cancreate?'tick.png':'publish_x.png';
			$img = '<img src="'.$pathIMG . $img.'" width="16" height="16" border="0" alt="" />';
		}

		$href='';
		if( $row->cancreate>=0 ) {
			$href = '<a href="javascript: void(0);" ';
			$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->cancreate ? 'user.cannotcreate' : 'user.cancreate'). '\')">';
			$href .= $img;
			$href .= '</a>';
		}
		else {
			$href = $img;
		}
		?>
     <td align="center"><?php echo $href;?></td>

     <td align="center"><?php echo $row->eventslimit;?></td>

     <?php
		if (JVersion::isCompatible("1.6.0")) {
			$img =  $row->canpublishown?JHTML::_('image','admin/tick.png', '',array('title'=>''),true):JHTML::_('image','admin/publish_x.png', '',array('title'=>''),true);
		}
		else {
			$img = $row->canpublishown?'tick.png':'publish_x.png';
			$img = '<img src="'.$pathIMG . $img.'" width="16" height="16" border="0" alt="" />';
		}

		$href='';
		if( $row->canpublishown>=0 ) {
			$href = '<a href="javascript: void(0);" ';
			$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->canpublishown ? 'user.cannotpublishown' : 'user.canpublishown'). '\')">';
			$href .= $img;
			$href .= '</a>';
		}
		else {
			$href = $img;
		}
		?>
     <td align="center"><?php echo $href;?></td>

		<?php
		if (JVersion::isCompatible("1.6.0")) {
			$img =  $row->candeleteown?JHTML::_('image','admin/tick.png', '',array('title'=>''),true):JHTML::_('image','admin/publish_x.png', '',array('title'=>''),true);
		}
		else {
			$img = $row->candeleteown?'tick.png':'publish_x.png';
			$img = '<img src="'.$pathIMG . $img.'" width="16" height="16" border="0" alt="" />';
		}

		$href='';
		if( $row->candeleteown>=0 ) {
			$href = '<a href="javascript: void(0);" ';
			$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->candeleteown ? 'user.cannotdeleteown' : 'user.candeleteown'). '\')">';
			$href .= $img;
			$href .= '</a>';
		}
		else {
			$href = $img;
		}
		?>
     <td align="center"><?php echo $href;?></td>

     <?php
		if (JVersion::isCompatible("1.6.0")) {
			$img =  $row->canedit?JHTML::_('image','admin/tick.png', '',array('title'=>''),true):JHTML::_('image','admin/publish_x.png', '',array('title'=>''),true);
		}
		else {
			$img = $row->canedit?'tick.png':'publish_x.png';
			$img = '<img src="'.$pathIMG . $img.'" width="16" height="16" border="0" alt="" />';
		}

		$href='';
		if( $row->canedit>=0 ) {
			$href = '<a href="javascript: void(0);" ';
			$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->canedit ? 'user.cannotedit' : 'user.canedit'). '\')">';
			$href .= $img;
			$href .= '</a>';
		}
		else {
			$href = $img;
		}
		?>
     <td align="center"><?php echo $href;?></td>

     <?php
		if (JVersion::isCompatible("1.6.0")) {
			$img =  $row->canpublishall?JHTML::_('image','admin/tick.png', '',array('title'=>''),true):JHTML::_('image','admin/publish_x.png', '',array('title'=>''),true);
		}
		else {
			$img = $row->canpublishall?'tick.png':'publish_x.png';
			$img = '<img src="'.$pathIMG . $img.'" width="16" height="16" border="0" alt="" />';
		}

		$href='';
		if( $row->canpublishall>=0 ) {
			$href = '<a href="javascript: void(0);" ';
			$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->canpublishall ? 'user.cannotpublishall' : 'user.canpublishall'). '\')">';
			$href .= $img;
			$href .= '</a>';
		}
		else {
			$href = $img;
		}
		?>
     <td align="center"><?php echo $href;?></td>

     <?php
		if (JVersion::isCompatible("1.6.0")) {
			$img =  $row->candeleteall?JHTML::_('image','admin/tick.png', '',array('title'=>''),true):JHTML::_('image','admin/publish_x.png', '',array('title'=>''),true);
		}
		else {
			$img = $row->candeleteall?'tick.png':'publish_x.png';
			$img = '<img src="'.$pathIMG . $img.'" width="16" height="16" border="0" alt="" />';
		}

		$href='';
		if( $row->candeleteall>=0 ) {
			$href = '<a href="javascript: void(0);" ';
			$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->candeleteall ? 'user.cannotdeleteall' : 'user.candeleteall'). '\')">';
			$href .= $img;
			$href .= '</a>';
		}
		else {
			$href = $img;
		}
		?>
     <td align="center"><?php echo $href;?></td>

     <?php
		if (JVersion::isCompatible("1.6.0")) {
			$img =  $row->canuploadimages?JHTML::_('image','admin/tick.png', '',array('title'=>''),true):JHTML::_('image','admin/publish_x.png', '',array('title'=>''),true);
		}
		else {
			$img = $row->canuploadimages?'tick.png':'publish_x.png';
			$img = '<img src="'.$pathIMG . $img.'" width="16" height="16" border="0" alt="" />';
		}

		$href='';
		if( $row->canuploadimages>=0 ) {
			$href = '<a href="javascript: void(0);" ';
			$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->canuploadimages ? 'user.cannotuploadimages' : 'user.canuploadimages'). '\')">';
			$href .= $img;
			$href .= '</a>';
		}
		else {
			$href = $img;
		}
		?>
     <td align="center"><?php echo $href;?></td>

     <?php
		if (JVersion::isCompatible("1.6.0")) {
			$img =  $row->canuploadmovies?JHTML::_('image','admin/tick.png', '',array('title'=>''),true):JHTML::_('image','admin/publish_x.png', '',array('title'=>''),true);
		}
		else {
			$img = $row->canuploadmovies?'tick.png':'publish_x.png';
			$img = '<img src="'.$pathIMG . $img.'" width="16" height="16" border="0" alt="" />';
		}

		$href='';
		if( $row->canuploadmovies>=0 ) {
			$href = '<a href="javascript: void(0);" ';
			$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->canuploadmovies ? 'user.cannotuploadmovies' : 'user.canuploadmovies'). '\')">';
			$href .= $img;
			$href .= '</a>';
		}
		else {
			$href = $img;
		}
		?>
     <td align="center"><?php echo $href;?></td>

     <?php
		if (JVersion::isCompatible("1.6.0")) {
			$img =  $row->cancreateown?JHTML::_('image','admin/tick.png', '',array('title'=>''),true):JHTML::_('image','admin/publish_x.png', '',array('title'=>''),true);
		}
		else {
			$img = $row->cancreateown?'tick.png':'publish_x.png';
			$img = '<img src="'.$pathIMG . $img.'" width="16" height="16" border="0" alt="" />';
		}

		$href='';
		if( $row->cancreateown>=0 ) {
			$href = '<a href="javascript: void(0);" ';
			$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->cancreateown ? 'user.cannotcreateown' : 'user.cancreateown'). '\')">';
			$href .= $img;
			$href .= '</a>';
		}
		else {
			$href = $img;
		}
		?>
     <td align="center"><?php echo $href;?></td>

     <?php
		if (JVersion::isCompatible("1.6.0")) {
			$img =  $row->cancreateglobal?JHTML::_('image','admin/tick.png', '',array('title'=>''),true):JHTML::_('image','admin/publish_x.png', '',array('title'=>''),true);
		}
		else {
			$img = $row->cancreateglobal?'tick.png':'publish_x.png';
			$img = '<img src="'.$pathIMG . $img.'" width="16" height="16" border="0" alt="" />';
		}

		$href='';
		if( $row->cancreateglobal>=0 ) {
			$href = '<a href="javascript: void(0);" ';
			$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->cancreateglobal ? 'user.cannotcreateglobal' : 'user.cancreateglobal'). '\')">';
			$href .= $img;
			$href .= '</a>';
		}
		else {
			$href = $img;
		}
		?>
     <td align="center"><?php echo $href;?></td>

     <td align="center"><?php echo $row->extraslimit;?></td>

     <?php
			$k = 1 - $k;
			$i++;
		?>
	</tr>
		<?php  } ?>
	</tbody>
	</table>
    <?php echo JHTML::_( 'form.token' );
?>
<input type="hidden" name="hidemainmenu" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="task" value='user.overview' />
</form>
<script  type="text/javascript" src="<?php echo JURI::root();?>includes/js/overlib_mini.js"></script>
<script language="javascript" type="text/javascript">
function submitbutton(pressbutton) {
	var form = document.getElementsByName ('adminForm');
	<?php
	if( isset($editorFields) && is_array($editorFields) ) {
		foreach ($editorFields as $editor) {
			// Where editor[0] = your areaname and editor[1] = the field name
			echo $wysiwygeditor->save( $editor[1]);
		}
	}
	?>
	if (pressbutton == 'cancel') {
		submitform( pressbutton );
		return;
	} else {
		submitform( pressbutton );
	}
}
</script>
