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
		parent::display();
	}
}

?>
