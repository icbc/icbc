<?php
defined("_JEXEC") or die("Acesso Restrito");
class TableContato extends JTable {	
	public $id = null;
	public $idRelacionado = null;
	public $contato = null;
	public function __construct(&$db) {
		parent::__construct("#__mecenato_contato", "id", $db);
	}
}

?>
