<?php
	session_start();
	require "conexao.php";
	if(isset($_SESSION['id'])) {   
	          
    	$id = $_SESSION['id'];
    	$nome = $_SESSION['nome'];
    	$iddepo = $_POST['id'];

		try{
			$stmt = $conn->prepare("DELETE FROM depoimentos WHERE id = :iddepo and iduser = :iduser;");
			$stmt->bindParam(':iddepo', $iddepo);
			$stmt->bindParam(':iduser', $id);
			$stmt->execute(); 
			if($stmt->rowCount()){
				$resultado['deucerto'] = 1;
			} else{
				$resultado['deucerto'] = 0;
				$resultado['mensagem'] = "Opsss... nenhum registro encontrado!";
				$resultado['erro'] = "Opsss... nenhum registro encontrado!";
			}
			echo json_encode($resultado);
		}catch(PDOException $e){
			$resultado['mensagem'] = "Opsss... Parece que o servidor não está bem!";
			$resultado['erro'] = $e->getMessage();
			$resultado['deucerto'] = 0;
			echo json_encode($resultado);
		}
	} else {
		$resultado['deucerto'] = 0;
		$resultado['mensagem'] = "Confirme sua identidade antes de apagar um depoimento.";
		$resultado['erro'] = "Confirme sua identidade antes de apagar um depoimento.";
		echo json_encode($resultado);
	}
	  
?>