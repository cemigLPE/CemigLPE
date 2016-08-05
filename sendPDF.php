<?php

	include("conector.php");

	//Primeiro, adicionamos a biblioteca do MPDF
	require_once 'mpdf60/mpdf.php';

	//Capturamos o id da reunião
	$idReuniao = $_GET['idReuniao'];

	//Busca os dados no banco
	$rowReuniao = mysql_fetch_assoc(mysql_query("SELECT * FROM REUNIAO WHERE id_reuniao = $idReuniao"));
	$result = mysql_query("SELECT * FROM LISTA WHERE id_reuniao = $idReuniao");

	$aux = "<tr><td style='background-color:white;font-size:12px;'>X</td><td style='background-color:white;font-size:12px;'>X</td><td style='background-color:white;font-size:12px;'>X</td><td style='background-color:white;font-size:12px;'>X</td><td style='background-color:white;font-size:12px;'>X</td></tr>";
	$participantes = "";

	while($row = mysql_fetch_assoc($result))
	{
		$aux = explode(" ", $row['checkin']);
		$checkin = implode("/", array_reverse(explode("-", $aux[0]))) . " " . $aux[1];

		$participantes .= "<tr><td align='center' style='background-color:white;font-size:10px;'>" . $row['nome_completo'] . "</td><td align='center' style='background-color:white;font-size:10px;'>" . $row['empresa'] . "</td><td align='center' style='background-color:white;font-size:10px;'>" . $row['matricula'] . "</td><td align='center' style='background-color:white;font-size:10px;'>" . $row['funcao'] . "</td><td align='center' style='background-color:white;font-size:10px;'>" . $checkin . "</td></tr>";
	}

	//HTML do PDF
	$HTMLBody = "<html><head><meta charset='utf-8'></head><body><h3 align='center'>Lista de Presença eletrônica</h3><p style='font-size:14px'><strong>Evento/Reunião: </strong>" . $rowReuniao['nome_reuniao'] . "</p><p style='font-size:14px'><strong>Local: </strong>" . $rowReuniao['local'] . "</p><p style='font-size:14px'><strong>Data/Hora: </strong>" . implode("/", array_reverse(explode("-", $rowReuniao['data_reuniao']))) . ", de " . $rowReuniao['hora_inicio'] . " as " . $rowReuniao['hora_termino'] . "</p><p style='font-size:14px'><strong>Organizado Por: </strong>" . $rowReuniao['organizador'] . " (" . $rowReuniao['email'] . ")</p><br/><p style='font-size:14px'>Confirmaram presença por QR Code os seguintes participantes:</p><table style='border:1px solid black; width: 100%; background-color: black; overflow: wrap;'><tr><th style='width:30%;color:white;font-size:12px;'>Nome</th><th style='width:25%;color:white;font-size:12px;'>Empresa/Departamento</th><th style='width:10%;color:white;font-size:12px;'>Matrícula</th><th style='width:20%;color:white;font-size:12px;'>Cargo/Função</th><th style='width:15%;color:white;font-size:12px;'>Checkin</th></tr>$participantes</table><p style='font-size:10px'><strong>Importante: </strong>Esse software de controle de presença encontra-se em desenvolvimento e não há garantias de seu funcionamento. Recomendamos o uso de controle físico de presença (em papel) até que a solução seja adequadamente homologada e aprovada pela superintendência de TI.</p></body></html>";

	//Cria e manda o arquivo PDF para download
	$mpdf = new mPDF();
	$mpdf->WriteHTML($HTMLBody);
	//$mpdf->Output(utf8_decode($rowReuniao['NOME_REUNIAO']) . ".pdf", "D");
	$mpdf->Output();

?>