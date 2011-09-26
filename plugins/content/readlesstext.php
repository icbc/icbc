<?php
/**
 * @Copyright Copyright (C) 2010-2011 parvus
 * @license GNU/GPL GPLv3 http://www.gnu.org/copyleft/gpl.html
 *
 * This file is part of the Joomla! extension plugin readless.
 *
 * readless is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * readless is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with readless.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @version $Id: readless.php 51 2011-03-03 20:24:57Z parvus $
 * @package cutoff
 */

defined( '_JEXEC' ) or die( 'Restricted access' );
?>


<?php
/**
 * @version $Id$
 */

class ReadLessTextHelper
{
  /**
   * Checks whether it is allowed to run.
   * This function does not make any modification.
   * @param $article the item fetched from the database
   * @param $params the parameters to use
   * @param $options OUT the key 'discover' with a boolena value will be filled in.
   * @param $activeByDefaultOnAllContentItems True if all content items must be shortened by 'read less',
   * unless explicitly disallowed.
   * @param $extraDiscoverInfo When Discover mode is active, this string will be printed out too
   * @return Boolean value
   */
  function Filter( $article, $params, &$options, $activeByDefaultOnAllContentItems = false, $extraDiscoverInfo = '' )
  {
    global $option;
    $current = array();
    $current[ 'component' ] = JRequest::getWord( 'option' );
    $current[ 'view' ] = JRequest::getWord( 'view' );
    $current[ 'viewId' ] = JRequest::getInt( 'id' );
    $current[ 'articleId' ] = self::_GetArticleId( $article );
    $allowed = true;

    if ( $params->get( 'when', '0' ) == '0' )
    {
      if ( $activeByDefaultOnAllContentItems )
      {
        $allowedFilters = 'com_content';
        $disallowedFilters = '';
      }
      else
      {
        $allowedFilters = 'com_content:category, com_content:blog, com_content:featured, com_content:section, com_content:frontpage';
        $disallowedFilters = '';
      }
    }
    else
    {
      $allowedFilters = $params->get( 'allowed', '' );
      $disallowedFilters = $params->get( 'disallowed', '' );
    }

    if ( $activeByDefaultOnAllContentItems and ( $current[ 'component' ] == 'com_content' ) )
    {
      $allowedFilters = 'com_content, ' . $allowedFilters;
    }

    $contexts = array();
    $contextDescriptions = array(); /* Only used to facilitate Discover mode. */
    $possiblyInterchangeable = array(); /* Only used to facilitate Discover mode. */
    /* Category/section/other descriptions have to be explicitly enabled.
     * Do not include the more general compact indications of the current
     * page/article in that case.
     */
    if ( $current[ 'articleId' ] != 0 )
    {
      $contexts[] = $current[ 'component' ];
      $contextDescriptions[] = 'all pages of this component';
      $contexts[] = $current[ 'component' ] . ':' . $current[ 'view' ];
      $contextDescriptions[] = 'all similar pages';
      if ( $current[ 'viewId' ] )
      {
        $contexts[] = $current[ 'component' ] . ':' . $current[ 'view' ] . '=' . $current[ 'viewId' ];
        $contextDescriptions[] = 'all items on this page only';
        $possiblyInterchangeable[] = $contexts[ count( $contexts ) - 1 ];
      }
    }
    $contexts[] = $current[ 'component' ] . ':' . $current[ 'articleId' ];
    $contextDescriptions[] = 'this item only on all pages';
    $contexts[] = $current[ 'component' ] . ':' . $current[ 'view' ] . ':' . $current[ 'articleId' ];
    $contextDescriptions[] = 'this item only on all similar pages';
    $possiblyInterchangeable[] = $contexts[ count( $contexts ) - 1 ];
    if ( $current[ 'viewId' ] )
    {
      $contexts[] = $current[ 'component' ] . ':' . $current[ 'view' ] . '=' . $current[ 'viewId' ] . ':' . $current[ 'articleId' ];
      $contextDescriptions[] = 'this item only on this page only';
      $possiblyInterchangeable[] = $contexts[ count( $contexts ) - 1 ];
    }

    /* Loop over key (may be active if filter does not match) value (parameter name) pairs */
    $loop = array( false => $allowedFilters, true => $disallowedFilters);
    foreach ( $loop as $defaultAllowed => $filters )
    {
      if ( $filters )
      {
        /* A bit more manipulation is required here: $filters can be given in
         * different formats
         * @li {component}:{view}:{id} targets a specific article displayed in all the views of the given type.
         * @li {component}:{view=id}:{id} targets a specific article displayed in the given view only.
         * @li {component}:{id} targets a specific article displayed in any view.
         * @li {component}:{view} targets all articles displayed in all the views of the given type.
         * @li {component}:{view=id} targets all articles displayed in the given view .
         * @li {component} targets all articles of that component.
         * @note If {component}: is not given, com_content is assumed.
         * @note If {view} is not given, it is not checked for.
         * The string manipulations below ensure that all filters start with a component name
         * followed by a view (with or without id) and/or and id.
         */
        $filters = ',' . JString::strtolower( $filters );
        $search = array( ' ', ',', '+com_', '+' );
        $replace = array( '', ',+', 'com_', 'com_content:' );
        $filters = JString::str_ireplace( $search, $replace, $filters );
        $filterList = explode( ',', $filters );

        $filterAllows = $defaultAllowed;
        foreach ( $contexts as $c )
        {
          if ( in_array( $c, $filterList ) !== FALSE )
          {
            $filterAllows = !/*NOT*/$defaultAllowed;
            $lastMatchingContext = $c;
            break;
          }
        }
        $allowed &= $filterAllows;
      }
      else
      {
        /* There is no restriction set. Retain the default or already determined value for $allowed. */
      }
    }

    $discover = $params->get( 'discover', false );
    if ( $discover )
    {
      $version = new JVersion();
  		if ($version->RELEASE == '1.6')
  	  {
  	    $discover = JFactory::getUser()->authorise( 'core.admin' );
  	  }
  	  else
  	  {
  	    /* J1.5 */
  	    $discover = ( JFactory::getUser()->gid >= 22 );
  	  }
    }
    $options[ 'discover' ] = $discover; /* Store this value so that others don't need to perform the same logic. */
    if ( $discover )
    {
      $enableordisable = array( true => "disable", false => "enable" );

      $pluginName = "<em>read less</em>";
      $article->text = "";
      $activeornot = array( true => "<strong>active</strong>", false => "<strong>not active</strong>" );
      $article->text = "<p>" . $pluginName . " is " . $activeornot[$allowed] . " on this item.";
      if ( isset( $lastMatchingContext ) )
      {
      	/* Maybe active, maybe not, but at least one context matched. */
        $article->text .= "<br/>The last context you configured that matched the current item is <strong><code>" . $lastMatchingContext . "</code></strong>";
        if ( !/*NOT*/$allowed )
        {
          $article->text .= "<br>If you want to enable this item on this page, you minimally need to remove or change this context.";
        }
      }
      else if ( $allowed )
      {
        /* Active, but no context ever matched. */
        $article->text .= "<br/>There are no contexts listed where " . $pluginName . " is allowed to be active, so it is <strong>active by default</strong>.";
      }
      else
      {
        /* Not active, but no context ever matched. */
        $article->text .= "<br/>No context matches the current item, so it is <strong>not active by default</strong>.";
      }
      $article->text .= "</p><ul>If you want to " . $enableordisable[$allowed] . " " . $pluginName . " on ";
      for ( $i = 0; $i < count( $contexts ); $i++)
      {
        $article->text .= "<li>" . $contextDescriptions[$i] . ", you can use the context <code>" . $contexts[$i] . "</code>";
      }
      $article->text .= "</ul>";

      $article->text .= "<p>";
      if ( $current[ 'component' ] == 'com_content' )
      {
        $article->text .= "<strong>Note</strong>: when configuring, you may omit <code>com_content:</code> from the context string.";
      }
      $article->text .= "<br/>";
      if ( $current[ 'articleId' ] == $current[ 'viewId' ] )
      {
        $article->text .= "<strong>Note</strong>: if the view name <code>"
            . $current[ 'view' ]
            . "</code> serves to display a single item/article, the contexts <code>"
            . implode( '</code>, <code>', $possiblyInterchangeable )
            . "</code> yield the same result and are interchangeable.";
      }
      $article->text .= "<br/>";
      if ( $extraDiscoverInfo )
      {
        $article->text .= "<strong>" . $extraDiscoverInfo . "</strong>";
      }
      $article->text .= "</p>";
    }
    return $allowed;
  }

