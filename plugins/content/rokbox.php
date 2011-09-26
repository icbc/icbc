<?php
/**
 * @package rokbox
 * @subpackage plg_content_rokbox
 * @version 1.9 July 15, 2011
 * @author RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
// no direct access
defined( '_JEXEC' ) or die();

jimport( 'joomla.plugin.plugin' );
require_once(dirname(__FILE__) . '/rokbox/imagehandler.php');

/**
 * @package rokbox
 * @subpackage plg_content_rokbox
 */
class plgContentRokbox extends JPlugin
{
    function plgContentRokbox( &$subject, $params )
	{
		parent::__construct( $subject, $params );
	}
	
	function onPrepareContent( &$article, &$params, $limitstart )
	{
		global $mainframe;
		

    	// simple performance check to determine whether bot should process further
    	if ( strpos( $article->text, 'rokbox' ) === false ) {
    		return true;
    	}
    	
    	// Get plugin info
    	$plugin =& JPluginHelper::getPlugin('content', 'rokbox');

    	// define the regular expression for the bot
    	$regex = "#{rokbox(.*?)}(.*?){/rokbox}#s";
    	
    	$pluginParams = new JParameter( $plugin->params );

    	// check whether plugin has been unpublished
    	if ( !$pluginParams->get( 'enabled', 1 ) ) {
    		$article->text = preg_replace( $regex, '', $row->text );
    		return true;
    	}
    	
    	// find all instances of plugin and put in $matches
    	preg_match_all( $regex, $article->text, $matches );

    	// Number of plugins
     	$count = count( $matches[0] );

     	// plugin only processes if there are any instances of the plugin in the text
     	if ( $count ) {
    		// Get plugin parameters
    	 	$style	= $pluginParams->def( 'style', -2 );

     		$this->plgContentProcessRokboxImages( $article, $matches, $count, $regex, $pluginParams );
    	}


	}
	
