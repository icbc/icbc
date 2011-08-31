<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe->registerEvent( 'onPrepareContent', 'plgContentRokStyle' );

function plgContentRokStyle( &$row, &$params, $page=0 )
{
	$display = true;

	//simple performance check to determine whether bot should process further
    if ( strpos( $row->text, '{rokstyle}' ) === false) {
		return true;
	}
	
	//put this on your page if you want rokstyle plugin to not run on this article
	if (strpos ( $row->text, '<!--rokstyle-->') !== false) { 
		return true;
	}
	
	// Get plugin info
	$plugin =& JPluginHelper::getPlugin('content', 'rokstyle');

	
	$pluginParams = new JParameter( $plugin->params );
	
	// define the regular expression for the bot
	$regex = "#{rokstyle}(.*?){/rokstyle}#s";

	// check whether plugin has been unpublished
	if ( !$pluginParams->get( 'enabled', 1 ) ) {
		$row->text = preg_replace( $regex, '', $row->text );
		return true;
	}

	$row->text = preg_replace_callback( $regex, 'plgContentProcessRokStyle', $row->text );

	return true;
}

function plgContentProcessRokStyle(&$matches) {

	$text = $matches[1];

	$doc = & JFactory::getDocument();
	$doc->addStyleDeclaration($text);

	return "";
}

?>