  /**
   * Determines the id of the article this plugin is being called upon.
   * Works for com_content and com_eventlist items,
   * and others (list?)
   * @param $article
   * @return A number.
   */
  function _GetArticleId( &$article )
  {
    $id = 0;
    /* Order of for loop is important: the last one present 'wins'. */
    foreach ( array( 'id', 'cid', 'did' ) as $field )
    {
      if ( isset( $article->$field ) )
      {
        $id = (int)$article->$field;
      }
    }
    return $id;
  }

  /**
   * Examines a given string and cuts a given string near the given length,
   * such that the cut appears at the end of a word.
   * @param $string The plaintext string to examine.
   * @param $cutOffLength IN The position+1 near which the string must be cut off.
   * OUT The position+1 at which the string is cut off.
   * @return The string, cut off near $cutOffLength.
   * @note The resulting string will contain at least one word. Thus, for very low
   * values of $cutOffLength the cut may happen after that length. For reasonable
   * and high values the cut will happen before that length.
   */
  function CutAtEndOfWord( $string, & $cutOffLength )
  {
    $string = JString::str_ireplace( "\r", " ", $string );
    $string = JString::str_ireplace( "\n", " ", $string );

    $string = wordwrap( $string, $cutOffLength, "\n" );
    /* I would like to use stristr with the third argument $before_needle
     * set to true, but that is only supported from 5.3 onwards.
     * I guess more users are reached when I play safe and use
     * a combination of strpos and substr instead.
     */
    $expandedLength = JString::strpos( $string, "\n" );
    if ( $expandedLength )
    {
      $expandedString = JString::substr( $string, 0, $expandedLength );
      $cutOffLength = $expandedLength;
    }
    else
    {
      $expandedString = $string;
    }

    return $expandedString;
  }

