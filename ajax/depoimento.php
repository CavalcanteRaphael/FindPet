<?php
    session_start();
    require "conexao.php";
	if(isset($_SESSION['id'])) {             
	    $id = $_SESSION['id'];
	    $nome = $_SESSION['nome'];
	    $texto = $_POST['texto'];

		try{
			$stmt = $conn->prepare("INSERT INTO depoimentos (id,iduser,texto) Values (null,:iduser,:texto);");
			$stmt->bindParam(':iduser', $id);
			$stmt->bindParam(':texto', $texto);
			$stmt->execute();
			$resultado['mensagem'] = "Depoimento cadastrado com sucesso";
			$resultado['deucerto'] = 1;
			$resultado['idcriado'] = $conn->lastInsertId();
			echo json_encode($resultado);
		}catch(PDOException $e){
			$resultado['mensagem'] = "Opsss... Parece que o servidor não está bem!";
			$resultado['erro'] = $e->getMessage();
			$resultado['deucerto'] = 0;
			echo json_encode($resultado);
		}
	} else {
		$resultado['deucerto'] = 0;
		$resultado['mensagem'] = "Você precisa estar logado para deixar um depoimento.";
		$resultado['erro'] = "Você precisa estar logado para deixar um depoimento.";
		echo json_encode($resultado);
	}
  
?>