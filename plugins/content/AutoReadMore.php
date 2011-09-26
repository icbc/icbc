<?php

// Do the usual dance
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.plugin.plugin' );

class plgContentAutoReadMore extends JPlugin {

 function plgContentAutoReadMore(&$subject, $params) { parent::__construct($subject, $params); }

 function onPrepareContent( &$article, &$params ) {
  if ($this->param('Developer_Mode') != 1) {
   if ($GLOBALS['option'] == 'com_myblog') {
    // We are using the com_myblog component.  Check to be sure we're on the index page.
    if (isset($_REQUEST['show'])) return;
	} elseif (JRequest :: getCmd('option') == 'com_fjrelated') {
	// FJ Related Articles
	if((!$_REQUEST['layout']=='blog') or ($_REQUEST['id'] == $article->id)) return;
    } elseif (JRequest :: getCmd('option') == 'com_content') {
    // We are using the com_content module.  Be sure that we're on the frontpage, or category blog, or section blog.
    $view=JRequest :: getCmd('view'); $layout=JRequest :: getCmd('layout');
    if(! (($view=='frontpage') || (($view=='category') && ($layout=='blog')) || (($view=='section') && ($layout=='blog'))) ) return;
    } else {
    // Whatever this is, it is unsupported.
    return;
    }
   // Be sure that this section/category/article is not one that the user wanted to exclude.
   if ($this->param('Enabled_Front_Page') == 0 and $view=='frontpage') return;
   if (in_array($article->sectionid, explode(',', $this->param('Exclude_Section_Ids')))) return;
   if (in_array($article->catid, explode(',', $this->param('Exclude_Category_Ids')))) return;
   if (in_array($article->id, explode(',', $this->param('Exclude_Article_Ids')))) return;
   }
  // How many characters are we allowed?
  $GLOBALS['AutoReadMore_Count'] = (isset($GLOBALS['AutoReadMore_Count'])) ? $GLOBALS['AutoReadMore_Count']+1 : 1;
  $params = $GLOBALS['mainframe']->getParams();
  $num_leading_articles = $params->def('num_leading_articles', 0);
  if ($GLOBALS['AutoReadMore_Count'] <= $num_leading_articles) {
   // This is a leading (full-width) article.
   $max_chars = $this->param('Leading_Max_Chars');
   } else {
   // This is not a leading article.
   $max_chars = $this->param('Max_Chars');
   }
  if (!is_numeric($max_chars)) $max_chars = 500;
  // What text are we working with?
  if ($this->param('Ignore_Existing_Read_More') == 1) {
   // Use introtext and fulltext.
   $text = $article->introtext . $article->fulltext;
   } else {
   // Use introtext only.
   $text = $article->introtext;
   if ($text == '') $text = $article->fulltext;
   }
  // Are we working with any thumbnails?
  $thumbnails = '';
  if ($this->param('Thumbnails') >= 1) {
   // Extract all images from the article.
   preg_match_all('/<img [^>]*>/i', $article->introtext . $article->fulltext, $matches); $matches = $matches[0];
   // Loop through the thumbnails.
   for ($thumbnail = 0; $thumbnail < $this->param('Thumbnails'); $thumbnail++) {
    if (!isset($matches[$thumbnail])) break;
    // Remove the image from $text
	$text = str_replace($matches[$thumbnail], '', $text);
    // See if we need to remove styling.
    if ($this->param('Thumbnails_Class') != '') {
	 // Remove style, class, width, border, and height attributes.
	 $matches[$thumbnail] = preg_replace('/(style|class|width|height|border) ?= ?[\'"][^\'"]*[\'"]/i', '', $matches[$thumbnail]);
	 // Add CSS.
	 $matches[$thumbnail] = preg_replace('@/?>$@', 'class="' . $this->param('Thumbnails_Class') . '" />', $matches[$thumbnail]);
	 }
	// Make this thumbnail a link.
	$matches[$thumbnail] = "<a href='" . JRoute::_("index.php?option=com_content&id={$article->slug}") . "'>{$matches[$thumbnail]}</a>";
	// Add to the list of thumbnails.
	$thumbnails .= $matches[$thumbnail];
	}
   }
  if (strlen(strip_tags($text)) > $max_chars) {
   if ($this->param('Strip_Formatting') == 1) {
    // First, remove all new lines
    $text = preg_replace("/\r\n|\r|\n/", "", $text);
    // Next, replace <br /> tags with \n
    $text = preg_replace("/<BR[^>]*>/i", "\n", $text);
    // Replace <p> tags with \n\n
    $text = preg_replace("/<P[^>]*>/i", "\n\n", $text);
    // Strip all tags
    $text = strip_tags($text);
    // Truncate
    $text = substr($text, 0, $max_chars);
    // Pop off the last word in case it got cut in the middle
    $text = preg_replace("/[.,!?:;]? [^ ]*$/", "", $text);
    // Add ... to the end of the article.
    $text = trim($text) . "...";
    // Replace \n with <br />
    $text = str_replace("\n", "<br />", $text);
	} else {
    // Truncate
    $text = substr($text, 0, $max_chars);
    // Pop off the last word in case it got cut in the middle
    $text = preg_replace("/[.,!?:;]? [^ ]*$/", "", $text);
	// Pop off the last tag, if it got cut in the middle.
	$text = preg_replace('/<[^>]*$/', '', $text);
	// Add ... to the end of the article if the last character is a letter or a number.
    if (preg_match('/\w/', substr($text, -1))) $text = trim($text) . "...";
    // Use Tidy to repair any bad XHTML (unclosed tags etc)
	$tidy = new tidy(); $text = $tidy->repairString($text, array('show-body-only'=>true, 'output-xhtml'=>true), 'utf8');
	}
   // Add a "read more" link.
   $article->readmore = true;
   }
  // If we have thumbnails, add it to $text.
  $text = $thumbnails . $text;
  // If Developer Mode is turned on, add some stuff.
  if ($this->param('Developer_Mode') == 1) {
   $text = ''
	. '<div style="height:150px;width:100%;overflow:auto;">'
    . '<b>Developer information:</b><br /><pre>'
	. 'Developers: uncomment the next line in the code to display $GLOBALS.  If you see this message and do not know what it means, you should turn Developer_Mode off in the Auto Read More configuration.'
	 . (htmlspecialchars(print_r($GLOBALS, 1))) // by default, this is commented out for security.  Only uncomment it if you know what you are doing.
	. '</pre></div>'
    . $text
	;
   }
  // Set $article->text.
  $article->text = $text;
  }

 function param($name) {
  static $plugin, $pluginParams;
  if (!isset($plugin)) {
   $plugin =& JPluginHelper::getPlugin('content', 'AutoReadMore');
   $pluginParams = new JParameter( $plugin->params );
   }
  return $pluginParams->get($name);
  }

 }