  /**
   * Determines the -fix for the given article (prefix or suffix).
   * @param $article RO.
   * @param $fix The parametrized string to consider
   * @param $dateFormat Determines the format for the date fields to expand
   * in $fix.
   * @return The -fix, fully expanded.
   */
  function ExpandFix( &$article, $fix, $dateFormat )
  {
    foreach ( array( 'author', 'introtext', 'fulltext' ) as $field )
    {
      if (!/*NOT*/ isset( $article->$field ) )
      {
        /* Better have no -fix than one that's only partially expanded.
         * Besides, who wants to have a -fix on articles or items
         * that don't have this field set?
         */
        $fix = '';
      }
    }
    if ( $fix )
    {
      $search = array(
      		"{author}",
      		"{words}",
          "{created}",
      		"{modified}",
          "{publish_up}",
          isset( $article->hits ) ? "{hits}" : "{n.a.}",
          "{category}" );
      $creationDate = new JDate( $article->created );
      if ( $article->modified == '0000-00-00 00:00:00' )
      {
        $modificationDate = $creationDate;
      }
      else
      {
        $modificationDate = new JDate( $article->modified );
      }
      $publicationDate = new JDate( $article->publish_up );
      $replace = array(
          $article->created_by_alias ? $article->created_by_alias : $article->author,
          str_word_count( strip_tags( $article->introtext . ' ' . $article->fulltext ) ),
          $creationDate->toFormat( $dateFormat ),
          $modificationDate->toFormat( $dateFormat ),
          $publicationDate->toFormat( $dateFormat ),
          isset( $article->hits ) ? $article->hits : "{n.a.}",
          $article->category );
      $fix = JString::str_ireplace( $search, $replace, $fix );
    }
    return $fix;
  }

