<?php
/**
 * RokGZipper Plugin
 *
 * @package RocketTheme
 * @subpackage rokgzipper
 * @version   1.8 January 30, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );
jimport( 'joomla.filesystem.file' );

/**
 * RokGZipper plugin
 *
 * @author		Andy Miller, Brian Towles
 * @package		RokGZipper
 * @subpackage	System
 */
class  plgSystemRokGZipper extends JPlugin
{
	
	var $_ignores = array();

	function plgSystemRokGZipper(& $subject, $config)
	{
		parent::__construct($subject, $config);
		$lang =& JFactory::getLanguage();
		$lang->load('plg_system_rokgzipper', JPATH_ADMINISTRATOR);
	}
	
	function cmp($a, $b)
    {
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
    }


	function onAfterRender()
	{
		global $mainframe;
		
		if ($mainframe->isAdmin()) return;
		$this->_getIgnores();
		$this->_processJsFiles();
		$this->_processCSSFiles();   
	}
	
	function _getIgnores(){
		$uri	    =& JURI::getInstance();
		$base	    = $uri->toString( array('scheme', 'host', 'port'));
		$path       = JURI::Root(true);
		$ignored_files_text = $this->params->get('ignored_files');
		if (!empty($ignored_files_text)){
			$tmp_ignores = explode("\n",$ignored_files_text);
			foreach($tmp_ignores as $ignored_file) {
				$filepath = $this->_getFilePath($ignored_file,$base,$path);
				if (JFile::exists($filepath)){
					$this->_ignores[$filepath] = $filepath;
				}
			}
		}
	}

    function _getFileExtension($filepath)
    {
        preg_match('/[^?]*/', $filepath, $matches);
        $string = $matches[0];
        $pattern = preg_split('/\./', $string, -1, PREG_SPLIT_OFFSET_CAPTURE);
        # check if there is any extension
        if(count($pattern) == 1)
        {
            return "";
        }
        if(count($pattern) > 1)
        {
            $filenamepart = $pattern[count($pattern)-1][0];
            preg_match('/[^?]*/', $filenamepart, $matches);
            return $matches[0];
        }
    }

