<?php

	include 'conexao_com_pdo.php';

	$estado = "SP";

	try {
		$sql = "SELECT * FROM cidades WHERE estado = ?";
		$stmt = $conexao->prepare($sql);

		$stmt->bindParam(1, $estado);

		if($stmt->execute()) {
			$resultado = $stmt->fetchAll();

			for($i = 0; $i < count($resultado); $i++) {
				echo "Cidade: " . $resultado[$i]['nome'] . " - pop.: " . $resultado[$i]['populacao'] . " habitantes.<br>";
			}
		}
		else {
			echo "Falha na consulta dos dados.";
		}
	}
	catch (PDOException $erro) {
		echo "Erro: " . $erro;
	}