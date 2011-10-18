<?php defined("_JEXEC") or die("Acesso Restrito."); JHTML::_("behavior.modal"); ?>
<script type="text/javascript">
	jQuery(function($){
		$("#documentocnpj").mask("99.999.999/9999-99");
		$("#documentocpf").mask("999.999.999-99");
		$("#cep").mask("99999-999");
		$("#telefone1").mask("(99)9999-9999");
		$("#telefone2").mask("(99)9999-9999");
		$("#telefone3").mask("(99)9999-9999");
	});
</script>
<div id="componente">
	<div class="itemObrigatorio">
		* Itens obrigatórios
	</div>
	<form action="<?php echo $this->url ?>" method="post" >
		<div class="linha">
			<div class="chave">
				<label for="nome" id="nome">Nome:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="nome" id="nome" value="" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Tipo de documento:</label>
			</div>
			<div class="campo">
				<?php echo $this->tipoDocumento; ?>
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha" id="linhaDocumentocpf" style="display:none;">
			<div class="chave">
				<label>CPF:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="documento[]" id="documentocpf" value="" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha" id="linhaDocumentocnpj" style="display:none;">
			<div class="chave">
				<label>CNPJ:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="documento[]" id="documentocnpj" value="" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha" id="linhaTipoEmpresa" style="display:none;">
			<div class="chave">
				<label>Tipo de Empresa:</label>
			</div>
			<div class="campo">
				<?php echo $this->tipoEmpresa; ?>
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha" id="linhaGrupoEmpresarial" style="display:none;">
			<div class="chave">
				<label>Grupo Empresarial:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="grupoEmpresarial" id="grupoEmpresarial" value="" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha" id="linhaNomeDirigente" style="display:none;">
			<div class="chave">
				<label>Nome Dirigente:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="nomeDirigente" id="nomeDirigente" value="" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Endereço:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="endereco" id="endereco" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Bairro:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="bairro" id="bairro" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Cidade:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="cidade" id="cidade" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Estado:</label>
			</div>
			<div class="campo">
				<?php echo $this->selectEstado; ?>
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>CEP:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="cep" id="cep" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Telefone Fixo:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="telefone[]" id="telefone1" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Celuar:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="telefone[]" id="telefone2" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Comercial:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="telefone[]" id="telefone3" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>E-mail:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="email" id="email" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Usuário:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="username" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Senha:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="password" name="password" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Confirmar senha:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="password" name="password2" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="botao">
			<button type="submit" name="task" value="salvar" > Envair </button>
		</div>
		<input type="hidden" name="controller" value="incentivador" />
	</form>
</div>
<?php 