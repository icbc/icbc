/* Arquivo elaborado para instanciar e configurar o Ajax do sistemas */
var objAjax;
if(window.XMLHttpRequest){
	objAjax = new XMLHttpRequest();
} else if(window.ActiveXObject) {
	objAjax = new ActiveXObject("Microsoft.XMLHTTP");
}
