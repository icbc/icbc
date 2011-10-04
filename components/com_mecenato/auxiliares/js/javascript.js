function verificaTipoDocumento(){
	cpf = document.getElementById("tipoDocumento0").checked;
	cnpj = document.getElementById("tipoDocumento1").checked;
	if(cpf== true){
		document.getElementById("linhaDocumentocpf").style.display = "";
		document.getElementById("linhaDocumentocnpj").style.display = "none";
	}
	if(cnpj== true){
		document.getElementById("linhaDocumentocpf").style.display = "none";
		document.getElementById("linhaDocumentocnpj").style.display = "";
	}
}