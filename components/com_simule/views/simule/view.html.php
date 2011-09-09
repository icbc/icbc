<?php
jimport("joomla.application.component.view");
class SimuleFrontViewSimule extends JView{
	function display($tpl = null) {
		$documento =& JFactory::getDocument();
		$documento->addStyleSheet("components/com_simule/auxiliares/css/estilo.css");
		$documento->addScript("components/com_simule/auxiliares/js/ajax.js");
		$documento->addScript("components/com_simule/auxiliares/js/simule.js");
		$registro->imposto = null;
		$registro->doacao = null;
		$registro->pessoa = "pj";
		//estrutura de formação campo tipo de pessoa, buscando mostrar estre pessoa física e jurícias
		$listaPessoa[] = JHTML::_("select.option", "pf", "Pessoa física");
		$listaPessoa[] = JHTML::_("select.option", "pj", "Pessoa Jurídica");
		$pessoa = JHTML::_("select.radiolist", $listaPessoa, "tipoPessoa", "onclick='verificaValor()'", "value", "text", $registro->pessoa);
		//estrutura de formação campo tipo de incentivo, verificando se é por doação ou por patrocínio
		$listaIncentivo[] = JHTML::_("select.option", "d", "Doação");
		$listaIncentivo[] = JHTML::_("select.option", "p", "Patrocínio");
		$incentivo = JHTML::_("select.radiolist", $listaIncentivo, "incentivo");
		//estrutura de formação campo tipo de incentivo, verificando se é por doação ou por patrocínio
		$listaArtigo[] = JHTML::_("select.option", "18", "Art.18");
		$listaArtigo[] = JHTML::_("select.option", "26", "Art.26");
		$artigo = JHTML::_("select.radiolist", $listaArtigo, "artigo");
		// métodos da classe JView, que encaminha as informações para os arquivos da pasta tmpl
		$this->assignRef("registro",$registro);
		$this->assignRef("pessoa",$pessoa);
		$this->assignRef("incentivo", $incentivo);
		$this->assignRef("artigo", $artigo);
		parent::display($tpl);
	}
}
?>
