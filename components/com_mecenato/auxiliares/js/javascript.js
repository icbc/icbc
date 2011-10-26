function verificatipoPessoa(){
	cpf = document.getElementById("tipoPessoa0").checked;
	cnpj = document.getElementById("tipoPessoa1").checked;
	if(cpf== true){
		document.getElementById("nome").innerHTML = "Nome:";
//		document.getElementById("linhaDocumentocpf").style.display = "";
//		document.getElementById("linhaDocumentocnpj").style.display = "none";
	}
	if(cnpj== true){
		document.getElementById("nome").innerHTML = "Empresa:";
//		document.getElementById("linhaDocumentocpf").style.display = "none";
//		document.getElementById("linhaDocumentocnpj").style.display = "";
	}
}
function verificatipoPessoaIncentivador(){
	cpf = document.getElementById("tipoPessoa0").checked;
	cnpj = document.getElementById("tipoPessoa1").checked;
	if(cpf== true){
		document.getElementById("nome").innerHTML = "Nome:";
//		document.getElementById("linhaDocumentocpf").style.display = "";
//		document.getElementById("linhaDocumentocnpj").style.display = "none";
		document.getElementById("linhaTipoEmpresa").style.display = "none";
		document.getElementById("linhaGrupoEmpresarial").style.display = "none";
		document.getElementById("linhaNomeDirigente").style.display = "none";
	}
	if(cnpj== true){
		document.getElementById("nome").innerHTML = "Empresa:";
//		document.getElementById("linhaDocumentocpf").style.display = "none";
//		document.getElementById("linhaDocumentocnpj").style.display = "";
		document.getElementById("linhaTipoEmpresa").style.display = "";
		document.getElementById("linhaGrupoEmpresarial").style.display = "";
		document.getElementById("linhaNomeDirigente").style.display = "";
	}
}