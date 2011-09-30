<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport("joomla.application.component.model");
class MecenatoFrontModelProjeto extends JModel {
	private $dados = null;
	public $valores  = "10";
	function __construct() {
		parent::__construct();
	}
	function teste(){
		$this->dados = $this->valores;
		echo "teste";
	}
}

?>
