<?php
/**
 * @package   Gantry Template Framework - RocketTheme
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
gantry_import('core.gantryflatfile');

if (!defined('POSITIONS_MD5')){
    define('POSITIONS_MD5',0);
    define('POSITIONS_LAYPUT',1);
}

class GantryPositions extends GantrySingleton {
    var $_db = null;
    var $_db_file = null;

    function _init() {
        global $gantry;

        if (null == $this->_db){
            $this->_db = new Flatfile();
            $this->_db->datadir = $gantry->gantryPath.DS.'admin'.DS.'cache'.DS;
        }
        if (null == $this->_db_file) {
            $this->_db_file = $gantry->get('grid_system','12').'.cache.txt';
        }
    }
    function get($md5){
        $this->_init();
        $ret = null;

        $retarray =  $this->_db->selectUnique($this->_db_file, POSITIONS_MD5, $md5);
        if (null != $retarray && is_array($retarray) && count($retarray) > 0){
            $ret = $retarray[POSITIONS_LAYPUT];
        }
        return $ret;
    }
    
    function set($md5, $permutation){
        $this->_init();
        $this->_db->insert($this->_db_file, array($md5,$permutation));
    }
}