<h2><?php echo $titulo; ?></h2>
<br>
<form action="" method="post" id="form-cadastro" enctype="multipart/form-data">
	<div>
		<fieldset>
			<legend><strong>Dados do Evento</strong></legend>
			<div class="form-item">
				<label for="nome" class="rotulo">Nome:</label>
				<input type="text" id="nome" name="nome" size="50" required autofocus>								
			</div>

			<div class="form-item">
				<label for="fabricante" class="rotulo">Fornecedor:</label>
				<select name="idFabricante" id="fabricante">
					<option value="0">Não informado</option>
					<?php
					$fabr = new Fabricante();
					$lista = $fabr->listarTodos();
					foreach($lista as $f)
						echo "<option value = \"{$f['id']}\">{$f['nome']}</option>";										
					?>						
				</select>
			</div>
			
			<div class="form-item">
				<label for="desc" class="rotulo">Local:</label>
				<textarea name="LocalEvento" rows="5" cols="30" id="LocalEvento"></textarea>
			</div>
			<div class="form-item">
				<label for="valor" class="rotulo">Data:</label>
				<input name="dataEvento" id="dataEvento" type="date">
			</div>
			<div class="form-item">
				<label for="desc" class="rotulo">Descrição:</label>
				<textarea name="descricao" rows="5" cols="30" id="desc"></textarea>
			</div>
								
		</fieldset>
		<fieldset>
			<legend><strong>Dados da venda</strong></legend>
			<div class="form-item">
				<label for="quantidade" class="rotulo">Quantidade Disponível:</label>
				<input type="number" id="quantidade" name="quantidade" value="1" min="1">
			</div>
			<div class="form-item">
				<label for="valor" class="rotulo">Valor unitário:</label>
				<input type="text" id="valor" name="valor" placeholder="0.00" required onkeyup="formataPreco(this)">
			</div>
			
			<div class="form-item">						
				<label class="rotulo">Total (R$):</label>
				<span id="total"style="font-weight:600;"><strong>0.00</strong></span>
			</div>
			<div class="form-item">
				<label class="rotulo"></label>
				<input type="submit" id="botao" value="Cadastrar" name="cadastrar">
				<input type="reset" value="Limpar">
			</div>						
		</fieldset>
	</div>
</form>
<script src="../js/altera-evento.js" type="text/javascript"></script>