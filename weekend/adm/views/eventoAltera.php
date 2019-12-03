<h2><?php echo $titulo; ?></h2>
<br>
<form action="" method="post" id="form-cadastro" enctype="multipart/form-data">
	<div>
		<fieldset>
			<legend><strong>Dados do Evento</strong></legend>
			<div class="form-item">
				<label for="nome" class="rotulo">Nome:</label>
				<input type="text" id="nome" name="nome" size="50" required autofocus value="<?=$call[0]['nomeEvento']?>">	
			</div>
			<div class="form-item">
				<label for="fabricante" class="rotulo">Fornecedor:</label>
				<select name="idFabricante" id="fabricante">
					<option value="0">Não informado</option>
					<?php
					$fabr = new Fabricante();
					$lista = $fabr->listarTodos();
					foreach($lista as $f)
						if($call[0]['idFabricante'] == $f['id'])
							echo "<option value = \"{$f['id']}\" selected>{$f['nome']}</option>";			
						else
							echo "<option value = \"{$f['id']}\">{$f['nome']}</option>";										
					?>						
				</select>
			</div>
			
			<div class="form-item">	
				<label for="desc" class="rotulo">Local:</label>
				<textarea name="LocalEvento" rows="5" cols="30" id="LocalEvento"><?=$call[0]['LocalEvento']?></textarea>
			</div>
			<div class="form-item">
				<label for="quantidade" class="rotulo">Data:</label>
				<input value = "<?=$call[0]['dataEvento']?>" name="dataEvento" id="dataEvento" type="text">
			</div>
				
			<div class="form-item">
				<label for="desc" class="rotulo">Descrição:</label>
				<textarea name="descricao" rows="5" cols="30" id="desc"><?=$call[0]['descricao']?></textarea>
			</div>			
		</fieldset>
		<fieldset>
			<legend><strong>Dados do ingresso</strong></legend>
			<div class="form-item">
				<label for="quantidade" class="rotulo">Quantidade Disponível:</label>
				<input type="number" id="quantidade" name="quantidade"  value="<?=$call[0]['qtde']?>" min="1">
			</div>
			<div class="form-item">
				<label for="valor" class="rotulo">Valor Unitário:</label>
				<input type="text" id="valor" name="valor" placeholder="0.00" required onkeyup="formataPreco(this)">
			</div>
			<div class="form-item">						
				<label class="rotulo">Total (R$):</label>
				<span id="total" style="font-weight:600;"><strong><?=formataPreco($call[0]['valorFinal']);?></strong></span>
			</div>
			<div class="form-item">
				<label class="rotulo"></label>
				<input type="submit" id="botao" value="Alterar" name="alterar">
				<input type="reset" value="Limpar">
				<input type="hidden" name="idEvento" value="<?=$call[0]['idEvento'];?>">
			</div>						
		</fieldset>
	</div>
</form>
<script src="../js/altera-evento.js" type="text/javascript"></script>