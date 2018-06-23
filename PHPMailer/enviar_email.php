<?php
	session_start();
	$email = $_POST['emailDestino'];
	$mensagem = $_POST['mensagem'];
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'src/Exception.php';
	require 'src/PHPMailer.php';
	require 'src/SMTP.php';
	
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
	$Mailer->Subject = 'Mensagem de ' .$_SESSION['nome'];
	
	//Corpo da Mensagem
	$Mailer->Body = $mensagem . ' <br />Remetente: ' . $_SESSION['nome'] . '<br /> Email do remetente: ' . $_SESSION['email'] . '<h5 style="color: red;">Esta mensagem foi enviada automaticamente através do site findpet.org, NÃO RESPONDA ESTA MENSAGEM<h5>';
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = 'conteudo do E-mail em texto';
	
	//Destinatario 
	$Mailer->AddAddress("$email");
	
	if($Mailer->Send()){
		echo json_encode("E-mail enviado com sucesso");
	}else{
		echo json_encode("Erro no envio do e-mail: " . $Mailer->ErrorInfo);
	}
	
?>



