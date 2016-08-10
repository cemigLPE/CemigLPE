<?php

	include("top.php");
	include("conector.php");

	if(isset($_GET['idReuniao']))
	{
		$idReuniao = $_GET['idReuniao'];
	}
	else
	{
		echo "<script>window.location.href='index.php'</script>";
	}

	//Busca os dados da reunião no banco
	$result = mysql_query("SELECT * FROM REUNIAO WHERE id_reuniao = $idReuniao");
	$row = mysql_fetch_assoc($result);
	$qrCode = $row['qr_code'];
	$endEmail = $row['email'];
	$nomeReuniao = $row['nome_reuniao'];
	$dataReuniao = implode("/", array_reverse(explode("-", $row['data_reuniao'])));
	$horaInicio = $row['hora_inicio'];
	$horaTermino = $row['hora_termino'];
	$organizador = $row['organizador'];

	//Geração do QR Code
	include("phpqrcode/qrlib.php");
	QRCode::png("http://presencaeletronica-lpe.rhcloud.com/assinaListaPresenca.php?idReuniao=" . $idReuniao, "qrCodes/$qrCode", QR_ECLEVEL_H, 4);

	//Envio de email para o usuario
	$bodytext = "<p>Prezado(a) $organizador,</p><p>A reunião entitulada <strong>$nomeReuniao</strong> foi marcada para o dia $dataReuniao, de $horaInicio até $horaTermino.</p><p>Utilize o QR Code em anexo em sua apresentação para que os presentes possam ter acesso à lista de presença.</p><img alt='QRCode' src='cid:qrCode'><p>Atenciosamente,<br/>CEMIG Reuniões.</p>";
	include("PHPMailer-master/PHPMailerAutoload.php");
	$email = new PHPMailer();
	$email->isHTML(true);
	$email->CharSet = 'UTF-8';
	$email->Encoding = 'base64';
	$email->From = 'msj_bh@hotmail.com';
	$email->FromName = 'CEMIG Reuniões';
	$email->Subject = 'Reuniao Agendada - ' . $nomeReuniao;
	$email->AddAddress($endEmail);
	$email->AddAttachment('qrCodes/$qrCode');
	$email->AddEmbeddedImage('qrCodes/$qrCode', 'qrCode', '$qrCode');
	$email->Body = $bodytext;
	$email->send();

?>

			<div class="main-content">
				<div class="main-content-inner">

					<div class="page-content">
						<div class="page-header">
							<h1>
								QR Code
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Clique com o botão direito do mouse sobre o QR Code e selecione a opção 'Salvar Imagem Como...'
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-md-5"></div>
							<div class="col-md-4">		
								<img src="qrCodes/<?php echo $qrCode; ?>" />
							</div>
							<div class="col-md-3"></div>
						</div>

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">TI/SI - CEMIG</span>
							&copy; 2016
						</span>
					</div>
				</div>
			</div>

		</div><!-- /.main-container -->

<?php

	include("bottom.php");

?>
