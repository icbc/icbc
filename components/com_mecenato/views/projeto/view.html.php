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
		$objDoc =& JFactory::getDocument();
		$objDoc->addStyleSheet("components/com_mecenato/auxiliares/css/estilo.css");
		$objUri =& JFactory::getURI();
		$url["busca"] = "index.php".$objUri->toString(array('query'));
		$url["novo"] =  "index.php".$objUri->toString(array('query'))."&layout=form";
		$modelo =& $this->getModel();
		$modelo->listaDados();
		$arr = array("dataPublicacao");
		$modelo->organizaData($arr, "exibir");
		$this->assignRef("registros", $modelo->dados);
		$this->assignRef("url",$url);
		parent::display();
	}
}

?>
