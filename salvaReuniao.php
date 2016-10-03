<?php

	include("conector.php");

	//Pegamos as variaveis
	$nomeReuniao = $_POST['nomeReuniao'];
	$dataReuniao = implode("-", array_reverse(explode("/", $_POST['dataReuniao'])));
	$horaInicio = $_POST['horaInicio'];
	$horaTermino = $_POST['horaTermino'];
	$organizador = $_POST['organizador'];
	$email = $_POST['email'];

	//Validação dos campos
	if($nomeReuniao == "")
	{
		echo "1|Informe um título para a reunião.";
		exit;
	}
	else if($dataReuniao == "")
	{
		echo "1|Informe a data da reunião.";
		exit;
	}
	else if($horaInicio == "")
	{
		echo "1|Informe o horário de inicio da reunião.";
		exit;
	}
	else if($horaTermino == "")
	{
		echo "1|Informe o horário de término da reunião.";
		exit;
	}
	else if($organizador == "")
	{
		echo "1|Informe o nome do organizador da reunião.";
		exit;
	}
	else if($email == "")
	{
		echo "1|Informe o e-mail do organizador da reunião.";
		exit;
	}
	else
	{
		//Inserimos no banco
		$result = mysql_query("INSERT INTO REUNIAO (nome_reuniao, data_reuniao, hora_inicio, hora_termino, organizador, email) VALUES ('$nomeReuniao', '$dataReuniao', '$horaInicio', '$horaTermino', '$organizador', '$email')");
		if(!$result)
		{
			echo "1|" . mysql_error();
			exit;
		}

		//Pega o ID da reuniao
		$result = mysql_query("SELECT id_reuniao FROM REUNIAO WHERE nome_reuniao = '$nomeReuniao' AND data_reuniao = '$dataReuniao'");
		if(!$result)
		{
			echo "1|" . mysql_error();
			exit;
		}
		$row = mysql_fetch_assoc($result);
		$idReuniao = $row['id_reuniao'];

		//Insere o caminho do QR Code no banco
		$qrCode = "qr_" . $idReuniao . ".png";
		$result = mysql_query("UPDATE REUNIAO SET qr_code = '$qrCode' WHERE id_reuniao = $idReuniao");
		if(!$result)
		{
			echo "1|" . mysql_error();
			exit;
		}

		echo "0|" . $idReuniao;
	}

	

?>