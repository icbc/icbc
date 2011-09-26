<?php 
defined("_JEXEC") or die("Acesso restrito"); 
require_once (dirname(__FILE__).DS."helper.php");
$documento =& JFactory::getDocument();
$documento->addScript("components/com_simule/auxiliares/js/simule.js");
$userCount = $params->get("userCount");
$item = ModSimuleHelper::getItem($userCount);
require(JModuleHelper::getLayoutPath("mod_simule"));
?>
