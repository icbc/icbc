<?php
/**
 * RokPad Editor Plugin
 *
 * @package RocketTheme
 * @subpackage rokpad
 * @version   1.2 April 9, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Core Editor Highlighter: CodeMirror <http://marijn.haverbeke.nl/codemirror/>
 * HTML Tidy: HTMLPurifier <http://htmlpurifier.org>
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

/**
 * RokPad Editor Plugin
 *
 * @package RocketTheme
 * @subpackage rokpad
 * @since 1.5
 */
class plgEditorRokPad extends JPlugin
{
	function plgEditorRokPad(& $subject, $config)
	{
		parent::__construct($subject, $config);
		$this->config = $config;
		$this->loadLanguage( '', JPATH_ADMINISTRATOR );
		
		$this->isComponentPage = (substr(JRequest::getVar('option'), 0, 4) == 'com_') ? true : false;
		$this->isComponentPage = false;
	}

	function onInit()
	{
		if ($this->isComponentPage) {
			$txt =	"<script type=\"text/javascript\">
						function insertAtCursor(myField, myValue) {
							if (document.selection) {
								// IE support
								myField.focus();
								sel = document.selection.createRange();
								sel.text = myValue;
							} else if (myField.selectionStart || myField.selectionStart == '0') {
								// MOZILLA/NETSCAPE support
								var startPos = myField.selectionStart;
								var endPos = myField.selectionEnd;
								myField.value = myField.value.substring(0, startPos)
									+ myValue
									+ myField.value.substring(endPos, myField.value.length);
							} else {
								myField.value += myValue;
							}
						}
					</script>";
			return $txt;
		}
		
		if (!defined("ROKPAD")) {
			$doc = & JFactory::getDocument();
			
			$path = JURI::root()."plugins/editors/rokpad";
			$cm = "$path/codemirror";
		
			$doc->addScript("$cm/js/codemirror.js");
			$doc->addScript("$path/js/dateformat.js");
			$doc->addScript("$path/js/rokpad.js");
			$doc->addScriptDeclaration("window.RokPadPath = '$cm';");
			$doc->addStyleSheet("$path/css/rokpad.css");
			$doc->addScriptDeclaration("window.rokeditors = {}; window.rokpadSettings = {};");			
			
			define("ROKPAD", 1);
		}
		
		return "";
	}

	function onSave($editor) {
		if ($this->isComponentPage) return;

		return "document.getElementById('$editor').value = window.rokeditors['$editor'].codemirror.getCode();\n";
	}
	
	function onGetContent($editor) {
		if ($this->isComponentPage) return "document.getElementById( '$editor' ).value;\n";
		
		return "window.rokeditors['$editor'].codemirror.getCode();\n";
	}

	function onSetContent($editor, $html) {
		if ($this->isComponentPage) return "document.getElementById( '$editor' ).value = $html;\n";
		
		return "window.rokeditors['$editor'].codemirror.setCode($html);\n";
	}

	function onDisplay( $name, $content, $width, $height, $col, $row, $buttons = true )
	{
		
		$doc = & JFactory::getDocument();
		
		// Only add "px" to width and height if they are not given as a percentage
		if (is_numeric( $width )) {
			$width .= 'px';
		}
		if (is_numeric( $height )) {
			$height .= 'px';
		}
		
		if ($this->isComponentPage) {
			$buttons = $this->_displayButtons($name, $buttons);
			$editor  = "<textarea name=\"$name\" id=\"$name\" cols=\"$col\" rows=\"$row\" style=\"width: $width; height: $height;\">$content</textarea>" . $buttons;

			return $editor;
		}

		$settings = $this->_getSettings();
		$this->rokpadLoader = "";
		$formatting = $this->_loadFormatting($name);		
		$doc->addScriptDeclaration("window.rokpadSettings['$name'] = {".$settings."};
			window.addEvent('domready', function() {window.rokeditors['$name'] = new RokPad('$name'); ".$this->rokpadLoader."});");

		$buttons = $this->_displayButtons($name, $buttons);
		$topbar = '<div class="rokpad"><div class="rokpad-topbar">'.$this->_createToolbar().'</div>';
		
		if ($formatting !== false && $this->params->get('rokpad-show-formatter', 1)) $formattingBar = '<div class="text-formatting">'.$formatting.'</div>';
		else $formattingBar = "";
		
		$hiddenbar = '<div class="hidden-bar">'.$this->_hiddenBar().'</div>';
		$handle = '<div class="handle"><div class="handle-center"></div></div>';
		$statusbar = '<div class="status-bar">
			<div class="last-save section">'.JText::_('ROKPAD.LAST_SAVE').':<span>'.JText::_('ROKPAD.NEVER').'</span></div>
			<div class="line section">'.JText::_('ROKPAD.LINE').': <span>0</span> | '.JText::_('ROKPAD.COLUMN').': <span>0</span> | '.JText::_('ROKPAD.LENGTH').': <span>0</span></div>
		</div>';
		$editor  = "<textarea name=\"$name\" id=\"$name\" cols=\"$col\" rows=\"$row\" style=\"width: $width; height: $height;\">$content</textarea>";
		
		return $topbar.$formattingBar.$hiddenbar.$editor.$statusbar.$handle.$buttons."</div>";
	}

	function onGetInsertMethod($name)
	{
		$doc = & JFactory::getDocument();
		
		if ($this->isComponentPage) {
			$js= "\tfunction jInsertEditorText( text, editor ) {
				insertAtCursor( document.getElementById(editor), text );
			}";
		} else {
			$js = "\tfunction jInsertEditorText(text, editor) {
				window.rokeditors['$name'].codemirror.replaceSelection(text);\n
			}";
		}
		
