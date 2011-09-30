<?php
defined("_JEXEC") or die("Acesso Restrito");
require_once (JPATH_COMPONENT.DS."controlador.php");
$controlador = JRequest::getCmd("controller", null);
if($controlador != null){
	require_once (JPATH_COMPONENT.DS."controller".DS."{$controlador}.php");
}
$tarefa = JRequest::getCmd("task","projeto");
$nomeClasse = MecenatoFrontController.$controlador;
$objControlador = new $nomeClasse();
$objControlador->execute($tarefa);
$objControlador->redirect();
?>
