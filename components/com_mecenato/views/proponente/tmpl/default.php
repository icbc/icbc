<?php defined("_JEXEC") or die("Acesso Restrito."); JHTML::_("behavior.modal"); ?>
<script type="text/javascript">
	jQuery(function($){
	   $("#documento").mask("999.999.999-99");
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
				<label>Nome:</label>
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
		<div class="linha">
			<div class="chave">
				<label>CNPJ:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="documento" id="documento" value="" />
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
				<input class="inputbox" type="text" name="password" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Confirmar senha:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="password2" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="botao">
			<button type="submit" name="task" value="salvar" > Envair </button>
		</div>
		<input type="hidden" name="controller" value="proponente" />
	</form>
</div>