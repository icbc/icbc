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

gantry_import('core.gantrytemplatedetails');
gantry_import('core.gantryini');
gantry_import('core.gantrypositions');


/**
 * This is the base class for the Gantry framework.   It is the primary mechanisim for template definition
 *
 * @package gantry
 * @subpackage core
 */
class Gantry {


	// Cacheable
    /**
     *
     */
	var $basePath;
	var $baseUrl;
    var $templateName;
	var $templateUrl;
	var $templatePath;
	var $layoutPath;
    var $gantryPath;
    var $gantryUrl;
    var $layoutSchemas = array();
    var $mainbodySchemas = array();
    var $pushPullSchemas = array();
    var $mainbodySchemasCombos = array();
    var $default_grid = 12;
	var $presets = array();
	var $originalPresets = array();
	var $customPresets = array();
    var $dontsetinmenuitem = array();
    var $defaultMenuItem;
    var $currentMenuItem;
    var $currentMenuTree;
    var $template_prefix;
    var $custom_dir;
    var $custom_menuitemparams_dir;
    var $custom_presets_file;
    var $positions;
    var $altindex = false;

    // Not cacheable
    var $document;
    var $platform;
    var $browser;
    var $language;
    var $session;
    var $currentUrl;

    // Private Vars
	/**#@+
     * @access private
     */


    // cacheable privates
	var $_templateDetails;
	var $_aliases = array();
	var $_preset_names = array();
	var $_param_names = array();
    var $_base_params_checksum = null;
	var $_setbyurl = array();
	var $_setbycookie = array();
	var $_setbysession = array();
	var $_setinsession = array();
	var $_setincookie = array();
    var $_setinmenuitem = array();
    var $_setbymenuitem = array();
	var $_features = array();
    var $_ajaxmodels = array();
    var $_adminajaxmodels = array();
    var $_layouts = array();
	var $_bodyclasses = array();
	var $_classesbytag = array();
    var $_ignoreQueryParams = array('reset-settings');
    var $_config_vars = array(
        'layoutschemas'=>'layoutSchemas',
        'mainbodyschemas'=>'mainbodySchemas',
        'mainbodyschemascombos' => 'mainbodySchemasCombos',
        'pushpullschemas'=>'pushPullSchemas',
        'presets'=>'presets',
        'browser_params' => '_browser_params',
        'grid'=>'grid'
    );
    var $_working_params;

    // non cachable privates
	var $_bodyId = null;
    var $_browser_params = array();
    var $_menu_item_params = array();
    var $_scripts = array();
    var $_styles = array();
    var $_tmp_vars = array();
    /**#@-*/

    var $__cacheables = array(
            'basePath',
            'baseUrl',
            'templateName',
            'templateUrl',
            'templatePath',
            'layoutPath',
            'gantryPath',
            'gantryUrl',
            'layoutSchemas',
            'mainbodySchemas',
            'pushPullSchemas',
            'mainbodySchemasCombos',
            'default_grid',
            'presets',
            'originalPresets',
            'customPresets',
            'dontsetinmenuitem',
            'defaultMenuItem',
            'currentMenuItem',
            'currentMenuTree',
            'template_prefix',
            'custom_dir',
            'custom_menuitemparams_dir',
            'custom_presets_file',
            'positions',
            '_templateDetails',
			'_aliases',
            '_preset_names',
            '_param_names',
            '_base_params_checksum',
            '_setbyurl',
            '_setbycookie',
            '_setbysession',
            '_setinsession',
            '_setincookie',
            '_setinmenuitem',
            '_setbymenuitem',
            '_features',
            '_ajaxmodels',
            '_adminajaxmodels',
            '_layouts',
            '_bodyclasses',
            '_classesbytag',
            '_ignoreQueryParams',
            '_config_vars',
            '_working_params'
        );

    function __sleep() {
        return $this->__cacheables;
    }

    /**
     * Constructor
     * @return void
     */
	function Gantry() {
        global $mainframe;

        // load the base gantry path
        $this->gantryPath = realpath(dirname( __FILE__ ).DS."..");

        // set the base class vars
		$doc =& JFactory::getDocument();
		$this->document =& $doc;

		$this->basePath = JPATH_ROOT;
        $this->templateName = $this->_getCurrentTemplate();
        $this->templatePath = JPATH_ROOT.DS.'templates'.DS.$this->templateName;
        $this->layoutPath = $this->templatePath.DS.'html'.DS.'layouts.php';
        $this->custom_dir = $this->templatePath.DS.'custom';
        $this->custom_menuitemparams_dir= $this->custom_dir.DS.'menuitemparams';
        $this->custom_presets_file = $this->custom_dir.DS.'presets.ini';
        $this->baseUrl = JURI::root(true)."/";
        $this->templateUrl = $this->baseUrl.'templates'."/".$this->templateName;

        if (version_compare( JVERSION, '1.5', '>=') && version_compare(JVERSION, '1.6', '<')) {
            $this->gantryUrl = $this->baseUrl.'components/com_gantry';
        }
        else if (version_compare(JVERSION, '1.6', '>=')) {
            $this->gantryUrl = $this->baseUrl.'libraries/gantry';
        }

        $this->defaultMenuItem = $this->_getDefaultMenuItem();
        $this->currentMenuItem = $this->defaultMenuItem;
        $this->_loadConfig();



		// Load up the template details
		$this->_templateDetails = GantrySingleton::getInstance('GantryTemplateDetails');
		$this->_templateDetails->init($this);
        $this->_base_params_checksum = $this->_templateDetails->getParamsHash();

        // Put a base copy of the saved params in the working params
		$this->_working_params = $this->_templateDetails->params;
		$this->_param_names = array_keys($this->_templateDetails->params);
        $this->template_prefix =  $this->_working_params['template_prefix']['value'];

		// set the GRID_SYSTEM define;
        if (!defined('GRID_SYSTEM')) {
            define ('GRID_SYSTEM',$this->get('grid_system',$this->default_grid));
        }

		// process the presets
        if (!empty($this->presets)) {
			// check for custom presets
			$this->_customPresets();

            $this->_preset_names = array_keys($this->presets);
            //$wp_keys = array_keys($this->_templateDetails->params);
            //$this->_param_names = array_diff($wp_keys, $this->_preset_names);
        }

        $this->_loadLayouts();
		$this->_loadFeatures();
        $this->_loadAjaxModels();
        $this->_loadAdminAjaxModels();

        $this->_checkAjaxTool();

        $this->_checkLanguageFiles();

        $this->positions = GantrySingleton::getInstance('GantryPositions');

		// add GRID_SYSTEM class to body
		$this->addBodyClass("col".GRID_SYSTEM);
	}



