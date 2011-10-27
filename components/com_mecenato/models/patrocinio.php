<?php defined("_JEXEC") or die("Acesso Restrito");
class MecenatoFrontModelPatrocinio extends Modelo{
	public function listaProjetos(){
		$sql = "SELECT 
				pro.id as idProjeto, pro.nome as projeto, pro.numPronac as pronac,
				sum(IF(pat.status = 1, pat.valor, 0)) as arrecadado,
				sum(IF(pat.status = 0, pat.valor,0)) as aConfirmar,
				sum(IF(pat.status = 1 OR pat.status = 0, pat.valor,0)) as total
				FROM #__mecenato_patrocinio  as pat 
				INNER JOIN #__mecenato_projeto AS pro ON pro.id = pat.idProjeto 
				INNER JOIN #__mecenato_incentivador AS inc ON inc.id = pat.idIncentivador
				WHERE pro.status = 1
				GROUP BY pat.idProjeto";
		$this->objDB->setQuery($sql);
		$this->dados = $this->objDB->loadObjectList();
	}
	public function somasProjetos($id){
		$sql = "SELECT 
				sum(IF(pat.status = 1, pat.valor, 0)) as arrecadado,
				sum(IF(pat.status = 0, pat.valor,0)) as aConfirmar,
				sum(IF(pat.status = 2, pat.valor,0)) as cancelado,
				sum(IF(pat.status = 1 OR pat.status = 0, pat.valor,0)) as total
				FROM #__mecenato_patrocinio  as pat 
				INNER JOIN #__mecenato_projeto AS pro ON pro.id = pat.idProjeto 
				INNER JOIN #__mecenato_incentivador AS inc ON inc.id = pat.idIncentivador
				WHERE pro.status = 1 AND pro.id = {$id}";
		$this->objDB->setQuery($sql);
		$this->dados = $this->objDB->loadObject();
	}
	public function modificaStatus( $id, $status ){
		if($status == 1 ){
			$status = 0;
		}elseif($status == 0){
			$status = 1;
		}
		$sql = "UPDATE #__mecenato_patrocinio SET status = {$status} WHERE id = {$id}";
		$this->objDB->setQuery($sql);
		return $this->objDB->query();
	}
}