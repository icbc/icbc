<?php defined("_JEXEC") or die("Acesso Restrito"); JHTML::_("behavior.calendar");?>
Projeto a ser patrocinado: <?php echo $this->projeto->nome; ?>
<br />
Patrocínio em nome de: <?echo ($this->incentivador->nome)?$this->incentivador->nome:$this->select;?>
<br />
<div class="clear separador"></div>
<div id="componente">
	<div class="itemObrigatorio">
		* Itens obrigatórios
	</div>
	<div class="clear separador"></div>
	<form action="<?php echo $this->url; ?>">
		<div class="linha">
			<div class="chave">
				<label for="campo">Valor: </label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="valor" id="valor" value="" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label for="campo">Data do Depósito: </label>
			</div>
			<div class="campo">
				<input class="inputbox" style="float:left;" type="text" name="dataDeposito" id="dataDeposito" value="<?php echo date("d/m/Y") ?>"/>
					<img alt="calendario" style="float:left;" id="dataDepositoImg" src="components/com_mecenato/auxiliares/imagens/calendar.png" />
					<script type ="text/javascript">
					Calendar.setup(
						{
							inputField  : "dataDeposito",
							ifFormat    : "%d/%m/%Y",
							button      : "dataDeposito"
						}
					);
					Calendar.setup(
						{
							inputField  : "dataDeposito",
							ifFormat    : "%d/%m/%Y",
							button      : "dataDepositoImg"
						}
					);
					</script>
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label for="campo">Forma Investimento: </label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="campo" value="" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label for="campo">Forma Patrocínio: </label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="campo" value="" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label for="campo">Forma de Avaliação de Doação: </label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="campo" value="" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="botao">
			<button type="submit" name="task" value="salvar" > Envair </button>
		</div>
		<input type="hidden" name="controller" value="patrocinio" />
	</form>
</div>
<div class="clear separador"></div>