<?php
defined("_JEXEC") or die("Acesso Restrito");
class MecenatoFrontControllerProjeto extends MecenatoFrontController{
	private $get;
	private $link = "index.php";
	function salvar(){
		$this->get = JRequest::get("get");
		$objUri =& JFactory::getURI();
		$this->link .= $objUri->toString(array('query'));
		$modelo = $this->getModel("projeto");
		$post = array();
		$post = JRequest::get("post");
		$post["idProponente"] = 2;
		$modelo->post = $post;
		$file = JRequest::getVar("logo", null, "FILES");
		$modelo->file = $file;
		$modelo->tabela = "projeto";
		$modelo->gravaArquivo();
		die(JUtility::dump($modelo));
		$objProponente = $modelo->armazena();
		$this->setRedirect($this->link, "Cadastros realizado com sucesso");
	}
}

?>