    function adminInit() {
        
    }
    
    /**
     * Initializer.
     * This should run when gantry is run from the front end in order and before the template file to
     * populate all user session level data
     * @return void
     */
    function init() {
        if (defined('GANTRY_INIT')) {
            return;
        }
        // Run the admin init
        if ($this->isAdmin()) {
            $this->adminInit();
            return;
        }
        define('GANTRY_INIT', "GANTRY_INIT");

        global $mainframe;

        // set the GRID_SYSTEM define;
        if (!defined('GRID_SYSTEM')) {
            define ('GRID_SYSTEM',$this->get('grid_system',$this->default_grid));
        }

        // Set the main class vars to match the call
        JHTML::_('behavior.mootools');
        $doc =& JFactory::getDocument();
        $this->document =& $doc;
        $this->language = $doc->language;
        $this->session =& JFactory::getSession();
        $this->baseUrl = JURI::root(true) . "/";
        $uri = JURI::getInstance();
        $this->currentUrl = $uri->toString();
        $this->templateUrl = $this->baseUrl.'templates'."/".$this->templateName;
        if (version_compare( JVERSION, '1.5', '>=') && version_compare(JVERSION, '1.6', '<')) {
            $this->gantryUrl = $this->baseUrl.'components/com_gantry';
        }
        else if (version_compare(JVERSION, '1.6', '>=')) {
            $this->gantryUrl = $this->baseUrl.'libraries/gantry';
        }

        // use any menu item level overrides
        $menus = &JSite::getMenu();
        $menu  = $menus->getActive();
        $this->currentMenuItem = ($menu != null)?$menu->id : null;
        $this->currentMenuTree = ($menu != null)?$menu->tree: array();

        // Populate all the params for the session
        $this->_populateParams();

        gantry_import('core.gantrybrowser');
        $this->browser = new GantryBrowser();

        $this->_loadBrowserConfig();

        //add default gantry stylesheet
        $this->addStyle('gantry.css');
        //add correct grid system css
        $this->addStyle('grid-'.GRID_SYSTEM.'.css');
        $this->addStyle('joomla.css');

        // Init all features
        foreach($this->_features as $feature){
            $feature_instance = $this->_getFeature($feature);
            if ($feature_instance->isEnabled() && method_exists( $feature_instance , 'init')) {
                $feature_instance->init();
            }
        }

    }

    function finalize() {
        if (!defined('GANTRY_FINALIZED')){
            gantry_import('core.params.gantrycookieparams');
            gantry_import('core.params.gantrysessionparams');

            // Finalize all features
            foreach($this->_features as $feature){
                $feature_instance = $this->_getFeature($feature);
                if ($feature_instance->isEnabled() && method_exists($feature_instance , 'finalize')) {
                    $feature_instance->finalize();
                }
            }

            if (isset($_REQUEST['reset-settings'])) {
                GantrySessionParams::clean();
                GantryCookieParams::clean();
            }
            else {
                GantrySessionParams::store();
                GantryCookieParams::store();
            }



            if ($this->get("gzipper-enabled",false)) {
                gantry_import('core.gantrygzipper');
                GantryGZipper::processCSSFiles();
                GantryGZipper::processJsFiles();
            }
            else {
                foreach($this->_styles as $css_file){
                    $this->document->addStyleSheet($css_file);
                }
                foreach($this->_scripts as $js_file){
                    $this->document->addScript($js_file);
                }
            }
            define('GANTRY_FINALIZED', true);
        }
        if ($this->altindex !== false) {
            $contents = ob_get_contents();
            ob_end_clean();
            ob_start();
            echo $this->altindex;
        }
    }

    function isAdmin(){
        global $mainframe;
        return $mainframe->isAdmin();
    }

    function get($param = false, $default = "") {
		if (array_key_exists($param, $this->_working_params)) $value = $this->_working_params[$param]['value'];
		else $value = $default;
		return $value;
	}

	function getDefault($param = false) {
		$value = "";
		if (array_key_exists($param, $this->_working_params)) $value = $this->_working_params[$param]['default'];
		return $value;
	}

    function getFeatures(){
        return $this->_features;
    }

	function set($param, $value=false) {
		$return = false;
		if (array_key_exists($param, $this->_working_params)){
			$this->_working_params[$param]['value'] = $value;
			$return = true;
		}
		return $return;
	}

