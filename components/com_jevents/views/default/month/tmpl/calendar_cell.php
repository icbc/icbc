<?php
/**
 * JEvents Component for Joomla 1.5.x
 *
 * @version     $Id: calendar_cell.php 2324 2011-07-17 10:29:09Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C) 2008-2009 GWE Systems Ltd, 2006-2008 JEvents Project Group
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

class EventCalendarCell_default  extends JEventsDefaultView {
	protected $_datamodel = null;
	protected $_view = null;

	function __construct($event, $datamodel, $view=false){
		$cfg = & JEVConfig::getInstance();
		$this->event = $event;
		$this->_datamodel = $datamodel;
		$this->_view = $view;

		$this->start_publish  = $this->event->getUnixStartDate();
		$this->stop_publish  = $this->event->getUnixEndDate();
		$this->title          = $this->event->title();

		// On mouse over date formats
		$this->start_date	= JEventsHTML::getDateFormat( $this->event->yup(), $this->event->mup(), $this->event->dup(), 0 );
		//$this->start_time = $this->event->startTime()	;
		$this->start_time = JEVHelper::getTime($this->event->getUnixStartTime(),$this->event->hup(),$this->event->minup());

		$this->stop_date	= JEventsHTML::getDateFormat(  $this->event->ydn(), $this->event->mdn(), $this->event->ddn(), 0 );
		//$this->stop_time = $this->event->endTime()	;		
		$this->stop_time  = JEVHelper::getTime($this->event->getUnixEndTime(),$this->event->hdn(),$this->event->mindn());
		
		$this->stop_time_midnightFix = $this->stop_time ;
		$this->stop_date_midnightFix = $this->stop_date ;
		if ($this->event->sdn() == 59 && $this->event->mindn()==59){
			$this->stop_time_midnightFix = JEVHelper::getTime($this->event->getUnixEndTime()+1,0,0);
			$this->stop_date_midnightFix = JEventsHTML::getDateFormat(  $this->event->ydn(), $this->event->mdn(), $this->event->ddn()+1, 0 );
		}
		
		// we only need the one helper so stick to default layout here!
		$this->jevlayout="default";	
		
		$this->addHelperPath(JEV_VIEWS."/default/helpers");
		$this->addHelperPath( JPATH_BASE.DS.'templates'.DS.JFactory::getApplication()->getTemplate().DS.'html'.DS.JEV_COM_COMPONENT.DS."helpers");

		// attach data model
		$reg = & JevRegistry::getInstance("jevents");
		$this->datamodel  =  $reg->getReference("jevents.datamodel");

	}
	
	function calendarCell_popup($cellDate){
		$cfg = & JEVConfig::getInstance();

		$publish_inform_title 	= htmlspecialchars( $this->title );
		$publish_inform_overlay	= '';
		$cellString="";
		// The one overlay popup window defined for multi-day events.  Any number of different overlay windows
		// can be defined here and used according to the event's repeat type, length, whatever.  Note that the
		// definition of the overlib function call arguments is ( html_window_contents, extra optional paramenters ... )
		// 'extra parameters' includes things like window positioning, display delays, window caption, etc.
		// Documentation on the javascript overlib library can be found at: http://www.bosrup.com/web/overlib/
		// or here for additional plugins (like shadow): http://overlib.boughner.us/ [mic]

		// check this speeds up that thing [mic]		// TODO if $publish_inform_title  is blank we get problems
		$tmp_time_info = '';
		if( $publish_inform_title ){
			if( $this->stop_publish == $this->start_publish ){
				if ($this->event->noendtime()){
					$tmp_time_info = '<br />' . $this->start_time;
				}
				else if ($this->event->alldayevent()){
					$tmp_time_info = "";
				}
				else if($this->start_time != $this->stop_time ){
					$tmp_time_info = '<br />' . $this->start_time . ' - ' . $this->stop_time_midnightFix;
				}
				else {
					$tmp_time_info = '<br />' . $this->start_time;
				}

				$publish_inform_overlay = '<table style="border:0px;height:100%">'
				. '<tr><td nowrap=&quot;nowrap&quot;>' . $this->start_date
				. $tmp_time_info
				;
			} else {
				if ($this->event->noendtime()){
					$tmp_time_info = '<br /><b>' . JText::_('JEV_TIME') . ':&nbsp;</b>' . $this->start_time;
				}
				else if($this->start_time != $this->stop_time && !$this->event->alldayevent()){
					$tmp_time_info = '<br /><b>' . JText::_('JEV_TIME') . ':&nbsp;</b>' . $this->start_time . '&nbsp;-&nbsp;' . $this->stop_time_midnightFix;
				}
				$publish_inform_overlay = '<table style="border:0px;width:100%;height:100%">'
				. '<tr><td><b>' . JText::_('JEV_FROM') . ':&nbsp;</b>' . $this->start_date . '&nbsp;'
				. '<br /><b>' . JText::_('JEV_TO') . ':&nbsp;</b>' . $this->stop_date
				. $tmp_time_info
				;
			}
		}

		// Event Repeat Type Qualifier and Day Within Event Quailfiers:
		// the if statements below basically will print different information for the event
		// depending upon whether it is the start/stop day, repeat events type, or some date in between the
		// start and the stop dates of a multi-day event.  This behavior can be modified at will here.
		// Currently, an overlay window will only display on a mouseover if the event is a multi-day
		// event (ie. every day repeat type) AND the month cell is a day WITHIN the event day range BUT NOT
		// the start and stop days.  The overlay window displays the start and stop publish dates.  Different
		// overlay windows can be displayed for the different states below by simply defining a new overlay
		// window definition variable similar to the $publish_inform_overlay variable above and using it in the
		// statements below.  Another possibility here is to control the max. length of any string used within the
		// month cell to avoid calendar formatting issues.  Any string that exceeds this will get an overlay window
		// in order to display the full length/width of the month cell.

		// Note that we want multi-day events to display a titlelink for the first day only, but a popup for every day
		// Fix this.

		if ($this->event->alldayevent() && $this->start_date==$this->stop_date){
			// just print the title
			$cellString = $publish_inform_overlay
			. '<br /><span style="font-weight:bold">' . ($this->event->isRepeat()?JText::_("JEV_REPEATING_EVENT"):JText::_('JEV_FIRST_SINGLE_DAY_EVENT') ). '</span>';
		}
		else if(( $cellDate == $this->stop_publish ) && ( $this->stop_publish == $this->start_publish )) {
			// single day event
			// just print the title
			$cellString = $publish_inform_overlay
			. '<br /><span style="font-weight:bold">' . ($this->event->isRepeat()?JText::_("JEV_REPEATING_EVENT"):JText::_('JEV_FIRST_SINGLE_DAY_EVENT') ) . '</span>';
		}elseif( $cellDate == $this->start_publish ){
			// first day of a multi-day event
			// just print the title
			$cellString = $publish_inform_overlay
			. '<br /><span style="font-weight:bold">' . JText::_('JEV_FIRST_DAY_OF_MULTIEVENT') . '</span>';
		}elseif( $cellDate == $this->stop_publish ){
			// last day of a multi-day event
			// enable an overlib popup
			$cellString = $publish_inform_overlay
			. '<br /><span style="font-weight:bold">' . JText::_('JEV_LAST_DAY_OF_MULTIEVENT') . '</span>';
		}elseif(( $cellDate < $this->stop_publish ) && ( $cellDate > $this->start_publish ) ) {
			// middle day of a multi-day event
			// enable the display of an overlib popup describing publish date
			$cellString = $publish_inform_overlay
			. '<br /><span style="font-weight:bold">' . JText::_('JEV_MULTIDAY_EVENT') . '</span>';
		}else{
			// this should never happen, but is here just in case...
			$cellString =  $publish_inform_overlay.'<br /><small><div style="background-color:yellow;color:black;font-weight:bold">Problems - check event!</div></small>';
			$title_event_link = "<div style='color:black!important;background-color:yellow!important;font-weight:bold'>Problems - check event!</div>";
			$cellStart   = '';
			$cellStyle   = '';
			$cellEnd     = '';
		}

		/**
 * defining the design of the tooltip
 * AUTOSTATUSCAP 	displays title in browsers statusbar (only IE)
 * if no vlaus are defined, the overlib standard values are used
 * TT backgrund	bool
 * TT posX		string	left, center, right (right = standard)
 * TT posY		string	above, below (below = standard)
 * shadow		bool
 * shadox posX	bool (standard = right)
 * shadow posY	bool (standard = below)
 * FGCOLOR		string	set here fix (could be also defined in config - later)
 * CAPCOLOR		string	set here fix (could be also defined in config - later)
 **/

		// set standard values
		$ttBGround 		= '';
		$ttXPos 		= '';
		$ttYPos 		= '';
		$ttShadow 		= '';
		$ttShadowColor  = '';
		$ttShadowX      = '';
		$ttShadowY      = '';

		// TT background
		if( $cfg->get('com_calTTBackground',1) == '1' ){
			$ttBGround = ' BGCOLOR, \'' . $this->event->bgcolor() . '\',';
			$ttFGround = ' CAPCOLOR, \'' . $this->event->fgcolor() . '\',';
		}
		else $ttFGround = ' CAPCOLOR, \'#000000\',';

		// TT xpos
		if( $cfg->get('com_calTTPosX') == 'CENTER' ){
			$ttXPos = ' CENTER,';
		}elseif( $cfg->get('com_calTTPosX') == 'LEFT' ){
			$ttXPos = ' LEFT,';
		}

		// TT ypos
		if( $cfg->get('com_calTTPosY') == 'ABOVE' ){
			$ttYPos = ' ABOVE,';
		}

		/* TT shadow in inside the positions
		* shadowX is fixec with 15px (above)
		* shadowY is fixed with -10px (right)
		* we also define here the shadow color (fix value - can overridden by the config later)
		*/
		if( $cfg->get('com_calTTShadow') == '1' ){
			$ttShadow 		= ' SHADOW,';
			$ttShadowColor 	= ' SHADOWCOLOR, \'#999999\',';

			if( $cfg->get('com_calTTShadowX') == '1' ){
				$ttShadowX = ' SHADOWX, -4,';
			}

			if( $cfg->get('com_calTTShadowY') == '1' ){
				$ttShadowY = ' SHADOWY, -4,';
			}
		}

		$cellString .= '<hr />'
		// Watch out for mambots !!
		//. $this->event->content
		//. '<hr />' // [maybe later mic]
		. '<small>' . JText::_('JEV_CLICK_TO_OPEN_EVENT') . '</small>'
		. '</td></tr></table>';

		// harden the string for overlib
		$cellString =  '\'' . addcslashes($cellString, '\'') . '\'';

		// add more overlib parameters
		$cellString .= ', CAPTION, \'' . addcslashes($publish_inform_title, '\'') . '\',' . $ttYPos . $ttXPos
		. ' FGCOLOR, \'#FFFFE2\',' . $ttBGround. $ttFGround
		. $ttShadow . $ttShadowY . $ttShadowX . $ttShadowColor . ' AUTOSTATUSCAP';

		$cellString = ' onmouseover="return overlib('.htmlspecialchars($cellString).')"';
		$cellString .=' onmouseout="return nd();"';
		return $cellString;
	}

	function calendarCell_tooltip($cellDate){
		$cfg = & JEVConfig::getInstance();

		$publish_inform_title 	= htmlspecialchars( $this->title );
		$publish_inform_overlay	= '';
		$cellString="";
		// The one overlay popup window defined for multi-day events.  Any number of different overlay windows
		// can be defined here and used according to the event's repeat type, length, whatever.  Note that the
		$tmp_time_info = '';
		if( $publish_inform_title ){
			if( $this->stop_publish == $this->start_publish ){
				if ($this->event->noendtime()){
					$tmp_time_info = '<br />' . $this->start_time;
				}
				else if ($this->event->alldayevent()){
					$tmp_time_info = "";
				}
				else if($this->start_time != $this->stop_time ){
					$tmp_time_info = '<br />' . $this->start_time . ' - ' . $this->stop_time_midnightFix;
				}
				else {
					$tmp_time_info = '<br />' . $this->start_time;
				}

				$publish_inform_overlay = $this->start_date	. $tmp_time_info
				;
			} else {
				if ($this->event->noendtime()){
					$tmp_time_info = '<br /><strong>' . JText::_('JEV_TIME') . ':&nbsp;</strong>' . $this->start_time;
				}
				else if($this->start_time != $this->stop_time && !$this->event->alldayevent()){
					$tmp_time_info = '<br /><strong>' . JText::_('JEV_TIME') . ':&nbsp;</strong>' . $this->start_time . '&nbsp;-&nbsp;' . $this->stop_time_midnightFix;
				}
				$publish_inform_overlay =  '<strong>' . JText::_('JEV_FROM') . ':&nbsp;</strong>' . $this->start_date . '&nbsp;'
				. '<br /><strong>' . JText::_('JEV_TO') . ':&nbsp;</strong>' . $this->stop_date
				. $tmp_time_info
				;
			}
		}

		// Event Repeat Type Qualifier and Day Within Event Quailfiers:

		if ($this->event->alldayevent() && $this->start_date==$this->stop_date){
			// just print the title
			$cellString = $publish_inform_overlay
			. '<br /><span style="font-weight:bold">' . ($this->event->isRepeat()?JText::_("JEV_REPEATING_EVENT"):JText::_('JEV_FIRST_SINGLE_DAY_EVENT') ). '</span>';
		}
		else if(( $cellDate == $this->stop_publish ) && ( $this->stop_publish == $this->start_publish )) {
			// single day event
			// just print the title
			$cellString = $publish_inform_overlay
			. '<br /><span style="font-weight:bold">' . ($this->event->isRepeat()?JText::_("JEV_REPEATING_EVENT"):JText::_('JEV_FIRST_SINGLE_DAY_EVENT') ) . '</span>';
		}elseif( $cellDate == $this->start_publish ){
			// first day of a multi-day event
			// just print the title
			$cellString = $publish_inform_overlay
			. '<br /><span style="font-weight:bold">' . JText::_('JEV_FIRST_DAY_OF_MULTIEVENT') . '</span>';
		}elseif( $cellDate == $this->stop_publish ){
			// last day of a multi-day event
			// enable an overlib popup
			$cellString = $publish_inform_overlay
			. '<br /><span style="font-weight:bold">' . JText::_('JEV_LAST_DAY_OF_MULTIEVENT') . '</span>';
		}elseif(( $cellDate < $this->stop_publish ) && ( $cellDate > $this->start_publish ) ) {
			// middle day of a multi-day event
			// enable the display of an overlib popup describing publish date
			$cellString = $publish_inform_overlay
			. '<br /><span style="font-weight:bold">' . JText::_('JEV_MULTIDAY_EVENT') . '</span>';
		}else{
			// this should never happen, but is here just in case...
			$cellString =  $publish_inform_overlay.'<br /><small><div style="background-color:yellow;color:black;font-weight:bold">Problems - check event!</div></small>';
			$title_event_link = "<div style='color:black!important;background-color:yellow!important;font-weight:bold'>Problems - check event!</div>";
		}


		ob_start();
		$templated = $this->loadedFromTemplate('month.calendar_tip', $this->event, 0);
		$res = ob_get_clean();
		if ($templated){
			$res = str_replace("[[TTTIME]]",$cellString, $res);
			return "templated".$res;
		}

		//$cellString .= '<br />'.$this->event->content();
		$cellString .= '<hr />'
		. '<small>' . JText::_('JEV_CLICK_TO_OPEN_EVENT') . '</small>';
		return $cellString;

		// harden the string for the tooltip
		$cellString =  '\'' . addcslashes($cellString, '\'') . '\'';

	}

	function calendarCell(&$currentDay,$year,$month,$i){

		$cfg = & JEVConfig::getInstance();

		// this file controls the events component month calendar display cell output.  It is separated from the
		// showCalendar function in the events.php file to allow users to customize this portion of the code easier.
		// The event information to be displayed within a month day on the calendar can be modified, as well as any
		// overlay window information printed with a javascript mouseover event.  Each event prints as a separate table
		// row with a single column, within the month table's cell.

		// define start and end
		$cellStart	= '<div';
		$cellStyle	= 'padding:0;';
		$cellEnd		= '</div>' . "\n";

		// add the event color as the column background color
		$cellStyle .= ' background-color:' . $this->event->bgcolor() . ';color:'.$this->event->fgcolor() . ';' ;

		// MSIE ignores "inherit" color for links - stupid Microsoft!!!
		$linkStyle = 'style="color:'.$this->event->fgcolor() . ';"';

		// The title is printed as a link to the event's detail page
		$link = $this->event->viewDetailLink($year,$month,$currentDay['d0'],false);
		$link = JRoute::_($link.$this->_datamodel->getCatidsOutLink());

		// [mic] if title is too long, cut 'em for display
		$tmpTitle = $this->title;
		if( JString::strlen( $this->title ) >= $cfg->get('com_calCutTitle',50)){
			$tmpTitle = JString::substr( $this->title, 0, $cfg->get('com_calCutTitle',50) ) . ' ...';
		}
		$tmpTitle = JEventsHTML::special($tmpTitle);

		// [new mic] if amount of displaing events greater than defined, show only a scmall coloured icon
		// instead of full text - the image could also be "recurring dependig", which means
		// for each kind of event (one day, multi day, last day) another icon
		// in this case the dfinition must moved down to be more flexible!

		// [tstahl] add a graphic symbol for all day events?
		$tmp_start_time = (($this->start_time == $this->stop_time && !$this->event->noendtime()) || $this->event->alldayevent()) ? '' : $this->start_time;

		$templatedcell = false;
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
					$title_event_link = '<a class="cal_titlelink" href="' . $link . '" '.$linkStyle.'>'
					. ( $cfg->get('com_calDisplayStarttime') ? $tmp_start_time : '' ) . ' ' . $tmpTitle . '</a>' . "\n";
				}
				$cellStyle .= ' width:100%;';
			}
		}else{
			$eventIMG	= '<img align="left" style="border:1px solid white;" src="' . JURI::root()
			. 'components/'.JEV_COM_COMPONENT.'/images/event.png" height="12" width="8" alt=""' . ' />';

			$title_event_link = '<a class="cal_titlelink" href="' . $link . '">' . $eventIMG . '</a>' . "\n";
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
				$tooltip = $this->correctTooltipLanguage($tooltip);

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

	function tooltip($tooltip,  $link)
	{
		//$tooltip	= addslashes(htmlspecialchars($tooltip));
		$tooltip	= htmlspecialchars($tooltip,ENT_QUOTES);

		$tip = '<span class="editlinktip hasjevtip" title="'.$tooltip.'" rel=" ">'.$link.'</span>';

		return $tip;
	}

	function loadOverride($tpl){
		$tooltip = "";
		// only try override if we have a view reference
		if ($this->_view){

			//create the template file name based on the layout
			$file = $this->_view->getLayout().'_'.$tpl;
			// clean the file name
			$file = preg_replace('/[^A-Z0-9_\.-]/i', '', $file);

			// load the template script
			jimport('joomla.filesystem.path');
			$filetofind	= strtolower($file).".php";
			if ( JPath::find($this->_view->_path['template'], $filetofind)){
				$tooltip = $this->_view->loadTemplate($tpl);
			}
		}
		return $tooltip;
	}
	
	protected function correctTooltipLanguage($tip){
		return str_replace(JText::_("JEV_FIRST_DAY_OF_MULTIEVENT"), JText::_("JEV_MULTIDAY_EVENT"), $tip);
	}
	
}
