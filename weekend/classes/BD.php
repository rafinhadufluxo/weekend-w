<?php
class BD {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "weekend";
	private $conexao;

	function __construct(){
		$this->conexao = new PDO("mysql:host=".$this->host.";dbname=" . $this->database, $this->user, $this->password);
	}

	function select($sql){
	
		$stmt = $this->conexao->query($sql);

		return $stmt->fetchAll();
	}

	function query($sql){
		return $this->conexao->query($sql);
	}

	function erro(){

		return mysqli_error($this->conexao->query($sql));
		//print_r($this);
	}
}
?>