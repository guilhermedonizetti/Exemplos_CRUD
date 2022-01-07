<?php

	include 'conexao_com_pdo.php';

	$nome = "São Paulo";
	$populacao = 12033000;
	$estado = "SP";

	try {
		$sql = "INSERT INTO cidades(nome, populacao, estado) VALUES(?, ?, ?)";
		$stmt = $conexao->prepare($sql);
		
		$stmt->bindParam(1, $nome, PDO::PARAM_STR);
		$stmt->bindParam(2, $populacao, PDO::PARAM_INT);
		$stmt->bindParam(3, $estado, PDO::PARAM_STR);

		if ($stmt->execute()) {
			echo "Inserido com sucesso!";
		}
		else {
			echo "Falha no salvamento de dados.";
		}
	}
	catch (PDOException $erro) {
		echo "Erro: " . $erro;
	}