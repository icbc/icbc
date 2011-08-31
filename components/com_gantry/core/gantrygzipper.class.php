<?php
/**
 * @package   gantry
 * @subpackage core
 * @version   3.0.3 June 12, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('GANTRY_VERSION') or die();

gantry_import('core.gantrysingleton');

/**
 * @package   gantry
 * @subpackage core
 */
class GantryGZipper {
    function process(){

    }

    function processCSSFiles() {
        global $gantry;

        $cache_time = $gantry->get("gzipper-time");
        $expires_time = $gantry->get("gzipper-expirestime", 1440);
        $strip_css  = $gantry->get("gzipper-stripwhitespace",1);

        $ordered_files = array();
        $output = array();

		$css_links = $gantry->_styles;

        foreach ($css_links as $filepath => $urlpath) {
            $ordered_files[dirname($filepath)][basename($filepath)] = $urlpath;
		}

		foreach ($ordered_files as $dir=>$files) {
            if(!is_writable($dir)) {
                foreach($files as $css_file){
                    $gantry->document->addStyleSheet($css_file);
                }
                continue;
            }
		    $md5sum = "";
		    $path = "";
			
			jimport('joomla.filesystem.file');
			
		    //first trip through to build filename
		    foreach ($files as $file=>$details) {
		        $md5sum .= md5($details);
		        $detailspath = $dir.DS.$file;
		        if (JFile::exists($detailspath)) {
    		        $path = dirname($details);
		        }
		    }

		    $cache_filename = "css-".md5($md5sum).".php";
		    $cache_fullpath = $dir.DS.$cache_filename;

		    //see if file is stale
		    if (JFile::exists($cache_fullpath)) {
    		    $diff = (time()-filectime($cache_fullpath));
    		} else {
    		    $diff = $cache_time+1;
    		}

    		if ($diff > $cache_time){
		        $outfile = GantryGZipper::_getOutHeader("css", $expires_time);
    		    foreach ($files as $file=>$details) {
    		        $detailspath = $dir.DS.$file;

    		        if (JFile::exists($detailspath)) {
                        $css_content = JFile::read($detailspath);
                        if ($strip_css){
                           $css_content = GantryGZipper::_stripCSSWhiteSpace($css_content);
                        }
                        $outfile .= "\n\n/*** " . $file . " ***/\n\n" . $css_content;
                    }
    		    }
                JFile::write($cache_fullpath,$outfile);
    		}

    		$cache_file_name = $path."/".$cache_filename;
            $gantry->document->addStyleSheet($cache_file_name);
		}
    }

    function processJsFiles() {
        global $gantry;

		$path       = $gantry->basePath;
        $cache_time = $gantry->get("gzipper-time");
        $expires_time = $gantry->get("gzipper-expirestime",1440);
        

        $ordered_files = array();
        $output = array();
        $md5sum = "";

        $script_tags = $gantry->_scripts;

        foreach ($script_tags as $filepath => $file) {
            $md5sum .= md5($filepath);
            $ordered_files[] = array(dirname($filepath),basename($filepath),$file);
		}

        if (!is_writable(JPATH_CACHE)){
            foreach($this->_scripts as $js_file){
                $gantry->document->addScript($js_file);
            }
            return;
        }

        if (count($ordered_files) > 0){
            $cache_filename = "js-".md5($md5sum).".php";
            $cache_fullpath = JPATH_CACHE.DS.$cache_filename;


            //see if file is stale
            if (JFile::exists($cache_fullpath)) {
                $diff = (time()-filectime($cache_fullpath));
            } else {
                $diff = $cache_time+1;
            }

            if ($diff > $cache_time){
                $outfile = GantryGZipper::_getOutHeader("js", $expires_time);
                foreach ($ordered_files as $files) {
                    $dir = $files[0];
                    $filename = $files[1];
                    $details = $files[2];

                    $detailspath = $dir.DS.$filename;
                    if (JFile::exists($detailspath)) {
                        $jsfile = JFile::read($detailspath);
                        // fix for stupid joolma code
                        if (strpos($filename,'joomla.javascript.js')!==false or strpos($filename,'mambojavascript.js')!==false) {
                            $jsfile = str_replace("// <?php !!", "// ", $jsfile);
                        }
                        $outfile .= "\n\n/*** " . $filename . " ***/\n\n" . $jsfile;
                    }
                }
                JFile::write($cache_fullpath,$outfile);
            }

            $cache_file_name = $path."/cache/".$cache_filename;
            $cache_url_name = $gantry->baseUrl."cache/".$cache_filename;
            $gantry->document->addScript($cache_url_name);
        }
    }
    
	function _getOutHeader($type="css", $expires_time=1440) {
	    if ($type=="css") {
    	    $header='<?php
ob_start ("ob_gzhandler");
header("Content-type: text/css; charset: UTF-8");
header("Cache-Control: must-revalidate");
$expires_time = ' . $expires_time . ';
$offset = 60 * $expires_time ;
$ExpStr = "Expires: " .
gmdate("D, d M Y H:i:s",
time() + $offset) . " GMT";
header($ExpStr);
                ?>';
        } else {
            $header='<?php
ob_start ("ob_gzhandler");
header("Content-type: application/x-javascript; charset: UTF-8");
header("Cache-Control: must-revalidate");
$expires_time = ' . $expires_time . ';
$offset = 60 * $expires_time ;
$ExpStr = "Expires: " .
gmdate("D, d M Y H:i:s",
time() + $offset) . " GMT";
header($ExpStr);
                ?>';
        }
        return $header;
	}

    function _stripCSSWhiteSpace($css_content) {
        // remove comments
        $css_content = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css_content);
        // remove tabs, spaces, newlines, etc.
        $css_content = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_content);
        return $css_content;
    }
}