    function _stripCSSWhiteSpace($css_content) {
        // remove comments
        $css_content = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css_content);
        // remove tabs, spaces, newlines, etc.
        $css_content = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_content);
        return $css_content;
    }

    function _processCSSFiles() {
		$uri	    =& JURI::getInstance();
		$base	    = $uri->toString( array('scheme', 'host', 'port'));
		$path       = JURI::root(true);
        $cache_time = $this->params->get("cache_time",60);
        $expires_time = $this->params->get("expires_header_time",1440); 
        $strip_css = $this->params->get("strip_css",1);
        $body       = JResponse::getBody();
        
        $ordered_files = array();
        $output = array();

		$css_links = $this->_findNonDocumentCSSFiles($body);
        $cleaned_css_links = array();
        foreach ($css_links as $file => $tag) {
            // strip query string if there is one
            if (strpos($file, '?') !== false){
                $file = substr($file, 0, strpos($file, '?'));
            }

            $filepath = $this->_getFilePath($file,$base,$path);
            if (!array_key_exists($filepath, $this->_ignores) && $this->_getFileExtension($filepath) != "php" && file_exists($filepath) ) {
            	$ordered_files[dirname($filepath)][basename($filepath)] = $file;
                $cleaned_css_links[$file] = $tag;
            }
		}
        $css_links =& $cleaned_css_links;
		
		foreach ($ordered_files as $dir=>$files) {
		    
		    if(!is_writable($dir)) {
		    	$comment = "\n<!--\n";
		    	$comment .= JText::sprintf('ROKGZIPPER.WARNING.UNABLE_TO_WRITE_TO_DIR', $dir, implode("\n", $files));
		    	$comment .= "\n-->";
		    	$body = str_replace('<head>',"<head>\n".$comment."\n", $body); 
		    	continue;
		    }
		    
		    $md5sum = "";
		    $path = "";
		    
		    //first trip through to build filename
		    foreach ($files as $file=>$details) {
		        $md5sum .= md5($details);
		        $detailspath = $dir.DS.$file;
		        if (JFile::exists($detailspath)) {
	                $link = $css_links[$details];
    		        $body = str_replace($link,"",$body);
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
		        $outfile = $this->_getOutHeader("css", $expires_time);
    		    foreach ($files as $file=>$details) {
    		        $detailspath = $dir.DS.$file;
    		        
    		        if (JFile::exists($detailspath)) {
                        $css_content = JFile::read($detailspath);
                        if ($strip_css){
                           $css_content = $this->_stripCSSWhiteSpace($css_content);
                        }
                        $outfile .= "\n\n/*** " . $file . " ***/\n\n" . $css_content; 
                    } 
    		    }
                JFile::write($cache_fullpath,$outfile);
    		}
    		
    		$cache_file_name = $path."/".$cache_filename;
    		$line = '';
    		if ($this->params->get('show_contains_comments',0) ==1){ 
	    		$line = "<!-- \n" . $cache_file_name . "\nContains the following css files\n";
	    		foreach($files as $file) {
	    			$line .= " - ".$file . "\n";
	    		}
	    		$line .= "-->\n";
    		}
    		$line .= "<link rel=\"stylesheet\" href=\"".$cache_file_name."\" type=\"text/css\" />\n";
		    $output[] = $line;
		}
		$revoutput = array_reverse($output);
		foreach ($revoutput as $line) {
		    $body = str_replace('<head>',"<head>\n".$line."\n", $body);  
		}
		
		JResponse::setBody($body);
        
    }
    
    function _processJsFiles() {
		$uri	    =& JURI::getInstance();
		$base	    = $uri->toString( array('scheme', 'host', 'port'));
		$path       = JURI::Root(true);
        $cache_time = $this->params->get("cache_time",60);
        $expires_time = $this->params->get("expires_header_time",1440); 
        $body       = JResponse::getBody();
        
        $ordered_files = array();
        $output = array();
        $md5sum = "";
        
        $script_tags = $this->_findDocumentScriptFiles(JResponse::getBody());
        
        foreach ($script_tags as $file => $script_tag) {
            $filepath = $this->_getFilePath($file,$base,$path);
            if (JFile::exists($filepath) && !array_key_exists($filepath, $this->_ignores) &&  $this->_getFileExtension($filepath) != "php" ){ 
            	$ordered_files[] = array(dirname($filepath),basename($filepath),$file);
            }
		} 
		foreach ($ordered_files as $files) {
			
			if(!is_writable(dirname($files[0]))) {
				//make sure the filenames is an array
				$filenames = $files[1];
				if (!is_array($files[1])) $filenames = array($files[1]);

		    	$comment = "\n<!--\n";
		    	$comment .= JText::sprintf('ROKGZIPPER.WARNING.UNABLE_TO_WRITE_TO_DIR', dirname($files[0]), implode("\n", $filenames));
		    	$comment .= "\n-->";
		    	$body = str_replace('<head>',"<head>\n".$comment."\n", $body); 
		    	continue;
		    }
		    
		    $dir = $files[0];
		    $filename = $files[1];
		    $details = $files[2];

	        $md5sum .= md5($filename);
	        $detailspath = $dir.DS.$filename;
	        
	        if (empty($script_tags[$details]['content'])) {
                $link = $script_tags[$details]['block'];
    	        $body = str_replace($link,"",$body);
	        }
	        else {
	        	$tag_with_content = '<script type="text/javascript">\n'.$script_tags[$details]['content'].'\n</script>';
	        	$link = $script_tags[$details]['block'];
    	        $body = str_replace($link,$tag_with_content,$body);
	        }
	        
		}
		
		$cache_filename = "js-".md5($md5sum).".php";
	    $cache_fullpath = JPATH_CACHE.DS.$cache_filename;

	    //see if file is stale
	    if (JFile::exists($cache_fullpath)) {
		    $diff = (time()-filectime($cache_fullpath));
		} else {
		    $diff = $cache_time+1;
		}

		if ($diff > $cache_time){
	        $outfile = $this->_getOutHeader("js", $expires_time);
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
	   	$line = '';
	   	if ($this->params->get('show_contains_comments',0) ==1){ 
			$line = "<!-- \n" . $cache_file_name . "\nContains the following javascript files\n";
			foreach($ordered_files as $files) {
				$details = $files[2];
				$line .= " - ".$details . "\n";
			}
			$line .= "-->\n";
	   	}
		$line .= "<script type=\"text/javascript\" src=\"".$cache_file_name."\"></script>\n";
	    $output[] = $line;
		foreach ($output as $line) {
		    $body = str_replace('<head>',"<head>\n".$line."\n", $body);  
		}
		
		JResponse::setBody($body);    
    }    
	
	function _getFilePath($url,$base,$path) {
	    if ($url && $base && strpos($url,$base)!==false) $url = str_replace($base,"",$url);
	    if ($url && $path && strpos($url,$path)!==false) $url = str_replace($path,"",$url);
	    if (substr($url,0,1) != DS) $url = DS.$url;
	    $filepath = JPATH_SITE.$url;
	    return $filepath;    
	}
	
	
	function _getOutHeader($type="css", $expires_time = "1440") {
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
	
	
	function _findNonDocumentCSSFiles($body) {
		$return_links = array();
		
		$link_tags = array();
		$link_matches = array();
		$standalone_matches = array();
		
		$stand_alone_links = array();
		$link_pattern = '/(<link\b.+href="(?!http)([^"].*)".*>)/i';
		
		$standalones_pattern = '/<!--\[if.*\]>(?<content>.*)<!\[endif\]-->/isU';
		
		$attributes_pattern= '#([^\s=]+)\s*=\s*(\'([^<\']*)\'|"([^<"]*)")#';
		// get all links
		preg_match_all($link_pattern, $body, $link_matches);

		
		// get the link tags
		$link_tags=$link_matches[1];
		
		
		// get any standalone links
		preg_match_all($standalones_pattern, $body, $standalone_matches);
		foreach($standalone_matches[1] as $standalone_text) { 
		 	preg_match_all($link_pattern, $standalone_text, $stand_alone_links);
		 	foreach($stand_alone_links[1] as $standalone_tag) {
		 		$link_location = array_search($standalone_tag, $link_tags); 
		 		if ($link_location) {
		 			unset($link_tags[$link_location]);
		 		}
		 	}
		}
		
		foreach($link_tags as $link_tag) {
			$attibutes = array();
			$found = preg_match_all($attributes_pattern, $link_tag, $attibutes, PREG_SET_ORDER);
			if ($found != 0) {
				$attribute_array = array();
	            // Create an associative array that matches attribute
	            // names to attribute values.
	            foreach ($attibutes as $attribute) {
	                $attribute_array[strtolower($attribute[1])] = (!empty($attribute[3]))?$attribute[3]:$attribute[4];
	            }
	            // see if this is a stylesheet link
				if (array_key_exists('rel',$attribute_array) && strtolower(trim($attribute_array['rel'])) == 'stylesheet' && array_key_exists('href',$attribute_array)){
					$return_links[$attribute_array['href']] = $link_tag;
				}
	        }
		}
		return $return_links;
	}
	
	function _findDocumentScriptFiles($body) {
		
		$return_links = array();
		
		$script_tags = array();
		$script_matches = array();
		$script_pattern ='#((<script(?:(?:.*((?<=src=")(?!http)(?:[^"].*))"[^>]*))/>)|(?:(<script(?:(?:.*((?<=src=")(?!http)(?:[^"].*))"[^>]*))>)((?:(?:\n|.)(?!(?:\n|.)<script))*)</script>))#iU';

		// get the script tags
		$script_count = preg_match_all($script_pattern, $body, $script_matches);
		if ($script_count > 0) {
			for($i=0; $i<$script_count; $i++){
				$tag = array();
				$tag['block'] = $script_matches[1][$i];
				$tag['content'] = $script_matches[6][$i];
				$tag['src'] =  (!empty($script_matches[5][$i]))?$script_matches[5][$i]:$script_matches[3][$i];
				$tag['opentag'] = (!empty($script_matches[4][$i]))?$script_matches[4][$i]:$script_matches[2][$i]; 		
				$script_tags[$tag['src']] = $tag;
			}
		}
		
		
		// get any standalone links and remove them
		$stand_alone_links = array();
		$standalones_pattern = '/<!--\[if.*\]>(.*)<!\[endif\]-->/isU';
		
		preg_match_all($standalones_pattern, $body, $standalone_matches);
		foreach($standalone_matches[1] as $standalone_text) { 
		 	preg_match_all($script_pattern, $standalone_text, $stand_alone_links);
		 	foreach($stand_alone_links[3] as $standalone_tag) {
		 		unset($script_tags[$standalone_tag]);
		 	}
		 	foreach($stand_alone_links[5] as $standalone_tag) {
		 		unset($script_tags[$standalone_tag]);
		 	}
		}
		
		$attributes_pattern= '#([^\s=]+)\s*=\s*(\'([^<\']*)\'|"([^<"]*)")#';
		foreach($script_tags as $script_tag) {
			$attibutes = array();
			$found = preg_match_all($attributes_pattern, $script_tag['opentag'], $attibutes, PREG_SET_ORDER);
			if ($found != 0) {
				$attribute_array = array();
	            // Create an associative array that matches attribute
	            // names to attribute values.
	            foreach ($attibutes as $attribute) {
	                $attribute_array[strtolower($attribute[1])] = (!empty($attribute[3]))?$attribute[3]:$attribute[4];
	            }
	            // see if this is a javascript link
				if (array_key_exists('type',$attribute_array) && strtolower(trim($attribute_array['type'])) == 'text/javascript'){
					$return_links[$script_tag['src']] = $script_tag;
				}
	        }
		}
		return $return_links;
	}
}