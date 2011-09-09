/* Arquivo elaborado para instanciar e configurar o Ajax do sistemas */
function analise(lucroReal, deducao, procentagem){
	var csll = null;
	var campoCsll = document.getElementById("campoCsll");
	var campoIR = document.getElementById("campoIR");
	var campoAddIR = document.getElementById("campoAddIR");
	var campoDeducao = document.getElementById("campoDeducao");
	var campoIRPagar = document.getElementById("campoIRPagar");
	var campoTotalImposto = document.getElementById("campoTotalImposto");
	var campoLucroLiquido = document.getElementById("campoLucroLiquido");

	csll = lucroReal*0.09;
	if(deducao != ""){
		if(deducao > lucroReal*procentagem){
			deducao = lucroReal*procentagem
		}
	}
	else{
		deducao = 0;
	}
	ir = lucroReal*0.15;
	addIR = (lucroReal-240000)*0.1;
	if(addIR < 0){
		addIR = 0;
	}
	IRPagar = (ir + addIR) - deducao;
	totalImpostos = IRPagar + csll;
	lucroLiquido = lucroReal - totalImpostos - deducao;
	
	deducao = float2moeda(deducao);
	totalImpostos = float2moeda(totalImpostos);
	IRPagar = float2moeda(IRPagar);
	addIR = float2moeda(addIR);
	csll = float2moeda(csll);
	lucroLiquido = float2moeda(lucroLiquido);
	ir = float2moeda(ir);
	
	campoIRPagar.innerHTMl = IRPagar;
	campoCsll.innerHTML = csll;
	campoIR.innerHTML = ir;
	campoAddIR.innerHTML = addIR;
	campoDeducao.innerHTML = deducao;
	campoIRPagar.innerHTML = IRPagar;
	campoTotalImposto.innerHTML = totalImpostos;
	campoLucroLiquido.innerHTML = lucroLiquido;
}
function simula(){
	var lucroReal = document.getElementById("lucroReal").value;
	var patrocinio = document.getElementById("patrocinio").value;
	var pessoaFisica = document.getElementsByName("tipoPessoa")[0].checked;
	var pessoaJuridica = document.getElementsByName("tipoPessoa")[1].checked;
	if(pessoaJuridica== true)
		analise(lucroReal, patrocinio, 0.04);
	if(pessoaFisica == true)
		analise(lucroReal, patrocinio, 0.06);
}

function verificaValor(){
	var lucroReal = document.getElementById("lucroReal").value;
	var campoPodeDoar = document.getElementById("campoPodeDoar");
	var pessoaFisica = document.getElementsByName("tipoPessoa")[0].checked;
	var pessoaJuridica = document.getElementsByName("tipoPessoa")[1].checked;
	if(pessoaJuridica == true)
		porcentagem = 0.04;
	if (pessoaFisica == true)
		porcentagem = 0.06;
	podeDoar = lucroReal*porcentagem;
	podeDoar = float2moeda(podeDoar);
	campoPodeDoar.innerHTML = podeDoar;
}
function float2moeda(num) {
   x = 0;
   if(num<0) {
      num = Math.abs(num);
      x = 1;
   }
   if(isNaN(num)) num = "0";
      cents = Math.floor((num*100+0.5)%100);
   num = Math.floor((num*100+0.5)/100).toString();
   if(cents < 10) cents = "0" + cents;
      for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
         num = num.substring(0,num.length-(4*i+3))+'.'+num.substring(num.length-(4*i+3));
	ret = num + ',' + cents;
	if (x == 1)
		ret = ' - ' + ret;
	return ret;
}