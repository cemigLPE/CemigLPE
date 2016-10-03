
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							Em caso de dúvidas e/ou sugestões, <a href="contato.php">entre em contato conosco</a>.
						</span>
					</div>
				</div>
			</div>

		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/fuelux.spinner.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>

		<!-- Cookies -->
		<script src="js-cookie-1.5.1/src/js.cookie.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">

			jQuery(function($){

				//Na pagina da lista de presenca, preenche os campos com os cookies, caso existam
				$('#matricula').val(Cookies.get("matricula"));
				$('#nome_completo').val(Cookies.get("nomeCompleto"));
				$('#funcao').val(Cookies.get("funcao"));
				$('#empresa').val(Cookies.get("empresa"));
				//-------------------------------------------------------------------------------

				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-time').mask('99:99');

				$('#cadastrar').click(function(){

					var nomeReuniao = $('#nome_reuniao').val();
					var dataReuniao = $('#data_reuniao').val();
					var horaInicio = $('#hora_inicio').val();
					var horaTermino = $('#hora_termino').val();
					var organizador = $('#organizador').val();
					var email = $('#email').val();

					$.post('salvaReuniao.php', {nomeReuniao: nomeReuniao, dataReuniao: dataReuniao, horaInicio: horaInicio, horaTermino: horaTermino, organizador: organizador, email: email}, function(resposta){

						var partesResposta = resposta.split("|");
						var codResposta = parseInt(partesResposta[0]);

						if(codResposta == 0)
						{
							$('html, body').animate({ scrollTop: 0 }, 'slow');
							$("#alert_success").slideDown("fast").delay(4000).slideUp("slow");
							var t = setTimeout("location.href='qrCode.php?idReuniao="+partesResposta[1]+"'",4000);
						}
						else
						{
							$('html, body').animate({ scrollTop: 0 }, 'slow');
							$("#alert_error").slideDown("fast").delay(4000).slideUp("slow");
							$("#mensagem_erro").html(partesResposta[1]);
						}

					});

				});

				$('#assinar_lista').click(function(){

					var idReuniao = $('#id_reuniao').val();
					var checkin = $('#checkin').val();
					var matricula = $('#matricula').val();
					var nomeCompleto = $('#nome_completo').val();
					var funcao = $('#funcao').val();
					var empresa = $('#empresa').val();

					$.post('salvaListaPresenca.php', {idReuniao: idReuniao, checkin: checkin, matricula: matricula, nomeCompleto: nomeCompleto, funcao: funcao, empresa: empresa}, function(resposta){

						var partesResposta = resposta.split("|");
						var codResposta = parseInt(partesResposta[0]);

						if(codResposta == 0)
						{
							//Salva os cookies para que sejam utilizados posteriormente
							Cookies.set("matricula", matricula, {expires: 30, path: "/"});
							Cookies.set("nomeCompleto", nomeCompleto, {expires: 30, path: "/"});
							Cookies.set("funcao", funcao, {expires: 30, path: "/"});
							Cookies.set("empresa", empresa, {expires: 30, path: "/"});

							$('html, body').animate({ scrollTop: 0 }, 'slow');
							$("#alert_success").slideDown("fast").delay(4000).slideUp("slow");
							var t = setTimeout("window.close()",4000);
						}
						else
						{
							$('html, body').animate({ scrollTop: 0 }, 'slow');
							$("#alert_error").slideDown("fast").delay(4000).slideUp("slow");
							$("#mensagem_erro").html(partesResposta[1]);
						}

					});

				});

				$('#enviar_email').click(function(){

					var nomeContato = $('#nome_contato').val();
					var email = $('#email').val();
					var tipoContato = $('#tipo_contato').val();
					var mensagem = $('#mensagem').val();

					$.post('enviaEmail.php', {nomeContato: nomeContato, email: email, tipoContato: tipoContato, mensagem: mensagem}, function(resposta){

						if(codResposta == 0)
						{
							$('html, body').animate({ scrollTop: 0 }, 'slow');
							$("#alert_success").slideDown("fast").delay(4000).slideUp("slow");
							var t = setTimeout("location.href='index.php'",4000);
						}
						else
						{
							$('html, body').animate({ scrollTop: 0 }, 'slow');
							$("#alert_error").slideDown("fast").delay(4000).slideUp("slow");
							$("#mensagem_erro").html(partesResposta[1]);
						}

					});

				});

			});
			
		</script>
	</body>
</html>