<?php defined("_JEXEC") or die("Acesso Restrito"); JHTML::_("behavior.calendar");?>
<div class="clear separador"></div>
<div id="componente">
	<div class="itemObrigatorio">
		* Itens obrigatórios
	</div>
	<div class="clear separador"></div>
	<form action="<?php echo $this->url; ?>" method="post">
		<div class="linha">
			<div class="chave">
				<label for="campo">Projeto a ser patrocinado: </label>
			</div>
			<div class="campo">
				<?php echo $this->projeto->nome; ?>
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label for="campo">Patrocínio em nome de:</label>
			</div>
			<div class="campo">
				<?echo ($this->incentivador->nome)?$this->incentivador->nome:$this->select["incentivador"];?>
			</div>
			<div class="clear separador"></div>
		</div>
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
				<input class="inputbox" style="float:left;" type="text" name="dataRecebido" id="dataRecebido" value="<?php echo date("d/m/Y") ?>"/>
					<img alt="calendario" style="float:left;" id="dataRecebidoImg" src="components/com_mecenato/auxiliares/imagens/calendar.png" />
					<script type ="text/javascript">
					Calendar.setup(
						{
							inputField  : "dataRecebido",
							ifFormat    : "%d/%m/%Y",
							button      : "dataRecebido"
						}
					);
					Calendar.setup(
						{
							inputField  : "dataRecebido",
							ifFormat    : "%d/%m/%Y",
							button      : "dataRecebidoImg"
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
				<?php echo $this->select["formaIncentivo"] ?>
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label for="campo">Especificar Doação/Patrocínio: </label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="especificarAvaliacao" value="" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label for="campo">Forma de Avaliação de Doação/Patrocínio: </label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="formaAvaliacao" value="" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="botao">
			<button type="submit" name="task" value="salvar" > Envair </button>
		</div>
		<?php 
		if($this->incentivador->id):
		?>
			<input type="hidden" name="idIncentivador" value="<?php echo $this->incentivador->id ?>" />
		<?php endif; ?>
		<input type="hidden" name="idProjeto" value="<?php echo $this->projeto->id; ?>" />
		<input type="hidden" name="controller" value="patrocinio" />
	</form>
</div>
<div class="clear separador"></div>