    function getAjaxModel($model_name, $admin=false){
        $model_path = false;
        if ($admin) {
            if (array_key_exists($model_name, $this->_adminajaxmodels)){
                $model_path = $this->_adminajaxmodels[$model_name];
            }
        }
        else {
            if (array_key_exists($model_name, $this->_ajaxmodels)){
                $model_path = $this->_ajaxmodels[$model_name];
            }
        }
        return $model_path;
    }


	function getPositions($position = null, $pattern = null) {
		if ($position != null) {
			$positions = $this->_templateDetails->parsePosition($position, $pattern);
			return $positions;
		}
		return $this->_templateDetails->_getPositions();
	}

	function getUniquePositions() {
		return $this->_templateDetails->_getUniquePositions();
	}

	function getParams($prefix=null,$remove_prefix=false) {
        if (null==$prefix){
		    return $this->_working_params;
        }
        $params=array();
        foreach ($this->_working_params as $param_name => $param_value){
            $matches = array();
            if (preg_match("/^".$prefix."-(.*)$/", $param_name, $matches)){
                if ($remove_prefix){
                    $param_name = $matches[1];
                }
                $params[$param_name] = $param_value;
            }
        }
        return $params;
	}

    /**
     * Gets the current URL and query string and can ready it for more query string vars
     * @param array $ignore
     * @param bool $qs_preped
     * @return mixed|string
     */
    function getCurrentUrl($ignore=array()){
        gantry_import('core.utilities.gantryurl');

        $url = GantryUrl::explode($this->currentUrl);

        if (!empty($ignore) && array_key_exists('query_params', $url)) {
            foreach ($ignore as $k) {
               if (array_key_exists($k, $url['query_params'])) unset($url['query_params'][$k]);
            }
        }
        return GantryUrl::implode($url);
    }

    function addQueryStringParams($url, $params = array()) {
        gantry_import('core.utilities.gantryurl');
        return GantryUrl::updateParams($url, $params);
    }

    	// wrapper for count modules
	function countModules($positionStub, $pattern = null) {
        if (defined('GANTRY_FINALIZED')) return 0;
		global $mainframe;
		$count = 0;
		
		if (array_key_exists($positionStub, $this->_aliases)) {
			return $this->countModules($this->_aliases[$positionStub]);
		}
		
		$positions  = $this->getPositions($positionStub, $pattern);

		foreach($positions as $position) {
			if (!$mainframe->isAdmin()) {
        		if ($this->document->countModules($position) || count($this->_getFeaturesForPosition($position))>0) $count++;
			}
			else {
				if ($this->_adminCountModules($position) || count($this->_getFeaturesForPosition($position))>0) $count++;
			}
		}
        return $count;
	}

	// wrapper for mainbody display
    function displayMainbody($bodyLayout = 'mainbody', $sidebarLayout = 'sidebar', $sidebarChrome = 'standard', $contentTopLayout = 'standard', $contentTopChrome = 'standard', $contentBottomLayout = 'standard', $contentBottomChrome = 'standard') {
        if (defined('GANTRY_FINALIZED')) return;
        gantry_import('core.renderers.gantrymainbodyrenderer');
        return GantryMainBodyRenderer::display($bodyLayout, $sidebarLayout, $sidebarChrome, $contentTopLayout, $contentTopChrome, $contentBottomLayout, $contentBottomChrome);
    }

    // wrapper for display modules
    function displayModules($positionStub, $layout = 'standard', $chrome = 'standard', $gridsize = GRID_SYSTEM, $pattern = null) {
        if (defined('GANTRY_FINALIZED')) return;
        gantry_import('core.renderers.gantrymodulesrenderer');
        return GantryModulesRenderer::display($positionStub, $layout, $chrome, $gridsize, $pattern);
    }
        // wrapper for display modules
    function displayFeature($feature, $layout = 'basic') {
        if (defined('GANTRY_FINALIZED')) return;
        gantry_import('core.renderers.gantryfeaturerenderer');
        return GantryFeatureRenderer::display($feature, $layout);
    }


    function addTemp($namespace, $varname, &$variable) {
        if (defined('GANTRY_FINALIZED')) return;
        $this->_tmp_vars[$namespace][$varname] = $variable;
        return;
    }

    function &retrieveTemp($namespace, $varname, $default = null){
        if (defined('GANTRY_FINALIZED')) return;
        if (!array_key_exists($namespace,$this->_tmp_vars) ||!array_key_exists($varname, $this->_tmp_vars[$namespace])){
            return $default;
        }
        return  $this->_tmp_vars[$namespace][$varname];
    }

    function setBodyId($id = null){
    	$this->_bodyId = $id;
    }

    function addBodyClass($class) {
        if (defined('GANTRY_FINALIZED')) return;
    	$this->_bodyclasses[] = $class;
    }

    function addClassByTag($id , $class) {
        if (defined('GANTRY_FINALIZED')) return;
    	$this->_classesbytag[$id][] = $class;
    }

    function displayHead() {
        if (defined('GANTRY_FINALIZED')) return;
        //stuff to output that is needed by joomla
        echo '<jdoc:include type="head" />';
    }

    function displayBodyTag() {
        if (defined('GANTRY_FINALIZED')) return;
        $body_classes = array();
        foreach ($this->_bodyclasses as $param) {
        	$param_value = $this->get($param);
        	if ($param_value != "") {
            	$body_classes[] = strtolower(str_replace(" ","-",$param ."-".$param_value));
            } else {
            	$body_classes[] = strtolower(str_replace(" ","-",$param));
            }
        }
        return $this->renderLayout('doc_body', array('classes'=>implode(" ", $body_classes),'id'=>$this->_bodyId));
    }

