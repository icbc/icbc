<?php defined("_JEXEC") or die("Acesso Restrito");
jimport("joomla.application.component.view");
class MecenatoFrontViewProjeto extends JView {
	private $link = "index.php?option=com_mecenato";
	function display($tpl = null){
		$modelo =& $this->getModel();
		$objUser =& JFactory::getUser();
		$objUri =& JFactory::getURI();
		$objDoc =& JFactory::getDocument();
		$objDoc->addStyleSheet("components/com_mecenato/auxiliares/css/estilo.css");
		$layout = JRequest::getVar("layout", null);
		$itemId = JRequest::getVar("Itemid",null);
		$id = JRequest::getVar("id",null);
		$modelo->tabela = "proponente";
		$idProponente = $modelo->verificaRelacaoUser($objUser->id);
		if($idProponente){
			if($layout == "form"){
				$url = "index.php".$objUri->toString(array('query'));
			} elseif($id == null){
				$url["busca"] = "{$this->link}&view=projeto&Itemid={$itemId}";
				$url["novo"] =  "{$this->link}&view=projeto&layout=form&Itemid={$itemId}";
				$url["link"] = "{$this->link}&view=projeto&Itemid={$itemId}";
			}
		}
		if($id == null){
			$url["link"] = "{$this->link}&view=projeto&Itemid={$itemId}";
			$modelo->tabela = "projeto";
			$modelo->listaDados();
			$arr = array("dataPublicacao");
			$modelo->organizaData($arr, "exibir");
		}
		else{
			$modelo->id = $id;
			$modelo->tabela = "projeto";
			$modelo->complemento = " WHERE id = {$id}";
			$modelo->pegaDado();
			$tpl = "info";
			$url = "{$this->link}&controller=patrocinio&layout=form&id={$id}&Itemid={$itemId}";
		}
		$editor = &JFactory::getEditor();
		$this->assignRef("editor", $editor);
		$this->assignRef("registros", $modelo->dados);
		$this->assignRef("url",$url);
		$this->assignRef("idProponente", $idProponente);
		parent::display($tpl);
	}
}

?>
