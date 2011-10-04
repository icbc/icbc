<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport("joomla.application.component.model");
class MecenatoFrontModelProponente extends JModel {
	private $id;
	private $dados;
	private $tabela;
	private $post;
	public function __get($name) {
		return $this->$name;
	}
	public function __set($name, $value) {
		$this->$name = $value;
	}
	public function armazena(){
		$tabela = $this->getTable($this->tabela);
		echo JUtility::dump($tabela);
	}
}

?>
