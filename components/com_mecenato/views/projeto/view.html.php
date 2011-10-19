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
	function display($tpl = null){
		$modelo =& $this->getModel();
		$objUri =& JFactory::getURI();
		$objDoc =& JFactory::getDocument();
		$objDoc->addStyleSheet("components/com_mecenato/auxiliares/css/estilo.css");
		$layout = JRequest::getVar("layout", null);
		$id = JRequest::getVar("id",null);
		if($layout == "form"){
			$url = "index.php".$objUri->toString(array('query'));
		} elseif($id == null){
			$url["busca"] = "index.php".$objUri->toString(array('query'));
			$url["novo"] =  "index.php".$objUri->toString(array('query'))."&layout=form";
			$url["link"] = "index.php".$objUri->toString(array('query'));
		}
		elseif($id > 0){
			$url = "index.php".$objUri->toString(array('query'));
			$url = str_replace("view=projeto", "view=patrocinio", $url);
		}
		if($id == null){
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
