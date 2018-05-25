<?php  
	require 'conexao.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$nome = $_POST['nome'];
		$especie = $_POST['especie'];
		$raca = $_POST['raca'];
		$sexo = $_POST['sexo'];
		$porte = $_POST['porte'];
		$cor = $_POST['cor'];
		$tipo = $_POST['tipo'];
		$descricao = $_POST['descricao'];
		$castrado = $_POST['castrado'];
		$idusuario = $_POST['id'];
		$vacinado = $_POST['vacinado'];
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];

		if ($castrado === 'nao') {
			$castrado = 0;
		} else {
			$castrado = 1;
		}

		if ($vacinado === 'nao') {
			$vacinado = 0;
		} else {
			$vacinado = 1;
		}

		if ($sexo === 'macho') {
			$sexo = 1;
		} else {
			$sexo = 2;
		}

		try{
			$stmt = $conn->prepare("INSERT INTO animal (idanimal, especie, raca, sexo, porte, cor, tipo, descricao, nome, castrado, idusuario, vacinado) Values (null,:especie,:raca,:sexo,:porte,:cor,:tipo,:descricao,:nome,:castrado,:idusuario,:vacinado);");
			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':especie', $especie);
			$stmt->bindParam(':raca', $raca);
			$stmt->bindParam(':sexo', $sexo);
			$stmt->bindParam(':porte', $porte);
			$stmt->bindParam(':cor', $cor);
			$stmt->bindParam(':tipo', $tipo);
			$stmt->bindParam(':descricao', $descricao);
			$stmt->bindParam(':castrado', $castrado);
			$stmt->bindParam(':idusuario', $idusuario);
			$stmt->bindParam(':vacinado', $vacinado);
			$stmt->execute();


			$stmt2 = $conn->prepare("INSERT INTO mapa (idmapa, idanimal, latitude, longitude) Values (null,:idanimal, :latitude, :longitude;");
			
			$stmt2->bindParam(':idanimal', $idanimal);
			$stmt2->bindParam(':latitude', $lat);
			$stmt2->bindParam(':longitude', $lng);
			$stmt2->execute();


			$resultado['mensagem'] = "Animal cadastrado com sucesso";
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