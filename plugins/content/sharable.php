<?php
/**
*
* @package Sharable
* @copyright (C)2011 JoomlaDigger.com
* @license GNU/GPL
* http://joomladigger.com
*
**/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Import library dependencies
jimport('joomla.event.plugin');

class plgContentSharable extends JPlugin
{
  function plgContentSharable( &$subject )
  {
		parent::__construct( $subject );

		// load plugin parameters
		$this->_plugin = JPluginHelper::getPlugin( 'content', 'sharable' );
		$this->_params = new JParameter( $this->_plugin->params );
  }
	
  function onPrepareContent(&$article, &$params, $page)
  { 
    // Only display on Joomla's content component
    if ( JRequest::getVar('option') != 'com_content' ) return false;
    
    // Only display on actual articles
    if (!isset($article->slug)) return false;
		
    // Check if the full content item is currently displayed
		$currentView = (JRequest::getVar('view') == 'article') ? 'article' : 'preview';
		
		// Set URL to use for badges
		$uri = JURI::getInstance();
		$url = $uri->toString( array('scheme', 'host', 'port'));
		if ($url[strlen($url)-1] == '/') $url = substr($url, 0, strlen($url) - 1);

		$url .= JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catslug, $article->sectionid));    
		
		// Get plugin variables
		$preview_display             = $this->_params->def('preview_display','top');
		$article_display             = $this->_params->def('article_display','top');
		$preview_style               = $this->_params->def('preview_style','');
		$article_style               = $this->_params->def('article_style','');
		$preview_preceding_html      = $this->_params->def('preview_preceding_html','');
		$preview_following_html      = $this->_params->def('preview_following_html','');
		$article_preceding_html      = $this->_params->def('article_preceding_html','');
		$article_following_html      = $this->_params->def('article_following_html','');
		$excluded_categories         = $this->_params->get( 'excluded_categories', '');
		
		$facebook_order              = $this->_params->def( 'facebook_order', '2');
		$facebook_preview_display    = $this->_params->def( 'facebook_preview_display', 'big');
		$facebook_article_display    = $this->_params->def( 'facebook_article_display', 'big');
		$facebook_preview_send       = $this->_params->def( 'facebook_preview_send', '1');
		$facebook_article_send       = $this->_params->def( 'facebook_article_send', '1');
		$facebook_font               = $this->_params->def( 'facebook_font', 'arial');
		$facebook_color              = $this->_params->def( 'facebook_color', 'light');
		$facebook_include_root       = $this->_params->def( 'facebook_include_root', 'yes');
		
		$stumbleupon_order           = $this->_params->def( 'stumbleupon_order', '5');
		$stumbleupon_preview_display = $this->_params->def( 'stumbleupon_preview_display', 'none');
		$stumbleupon_article_display = $this->_params->def( 'stumbleupon_article_display', 'none');
		
		$google_order                = $this->_params->def( 'google_order', '3');
		$google_preview_display      = $this->_params->def( 'google_preview_display', 'big');
		$google_article_display      = $this->_params->def( 'google_article_display', 'big');

		$twitter_order               = $this->_params->def( 'twitter_order', '1');
		$twitter_preview_display     = $this->_params->def( 'twitter_preview_display', 'big');
		$twitter_article_display     = $this->_params->def( 'twitter_article_display', 'big');
		$twitter_mention_account     = $this->_params->def( 'twitter_mention_account', '');
		$twitter_related_account     = $this->_params->def( 'twitter_related_account', '');
		$twitter_related_desc        = $this->_params->def( 'twitter_related_desc', '');
		
		$linkedin_order              = $this->_params->def( 'linkedin_order', '4');
		$linkedin_preview_display    = $this->_params->def( 'linkedin_preview_display', 'none');
		$linkedin_article_display    = $this->_params->def( 'linkedin_article_display', 'none');
		
		$reddit_order                = $this->_params->def( 'reddit_order', '6');
		$reddit_preview_display      = $this->_params->def( 'reddit_preview_display', 'none');
		$reddit_article_display      = $this->_params->def( 'reddit_article_display', 'none');
		
		$digg_order                  = $this->_params->def( 'digg_order', '7');
		$digg_preview_display        = $this->_params->def( 'digg_preview_display', 'none');
		$digg_article_display        = $this->_params->def( 'digg_article_display', 'none');
		
	  
	  
	  // Array of buttons
    $buttons = array( 'twitter'     => $twitter_order,
                      'facebook'    => $facebook_order,
                      'google'      => $google_order,
                      'linkedin'    => $linkedin_order,
                      'stumbleupon' => $stumbleupon_order,
                      'reddit'      => $reddit_order,
                      'digg'        => $digg_order
    );
	  
	  
	  // Check if buttons are to be displayed in the current view
    $displayVarName = $currentView .'_display';
	  if ($$displayVarName == 'none') return false;

		
		// Check if this content item is in an excluded category
		$excluded = explode (",", $excluded_categories);
		foreach ($excluded as $ex)
		{
			if ($article->catid == trim($ex))
			{
        return false;
			}
		}
		
		
		// Add CSS to document head
		JHTML::stylesheet('sharable.css', 'plugins/content/');
		
		// Remove buttons not enabled for the current view
		foreach ($buttons as $key => $value){
      $buttonDisplayName = $key .'_'. $currentView .'_display';
		  if ($$buttonDisplayName == 'none') unset($buttons[$key]);
		}
		// Sort buttons by user order
    asort($buttons);


		// Create buttons html
    $buttonsHtml = '';
		foreach($buttons as $key => $value){
      $buttonHtml = '';
      $buttonDisplayName = $key .'_'. $currentView .'_display';
      
		  switch ($key) {
          case 'twitter':
          $buttonHtml = '<a href="http://twitter.com/share" class="twitter-share-button" data-url="';
          $buttonHtml .= $url;
          $buttonHtml .= '" data-count="';
            if ($$buttonDisplayName == 'big'){
              $buttonHtml .= 'vertical';
            } else if ($$buttonDisplayName == 'small'){
              $buttonHtml .= 'horizontal';
            } else if ($$buttonDisplayName == 'small_no_number'){
              $buttonHtml .= 'none';
            }
            $buttonHtml .= '"';
            if (trim($twitter_mention_account) !== ''){
              $buttonHtml .= ' data-via="'. trim($twitter_mention_account) .'"';
            }
            if (trim($twitter_related_account) !== ''){
              $buttonHtml .= ' data-related="'. trim($twitter_related_account);
              if (trim($twitter_related_desc) !== ''){
                $buttonHtml .= ':'. trim($twitter_related_account);
              }
              $buttonHtml .= '"';
            }
            $buttonHtml .= '>Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
              break;
              
          case 'facebook':
            $fbSend = $key .'_'. $currentView .'_send';
            $fbSendValue = ($$fbSend == '1') ? 'true' : 'false';
            
            $buttonHtml .= '<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="';
            $buttonHtml .= $url;
            $buttonHtml .= '" send="';
            $buttonHtml .= $fbSendValue;
            $buttonHtml .= '" layout="';
            if ($$buttonDisplayName == 'big'){
              $buttonHtml .= 'box_count" width="49"';
            } else if ($$buttonDisplayName == 'small'){
              $buttonHtml .= 'button_count" width="';
              $buttonHtml .= ($$fbSend == '1') ? '150' : '90';
              $buttonHtml .= '"';
            }
            if ($facebook_color == 'dark'){
              $buttonHtml .= ' colorscheme="dark"';
            }
            $buttonHtml .= ' show_faces="false" font="';
            $buttonHtml .= $facebook_font;
            $buttonHtml .= '"></fb:like>';
              break;
              
          case 'google':
            //$doc =& JFactory::getDocument();
            //$doc->addScript("https://apis.google.com/js/plusone.js");
            
            $buttonHtml = '<g:plusone size="';
            if ($$buttonDisplayName == 'big'){
              $buttonHtml .= 'tall';
            } else if ($$buttonDisplayName == 'small'){
              $buttonHtml .= 'medium';
            }
            $buttonHtml .= '" href="'. $url .'"></g:plusone>';
            
            // Add Google's external JS just one time
            if (!defined('_PLG_SHARABLE_GOOGLEPLUS')){
              $buttonHtml .= '<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>';
        	    define('_PLG_SHARABLE_GOOGLEPLUS', 'true');
        		}
            
              break;
              
          case 'linkedin':
            $buttonHtml = '<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-url="';
            $buttonHtml .= $url .'"';
            if ($$buttonDisplayName == 'big'){
              $buttonHtml .= ' data-counter="top"';
            } else if ($$buttonDisplayName == 'small'){
              $buttonHtml .= ' data-counter="right"';
            }
            $buttonHtml .= '></script>';
              break;
              
          case 'stumbleupon':
            $buttonHtml = '<script src="http://www.stumbleupon.com/hostedbadge.php?s=';
            $buttonHtml .= ($$buttonDisplayName == 'big') ? '5' : '1';
            $buttonHtml .= '&r='. $url;
            $buttonHtml .= '"></script>';
              break;
              
          case 'reddit':
            $rStyle = '2';
            if ($$buttonDisplayName == 'wide'){
              $rStyle = '3';
            } else if ($$buttonDisplayName == 'small'){
              $rStyle = '1';
            }
            $buttonHtml = '<script type="text/javascript"> reddit_url="'. $url .'"; </script>';
            $buttonHtml .= '<script type="text/javascript" src="http://www.reddit.com/static/button/button'. $rStyle .'.js"></script>';
              break;
              
          case 'digg':
            $dStyle = 'DiggMedium';
            if ($$buttonDisplayName == 'small'){
              $dStyle = 'DiggCompact';
            }
            $buttonHtml = '<script type="text/javascript">
            (function() {
            var s = document.createElement(\'SCRIPT\'), s1 = document.getElementsByTagName(\'SCRIPT\')[0];
            s.type = \'text/javascript\';
            s.async = true;
            s.src = \'http://widgets.digg.com/buttons.js\';
            s1.parentNode.insertBefore(s, s1);
            })();
            </script>';
            $buttonHtml .= '<a href="http://digg.com/submit?url='. urlencode($url) .'" class="DiggThisButton '. $dStyle .'"></a>';
              break;
              
      } // End switch
      
      // IE6 Conditional for Google +1 Button
      if ($key == 'google'){
        $buttonsHtml .= '<![if gt IE 6]>';
      }
      
      // Facebook div needs a width of 47px
      $buttonsHtml .= '<div class="plg_shr_btn plg_shr_btn_'. $key .'_'. $$buttonDisplayName .'">';
      $buttonsHtml .= $buttonHtml;
      $buttonsHtml .= '</div>';
      
      // Close IE6 conditaion for Google +1 Button
      if ($key == 'google'){
        $buttonsHtml .= '<![endif]>';
      }
		} // End foreach button

		
		
    // Add wrapper div with styling and preceding/following html to $buttonsHtml
    $precedingHtmlName = $currentView .'_preceding_html';
    $followingHtmlName = $currentView .'_following_html';
    $finalHtml = '<div class="plg_shr_wrapper plg_shr_wrapper_'. $currentView .'" style="';
    $finalHtml .= ($currentView == 'article') ? $article_style : $preview_style;
    $finalHtml .='">'. $$precedingHtmlName . $buttonsHtml . $$followingHtmlName .'</div>';
    
    // Append or prepend $buttonsHtml to $article->text
	  if ($$displayVarName == 'top'){
      $article->text = $finalHtml . $article->text;
	  } else{
      $article->text .= $finalHtml;
	  }
	  
	  // Add a single Facebook root div to HTML if necessary
		if ($facebook_include_root == 'yes' && !defined('_PLG_SHARABLE_FB_ROOT')){
      $article->text = '<div id="fb-root" style="display:none"> </div>'. $article->text;
	    define('_PLG_SHARABLE_FB_ROOT', 'true');
		}
		
    return true;
    
  }
  


}
?>