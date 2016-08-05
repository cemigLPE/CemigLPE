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

	//Pega os dados da reuniao
	$result = mysql_query("SELECT * FROM REUNIAO WHERE id_reuniao = $idReuniao");
	$row = mysql_fetch_assoc($result);

?>

			<div class="main-content">
				<div class="main-content-inner">

					<div class="page-content">
						<div class="page-header">
							<h1>
								Lista de Presença
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Preencha os dados abaixo e clique em 'Assinar Lista'
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">		
								
								<div class="alert alert-danger" id="alert_error" style="display:none">
									<strong>
										<i class="ace-icon fa fa-times"></i>
										Erro!
									</strong>
									<div class="mensagem_erro"></div>
									<br />
								</div>

								<div class="alert alert-success" id="alert_success" style="display:none">
									<strong>
										<i class="ace-icon fa fa-check"></i>
										Sucesso!
									</strong>
									Seu registro foi adicionado à lista de presença.
									<br />
								</div>
						
								<div class="widget-box">
									<div class="widget-header">
										<h5 class="widget-title">Dados da Reunião</h5>
									</div>
									<div class="widget-body">
										<form class="from-horizontal" role="form" name="cadastro_reuniao" method="post" action="javascript:func()">
											<input type="hidden" id="id_reuniao" name="id_reuniao" value="<?php echo $row['id_reuniao']; ?>" />
											<input type="hidden" id="checkin" name="checkin" value="<?php echo date('Y-m-d H:i:s'); ?>" />
											<div class="widget-main padding-8">									
												<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<label>Nome Reunião:</label><br/>
															<input class="col-xs-12" type="text" id="nome_reuniao" name="nome_reuniao" value="<?php echo $row['nome_reuniao']; ?>" readonly />
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>Local:</label><br/>
															<input class="col-xs-12" type="text" id="local" name="local" value="<?php echo $row['local']; ?>" readonly />
														</div>
													</div>
												</div>
												<br/><br/>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label>Data:</label><br/>
															<input class="col-xs-12 input-mask-date" type="text" id="data_reuniao" name="data_reuniao" value="<?php echo implode("", array_reverse(explode("-", $row['data_reuniao']))); ?>" readonly />
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>Hora Início:</label><br/>
															<input class="col-xs-12 input-mask-time" type="text" id="hora_inicio" name="hora_inicio" value="<?php echo $row['hora_inicio']; ?>" readonly />
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>Hora Término:</label><br/>
															<input class="col-xs-12 input-mask-time" type="text" id="hora_termino" name="hora_termino" value="<?php echo $row['hora_termino']; ?>" readonly />
														</div>
													</div>
												</div>
												<br/><br/>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Organizador:</label><br/>
															<input class="col-xs-12" type="text" id="organizador" name="organizador" value="<?php echo $row['organizador']; ?>" readonly />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>E-mail:</label><br/>
															<input class="col-xs-12" type="text" id="email" name="email" value="<?php echo $row['email']; ?>" readonly />
														</div>
													</div>
												</div>
												<br/><br/>
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label>Matrícula:</label><br/>
															<input class="col-xs-12" type="text" id="matricula" name="matricula" />
														</div>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<label>Nome Completo:</label><br/>
															<input class="col-xs-12" type="text" id="nome_completo" name="nome_completo" />
														</div>
													</div>
												</div>
												<br/><br/>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label>Função:</label><br/>
															<input class="col-xs-12" type="text" id="funcao" name="funcao" />
														</div>
													</div>
													<div class="col-md-8">
														<div class="form-group">
															<label>Empresa:</label><br/>
															<input class="col-xs-12" type="text" id="empresa" name="empresa" />
														</div>
													</div>
												</div>
												<br/><br/>
												<div class="widget-tools clearfix">
													<button id="assinar_lista" class="btn btn-block btn-success">Assinar Lista</button>
												</div>
												
											</div>
										</form>							
									</div>							
								</div>					
							</div>
							<div class="col-md-1"></div>
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
