<?php
/**
 * JEvents Component for Joomla 1.5.x
 *
 * @version     $Id: view.html.php 1975 2011-04-27 15:52:33Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C)  2008-2009 GWE Systems Ltd
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
 * HTML View class for the component
 *
 * @static
 */
class AdminCPanelViewCPanel extends JEventsAbstractView 
{
	/**
	 * Control Panel display function
	 *
	 * @param template $tpl
	 */
	function cpanel($tpl = null)
	{
		jimport('joomla.html.pane');
		
		// WHY THE HELL DO THEY BREAK PUBLIC FUNCTIONS !!!
		if (JVersion::isCompatible("1.6.0")) JHTML::stylesheet( 'administrator/components/'.JEV_COM_COMPONENT.'/assets/css/eventsadmin.css');
		else JHTML::stylesheet( 'eventsadmin.css', 'administrator/components/'.JEV_COM_COMPONENT.'/assets/css/' );

		$document =& JFactory::getDocument();
		$document->setTitle(JText::_( 'JEVENTS' ) . ' :: ' .JText::_( 'JEVENTS' ));
		
		// Set toolbar items for the page
		//JToolBarHelper::preferences('com_jevents', '580', '750');
		JToolBarHelper::title( JText::_( 'JEVENTS' ) .' :: '. JText::_( 'JEVENTS' ), 'jevents' );
		/*
		$user= JFactory::getUser();
		if ($user->authorise('core.admin','com_jevents.admin')) {
			JToolBarHelper::preferences('com_jevents' , '600', $width = '950');
		}
		*/

		$this->_hideSubmenu();
		
		
		if (JFactory::getApplication()->isAdmin()){
			//JToolBarHelper::preferences(JEV_COM_COMPONENT, '580', '750');
		}
		//JToolBarHelper::help( 'screen.cpanel', true);

		JSubMenuHelper::addEntry(JText::_( 'CONTROL_PANEL' ), 'index.php?option='.JEV_COM_COMPONENT, true);
		
		$params = JComponentHelper::getParams(JEV_COM_COMPONENT);
		//$section = $params->getValue("section",0);
		
		JHTML::_('behavior.tooltip');
	}	

	 /**
	  * render News feed from JEvents portal
	  */
	 function renderJEventsNews() {
	 	
	 	$output = '';

		//  get RSS parsed object
		$options = array();
		$options['rssUrl']		= 'http://www.jevents.net/jevnews?format=feed&type=rss';
		$options['cache_time']	= 86400;

		$rssDoc =& JFactory::getXMLparser('RSS', $options);

		if ( $rssDoc == false ) {
			$output = JText::_('Error: Feed not retrieved');
		} else {	
			// channel header and link
			$title 	= str_replace(" ","_",$rssDoc->get_title());
			$link	= $rssDoc->get_link();
			
			$output = '<table class="adminlist">';
			$output .= '<tr><th><a href="'.$link.'" target="_blank">'.JText::_($title) .'</th></tr>';
			
			$items = array_slice($rssDoc->get_items(), 0, 3);
			$numItems = count($items);
            if($numItems == 0) {
            	$output .= '<tr><th>' .JText::_('JEV_No_news'). '</th></tr>';
            } else {
	           	$k = 0;
                for( $j = 0; $j < $numItems; $j++ ) {
                    $item = $items[$j];
                	$output .= '<tr><td class="row' .$k. '">';
                	$output .= '<a href="' .$item->get_link(). '" target="_blank">' .$item->get_title(). '</a>';
					if($item->get_description()) {
	                	$description = $this->limitText($item->get_description(), 50);
						$output .= '<br />' .$description;
					}
                	$output .= '</td></tr>';
					$k = 1 - $k;
                }
            }
						
			$output .= '</table>';
		}	 	
	 	return $output;
	 }

	function limitText($text, $wordcount)
	{
		if(!$wordcount) {
			return $text;
		}

		$texts = explode( ' ', $text );
		$count = count( $texts );

		if ( $count > $wordcount )
		{
			$text = '';
			for( $i=0; $i < $wordcount; $i++ ) {
				$text .= ' '. $texts[$i];
			}
			$text .= '...';
		}

		return $text;
	}
	 
	
}