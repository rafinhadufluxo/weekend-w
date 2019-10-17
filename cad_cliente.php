<?php include "includes/cabecaSimples.php"; ?>
    <div class="container">

        <section id="LoginUser" class="col-2">

            <div class="ItemCadastro">
                <form action="/action_page.php">
                    <div class="container">
                        <h2>Cadastre-se</h2>
                        <br><br>
                        <hr>
                        <label for="name-user"><b>user name </b></label>
                        <input type="text" placeholder="user name" name="name" required>

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <label for="psw-repeat"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                        <hr>
                        <br>
                        <p>By creating an account you agree to our <a href="#">Termos e privacidade</a>.</p><br>
                        <input type="checkbox" name="vehicle2" value="Car">Aceito os termos de privacidade

                        <button type="submit" class="registerbtn">Register</button>
                    </div>

                    <div class="container signin">

                        <p>Already have an account? <a href="login.php">Sign in</a>.</p>
                    </div>
                </form>

            </div>
        </section>


    </div>
    <br>
    

    <!-- rodape -->
    <?php include "includes/rodape.php"; ?>
    <!-- fim rodape -->

</body>

</html>