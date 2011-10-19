<?php
defined("_JEXEC") or die("Acesso Restrito");
jimport("joomla.application.component.view");
class MecenatoFrontViewPatrocinio extends JView {
	public function display($tpl = null) {
		$objDoc =& JFactory::getDocument();
		$objUri =& JFactory::getURI();
		$url = "index.php".$objUri->toString(array('query'));
		
		$objDoc->addStyleSheet("components/com_mecenato/auxiliares/css/estilo.css");
		
		$modelo =& $this->getModel();
		$modelo->id = JRequest::getVar("id",null);
		$modelo->tabela = "projeto";
		$modelo->campos = " id, nome, logo, numPronac ";
		$modelo->complemento = "WHERE id = {$modelo->id}";
		$modelo->pegaDado();
		$objProjeto = $modelo->dados;
		$objUser =& JFactory::getUser();
		$modelo->campos = " nome ";
		$modelo->tabela = "incentivador";
		$modelo->complemento = "WHERE idUser = {$objUser->id}";
		$modelo->pegaDado();
		$objIncentivador = $modelo->dados;
		if($objIncentivador == null && $objUser->gid > 18){
			$modelo->campos = " i.id as value, i.nome as text ";
			$modelo->tabela = "incentivador";
			$modelo->complemento = " as i INNER JOIN #__users as u ON i.idUser = u.id ";
			$modelo->listaDados();
			$select = JHTML::_("select.genericlist",$modelo->dados,"idIncentivador");
		}
		$this->assignRef("projeto", $objProjeto);
		$this->assignref("incentivador", $objIncentivador);
		$this->assignRef("url",$url);
		$this->assignRef("select", $select);
		parent::display($tpl);
	}
}

?>