	/**
	 * Determines the correct url to the corresponding thumbnail.
	 * If the thumbnail does not exist, it is created
	 * @param $url The path to the image
	 * @param $minimum Associative array, with keys 'width', 'height', 'ratio',
	 * and values 0 or positive numbers, epxressed in pixels or bytes.
	 * Only looked at when the thumbnail does not exist yet and has to be
	 * created.
	 * @param $thumbWidth
	 * @param $thumbHeight
	 * @param $lifetime The lifetime of the thumbnail in seconds to set when it
	 * is created by calling this function. Not used to check if the existing
	 * thumbnail is still valid. Default: 4 weeks (2419200 seconds).
	 * @return false if an error occurred or if the given $url is incorrect.
	 * The path to the thumbnail otherwise.
	 */
	function GetThumbnail( $url, $minimum, $thumbWidth, $thumbHeight, $lifetime = 2419200 )
	{
	  $path = JPATH_CACHE . '/plg_readlesstext/';
	  if ( !/*NOT*/@file_exists( $path ) )
	  {
	    @mkdir( $path );
	  }
	  $string = $url . $minimum[ 'width'] . $minimum[ 'height']
	      . $minimum[ 'ratio'] . $thumbWidth . $thumbHeight;
	  $thumbnailPath = $path . md5( $string );
	  $thumbnailUrl = JString::str_ireplace( JPATH_BASE, JURI::base(), $thumbnailPath );
	  $noThumbnailPath = $thumbnailPath . '.x';
 		/* .ext appended below */

	  if ( @file_exists( $noThumbnailPath ) )
	  {
	    /* The image resource $url has during a previous execution been
	     * examined. According to the settings, it is not fit to serve
	     * as a thumbnail.
	     */
	    $thumbnailUrl = false;
	  }
	  else
	  {
  	  $type = @exif_imagetype( $url );
  	  if ( $type and array_key_exists( $type, self::$_image ) )
  	  {
  	    $thumbnailPath .= self::$_image[ $type ][ 'ext' ];
  	    $thumbnailUrl .= self::$_image[ $type ][ 'ext' ];
    	  if ( @file_exists( $thumbnailPath ) )
    	  {
    	    /* Thumbnail already exists.
    	     *
    	     * The image resource $url has been examined during a previous
    	     * execution. According to the settings, it is fit to serve
    	     * as a thumbnail.
    	     *
    	     * Done!
    	     */
    	  }
    	  else if ( !/*NOT*/@is_dir( $path ) or !/*NOT*/@is_writable( $path ) )
    	  {
    	    /* Insuficient write permissions. Use fall-back. */
    	    $thumbnailUrl = $url;
    	  }
    	  else
    	  {
    	    $image = call_user_func( self::$_image[ $type ][ 'load' ], $url );

       	  $width = max( 1, @imagesx( $image ) ); /* Ensure a division is possible. */
       	  $height = max( 1, @imagesy( $image ) ); /* Ensure a division is possible. */
       	  $ratio = min( $width / $height, $height / $width );

       	  if ( ( $width < $minimum[ 'width' ] )
       	      or ( $height < $minimum[ 'height' ] )
       	      or ( $ratio < $minimum[ 'ratio' ] ) )
   	      {
   	        /* Thumbnail may not be created.
   	         * According to the settings, it is not fit to serve as a thumbnail.
   	         */

   	        @file_put_contents( $noThumbnailPath, time() );
        		/* The expiration information is not used directly, but it is still
        		 * added to allow the system's garbage collection to work.
        		 */
        		$expirePath = $noThumbnailPath . '_expire';
        		@file_put_contents( $expirePath, ( time() + $lifetime ) );

   	        $thumbnailUrl = false;
   	      }
   	      else
   	      {
         	  /* Find the resized dimensions, keeping the proportions. */
         	  if ( $thumbWidth > 0 )
         	  {
         	    if ( $thumbHeight > 0 )
         	    {
             	  $resizeFactorWidth = $thumbWidth / $width;
             	  $resizeFactorHeight = $thumbHeight / $height;
             	  $resizeFactor = min($resizeFactorWidth, $resizeFactorHeight );
         	    }
         	    else
         	    {
         	      $resizeFactor = $thumbWidth / $width;
         	    }
         	  }
         	  else
         	  {
         	    if ( $thumbHeight > 0 )
         	    {
         	      $resizeFactor = $thumbHeight / $width;
         	    }
         	    else
         	    {
         	      $resizeFactor = 1.00;
         	    }
         	  }
         	  $thumbWidth = max( 1, intval( $resizeFactor * $width ) );
         	  $thumbHeight = max ( 1, intval( $resizeFactor * $height ) );
      	    $thumbnail = call_user_func( self::$_image[ $type ][ 'create' ], $thumbWidth, $thumbHeight );

      	    if ( $type == 1 /* IMAGETYPE_GIF */ )
        		{
      		    /* Make the thumbnail initially transparent if the original was transparent too.
      		     * Otherwise, fill it initially up with all white.
      		     */
      		    $transparentColorIdentifier = @imagecolortransparent( $image );
      		    if( $transparentColorIdentifier >= 0 )
      		    {
      		      $colors = @imagecolorsforindex( $image, $transparentColorIdentifier );
        				$transcolorindex = @imagecolorallocate( $thumbnail, $colors[ 'red' ], $colors[ 'green' ], $colors[ 'blue' ] );
        				@imagefill( $thumbnail, 0, 0, $transcolorindex );
        				@imagecolortransparent( $thumbnail, $transcolorindex ); /* Needed? */
      		    }
      		    else
      		    {
      		      $whiteColorIdentifier = @imagecolorallocate( $thumbnail, 255, 255, 255 );
      				  @imagefill( $thumbnail, 0, 0, $whitecolorindex);
      		    }
        		}

        		if ( self::$_image[ $type ][ 'create_alpha' ] )
        		{
        		  call_user_func( self::$_image[ $type ][ 'create_alpha' ], $thumbnail, false );
        		}
      	    call_user_func( self::$_image[ $type ][ 'copy' ], $thumbnail, $image, 0, 0, 0, 0,
        			    $thumbWidth, $thumbHeight, $width, $height );
        		if ( self::$_image[ $type ][ 'save_alpha' ] )
        		{
        		  call_user_func( self::$_image[ $type ][ 'save_alpha' ], $thumbnail, true );
        		}
        		call_user_func( self::$_image[ $type ][ 'save' ], $thumbnail, $thumbnailPath );

        		/* The expiration information is not used directly, but it is still
        		 * added to allow the system's garbage collection to work.
        		 */
        		$expirePath = $thumbnailPath . '_expire';
        		@file_put_contents( $expirePath, ( time() + $lifetime) );
   	      }
    	  }
  	  }
  	  else
  	  {
	    	/* To me, the remaining image types are esoteric. Some of them I never
			   * even heard of.
			   * OR
			   * Determining the image type failed.
			   */
        @file_put_contents( $noThumbnailPath, time() );
    		/* The expiration information is not used directly, but it is still
    		 * added to allow the system's garbage collection to work.
    		 */
    		$expirePath = $noThumbnailPath . '_expire';
    		@file_put_contents( $expirePath, ( time() + $lifetime ) );

        $thumbnailUrl = false;
  	  }
	  }

		return $thumbnailUrl;
	}

	static $_image = array(
    1 /* IMAGETYPE_GIF */ => array(
      'ext' => '.gif',
      'load' => 'imagecreatefromgif',
      'create' => 'imagecreate',
    	'create_alpha' => '',
      'copy' => 'imagecopyresampled',
    	'save_alpha' => '',
      'save' => 'imagegif'
      ),
    2 /* IMAGETYPE_JPEG */ => array(
      'ext' => '.jpg',
      'load' => 'imagecreatefromjpeg',
    	'create' => 'imagecreatetruecolor',
    	'create_alpha' => '',
      'copy' => 'imagecopyresampled',
    	'save_alpha' => '',
      'save' => 'imagejpeg'
      ),
    3 /* IMAGETYPE_PNG */ => array(
      'ext' => '.png',
      'load' => 'imagecreatefrompng',
    	'create' => 'imagecreatetruecolor',
    	'create_alpha' => 'imagealphablending',
      'copy' => 'imagecopyresampled',
      'save_alpha' => 'imagesavealpha',
      'save' => 'imagepng'
      ) );
}
?>

<?php
/**
 * @version $Id$
 */

class plgContentReadLessText extends JPlugin
{
  public function __construct(& $subject, $config)
  {
    parent::__construct($subject, $config);
    $this->loadLanguage();
  }

