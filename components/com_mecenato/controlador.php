<?php
/**
 * Description of controlador
 *
 * @author icbc
 */
jimport("joomla.application.component.controller");
class MecenatoFrontController extends JController {
	public function projeto(){
		$view = JRequest::getVar("view","projeto");
		JRequest::setVar("view",$view);
		parent::display();
	}
	abstract function salvar(){
	}
}

?>
