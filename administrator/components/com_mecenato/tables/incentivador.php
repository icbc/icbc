<?php
defined("_JEXEC") or die("Acesso Restrito.");
class TableIncentivador extends JTable {
	public $id = null;
	public $idUser = null;
	public $nome = null;
	public $documento = null;
	public $endereco = null;
	public $cidade = null;
	public $estado = null;
	public $cep = null;
	public $tipoEmpresa = null;
	public $grupoEmpresarial = null;
	public $nomeDirigente = null;
	
	function __construct(&$db) {
		parent::__construct("#__mecenato_incentivador", "id", $db);
	}
}

?>