    function displayClassesByTag($tag) {
        if (defined('GANTRY_FINALIZED')) return;
        $tag_classes = array();

        $output = "";

        if (array_key_exists($tag,$this->_classesbytag)) {
            foreach ($this->_classesbytag[$tag] as $param) {
                $param_value = $this->get($param);
                if ($param_value != "") {
                    $tag_classes[] = $param ."-".$param_value;
                } else {
                    $tag_classes[] = $param;
                }


            }
            $output = 'class="'.implode(" ", $tag_classes).'"';

        }
        return $this->renderLayout('doc_tag', array('classes'=>implode(" ", $tag_classes)));
    }

    // debug function for body
    function debugMainbody($bodyLayout = 'debugmainbody', $sidebarLayout = 'sidebar', $sidebarChrome = 'standard') {
        gantry_import('core.renderers.gantrydebugmainbodyrenderer');
        return GantryDebugMainBodyRenderer::display($bodyLayout, $sidebarLayout, $sidebarChrome);
    }

    	/* ------ Stylesheet Funcitons  ----------- */

	function addStyle($file = '') {
        if (defined('GANTRY_FINALIZED')) return;
		if (is_array($file)) return Gantry::addStyles($file);
		$type = 'css';
        $paths = array(
           $this->gantryUrl => $this->gantryPath.DS.$type,
           $this->templateUrl => $this->templatePath.DS.$type
        );

        // check to see if this is a full path file
       $dir = dirname($file);
       if ($dir != ".") {
            // full url
            if (preg_match('/^http/',$file)){
                $this->document->addStyleSheet($file);
                return;
            }

            // url path
            $file_path = $this->_getFilePath($file);
            $full_path = realpath($file_path);
            if ($full_path !== false && file_exists($full_path)){
                $this->_styles[$full_path] = $file;
            }
            return;
        }

        $out_files = array();

		$ext = substr($file, strrpos($file, '.'));
        $filename = basename($file, $ext);
		$checks = Gantry::_getBrowserBasedChecks($filename);
        $override_file = $filename . "-override";

        $override = false;
        foreach($paths as  $baseurl => $path){
            if (file_exists($path) && is_dir($path)){
                $check_path = $path.DS.$override_file.$ext;
                $check_url_path = $baseurl ."/".$type."/".$override_file.$ext;
                if (file_exists($check_path) && is_readable($check_path)){
                    $override = true;
                    $out_files[$check_path] = $check_url_path;
                    break;
                }
            }
        }
        if (!$override) {
            foreach($paths as  $baseurl => $path){
                if (file_exists($path) && is_dir($path)){
                    foreach($checks  as $check) {
                        $check_path = preg_replace("/\?(.*)/",'',$path.DS.$check.$ext);
                        $check_url_path = $baseurl ."/".$type."/".$check.$ext;
                        if (file_exists($check_path) && is_readable($check_path)){
                            $out_files[$check_path] = $check_url_path;
                        }
                    }
                }
            }
        }

        foreach ($out_files as $style_path=>$style_file) {
             $this->_styles[$style_path] = $style_file;
        }
	}

	function addStyles($styles = array()) {
        if (defined('GANTRY_FINALIZED')) return;
		foreach($styles as $style) Gantry::addStyle($style);
	}

	function addInlineStyle($css = '') {
        if (defined('GANTRY_FINALIZED')) return;
		return $this->document->addStyleDeclaration($css);
	}

	function addScript($file = '') {
        if (defined('GANTRY_FINALIZED')) return;
		if (is_array($file)) return Gantry::addScripts($file);
        $type = 'js';
        $paths = array(
           $this->templateUrl => $this->templatePath.DS.$type,
           $this->gantryUrl => $this->gantryPath.DS.$type
        );

        //see if this is a full url



        // check to see if this is a full path file
        $dir = dirname($file);
        if ($dir != ".") {
            // full url
            if (preg_match('/^http/',$file)){
                 $this->document->addScript($file);
                return;
            }

            // url path
            $file_path = $this->_getFilePath($file);
            $full_path = realpath($file_path);
            if ($full_path !== false && file_exists($full_path)){
                $this->_scripts[$full_path] = $file;
            }
            return;
        }

        $out_files = array();

		$ext = substr($file, strrpos($file, '.'));
        $filename = basename($file, $ext);

		$checks = Gantry::_getBrowserBasedChecks($filename);

        foreach($paths as  $baseurl => $path){
            if (file_exists($path) && is_dir($path)){
                foreach($checks  as $check) {
                    $check_path = preg_replace("/\?(.*)/",'',$path.DS.$check.$ext);
                    $check_url_path = $baseurl ."/".$type."/".$check.$ext;
                    if (file_exists($check_path) && is_readable($check_path) && !array_key_exists($check, $out_files)){
                        $out_files[$check_path] = $check_url_path;
                        break(2);
                    }
                }
            }
        }

        foreach ($out_files as $script_path => $script_url_path) {
            $this->_scripts[$script_path] = $script_url_path;
        }
	}



	function addScripts($scripts = array()) {
        if (defined('GANTRY_FINALIZED')) return;
		foreach($scripts as $script) Gantry::addScript($script);
	}

	function addInlineScript($js = '') {
        if (defined('GANTRY_FINALIZED')) return;
		return $this->document->addScriptDeclaration($js);
    }