  /**
   * Entry function. Will be called each time some article text
   * is to be prepared for display.
   * @return void
   * @{
   */
  public function onContentPrepare ( $context, &$article, &$params, $limitstart )
  {
    $this->_ReadLessText( $article );
  }
  function onPrepareContent( &$row, &$params, $page )
  {
    /* J1.5 */
    $this->_ReadLessText( $row );
  }
  /** @} */

  function _ReadLessText( &$article )
  {
//    jimport( 'joomla.error.profiler' );
//    $profiler = new JProfiler();
    $alwaysActiveForGuests = $this->params->get( 'alwaysActiveForGuests', '0' );
    if ( $alwaysActiveForGuests )
    {
      $extraDiscoverInfo = 'Guests can only see the shortened article, unless a context in the <code>Disallowed</code> field matches this item.';
      $activeByDefaultOnAllContentItems = ( JFactory::getUser()->guest == 1 );
    }
    else
    {
      $extraDiscoverInfo = '';
      $activeByDefaultOnAllContentItems = false;
    }
    $options = array();
    if ( ReadLessTextHelper::Filter( $article, $this->params, $options, $activeByDefaultOnAllContentItems, $extraDiscoverInfo ) )
    {
      $length = self::_PrepareArticleText( $article, $this->params, $options );
      if ( $length )
      {
        $imageHtml = self::_PopImages( $options[ 'htmltext' ], $article->title, $options[ 'articleUrl' ] );
        /* Save processing time by retaining just the plain text.
         * We loose the ability to remove tags with their contents, though.
         */
        if ( in_array( 'all', $options[ 'tagsToRemoveList' ] ) )
        {
          $article->text = $options[ 'plainText' ];
        }
        else
        {
          $article->text = $options[ 'htmltext' ];
        }
        $article->text = self::_CutOff( $article->text, $length, $options );
        $article->text = $imageHtml . $options[ 'prefix' ] . $article->text;
      }
    }
//    $article->text .= $profiler->mark( ' Profiler ' );
  }

  /**
   * When this function returns, the given article's text contains the
   * correct text to operate on.
   * @param $article Adapts the existing properties fulltext, readmore.
   * Does @b not adapt the property @c text
   * @param $params the parameters to use
   * @param $options IN OUT Reads 'discover'.
   * Writes 'plainText', 'tagsToRemoveList', 'tagsToRemoveWithContentsList',
   * 'extraSelfClosingTagsList', 'articleUrl', 'cutOffTextAtWordBoundary',
   * 'dateFormat', 'prefix', 'suffix', 'htmlText'.
   * @return mixed boolean false to indicate article may not be cut off,
   * or a strict positive number indicating the nr of plaintext characters
   * to retain.
   */
  function _PrepareArticleText( &$article, $params, &$options )
  {
    if ( $options[ 'discover' ] )
    {
      /* Discover mode is active: the article's text has been replaced with discover information
       * and may not be cut off.
       */
      $cutOffLength = false;
    }
    else
    {
      /* plainIntroText: the plain text version of the article up to the manually inserted read more link.
       * plainFullText: the plain text version of the article after the manually inserted read more link.
       * options[ 'plainText' ]: The plain text version of the entire article,
       * before and after the possibly manually inserted read more link,
       * without the read more link.
       */
      $plainIntroText = '';
      $plainFullText = '';
      $options[ 'plainText' ] = '';
      $options[ 'htmltext' ] = '';
      if ( isset( $article->introtext ) and isset( $article->fulltext ) )
      {
        $plainIntroText = strip_tags( $article->introtext ) . ' ';
        $plainFullText = strip_tags( $article->fulltext );
        $article->fulltext = '';
        $options[ 'plainText' ] = $plainIntroText . ' ' . $plainFullText;
        $options[ 'htmltext' ] = $article->introtext . ' ' . $article->fulltext;
      }
      else if ( isset( $article->text ) )
      {
        $options[ 'plainText' ] = strip_tags( $article->text );
        $options[ 'htmltext' ] = $article->text;
      }
      $article->readmore = "0";

      /* When a 'read more' link has been explicitly inserted, this means:
       * - fulltext is not empty. And thus:
       * - text is made by combining introtext, a hr tag (id 'system-readmore')
       *   and fulltext; and the property 'readmore' is set to '1' in $article.
       * When no 'read more' link has been inserted, this means:
       * - fulltext is empty. And thus:
       * - text equals introtext
       *
       * Ensure the deault readmore text will not be appended after
       * readLess has finished.
       */
      $cutOffLength = false;
      $respectExistingReadmoreLink = $params->get( 'respectExistingReadmoreLink', true );
      if ( $respectExistingReadmoreLink )
      {
        if ( $plainFullText )
        {
          $cutOffLength = JString::strlen( $plainIntroText );
        }
      }

      if ( !/*NOT*/$cutOffLength )
      {
        $minimumLength = $params->get( 'minimumTextLength', 1 );
        if ( $minimumLength < JString::strlen( $options[ 'plainText' ] ) )
        {
          $cutOffLength = $params->get( 'cutOffTextLength', 1 );
          if ( $cutOffLength > JString::strlen( $options[ 'plainText' ] ) )
          {
            $cutOffLength = false;
          }
        }
      }

      if ( $cutOffLength )
      {
        /* An array of lower case tags which must be removed
         * together with their closing counter parts.
         */
        $tagsToRemove = JString::strtolower( $params->get( 'tagsToRemove', '' ) );
        $tagsToRemove = JString::str_ireplace( ' ', '', $tagsToRemove );
        $options[ 'tagsToRemoveList' ] = explode( ',', $tagsToRemove );

        /* An array of lower case tags which must be removed
         * together with their closing counter parts
         * and all the text contained within.
         */
        $tagsToRemoveWithContents = JString::strtolower( $params->get( 'tagsToRemoveWithContents', '' ) );
        $tagsToRemoveWithContents = JString::str_ireplace( ' ', '', $tagsToRemoveWithContents );
        $options[ 'tagsToRemoveWithContentsList' ] = explode( ',', $tagsToRemoveWithContents );

        /* An array of lower case tags which must be interpreted as self-closing. */
        $extraSelfClosingTags = JString::strtolower( $params->get( 'extraSelfClosingTags', '' ) );
        $extraSelfClosingTags = JString::str_ireplace( ' ', '', $extraSelfClosingTags );
        $options[ 'extraSelfClosingTagsList' ] = explode( ',', $extraSelfClosingTags );

        $version = new JVersion();
    		if ($version->RELEASE == '1.6')
    	  {
    	    $options[ 'articleUrl' ] = JRoute::_( ContentHelperRoute::getArticleRoute( $article->id, $article->catid ) );
    	  }
    	  else
    	  {
    	    /* J1.5 */
    	    $options[ 'articleUrl' ] = JRoute::_( ContentHelperRoute::getArticleRoute( $article->id, $article->catid, $article->sectionid ) );
    	  }

        $options[ 'dateFormat' ] = $params->get( 'dateFormat', '%m/%d' );
        if ( JFactory::getUser()->guest == 0 )
        {
          $options[ 'prefix' ] = $params->get( 'userPrefix', '' );
          $options[ 'suffix' ] = $params->get( 'userSuffix', '' );
        }
        else
        {
          $options[ 'prefix' ] = $params->get( 'guestPrefix', '' );
          $options[ 'suffix' ] = $params->get( 'guestSuffix', '' );
        }
        $options[ 'prefix' ] = ReadLessTextHelper::ExpandFix( $article, $options[ 'prefix' ], $options[ 'dateFormat' ] );
        $options[ 'suffix' ] = ReadLessTextHelper::ExpandFix( $article, $options[ 'suffix' ], $options[ 'dateFormat' ] );
        $options[ 'suffix' ] = '<a href="' . $options[ 'articleUrl' ] . '">' . $options[ 'suffix' ] . '</a>';

        $options[ 'cutOffTextAtWordBoundary' ] = $params->get( 'cutOffTextAtWordBoundary', false );
      }
    }

    return $cutOffLength;
  }

