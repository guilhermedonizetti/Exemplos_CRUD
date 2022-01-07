<?php

	$host 	 = "localhost";
	$banco 	 = "geografia";
	$usuario = "root";
	$senha 	 = "";

	$conexao = new PDO("mysql:host=".$host.";dbname=".$banco, $usuario, $senha);