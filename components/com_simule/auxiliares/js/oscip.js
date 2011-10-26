function simula(tipo){
	var valor = document.getElementById("valor").value;
	var patrocinio = document.getElementById("patrocinio").value;
	valor = formataValor(valor);
	deducao = formataValor(patrocinio);
	var campoValor = document.getElementById("campoValor");
	var campoPatrocinio = document.getElementById("campoPatrocinio");
	var campoNovoValor = document.getElementById("campoNovoValor");
	var campoCsll = document.getElementById("campoCsll");
	var campoIR = document.getElementById("campoIR");
	var campoAdicional = document.getElementById("campoAdicional");
	var campoDeducao = document.getElementById("campoDeducao");
	var campoTct = document.getElementById("campoTct");
	var campoLucroLiquido = document.getElementById("campoLucroLiquido");
	
	var linhaCsll = document.getElementById("linhaCsll");
	var linhaIR = document.getElementById("linhaIR");
	var linhaAdicional = document.getElementById("linhaAdicional");
	var linhaTct = document.getElementById("linhaTct");
	var linhaNovoValor = document.getElementById("linhaNovoValor");
	var linhaLucroLiquido = document.getElementById("linhaLucroLiquido");
	
	var botoes = document.getElementById("botoes");
	
	if(deducao != ""){
		if(deducao > valor*0.02){
			deducao = valor*0.02;
		}
	}
	else{
		deducao = 0;
	}
	novoValor = valor - deducao;
	csll = novoValor*0.09;
	ir = novoValor*0.15;
	adicional = ((novoValor - (csll + ir))*0.1);
	
	tct = (ir + adicional + csll);
	lucroLiquido = novoValor - tct;
	
	novoValor = float2moeda(novoValor);
	csll = float2moeda(csll);
	ir = float2moeda(ir);
	adicional = float2moeda(adicional);
	deducao = float2moeda(deducao);
	tct = float2moeda(tct);
	lucroLiquido = float2moeda(lucroLiquido);
	if(tipo == "simples"){
		campoNovoValor.innerHTML = novoValor;
		campoTct.innerHTML = tct;
		campoDeducao.innerHTML = deducao;
		campoLucroLiquido.innerHTML = lucroLiquido;
		
		linhaCsll.style.display = "none";
		linhaIR.style.display = "none";
		linhaAdicional.style.display = "none";
		
		campoValor.innerHTML = "<input type=\"text\" class=\"medio\" id=\"valor\" name=\"valor\" maxlenght=\"150\" value=\""+valor+"\" onblur=\"verificaValor(); simula('simples');\" onfocus=\"this.select();\" onkeypress=\"return SomenteNumero(event);\" />";
		campoPatrocinio.innerHTML = "<input type=\"text\" class=\"medio\" id=\"patrocinio\" name=\"patrocinio\" maxlenght=\"150\" value=\""+patrocinio+"\" onblur=\"simula('simples');\" onfocus=\"this.select();\" onkeypress=\"return SomenteNumero(event);\" />";
		
		botao = "<button type=\"button\" name=\"task\" valeu=\"simuleSimples\" id=\"simuleSimples\" onclick=\"simula('simples');verificaValor();\">Simule</button>";
		botao += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		botao +="<button type=\"button\" name=\"task\" valeu=\"simuleCompleta\" id=\"simuleCompleta\" onclick=\"simula('completa');verificaValor();\">Detalhada</button>";
		botoes.innerHTML = botao;
	}
	if(tipo == "completa"){
		campoNovoValor.innerHTML = novoValor;
		campoCsll.innerHTML = csll;
		campoIR.innerHTML = ir;
		campoAdicional.innerHTML = adicional;
		campoDeducao.innerHTML = deducao;
		campoTct.innerHTML = tct;
		campoLucroLiquido.innerHTML = lucroLiquido;

		campoValor.innerHTML = "<input type=\"text\" class=\"medio\" id=\"valor\" name=\"valor\" maxlenght=\"150\" value=\""+valor+"\" onblur=\"verificaValor(); simula('completa');\" onfocus=\"this.select();\" onkeypress=\"return SomenteNumero(event);\" />";
		campoPatrocinio.innerHTML = "<input type=\"text\" class=\"medio\" id=\"patrocinio\" name=\"patrocinio\" maxlenght=\"150\" value=\""+patrocinio+"\" onblur=\"simula('completa');\" onfocus=\"this.select();\" onkeypress=\"return SomenteNumero(event);\" />";
		
		botao = "<button type=\"button\" name=\"task\" valeu=\"simuleCompleta\" id=\"simuleCompleta\" onclick=\"simula('completa');verificaValor();\">Simule</button>";
		botao += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		botao +="<button type=\"button\" name=\"task\" valeu=\"simuleSimples\" id=\"simuleSimples\" onclick=\"simula('simples');verificaValor();\">Simplificada</button>";
		botoes.innerHTML = botao;
		
		linhaCsll.style.display = "";
		linhaIR.style.display = "";
		linhaAdicional.style.display = "";
		linhaLucroLiquido.style.display = "";
	}
	
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

function verificaValor(){
	var valor = document.getElementById("valor").value;
	valor = formataValor(valor);
	var campoPodeDoar = document.getElementById("campoPodeDoar");
	porcentagem = 0.02;
	podeDoar = valor*porcentagem;
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
function formataValor(valor){
	contador = Math.round(valor.length/3);
	for (i = 0; contador > i;i++){
		valor = valor.replace(".","");
	}
	valor = valor.replace(",",".");
	return valor;
}