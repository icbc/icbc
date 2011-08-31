<?php
/**
 * @package		gantry
 * @version		3.0.3 June 12, 2010
 * @author		RocketTheme http://www.rockettheme.com
 * @copyright 	Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */

defined('JPATH_BASE') or die();

global $mainframe;
if (!defined('GANTRY_VERSION')) {
    /**
     * @global Gantry $gantry
     */
    global $gantry;
    
    /**
     * @name GANTRY_VERSION
     */
    define('GANTRY_VERSION', '3.0.3');

    if (!defined('DS')) {
        define('DS', DIRECTORY_SEPARATOR);
    }

    /**
     * @param  string $path the gantry path to the class to import
     * @return 
     */
    function gantry_import($path) {
        require_once (realpath(dirname(__FILE__)) . '/core/gantryloader.class.php');
        return GantryLoader::import($path);
    }

    gantry_import('core.gantrysingleton');
    gantry_import('core.gantry');

    $site = JFactory::getApplication();
    $template = $site->getTemplate();
    $template_params = null;

    if (!$mainframe->isAdmin()) {
        if (is_readable( JPATH_SITE.DS."templates".DS.$template.DS.'params.ini' ) )
		{
			$content = file_get_contents(JPATH_SITE.DS."templates".DS.$template.DS.'params.ini');
			$template_params = new JParameter($content);
		}
        $conf = & JFactory :: getConfig();
    }

    if (!$mainframe->isAdmin() && !empty($template_params) && ($template_params->get("cache-enabled", 0) == 1)) {
        $user = & JFactory :: getUser();
        $cache = & JFactory :: getCache('Gantry');
        $cache->setCaching(true);
        $cache->setLifeTime($template_params->get("cache-time", $conf->getValue('config.cachetime') * 60));
        $gantry = $cache->get(array('GantrySingleton','getInstance'), array('Gantry'), 'Gantry-'.$template."-".$user->get('aid', 0));
    } else {
        $gantry = GantrySingleton :: getInstance('Gantry');
    }

    if (!$gantry->isAdmin()){
        $gantry->init();

        // $filename comes from included scope
        $ext = substr($filename, strrpos($filename, '.'));
        $file = basename($filename, $ext);
		$checks = $gantry->_getBrowserBasedChecks($file);
        $platform = $gantry->browser->platform;
		$enabled = $gantry->get($platform.'-enabled', 0);
        $view = $gantry->get('template_prefix').$platform.'-switcher';
        
        // flip to get most specific first
        $checks = array_reverse($checks);

        // remove the default index.php page
        array_pop($checks);

        $template_paths = array(
           $gantry->templatePath,
           $gantry->gantryPath.DS.'tmpl'
        );

        foreach ($template_paths as $template_path) {
            if (file_exists($template_path) && is_dir($template_path)) {
                foreach ($checks as $check) {
                    $check_path = preg_replace("/\?(.*)/", '', $template_path . DS . $check . $ext);
                    if (file_exists($check_path) && is_readable($check_path) && $enabled && JRequest::getVar($view, false, 'COOKIE', 'STRING') != '0') {
                        // include the wanted index page
                        ob_start();
                        include_once($check_path);
                        $contents = ob_get_contents();
                        ob_end_clean();
                        $gantry->altindex = $contents;
                        break;
                    }
                }
                if ($gantry->altindex !== false) break;
            }
        }
    }
}