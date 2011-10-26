<?php defined("_JEXEC") or die("Acesso Restrito");
class MecenatoFrontModelPatrocinio extends Modelo{
	public function listaProjetos(){
		$sql = "SELECT  
pro.nome as projeto, pro.numPronac as pronac,
sum(par.valor) as total
FROM #__mecenato_patrocinio  as pat 
INNER JOIN #__mecenato_projeto AS pro ON pro.id = pat.idProjeto 
INNER JOIN #__mecenato_incentivador AS inc ON inc.id = pat.idIncentivador
WHERE pat.status = 1 AND pro.status = 1
GROUP BY par.idProjeto";
		$this->objDB->setQuery($sql);
	}
}