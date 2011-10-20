<?php
defined("_JEXEC") or die ("Acesso Restrito");
class TablePatrocinio extends JTable{
	public $id = null;
	public $idProjeto = null;
	public $idIncentivador = null;
	public $valor = null;
	public $dataRecebido = null;
	public $formaIncentivo = null;
	public $especificarAvaliacao = null;
	public $formaAvaliacao = null;
	public $status = 0;
	public $dataHoraCad = null;
	public function __construct(&$db) {
		parent::__construct( "#__mecenato_patrocinio", "id", $db);
	}
}
?>
