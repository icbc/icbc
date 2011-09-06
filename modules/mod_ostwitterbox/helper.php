<?php
/**
* @author Sanjeev Shrestha
* http://www.sanjeevshrestha.com.np
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

class modOSTwitterHelper
{
	function getStatus($params)
	{
try
{
		$snoopypath=JPATH_ROOT.DS."modules".DS."mod_ostwitterbox".DS."includes".DS."snoopy.php";
		require_once($snoopypath);
		$snoopy=new TSnoopy();
		     
            
            $twitterserver['friends']="http://twitter.com/statuses/friends_timeline.xml?count=".$params->get('count',10);
            $twitterserver['home']="http://api.twitter.com/1/statuses/home_timeline.xml?count=".$params->get('count',10);
            $twitterserver['mine']="http://twitter.com/statuses/user_timeline.xml?count=".$params->get('count',10);
            
			$snoopy->user=$params->get('tusername');
			$snoopy->pass=$params->get('tpassword');
			
                        
            $snoopy->fetch($twitterserver[$params->get('timeline')]);
		  if(!$xml = $snoopy->results)
	{
throw new Exception(JText::_("TWITTER_NOT_LOADED"),400);
	}
	
		
		$parsed=self::getArrayFromXML($xml);
		$templated=self::templateIt($parsed,$params);
		return $templated;
}
catch (Exception $e)
{
	echo JText::_("TWITTER_NOT_LOADED");
return array();
}
		
	}
	
	function getArrayFromXML($xmlstr="",$params=null)
	{
		$xml=new SimpleXMLElement($xmlstr);
	if(count($xml->status)>0)
	{
		$statuses=array();
		foreach($xml->status as $s)
		{
			$status=array();
			$status['username']=(string)$s->user->screen_name;
			$status['userurl']=(string)$s->user->url;
			$status['tweetlink']="http://www.twitter.com/".(string)$s->user->screen_name;
			$status['userimg']=(string)$s->user->profile_image_url;
			
			$status['postdate']=JHTML::_('date', (string)$s->created_at, JText::_('DATE_FORMAT_LC1'));
			$status['tweet']=(string)$s->text;
			$status['source']=(string)$s->source;
			$status['reply_to']=(string)$s->in_reply_to_status_id;
			$status['reply_to_user']=(string)$s->in_reply_to_user_id;
			
			
			
			$statuses[]=$status;
		}
	}
	return $statuses;
	
	
		
	}
	
	function templateIt($statuses,$params)
	{
		$templated=array();
		if(count($statuses)>0)
		{
			foreach($statuses as $s)
			{
				$pattern=array();
				$values=array();
				if(count($s)>0)
				{
					foreach($s as $k=>$f)
					{
						$pattern[]='/{'.$k.'}/i';
						$values[] = $f;
					}
				}
				$templated[]=preg_replace( $pattern, $values, $params->get('ttemplate'));
				
			}
		}
		return $templated;
			
	}
}