	function plgContentProcessRokboxImages( &$row, &$matches, $count, $regex, &$botParams ) {
    	global $mainframe;


    	$thumb_ext	= $botParams->def( 'thumb_ext', '_thumb');
    	$thumb_class	= $botParams->def( 'thumb_class', 'album');
    	$thumb_width = $botParams->def( 'thumb_width', '100');
    	$thumb_height = $botParams->def( 'thumb_height', '100');
    	$thumb_quality = $botParams->def( 'thumb_quality', '90');
    	$thumb_custom = $botParams->def( 'thumb_custom', 0);
    	$thumb_dir = $botParams->def( 'thumb_dir');
    	$compatibility = $botParams->def( 'compatibility', 'rokbox');


    	/* thumbnail settings */
    	$improve_thumbnails = false; // Auto Contrast, Unsharp Mask, Desaturate,  White Balance
    	$thumb_quality = $thumb_quality;
    	$width = $thumb_size_width = $thumb_width;
    	$height = $thumb_size_height = $thumb_height;

    	/* slimbox = lightbox mode */
    	if ($compatibility == "slimbox") $compatibility = "lightbox";

        for ( $i=0; $i < $count; $i++ )
    	{
	    	$thealbum = '';
	    	$thetitle = '';
			$thethumb = '';
			$thetype = '';
			$thesize = '';
			$thetext = '';
			$themodule = '';
			$thethumbsize = '';
			$thethumbcount = 999;
    	    if (@$matches[1][$i]) {
        		$inline_params = $matches[1][$i];

        		// get album
        		$album_matches = array();
        		preg_match( "# album=\|(.*?)\|#s", $inline_params, $album_matches );
        		if (isset($album_matches[1])) $thealbum = "(" . trim($album_matches[1]) . ")";

				// get size
				$size_matches = array();
				preg_match( "# size=\|(.*?)\|#s", $inline_params, $size_matches );
				if (isset($size_matches[1])) $thesize = "[" . trim($size_matches[1]) . "]";

        		// get title
        		$title_matches = array();
        		preg_match( "# title=\|(.*?)\|#s", $inline_params, $title_matches );
        		if (isset($title_matches[1])) $thetitle =  $title_matches[1];
				
        		// get text
        		$text_matches = array();
        		preg_match( "# text=\|(.*?)\|#s", $inline_params, $text_matches );
        		if (isset($text_matches[1])) $thetext =  $text_matches[1];
				
				// force image
        		$type_matches = array();
        		preg_match( "# type=\|(.*?)\|#s", $inline_params, $type_matches );
        		if (isset($type_matches[1])) $thetype = $type_matches[1];

        		// get module
        		$module_matches = array();
        		preg_match( "# module=\|(.*?)\|#s", $inline_params, $module_matches );
        		if (isset($module_matches[1])) $themodule =  "[module=".$module_matches[1]."]";

        		// get thumb
        		$thumb_matches = array();
        		preg_match( "# thumb=\|(.*?)\|#s", $inline_params, $thumb_matches );
        		if (isset($thumb_matches[1])) $thethumb =  $thumb_matches[1];

        		// get thumb sizes
        		$thumbsize_matches = array();
        		preg_match( "# thumbsize=\|(.*?)\|#s", $inline_params, $thumbsize_matches );
			
				$thumb_size_width = $thumb_width;
				$thumb_size_height = $thumb_height;
        		if (isset($thumbsize_matches[1])) {
					$thethumbsize =  $thumbsize_matches[1];
					$tsize = explode(" ", $thethumbsize);
					if (count($tsize) == 1) {$thumb_size_width = $thumb_size_height = $tsize[0];}
					elseif (count($tsize) == 2) {
						$thumb_size_width = $tsize[0];
						$thumb_size_height = $tsize[1];
					}
				}
        		
        		// get thumb count
        		$thumbcount_matches = array();
        		preg_match( "# thumbcount=\|(.*?)\|#s", $inline_params, $thumbcount_matches );
        		if (isset($thumbcount_matches[1])) $thethumbcount =  $thumbcount_matches[1];
        	}

			$onsite=1;
			$text = '';
			$displaythumb = '';
			
			$tmp = @glob(trim($matches[2][$i]));
						
			if (count($tmp) < 1) {
				$tmp = array(trim($matches[2][$i]));
				$onsite=0;
			}
			
			if (!is_array($tmp)) $tmp = array(trim($matches[2][$i]));
			
			if (count($tmp) > 1) {
				$text .= '<div class="rokbox-album-wrapper">';
				$text .= '<div class="rokbox-album-top"><div class="rokbox-album-top2"><div class="rokbox-album-top3"></div></div></div>';
				$text .= '<div class="rokbox-album-inner">';
			}
			foreach ($tmp as $link){
				
				if (count($tmp) > 1) {
					// Check for files only
					if (!is_file($link)) continue;
					
					// Check for images only					
					$last3 = strtolower(substr($link, -3));
					$last4 = strtolower(substr($link, -4));
				
					if ($last3 != "jpg" && $last3 != "png" && $last3 != "bmp" && $last3 != "gif" && $last4 != "jpeg") continue;
				}
								
				// Prevent thumbs of thumbs
				if ( strpos( $link, $thumb_ext ) === false ) {
					

					if (strlen($thethumb)) $image_url = trim($thethumb);
					else $image_url = $link;
					
		        	$extension = substr($image_url,strrpos($image_url,"."));
		        	$image_name = substr($image_url,0,strrpos($image_url, "."));
		        	$just_name = substr($image_name,strrpos($image_name,DS));
		        	
		        	$full_url = JURI::base() . $link;
		        	$full_path = JPATH_ROOT . DS . $link;
		        	$thumb_url_custom =  JURI::base() . $thumb_dir . DS . $just_name . $thumb_ext . $extension;
		        	$thumb_path_custom = JPATH_ROOT. DS . $thumb_dir . DS . $just_name . $thumb_ext . $extension;
		        	$thumb_url = JURI::base() . $image_name . $thumb_ext . $extension;
		        	$thumb_path = JPATH_ROOT . DS . $image_name . $thumb_ext . $extension;
		        	
					$isimage = ($extension == '.jpg' || $extension == '.jpeg' || $extension == '.bmp' || $extension == '.png' || $extension == '.gif' ||
						    $extension == '.JPG' || $extension == '.JPEG' || $extension == '.BMP' || $extension == '.PNG' || $extension == '.GIF');
					
					if ($onsite){
						if (!isset($size_matches[1]) && $isimage) {
							list($image_width,$image_height)=getimagesize($link);
							$thesize = "[" . $image_width . " " . $image_height . "]";
						}
						$thethumbcount--;
						if ($thethumbcount<0) $displaythumb = '" style="display: none;';
					} else {
						if ($isimage && !isset($size_matches[1]) && $botParams->get('remote_sizes', 0)) {
							$remoteSize = @getimagesize($link);
							if ($remoteSize) {
								list($image_width,$image_height)=$remoteSize;
								$thesize = "[" . $image_width . " " . $image_height . "]";
							}
						}
					}

					if (!strlen($thethumb) && !strlen($thetype) && strlen($thetext) > 0) {
						if (strlen($themodule)) $text = $text . '<a href="' . $link . '" rel="' . $compatibility . $thesize . $thealbum . $displaythumb . $themodule .'" title="' . $thetitle . '">'.$thetext.'</a>';
						else $text = $text . '<a href="' . $link . '" rel="' . $compatibility . $thesize . $thealbum . $displaythumb . '" title="' . $thetitle . '">'.$thetext.'</a>';
					} else if (!strlen($thethumb) && !strlen($thetype) && !$isimage) {
						if (strlen($themodule)) $text = $text . '<a href="' . $link . '" rel="' . $compatibility . $thesize . $thealbum . $displaythumb . $themodule .'" title="' . $thetitle . '">'.$thetitle.'</a>';
						else $text = $text . '<a href="' . $link . '" rel="' . $compatibility . $thesize . $thealbum . $displaythumb . '" title="' . $thetitle . '">'.$thetitle.'</a>';
					} else {
						if (strlen($thethumb) > 0) {
							if (strlen($themodule)) $text = $text . '<a href="' . $link . '" rel="' . $compatibility . $thesize . $thealbum . $displaythumb . $themodule . '" title="' . $thetitle . '"><img class="'. $thumb_class . '" src="' . $thethumb . '" alt="' . $thetitle . '" width="'.$thumb_size_width.'" height="'.$thumb_size_height.'" /></a>';
							else $text = $text . '<a href="' . $link . '" rel="' . $compatibility . $thesize . $thealbum . $displaythumb . '" title="' . $thetitle . '"><img class="'. $thumb_class . '" src="' . $thethumb . '" alt="' . $thetitle . '" width="'.$thumb_size_width.'" height="'.$thumb_size_height.'" /></a>';
				        	} elseif (!$thumb_custom && file_exists($thumb_path)) {
				        		// thumbnail exists so can do lightbox with thumbnail
				        		if (strlen($themodule)) $text = $text . '<a href="' . $link . '" rel="' . $compatibility . $thesize . $thealbum . $displaythumb . $themodule . '" title="' . $thetitle . '"><img class="'. $thumb_class . '" src="' . $thumb_url . '" alt="' . $thetitle . '" width="'.$thumb_size_width.'" height="'.$thumb_size_height.'" /></a>';
							else $text = $text . '<a href="' . $link . '" rel="' . $compatibility . $thesize . $thealbum . $displaythumb . '" title="' . $thetitle . '"><img class="'. $thumb_class . '" src="' . $thumb_url . '" alt="' . $thetitle . '" width="'.$thumb_size_width.'" height="'.$thumb_size_height.'" /></a>';
				        	} elseif (file_exists($thumb_path_custom)) {
							if (strlen($themodule)) $text = $text . '<a href="' . $link . '" rel="' . $compatibility . $thesize . $thealbum . $displaythumb . $themodule . '" title="' . $thetitle . '"><img class="'. $thumb_class . '" src="' . $thumb_url_custom . '" alt="' . $thetitle . '" width="'.$thumb_size_width.'" height="'.$thumb_size_height.'" /></a>';
				        		else $text = $text . '<a href="' . $link . '" rel="' . $compatibility . $thesize . $thealbum . $displaythumb . '" title="' . $thetitle . '"><img class="'. $thumb_class . '" src="' . $thumb_url_custom . '" alt="' . $thetitle . '" width="'.$thumb_size_width.'" height="'.$thumb_size_height.'" /></a>';
				        	} elseif ($isimage || $thetype == 'image')  {
				        		//try to generate thumbs
				        		if ($thumb_custom) $thumb_path = $thumb_path_custom;
				          		
				        		$rd = new imgRedim(false, $improve_thumbnails, JPATH_CACHE);
				        		$image_filename = $full_path; // define source image here
				        		$output_filename = $thumb_path; // define destination image here
								
								$image_size = @getimagesize($image_filename);
								
				        		$rd->loadImage($image_filename);
								
								if ($image_size[0] < $width) $width = $thumb_size_width = $image_size[0];
								if ($image_size[1] < $height) $height = $thumb_size_height = $image_size[1];
								
				        		$rd->redimToSize($width, $height, true);
				        		$rd->saveImage($output_filename, $thumb_quality);
								
				        		$text = $text . '<a href="' . $link . '" rel="' . $compatibility . $thesize . $thealbum . $displaythumb . '" title="' . $thetitle . '"><img class="'. $thumb_class . '" src="' . $thumb_url . '" alt="' . $thetitle . '" width="'.$thumb_size_width.'" height="'.$thumb_size_height.'" /></a>';
			        		}
					}
					$text = $text . ' ';
				}
			}
			if (count($tmp) > 1) {
				$text .= '</div>';
				$text .= '<div class="rokbox-album-bottom"><div class="rokbox-album-bottom2"><div class="rokbox-album-bottom3"></div></div></div>';
				$text .= '</div>';
			}
			$row->text = str_replace( $matches[0][$i], $text, $row->text );
	}
    	
    }
}

?>