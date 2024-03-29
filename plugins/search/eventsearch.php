<?php

/**
 * Events Calendar Search plugin for Joomla 1.5.x
 *
 * @version     $Id: eventsearch.php 2089 2011-05-16 09:10:03Z geraintedwards $
 * @package     Events
 * @subpackage  Mambot Events Calendar
 * @copyright   Copyright (C) 2008-2011 GWE Systems Ltd
 * @copyright   Copyright (C) 2006-2007 JEvents Project Group
 * @copyright   Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
 * @licence     http://www.gnu.org/copyleft/gpl.html
 * @link        http://joomlacode.org/gf/project/jevents
 */
/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

//JPlugin::loadLanguage( 'plg_search_jevents' );
// setup for all required function and classes
$file = JPATH_SITE . '/components/com_jevents/mod.defines.php';
if (file_exists($file))
{
	include_once($file);
	include_once(JEV_LIBS . "/modfunctions.php");
}
else
{
	die("JEvents Calendar\n<br />This plugin needs the JEvents component");
}

// Import library dependencies
jimport('joomla.event.plugin');

// Check for 1.6
if (!(version_compare(JVERSION, '1.6.0', ">=")))
{
	$mainframe->registerEvent('onSearchAreas', 'plgSearchEventsSearchAreas');
}

/**
 * @return array An array of search areas
 */
function plgSearchEventsSearchAreas()
{
	if (version_compare(JVERSION, '1.6.0', ">="))
	{
		return array(
			'eventsearch' => 'Events'
		);
	}
	else
	{
		return array(
			'events' => 'JEvents'
		);
	}

}

class plgSearchEventsearch extends JPlugin
{

	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param 	object $subject The object to observe
	 * @param 	array  $config  An array that holds the plugin configuration
	 * @since 1.5
	 */
	function plgSearchEventsearch(&$subject, $config = array()) // RSH 10/4/10 added config array to args, needed for plugin parameter registration!
	{
		parent::__construct($subject, $config);  // RSH 10/4/10 added config array to args, needed for plugin parameter registration!
		// load plugin parameters
		if (!(version_compare(JVERSION, '1.6.0', ">=")))
		{
			$this->_plugin = & JPluginHelper::getPlugin('search', 'eventsearch');
			$this->_params = new JParameter($this->_plugin->params);
		}

	}

	/**
	 * @return array An array of search areas
	 */
	function onContentSearchAreas()
	{
		if (version_compare(JVERSION, '1.6.0', ">="))
		{
			return array(
				'eventsearch' => 'Events'
			);
		}
		else
		{
			return array(
				'events' => 'JEvents'
			);
		}

	}

	function onContentSearch($text, $phrase='', $ordering='', $areas=null)
	{
		return $this->onSearch($text, $phrase, $ordering, $areas);

	}

