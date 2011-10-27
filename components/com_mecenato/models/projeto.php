<?php 
defined( '_JEXEC' ) or die( 'Restricted access' );
class MecenatoFrontModelProjeto extends Modelo {
	function verificaPronac($pronac){
		$sql = "SELECT count(*) FROM #__mecenato_projeto WHERE numPronac = '{$pronac}'";
		$this->objDB->setQuery($sql);
		return $this->objDB->loadResult();
	}
}
