<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport("joomla.application.component.model");
class MecenatoFrontModelProponente extends JModel {
	private $id;
	private $dados;
	private $tabela;
	private $post;
	public function __get($name) {
		return $name;
	}
	public function __set($name, $value) {
		$this->$name = $value;
	}
	public function armazena(){
		$tabela = $this->getTable($this->tabela);
		$arr = array("cep");
		$tabela->bind($this->post);
		$tabela->check($this->post["tipoDocumento"]);
		echo JUtility::dump($tabela);
	}
}

?>
