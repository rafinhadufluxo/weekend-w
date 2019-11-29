<?php 
require_once ("BD.php");
class Cliente
{
    private $conexao;
    function __construct(){
		$this->conexao = new BD("mysql:host=".$this->host.";dbname=" . $this->database, $this->user, $this->password);
    }
    
    function select($sql){
	
		$stmt = $this->conexao->query($sql);

		return $stmt->fetchAll();
	}

	function query($sql){
		return $this->conexao->query($sql);
	}
    
    function autenticar($usuario) {
        $sql = "SELECT * FROM `cliente` WHERE login = '$usuario' or email = '$usuario'";
        $result = $this->conexao->query($sql);
        return $result->fetchAll();
    }
}
?>

