<?php 
	session_start();
	require 'conexao.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];

		try{

			if($nome == $_SESSION['nome'] && $email == $_SESSION['email'] && $telefone == $_SESSION['telefone']){
				$resultado['deucerto'] = 3; // ERRO! Dados iguais, sem alteração!
			} else { 
				if($nome && $email != ''){

					$stmt = $conn->prepare("UPDATE usuario SET nome = :nome, email = :email, telefone = :telefone WHERE idusuario = :id");
					$stmt->bindParam(':id', $id);
					$stmt->bindParam(':nome', $nome);
					$stmt->bindParam(':email', $email);
					$stmt->bindParam(':telefone', $telefone);
					// $stmt->bindParam(':senha', $senha);
					$stmt->execute();
					$resultado['mensagem'] = "Perfil editado com sucesso";
					$resultado['deucerto'] = 1;
					$_SESSION['nome'] = $nome;
					$_SESSION['email'] = $email;
					$_SESSION['telefone'] = $telefone;

				} else {
					$resultado['deucerto'] = 2; // Dados vazios!
				}
			}

			echo json_encode($resultado);
			
		}catch(PDOException $e){
			$resultado['mensagem'] = "Opsss... Parece que o servidor não está bem!";
			$resultado['error'] = $e->getMessage();
			$resultado['deucerto'] = 0;
			echo json_encode($resultado);
		}
	}

?>