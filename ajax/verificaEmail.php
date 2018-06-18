<?php 
	session_start();
    require_once 'conexao.php';
    $emailpost = $_POST['email'];

    try{
	    $sql = "SELECT email FROM usuario WHERE email = '$emailpost'";
	    $consulta = $conn->query($sql);
	    $email = $consulta->fetch(PDO::FETCH_ASSOC);
	    if($emailpost != $_SESSION['email'] && $email == TRUE) {
	    	$resultado['valido'] = 0;
	    } else {
	    	$resultado['valido'] = 1;
	    }
	    echo json_encode($resultado);
	}catch(PDOException $e){
			$resultado['mensagem'] = "Opsss... Parece que o servidor não está bem!";
			$resultado['error'] = $e->getMessage();
			$resultado['deucerto'] = 0;
			echo json_encode($resultado);
		}

?>