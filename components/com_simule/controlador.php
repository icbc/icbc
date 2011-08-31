<?php
jimport("joomla.application.component.controller");

class SimuleFrontController extends JController{
	public function simula(){
		$view = JRequest::getVar("view","simule");
		JRequest::setVar("view",$view);
		parent::display();
	}
}
?>
