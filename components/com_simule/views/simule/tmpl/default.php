<?php
defined("_JEXEC") or die("Acesso Restrito");
$action = JRoute::_("index.php?option=com_simule");
?>
<div id="com_simule">
	<form action="<?php echo $action ?>" name="form" id="form-simule" >
		<div class="chave">
			<label for="imposto">Imposto:</label>
		</div>
		<div class="campo">
			<input type="text" class="medio" id="imposto" name="imposto" maxlenght="150" value="<?php $this->registro->imposto; ?>" />
		</div>
		<br />
		<div class="chave">
			<label for="campo2">Tipo de pessoa:</label>
		</div>
		<div class="campo" id="tipoPessoa">
			<?php echo $this->pessoa ?>
		</div>
		<br />
		<div class="chave">
			<label for="doacao">CSLL:</label>
		</div>
		<div class="campo" id="csll">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Doação:</label>
		</div>
		<div class="campo" id="doacao">
			<input type="text" class="medio" id="doacao" name="doacao" maxlenght="150" value="<?php $this->registro->doacao; ?>" />
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Lucro Real:</label>
		</div>
		<div class="campo" id="lucroReal">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Imposto de Renda:</label>
		</div>
		<div class="campo" id="impostoRenda">
			
		</div>
		<br />
		<div class="chave" id="adicional">
			<label for="doacao">Adicional de 10%:</label>
		</div>
		<div class="campo">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Lei Rouanet - Dedução imposto de Renda:</label>
		</div>
		<div class="campo" id="deducao">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Imposto de Renda a Pagar:</label>
		</div>
		<div class="campo" id="impostoRendaPagar">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Total dos impostos:</label>
		</div>
		<div class="campo" id="totalImposto">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Lucro líquido:</label>
		</div>
		<div class="campo" id="lucroLiquido">
			
		</div>
		<br />
		<div class="botoes">
			<button name="task" valeu="simula">Simule</button>
		</div>
	</form>
</div>