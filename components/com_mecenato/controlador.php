<?php
defined("_JEXEC") or die ("Acesso Restrito");
jimport("joomla.application.component.controller");
class MecenatoFrontController extends JController {
	protected $link = "index.php?option=com_mecenato";
	public function visao(){
		$view = JRequest::getVar("view","projeto");
		JRequest::setVar("view",$view);
		parent::display();
	}
}

?>
