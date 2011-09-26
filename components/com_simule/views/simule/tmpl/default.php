<?php defined("_JEXEC") or die("Acesso Restrito"); ?>
<div id="com_simule">
	<form action="index.php?option=com_simule" method="post" name="form" id="form-simule" >
		<div id="linhaTipoPessoa">
			<div class="chave" id="labelTipoPessoa">
				<label for="labelTipoPessoa">Tipo de pessoa:</label>
			</div>
			<div class="campo" id="tipo">
				<?php echo $this->pessoa ?>
			</div>
			<br />
		</div>
		<div id="linhaValor">
			<div class="chave" id="labelValor">
				<label for="labelValor">Lucro Real:</label>
			</div>
			<div class="campo" id="campoValor">
				<input type="text" class="medio" id="valor" name="valor" maxlenght="150" value="" onblur="verificaValor(); simula('simples');" onfocus="this.select();" onkeypress="return SomenteNumero(event);" />
			</div>
			<br />
		</div>
		<div id="linhaIRPagar">
			<div class="chave" id="labelIRPagar">
				<label for="doacao">IR a Pagar:</label>
			</div>
			<div class="campo" id="campoIRPagar">

			</div>
			<br />
		</div>
		<div id="linhaPatrocinioSugerido">
			<div class="chave" id="labelTipoPessoa">
				<label for="doacao">Patrocínio sugerido:</label>
			</div>
			<div class="campo" id="campoPodeDoar">

			</div>
			<br />
		</div>
		<div id="linhaCsll" style="display: none;">
			<div class="chave" id="labelCsll">
				<label for="doacao">CSLL:</label>
			</div>
			<div class="campo" id="campoCsll">

			</div>
			<br />
		</div>
		<div id="linhaPatrocinio">
			<div class="chave" id="labePatrocinio">
				<label for="doacao">Patrocínio:</label>
			</div>
			<div class="campo" id="campoPatrocinio">
				<input type="text" class="medio" id="patrocinio" name="patrocinio" maxlenght="150" value="" onblur="simula('simples');" onkeypress="return SomenteNumero(event);" />
			</div>
			<br />
		</div>
		<div id="linhaIR"  style="display: none;">
			<div class="chave" id="labelIR">
				<label for="doacao">Imposto de Renda:</label>
			</div>
			<div class="campo" id="campoIR">

			</div>
			<br />
		</div>
		<div id="linhaAddIR"  style="display: none;">
			<div class="chave" id="labelAddIR">
				<label for="doacao">Adicional de 10%:</label>
			</div>
			<div class="campo" id="campoAddIR">

			</div>
			<br />
		</div>
		<div id="linhaDeducao">
			<div class="chave" id="labelTipoPessoa">
				<label for="doacao">Lei Rouanet - Dedução:</label>
			</div>
			<div class="campo" id="campoDeducao">

			</div>
			<br />
		</div>
		<div id="linhaTotalImposto">
			<div class="chave" id="labelTotalImposto">
				<label for="doacao">Total dos impostos:</label>
			</div>
			<div class="campo" id="campoTotalImposto">

			</div>
			<br />
		</div>
		<div id="linhaLucroLiquido" style="display: none;">
			<div class="chave" id="labelTipoPessoa">
				<label for="doacao">Lucro líquido:</label>
			</div>
			<div class="campo" id="campoLucroLiquido">

			</div>
			<br />
		</div>
		<div class="botoes" id="botoes">
			<button type="button" name="task" valeu="simuleSimples" id="simuleSimples" onclick="simula('simples'); verificaValor();">Simule</button>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="button" name="task" valeu="simuleCompleta" id="simuleCompleta" onclick="simula('completa'); verificaValor();">Detalhada</button>
		</div>
		<input type="hidden" id="csll" name="csll" />
		<input type="hidden" id="valor" name="valor" />
		<input type="hidden" id="ImpostoRenda" name="ImpostoRenda" />
		<input type="hidden" id="adicionalImpostoRenda" name="adicionalImpostoRenda" />
		<input type="hidden" id="deducaoRuanet" name="deducaoRuanet" />
		<input type="hidden" id="impostoRendaAPagar" name="impostoRendaAPagar" />
		<input type="hidden" id="totalImpostos" name="totalImpostos" />
		<input type="hidden" id="lucroLiquido" name="lucroLiquido" />
	</form>
</div>