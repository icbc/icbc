<?php
/**
 * JEvents Component for Joomla 1.5.x
 *
 * @version     $Id: view.html.php 2164 2011-06-07 13:28:19Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C) 2008-2009 GWE Systems Ltd
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
 * HTML View class for the component frontend
 *
 * @static
 */

class ICalsViewICals extends JEventsAbstractView 
{
	
	function export($tpl = null)
	{
		parent::displaytemplate($tpl);
		
	}	

	protected function setDescription($desc)
	{
		// TODO - run this through plugins first ?

		$icalformatted = JRequest::getInt("icf", 0);
		if (!$icalformatted)
			$description = $this->replacetags($desc);
		else
			$description = $desc;

		// wraplines	from vCard class
		$cfg = & JEVConfig::getInstance();
		if ($cfg->get("outlook2003icalexport", 0))
		{
			return "DESCRIPTION:" . $this->wraplines($description, 76, false);
		}
		else
		{
			return "DESCRIPTION;ENCODING=QUOTED-PRINTABLE:" . $this->wraplines($description);

	}
	}

	protected function replacetags($description)
	{
		$description = str_replace('<p>', '\n\n', $description);
		$description = str_replace('<P>', '\n\n', $description);
		$description = str_replace('</p>', '\n', $description);
		$description = str_replace('</P>', '\n', $description);
		$description = str_replace('<p/>', '\n\n', $description);
		$description = str_replace('<P/>', '\n\n', $description);
		$description = str_replace('<br />', '\n', $description);
		$description = str_replace('<br/>', '\n', $description);
		$description = str_replace('<br>', '\n', $description);
		$description = str_replace('<BR />', '\n', $description);
		$description = str_replace('<BR/>', '\n', $description);
		$description = str_replace('<BR>', '\n', $description);
		$description = str_replace('<li>', '\n - ', $description);
		$description = str_replace('<LI>', '\n - ', $description);
		$description = strip_tags($description);
		//$description 	= strtr( $description,	array_flip(get_html_translation_table( HTML_ENTITIES ) ) );
		//$description 	= preg_replace( "/&#([0-9]+);/me","chr('\\1')", $description );
		return $description;

	}

	protected function wraplines($input, $line_max = 76, $quotedprintable = false)
	{
		$hex = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');
		$eol 		= "\r\n";
		
		$input = str_replace($eol, "", $input);

		// new version

		$output = '';
		while (JString::strlen($input)>=$line_max){
			$output .= JString::substr($input,0,$line_max-1);
			$input = JString::substr($input,$line_max-1);
			if (strlen($input)>0){
		  		 $output .= $eol." ";
			}
		}
		if (strlen($input)>0){
			$output .= $input;
		}
		return $output;
		
		$escape = '=';
		$output = '';
		$outline = "";
		$newline = ' ';

		$linlen = JString::strlen($input);

		
		for ($i = 0; $i < $linlen; $i++)
		{
			$c = JString::substr($input, $i, 1);

			/*
			$dec = ord($c);
			  if (!$quotedprintable) {
			  if (($dec == 32) && ($i == ($linlen - 1))) { // convert space at eol only
			  $c = '=20';
			  } elseif (($dec == 61) || ($dec < 32 ) || ($dec > 126)) { // always encode "\t", which is *not* required
			  $h2 = floor($dec / 16);
			  $h1 = floor($dec % 16);
			  $c = $escape . $hex["$h2"] . $hex["$h1"];
			  }
			  }
			 */
			if ((strlen($outline) + 1) >= $line_max)
			{ // CRLF is not counted
				$output .= $outline . $eol . $newline; // soft line break; "\r\n" is okay
				$outline = $c;
				//$newline .= " ";
			}
			else
			{
				$outline .= $c;
			}
		} // end of for
		$output .= $outline;

		return trim($output);

	}
	
