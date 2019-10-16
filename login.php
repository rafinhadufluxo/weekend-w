<?php include "includes/logaRafis.php"?>

    <div class="container">
        <form class="modal-content animate" action="#" method="post">
            <div class="container">
                <br><br> <br> <br><br>
                <label for="Usuario"><b>Usuario</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <br><br> <br> <br><br>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <br><br> <br> <br><br>
                <button id="iniciar" value= "iniciar" type="iniciar">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <a type="button"  href="index.html"
                    class="cancelbtn">Cancel</a>
                <span class="psw">Esqueceu a  <a href="#">senha</a></span>
            </div>
        </form>
    </div>

    

    <!-- fim area central -->

    <!-- rodape -->
    <?php include "includes/rodape.php"; ?>
    <!-- fim rodape -->
    <script src="js/entra.js"></script>

</body>

</html>