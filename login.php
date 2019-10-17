<?php include "includes/cabecaSimples.php"; ?>
    <section>
        <div class="container">
            <div class="shadow">
                <div class="container">
                    <form class="modal-content animate" action="#" method="post">
                        <div class="container">
                            <label for="Usuario"><b>Usuario</b></label>
                            <input type="text" placeholder="Enter Username" name="uname" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required>

                            <button id="iniciar" value="iniciar" type="iniciar">Login</button>
                            <label>
                                <input type="checkbox" checked="checked" name="remember"> Remember me
                            </label>
                        </div>

                        <div class="container" style="background-color:#f1f1f1">
                            <a type="button" href="index.php" class="cancelbtn">Cancel</a>
                            <span class="psw">Esqueceu a <a href="#">senha</a></span>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section>


    

    <!-- rodape -->
    <?php include "includes/rodape.php"; ?>
    <!-- fim rodape -->
    <script src="js/entra.js"></script>

</body>

</html>