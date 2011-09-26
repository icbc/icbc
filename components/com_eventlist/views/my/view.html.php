<?php
/**
 * @version 1.0 $Id: view.html.php 991 2009-03-26 08:56:38Z julienv $
 * @package Joomla
 * @subpackage EventList
 * @copyright (C) 2005 - 2009 Christoph Lukes
 * @license GNU/GPL, see LICENSE.php
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
defined('_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.view');

/**
 * HTML View class for the EventList View
 *
 * @package Joomla
 * @subpackage EventList
 * @since 1.0
 */
class EventListViewMy extends JView
{
    /**
     * Creates the MyItems View
     *
     * @since 1.0
     */
    function display($tpl = null)
    {
        global $mainframe;

        //initialize variables
        $document = & JFactory::getDocument();
        $elsettings = & ELHelper::config();
        $menu = & JSite::getMenu();
        $item = $menu->getActive();
        $params = & $mainframe->getParams();
        $uri = & JFactory::getURI();
        $pathway = & $mainframe->getPathWay();

        //add css file
        $document->addStyleSheet($this->baseurl.'/components/com_eventlist/assets/css/eventlist.css');
        $document->addCustomTag('<!--[if IE]><style type="text/css">.floattext{zoom:1;}, * html #eventlist dd { height: 1%; }</style><![endif]-->');

        // get variables
        $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
        $limit = $mainframe->getUserStateFromRequest('com_eventlist.my.limit', 'limit', $params->def('display_num', 5), 'int');
        $task = JRequest::getWord('task');
        $pop = JRequest::getBool('pop');

        //get data from model
        $events = & $this->get('Events');
        $venues = & $this->get('Venues');
        $attending = & $this->get('Attending');

        //paginations
        $events_pageNav = & $this->get('EventsPagination');
        $venues_pageNav = & $this->get('VenuesPagination');
        $attending_pageNav = & $this->get('AttendingPagination');

        //params
        $params->def('page_title', $item->name);

        if ($pop)
        {//If printpopup set true
            $params->set('popup', 1);
        }

        //pathway
        $pathway->setItemName(1, $item->name);

        //Set Page title

        $pagetitle = $params->get('page_title', JText::_('MY ITEMS'));
        $mainframe->setPageTitle($pagetitle);
        $mainframe->addMetaTag('title', $pagetitle);

        //create select lists
        $lists = $this->_buildSortLists();

        if ($lists['filter'])
        {
            //$uri->setVar('filter', JRequest::getString('filter'));
            //$filter   = $mainframe->getUserStateFromRequest('com_eventlist.eventlist.filter', 'filter', '', 'string');
            $uri->setVar('filter', $lists['filter']);
            $uri->setVar('filter_type', JRequest::getString('filter_type'));
        } else
        {
            $uri->delVar('filter');
            $uri->delVar('filter_type');
        }

        $this->assign('action', $uri->toString());

        $this->assignRef('events', $events);
        $this->assignRef('venues', $venues);
        $this->assignRef('attending', $attending);
        $this->assignRef('task', $task);
        $this->assignRef('print_link', $print_link);
        $this->assignRef('params', $params);
        $this->assignRef('dellink', $dellink);
        $this->assignRef('events_pageNav', $events_pageNav);
        $this->assignRef('venues_pageNav', $venues_pageNav);
        $this->assignRef('attending_pageNav', $attending_pageNav);
        $this->assignRef('elsettings', $elsettings);
        $this->assignRef('pagetitle', $pagetitle);
        $this->assignRef('lists', $lists);

        parent::display($tpl);

    }


    /**
     * Method to build the sortlists
     *
     * @access private
     * @return array
     * @since 0.9
     */
    function _buildSortLists()
    {
        $elsettings = & ELHelper::config();

        $filter_order = JRequest::getCmd('filter_order', 'a.dates');
        $filter_order_Dir = JRequest::getWord('filter_order_Dir', 'ASC');

        $filter = $this->escape(JRequest::getString('filter'));
        $filter_type = JRequest::getString('filter_type');

        $sortselects = array ();
        if ($elsettings->showtitle == 1)
        {
            $sortselects[] = JHTML::_('select.option', 'title', $elsettings->titlename);
        }
        if ($elsettings->showlocate == 1)
        {
            $sortselects[] = JHTML::_('select.option', 'venue', $elsettings->locationname);
        }
        if ($elsettings->showcity == 1)
        {
            $sortselects[] = JHTML::_('select.option', 'city', $elsettings->cityname);
        }
        if ($elsettings->showcat)
        {
            $sortselects[] = JHTML::_('select.option', 'type', $elsettings->catfroname);
        }
        $sortselect = JHTML::_('select.genericlist', $sortselects, 'filter_type', 'size="1" class="inputbox"', 'value', 'text', $filter_type);

        $lists['order_Dir'] = $filter_order_Dir;
        $lists['order'] = $filter_order;
        $lists['filter'] = $filter;
        $lists['filter_types'] = $sortselect;

        return $lists;
    }
}
?>
