<?php defined("_JEXEC") or die("Acesso Restrito") ?>
<div class="clear"></div>
<table class="tabelaProjeto" width="100%">
	<thead>
		<tr>
			<th width="10%">PRONAC</th>
			<th width="30%">Projeto</th>
			<th width="20%">Valor arrecadado</th>
			<th width="20%">Valor a ser confirmado</th>
			<th width="20%">Total previsto</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 0; 
		foreach($this->registros as $obj) : ?>
		<tr class="row<?php echo $i%2; ?>">
			<td class="centro">
				<a href="<?php echo $this->url."&id=".$obj->idProjeto ?>" >
					<?php echo $obj->pronac; ?>
				</a>
			</td>
			<td class="esquerda">
				<a href="<?php echo $this->url."&id=".$obj->idProjeto ?>" >
					<?php echo $obj->projeto; ?>
				</a>
			</td>
			<td class="centro">
				R$<?php echo number_format($obj->arrecadado, 2,",","."); ?>
			</td>
			<td class="centro">
				R$<?php echo  number_format($obj->aConfirmar, 2,",","."); ?>
			</td>
			<td class="centro">
				R$<?php echo number_format($obj->total, 2, ",", "."); ?>
			</td>
		</tr>
		<?php $i++; endforeach; ?>
	</tbody>
	<tfoot>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tfoot>
</table>