	protected function vtimezone($icalEvents)
	{
			$params = JComponentHelper::getParams(JEV_COM_COMPONENT);

			$tzid = "";
			return $tzid;
			if (is_callable("date_default_timezone_set"))
			{
				$current_timezone = date_default_timezone_get();
				// Do the Timezone definition
				$tzid = ";TZID=$current_timezone";
				// find the earliest start date
				$firststart = false;
				foreach ($icalEvents as $a)
				{
					if (!$firststart || $a->getUnixStartTime() < $firststart)
						$firststart = $a->getUnixStartTime();
				}
				// Subtract 1 leap year to make sure we have enough transitions
				$firststart -= 31622400;
				$timezone = new DateTimeZone($current_timezone);

				if (version_compare(PHP_VERSION, "5.3.0") >= 0)
				{
					$transitions = $timezone->getTransitions($firststart);
				}
				else
				{
					$transitions = $timezone->getTransitions();
				}
				$tzindex = 0;
				while (JevDate::strtotime($transitions[$tzindex]['time']) < $firststart)
				{
					$tzindex++;
				}
				$transitions = array_slice($transitions, $tzindex);
				if (count($transitions) >= 2)
				{
					$lastyear = $params->get("com_latestyear", 2020);
					echo "BEGIN:VTIMEZONE\n";
					echo "TZID:$current_timezone\n";
					for ($t = 0; $t < count($transitions); $t++)
					{
						$transition = $transitions[$t];
						if ($transition['isdst'] == 0)
						{
							if (JevDate::strftime("%Y", $transition['ts']) > $lastyear)
								continue;
							echo "BEGIN:STANDARD\n";
							echo "DTSTART:" . JevDate::strftime("%Y%m%dT%H%M%S\n", $transition['ts']);
							if ($t < count($transitions) - 1)
							{
								echo "RDATE:" . JevDate::strftime("%Y%m%dT%H%M%S\n", $transitions[$t + 1]['ts']);
							}
							// if its the first transition then assume the old setting is the same as the next otherwise use the previous value
							$prev = $t;
							$prev += ( $t == 0) ? 1 : -1;

							$offset = $transitions[$prev]["offset"];
							$sign = $offset >= 0 ? "" : "-";
							$offset = abs($offset);
							$offset = $sign . sprintf("%04s", (floor($offset / 3600) * 100 + $offset % 60));
							echo "TZOFFSETFROM:$offset\n";

							$offset = $transitions[$t]["offset"];
							$sign = $offset >= 0 ? "" : "-";
							$offset = abs($offset);
							$offset = $sign . sprintf("%04s", (floor($offset / 3600) * 100 + $offset % 60));
							echo "TZOFFSETTO:$offset\n";
							echo "TZNAME:$current_timezone " . $transitions[$t]["abbr"] . "\n";
							echo "END:STANDARD\n";
						}
					}
					for ($t = 0; $t < count($transitions); $t++)
					{
						$transition = $transitions[$t];
						if ($transition['isdst'] == 1)
						{
							if (JevDate::strftime("%Y", $transition['ts']) > $lastyear)
								continue;
							echo "BEGIN:DAYLIGHT\n";
							echo "DTSTART:" . JevDate::strftime("%Y%m%dT%H%M%S\n", $transition['ts']);
							if ($t < count($transitions) - 1)
							{
								echo "RDATE:" . JevDate::strftime("%Y%m%dT%H%M%S\n", $transitions[$t + 1]['ts']);
							}
							// if its the first transition then assume the old setting is the same as the next otherwise use the previous value
							$prev = $t;
							$prev += ( $t == 0) ? 1 : -1;

							$offset = $transitions[$prev]["offset"];
							$sign = $offset >= 0 ? "" : "-";
							$offset = abs($offset);
							$offset = $sign . sprintf("%04s", (floor($offset / 3600) * 100 + $offset % 60));
							echo "TZOFFSETFROM:$offset\n";

							$offset = $transitions[$t]["offset"];
							$sign = $offset >= 0 ? "" : "-";
							$offset = abs($offset);
							$offset = $sign . sprintf("%04s", (floor($offset / 3600) * 100 + $offset % 60));
							echo "TZOFFSETTO:$offset\n";
							echo "TZNAME:$current_timezone " . $transitions[$t]["abbr"] . "\n";
							echo "END:DAYLIGHT\n";
						}
					}
					echo "END:VTIMEZONE\n";

				}
			}
			return $tzid;
	}
	
}
