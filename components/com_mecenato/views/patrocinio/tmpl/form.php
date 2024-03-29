<?php defined("_JEXEC") or die("Acesso Restrito"); JHTML::_("behavior.calendar"); JHTML::_('behavior.tooltip');?>
<div class="clear separador"></div>
<div id="componente">
	<div class="itemObrigatorio">
		* Itens obrigatórios
	</div>
	<div class="clear separador"></div>
	<form action="<?php echo $this->url["form"]; ?>" method="post">
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
				<div style="float: left;">
					<?echo ($this->incentivador->nome)?$this->incentivador->nome:$this->select["incentivador"];?>
				</div>
				<?php if(!$this->incentivador->nome): ?>
				<a href="<?php echo $this->url["novoIncantivador"] ?>" target="_blank">
					<img class="editlinktip hasTip" title="Cadastro de novo Incentivador::Para adicionar um Incentivador que não esteja cadastrado na lista clique aqui" style="float:left;" alt="Novo Incentivador" src="components/com_mecenato/auxiliares/imagens/invetnviador.png" />
				</a>
				<?php endif; ?>
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label for="campo">Valor: </label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="valor" id="valor" value="<?php echo $this->patrocinio->valor ?>" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label for="campo">Data do Depósito: </label>
			</div>
			<div class="campo">
				<input class="inputbox" style="float:left;" type="text" name="dataRecebido" id="dataRecebido" value="<?php echo ($this->patrocinio->dataRecebido)? $this->patrocinio->dataRecebido :  date("d/m/Y") ?>"/>
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
				<input class="inputbox" type="text" name="especificarAvaliacao" value="<?php echo $this->patrocinio->especificarAvaliacao ?>" />
			</div>
			<div class="clear separador"></div>
		</div>
		<div class="linha">
			<div class="chave">
				<label for="campo">Forma de Avaliação de Doação/Patrocínio: </label>
			</div>
			<div class="campo">
				<input class="inputbox" type="text" name="formaAvaliacao" value="<?php echo $this->patrocinio->formaAvaliacao ?>" />
			</div>
			<div class="clear separador"></div>
		</div>
		<?php 
		if($this->patrocinio->id):
		?>
		<div class="linha">
			<div class="chave">
				<label for="campo">Situação: </label>
			</div>
			<div class="campo">
				<?php echo $this->select["status"]; ?>
			</div>
			<div class="clear separador"></div>
		</div>
		<?php endif; ?>
		<div class="botao">
			<button type="submit" name="task" value="salvar" > Enviar </button>
		</div>
		<?php 
		if($this->incentivador->id):
		?>
			<input type="hidden" name="idIncentivador" value="<?php echo $this->incentivador->id ?>" />
		<?php endif; ?>
		<input type="hidden" name="idProjeto" value="<?php echo $this->projeto->id; ?>" />
		<?php 
		if($this->patrocinio->id):
		?>
		<input type="hidden" name="id" value="<?php echo $this->patrocinio->id ?>" />
		<?php endif; ?>
		<input type="hidden" name="controller" value="patrocinio" />
	</form>
</div>
<div class="clear separador"></div>
