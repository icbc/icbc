<?php defined("_JEXEC") or die("Acesso Restrito") ?>
<div id="com_simule">
	<div class="chave">
		<label for="campo1">Campo:</label>
	</div>
	<div class="campo">
		<input type="text" class="inputbox maior" name="campo1" id="campo1" maxlenght="150" value="<?php $this->registro->campo; ?>" />
	</div>
	<br />
	<div class="chave">
		<label for="campo2">Campo:</label>
	</div>
	<div class="campo">
		<input type="text" class="inputbox medio" name="campo2" id="campo2" maxlenght="150" value="<?php $this->registro->campo; ?>" />
	</div>
	<br />
	<div class="chave">
		<label for="campo3">Campo:</label>
	</div>
	<div class="campo">
		<input type="text" class="inputbox menor" name="campo3" id="campo3" maxlenght="150" value="<?php $this->registro->campo; ?>" />
	</div>
	<br />
</div>