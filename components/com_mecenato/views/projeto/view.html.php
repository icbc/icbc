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
		$modelo =& $this->getModel();
		if($id == null)
			$modelo->listaDados();
		else{
			$modelo->id = $id;
			$modelo->pegaDado();
			$tpl = "info";
		}
		$arr = array("dataPublicacao");
		$modelo->organizaData($arr, "exibir");
		$this->assignRef("registros", $modelo->dados);
		$this->assignRef("url",$url);
		parent::display($tpl);
	}
}

?>
