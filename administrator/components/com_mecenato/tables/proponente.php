<?php
defined("_JEXEC") or die ("Acesso Restrito");

class TableProponente  extends JTable{
	public $id = null;
	public $idUser = null;
	public $nome = null;
	public $documento = null;
	public $endereco = null;
	public $bairro = null;
	public $cidade = null;
	public $estado = null;
	public $cep = null;
	public function __construct(&$db) {
		parent::__construct("#__mecenato_proponente", $key, $db);
	}
}

?>
