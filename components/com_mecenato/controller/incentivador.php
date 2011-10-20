<?php
defined("_JEXEC") or die("Acesso Restrito");
class MecenatoFrontControllerIncentivador extends MecenatoFrontController{
	private $get;
	protected $link = "index.php";
	function salvar(){
		$this->get = JRequest::get("get");
		$objUri =& JFactory::getURI();
		$this->link .= $objUri->toString(array('query'));
		$modelo = $this->getModel("proponente");
		$post = array();
		$post = JRequest::get("post");
		$post["documento"] = $post["documento"][$post["tipoDocumento"]];
		$modelo->post = $post;
		$modelo->armazenaJUser();
		$modelo->tabela = "incentivador";
		$objProponente = $modelo->armazena();
		$postTelefone = $post["telefone"];
		foreach( $postTelefone as $telefone ){
			if($telefone != ""){
				$post = array();
				$post ["idRelacionado"] = $objProponente->id;
				$post["contato"] = $telefone;
				$modelo->post = $post;
				$modelo->tabela = "contato";
				$retorno = $modelo->armazena();
			}
		}
		$this->setRedirect($this->link, "Cadastros realizado com sucesso");
	}
}