<?php include "includes/cabecalho.php"; ?>

<div class="container">

	<div class="ItemCadastro">
		<form action="/action_page.php">
			<div class="container">
				<h2>Cadastre-se</h2>
				<hr>
				<label for="nome" class="rotulo">Nome:</label>
				<input type="text"  placeholder="Informe seu nome" id="nome" name="nome" size="50" required autofocus>	

				<label for="email"><b>Email</b></label>
				<input type="text" placeholder="Enter Email" name="email" required autofocus>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw"required autofocus>

				<label for="psw-repeat"><b>Repeat Password</b></label>
				<input type="password" placeholder="Repeat Password" name="psw-repeat" required autofocus>
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

<?php include "includes/rodape.php"; ?>
</body>

</html>