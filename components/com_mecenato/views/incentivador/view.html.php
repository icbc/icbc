<?php
defined("_JEXEC") or die("Acesso Restrito");
require_once (JPATH_COMPONENT.DS."auxiliares".DS."classes".DS."auxiliar.php");
jimport("joomla.application.component.view");
class MecenatoFrontViewIncentivador extends JView {
	function display($tpl = null) {
		$auxiliar = new Auxiliar();
		$selectEstado = $auxiliar->selectEstados();
		$documento =& JFactory::getDocument();
		$documento->addStyleSheet("components/com_mecenato/auxiliares/css/estilo.css");
		$documento->addScript("components/com_mecenato/auxiliares/js/jquery.min.js");
		$documento->addScript("components/com_mecenato/auxiliares/js/jquery.maskedinput.min.js");
		$documento->addScript("components/com_mecenato/auxiliares/js/javascript.js");
		$arrTipoDocumento[] = JHTML::_("select.option","0","CPF");
		$arrTipoDocumento[] = JHTML::_("select.option","1", "CNPJ");
		$selectTipoDocumento = JHTML::_("select.radiolist",$arrTipoDocumento, "tipoDocumento", "class='inputbox' onClick='verificaTipoDocumentoIncentivador();'");
		
		$arrTipoEmpresa[] = JHTML::_("select.option","0", "-Tipo de Empresa-");
		$arrTipoEmpresa[] = JHTML::_("select.option","1", "Privada");
		$arrTipoEmpresa[] = JHTML::_("select.option","2", "Pública");
		$selectTipoEmpresa = JHTML::_("select.genericlist",$arrTipoEmpresa, "tipoEmpresa", "class='inputbox'");
		$this->assignRef("tipoDocumento", $selectTipoDocumento);
		$this->assignRef("tipoEmpresa", $selectTipoEmpresa);
		$this->assignRef("selectEstado", $selectEstado);
		$this->assignRef("url", JRequest::getVar("REQUEST_URI", null,"server"));
		
		parent::display($tpl);
	}
}
