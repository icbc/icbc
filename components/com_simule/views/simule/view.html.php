<?php
jimport("joomla.application.component.view");
class SimuleFrontViewSimule extends JView{
	function display($tpl = null) {
		$documento =& JFactory::getDocument();
		$documento->addStyleSheet("components/com_simule/auxiliares/css/estilo.css");
		$registro->campo = null;
		$this->assignRef("registro",$registro);
		parent::display($tpl);
	}
}
?>
