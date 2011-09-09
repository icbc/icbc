<?php
defined("_JEXEC") or die("Acesso Restrito");
?>
<div id="com_simule">
	<form action="index.php?option=com_simule" method="post" name="form" id="form-simule" >
		<div class="chave">
			<label for="imposto">Lucro Real:</label>
		</div>
		<div class="campo">
			<input type="text" class="medio" id="lucroReal" name="lucroReal" maxlenght="150" value="" onblur="verificaValor(); float2moeda(this.value)" />
		</div>
		<br />
		<div class="chave">
			<label for="campo2">Tipo de pessoa:</label>
		</div>
		<div class="campo" id="tipo">
			<?php echo $this->pessoa ?>
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Patrocínio sugerido:</label>
		</div>
		<div class="campo" id="campoPodeDoar">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">CSLL:</label>
		</div>
		<div class="campo" id="campoCsll">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Patrocínio:</label>
		</div>
		<div class="campo" id="doacao">
			<input type="text" class="medio" id="patrocinio" name="patrocinio" maxlenght="150" value="" />
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Imposto de Renda:</label>
		</div>
		<div class="campo" id="campoIR">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Adicional de 10%:</label>
		</div>
		<div class="campo" id="campoAddIR">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Lei Rouanet - Dedução imposto de Renda:</label>
		</div>
		<div class="campo" id="campoDeducao">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Imposto de Renda a Pagar:</label>
		</div>
		<div class="campo" id="campoIRPagar">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Total dos impostos:</label>
		</div>
		<div class="campo" id="campoTotalImposto">
			
		</div>
		<br />
		<div class="chave">
			<label for="doacao">Lucro líquido:</label>
		</div>
		<div class="campo" id="campoLucroLiquido">
			
		</div>
		<br />
		<div class="botoes">
			<button type="button" name="task" valeu="simule" id="simule" onclick="simula()">Simule</button>
		</div>
		<input type="hidden" id="csll" name="csll" />
		<input type="hidden" id="lucroReal" name="lucroReal" />
		<input type="hidden" id="ImpostoRenda" name="ImpostoRenda" />
		<input type="hidden" id="adicionalImpostoRenda" name="adicionalImpostoRenda" />
		<input type="hidden" id="deducaoRuanet" name="deducaoRuanet" />
		<input type="hidden" id="impostoRendaAPagar" name="impostoRendaAPagar" />
		<input type="hidden" id="totalImpostos" name="totalImpostos" />
		<input type="hidden" id="lucroLiquido" name="lucroLiquido" />
	</form>
</div>