  /**
   * Searches for an image in the article's text which is big enough according
   * to the configuration settings; removes that image from the article's
   * text, and returns HTML code containing a thumbnail to that image, readily
   * suitable for display.
   * @param $article $article->text is the string to search in and to adapt.
   * @param $articleUrl The full routed article's URL. May be used for linking
   * the returned image.
   * @return String. The HTML code for displaying the styled, resized and
   * linked first image according to the configuration settings, the empty
   * string otherwise.
   */
  function _PopImages( &$articleText, $articleTitle, $articleUrl )
  {
    $offset = 0;
    $imageHtml = '';
    $continue = ( $this->params->get( 'popImage', '1' ) == 1 );
    while ( $continue )
    {
      $matchCount = preg_match( self::_imgPattern, $articleText, $matches, PREG_OFFSET_CAPTURE, $offset );
      $continue = ( $matchCount > 0 );
      if ( $continue )
      {
        $imageCode = $matches[0][0];
        $imageUrl = $matches[1][0];

        /* If no acceptable image has been found yet, try this one. */
        $thumbWidth = $this->params->get( 'thumbWidth', 0 );
        $thumbHeight = $this->params->get( 'thumbHeight', 0 );
        $minimum = array();
        $minimum[ 'width' ] = $this->params->get( 'minimumImageWidth', 0 );
        $minimum[ 'height' ] = $this->params->get( 'minimumImageHeight', 0 );
        $minimum[ 'ratio' ] = max( 0.05, min( 0.95, $this->params->get( 'minimumImageRatio', 0 ) ) );
        $imageUrl = ReadLessTextHelper::GetThumbnail( $imageUrl, $minimum, $thumbWidth, $thumbHeight );
        if ( $imageUrl )
        {
          $attributes = self::_GetImageAttributes( $articleTitle );
          $imageHtml = '<a href="' . $articleUrl . '"><img src="' . $imageUrl. '"' . $attributes . '/></a>';

          /* Remove the code for the image on the old location. */
          $start = JString::strpos( $articleText, $imageCode );
          $articleText = JString::substr_replace( $articleText, '', $start, JString::strlen( $imageCode ) );
          $continue = false;
        }

        /* Prepare the next iteration or end the loop.
         * - The value of $offset determines where the next search starts.
         */
        $offset = $matches[ count( $matches ) - 1 ][1] + 1;
      }
    }

    /* If $imageHtml is the empty string now, one of the following happened:
     * - images may not be moved
     * - no images found
     * - no acceptable image found
     */
    return $imageHtml;
  }

