<?php

	include("conector.php");

	//Pegamos as variaveis
	$nomeContato = $_POST['nomeContato'];
	$email = $_POST['email'];
	$tipoContato = $_POST['tipoContato'];
	$mensagem = $_POST['mensagem'];

	//Validação dos campos
	if($nomeContato == "")
	{
		echo "1|Informe o seu nome.";
	}
	else if($tipoContato == "#")
	{
		echo "1|Selecione o motivo do contato.";
	}
	else if($mensagem == "")
	{
		echo "1|Escreva a mensagem.";
	}
	else
	{
		//Determinando o assunto do e-mail
		$assunto = "Presença Eletrônica - ";
		if($tipoContato == "duvida")
		{
			$assunto .= "Dúvidas sobre a Lista de Presença Eletrônica";
		}
		else if($tipoContato == "sugestao")
		{
			$assunto .= "Ideias/Sugestões de Melhoria";
		}
		else if($tipoContato == "reclamacao")
		{
			$assunto .= "Reclamações/Falhas/Pedidos de Correção";
		}

		//Envio de email para o responsavel
		$bodytext = "<p>$mensagem</p>";
		include("PHPMailer-master/PHPMailerAutoload.php");
		$email = new PHPMailer();
		$email->isHTML(true);
		$email->CharSet = 'UTF-8';
		$email->Encoding = 'base64';
		$email->From = $email;
		$email->FromName = $nomeContato;
		$email->Subject = $assunto;
		$email->AddAddress('msj_bh@hotmail.com');
		$email->Body = $bodytext;
		$email->send();
	}


?>