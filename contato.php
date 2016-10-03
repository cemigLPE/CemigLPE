<?php

	include("top.php");

?>

			<div class="main-content">
				<div class="main-content-inner">

					<div class="page-content">
						<div class="page-header">
							<h1>
								Formulário de Contato
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Preencha os dados abaixo e clique em 'Enviar E-Mail'.
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
									Um e-mail foi enviado aos responsáveis. Em breve, você receberá um retorno.
									<br />
								</div>
						
								<div class="widget-box">
									<div class="widget-header">
										<h5 class="widget-title">Dados de Contato</h5>
									</div>
									<div class="widget-body">
										<form class="from-horizontal" role="form" name="formulario_contato" method="post" action="javascript:func()">
											<div class="widget-main padding-8">									
												<div class="row">
													<div class="col-md-7">
														<div class="form-group">
															<label>Seu Nome:</label><br/>
															<input class="col-xs-12" type="text" id="nome_contato" name="nome_contato" />
														</div>
													</div>
													<div class="col-md-5">
														<div class="form-group">
															<label>Seu E-Mail:</label><br/>
															<input class="col-xs-12" type="text" id="email" name="email" />
														</div>
													</div>
												</div>
												<br/>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label>Motivo do Contato:</label><br/>
															<select class="col-xs-12" id="tipo_contato" nome="tipo_contato">
																<option value="#">Selecione...</option>
																<option value="duvida">Dúvidas sobre a Lista de Presença Eletrônica</option>
																<option value="sugestao">Ideias/Sugestões de Melhoria</option>
																<option value="reclamacao">Reclamações/Falhas/Pedidos de Correção</option>																
															</select>
														</div>
													</div>
												</div>
												<br/>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label>Mensagem:</label><br/>
															<textarea class="col-xs-12" id="mensagem" name="mensagem" rows="4" ></textarea>
														</div>
													</div>
												</div>
												<br/>
												<div class="widget-tools clearfix">
													<button id="enviar_email" class="btn btn-block btn-success">Enviar E-Mail</button>
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
