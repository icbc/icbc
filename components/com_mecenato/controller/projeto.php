<?php
defined("_JEXEC") or die("Acesso Restrito");
class MecenatoFrontControllerProjeto extends MecenatoFrontController{
	private $get;
	function salvar(){
		$this->get = JRequest::get("get");
		$this->link .= "&view=projeto&Itemid={$this->get["Itemid"]}";
		$modeloLogo = $this->getModel("projeto");
		$post = array();
		$post = JRequest::get("post");
		if($modeloLogo->verificaPronac($post["numPronac"]) > 0){
			$this->setRedirect(
				$this->link."&layout=form",
				" Erro: Registro não salvo, verifique se o projeto não ".
				" possui um código do Pronac já cadastrado no sistema.",
				error);
		}
		else{
			$post['resumo'] = JRequest::getVar('resumo', null, 'post', 'string', JREQUEST_ALLOWRAW);
			$file = JRequest::getVar("logo", null, "FILES");
			$modeloLogo->post = $post;
			$modeloLogo->file = $file;
			$modeloLogo->gravaArquivo();
			$post["logo"] = $modeloLogo->file["name"];
			$modeloEncaminhamento = $this->getModel("projeto");
			$file = JRequest::getVar("arquivoDetalhamento", null, "FILES");
			$modeloEncaminhamento->post = $post;
			$modeloEncaminhamento->file = $file;
			$modeloEncaminhamento->gravaArquivo();
			$post["arquivoDetalhamento"] = $modeloEncaminhamento->file["name"];
			$modelo = $this->getModel("projeto");
			$modelo->post = $post;
			$modelo->tabela = "projeto";
			$arrayCampos = array("dataPublicacao");
			$modelo->organizaData($arrayCampos);
			$objProjeto = $modelo->armazena();
			if($objProjeto){
				$this->setRedirect($this->link, "Cadastros realizado com sucesso");
			}else{
				$this->setRedirect(
						$this->link."&layout=form",
						" Erro: Registro não salvo. Entre em contato com o administrador. ",
						error);
			}
		}
	}
}

?>
