<?php
require_once("BD.php");

class Fabricante{
    private $conexao;

    function __construct(){
        $this->conexao = new BD();
    }

    function listarTodos(){
        $sql = "SELECT * FROM fabricante ORDER BY nome";
        $result = $this -> conexao-> select($sql);
        return $result;
    }
}
?>