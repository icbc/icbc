<?php defined("_JEXEC") or die("Acesso Restrito") ?>
<div class="clear"></div>
<table class="tabelaProjeto">
	<thead>
		<tr>
			<th width="10%">PRONAC</th>
			<th width="30%">Projeto</th>
			<th width="30%">Incentivador</th>
			<th width="20%">Valor doado</th>
			<th width="20%">Data do Recebimento</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 0; 
		foreach($this->registros as $obj) : ?>
		<tr class="<?php echo $i%2; ?>">
			<td><?php echo $obj->pronac; ?>	</td>
			<td><?php echo $obj->projeto; ?></td>
			<td><?php echo $obj->incentivador; ?></td>
			<td><?php echo $obj->valor; ?></td>
			<td><?php echo $obj->dataRecebido; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	<tfoot>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tfoot>
</table>