    function readMenuItemParams($id, $asArray = false){
        $outstring = '';

        if (!array_key_exists($id, $this->_menu_item_params)){
            $menu_items_title = 'menu_item_overrides';
            $prefix = "menuitemparam";
            $menu_params_file = $this->custom_menuitemparams_dir.DS.$id.'.menuparams.ini';
            if (file_exists($menu_params_file) && is_readable($menu_params_file)){
                $outarray = GantryINI::read($menu_params_file, $menu_items_title, $prefix);
                if ($outarray != null){
                    $this->_menu_item_params[$id] = &$outarray;
                }
            }
        }
        if (array_key_exists($id, $this->_menu_item_params)) {
            $outarray = &$this->_menu_item_params[$id];
            if ($asArray) return $outarray;
            if (count($outarray)>0) {
                $parts = array();
                foreach($outarray as $paramname => $paramvalue) {
                    $parts[] = $paramname."=".$paramvalue;
                }
                $outstring = implode("\n",$parts);
            }
         }
        return $outstring;
    }

    function writeMenuItemParams($id, $data){
        $menu_items_title = 'menu_item_overrides';
        $prefix = "menuitemparam";

        if (file_exists($this->custom_menuitemparams_dir)){

            $menu_params_file = $this->custom_menuitemparams_dir.DS.$id.'.menuparams.ini';
            if (is_array($data)){
                $in_data = array($menu_items_title=>array($prefix=>$data));
                GantryINI::write($menu_params_file,$in_data,false);
            }
        }
    }

    function repopulateParams(){
        global $mainframe;
        if ($mainframe->isAdmin()){
            // get a copy of the params for working with on this call
		    $this->_working_params = $this->_templateDetails->params;
            gantry_import('core.params.gantrymenuitemparams');
            GantryMenuItemParams::populate();
        }
    }

    /**
     * @param string $layout the layout name to render
     * @param array $params all parameters needed for rendering the layout as an associative array with 'parameter name' => parameter_value
     * @return void
     */
    function renderLayout($layout_name, $params=array()){
        $layout = $this->_getLayout($layout_name);
        if ($layout === false){
            return "<!-- Unable to render layout... can not find layout class for " . $layout_name . " -->";
        }
        return $layout->render($params);
    }


    /**#@+
     * @access private
     */

    /**
     * @param  $url
     * @return string
     */
    function _getFilePath($url) {
        $uri	    =& JURI::getInstance();
		$base	    = $uri->toString( array('scheme', 'host', 'port'));
        $path       = JURI::Root(true);
	    if ($url && $base && strpos($url,$base)!==false) $url = str_replace($base,"",$url);
	    if ($url && $path && strpos($url,$path)!==false) $url = str_replace($path,"",$url);
	    if (substr($url,0,1) != DS) $url = DS.$url;
	    $filepath = JPATH_SITE.$url;
	    return $filepath;
	}

    /**
     * internal util function to get key from schema array
     * @param  $schemaArray
     * @return #Fimplode|?
     */
    function _getKey($schemaArray) {

        $concatArray = array();

        foreach ($schemaArray as $key=>$value) {
            $concatArray[] = $key . $value;
        }

        return (implode("-",$concatArray));
    }


    /**
     * @return #M#Vdb.loadResult|#P#Vdefault_item.id|int|?
     */
    function _getDefaultMenuItem(){
        global $mainframe;
        if (!$mainframe->isAdmin()){
            $menu   =& JSite::getMenu();
            $default_item = $menu->getDefault();
            return $default_item->id;
        }
        else
        {
            $db		=& JFactory::getDBO();
            $default = 0;
            $query = 'SELECT id'
                . ' FROM #__menu AS m'
                . ' WHERE m.home = 1';

            $db->setQuery( $query );
            $default = $db->loadResult();
            return $default;
        }
    }

    /**
     * @return void
     */
    function _loadConfig() {
        // Process the config
        $default_config_file = $this->gantryPath.DS.'gantry.config.php';
        if (file_exists($default_config_file) && is_readable($default_config_file)){
             include_once($default_config_file);
        }

        $template_config_file = $this->templatePath.DS.'gantry.config.php';
        if (file_exists($template_config_file   ) && is_readable($template_config_file)){
            /** @define "$template_config_file" "VALUE" */
            include_once($template_config_file);
        }

        if (isset($gantry_default_config_mapping)) {
           $temp_array = array_merge($this->_config_vars, $gantry_default_config_mapping);
           $this->_config_vars = $temp_array;
        }
        if (isset($gantry_config_mapping)){
           $temp_array = array_merge($this->_config_vars, $gantry_config_mapping);
           $this->_config_vars = $temp_array;
        }

        foreach($this->_config_vars as $config_var_name =>$class_var_name){
            $default_config_var_name = 'gantry_default_'.$config_var_name;
            if (isset($$default_config_var_name)){
                $this->$class_var_name = $$default_config_var_name;
                $this->__cacheables[] = $class_var_name;
            }
            $template_config_var_name = 'gantry_'.$config_var_name;
            if (isset($$template_config_var_name)){
                $this->$class_var_name = $$template_config_var_name;
                $this->__cacheables[] = $class_var_name;
            }
        }
    }

    /**
     * @return void
     */
    function _loadBrowserConfig() {

        $checks = array(
			$this->browser->name,
			$this->browser->platform,
			$this->browser->name . '_' . $this->browser->platform,
			$this->browser->name . $this->browser->shortversion,
			$this->browser->name . $this->browser->version,
			$this->browser->name . $this->browser->shortversion . '_' . $this->browser->platform,
			$this->browser->name . $this->browser->version . '_' . $this->browser->platform
		);


        foreach($checks as $check){
            if (array_key_exists($check, $this->_browser_params)){
                foreach($this->_browser_params[$check] as $param_name => $param_value) {
                    $this->set($param_name, $param_value);
                }
            }
        }
    }


