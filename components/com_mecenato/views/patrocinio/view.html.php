<?php
defined("_JEXEC") or die("Acesso Restrito");
jimport("joomla.application.component.view");
class MecenatoFrontViewPatrocinio extends JView {
	public function display($tpl = null) {
		$layout = JRequest::getVar("layout",null);
		$tpl = JRequest::getVar("tpl", null);
		$objDoc =& JFactory::getDocument();
		$objUser =& JFactory::getUser();
		$itemId = JRequest::getVar("Itemid",null);
		$objDoc->addStyleSheet("components/com_mecenato/auxiliares/css/estilo.css");
		$id = JRequest::getVar("id",null);
		$idPat = JRequest::getVar("idPat",null);
		$modelo =& $this->getModel();
		$modelo->tabela = "incentivador";
		if($layout == "form"){
			$modelo->tabela = "projeto";
			$modelo->campos = " id, nome, logo, numPronac ";
			$modelo->complemento = "WHERE id = {$id}";
			$modelo->pegaDado();
			$objProjeto = $modelo->dados;
			if( $idPat == null ){
				$modelo->campos = " id, nome ";
				$modelo->tabela = "incentivador";
				$modelo->complemento = "WHERE idUser = {$objUser->id}";
				$modelo->pegaDado();
				$objIncentivador = $modelo->dados;
				if($objIncentivador == null && $objUser->gid > 18 ){
					$modelo->campos = " i.id as value, i.nome as text ";
					$modelo->tabela = "incentivador";
					$modelo->complemento = " as i INNER JOIN #__users as u ON i.idUser = u.id ";
					$modelo->listaDados();
					$arr[0]->value = "";
					$arr[0]->text = "- Incentivador -";
					$arr = array_merge($arr,$modelo->dados);
					$select["incentivador"] = JHTML::_("select.genericlist", $arr, "idIncentivador");
				}
			}
			else{
				$modelo->tabela = "patrocinio";
				$modelo->campos = " * ";
				$modelo->complemento = " WHERE id = {$idPat}";
				$modelo->pegaDado();
				$arr = array("dataRecebido");
				$modelo->organizaData($arr, "exibir");
				$objPatrocinio = $modelo->dados;
				$modelo->campos = " id, nome ";
				$modelo->tabela = "incentivador";
				$modelo->complemento = "WHERE id = {$objPatrocinio->idIncentivador}";
				$modelo->pegaDado();
				$objIncentivador = $modelo->dados;
				$arrFormaIncentivo = array (
				JHTML::_("select.option","0"," Aguardando confirmação do pratrocínio "),
				JHTML::_("select.option","1"," Patrocínio confirmado "),
				JHTML::_("select.option","2"," Patrocínio cancelado ")
				);
				$select["status"] = JHTML::_("select.genericlist", $arrFormaIncentivo, "status","","value","text",$objPatrocinio->status);
			}
			$arrFormaIncentivo = array (
				JHTML::_("select.option","","- Forma de incentivo -"),
				JHTML::_("select.option","1"," Bens "),
				JHTML::_("select.option","2"," Serviços ")
				);
			$select["formaIncentivo"] = JHTML::_("select.genericlist", $arrFormaIncentivo, "formaIncentivo","","value","text",$objPatrocinio->formaIncentivo);
			$url["form"] = "index.php?option=com_mecenato&view=patrocinio&id={$id}&Itemid={$itemId}";
			$url["novoIncantivador"] = "index.php?option=com_mecenato&view=incentivador&Itemid={$itemId}";
		}elseif($layout == null && $tpl == null){
			$modelo->tabela = "patrocinio";
			$modelo->listaProjetos();
			$url = "index.php?option=com_mecenato&view=patrocinio&tpl=patrocinio&Itemid={$itemId}";
			$this->assignRef("registros", $modelo->dados );
		}
		elseif($tpl == "patrocinio"){
			$modelo->tabela = "patrocinio";
			$modelo->campos = " inc.nome as incentivador, par.valor, par.dataRecebido, par.status, par.id ";
			$modelo->complemento .= " as par INNER JOIN #__mecenato_incentivador AS inc ON inc.id = par.idIncentivador ";
			$modelo->complemento .= " WHERE par.idProjeto = {$id} ORDER BY par.dataRecebido ";
			$modelo->listaDados();
			$arr = array("dataRecebido");
			$modelo->organizaData($arr, "exibir");
			$url["status"] = "index.php?option=com_mecenato&controller=patrocinio&task=status&Itemid={$itemId}&id={$id}";
			$url["edita"] = "index.php?option=com_mecenato&view=patrocinio&layout=form&Itemid={$itemId}&id={$id}";
			$this->assignRef("registros", $modelo->dados );
			$modelo->somasProjetos($id);
			$this->assignRef("somas", $modelo->dados );
			$modelo->tabela = "projeto";
			$modelo->campos = " id, nome, numPronac ";
			$modelo->complemento = "WHERE id = {$id}";
			$modelo->pegaDado();
			$objProjeto = $modelo->dados;
		}
		$this->assignRef("projeto", $objProjeto);
		$this->assignref("incentivador", $objIncentivador);
		$this->assignRef("url",$url);
		$this->assignRef("select", $select);
		$this->assignRef("user", $objUser);
		$this->assignRef("patrocinio", $objPatrocinio);
		parent::display($tpl);
	}
}

?>
