<?php
/**
 * @author Sanjeev Shrestha
 * Default Template for Tweets
 */
defined('_JEXEC') or die('Restricted access');

if(count($lists)>0)
{
	foreach($lists as $list)
	{
		echo $list;
		echo "<br/>";
	}
}
else
{
	echo "No Tweets";
}
?>
<div class="author"><a href="http://www.joomlaguru.com.np"/>Twitter box</a></div>

