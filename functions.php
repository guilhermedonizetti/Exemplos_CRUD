<?php
// CLASSE DE USUARIO

include 'messages.php';
include 'conexao.php';

class Usuario
{

	function __construct()
	{
		$connect = new ConexaoBD();
		$this->conn = $connect->conectarBanco();
	}

	// Cadastrar usuario
	public function cadastrarUsuario($login, $senha)
	{

		if ($this->validarDados([$login, $senha]) == false) return "Preencha todos os dados.";

		$tms_cadastro = date('Y-m-d H:i:s');

		try {
			$sql = "INSERT INTO usuario(login, senha, tms_cadastro) VALUES(?,?,?)";
			$stmt = $this->conn->prepare($sql);

			$stmt->bindParam(1, $login);
			$stmt->bindParam(2, $senha);
			$stmt->bindParam(3, $tms_cadastro);

			if($stmt->execute()) {
				return M001;
			}
			else {
				return M002;
			}
		}
		catch (PDOException $e) {
			echo "Erro: " . $e;
		}
	}

	// Atualizar usuario
	public function atualizarUsuario($login, $senha, $id)
	{
		if ([$login, $senha, $id] == false) return "Informe todos os dados.";

		$tms_atualizacao = date("Y-m-d H:i:s");

		try {
			$sql = "UPDATE usuario SET login = ?, senha = ?, tms_atualizacao = ? WHERE id = ?";
			$stmt = $this->conn->prepare($sql);

			$stmt->bindParam(1, $login);
			$stmt->bindParam(2, $senha);
			$stmt->bindParam(3, $tms_atualizacao);
			$stmt->bindParam(4, $id);

			if($stmt->execute())
			{
				return M003;
			}
			else {
				return M004;
			}
		}
		catch (PDOException $e) {
			return "Erro: " . $e;
		}
	}

	// Consultar usuario
	public function consultarUsuario($id)
	{
		if ($this->validarDados([$id]) == false) return "Informe o ID do usuário.";

		try {
			$sql = "SELECT * FROM usuario WHERE id = ?";
			$stmt = $this->conn->prepare($sql);

			$stmt->bindParam(1, $id);

			if($stmt->execute()) {

				if ($stmt->rowCount() == 0) return M007;

				$r = $stmt->fetch();

				$resultado_consulta = "Login: " . $r['login'] . "\nSenha: " . $r['senha'] . "\n";
				$resultado_consulta .= "Registrado: " . $r['tms_cadastro'] . " - última atualização: " . $r['tms_atualizacao'];

				return $resultado_consulta;
			}
			else {
				return M005;
			}
		}
		catch (PDOException $e) {
			return "Erro: " . $e;
		}
	}

	// Deletar usuario
	public function deletarUsuario($id)
	{
		if ($this->validarDados([$id]) == false) return "Informe o ID do usuário.";

		try {
			$sql = "DELETE FROM usuario WHERE id = ?";
			$stmt = $this->conn->prepare($sql);

			$stmt->bindParam(1, $id);

			if($stmt->execute()) {
				return M006;
			}
			else {
				return M007;
			}
		}
		catch (PDOException $e) {
			return "Erro: " . $e;
		}
	}

	// Verificar se dado(s) esta NULL ou VAZIO
	public function validarDados($dados)
	{
		for ($i = 0; $i < count($dados); $i++) {
			if (is_null($dados[$i]) || $dados[$i] == "") return false;
		}

		return true;
	}

}