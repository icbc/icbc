/* Arquivo elaborado para instanciar e configurar o Ajax do sistemas */
function formataValor(valor){
	contador = Math.round(valor.length/3);
	for (i = 0; contador > i;i++){
		valor = valor.replace(".","");
	}
	valor = valor.replace(",",".");
	return valor;
}
function analisePF(valor, patrocinio){
	valor = formataValor(valor);
	var deducao = formataValor(patrocinio);
	var campoValor = document.getElementById("campoValor");
	var campoPatrocinio = document.getElementById("campoPatrocinio");
	var campoDeducao = document.getElementById("campoDeducao");
	var campoTotalImposto = document.getElementById("campoTotalImposto");
	
	var linhaCsll = document.getElementById("linhaCsll");
	var linhaIR = document.getElementById("linhaIR");
	var linhaAddIR = document.getElementById("linhaAddIR");
	var linhaIRPagar = document.getElementById("linhaIRPagar");
	var linhaLucroLiquido = document.getElementById("linhaLucroLiquido");
	var linhaTotalImposto = document.getElementById("linhaTotalImposto");
	var botoes = document.getElementById("botoes");

	if(deducao != ""){
		if(deducao > valor*0.06){
			deducao = valor*0.06;
		}
	}
	else{
		deducao = 0;
	}
	IRPagar = valor - deducao;
	deducao = float2moeda(deducao);
	IRPagar = float2moeda(IRPagar);
	
	campoDeducao.innerHTML = deducao;
	campoTotalImposto.innerHTML = IRPagar;

	linhaCsll.style.display = "none";
	linhaIR.style.display = "none";
	linhaAddIR.style.display = "none";
	linhaIRPagar.style.display = "none";
	linhaLucroLiquido.style.display = "none";
	linhaTotalImposto.style.display = "";

	campoValor.innerHTML = "<input type=\"text\" class=\"medio\" id=\"valor\" name=\"valor\" maxlenght=\"150\" value=\""+valor+"\" onblur=\"verificaValor(); simula('simples');\" onfocus=\"this.select();\" onkeypress=\"return SomenteNumero(event);\" />";
	campoPatrocinio.innerHTML = "<input type=\"text\" class=\"medio\" id=\"patrocinio\" name=\"patrocinio\" maxlenght=\"150\" value=\""+patrocinio+"\" onblur=\"simula('simples');\" onfocus=\"this.select();\" onkeypress=\"return SomenteNumero(event);\" />";

	botao = "<button type=\"button\" name=\"task\" valeu=\"simuleSimples\" id=\"simuleSimples\" onclick=\"simula('simples');verificaValor();\">Simule</button>";
	botoes.innerHTML = botao;
}
function analisePJ(valor, patrocinio, tipo){
	valor = formataValor(valor);
	deducao = formataValor(patrocinio);
	var csll = null;
	var campoValor = document.getElementById("campoValor");
	var campoPatrocinio = document.getElementById("campoPatrocinio");
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
	var linhaLucroLiquido = document.getElementById("linhaLucroLiquido");
	
	var botoes = document.getElementById("botoes");
	
	csll = valor*0.09;
	ir = valor*0.15;
	addIR = (valor-240000)*0.1;
	if(addIR < 0){
		addIR = 0;
	}
	IRPagar = (ir + addIR);
	if(deducao != ""){
		if(deducao > IRPagar*0.04){
			deducao = IRPagar*0.04;
		}
	}
	else{
		deducao = 0;
	}
	totalImpostos = IRPagar + csll - deducao;
	lucroLiquido = valor - totalImpostos - deducao;
	
	csll = float2moeda(csll);
	ir = float2moeda(ir);
	addIR = float2moeda(addIR);
	deducao = float2moeda(deducao);
	totalImpostos = float2moeda(totalImpostos);
	IRPagar = float2moeda(IRPagar);
	lucroLiquido = float2moeda(lucroLiquido);
	
	if(tipo == "simples"){
		campoIRPagar.innerHTML = IRPagar;
		campoDeducao.innerHTML = deducao;
		campoTotalImposto.innerHTML = totalImpostos;
		
		linhaCsll.style.display = "none";
		linhaIR.style.display = "none";
		linhaAddIR.style.display = "none";
		linhaLucroLiquido.style.display = "none";
		
		campoValor.innerHTML = "<input type=\"text\" class=\"medio\" id=\"valor\" name=\"valor\" maxlenght=\"150\" value=\""+valor+"\" onblur=\"verificaValor(); simula('simples');\" onfocus=\"this.select();\" onkeypress=\"return SomenteNumero(event);\" />";
		campoPatrocinio.innerHTML = "<input type=\"text\" class=\"medio\" id=\"patrocinio\" name=\"patrocinio\" maxlenght=\"150\" value=\""+patrocinio+"\" onblur=\"simula('simples');\" onfocus=\"this.select();\" onkeypress=\"return SomenteNumero(event);\" />";
		
		botao = "<button type=\"button\" name=\"task\" valeu=\"simuleSimples\" id=\"simuleSimples\" onclick=\"simula('simples');verificaValor();\">Simule</button>";
		botao += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		botao +="<button type=\"button\" name=\"task\" valeu=\"simuleCompleta\" id=\"simuleCompleta\" onclick=\"simula('completa');verificaValor();\">Detalhada</button>";
		botoes.innerHTML = botao;
	}
	if(tipo == "completa"){
		campoIRPagar.innerHTML = IRPagar;
		campoCsll.innerHTML = csll;
		campoIR.innerHTML = ir;
		campoAddIR.innerHTML = addIR;
		campoDeducao.innerHTML = deducao;
		campoIRPagar.innerHTML = IRPagar;
		campoTotalImposto.innerHTML = totalImpostos;
		campoLucroLiquido.innerHTML = lucroLiquido;

		campoValor.innerHTML = "<input type=\"text\" class=\"medio\" id=\"valor\" name=\"valor\" maxlenght=\"150\" value=\""+valor+"\" onblur=\"verificaValor(); simula('completa');\" onfocus=\"this.select();\" onkeypress=\"return SomenteNumero(event);\" />";
		campoPatrocinio.innerHTML = "<input type=\"text\" class=\"medio\" id=\"patrocinio\" name=\"patrocinio\" maxlenght=\"150\" value=\""+patrocinio+"\" onblur=\"simula('completa');\" onfocus=\"this.select();\" onkeypress=\"return SomenteNumero(event);\" />";
		
		botao = "<button type=\"button\" name=\"task\" valeu=\"simuleCompleta\" id=\"simuleCompleta\" onclick=\"simula('completa');verificaValor();\">Simule</button>";
		botao += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		botao +="<button type=\"button\" name=\"task\" valeu=\"simuleSimples\" id=\"simuleSimples\" onclick=\"simula('simples');verificaValor();\">Simplificada</button>";
		botoes.innerHTML = botao;
		
		linhaCsll.style.display = "";
		linhaIR.style.display = "";
		linhaAddIR.style.display = "";
		linhaLucroLiquido.style.display = "";
	}
}
function simula(tipo){
	var valor = document.getElementById("valor").value;
	var patrocinio = document.getElementById("patrocinio").value;
	var pessoaFisica = document.getElementsByName("tipoPessoa")[1].checked;
	var pessoaJuridica = document.getElementsByName("tipoPessoa")[0].checked;
	if(pessoaJuridica== true)
		analisePJ(valor, patrocinio, tipo);
	if(pessoaFisica == true)
		analisePF(valor, patrocinio);
}
function validaTipoPessoa(){
	var pessoaFisica = document.getElementsByName("tipoPessoa")[1].checked;
	var pessoaJuridica = document.getElementsByName("tipoPessoa")[0].checked;
	var labelValor = document.getElementById("labelValor");
	
	var linhaCsll = document.getElementById("linhaCsll");
	var linhaIR = document.getElementById("linhaIR");
	var linhaAddIR = document.getElementById("linhaAddIR");
	var linhaIRPagar = document.getElementById("linhaIRPagar");
	var linhaLucroLiquido = document.getElementById("linhaLucroLiquido");
	var linhaTotalImposto = document.getElementById("linhaTotalImposto");
	
	var botoes = document.getElementById("botoes");
	if(pessoaJuridica == true){
		labelValor.innerHTML = "<label for='valor'>Lucro Real:</label>";
		
		linhaCsll.style.display = "none";
		linhaIR.style.display = "none";
		linhaAddIR.style.display = "none";
		linhaIRPagar.style.display = "";
		linhaLucroLiquido.style.display = "none";
		linhaTotalImposto.style.display = "";
		
		botao = "<button type=\"button\" name=\"task\" valeu=\"simuleCompleta\" id=\"simuleCompleta\" onclick=\"simula('simples');verificaValor();\">Simule</button>";
		botao += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		botao +="<button type=\"button\" name=\"task\" valeu=\"simuleSimples\" id=\"simuleSimples\" onclick=\"simula('completa');verificaValor();\">Detalhada</button>";
		botoes.innerHTML = botao;
	}
	if (pessoaFisica == true){
		labelValor.innerHTML = "<label for='valor'>IR devido:</label>";
		linhaCsll.style.display = "none";
		linhaIR.style.display = "none";
		linhaAddIR.style.display = "none";
		linhaIRPagar.style.display = "none";
		linhaLucroLiquido.style.display = "none";
		linhaTotalImposto.style.display = "";
		botao = "<button type=\"button\" name=\"task\" valeu=\"simuleCompleta\" id=\"simuleCompleta\" onclick=\"simula('simples');verificaValor();\">Simule</button>";
		botoes.innerHTML = botao;
		
	}
}
function verificaValor(){
	var valor = document.getElementById("valor").value;
	valor = formataValor(valor);
	var campoPodeDoar = document.getElementById("campoPodeDoar");
	var pessoaFisica = document.getElementsByName("tipoPessoa")[1].checked;
	var pessoaJuridica = document.getElementsByName("tipoPessoa")[0].checked;
	if(pessoaJuridica == true){
		ir = valor*0.15;
		addIR = (valor-240000)*0.1;
		if(addIR < 0){
			addIR = 0;
		}
		IRPagar = (ir + addIR);
		podeDoar = IRPagar *0.04;
	}
	if (pessoaFisica == true){
		podeDoar = valor*0.06;
	}
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
function SomenteNumero(e){
	var tecla= (window.event)? event.keyCode : e.which;
	if((tecla>47 && tecla<58) || tecla == 44)
		return true;
	else{
		if (tecla==8 || tecla==0)
			return true;
		else 
			return false;
	}
}
