/* Arquivo elaborado para instanciar e configurar o Ajax do sistemas */
function iniciaAjax(){
	var objAjax;
	if(window.XMLHttpRequest){
		objAjax = new XMLHttpRequest();
	} else if(window.ActiveXObject) {
<<<<<<< HEAD
		objAjax = new ActiveXObject("Msxml2.XMLHTTP");
		if(!objAjax){
			objAjax = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	else{
		alert("Seu navegador não tem suporte para executar esta navegação.");
	}
	return objAjax;
=======
		try{
			objAjax = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e){
			try{
				objAjax = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(ex){
				objAjax = false;
			}
		}
	}
	return objAjax;
}

var requisicaoAjax = iniciaAjax();
if(requisicaoAjax){
	requisicaoAjax.onReayStateChange = function (){
		if(requisicaoAjax.readyState == 4){
			if(requisicaoAjax.status == 200){
				alert("Chegou uma requisição");
			}
			else{
				
			}
		}
	}
>>>>>>> c507666c2edd9975413869ada4790d46632cde3e
}