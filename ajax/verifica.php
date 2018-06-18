<?php
 	session_start();
	require_once 'conexao.php';
 	$email = $_POST['email'];
 	$senha = sha1($_POST['senha']);

     
	$sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
      $consulta = $conn->query($sql);
      $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
      //pr($usuario);
      if ($usuario == TRUE) {
        $_SESSION['id'] = $usuario['idusuario'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['img'] = $usuario['img'];
        $_SESSION['telefone'] = $usuario['telefone'];
        $_SESSION['email'] = $usuario['email'];
        $resultado['login'] = 1;
        echo json_encode($resultado);
      }else {
        $resultado['login'] = 0;
        echo json_encode($resultado);
      }

 ?>