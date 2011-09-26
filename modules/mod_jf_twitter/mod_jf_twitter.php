<?php
/* @author		JOOFORGE.com
 * @copyright	Copyright(C) 2010 Jooforge
 * @licence		GNU/GPL http://www.gnu.org/copyleft/gpl.html */
 
defined('_JEXEC') or die('Restricted access');

include_once(dirname(__FILE__).DS.'helper.php');

JHTML::stylesheet('twitter.css', 'modules/mod_jf_twitter/assets/');
JHTML::script('twitter.js', 'modules/mod_jf_twitter/assets/');

$username = $params->get('username');
$showuser = $params->get('showuser');
$total = $params->get('total');
$page = $params->get('page');

$twitter = new Twitter($username);
$tweets = $twitter->getUserTimeLine($total);
$profile = $twitter->getProfile();

require(JModuleHelper::getLayoutPath('mod_jf_twitter'));

?>
