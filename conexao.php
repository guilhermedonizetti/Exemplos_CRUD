<?php

// Criar variavel de conexao com o BD

class ConexaoBD
{

	function __construct()
	{
		$this->db_name  = "atividades";
		$this->user 	  = "root";
		$this->password = "";
	}

	public function conectarBanco()
	{
		try {
			$conexao = new PDO("mysql:host=localhost;dbname=".$this->db_name, $this->user, $this->password);
		}
		catch(Exception $e) {
			$conexao = false;
		}

		return $conexao;
	}
}
