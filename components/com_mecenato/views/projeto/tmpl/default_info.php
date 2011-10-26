<?php defined("_JEXEC") or die("Acesso Restrito");?>
<h3 class="title">
	<?php echo $this->registros->nome; ?>
</h3>
<div class="corpoProjeto">
	<div class="logo">
		<img alt="imagem referente ao projeto <?php echo $this->registros->nome; ?>" src="components/com_mecenato/auxiliares/arquivos/<?php echo $this->registros->logo; ?>" />
	</div>
	<?php echo $this->registros->resumo; ?>
	<div class="clear"></div>
</div>
<div class="detalhamento">
	<div class="rokstories-layout2">
		<div class="feature-block">
			<div class="readon-main">
				<a class="readon1-m" href="components/com_mecenato/auxiliares/arquivos/<?php echo $this->registros->arquivoDetalhamento?>">
					<span class="readon1-r">Detalhamento do projeto consolidado.</span>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="patrocinio">
	<a class="readon" href="<?php echo $this->url ?>">
		<span>Patrocinar</span>
	</a>
</div>
