/* Arquivo elaborado para instanciar e configurar o Ajax do sistemas */
function formataValor(valor){
	contador = Math.round(valor.length/3);
	for (i = 0; contador > i;i++){
		valor = valor.replace(".","");
	}
	valor = valor.replace(",",".");
	return valor;
}
function analise(lucroReal, deducao, procentagem, tipo){
	lucroReal = formataValor(lucroReal);
	deducao = formataValor(deducao);
	var csll = null;
	var campoCsll = document.getElementById("campoCsll");
	var campoIR = document.getElementById("campoIR");
	var campoAddIR = document.getElementById("campoAddIR");
	var campoDeducao = document.getElementById("campoDeducao");
	var campoIRPagar = document.getElementById("campoIRPagar");
	var campoTotalImposto = document.getElementById("campoTotalImposto");
	var campoLucroLiquido = document.getElementById("campoLucroLiquido");
	
	var linhaCsll = document.getElementById("linhaCsll");
	var linhaIR = document.getElementById("linhaIR");
	var linhaAddIR = document.getElementById("linhaAddIR");
	var linhaIRPagar = document.getElementById("linhaIRPagar");
	var linhaLucroLiquido = document.getElementById("linhaLucroLiquido");
	
	var botoes = document.getElementById("botoes");
	
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
	
	csll = float2moeda(csll);
	ir = float2moeda(ir);
	addIR = float2moeda(addIR);
	deducao = float2moeda(deducao);
	totalImpostos = float2moeda(totalImpostos);
	IRPagar = float2moeda(IRPagar);
	lucroLiquido = float2moeda(lucroLiquido);
	
	if(tipo == "simples"){
		campoIRPagar.innerHTMl = IRPagar;
		campoDeducao.innerHTML = deducao;
		campoTotalImposto.innerHTML = totalImpostos;
		
		linhaCsll.style.display = "none";
		linhaIR.style.display = "none";
		linhaAddIR.style.display = "none";
		linhaIRPagar.style.display = "none";
		linhaLucroLiquido.style.display = "none";
		
		botao = "<button type=\"button\" name=\"task\" valeu=\"simuleSimples\" id=\"simuleSimples\" onclick=\"simula('simples');verificaValor();\">Simule</button>";
		botao += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		botao +="<button type=\"button\" name=\"task\" valeu=\"simuleCompleta\" id=\"simuleCompleta\" onclick=\"simula('completa');verificaValor();\">Detalhada</button>";
		botoes.innerHTML = botao;
	}
	if(tipo == "completa"){
		campoIRPagar.innerHTMl = IRPagar;
		campoCsll.innerHTML = csll;
		campoIR.innerHTML = ir;
		campoAddIR.innerHTML = addIR;
		campoDeducao.innerHTML = deducao;
		campoIRPagar.innerHTML = IRPagar;
		campoTotalImposto.innerHTML = totalImpostos;
		campoLucroLiquido.innerHTML = lucroLiquido;

		botao = "<button type=\"button\" name=\"task\" valeu=\"simuleCompleta\" id=\"simuleCompleta\" onclick=\"simula('completa');verificaValor();\">Simule</button>";
		botao += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		botao +="<button type=\"button\" name=\"task\" valeu=\"simuleSimples\" id=\"simuleSimples\" onclick=\"simula('simples');verificaValor();\">Simplificada</button>";
		botoes.innerHTML = botao;
		
		linhaCsll.style.display = "";
		linhaIR.style.display = "";
		linhaAddIR.style.display = "";
		linhaIRPagar.style.display = "";
		linhaLucroLiquido.style.display = "";
	}
}
function simula(tipo){
	var lucroReal = document.getElementById("lucroReal").value;
	var patrocinio = document.getElementById("patrocinio").value;
	var pessoaFisica = document.getElementsByName("tipoPessoa")[1].checked;
	var pessoaJuridica = document.getElementsByName("tipoPessoa")[0].checked;
	if(pessoaJuridica== true)
		analise(lucroReal, patrocinio, 0.04, tipo);
	if(pessoaFisica == true)
		analise(lucroReal, patrocinio, 0.06, tipo);
}
function validaTipoPessoa(){
	var pessoaFisica = document.getElementsByName("tipoPessoa")[1].checked;
	var pessoaJuridica = document.getElementsByName("tipoPessoa")[0].checked;
	var labellucroReal = document.getElementById("labellucroReal");
	if(pessoaJuridica == true)
		labellucroReal.innerHTML = "<label for='lucroReal'>Lucro Real:</label>";
	if (pessoaFisica == true)
		labellucroReal.innerHTML = "<label for='lucroReal'>Imposto a pagar:</label>";
}
function verificaValor(){
	var lucroReal = document.getElementById("lucroReal").value;
	lucroReal = formataValor(lucroReal);
	var campoPodeDoar = document.getElementById("campoPodeDoar");
	var pessoaFisica = document.getElementsByName("tipoPessoa")[1].checked;
	var pessoaJuridica = document.getElementsByName("tipoPessoa")[0].checked;
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
function mascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){  
	var key = '';  
	var i = j = 0;  
	var len = len2 = 0;  
	var strCheck = '0123456789';  
	var aux = aux2 = '';  
	var whichCode = (window.Event) ? e.which : e.keyCode;  
	if (whichCode == 13)
		return true;
	if(whichCode == 8){
		return true;
	}
	key = String.fromCharCode(whichCode); // Valor para o código da Chave  
	if (strCheck.indexOf(key) == -1)
		return false; // Chave inválida  
	len = objTextBox.value.length;  
	for(i = 0; i < len; i++)  
		if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal))
			break;  
	aux = '';  
	for(; i < len; i++)
		if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1)
			aux += objTextBox.value.charAt(i);  
	aux += key;  
	len = aux.length;  
	if (len == 0) 
		objTextBox.value = '';  
	if (len == 1) 
		objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;  
	if (len == 2) 
		objTextBox.value = '0'+ SeparadorDecimal + aux;  
	if (len > 2) {  
		aux2 = '';  
		for (j = 0, i = len - 3; i >= 0; i--) {  
			if (j == 3) {  
				aux2 += SeparadorMilesimo;  
				j = 0;  
			}  
			aux2 += aux.charAt(i);  
			j++;  
		}  
		objTextBox.value = '';  
		len2 = aux2.length;  
		for (i = len2 - 1; i >= 0; i--)  
			objTextBox.value += aux2.charAt(i);  
		objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);  
	}
	return false;
}