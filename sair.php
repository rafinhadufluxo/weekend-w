<?php
session_start();
session_destroy();
setcookie("nome", false);
setcookie("id", false);
setcookie("endereco", false);
header("Location: index.php");
?>