<?php
require_once ('libraries/joomla/html/html/select.php');
defined("_JEXEC") or die("Acesso Restrito");
class Auxiliar extends JHTMLSelect {
	public function selectEstados(){
		
		$objSelect = new JHTMLSelect();
		
		$arrEstado[] = $objSelect->option( "0"," - Estado -");
		$arrEstado[] = $objSelect->option( "AC"," Acre");
		$arrEstado[] = $objSelect->option( "AL"," Alagoas");
		$arrEstado[] = $objSelect->option( "AM"," Amazonas");
		$arrEstado[] = $objSelect->option( "AP"," Amapá");
		$arrEstado[] = $objSelect->option( "BA"," Bahia");
		$arrEstado[] = $objSelect->option( "CE"," Ceará");
		$arrEstado[] = $objSelect->option( "DF"," Distrito Federal");
		$arrEstado[] = $objSelect->option( "ES"," Espírito Santo");
		$arrEstado[] = $objSelect->option( "GO"," Goiás");
		$arrEstado[] = $objSelect->option( "MA"," Maranhão");
		$arrEstado[] = $objSelect->option( "MG"," Minas Gerais");
		$arrEstado[] = $objSelect->option( "MS"," Mato Grosso do Sul");
		$arrEstado[] = $objSelect->option( "MT"," Mato Grosso");
		$arrEstado[] = $objSelect->option( "PA"," Pará");
		$arrEstado[] = $objSelect->option( "PB"," Paraíba");
		$arrEstado[] = $objSelect->option( "PE"," Pernambuco");
		$arrEstado[] = $objSelect->option( "PI"," Piauí");
		$arrEstado[] = $objSelect->option( "PR"," Paraná");
		$arrEstado[] = $objSelect->option( "RJ"," Rio de Janeiro");
		$arrEstado[] = $objSelect->option( "RN"," Rio Grande do Norte");
		$arrEstado[] = $objSelect->option( "RO"," Rondônia");
		$arrEstado[] = $objSelect->option( "RR"," Roraima");
		$arrEstado[] = $objSelect->option( "RS"," Rio Grande do Sul");
		$arrEstado[] = $objSelect->option( "SC"," Santa Catarina");
		$arrEstado[] = $objSelect->option( "SE"," Sergipe");
		$arrEstado[] = $objSelect->option( "SP"," São Paulo");
		$arrEstado[] = $objSelect->option( "TO"," Tocantins");
		$selectEstado = $objSelect->genericlist( $arrEstado,"estado","class='inputbox'");
		return $selectEstado;
	}
}
?>