    /**
     * @return void
     */
	function _customPresets() {
		$this->originalPresets = $this->presets;
		if (file_exists($this->custom_presets_file)) {

			$customPresets = GantryINI::read($this->custom_presets_file);
			$this->customPresets = $customPresets;
			$this->originalPresets = $this->presets;
			if (count($customPresets)) {
				$this->presets = $this->_array_merge_replace_recursive($this->presets, $customPresets);
				foreach($this->presets as $key => $preset) {
					uksort($preset, array($this, "_compareKeys"));
					$this->presets[$key] = $preset;
				}
			}

		}
	}

    /**
     * @param  $key1
     * @param  $key2
     * @return int
     */
	function _compareKeys($key1, $key2) {
		if (strlen($key1) < strlen($key2)) return -1;
		else if (strlen($key1) > strlen($key2)) return 1;
		else {
			if ($key1 < $key2) return -1;
			else return 1;
		}
	}

    /**
     * @param  $name
     * @param  $preset
     * @return array
     */
	function _getPresetParams($name,$preset){
		$return_params = array();
        if (array_key_exists($preset,$this->presets[$name])){
		    $preset_params = $this->presets[$name][$preset];
            foreach ($preset_params as $preset_param_name => $preset_param_value) {
                if (array_key_exists($preset_param_name, $this->_working_params) && $this->_working_params[$preset_param_name]['type'] == 'preset') {
                    $return_params = $this->_getPresetParams($preset_param_name,$preset_param_value);
                }
            }
            foreach ($preset_params as $preset_param_name => $preset_param_value) {
                if (array_key_exists($preset_param_name, $this->_working_params) && $this->_working_params[$preset_param_name]['type'] != 'preset') {
                    $return_params[$preset_param_name] = $preset_param_value;
                }
            }
        }
		return $return_params;
	}

    /**
     * @return void
     */
	function _populateParams(){
        gantry_import('core.params.gantryurlparams');
        gantry_import('core.params.gantrysessionparams');
        gantry_import('core.params.gantrycookieparams');
        gantry_import('core.params.gantrymenuitemparams');

        // get a copy of the params for working with on this call
		$this->_working_params = $this->_templateDetails->params;

        if (!isset($_REQUEST['reset-settings'])){
            GantrySessionParams::populate();
            GantryCookieParams::populate();
        }

        GantryMenuItemParams::populate();

        if (!isset($_REQUEST['reset-settings'])){
            GantryUrlParams::populate();
        }
	}

	/**
     * @param  $position
     * @return array
     */
    function _getFeaturesForPosition($position) {
   		$return = array();
   		// Init all features
		foreach($this->_features as $feature){
            $feature_instance = $this->_getFeature($feature);
			if ($feature_instance->isEnabled() && $feature_instance->isInPosition($position) && method_exists( $feature_instance , 'render')) {
				$return[] = $feature;
			}
		}
		return $return;
    }

    /**
     * internal util to get short name from long name
     * @param  $longname
     * @return string
     */
    function _getShortName($longname) {
        $shortname = $longname;
        if (strlen($longname)>2) {
            $shortname = substr($longname,0,1) . substr($longname,-1);
        }
        return $shortname;
    }

    /**
     * internal util to get long name from short name
     * @param  $shortname
     * @return string
     */
    function _getLongName($shortname) {
        $longname = $shortname;
        switch (substr($shortname,0,1)) {
            case "s":
            default:
                $longname = "sidebar";
                break;
        }
        $longname .= "-".substr($shortname,-1);
        return $longname;
    }


    /**
     * internal util to retrieve the prefix of a position
     * @param  $position
     * @return #Fsubstr|?
     */
	function _getPositionPrefix($position) {
		return substr($position, 0, strrpos($position, "-"));
	}

	/**
     * internal util to retrieve the stored position schema
     * @param  $position
     * @param  $gridsize
     * @param  $count
     * @param  $index
     * @return #P#CGantry.layoutSchemas|boolean|?
     */
	function _getPositionSchema($position, $gridsize, $count, $index) {
		$param = $this->_getPositionPrefix($position) . 'Position';
        $defaultSchema = false;

		$storedParam = $this->get($param);
		if (!preg_match("/{/", $storedParam)) $storedParam = '';
		$setting = unserialize($storedParam);

 		$schema =& $setting[$gridsize][$count][$index];
		if ($this->document->direction == 'rtl' && $this->get('rtl-enabled')) {
			$layout = array_reverse($setting[$gridsize][$count]);
			$schema =& $layout[$index];
		}
 		if (isset($schema))
            return $schema;
		else {
            if (count($this->layoutSchemas[$gridsize]) < $count){
                $count = count($this->layoutSchemas[$gridsize]);
            }
            for ($i=$count;$i>0;$i--) {
				$layout = $this->layoutSchemas[$gridsize][$i];
				if ($this->document->direction == 'rtl' && $this->get('rtl-enabled')) {
					$layout = array_reverse($layout);
				}
                if (isset($layout[$index])) {
                    $defaultSchema = $layout[$index];
                    break;
                }
            }
            return $defaultSchema;
        }
	}


    /**
     * @param  $filename
     * @return
     */
    function _getBrowserBasedChecks($filename) {

        $preped_filename = $filename . '-';

        $checks = array(
            // check for file itself
            $filename,

			// browser check
			$preped_filename.$this->browser->name,

			// platform check
			$preped_filename.$this->browser->platform,

            // render engine
            $preped_filename.$this->browser->engine,

			// browser + platform check
			$preped_filename.$this->browser->name . '-' . $this->browser->platform,

			// short browser version check
			$preped_filename.$this->browser->name . $this->browser->shortversion,

			// longbrowser version check
			$preped_filename.$this->browser->name . $this->browser->version,

			// short browser version + platform check
			$preped_filename.$this->browser->name . $this->browser->shortversion . '-' . $this->browser->platform,

			// longbrowser version + platform check
			$preped_filename.$this->browser->name . $this->browser->version . '-' . $this->browser->platform
		);

        // check if RTL version needed
        $document =& $this->document;
        if ($document->direction == "rtl" && $this->get('rtl-enabled')) {
            $checks[] = $filename . '-rtl';
        }

        return $checks;
    }

