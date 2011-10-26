<?php
defined("_JEXEC") or die("Acesso Restrito");
require_once (JPATH_COMPONENT.DS."auxiliares".DS."classes".DS."auxiliar.php");
jimport("joomla.application.component.view");
class MecenatoFrontViewProponente extends JView {
	function display($tpl = null) {
		$auxiliar = new Auxiliar();
		$objUri =& JFactory::getURI();
		$url = "index.php".$objUri->toString(array('query'));
		$selectEstado = $auxiliar->selectEstados();
		$documento =& JFactory::getDocument();
		$documento->addStyleSheet("components/com_mecenato/auxiliares/css/estilo.css");
		$documento->addScript("components/com_mecenato/auxiliares/js/jquery.min.js");
		$documento->addScript("components/com_mecenato/auxiliares/js/jquery.maskedinput.min.js");
		$documento->addScript("components/com_mecenato/auxiliares/js/javascript.js");
		$arrTipoDocumento[] = JHTML::_("select.option","0","Pessoa física");
		$arrTipoDocumento[] = JHTML::_("select.option","1", "Pessoa Jurídica");
		$selectTipoPessoa = JHTML::_("select.radiolist",$arrTipoDocumento, "tipoPessoa", "class='inputbox' onClick='verificatipoPessoa();'", "value","text", 0);
		$this->assignRef("tipoPessoa", $selectTipoPessoa);
		$this->assignRef("selectEstado", $selectEstado);
		$this->assignRef("url", $url);
		
		parent::display($tpl);
	}
}

?>
