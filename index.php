<?php

	include("top.php");

?>

			<div class="main-content">
				<div class="main-content-inner">

					<div class="page-content">
						<div class="page-header">
							<h1>
								Criar um novo Evento com Lista de Presença Eletrônica
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Preencha os dados abaixo e clique em 'Cadastrar'
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
									A reunião foi cadastrada. Aguarde a geração do QR Code.
									<br />
								</div>
						
								<div class="widget-box">
									<div class="widget-header">
										<h5 class="widget-title">Informações do evento/reunião</h5>
									</div>
									<div class="widget-body">
										<form class="from-horizontal" role="form" name="cadastro_reuniao" method="post" action="javascript:func()">
											<div class="widget-main padding-8">									
												<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<label>Título:</label><br/>
															<input class="col-xs-12" type="text" id="nome_reuniao" name="nome_reuniao" tabindex="1" autofocus />
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>Local:</label><br/>
															<input class="col-xs-12" type="text" id="local" name="local" tabindex="2" />
														</div>
													</div>
												</div>
												<br/>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label>Data:</label><br/>
															<input class="col-xs-12 input-mask-date" type="text" id="data_reuniao" name="data_reuniao" value="<?php echo date('d/m/Y'); ?>" tabindex="3" />
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>Hora Início:</label><br/>
															<input class="col-xs-12 input-mask-time" type="text" id="hora_inicio" name="hora_inicio" tabindex="4" />
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>Hora Término:</label><br/>
															<input class="col-xs-12 input-mask-time" type="text" id="hora_termino" name="hora_termino" tabindex="5" />
														</div>
													</div>
												</div>
												<br/>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Nome do Organizador:</label><br/>
															<input class="col-xs-12" type="text" id="organizador" name="organizador" tabindex="6" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>E-mail do Organizador:</label><br/>
															<input class="col-xs-12" type="text" id="email" name="email" tabindex="7" />
														</div>
													</div>
												</div>
												<br/>
												<div class="widget-tools clearfix">
													<button id="cadastrar" class="btn btn-block btn-success" tabindex="8">Cadastrar</button>
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

<?php

	include("bottom.php");

?>
