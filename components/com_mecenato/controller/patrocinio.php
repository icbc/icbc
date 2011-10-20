<?php
defined("_JEXEC") or die ("Acesso Restrito");
class MecenatoFrontControllerPatrocinio extends MecenatoFrontController {
	private $get;
	function salvar(){
		$this->get = JRequest::get("get");
		$this->link .= "&view=projeto&Itemid=".JRequest::getVar("Itemid");
		$modelo = $this->getModel("patrocinio");
		$post = array();
		$post = JRequest::get("post");
		$modelo->post = $post;
		$modelo->tabela = "patrocinio";
		$arrayCampos = array("dataRecebido");
		$modelo->organizaData($arrayCampos);
		$objProponente = $modelo->armazena();
		$this->setRedirect($this->link, "Cadastros realizado com sucesso");
	}
}

?>