    /**
     * @return
     */
    function _getCurrentTemplate() {
        global $mainframe;
        $session =& JFactory::getSession();
        $template = null;
       	if (!$mainframe->isAdmin()) {
            $app = &JApplication::getInstance('site', array(), 'J');
			$template = $app->getTemplate();
		}
		else {
            if (array_key_exists('cid',$_REQUEST)){
			    $template = $_REQUEST['cid'][0];
            }
            else {
                $template = $session->get('gantry-current-template');
                }
            }
        $session->set('gantry-current-template', $template);
        return $template;
    }

    /**
     * @param  $condition
     * @return
     */
	function _adminCountModules($condition)
	{
		$result = '';

		$words = explode(' ', $condition);
		for($i = 0; $i < count($words); $i+=2)
		{
			// odd parts (modules)
			$name		= strtolower($words[$i]);
			$words[$i]	= ((isset($this->_buffer['modules'][$name])) && ($this->_buffer['modules'][$name] === false)) ? 0 : count($this->_getModulesFromAdmin($name));
		}
		$str = 'return '.implode(' ', $words).';';
		return eval($str);
	}

	/**
	 * Get modules by position
	 *
	 * @param string 	$position	The position of the module
	 * @return array	An array of module objects
	 */
	function &_getModulesFromAdmin($position)
	{
		$position	= strtolower( $position );
		$result		= array();

		$modules = $this->_loadModulesFromAdmin();

		$total = count($modules);
		for($i = 0; $i < $total; $i++) {
			if($modules[$i]->position == $position) {
				$result[] =& $modules[$i];
			}
		}
		return $result;
	}

	/**
     * @return #M#Vdb.loadObjectList|array|boolean|?
     */
	function _loadModulesFromAdmin()
	{
		static $modules;

		if (isset($modules)) {
			return $modules;
		}

		$db		=& JFactory::getDBO();

		$modules = array();

        $wheremenu =   ' AND ( mm.menuid = '. (int) $this->currentMenuItem .' OR mm.menuid = 0 )';

        $query = 'SELECT id, position'
            . ' FROM #__modules AS m'
            . ' LEFT JOIN #__modules_menu AS mm ON mm.moduleid = m.id'
            . ' WHERE m.published = 1'
            . ' AND m.access <= 0'
            . ' AND m.client_id = 0'
            . $wheremenu
            . ' ORDER BY position, ordering';

		$db->setQuery( $query );
		if (null === ($modules = $db->loadObjectList())) {
            JError::raiseWarning( 'SOME_ERROR_CODE', JText::_( 'Error Loading Modules' ) . $db->getErrorMsg());
            return false;
		}

		$total = count($modules);
		for($i = 0; $i < $total; $i++)
		{
			$modules[$i]->position	= strtolower($modules[$i]->position);
		}
		return $modules;
	}

    /**
     * @return void
     */
    function _loadFeatures(){
         $feature_paths = array(
            $this->templatePath.DS.'features',
            $this->gantryPath.DS.'features'
         );

        $raw_features = array();
        foreach($feature_paths as  $feature_path){
            if (file_exists($feature_path) && is_dir($feature_path)){
                $d = dir($feature_path);
                while (false !== ($entry = $d->read())) {
                    if($entry != '.' && $entry != '..'){
                        $feature_name = basename($entry, ".php");
                        $path	= $feature_path.DS.$feature_name.'.php';
                        $className = 'GantryFeature'.ucfirst($feature_name);
                        if (!class_exists($className)) {
                            if (file_exists( $path ))
                            {
                                require_once( $path );
                                if(class_exists($className))
                                {
                                    $raw_features[$feature_name] = $feature_name;
                                }
                            }

                        }
                    }
                }
                $d->close();
            }
        }

        $ordered_feature_string = $this->get('features-order');
        $ordered_features = explode(",",$ordered_feature_string);
        foreach ($ordered_features as $ordered_feature) {
            if (array_key_exists($ordered_feature, $raw_features)){
                $this->_features[$ordered_feature] = $ordered_feature;
            }
        }
        foreach ($raw_features as $feature){
            if (!in_array($feature,  $this->_features)){
                $this->_features[$feature] = $feature;
            }
        }
    }

    /**
     * @return void
     */
    function _loadAjaxModels(){
         $models_paths = array(
            $this->templatePath.DS.'ajax-models',
            $this->gantryPath.DS.'ajax-models'
         );
        $this->_loadModels($models_paths, $this->_ajaxmodels);
        return;
    }

    function _loadAdminAjaxModels(){
         $models_paths = array(
            $this->templatePath.DS.'admin'.DS.'ajax-models',
            $this->gantryPath.DS.'admin'.DS.'ajax-models'
         );
        $this->_loadModels($models_paths, $this->_adminajaxmodels);
        return;
    }

