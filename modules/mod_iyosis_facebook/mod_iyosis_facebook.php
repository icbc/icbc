<?php
/**
 * @package Iyosis Facebook Module for Joomla! 1.5
 * @author Remzi Degirmencioglu
 * @copyright (C) 2011 www.iyosis.com
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );
if ($params->get('plugin', 'LikeButton')=='LikeButton') :
	$html = modIyosisFacebookHelper::LikeButton( $params );
endif;
if ($params->get('plugin', 'LikeBox')=='LikeBox') :
	$html = modIyosisFacebookHelper::LikeBox( $params );
endif;
if ($params->get('plugin', 'LikeBox')=='ActivityFeed') :
	$html = modIyosisFacebookHelper::ActivityFeed( $params );
endif;
if ($params->get('plugin', 'LikeBox')=='Recommendations') :
	$html = modIyosisFacebookHelper::Recommendations( $params );
endif;
require( JModuleHelper::getLayoutPath( 'mod_iyosis_facebook' ) );
?>

