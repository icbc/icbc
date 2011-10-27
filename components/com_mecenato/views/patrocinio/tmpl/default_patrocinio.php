<?php defined("_JEXEC") or die("Acesso Restrito"); JHTML::_("behavior.tooltip"); ?>
<div class="clear"></div>
<div style="text-align: center;">
	<?php echo $this->projeto->numPronac; ?> :
	<?php echo $this->projeto->nome; ?>
</div>
<div class="somas">
	<div>
		<div class="campoTitulo">
			Arrecadado: 
		</div>
		<div class="valor">
			R$<?php echo number_format($this->somas->arrecadado, 2, ",", ".") ?>
		</div>
		<div class="clear"></div>
	</div>
	<div>
		<div class="campoTitulo">
			Valor a Confirmar: 
		</div>
		<div class="valor">
			R$<?php echo number_format($this->somas->aConfirmar, 2, ",", ".") ?>
		</div>
		<div class="clear"></div>
	</div>
	<div>
		<div class="campoTitulo">
			Valor total cancelado:  
		</div>
		<div class="valor">
			R$<?php echo number_format($this->somas->cancelado, 2, ",", ".") ?>
		</div>
		<div class="clear"></div>
	</div>
	<div>
		<div class="campoTitulo">
			Arrecadação total prevista: 
		</div>
		<div class="valor">
			R$<?php echo number_format($this->somas->total, 2, ",", ".") ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
<table class="tabelaProjeto">
	<thead>
		<tr>
			<th width="30%">Incentivador</th>
			<th width="10%">Vl. doado</th>
			<th width="15%">Dt. Recebido</th>
			<th width="5%">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 0; 
		foreach($this->registros as $obj) : ?>
		<tr class="row<?php echo $i%2; ?>">
			<td class="esquerda">
				<?php if( $this->user->gid > 20 ): ?>
				<a href="<?php echo $this->url["edita"]."&idPat={$obj->id}" ?>">
				<?php endif; ?>
					<?php echo $obj->incentivador; ?>
				<?php if( $this->user->gid > 20 ): ?>
				</a>
				<?php endif; ?>
			</td>
			<td class="centro">
				R$<?php echo number_format($obj->valor, 2, ",", "."); ?>
			</td>
			<td class="centro"><?php echo $obj->dataRecebido; ?></td>
			<td class="centro">
				<?php
				switch($obj->status){
					case 0:
						$imagem = "aguardando";
						$status = "Aguardadndo confirmação de pagamento";
					break;
					case 1:
						$imagem = "confirmado";
						$status = "Pagamento confirmado";
					break;
					case 2:
						$imagem = "cancelado";
						$status = "Pagamento cancelado";
					break;
					default:
						$imagem = "erro";
					break;
				}
				if($obj->status != 2 && $this->user->gid > 20 ):
				?>
				<a href="<?php echo $this->url["status"]."&idPat={$obj->id}&status={$obj->status}" ?>">
				<?php endif; ?>
				<img class="editlinktip hasTip" title="Status do pagamento::<?php echo $status; ?>" src="components/com_mecenato/auxiliares/imagens/<?php echo $imagem; ?>.png" />
				<?php 
				if($imagem != "cancelamento" && $this->user->gid > 20 ):
				?>
				</a>
				<?php endif; ?>
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