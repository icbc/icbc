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
 * HTMLPurifier: <http://htmlpurifier.org/>
 * htmlawed: <http://www.bioinformatics.org/phplabware/internal_utilities/htmLawed/>
 */
 
 
$DOCTYPE = "XHTML 1.0 Transitional";

include_once(dirname(__FILE__).'/lib/htmLawed.php');

if (isset($_POST)) {
	if (isset($_POST['rokpad_type'])) $field = $_POST['rokpad_type'];
	if (isset($_POST['rokpad_doctype'])) $DOCTYPE = $_POST['rokpad_doctype'];
	if (isset($_POST[$field]) && strlen($_POST[$field])) {
		$version = phpversion();
		if (substr($version, 0,1) == '5') {
			require_once dirname(__FILE__).'/lib/htmlpurifier-4.0.0/HTMLPurifier.auto.php';
			$config = HTMLPurifier_Config::createDefault();
			$config->set('Core.Encoding', 'UTF-8'); // replace with your encoding
			$config->set('HTML.Doctype', $DOCTYPE); // replace with your doctype
			$config->set('HTML.TidyLevel', 'heavy');
			$config->set('Output.TidyFormat', true);	
		}
		else {
			require_once dirname(__FILE__).'/lib/htmlpurifier-2.1.5/HTMLPurifier.auto.php';	
		    $config = HTMLPurifier_Config::createDefault();
			$config->set('Core','Encoding', 'UTF-8'); // replace with your encoding
			$config->set('HTML','Doctype', $DOCTYPE); // replace with your doctype
			$config->set('HTML','TidyLevel', 'heavy');
			$config->set('Output','TidyFormat', true);
		}
		$content = $_POST[$field];
		$in_html = stripslashes($content);

		$purifier = new HTMLPurifier($config);
		$processed = $purifier->purify($in_html);
		
		$htmlawd_config = array(
			'tidy' => 1,
			'valid_xhtml'=> 1,
			'css_expression' => 1,
			'make_tag_strict' => 0,
			'unique_ids' => 0
		);
        $processed = htmLawed($processed, $htmlawd_config);
        
		$processed = str_replace("-!-ROKPAD-!-", "&", $processed);
		if (substr($processed,0,1) == "\n") $processed = substr($processed, 1);
		echo $processed;
	}
}
?>