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
		$modelo->gravaArquivo();
		$modelo->tabela = "projeto";
		$post["logo"] = $modelo->file["name"];
		$modelo->post = $post;
		$arrayCampos = array("dataPublicacao");
		$modelo->organizaData($arrayCampos);
		$objProjeto = $modelo->armazena();
		$this->setRedirect($this->link, "Cadastros realizado com sucesso");
	}
}

?>
