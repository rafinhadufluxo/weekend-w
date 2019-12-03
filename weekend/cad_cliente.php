<?php include "includes/cabecalho.php"; ?>


<!-- area central com 3 colunas -->
<div class="container">

	<div class="ItemCadastro">
		<form action="/action_page.php">
			<div class="container">
				<h2>Cadastre-se</h2>
				<hr>

				<label for="email"><b>Email</b></label>
				<input type="text" placeholder="Enter Email" name="email" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<label for="psw-repeat"><b>Repeat Password</b></label>
				<input type="password" placeholder="Repeat Password" name="psw-repeat" required>
				<hr>
				<p>Ao criar uma conta, você concorda com nossa <a href="#">Termos e privacidade</a>.</p><br>
				<input type="checkbox" name="vehicle2" value="Car">Aceito os termos de privacidade

				<button type="submit" class="registerbtn">Register</button>
			</div>

			<div class="container signin">

				<p>Já tem um conta? <a href="login.php">login</a>.</p>
			</div>
		</form>

	</div>

</div>
<!-- fim area central -->
<script src="js/cad_cliente.js"></script>
<?php include "includes/rodape.php"; ?>
</body>

</html>