<?php defined("_JEXEC") or die("Acesso Restrito") ?>
<div class="formBusca">
	<form action="<?php echo $this->url["form"];?>" method="post">
		<label for="busca">PRONAC/Nome: </label>
		<input type="text" name="busca" id="busca" />
	</form>
</div>
<!-- adicionar verificador que permitira se um determinado usuário tem acesso ou não a esta área -->
<div class="novoProjeto">
	<a href="<? echo $this->url["novo"]; ?>">
		<img alt="Novo Cadastro" src="components/com_mecenato/auxiliares/imagens/novo.png" />
		<div>
			Novo
		</div>
	</a>
</div>
<div class="clear"></div>
<table class="tabelaProjeto">
	<thead>
		<tr>
			<th width="10%">PRONAC</th>
			<th width="70%">Nome</th>
			<th width="20%">Data publicação DOU</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 0; 
		foreach($this->registros as $obj) : ?>
		<tr class="<?php echo $i%2; ?>">
			<td>
				<a class="linkMecenato" href="<?php echo "{$this->url["link"]}&id={$obj->id}" ?>">
					<?php echo $obj->numPronac; ?>
				</a>
			</td>
			<td>
				<a class="linkMecenato" href="<?php echo "{$this->url["link"]}&id={$obj->id}" ?>">
					<?php echo $obj->nome; ?>
				</a>
			</td>
			<td><?php echo $obj->dataPublicacao; ?></td>
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