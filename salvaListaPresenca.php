<?php

	include("conector.php");

	//Pegamos as variaveis
	$idReuniao = $_POST['idReuniao'];
	$checkin = $_POST['checkin'];
	$matricula = $_POST['matricula'];
	$nomeCompleto = $_POST['nomeCompleto'];
	$funcao = $_POST['funcao'];
	$empresa = $_POST['empresa'];

	if($idReuniao == "")
	{
		echo "1|Reunião não encontrada.";
	}
	else if($matricula == "")
	{
		echo "1|Informe o seu número de matrícula ou RG.";
	}
	else if($nomeCompleto == "")
	{
		echo "1|Informe o seu nome completo.";
	}
	else if($funcao == "")
	{
		echo "1|Informe o seu cargo ou função.";
	}
	else if($empresa == "")
	{
		echo "1|Informe o seu departamento ou empresa.";
	}
	else
	{
		//Verfica se a data do checkin esta preenchida e corrige em caso negativo
		if($checkin == "")
		{
			$checkin = date('Y-m-d H:i:s');
		}

		//Inserimos no banco
		$result = mysql_query("INSERT INTO LISTA (id_reuniao, matricula, nome_completo, funcao, empresa, checkin) VALUES ($idReuniao, '$matricula', '$nomeCompleto', '$funcao', '$empresa', '$checkin')");
		if(!$result)
		{
			echo "1|Erro ao assinar a lista de presença: " . mysql_error();
			return;
		}

		echo "0|" . $idReuniao;
	}

?>