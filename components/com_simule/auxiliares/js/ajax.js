/* Arquivo elaborado para instanciar e configurar o Ajax do sistemas */
function iniciaAjax(){
	var objAjax;
	if(window.XMLHttpRequest){
		objAjax = new XMLHttpRequest();
	} else if(window.ActiveXObject) {
		objAjax = new ActiveXObject("Msxml2.XMLHTTP");
		if(!objAjax){
			objAjax = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	else{
		alert("Seu navegador não tem suporte para executar esta navegação.");
	}
	return objAjax;
}