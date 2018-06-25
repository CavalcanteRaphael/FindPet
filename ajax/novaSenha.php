<?php  
	require 'conexao.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$senha = sha1($_POST['senha']);
		$email = $_SESSION['emailRecuperacao'];

		try{
			$stmt = $conn->prepare("UPDATE usuario SET senha = :senha WHERE email = :email;");
			$stmt->bindParam(':senha', $senha);
			$stmt->bindParam(':email', $email);
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