  /**
   * Composes the attributes for the moved image, inclusive the inline CSS
   * attribute @c style.
   * This function does not make any modification.
   * @param alt: A string. The alternative text to be used for the image.
   * @param $width: A Number. Size in pixels
   * @param $height: A Number. Size in pixels
   * @return string: Either the empty string when no attributes are needed;
   * either a string ready for insertion as an attribute in a HTML tag.
   * @note Double quotes are used to quote the value.
   */
  function _GetImageAttributes( $alt )
  {
    $attributes = '';
    $styleValue = '';

    $attributes .= ' alt="' . $alt . '" ';

    $class = $this->params->get( 'imageClass', '' );
    if ( $class )
    {
      $attributes .= ' class="' . $class . '"';
    }

    $imagePosition = $this->params->get( 'imagePosition', 'left' );
    if ( $imagePosition )
    {
      $styleValue .= ' float:' . $imagePosition . ';';
    }
    $margin = $this->params->get( 'imageMargin', '1' );
    if ( $margin >= 0 )
    {
      $styleValue .= ' margin:' . $margin . 'px;';
    }
    $borderWidth = $this->params->get( 'imageBorderWidth', 0 );
    if ( $borderWidth >= 0 )
    {
      $borderColor = $this->params->get( 'imageBorderColor', '#cccccc' );
      $styleValue .= ' border: ' . $borderWidth . 'px ' . ' ' . $borderColor . ';';
    }
    if ( $styleValue )
    {
      $attributes .= ' style="' . $styleValue . '"';
    }

    return $attributes;
  }

  /**
   * Cuts off the article text, retaining the full formatting. It uses
   * regular expressions to find tags, and a simple push/pop system
   * to retain the opened but still-unclosed tags. When the text has been
   * cut off after a admin-configurable plaintext character count, all
   * the opened and still-unclosed tags are then closed.
   * The suffix is added too when needed.
   * @param $text The text too shorten.
   * @param $cutOffLength The size in number of characters of the plain text
   * to retain.
   * @param $options
   * @return The shortened text.
   */
  function _CutOff( $text, $cutOffLength, $options )
  {
    $openTags = array();
    $result = "";
    $numberOfCharactersYetToRetain = $cutOffLength;
    $offset = 0;
    $removeAllUntilEndOfTag = false;
    $continue = true;
    $tagPattern = JString::str_ireplace( self::_tagReplacer, self::_anyTag, self::_tagPattern );
    while ( $continue )
    {
      /* Find HTML tags. Each match is an array of (mostly) interesting data about the tag
       * just found - see above.
       * Using that, we can find the plain text in front of it.
       * The total length of the plain text strings may not be bigger than the maximum article length setting.
       * By using PREG_OFFSET_CAPTURE, each entry in the array returned will be an array itself, containing
       * the matches (sub)string and the starting offset.
       */
      $matchCount = preg_match( $tagPattern, $text, $matches, PREG_OFFSET_CAPTURE, $offset );
      if ( ( $matchCount == 0 ) or ( count( $matches ) < 4 ) )
      {
        /* No (more) HTML tags were found. We can not just assume that the last part
         * of the string is always a HTML tag, especially not when no wysiwig editor
         * has been used to create this article.
         */
        $matchCount = preg_match ( "/.*/is", $text, $matches, PREG_OFFSET_CAPTURE, $offset );
        $plainText = $matches[0][0];
        $fullTag = "";
        $tag = "";
        $isSelfClosingTag = false;
        $isClosingTag = false;
        //$offset = /* Don't care */
        $continue = false;
      }
      else
      {
        $plainText = $matches[1][0];
        $fullTag = $matches[2][0];
        $tag = JString::strtolower( $matches[4][0] );

        /* Determine whether the tag we found is an opening tag (e.g. <abc>),
         * a closing tag (e.g. </abc>) or a self-closing tag (e.g. <abc />).
         * If a closing slash is present, it is captured by the regular expression,
         * either in index 3, either in the last-but-one index
         * - and the last-but-one index is always greater than 3.
         */
        $isSelfClosingTag = $matches[ count( $matches) - 2 ][0] == '/';
        $isClosingTag = $matches[3][0] == '/';

        if ( !/*NOT*/ $isClosingTag )
        {
          if ( in_array( $tag, $options[ 'extraSelfClosingTagsList' ] ) )
          {
            $isSelfClosingTag = true;
          }
        }

        /* Prepare the next loop: the value of $offset determines where the next search starts. */
        $offset = $matches[ count( $matches) - 1 ][1] + 1;
      }

      if ( $removeAllUntilEndOfTag )
      {
        /* We're inside a block of code of which nothing may be retained in the cut-off text.
         * Do not add the plaintext,
         * do not add the tag and
         * prepare the next loop.
         */
        if ( $isClosingTag )
        {
          $removeAllUntilEndOfTag = false;
          $tagPattern = JString::str_ireplace( self::_tagReplacer, self::_anyTag, self::_tagPattern );
        }
      }
      else
      {
        /* Add plaintext */
        $plainTextLength = JString::strlen( $plainText );
        if ( $plainTextLength >= $numberOfCharactersYetToRetain )
        {
          if ( $options[ 'cutOffTextAtWordBoundary' ] )
          {
            $plainText = ReadLessTextHelper::CutAtEndOfWord( $plainText, $numberOfCharactersYetToRetain );
          }
          else
          {
            $plainText = JString::substr( $plainText, 0, $numberOfCharactersYetToRetain );
          }
          $result .= $plainText . $options[ 'suffix' ];
          //$numberOfCharactersYetToRetain = /* Don't care */
          $continue = false;
        }
        else
        {
          $result .= $plainText;
          $numberOfCharactersYetToRetain -= $plainTextLength;
        }

        /* - Add tag,
         * - update the list of opened-and-not-yet-closed tags and
         * - prepare the next loop.
         */
        if ( in_array( $tag, $options[ 'tagsToRemoveWithContentsList' ] ) )
        {
          /* Do not add the tag. */
          if ( $isClosingTag or $isSelfClosingTag )
          {
            /* Nothing more to do. */
          }
          else
          {
            $removeAllUntilEndOfTag = true;
            $tagPattern = JString::str_ireplace( self::_tagReplacer, $tag, self::_tagPattern );
          }
        }
        else if ( in_array( $tag, $options[ 'tagsToRemoveList' ] ) )
        {
          /* Do not add the tag. */
        }
        else if ( $isSelfClosingTag )
        {
          $result .= $fullTag;
        }
        else if ( $isClosingTag )
        {
          $result .= $fullTag;
          /* For simplicity, just assume at this point the text only
           * contains valid HTML, i.e. that all opening tags are properly
           * closed in the correct order. That means we do not need to check
           * whether some pushed opening tag matches with this closing tag:
           * it just has to be.
           */
          unset( $openTags[ count( $openTags ) - 1 ] );
        }
        else
        {
          $result .= $fullTag;
          /* The tag found is a valid opening tag that must remain in the cut-off text. */
          $openTags[] = $tag;
        }
      }
    }

    /* All tags that were opened and not yet closed are now closed here
     * in the correct order: i.e. in reverse order.
     * First ensure that the keys of the array $opentags is numerically
     * correct and always incrementing with 1: during build-up of the
     * array the -then- last element may have been unset, and this may
     * have happened several times.
     * A re-indexing is needed to close the holes thus created.
     */
    $openTags = array_values( $openTags );
    for( $i = count( $openTags ) - 1; $i >= 0; $i-- )
    {
      $result .= '</' . $openTags[ $i ] . '>';
    }

    return $result;
  }