		$doc->addScriptDeclaration($js);

		return true;
	}
	
	function _getSettings()
	{
		$settings = array();
		
		// Height
		$height = $this->params->get("rokpad-height", 350) . "px";
		$settings[] = "height: '$height'";
		
		// Parser 
		$parser = $this->params->get("rokpad-parser", "xhtmlmixed");

		switch($parser) {
			case "xhtml":
				$settings[] = "parserfile: 'parsexml.js', \nstylesheet: window.RokPadPath+'/css/xmlcolors.css'";
				break;
			case "css":
				$settings[] = "parserfile: 'parsecss.js', \nstylesheet: window.RokPadPath+'/css/csscolors.css'";
				break;
			case "javascript":
				$settings[] = "parserfile: ['tokenizejavascript.js', parsejavascript.js'], \nstylesheet: window.RokPadPath+'/css/jscolors.css'";
				break;
			case "php":
				$settings[] = "parserfile: ['tokenizephp.js', parsephp.js'], \nstylesheet: window.RokPadPath+'/css/phpcolors.css'";
				break;
			case "xhtmlmixed":
				$settings[] = "parserfile: ['parsexml.js', 'parsecss.js', 'tokenizejavascript.js', 'parsejavascript.js', 'parsehtmlmixed.js'], \nstylesheet: [window.RokPadPath+'/css/xmlcolors.css', window.RokPadPath+'/css/jscolors.css', window.RokPadPath+'/css/csscolors.css']";
				break;
			case "phpxhtmlmixed":
				$settings[] = "parserfile: ['parsexml.js', 'parsecss.js', 'tokenizejavascript.js', 'parsejavascript.js', 'tokenizephp.js', 'parsephp.js', 'parsephphtmlmixed.js'], \nstylesheet: [window.RokPadPath+'/css/xmlcolors.css', window.RokPadPath+'/css/jscolors.css', window.RokPadPath+'/css/csscolors.css', window.RokPadPath+'/css/phpcolors.css']";
				break;
		}
		
		// Pass delay
		$passdelay = $this->params->get("rokpad-passdelay", 200);
		$settings[] = "passDelay: $passdelay";
		
		// Pass time
		$passtime = $this->params->get("rokpad-passtime", 50);
		$settings[] = "passTime: $passtime";
		
		// Line Number delay
		$linenumberdelay = $this->params->get("rokpad-linenumberdelay", 200);
		$settings[] = "lineNumberDelay: $linenumberdelay";
		
		// Line Number time
		$linenumbertime = $this->params->get("rokpad-linenumbertime", 50);
		$settings[] = "lineNumberTime: $linenumbertime";
		
		// Continuous Scanning
		$continuous = $this->params->get("rokpad-continuous", 200);
		$settings[] = "continuousScanning: $continuous";
		
		// Match Parens
		$parens = $this->params->get("rokpad-matchparens", 1);
		$settings[] = "autoMatchParens: $parens";
		
		// History Depth
		$history = $this->params->get("rokpad-history", 50);
		$settings[] = "undoDepth: $history";
		
		// History Delay
		$historyDelay = $this->params->get("rokpad-history-delay", 800);
		$settings[] = "undoDelay: $historyDelay";
		
		// Line Numbers
		$linesNumber = $this->params->get('rokpad-lineHandler', 1);
		$settings[] = "lineNumbers: " . $linesNumber;
		
		// Text Wrapping
		$textWrapping = $this->params->get('rokpad-textwrapperHandler', 1);
		$settings[] = "textWrapping: " . $textWrapping;
		
		// Indent Unit
		$indentUnit = $this->params->get("rokpad-indentunit", 2);
		$settings[] = "indentUnit: $indentUnit";
		
		// Tab Mode
		$tabmode = $this->params->get("rokpad-tabmode", "indent");
		$settings[] = "tabMode: '$tabmode'";
		
		// Load Indent
		$loadindent = $this->params->get("rokpad-loadindent", 1);
		$settings[] = "reindentOnLoad: $loadindent";
		
		// DocType
		$doctype = $this->params->get("rokpad-tidylevel", "XHTML 1.0 Transitional");
		$settings[] = "doctype: '$doctype'";
		
		return join(",\n", $settings);
	}
	
	function _createToolbar()
	{
		return $this->_leftBar().$this->_rightBar();
	}
	
	function _leftBar()
	{
		$useragent = $_SERVER["HTTP_USER_AGENT"];

		if (strstr($useragent,"Mac")) $os = "mac";
		else $os = "other";
		
		if ($os != "mac") {
			$shift = "SHIFT-";
			$opt = "ALT-";
			$cmd = "CTRL-";
		} else {
			$shift = "&#x21E7; ";
			$opt = "&#x2325; ";
			$cmd = "&#x2318; ";
		}
		
		$left = '<div class="left-bar">';
		
			// save
			$left .= '<div class="save disabled rokpadbutton"><span>'.JText::_('SAVE').' ('.$cmd.'S)</span></div>';
			// separator
			$left .= '<div class="separator"></div>';
			// back
			$left .= '<div class="back disabled rokpadbutton"><span>'.JText::_('ROKPAD.UNDO').' ('.$cmd.'Z)</span></div>';
			// forward
			$left .= '<div class="forward disabled rokpadbutton"><span>'.JText::_('ROKPAD.REDO').' ('.$cmd.$shift.'Z)</span></div>';
			// separator
			$left .= '<div class="separator"></div>';
			// auto indent
			$left .= '<div class="auto-indent rokpadbutton"><span>'.JText::_('ROKPAD.AUTOINDENT').' (CTRL-I)</span></div>';
			// goto line
			$left .= '<div class="goto-line rokpadbutton"><span>'.JText::_('ROKPAD.GOTOLINE').' ('.$cmd.'L)</span></div>';
			// search
			$left .= '<div class="search rokpadbutton"><span>'.JText::_('SEARCH').' ('.$opt.'F)</span></div>';

			$parser = $this->params->get("rokpad-parser", "xhtmlmixed");
			if (function_exists("curl_version") && preg_match("/xhtml/", $parser)) {
				// tidy
				$left .= '<div class="tidy rokpadbutton"><span>'.JText::_('ROKPAD.HTMLTIDY').'</span></div>';
			}
		
		$left .= '</div>';
		
		return $left;
	}
	
	function _rightBar()
	{
		$right = '<div class="right-bar">';
		
			// fullscreen
			$right .= '<div class="fullscreen out rokpadbutton"><span>'.JText::_('ROKPAD.FULLSCREEN').'</span></div>';
			$right .= '<div class="setup rokpadbutton"><span>'.JText::_('SETTINGS').'</span></div>';
		
		$right .= '</div>';
		
		return $right;
	}
	
	function _loadFormatting($editorname) 
	{
		$rokpadPath = JPATH_PLUGINS.DS."editors".DS."rokpad".DS."text-formatter";
		$uri = JURI::root() . "/plugins/editors/rokpad/text-formatter/icons/";
		$buttonsXML = $rokpadPath.DS."buttons.xml";
		
		$useragent = $_SERVER["HTTP_USER_AGENT"];

		if (strstr($useragent,"Mac")) $os = "mac";
		else $os = "other";
		
		if ($os != "mac") {
			$shift = "SHIFT-";
			$alt = "ALT-";
			$cmd = "CTRL-";
			$ctrl = "CTRL-";
		} else {
			$shift = "&#x21E7; ";
			$alt = "&#x2325; ";
			$cmd = "&#x2318; ";
			$ctrl = "CTRL-";
		}
		
		if (file_exists($buttonsXML) && is_readable($buttonsXML) && $this->params->get('rokpad-show-formatter')) {
			$xml = new JSimpleXML;
			$xml->loadFile($buttonsXML);
			
			$buttons = $xml->document->children();
			
			$leftOpen = '<div class="left-bar">';
			$left = "";
			$leftClose = '</div>';
			
			$rightOpen = '<div class="right-bar">';
			$right = "";
			$rightClose = '</div>';
			
			$css = "";
			$jsinit = "var RokPadButtons = {'".$editorname."': {}};";
			$jsLoaders = "";
			
			foreach($buttons as $button) {
				if ($button->name() == 'button') {
					$attributes = $button->attributes();
					$name = $attributes['name'];
					$label = $attributes['label'];
					$icon = $attributes['icon'];
					$pos = $attributes['position'];
					if (!isset($icon)) $icon = $name . ".png";
					if (!isset($pos)) $pos = "left";
					if (!isset($label)) $label = $name;
					
					$open = $close = $shortcut = $shortlabel = "";
					foreach($button->children() as $tags) {
						if ($tags->name() == 'open') {
							$open = $tags->data();
						} else if ($tags->name() == 'close') {
							$close = $tags->data();
						} else if ($tags->name() == 'shortcut') {
							$shortcut = '"'.$tags->data().'"';
							
							$rpl = preg_replace("/\s/", "", $shortcut);
							$rpl = str_replace('"', "", $rpl);
							$rpl = explode("+", $rpl);
							
							$shortlabel .= "(";
							foreach($rpl as $r) {
								$tmp = @$$r;
								if (isset($tmp)) $shortlabel .= $tmp;
								else $shortlabel .= strtoupper($r);
							}
							
							$shortlabel .= ")";
							
						}
					}
					if (!strlen($shortcut)) $shortcut = 0;
					$css .= ".".$name." {background: url(".$uri.$icon.") center center no-repeat;}";
					$$pos .= '<div class="'.$name.' rokpadbutton"><span>'.$label.' '.$shortlabel.'</span></div>';
					$jsLoaders .= "RokPadButtons['".$editorname."']['".$name."'] = {'open': \"".$open."\", 'close': \"".$close."\", 'shortcut': ".$shortcut."};\n";
					$jsLoaders .= "$$('div.".$name."')[0].rokpadname = '".$name."'; window.rokeditors['".$editorname."'].attachButton($$('div.".$name."')[0]);";
				} else if ($button->name() == 'separator') {
					$$pos .= "<div class='separator'></div>";
				}
				
				
			}
			
			$doc = & JFactory::getDocument();
			$doc->addStyleDeclaration($css);
			$doc->addScriptDeclaration($jsinit);
			$this->rokpadLoader = $jsLoaders;
			
			return $leftOpen.$left.$leftClose.$rightOpen.$right.$rightClose;
			
		} else {
			return false;
		}
		
		return false;
		/*
		if ((!file_exists($path . $ajax_tool) || (filesize($path . $ajax_tool) != filesize($origin))) && file_exists($path) && is_dir($path) && is_writable($path)) {
            jimport('joomla.filesystem.file');
		$xml = new JSimpleXML;
		$xml->loadFile('simple.xml');*/
	}
	
	function _hiddenBar()
	{
		$lines = $this->params->get('rokpad-lineHandler', 1);
		$textwrapper = $this->params->get('rokpad-textWrapperHandler', 1);
		$linesCheck = ($lines) ? ' checked="checked" ' : '';
		$textWrapperCheck = ($textwrapper) ? ' checked="checked" ' : '';
		$tabModeCheck = $this->params->get("rokpad-tabmode", "indent");
		$indentUnit = $this->params->get("rokpad-indentunit", 2);
		
		$hiddenBar = "";
		
		// Options
		$hiddenBar .= '<div class="toolsPanel panel">
			<div class="tabs">
				<div class="tab-mode">
					<span>'.JText::_('ROKPAD.TABMODE').':</span>
					<select class="tab-mode">
						<option value="indent" '.(($tabModeCheck == 'indent') ? 'selected="selected" ' : '').'>'.JText::_('ROKPAD.AUTOINDENT').'</option>
						<option value="shift" '.(($tabModeCheck == 'shift') ? 'selected="selected" ' : '').'>'.JText::_('ROKPAD.SHIFT').'</option>
						<option value="spaces" '.(($tabModeCheck == 'spaces') ? 'selected="selected" ' : '').'>'.JText::_('ROKPAD.SPACES').'</option>
						<option value="default" '.(($tabModeCheck == 'default') ? 'selected="selected" ' : '').'>'.JText::_('ROKPAD.NONE').'</option>
					</select>
				</div>
				
				<div class="tab-size">
					<span>'.JText::_('ROKPAD.TABSIZE').':</span>
					<input type="text" class="tab-size" value="'.$indentUnit.'" />
				</div>';
				
				$hiddenBar .= '<div class="line-numbers">
					<label><input type="checkbox" class="lines-number" value="1" '.$linesCheck.' /> '.JText::_('ROKPAD.LINENUMBERS').'</label>
				</div>';
				
				$hiddenBar .= '<div class="text-wrapper">
					<label><input type="checkbox" class="text-wrapper" value="1" '.$textWrapperCheck.' /> '.JText::_('ROKPAD.TEXTWRAPPER').'</label>
				</div>';
				
				$hiddenBar .= '<div class="auto-save">
					<label><input type="checkbox" class="auto-save" value="1" /> '.JText::_('ROKPAD.AUTOSAVEEVERY').' </label>
					<input type="text" class="auto-save-time" value="5" /> '.JText::_('ROKPAD.MIN').'.
				</div>
			</div>
		</div>';
		
		// Search
		$hiddenBar .= '<div class="searchPanel panel">
			<div class="block">
				<div class="search-input">
					'.JText::_('SEARCH').': <input type="text" class="search" />
				</div>
				<div class="buttons">
					<div class="button btnsearch disabled">
						<div class="button-l"></div>
						<div class="button-c"><span>Search</span></div>
						<div class="button-r"></div>
					</div>
				</div>
			</div>
			<div class="block">
				<div class="search-input">
					'.JText::_('ROKPAD.REPLACE').': <input type="text" class="replace" /> 
				</div>
				<div class="buttons">
					<div class="button replace-all-button">
						<div class="button-l"></div>
						<div class="button-c"><span>'.JText::_('ROKPAD.REPLACEALL').'</span></div>
						<div class="button-r"></div>
					</div>
				</div>
				<div class="buttons">
					<div class="button replace-button">
						<div class="button-l"></div>
						<div class="button-c"><span>'.JText::_('ROKPAD.REPLACE').'</span></div>
						<div class="button-r"></div>
					</div>
				</div>
			</div>
			<div class="block">
				<label><input type="checkbox" class="ignore-case" value="0" /> '.JText::_('ROKPAD.IGNORECASE').'</label>
			</div>
		</div>';
		
		// Goto Line
		$hiddenBar .= '<div class="gotoLinePanel panel">'.JText::_('ROKPAD.GOTOLINE').': <input type="text" class="gotoline" /></div>';
		
		return $hiddenBar;
	}
	
	function _displayButtons($name, $buttons)
	{
		// Load modal popup behavior
		JHTML::_('behavior.modal', 'a.modal-button');

		$args['name'] = $name;
		$args['event'] = 'onGetInsertMethod';

		$return = '';
		$results[] = $this->update($args);
		foreach ($results as $result) {
			if (is_string($result) && trim($result)) {
				$return .= $result;
			}
		}

		if(!empty($buttons))
		{
			$results = $this->_subject->getButtons($name, $buttons);

			/*
			 * This will allow plugins to attach buttons or change the behavior on the fly using AJAX
			 */
			$return .= "\n<div id=\"editor-xtd-buttons\">\n";
			foreach ($results as $button)
			{
				/*
				 * Results should be an object
				 */
				if ( $button->get('name') )
				{
					$modal		= ($button->get('modal')) ? 'class="modal-button"' : null;
					$href		= ($button->get('link')) ? 'href="'.$button->get('link').'"' : null;
					$onclick	= ($button->get('onclick')) ? 'onclick="'.$button->get('onclick').'"' : null;
					$return .= "<div class=\"button2-left\"><div class=\"".$button->get('name')."\"><a ".$modal." title=\"".$button->get('text')."\" ".$href." ".$onclick." rel=\"".$button->get('options')."\">".$button->get('text')."</a></div></div>\n";
				}
			}
			$return .= "</div>\n";
		}

		return $return;
	}
}