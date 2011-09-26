<?php
/**
 * @version 1.0 $Id: helper.php 1020 2009-04-27 04:23:28Z hschimanski $
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

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * EventList Module helper
 *
 * @package Joomla
 * @subpackage EventList Module
 * @since		0.9
 */
class modEventListHelper
{

	/**
	 * Method to get the events
	 *
	 * @access public
	 * @return array
	 */
	function getList(&$params)
	{
		global $mainframe;

		$db			=& JFactory::getDBO();
		$user		=& JFactory::getUser();
		$user_gid	= (int) $user->get('aid');

		if ($params->get( 'type', '0' ) == -1) {
			// upcoming events
			$where = ' WHERE a.published = 1 and a.dates >= CURDATE()';
			$order = ' ORDER BY a.dates ASC, a.times ASC';
		} else if ($params->get( 'type', '0' ) == 1) {
			// archived events
			$where = ' WHERE a.published = -1';
			$order = ' ORDER BY a.dates DESC, a.times DESC';
		} else {
			// published events (default)
			$where = ' WHERE a.published = 1';
			$order = ' ORDER BY a.dates ASC, a.times ASC';
		}

		$catid 	= trim( $params->get('catid') );
		$venid 	= trim( $params->get('venid') );

		if ($catid)
		{
			$ids = explode( ',', $catid );
			JArrayHelper::toInteger( $ids );
			$categories = ' AND (c.id=' . implode( ' OR c.id=', $ids ) . ')';
		}
		if ($venid)
		{
			$ids = explode( ',', $venid );
			JArrayHelper::toInteger( $ids );
			$venues = ' AND (l.id=' . implode( ' OR l.id=', $ids ) . ')';
		}

		//get $params->get( 'count', '2' ) nr of datasets
		$query = 'SELECT a.*, l.venue, l.city, l.url,'
				.' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(\':\', a.id, a.alias) ELSE a.id END as slug'
				.' FROM #__eventlist_events AS a'
				.' LEFT JOIN #__eventlist_venues AS l ON l.id = a.locid'
				.' LEFT JOIN #__eventlist_categories AS c ON c.id = a.catsid'
				. $where
				.' AND c.access <= '.$user_gid
				.($catid ? $categories : '')
				.($venid ? $venues : '')
				. $order
				.' LIMIT '.(int)$params->get( 'count', '2' )
				;

		$db->setQuery($query);
		$rows = $db->loadObjectList();

		$i		= 0;
		$lists	= array();
		foreach ( $rows as $row )
		{
			//cut titel
			$length = strlen(htmlspecialchars( $row->title ));

			if ($length > $params->get('cuttitle', '18')) {
				$row->title = substr($row->title, 0, $params->get('cuttitle', '18'));
				$row->title = htmlspecialchars( $row->title.'...', ENT_COMPAT, 'UTF-8');
			}

			$lists[$i]->link		= JRoute::_( EventListHelperRoute::getRoute($row->slug) );
			$lists[$i]->dateinfo 	= modEventListHelper::_builddateinfo($row, $params);
			$lists[$i]->text		= $params->get('showtitloc', 0 ) ? $row->title : htmlspecialchars( $row->venue, ENT_COMPAT, 'UTF-8' );
			$lists[$i]->city		= htmlspecialchars( $row->city, ENT_COMPAT, 'UTF-8' );
			$lists[$i]->venueurl 	= !empty( $row->url ) ? modEventListHelper::_format_url($row->url) : null;
			$i++;
		}

		return $lists;
	}

	/**
	 * Method to a formated and structured string of date infos
	 *
	 * @access public
	 * @return string
	 */
	function _builddateinfo($row, &$params)
	{
		$date 		= modEventListHelper::_format_date($row->dates, $row->times, $params->get('formatdate', '%d.%m.%Y'));
		$enddate 	= $row->enddates ? modEventListHelper::_format_date($row->enddates, $row->endtimes, $params->get('formatdate', '%d.%m.%Y')) : null;
		$time		= $row->times ? modEventListHelper::_format_date($row->dates, $row->times, $params->get('formattime', '%H:%M')) : null;
		$dateinfo	= $date;

		if ( isset($enddate) ) {
			$dateinfo .= ' - '.$enddate;
		}

		if ( isset($time) ) {
			$dateinfo .= ' | '.$time;
		}

		return $dateinfo;
	}

	/**
	 * Method to get a valid url
	 *
	 * @access public
	 * @return string
	 */
	function _format_url($url)
	{
		if(!empty($url) && strtolower(substr($url, 0, 7)) != "http://") {
        	$url = 'http://'.$url;
        }
		return $url;
	}

	/**
	 * Method to format date information
	 *
	 * @access public
	 * @return string
	 */
	function _format_date($date, $time, $format)
	{
		//format date
		$date = strftime($format, strtotime( $date.' '.$time ));

		return $date;
	}
}