<?php
defined("_JEXEC") or die("Acesso Restrito");
jimport("joomla.application.component.view");
class MecenatoFrontViewPatrocinio extends JView {
	public function display($tpl = null) {
		$objDoc =& JFactory::getDocument();
		$objUser =& JFactory::getUser();
		$itemId = JRequest::getVar("Itemid",null);
		$objDoc->addStyleSheet("components/com_mecenato/auxiliares/css/estilo.css");
		$id = JRequest::getVar("id",null);
		$modelo =& $this->getModel();
		if($id){
			$modelo->id = $id;
			$modelo->tabela = "projeto";
			$modelo->campos = " id, nome, logo, numPronac ";
			$modelo->complemento = "WHERE id = {$modelo->id}";
			$modelo->pegaDado();
			$objProjeto = $modelo->dados;
			$modelo->campos = " id, nome ";
			$modelo->tabela = "incentivador";
			$modelo->complemento = "WHERE idUser = {$objUser->id}";
			$modelo->pegaDado();
			$objIncentivador = $modelo->dados;
			if($objIncentivador == null && $objUser->gid > 18){
				$modelo->campos = " i.id as value, i.nome as text ";
				$modelo->tabela = "incentivador";
				$modelo->complemento = " as i INNER JOIN #__users as u ON i.idUser = u.id ";
				$modelo->listaDados();
				$arr[0]->value = "";
				$arr[0]->text = "- Incentivador -";
				$arr = array_merge($arr,$modelo->dados);
				$select["incentivador"] = JHTML::_("select.genericlist", $arr, "idIncentivador");
			}

			$arrFormaIncentivo = array (
				JHTML::_("select.option","","- Forma de incentivo -"),
				JHTML::_("select.option","1"," Bens "),
				JHTML::_("select.option","2"," Serviços ")
				);
			$select["formaIncentivo"] = JHTML::_("select.genericlist", $arrFormaIncentivo, "formaIncentivo");


			$url = "index.php?option=com_mecenato&view=patrocinio&id={$modelo->id}&Itemid={$itemId}";
		}else{
			$modelo->tabela = "patrocinio";
			$modelo->campos = " pro.nome as projeto, pro.numPronac as pronac, inc.nome as incentivador, par.valor, par.dataRecebido ";
			$modelo->complemento = " as par INNER JOIN #__mecenato_projeto AS pro ON pro.id = par.idProjeto ";
			$modelo->complemento .= " INNER JOIN #__mecenato_incentivador AS inc ON inc.id = par.idIncentivador ";
			$modelo->listaDados();
			$arr = array("dataRecebido");
			$modelo->organizaData($arr, "exibir");
			$url = "index.php?option=com_mecenato&view=patrocinio&Itemid={$itemId}";
			$this->assignRef("registros", $modelo->dados );
		}
		
		
		$this->assignRef("projeto", $objProjeto);
		$this->assignref("incentivador", $objIncentivador);
		$this->assignRef("url",$url);
		$this->assignRef("select", $select);
		parent::display($tpl);
	}
}

?>
