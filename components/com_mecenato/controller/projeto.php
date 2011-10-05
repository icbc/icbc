<?php
defined("_JEXEC") or die("Acesso Restrito");
class MecenatoFrontControllerProjeto extends MecenatoFrontController{
	private $get;
	private $link = "index.php";
	function salvar(){
		$this->get = JRequest::get("get");
		$objUri =& JFactory::getURI();
		$this->link .= $objUri->toString(array('query'));
		$modelo = $this->getModel("proponente");
		$post = array();
		$post = JRequest::get("post");
		$modelo->post = $post;
		$modelo->tabela = "projeto";
		$objProponente = $modelo->armazena();
		$this->setRedirect($this->link, "Cadastros realizado com sucesso");
	}
}

?>
