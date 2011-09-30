<?php
defined("_JEXEC") or die("Acesso Restrito");
require_once (JPATH_COMPONENT.DS."auxiliares".DS."classes".DS."auxiliar.php");
jimport("joomla.application.component.view");
class MecenatoFrontViewProponente extends JView {
	function display($tpl = null) {
		$auxiliar = new Auxiliar();
		$selectEstado = $auxiliar->selectEstados();
		$documento =& JFactory::getDocument();
		$documento->addStyleSheet("components/com_mecenato/auxiliares/css/estilo.css");
		$arrTipoDocumento[] = JHTML::_("select.option","cpf","CPF");
		$arrTipoDocumento[] = JHTML::_("select.option","cnpj", "CNPJ");
		$selectTipoDocumento = JHTML::_("select.genericlist",$arrTipoDocumento, "tipoDocumento", "class='inputbox'");
		$this->assignRef("tipoDocumento", $selectTipoDocumento);
		$this->assignRef("selectEstado", $selectEstado);
		$this->assignRef("url", JRequest::getVar("REQUEST_URI", null,"server"));
		
		parent::display($tpl);
	}
}

?>
