<?php  
	require 'conexao.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$senha = sha1($_POST['senha']);

		try{
			$stmt = $conn->prepare("INSERT INTO usuario (idusuario,nome,email,telefone,senha) Values (null,:nome,:email,:telefone, :senha );");
			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':telefone', $telefone);
			$stmt->bindParam(':senha', $senha);
			$stmt->execute();
			$resultado['mensagem'] = "Usuário cadastrado com sucesso";
			$resultado['deucerto'] = 1;
			echo json_encode($resultado);
			
		}catch(PDOException $e){
			$resultado['mensagem'] = "Opsss... Parece que o servidor não está bem!";
			$resultado['error'] = $e->getMessage();
			$resultado['deucerto'] = 0;
			echo json_encode($resultado);
		}
	}

?>