<?php
/**
 * @package Iyosis Facebook Module for Joomla! 1.5
 * @author Remzi Degirmencioglu
 * @copyright (C) 2011 www.iyosis.com
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

class modIyosisFacebookHelper
{
    function LikeButton( $params )
    {
	$URL = $params->get('URLLikeButton', 'http://www.facebook.com/joomla');
	$encodedURL = urlencode($URL);
	$codeType = $params->get('codeTypeLikeButton', 'XFBML');
	$width = $params->get('widthLikeButton', '250');
	$height = $params->get('heightLikeButton', '650');
	$showFaces = $params->get('showFacesLikeButton', '1') ? 'true' : 'false';
	$colorScheme = $params->get('colorSchemeLikeButton', 'light');
	$layout = $params->get('layoutLikeButton', 'standard');

	$iframe = "<iframe src=\"http://www.facebook.com/plugins/like.php?href=".$encodedURL."&amp;layout=".$layout."&amp;show_faces=".$showFaces."&amp;width=".$width."&amp;action=like&amp;font=arial&amp;colorscheme=".$colorScheme."&amp;height=".$height."\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:".$width."px; height:".$height."px;\" allowTransparency=\"true\"></iframe>";

	$xfbml = "<script src=\"http://connect.facebook.net/en_US/all.js#xfbml=1\"></script><fb:like href=\"".$URL."\" layout=\"".$layout."\" width=\"".$width."\" colorscheme=\"".$colorScheme."\" show_faces=\"".$showFaces." font=\"arial\"\"></fb:like>";

	if($codeType=='iframe') $html = $iframe;
	if($codeType=='XFBML') $html = $xfbml;
        return $html;
    }

    function LikeBox( $params )
    {
	$URL = $params->get('URLLikeBox', 'http://www.facebook.com/joomla');
	$encodedURL = urlencode($URL);
	$codeType = $params->get('codeTypeLikeBox', 'XFBML');
	$width = $params->get('widthLikeBox', '250');
	$height = $params->get('heightLikeBox', '650');
	$colorScheme = $params->get('colorSchemeLikeBox', 'light');
	$showFaces = $params->get('showFacesLikeBox', '1') ? 'true' : 'false';
	$showStream = $params->get('showStreamLikeBox', '1') ? 'true' : 'false';
	$showHeader = $params->get('showHeaderLikeBox', '1') ? 'true' : 'false';

	$iframe = "<iframe src=\"http://www.facebook.com/plugins/likebox.php?href=".$encodedURL."&amp;width=".$width."&amp;colorscheme=".$colorScheme."&amp;show_faces=".$showFaces."&amp;stream=".$showStream."&amp;header=".$showHeader."&amp;height=".$height."\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:".$width."px; height:".$height."px;\" allowTransparency=\"true\"></iframe>";

	$xfbml = "<script src=\"http://connect.facebook.net/en_US/all.js#xfbml=1\"></script><fb:like-box href=\"".$URL."\" width=\"".$width."\" colorscheme=\"".$colorScheme."\" show_faces=\"".$showFaces."\" stream=\"".$showStream."\" header=\"".$showHeader."\"></fb:like-box>";
	if($codeType=='iframe') $html = $iframe;
	if($codeType=='XFBML') $html = $xfbml;
        return $html;
    }

    function ActivityFeed( $params )
    {
	$domain = $params->get('domainActivityFeed', 'joomla.org');
	$codeType = $params->get('codeTypeActivityFeed', 'XFBML');
	$width = $params->get('widthActivityFeed', '250');
	$height = $params->get('heightActivityFeed', '650');
	$colorScheme = $params->get('colorSchemeActivityFeed', 'light');
	$showFaces = $params->get('showFacesActivityFeed', '1') ? 'true' : 'false';
	$showStream = $params->get('showStreamActivityFeed', '1') ? 'true' : 'false';
	$showHeader = $params->get('showHeaderActivityFeed', '1') ? 'true' : 'false';

	$iframe = "<iframe src=\"http://www.facebook.com/plugins/activity.php?site=".$domain."&amp;width=".$width."&amp;height=".$height."&amp;header=".$showHeader."&amp;colorscheme=".$colorScheme."&amp;recommendations=true\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:".$width."px; height:".$height."px;\" allowTransparency=\"true\"></iframe>";

	$xfbml = "<script src=\"http://connect.facebook.net/en_US/all.js#xfbml=1\"></script><fb:activity site=\"".$domain."\" width=\"".$width."\" height=\"".$height."\" header=\"".$showHeader."\" colorscheme=\"".$colorScheme."\" recommendations=\"true\"></fb:activity>";

	if($codeType=='iframe') $html = $iframe;
	if($codeType=='XFBML') $html = $xfbml;
        return $html;
    }

    function Recommendations( $params )
    {
	$domain = $params->get('domainRecommendations', 'joomla.org');
	$codeType = $params->get('codeTypeRecommendations', 'XFBML');
	$width = $params->get('widthRecommendations', '250');
	$height = $params->get('heightRecommendations', '650');
	$colorScheme = $params->get('colorSchemeRecommendations', 'light');
	$showHeader = $params->get('showHeaderRecommendations', '1') ? 'true' : 'false';

	$iframe = "<iframe src=\"http://www.facebook.com/plugins/recommendations.php?site=".$domain."&amp;width=".$width."&amp;height=".$height."&amp;header=".$showHeader."&amp;colorscheme=".$colorScheme."\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:".$width."px; height:".$height."px;\" allowTransparency=\"true\"></iframe>";

	$xfbml = "<script src=\"http://connect.facebook.net/en_US/all.js#xfbml=1\"></script><fb:recommendations site=\"".$domain."\" width=\"".$width."\" height=\"".$height."\" header=\"".$showHeader."\" colorscheme=\"".$colorScheme."\"></fb:recommendations>";

	if($codeType=='iframe') $html = $iframe;
	if($codeType=='XFBML') $html = $xfbml;
        return $html;
    }
}
?>
