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
	public function visao(){
		$view = JRequest::getVar("view","patrocinio");
		$objUser =& JFactory::getUser();
		$modelo =& $this->getModel("patrocinio");
		$modelo->tabela = "incentivador";
		if($modelo->verificaRelacaoUser($objUser->id) == null && $objUser->gid < 18){
			$itemId = JRequest::getVar("Itemid");
			$this->setRedirect(
					"index.php?option=com_user&view=login&Itemid={$itemId}", 
					"Usuário não registrado com este tipo de perfil", 
					"error"
					);
		}
		JRequest::setVar("view",$view);
		parent::display();
	}
}

?>
