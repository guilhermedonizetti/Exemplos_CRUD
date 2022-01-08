<?php

	include 'conexao_com_pdo.php';

	$estado = "SP";

	try {
		$sql = "DELETE FROM cidades WHERE estado = ?";
		$stmt = $conexao->prepare($sql);

		$stmt->bindParam(1, $estado);

		if($stmt->execute()) {
			if($stmt->rowCount() > 0) {
				echo "Registro(s) apagado(s) com sucesso!";
			}
			else {
				echo "Nenhum registro foi apagado!";
			}
		}
		else {
			echo "Erro ao conectar com banco de dados.";
		}
	}
	catch(PDOException $erro) {
		echo "Erro: " . $erro;
	}