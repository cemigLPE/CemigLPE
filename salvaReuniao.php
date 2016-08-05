<?php

	include("conector.php");

	//Pegamos as variaveis
	$nomeReuniao = $_POST['nomeReuniao'];
	$dataReuniao = implode("-", array_reverse(explode("/", $_POST['dataReuniao'])));
	$horaInicio = $_POST['horaInicio'];
	$horaTermino = $_POST['horaTermino'];
	$organizador = $_POST['organizador'];
	$email = $_POST['email'];

	//Inserimos no banco
	$result = mysql_query("INSERT INTO REUNIAO (nome_reuniao, data_reuniao, hora_inicio, hora_termino, organizador, email) VALUES ('$nomeReuniao', '$dataReuniao', '$horaInicio', '$horaTermino', '$organizador', '$email')");
	if(!$result)
	{
		echo "1|" . mysql_error();
		return;
	}

	//Pega o ID da reuniao
	$result = mysql_query("SELECT id_reuniao FROM REUNIAO WHERE nome_reuniao = '$nomeReuniao' AND data_reuniao = '$dataReuniao'");
	if(!$result)
	{
		echo "1|" . mysql_error();
		return;
	}
	$row = mysql_fetch_assoc($result);
	$idReuniao = $row['id_reuniao'];

	//Insere o caminho do QR Code no banco
	$qrCode = "qr_" . $idReuniao . ".png";
	$result = mysql_query("UPDATE REUNIAO SET qr_code = '$qrCode' WHERE id_reuniao = $idReuniao");
	if(!$result)
	{
		echo "1|" . mysql_error();
		return;
	}

	echo "0|" . $idReuniao;

?>