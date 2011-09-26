<?php
/**
 * @version 1.0 $Id: default.php 989 2009-03-08 16:20:54Z hschimanski $
 * @package Joomla
 * @subpackage EventList
 * @copyright (C) 2005 - 2008 Christoph Lukes
 * @license GNU/GPL, see LICENCE.php
 * EventList is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.

 * EventList is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with EventList; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
defined('_JEXEC') or die('Restricted access');

// check if any results returned
$items = count($list);
if (!$items) {
   echo '<p class="eventlistmod' . $params->get('moduleclass_sfx') . '">' . JText::_('NOEVENTS') . '</p>';
   return;
}

?>
<ul class="eventlistmod<?php echo $params->get('moduleclass_sfx'); ?>">
<?php foreach ($list as $item) :  ?>
   <li>
      <span class="date">
      <?php if ($params->get('linkdet') == 1) : ?>
         <a href="<?php echo $item->link; ?>"><?php echo $item->dateinfo; ?></a>
      <?php else :
         echo $item->dateinfo;
      endif;
      ?>
      </span>
      <span class="location">
      <?php if ($params->get('showtitloc') == 0 && $params->get('linkloc') == 1 && !empty($item->venueurl)) : ?>
         <a href="<?php echo $item->venueurl; ?>"><?php echo $item->text; ?></a>
      <?php elseif ($params->get('showtitloc') == 1 && $params->get('linkdet') == 2) : ?>
         <a href="<?php echo $item->link; ?>"><?php echo $item->text; ?></a>
      <?php else :
         echo $item->text;
      endif;
      ?>
      </span>
   </li>
<?php endforeach; ?>
</ul>