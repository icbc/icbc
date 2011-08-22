<?php
/**
 * @package     gantry
 * @subpackage  admin.elements
 * @version		3.0.3 June 12, 2010
 * @author		RocketTheme http://www.rockettheme.com
 * @copyright 	Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('JPATH_BASE') or die();

/**
 * Renders chained element
 *
 * @package gantry
 * @subpackage admin.elements
 */
class JElementGroupedParams extends JElement
{
	var	$_name = 'GroupedParams';

	function fetchElement($name, $value, &$node, $control_name)
	{
		global $gantry;

        $buffer = '';
		$class = ( $node->attributes('class') ? $node->attributes('class') : '' );
        $chain = $node->children();
		
		$buffer .= "<div class='wrapper wrapper-".$name." ".$class."'>";


		// Columns
		$leftOpen = "<div class='group-left'>";
		$rightOpen = "<div class='group-right'>";
		$noneOpen = "<div class='group-none'>";
		
		$divClose = "</div>";
		
        foreach ($chain as $item) {
            $type =  $item->attributes('type');
			$position = ($item->attributes('position')) ? $item->attributes('position') : 'none';
			$showLabel = ($item->attributes('showlabel') == "no") ? false : true;
			$position .= "Open";
            $filename = $type.".php";
			$bufferItem = "";

            if (JFile::exists(dirname(__FILE__).DS.$filename)) {
                require_once(dirname(__FILE__).DS.$filename);
            } else {
                require_once(JPATH_SITE.DS.'libraries'.DS.'joomla'.DS.'html'.DS.'parameter'.DS.'element'.DS.$filename);
            }

            $elementName = "JElement".ucfirst($type);
            $element = new $elementName;
            $itemName = $name."-".$item->attributes('name');
            $itemValue = $gantry->get($itemName);

            $bufferItem .= '<div class="group '.$itemName.' group-'.$type.'">';
            if ($showLabel) $bufferItem .= '<span class="group-label">'.JTEXT::_($item->attributes('label')).'</span>';
            $bufferItem .= $element->fetchElement($itemName,$itemValue,$item, $control_name);
            $bufferItem .= "</div>";
			
			$$position .= $bufferItem;

        }
		
		$buffer .= $leftOpen . $divClose . $rightOpen . $divClose . $noneOpen . $divClose;
		
		$buffer .= "</div>";

        return $buffer;
	}
}
