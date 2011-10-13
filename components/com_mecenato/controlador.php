<?php
defined("_JEXEC") or die ("Acesso Restrito");
jimport("joomla.application.component.controller");
class MecenatoFrontController extends JController {
	public function projeto(){
		$view = JRequest::getVar("view","projeto");
		JRequest::setVar("view",$view);
		parent::display();
	}
	function salvar(){
	}
}

?>
