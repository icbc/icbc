<?php
/**
 * JEvents Component for Joomla 1.5.x
 *
 * @version     $Id: calendar_cell.php 2115 2011-05-20 15:05:01Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C) 2008-2009 GWE Systems Ltd, 2006-2008 JEvents Project Group
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

include_once(JEV_VIEWS."/default/month/tmpl/calendar_cell.php");

class EventCalendarCell_geraint extends EventCalendarCell_default{
	function calendarCell(&$currentDay,$year,$month,$i){

		$cfg = & JEVConfig::getInstance();

		$event = $currentDay["events"][$i];
		// Event publication infomation
		$event_up   = new JEventDate( $event->startDate() );
		$event_down = new JEventDate( $event->endDate());

		// BAR COLOR GENERATION
		$bgeventcolor = JEV_CommonFunctions::setColor($event);

		$start_publish  = JevDate::mktime( 0, 0, 0, $event->mup(), $event->dup(), $event->yup() );
		$stop_publish   = JevDate::mktime( 0, 0, 0, $event->mdn(), $event->ddn(), $event->ydn() );

		$title          = $event->title();


		// this file controls the events component month calendar display cell output.  It is separated from the
		// showCalendar function in the events.php file to allow users to customize this portion of the code easier.
		// The event information to be displayed within a month day on the calendar can be modified, as well as any
		// overlay window information printed with a javascript mouseover event.  Each event prints as a separate table
		// row with a single column, within the month table's cell.

		// On mouse over date formats
		// Note that the date formats for the events can be easily changed by modifying the sprintf formatting
		// string below.  These are used for the default overlay window.  As well, the JevDate::strftime() function could
		// also be used instead to provide more powerful date formatting which supports locales if php function
		// set_locale() is being used.

		// define start and end
		$cellStart	= '<div class="eventfull"><div class="eventstyle" ' ;
		$cellStyle	= '';
		$cellEnd		= '</div></div>' . "\n";

		// add the event color as the column background color
		include_once(JPATH_ADMINISTRATOR."/components/".JEV_COM_COMPONENT."/libraries/colorMap.php");

		//$colStyle .= $bgeventcolor ? ' background-color:' . $bgeventcolor . ';' : '';
		//$colStyle .= $bgeventcolor ? 'color:'.JevMapColor($bgeventcolor) . ';' : '';

		// MSIE ignores "inherit" color for links - stupid Microsoft!!!
		//$linkStyle = $bgeventcolor ? 'style="color:'.JevMapColor($bgeventcolor) . ';"' : '';
		$linkStyle = "";

		// The title is printed as a link to the event's detail page
		$link = $this->event->viewDetailLink($year,$month,$currentDay['d0'],false);
		$link = JRoute::_($link.$this->_datamodel->getCatidsOutLink());

		// [mic] if title is too long, cut 'em for display
		$tmpTitle = $title;
		if( JString::strlen( $title ) >= $cfg->get('com_calCutTitle',50)){
			$tmpTitle = JString::substr( $title, 0, $cfg->get('com_calCutTitle',50) ) . ' ...';
		}
		$tmpTitle = JEventsHTML::special($tmpTitle);

		// [new mic] if amount of displaing events greater than defined, show only a scmall coloured icon
		// instead of full text - the image could also be "recurring dependig", which means
		// for each kind of event (one day, multi day, last day) another icon
		// in this case the dfinition must moved down to be more flexible!

		// [tstahl] add a graphic symbol for all day events?
		$tmp_start_time = (($this->start_time == $this->stop_time && !$this->event->noendtime()) || $this->event->alldayevent()) ? '' : $this->start_time;

		$templatedcell = false;
		// set truncated title
		$this->event->_title = $tmpTitle;
		if( $currentDay['countDisplay'] < $cfg->get('com_calMaxDisplay',5)){
			ob_start();
			$templatedcell = $this->loadedFromTemplate('month.calendar_cell', $this->event, 0);
			$res = ob_get_clean();
			if ($templatedcell){
				$templatedcell = $res;
			}			
			else {
				if ($this->_view){
					$this->_view->assignRef("link",$link);
					$this->_view->assignRef("linkStyle",$linkStyle);
					$this->_view->assignRef("tmp_start_time",$tmp_start_time);
					$this->_view->assignRef("tmpTitle",$tmpTitle);
				}
				$title_event_link = $this->loadOverride("cellcontent");
				// allow fallback to old method
				if ($title_event_link==""){
					$title_event_link = "\n".'<a class="cal_titlelink" href="' . $link . '" '.$linkStyle.'>'
					. ( $cfg->get('com_calDisplayStarttime') ? $tmp_start_time : '' ) . ' ' . $tmpTitle . '</a>' . "\n";
				}
				$cellStyle .= "border-width:0px 0px 1px 8px;border-color:$bgeventcolor;padding:0px 0px 1px 2px;";
			}
		}else{
			$eventIMG	= '<img align="left" src="' . JURI::root()
			. 'components/'.JEV_COM_COMPONENT.'/images/event.png" alt="" style="height:12px;width:8px;border:1px solid white;background-color:'.$bgeventcolor.'" />';

			$title_event_link = "\n".'<a class="cal_titlelink" href="' . $link . '">' . $eventIMG . '</a>' . "\n";
			$cellStyle .= ' float:left;width:10px;';
		}

		$cellString	= '';
		// allow template overrides for cell popups
		// only try override if we have a view reference
		if ($this->_view){
			$this->_view->assignRef("ecc",$this);
			$this->_view->assignRef("cellDate",$currentDay["cellDate"]);
		}

		if( $cfg->get("com_enableToolTip",1)) {
			if ($cfg->get("tooltiptype",'overlib')=='overlib'){
				$tooltip = $this->loadOverride("overlib");
				// allow fallback to old method
				if ($tooltip==""){
					$tooltip=$this->calendarCell_popup($currentDay["cellDate"]);
				}
				$cellString .= $tooltip;
			}
			else {
				// TT background
				if( $cfg->get('com_calTTBackground',1) == '1' ){
					$bground =  $this->event->bgcolor();
					$fground =  $this->event->fgcolor();
				}
				else {
					$bground =  "#000000";
					$fground =   "#ffffff";

				}

				$toolTipArray = array('className'=>'jevtip');
				JHTML::_('behavior.tooltip', '.hasjevtip', $toolTipArray);

				$tooltip = $this->loadOverride("tooltip");
				// allow fallback to old method
				if ($tooltip==""){
					$tooltip = $this->calendarCell_tooltip($currentDay["cellDate"]);
				}

				if (strpos($tooltip,"templated")===0 ) {
					$title = substr($tooltip,9);
					$cellString = "";
				}
				else {
					$cellString .= '<div class="jevtt_text" >'.$tooltip.'</div>';
					$title = '<div class="jevtt_title" style = "color:'.$fground.';background-color:'.$bground.'">'.$this->title.'</div>';
				}
				
				if ($templatedcell){
					$templatedcell = str_replace("[[TOOLTIP]]", htmlspecialchars($title.$cellString,ENT_QUOTES), $templatedcell);
					$time = $cfg->get('com_calDisplayStarttime')?$tmp_start_time:"";
					$templatedcell = str_replace("[[EVTTIME]]", $time, $templatedcell);
					return  $templatedcell;
				}
				
				$html =  $cellStart . ' style="' . $cellStyle . '">' . $this->tooltip( $title.$cellString, $title_event_link) . $cellEnd;

				return $html;
			}

		}

		// return the whole thing
		return $cellStart . ' style="' . $cellStyle . '" ' . $cellString . ">\n" . $title_event_link . $cellEnd;
	}
}?>
