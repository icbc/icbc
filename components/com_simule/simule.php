<?php
defined("_JEXEC") or die("Acesso Restrito");

require_once(JPATH_COMPONENT.DS."controlador.php");

$controlador = JRequest::getCmd("controller", null);

$objControlador = new SimuleFrontController();

$tarefa = JRequest::getVar("task", "simula");

$objControlador->execute($tarefa);
?>
