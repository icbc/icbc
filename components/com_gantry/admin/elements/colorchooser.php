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
 * @package     gantry
 * @subpackage  admin.elements
 */
class JElementColorChooser extends JElement {
	

	function fetchElement($name, $value, &$node, $control_name)
	{
		//global $stylesList;
        /**
         * @global Gantry $gantry
         */
		global $gantry;
		$output = '';
		$document =& JFactory::getDocument();
		
		$this->template = end(explode(DS, $gantry->templatePath));
		
		//$styles = '../templates/'.$this->template.'/styles.php';
		//if (file_exists($styles)) include_once($styles);
		//else return "No styles file found";

        if (!defined('GANTRY_CSS')) {
			$document->addStyleSheet($gantry->gantryUrl.'/admin/widgets/gantry.css');
			define('GANTRY_CSS', 1);
		}
		
		if (!defined('GANTRY_MOORAINBOW')) {
			
			$document->addStyleSheet($gantry->gantryUrl.'/admin/widgets/colorchooser/css/mooRainbow.css');
			$document->addScript($gantry->gantryUrl.'/admin/widgets/colorchooser/js/mooRainbow.js');
			
			//$scriptconfig  = $this->populateStyles($stylesList);
			$scriptconfig = $this->rainbowInit();
			
			$document->addScriptDeclaration($scriptconfig);
			
			define('GANTRY_MOORAINBOW',1);
		}
	
		$scriptconfig = $this->newRainbow($name);
		
		$document->addScriptDeclaration($scriptconfig);

		$output .= "<div class='wrapper'>";
		$output .= "<input class=\"picker-input text-color\" id=\"".$control_name.$name."\" name=\"".$control_name."[".$name."]\" type=\"text\" size=\"7\" maxlength=\"7\" value=\"".$value."\" />";
		$output .= "<div class=\"picker\" id=\"myRainbow_".$name."_input\"><div class=\"overlay\"></div></div>\n";
		$output .= "</div>";
		//$output = false;
		
		return $output;
	}
	
	function newRainbow($name)
	{
        global $gantry;

        $name2 = str_replace("-", "_", $name);

		return "
		var r_".$name2.";
		window.addEvent('domready', function() {
			var input = $('params".$name."');
			r_".$name2." = new MooRainbow('myRainbow_".$name."_input', {
				id: 'myRainbow_".$name."',
				startColor: $('params".$name."').getValue().hexToRgb(true) || [255, 255, 255],
				imgPath: '".$gantry->gantryUrl."/admin/widgets/colorchooser/images/',
				onChange: function(color) {
					input.getNext().getFirst().setStyle('background-color', color.hex);
					input.value = color.hex;
					
					if (this.visible) this.okButton.focus();
					
					if (Gantry.MenuItemHead) {
						var cache = Gantry.MenuItemHead.Cache[Gantry.Selection];
						if (!cache) cache = new Hash({});
						cache.set('".$name."', input.value.toString());
					}
				}
			});	
			
			r_".$name2.".okButton.setStyle('outline', 'none');
			$('myRainbow_".$name."_input').addEvent('click', function() {
				(function() {r_".$name2.".okButton.focus()}).delay(10);
			});
			input.addEvent('keyup', function(e) {
				if (e) e = new Event(e);
				if ((this.value.length == 4 || this.value.length == 7) && this.value[0] == '#') {
					var rgb = new Color(this.value);
					var hex = this.value;
					var hsb = rgb.rgbToHsb();
					var color = {
						'hex': hex,
						'rgb': rgb,
						'hsb': hsb
					}
					r_".$name2.".fireEvent('onChange', color);
					r_".$name2.".manualSet(color.rgb);
				};
			}).addEvent('set', function(value) {
				this.value = value;
				this.fireEvent('keyup');
			});
			input.getNext().getFirst().setStyle('background-color', r_".$name2.".sets.hex);
			rainbowLoad('myRainbow_".$name."');
		});\n";
	}
	
	function populateStyles($list)
	{
		$script = "
		var stylesList = new Hash({});
		var styleSelected = null;
		window.addEvent('domready', function() {
			styleSelected = $('paramspresetStyle').getValue();
			$('paramspresetStyle').empty();\n";
		
		reset($list);
		while ( list($name) = each($list) ) {
  			$style =& $list[$name];
			$js = "			stylesList.set('$name', ['{$style->pstyle}'";
			$js .= ", '{$style->bgstyle}'";
			$js .= ", '{$style->fontfamily}'";
			$js .= ", '{$style->linkcolor}'";
			$js .= "]);\n";
			$script .= $js;
		}
			
		$script .= "		});";
		
		return $script;
	}
	
	function rainbowInit()
	{
		return "var rainbowLoad = function(name, hex) {
				if (hex) {
					var n = name.replace('params', '');
					$(n+'_input').getPrevious().value = hex;
					$(n+'_input').getFirst().setStyle('background-color', hex);
				}
			};
		";
	}
}

?>