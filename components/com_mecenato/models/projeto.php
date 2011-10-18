<?php 
defined( '_JEXEC' ) or die( 'Restricted access' );
class MecenatoFrontModelProjeto extends Modelo {
	public function listaDados(){
		$sql = " SELECT * FROM #__mecenato_projeto ";
		$objDB =& JFactory::getDBO();
		$objDB->setQuery($sql);
		$this->dados = $objDB->loadObjectList();
	}
}
