<?php 
require_once ("BD.php");
class Cliente
{
    private $conexao;
    function __construct() {
        $this->conexao = new BD();
    }    
    
    function autenticar($usuario) {
        $sql = "SELECT * FROM `cliente` WHERE login = '$usuario' or email = '$usuario'";
        $stmt = $this->conexao->query($sql);
        return $stmt;
    }
}
?>