    function _loadModels($paths, &$results){
        $raw_models = array();
        foreach($paths as  $model_path){
            if (file_exists($model_path) && is_dir($model_path)){
                $d = dir($model_path);
                while (false !== ($entry = $d->read())) {
                    if($entry != '.' && $entry != '..'){
                        $model_name = basename($entry, ".php");
                        $path	= $model_path.DS.$model_name.'.php';
                        if (file_exists( $path ) && !array_key_exists($model_name, $results))
                        {
                            $results[$model_name] = $path;
                        }
                    }
                }
                $d->close();
            }
        }
    }


    /**
     * @param  $feature_name
     * @return boolean
     */
    function _getFeature($feature_name){
        $className = 'GantryFeature'.ucfirst($feature_name);

        if (!class_exists($className)){
            $this->_loadFeatures();
        }

        if (class_exists($className))
        {
            return new $className();
        }
        return false;
    }

    function _loadLayouts(){
         $layout_paths = array(
            $this->templatePath.DS.'html'.DS.'layouts',
            $this->gantryPath.DS.'html'.DS.'layouts'
         );

        $raw_layouts = array();
        foreach($layout_paths as  $layout_path){
            if (file_exists($layout_path) && is_dir($layout_path)){
                $d = dir($layout_path);
                while (false !== ($entry = $d->read())) {
                    if($entry != '.' && $entry != '..'){
                        $layout_name = basename($entry, ".php");
                        $path	= $layout_path.DS.$layout_name.'.php';
                        $className = 'GantryLayout'.ucfirst($layout_name);
                        if (!class_exists($className)) {
                            if (file_exists( $path ))
                            {
                                require_once( $path );
                                if(class_exists($className))
                                {
                                    $raw_layouts[$layout_name] = $layout_name;
                                }
                            }

                        }
                    }
                }
                $d->close();
            }
        }
        foreach ($raw_layouts as $layout){
            if (!in_array($layout,  $this->_layouts)){
                $this->_layouts[$layout] = $layout;
            }
        }
    }

    function _getLayout($layout_name){
        $className = 'GantryLayout'.ucfirst($layout_name);
        if (!class_exists($className)){
            $this->_loadLayouts();
        }

        if (class_exists($className))
        {
            return new $className();
        }
        return false;
    }

    /**
     * @param  $schema
     * @return array
     */
    function _flipBodyPosition($schema) {

    	$backup = array_keys($schema);
    	$backup_reverse = array_reverse($schema);
    	$reverse = array_reverse($backup);

    	$pos = array_search('mb',$backup);

    	unset($backup[$pos]);

  		$new_keys = array();
  		$new_schema = array();

		reset($backup);
  		foreach($reverse as $value) {
  			if ($value != 'mb')	{
  				$value = current($backup);
  				next($backup);
  			}
  			$new_keys[] = $value;
  		}

  		reset($backup_reverse);
  		foreach ($new_keys as $key) {
  			$new_schema[$key] = current($backup_reverse);
  			next($backup_reverse);
  		}
    	return $new_schema;
    }

    /**
     * @return void
     */
	function _checkAjaxTool() {
		global $mainframe;

        $ajax_tool = "gantry-ajax.php";
        $path = $this->templatePath . '/';
        $origin = $this->gantryPath . "/".$ajax_tool;


        if ((!file_exists($path . $ajax_tool) || (filesize($path . $ajax_tool) != filesize($origin))) && file_exists($path) && is_dir($path) && is_writable($path)) {
            jimport('joomla.filesystem.file');

            if (file_exists($path . $ajax_tool)) JFile::delete($path . $ajax_tool);
            JFile::copy($origin, $path . $ajax_tool);
        }
	}

    /**
     * @return void
     */
	function _checkLanguageFiles() {
        jimport('joomla.filesystem.file');
        $language_dir = $this->basePath.'/language/en-GB';
        $admin_language_dir = $this->basePath.'/administrator/language/en-GB';
        $template_lang_file = 'en-GB.tpl_'.$this->templateName.'.ini';

        if (file_exists($this->templatePath.DS.$template_lang_file)  &&
                (
                    (
                        !file_exists($language_dir.DS.$template_lang_file) &&
                        is_writable($language_dir)
                    )
                    ||
                    (
                        $this->get('copy_lang_files_if_diff',0)==1 &&
                        file_exists($language_dir.DS.$template_lang_file) &&
                        filesize($language_dir.DS.$template_lang_file) != filesize($this->templatePath.DS.$template_lang_file)
                    )
                )
            )
        {
            JFile::copy($this->templatePath.DS.$template_lang_file, $language_dir.DS.$template_lang_file);
        }

        if (file_exists($this->templatePath.DS.'admin'.DS.$template_lang_file) &&
                (
                    (
                        !file_exists($admin_language_dir.DS.$template_lang_file) &&
                        is_writable($admin_language_dir)
                    )
                    ||
                    (
                        $this->get('copy_lang_files_if_diff',0)==1 &&
                        file_exists($admin_language_dir.DS.$template_lang_file) &&
                        filesize($admin_language_dir.DS.$template_lang_file) != filesize($this->templatePath.DS.'admin'.DS.$template_lang_file)
                    )
                )
            )
        {
            JFile::copy($this->templatePath.DS.'admin'.DS.$template_lang_file, $admin_language_dir.DS.$template_lang_file);
        }
	}

    /**
     * @param  $array1
     * @param  $array2
     * @return
     */
	function _array_merge_replace_recursive( &$array1,  &$array2) {
		$merged = $array1;

		foreach($array2 as $key => $value) {
			if (is_array($value) && isset($merged[$key]) && is_array($merged[$key])) {
				$merged[$key] = $this->_array_merge_replace_recursive($merged[$key], $value);
			}
			else {
				$merged[$key] = $value;
			}
		}

		return $merged;
	}

    /**#@-*/

}
