<?php
defined("_JEXEC") or die("Acesso Restrito");
require_once (JPATH_COMPONENT.DS."controlador.php");
require_once("components".DS."com_mecenato".DS."models".DS."modelo.php");
$controlador = JRequest::getCmd("controller", null);
if($controlador != null){
	require_once (JPATH_COMPONENT.DS."controller".DS."{$controlador}.php");
}
$tarefa = JRequest::getCmd("task","visao");
$nomeClasse = MecenatoFrontController.$controlador;
$objControlador = new $nomeClasse();
$objControlador->execute($tarefa);
$objControlador->redirect();
?>
