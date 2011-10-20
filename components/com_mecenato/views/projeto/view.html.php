<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of view
 *
 * @author icbc
 */
defined("_JEXEC") or die("Acesso Restrito");
jimport("joomla.application.component.view");
class MecenatoFrontViewProjeto extends JView {
	private $link = "index.php?option=com_mecenato";
	function display($tpl = null){
		$modelo =& $this->getModel();
		$objUri =& JFactory::getURI();
		$objDoc =& JFactory::getDocument();
		$objDoc->addStyleSheet("components/com_mecenato/auxiliares/css/estilo.css");
		$layout = JRequest::getVar("layout", null);
		$itemId = JRequest::getVar("Itemid",null);
		$id = JRequest::getVar("id",null);
		if($layout == "form"){
			$url = "index.php".$objUri->toString(array('query'));
		} elseif($id == null){
			$url["busca"] = "{$this->link}&view=projeto&Itemid={$itemId}";
			$url["novo"] =  "{$this->link}&view=projeto&Itemid={$itemId}&layout=form";
			$url["link"] = "{$this->link}&view=projeto&Itemid={$itemId}";
		}
		elseif($id > 0){
			$url = "{$this->link}&view=patrocinio&layout=form&id={$id}&Itemid={$itemId}";
		}
		if($id == null){
			$modelo->tabela = "projeto";
			$modelo->listaDados();
			$arr = array("dataPublicacao");
			$modelo->organizaData($arr, "exibir");
		}
		else{
			$modelo->id = $id;
			$modelo->tabela = "projeto";
			$modelo->pegaDado();
			$tpl = "info";
		}
		$this->assignRef("registros", $modelo->dados);
		$this->assignRef("url",$url);
		parent::display($tpl);
	}
}

?>
