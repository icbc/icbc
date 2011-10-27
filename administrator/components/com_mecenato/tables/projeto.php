<?php
defined("_JEXEC") or die("Acesso Restrito");
class TableProjeto extends JTable{
	public $id = null;
	public $idProponente = null;
	public $numPronac = null;
	public $segmentoCultural = null;
	public $nome = null;
	public $logo = null;
	public $banco = null;
	public $agencia = null;
	public $conta = null;
	public $dataPublicacao = null;
	public $dataHoraCad = null;
	public $resumo = null;
	public $arquivoDetalhamento = null;
	public $status = 1;
	
	public function __construct(&$db) {
		parent::__construct("#__mecenato_projeto", "id", $db);
	}
}

?>
