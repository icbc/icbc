<?php
/* @author		JOOFORGE.com
 * @copyright	Copyright(C) 2010 Jooforge
 * @licence		GNU/GPL http://www.gnu.org/copyleft/gpl.html */
 
class Twitter {
	private $user = null;
	private $tweets = null;
	
	function __construct($user) {
		$this->user = $user;
	}
	
	function getUserTimeLine($count = 19) {
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, 'http://api.twitter.com/1/statuses/user_timeline.json?screen_name='.$this->user.'&count='.$count);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$data = curl_exec($ch);
		curl_close($ch);
		
		if(function_exists('json_decode')) {
			$this->tweets = json_decode($data);
		} else {
			include('lib/JSON.php');
			
			$json = new Services_JSON();
			$this->tweets = $json->decode($data);
		}
		
		return $this->tweets;
	}
	
	function getProfile() {
		$profile = array();
		
		if(!empty($this->tweets)) {
			$profile = $this->tweets[0]->user;
		}
		
		return $profile;
	}
	
	function timeSince($date) {
		$datetime = strtotime($date);
		$offset = time() - $datetime;
		
		$units = array(
			'second' => 1,
			'minute' => 60,
			'hour' => 3600,
			'day' => 86400,
			'month' => 2629743,
			'year' => 31556926);
		
		foreach($units as $unit => $value) {
			if($offset >= $value) {
				$result = floor($offset / $value);
				
				if(!in_array($unit, array('month','year'))) {
					if($result > 1) {
						$unit .= 's';
					}
					
					$timeAgo = JText::_('ABOUT').' '.$result.' '.JText::_($unit).' '.JText::_('AGO');
				} else {
					return date('j M Y', $datetime);
				}
			}
		}
		
		return $timeAgo;
	}
	
	function parseText($text) {
		// url
		$text = preg_replace( "/(([[:alnum:]]+:\/\/)|www\.)([^[:space:]]*)([[:alnum:]#?\/&=])/i", "<a href=\"\\1\\3\\4\" target=\"_blank\">\\1\\3\\4</a>", ' '.$text);
		$text = str_replace('href="www.', 'href="http://www.', $text);
		// mailto
		$text = preg_replace( "/(([a-z0-9_]|\\-|\\.)+@([^[:space:]]*)([[:alnum:]-]))/i", "<a href=\"mailto:\\1\">\\1</a>", $text);
		// user
		$text = preg_replace( "/ +@([a-z0-9_]*) ?/i", " <a href=\"http://twitter.com/\\1\" target=\"_blank\">@\\1</a> ", $text);
		// argument
		$text = preg_replace( "/ +#([a-z0-9_]*) ?/i", " <a href=\"http://twitter.com/search?q=%23\\1\" target=\"_blank\">#\\1</a> ", $text);
		// truncates long url
		$text = preg_replace("/>(([[:alnum:]]+:\/\/)|www\.)([^[:space:]]{30,40})([^[:space:]]*)([^[:space:]]{10,20})([[:alnum:]#?\/&=])</", ">\\3...\\5\\6<", $text);
		
		return trim($text);
	}

}

