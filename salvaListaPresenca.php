<?php

	include("conector.php");

	//Pegamos as variaveis
	$idReuniao = $_POST['idReuniao'];
	$checkin = $_POST['checkin'];
	$matricula = $_POST['matricula'];
	$nomeCompleto = $_POST['nomeCompleto'];
	$funcao = $_POST['funcao'];
	$empresa = $_POST['empresa'];

	//Inserimos no banco
	$result = mysql_query("INSERT INTO LISTA (id_reuniao, matricula, nome_completo, funcao, empresa, checkin) VALUES ($idReuniao, '$matricula', '$nomeCompleto', '$funcao', '$empresa', '$checkin')");
	if(!$result)
	{
		echo "1|" . mysql_error();
		return;
	}

	echo "0|" . $idReuniao;

?>