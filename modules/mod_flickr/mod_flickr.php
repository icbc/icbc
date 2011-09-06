<?php
/**
* @version		$Id: mod_flickr.php 2009-05-08 waseem $
* @package		Joomla 1.5
* @copyright	Copyright (C) 2007 - 2009 Waseem Sadiq. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @author		Waseem Sadiq - bulletprooftemplates.com
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

global $mainframe;

// Load the flickr api library
require_once(JPATH_BASE.DS.'modules'.DS.'mod_flickr'.DS.'resources'.DS.'phpFlickr'.DS.'phpFlickr.php');

// Set up flickr photo variables
$f 				= new phpFlickr($params->get('flickrkey')); 
$photoset_id 	= $params->get('set_id');
$photos 		= $f->photosets_getPhotos($photoset_id, NULL, NULL, $params->get('limit')); 

// Give the module a random suffix so that we can load more than one instance
$gallerydiv = rand(1000, 9999);

// Load the module template
require(JModuleHelper::getLayoutPath('mod_flickr'));


// Add the module's scripts and styles to the document header (between <head></head>)
$document = & JFactory::getDocument();

// Load the core mootools library if it is not already loaded
$filename = 'mootools.js';
$path = 'media/system/js/'; // add the path parameter if the path is different than : 'media/system/js/'
JHTML::script($filename, $path, true); // MooTools will load if it is not already loaded

// Load the slimbox files if selected
if ($params->get('slimbox')) {
$document->addScript ('modules/mod_flickr/resources/js/slimbox.js');
$document->addStyleSheet(JURI::base(). 'modules/mod_flickr/resources/css/slimbox/slimbox.css');
}

// Load the flickr module's stylesheet if selected
if ($params->get('flickrstyle')) {
$document->addStyleSheet(JURI::base(). 'modules/mod_flickr/resources/css/style.css');
}

// Hide the flickr module's logo if not selected
if (!$params->get('logo')) {
$document->addStyledeclaration('div#flickrdev {display:none;}');
}
