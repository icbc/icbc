<?php defined("_JEXEC") or die("Acesso Restrito"); ?>
<div id="com_simule">
	<form action="index.php?option=com_simule" method="post" name="form" id="form-simule" >
<!--		<div id="linhaTipoPessoa">
			<div class="chave" id="labelTipoPessoa">
				<label for="labelTipoPessoa">Tipo de pessoa:</label>
			</div>
			<div class="campo" id="tipo">
				<?php echo $this->pessoa ?>
			</div>
			<br />
		</div> -->
		<div id="linhaValor">
			<div class="chave" id="labelValor">
				<label for="labelValor">Lucro Operacional:</label>
			</div>
			<div class="campo" id="campoValor">
				<input type="text" class="medio" id="valor" name="valor" maxlenght="150" value="" onblur="verificaValor(); simula('simples');" onfocus="this.select();" onkeypress="return SomenteNumero(event);" />
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
		<div id="linhaPatrocinio">
			<div class="chave" id="labePatrocinio">
				<label for="doacao">Patrocínio:</label>
			</div>
			<div class="campo" id="campoPatrocinio">
				<input type="text" class="medio" id="patrocinio" name="patrocinio" maxlenght="150" value="" onblur="simula('simples');" onkeypress="return SomenteNumero(event);" />
			</div>
			<br />
		</div>
		<div id="linhaDeducao">
			<div class="chave" id="labelTipoPessoa">
				<label for="doacao"> Valor Deduzido:</label>
			</div>
			<div class="campo" id="campoDeducao">

			</div>
			<br />
		</div>
		<div id="linhaNovoValor">
			<div class="chave" id="novoValor">
				<label for="novoLucro">Lucro antes da CSLL e do IR:</label>
			</div>
			<div class="campo" id="campoNovoValor">

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
		<div id="linhaIR"  style="display: none;">
			<div class="chave" id="labelIR">
				<label for="doacao">Imposto de Renda:</label>
			</div>
			<div class="campo" id="campoIR">

			</div>
			<br />
		</div>
		<div id="linhaAdicional"  style="display: none;">
			<div class="chave" id="labelAdicional">
				<label for="doacao">Adicional:</label>
			</div>
			<div class="campo" id="campoAdicional">

			</div>
			<br />
		</div>
		<div id="linhaTct">
			<div class="chave" id="labelTct">
				<label for="doacao">Total da Carga Tributada:</label>
			</div>
			<div class="campo" id="campoTct">

			</div>
			<br />
		</div>
		<div id="linhaLucroLiquido">
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