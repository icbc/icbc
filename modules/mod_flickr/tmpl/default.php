<?php
/**
* @version		$Id: mod_flickr/tmpl/default.php 2009-05-08 waseem $
* @package		Joomla 1.5
* @copyright	Copyright (C) 2007 - 2009 Waseem Sadiq. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @author		Waseem Sadiq - bulletprooftemplates.com
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
error_reporting(0);
?>

<?php 
	if ($params->get('flickrkey') == '') {
		echo JText::_( 'No Flickr Key ID present' );
	}else{
		if ($photoset_id == '') {
			echo JText::_( 'Invalid or no Photoset id present' );
		}
		else
		{ ?>

		<div class="mod_flickr<?php echo $params->get('moduleclass_sfx');?> clearfix">
			<ul>
			<?php foreach ($photos['photo'] as $photo): ?>
			<li><a rel="lightbox-<?php echo $gallerydiv;?>" title="<?php echo $photo['title'] ?>" href="<?php echo $f->buildPhotoURL($photo, 'medium') ?>"><img src="<?php echo $f->buildPhotoURL($photo, 'square') ?>" alt="<?php echo $photo['title'] ?>" /></a></li>
			<?php endforeach; ?>
			</ul>
		</div>
		<div id="flickrdev"><a href="http://www.bulletprooftemplates.com" title="Joomla Flickr module by Bulletproof Templates"><img src="<?php echo JRoute::_('modules/mod_flickr/resources/img/logo.png') ;?>" alt="Joomla Flickr module by Bulletproof Templates - Joomla 1.5 templates, extensions, tutorials and custom services" /></a></div>
			
<?php
	}
}?>