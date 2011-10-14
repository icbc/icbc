function verificaTipoDocumento(){
	cpf = document.getElementById("tipoDocumento0").checked;
	cnpj = document.getElementById("tipoDocumento1").checked;
	if(cpf== true){
		document.getElementById("nome").innerHTML = "Nome:";
		document.getElementById("linhaDocumentocpf").style.display = "";
		document.getElementById("linhaDocumentocnpj").style.display = "none";
	}
	if(cnpj== true){
		document.getElementById("nome").innerHTML = "Empresa:";
		document.getElementById("linhaDocumentocpf").style.display = "none";
		document.getElementById("linhaDocumentocnpj").style.display = "";
	}
}
function verificaTipoDocumentoIncentivador(){
	cpf = document.getElementById("tipoDocumento0").checked;
	cnpj = document.getElementById("tipoDocumento1").checked;
	if(cpf== true){
		document.getElementById("nome").innerHTML = "Nome:";
		document.getElementById("linhaDocumentocpf").style.display = "";
		document.getElementById("linhaDocumentocnpj").style.display = "none";
		document.getElementById("linhaTipoEmpresa").style.display = "none";
		document.getElementById("linhaGrupoEmpresarial").style.display = "none";
		document.getElementById("linhaNomeDirigente").style.display = "none";
	}
	if(cnpj== true){
		document.getElementById("nome").innerHTML = "Empresa:";
		document.getElementById("linhaDocumentocpf").style.display = "none";
		document.getElementById("linhaDocumentocnpj").style.display = "";
		document.getElementById("linhaTipoEmpresa").style.display = "";
		document.getElementById("linhaGrupoEmpresarial").style.display = "";
		document.getElementById("linhaNomeDirigente").style.display = "";
	}
}