  /**
   * Used to find an image tag in a text.
   *
   * A match found using this regular expression will return at each index:
   * [0] The complete @c img tag, inclusive the brackets and the attributes
   * [1] The value of @src attribute, i.e. the URL where the image can be fetched.
   * [last] The closing bracket. Used to know the precise end byte
   *     offset of the matched tag. Especially needed for multi byte strings
   *     (some of the attributes inside the tag might very well be that),
   *     since JString::strlen returns the number characters, not the number
   *     of bytes. The offset given to preg_match needs to be a byte offset.
   *
   * Note: It is not possible (or: I could not get it to work) to include correct
   * positions together with the found matches when using non-ASCII UTF8 strings
   * when using this pattern with preg_match.
   * The matches returned seem correct though, and strpos can be used to fetch
   * the starting UTF8 character index.
   *
   * @note This is a simplified version of _tagPattern. Potentially this can
   * match a great portion of the text, crossing several html tags, _if_ an img
   * tag is given _without_ a src attribute. If this happens, give them what they
   * are asking for. Or, in other words: don't worry about that.
   */
  const _imgPattern = '/<img.+?src\s*=\s*["\']([^"\']+)["\'][^>]*(>)/mis';
  /*                                           1111111            -1    */

  /**
   * Used to parse an html text by finding all the HTML tags.
   * Thanks to http://kev.coolcavemen.com/2007/03/ultimate-regular-expression-for-html-tag-parsing-with-php/
   * It is a bit modified, to catch the tag without attributes and brackets,
   * the closing tag character '/', and the last char in the match as well.
   *
   * A match found using this regular expression will return at each index:
   * [0] The full match; i.e. the concatenation of everything below
   * [1] The plaintext preceding the tag
   * [2] The complete tag, inclusive the brackets and the attributes
   * [3] Either empty, either '/' when the tag is a closing tag.
   * [4] The tag name
   * [5] The full attributes - possibly not present
   * [6] ...
   * [last but one] If no attributes are present: the closing slash, or the
   *     empty string. If attributes are present: the last attribute
   * [last] The closing bracket. Used to know the precise end byte
   *     offset of the matched tag. Especially needed for multi byte strings
   *     (some of the attributes inside the tag might very well be that),
   *     since JString::strlen returns the number characters, not the number
   *     of bytes. The offset given to preg_match needs to be a byte offset.
   *
   * @note the xxx part is to be replaced
   * - replace with _anyTag to catch any tag
   * - replace with 'abc' to catch tag abc
   */
  const _tagPattern = "/(.*?)(<(\/?)(xxx)((\s+(\w|\w[\w-]*\w)(\s*=\s*(?:\".*?\"|'.*?'|[^'\">\s]+))?)+\s*|\s*)(\/?)(>))/mis";
  /*                     111    333  444   --- attribute ------------------------------------------           -2   -1     */

  const _tagReplacer = 'xxx';

  const _anyTag = '\w+';
}

?>
