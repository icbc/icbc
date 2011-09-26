<?php defined("_JEXEC") or die("Acesso Restrito"); JHTML::_('behavior.calendar'); ?>
<div id="componente">
	<div class="itemObrigatorio">
		* Itens obrigatórios
	</div>
	<form action="index.php?option=com_mecenato" >
		<div class="linha">
		<div class="chave">
				<label>Número Pronac:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="numPronac" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Segmento Cultural:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="segmentoCultural" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Nome:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="numPronac" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Banco:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="numPronac" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Agencia:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="numPronac" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Conta Corrente:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="numPronac" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label>Data Publicação da portaria de aprovação no DOU:</label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="dataPublicacao" id="dataPublicacao" value="<?php echo date("d/m/Y") ?>"/>
				<img alt="calendario" id="dataPublicacaoImg" src="components/com_mecenato/auxiliares/imagens/calendar.png" />
				<script type ="text/javascript">
				Calendar.setup(
					{
						inputField  : "dataPublicacao",
						ifFormat    : "%d/%m/%Y",
						button      : "dataPublicacao"
					}
				);
				Calendar.setup(
					{
						inputField  : "dataPublicacao",
						ifFormat    : "%d/%m/%Y",
						button      : "dataPublicacaoImg"
					}
				);
				</script>
			</div>
			<div class="clear separador"></div>
			</div>
		<div class="linha">
			<div class="chave">
				<label>Logo Projeto:</label>
			</div>
			<div class="campo">
				<input class="file" type="file" name="numPronac" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="botao">
			<button type="submit" name="task" value="salvar" > Envair </button>
		</div>
	</form>
</div>
