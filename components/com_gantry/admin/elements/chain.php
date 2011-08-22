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
class JElementChain extends JElement
{
	var	$_name = 'Preset';

	function fetchElement($name, $value, &$node, $control_name)
	{
		global $gantry;

        $buffer = '';
		$class = ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="inputbox"' );
        $chain = $node->children();
		
		$buffer .= "<div class='wrapper'>";
        foreach ($chain as $item) {
            $type =  $item->attributes('type');
            $filename = $type.".php";

            if (JFile::exists(dirname(__FILE__).DS.$filename)) {
                require_once(dirname(__FILE__).DS.$filename);
            } else {
                require_once(JPATH_SITE.DS.'libraries'.DS.'joomla'.DS.'html'.DS.'parameter'.DS.'element'.DS.$filename);
            }

            $elementName = "JElement".ucfirst($type);
            $element = new $elementName;
            $itemName = $name."-".$item->attributes('name');
            $itemValue = $gantry->get($itemName);

            $buffer .= '<div class="chain '.$itemName.' chain-'.$type.'">';
            $buffer .= '<span class="chain-label">'.JTEXT::_($item->attributes('label')).'</span>';
            $buffer .= $element->fetchElement($itemName,$itemValue,$item, $control_name);
            $buffer .= "</div>";

        }
		$buffer .= "</div>";

        return $buffer;
	}
}
