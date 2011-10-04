<?php
defined("_JEXEC") or die("Acesso Restrito");
class MecenatoFrontControllerProponente extends MecenatoFrontController{
	private $get;
	
	function salvar(){
		$this->get = JRequest::get("get");
		$objUri =& JFactory::getURI();
		$objUri->toString();
		$modelo = $this->getModel("proponente");
		$modelo->post = JRequest::get("post");
		echo JUtility::dump($modelo->post);
		$modelo->tabela = "proponente";
		$modelo->armazena();
	}
}

?>