	/**
	 * Search method
	 *
	 * The sql must return the following fields that are used in a common display
	 * routine: href, title, section, created, text, browsernav
	 * @param string Target search string
	 * @param string matching option, exact|any|all
	 * @param string ordering option, newest|oldest|popular|alpha|category
	 */
	function onSearch($text, $phrase='', $ordering='', $areas=null)
	{

		$db = & JFactory::getDBO();
		$user = & JFactory::getUser();
		$groups = (version_compare(JVERSION, '1.6.0', '>=')) ? implode(',', $user->authorisedLevels()) : false;

		$limit = (version_compare(JVERSION, '1.6.0', '>=')) ? $this->params->get('search_limit', 50) : $this->_params->def('search_limit', 50);
		$dateformat = (version_compare(JVERSION, '1.6.0', ">=")) ? $this->params->get('date_format', "%d %B %Y") : $this->_params->def('date_format', "%d %B %Y");

		$limit = "\n LIMIT $limit";

		$text = trim($text);
		if ($text == '')
		{
			return array();
		}

		if (is_array($areas))
		{
			$test = array_keys(plgSearchEventsSearchAreas());
			if (!array_intersect($areas, array_keys(plgSearchEventsSearchAreas())))
			{
				return array();
			}
		}

		$search_ical_attributes = array('det.summary', 'det.description', 'det.location', 'det.contact', 'det.extra_info');

		// process the new plugins
		// get extra data and conditionality from plugins
		$extrawhere = array();
		$extrajoin = array();
		$needsgroup = false;

		$filterarray = array("published");
		// If there are extra filters from the module then apply them now
		$reg = & JFactory::getConfig();
		$modparams = $reg->getValue("jev.modparams", false);
		if ($modparams && $modparams->getValue("extrafilters", false))
		{
			$filterarray = array_merge($filterarray, explode(",", $modparams->getValue("extrafilters", false)));
		}

		$filters = jevFilterProcessing::getInstance($filterarray);
		$filters->setWhereJoin($extrawhere, $extrajoin);
		$needsgroup = $filters->needsGroupBy();

		JPluginHelper::importPlugin('jevents');
		$dispatcher = & JDispatcher::getInstance();
		$dispatcher->trigger('onListIcalEvents', array(& $extrafields, & $extratables, & $extrawhere, & $extrajoin, & $needsgroup));
		$extrajoin = ( count($extrajoin) ? " \n LEFT JOIN " . implode(" \n LEFT JOIN ", $extrajoin) : '' );
		$extrawhere = ( count($extrawhere) ? ' AND ' . implode(' AND ', $extrawhere) : '' );

		$extrasearchfields = array();
		$dispatcher->trigger('onSearchEvents', array (& $extrasearchfields, & $extrajoin,& $needsgroup));
		
		$wheres = array();
		$wheres_ical = array();
		switch ($phrase) {
			case 'exact':
				$text = $db->Quote('%' . $db->getEscaped($text, true) . '%', false);
				// ical
				$wheres2 = array();
				foreach ($search_ical_attributes as $search_item)
				{
					$wheres2[] = "LOWER($search_item) LIKE " . $text;
				}
				$where_ical = '(' . implode(') OR (', $wheres2) . ')';
				break;
			case 'all':
			case 'any':
			default:
				$words = explode(' ', $text);

				// ical
				$wheres = array();
				foreach ($words as $word)
				{
					$word = $db->Quote('%' . $db->getEscaped($word, true) . '%', false);
					$wheres2 = array();
					foreach ($search_ical_attributes as $search_item)
					{
						$wheres2[] = "LOWER($search_item) LIKE " . $word;
					}
					$wheres[] = implode(' OR ', $wheres2);
				}
				$where_ical = '(' . implode(($phrase == 'all' ? ') AND (' : ') OR ('), $wheres) . ')';

				break;
		}

		if (count($extrasearchfields)>0) {
			$extraor = implode(" OR ",$extrasearchfields);
			$extraor = " OR ".$extraor;
			// replace the ### placeholder with the keyword
			$extraor = str_replace("###",$text,$extraor);

			$where_ical .= $extraor ;
		}
		
		$morder = '';
		$morder_ical = '';
		switch ($ordering) {
			case 'oldest':
				$order = 'a.created ASC';
				$order_ical = 'det.created ASC';
				break;

			case 'popular':
				$order = 'a.hits DESC';
				$order_ical = 'det.created ASC'; // no hit field available
				break;

			case 'alpha':
				$order = 'a.title ASC';
				$order_ical = 'det.summary ASC';
				break;

			case 'category':
				$order = 'b.title ASC, a.title ASC';
				$morder = 'a.title ASC';
				$order_ical = 'b.title ASC, det.summary ASC';
				$morder_ical = 'det.summary ASC';
				break;

			case 'newest':
			default:
				$order = 'a.created DESC';
				$order_ical = 'det.created DESC';
				break;
		}

		
		$eventstitle = JText::_("Events Calendar");
		// Now Search Icals
		$display2 = array();
		foreach ($search_ical_attributes as $search_ical_attribute)
		{
			$display2[] = "$search_ical_attribute";
		}
		$display = 'CONCAT(' . implode(", ' ', ", $display2) . ')';
		$query = "SELECT det.summary as title,"
				. "\n ev.created as created,"
				. "\n $display as text,"
				. "\n CONCAT('$eventstitle','/',det.summary) AS section,"
				. "\n CONCAT('index.php?option=com_jevents&task=icalrepeat.detail&evid=',min(rpt.rp_id)) AS href,"
				. "\n '2' AS browsernav ,"
				. "\n rpt.startrepeat, rpt.rp_id "
				. "\n FROM (#__jevents_vevent as ev)"
				. "\n INNER JOIN #__categories AS b ON b.id = ev.catid"
				. "\n LEFT  JOIN #__jevents_repetition as rpt ON rpt.eventid = ev.ev_id"
				. "\n LEFT  JOIN #__jevents_vevdetail as det ON det.evdet_id = rpt.eventdetail_id"
				. "\n LEFT  JOIN #__jevents_icsfile as icsf ON icsf.ics_id = ev.icsid"
				. $extrajoin
				. "\n WHERE ($where_ical)"
				. "\n AND icsf.state = 1"
				. "\n AND icsf.access " . ((version_compare(JVERSION, '1.6.0', '>=')) ? ' IN (' . $groups . ')' : ' <=  ' . $user->gid)
				. "\n AND ev.state = 1"
				. "\n AND ev.access " . ((version_compare(JVERSION, '1.6.0', '>=')) ? ' IN (' . $groups . ')' : ' <=  ' . $user->gid)
				. "\n AND b.access " . ((version_compare(JVERSION, '1.6.0', '>=')) ? ' IN (' . $groups . ')' : ' <=  ' . $user->gid)
				. "\n AND b.published = '1'"
				. $extrawhere
				. "\n GROUP BY det.evdet_id"
				. "\n ORDER BY " . ($morder_ical ? $morder_ical : $order_ical)
				. $limit
		;

		$db->setQuery($query);
		$list_ical = $db->loadObjectList();

		jimport('joomla.utilities.date');
		if ($list_ical)
		{
			$ids = array();
			foreach ($list_ical as $item)
			{
				$ids[] = $item->rp_id;
			}
			$user = JFactory::getUser();
			$query = "SELECT ev.*, ev.state as published, rpt.*, rr.*, det.*, ev.created as created "
					. "\n , YEAR(rpt.startrepeat) as yup, MONTH(rpt.startrepeat ) as mup, DAYOFMONTH(rpt.startrepeat ) as dup"
					. "\n , YEAR(rpt.endrepeat  ) as ydn, MONTH(rpt.endrepeat   ) as mdn, DAYOFMONTH(rpt.endrepeat   ) as ddn"
					. "\n , HOUR(rpt.startrepeat) as hup, MINUTE(rpt.startrepeat ) as minup, SECOND(rpt.startrepeat ) as sup"
					. "\n , HOUR(rpt.endrepeat  ) as hdn, MINUTE(rpt.endrepeat   ) as mindn, SECOND(rpt.endrepeat   ) as sdn"
					. "\n FROM #__jevents_vevent as ev"
					. "\n LEFT JOIN #__jevents_repetition as rpt ON rpt.eventid = ev.ev_id"
					. "\n LEFT JOIN #__jevents_vevdetail as det ON det.evdet_id = rpt.eventdetail_id"
					. "\n LEFT JOIN #__jevents_rrule as rr ON rr.eventid = ev.ev_id"
					. "\n WHERE ev.access " . ((version_compare(JVERSION, '1.6.0', '>=')) ? ' IN (' . $groups . ')' : ' <=  ' . $user->gid)
					. "\n AND rpt.rp_id IN (" . implode(",", $ids) . ")";

			$db->setQuery($query);
			$rows = $db->loadObjectList("rp_id");
			foreach ($list_ical as $index => $item)
			{
				$startdate = new JDate(strtotime($item->startrepeat));
				$item->title .= " (" . $startdate->toFormat($dateformat) . ")";

				// Now ensure that the URL is the correc SEF URL
				if (array_key_exists($item->rp_id, $rows))
				{
					$row = $rows[$item->rp_id];
					$event = new jIcalEventRepeat($row);
					$myitemid = 0;
					// I must find the itemid that allows this event to be shown
					$catidsOut = $modcatids = $catidList = $modparams = $showall = "";
					// Use the plugin params to ensure menu item is picked up
					//$modparams = new JParameter($this->_plugin->params);
					$modparams = new JParameter(null);
					// pretend to have category restriction
					$modparams->set("catid0", $row->catid);
					$modparams->set("ignorecatfilter", 1);
					$myitemid = findAppropriateMenuID($catidsOut, $modcatids, $catidList, $modparams->toObject(), $showall);
					$item->href = $event->viewDetailLink($row->yup, $row->mup, $row->dup, false, $myitemid);
					$link = $item->href;
				}
				$list_ical[$index] = $item;
			}
		}
		return $list_ical;

	}

}
