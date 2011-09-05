<?php
/**
 * @author Sanjeev Shrestha
 * @date 10 Nov 2009
 * http://www.sanjeevshrestha.com.np

 */


// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');



$lists = modOSTwitterHelper::getStatus($params);

require(JModuleHelper::getLayoutPath('mod_ostwitterbox'));
?>
