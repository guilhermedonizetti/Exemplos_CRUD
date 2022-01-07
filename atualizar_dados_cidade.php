<?php

	include 'conexao_com_pdo.php';

	$cidade    = 'São Paulo';
	$populacao = 12000000;

	try {
		$sql = "UPDATE cidades SET populacao = ? WHERE nome = ?";
		$stmt = $conexao->prepare($sql);

		$stmt->bindParam(1, $populacao, PDO::PARAM_INT);
		$stmt->bindParam(2, $cidade, PDO::PARAM_STR);

		if ($stmt->execute()) {
			echo "Atualizado com sucesso!";
		}
		else {
			echo "Erro ao atualizar registro.";
		}
	}
	catch(PDOException $erro) {
		echo "Erro: " . $erro;
	}

