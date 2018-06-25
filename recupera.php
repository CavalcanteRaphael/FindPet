<?php
  session_start();
  require_once 'ajax/conexao.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  $email = $_POST['email'];

  $sql = "SELECT * FROM usuario WHERE email = '$email'";
      $consulta = $conn->query($sql);
      $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
      //pr($usuario);
      if ($usuario == TRUE) {
        $senha = $usuario['senha'];
        $idusuario = $usuario['idusuario'];
        $idunico = uniqid();
        $hash = $senha . $idusuario . $idunico;
        $codigo = md5($hash);
        $_SESSION['codigo'] = $codigo;
        
        $Mailer = new PHPMailer();
        $Mailer->SMTPDebug = 3; //Alternative to above constant
        
        //Define que será usado SMTP
        $Mailer->IsSMTP();
        
        //Enviar e-mail em HTML
        $Mailer->isHTML(true);
        
        //Aceitar carasteres especiais
        $Mailer->Charset = 'UTF-8';
        
        //Configurações
        $Mailer->SMTPAuth = true;
        $Mailer->SMTPSecure = 'tls';
        
        //nome do servidor
        $Mailer->Host = 'smtp.gmail.com';
        //Porta de saida de e-mail 
        $Mailer->Port = 587;
        //Dados do e-mail de saida - autenticação
        $Mailer->Username = 'contatofindpet@gmail.com';
        $Mailer->Password = 'Findpet012345';

        //E-mail remetente (deve ser o mesmo de quem fez a autenticação)
        $Mailer->From = 'contatofindpet@gmail.com';

        //Nome do Remetente
        $Mailer->FromName = 'Contato Findpet';
        
        //Assunto da mensagem
        $Mailer->Subject = 'Recuperação de senha FindPet';
        
        //Corpo da Mensagem
        $Mailer->Body = 'Seu código para recuperação de senha é <b style="color:red;">' . $codigo . '<b>';
        
        //Corpo da mensagem em texto
        $Mailer->AltBody = 'conteudo do E-mail em texto';
        
        //Destinatario 
        $Mailer->AddAddress("$email");
        
        if($Mailer->Send()){
          echo json_encode("E-mail enviado com sucesso");
          header("Location:  confereCodigo.php");
        }else{
          echo json_encode("Erro no envio do e-mail: " . $Mailer->ErrorInfo);
        }
      }else {
        $resultado['existe'] = 0;
        echo json_encode($resultado);
      }

 ?>