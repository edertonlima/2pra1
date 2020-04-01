
	<footer class="box-section footer">
		<div class="container">
			
			<div class="row">
				<div class="footer-col">
					<h4>Contato</h4>
					<p>
						Parque Tecnológico Alfa - Rod. José Carlos<br>
						Daux, 600 - João Paulo / Florianópolis SC<br>
						88030-000
					</p>

					<p>+55 48 3024.5212</p>

					<p><a href="">comercial@doispraum.com.br</a></p>

					<div class="redes">
						<a href=""><i class="fab fa-facebook-f"></i></a>
						<a href=""><i class="fab fa-youtube"></i></a>
						<a href=""><i class="fab fa-twitter"></i></a>
					</div>
				</div>
			
				<div class="footer-col">
					<h4>Últimos posts</h4>
					<p><a href="">
						estratégias casadas de importação e terceirização da fabricação no Brasil
					</a></p>

					<p><a href="">
						qual momento posso pensar em converter meu produto metálico em plástico
					</a></p>

					<p><a href="">
						como posicionar um novo produto no mercado
					</a></p>
				</div>

				<div class="footer-col">
					<h4>Newletter</h4>
					<p>Inscreva-se em nossa newsletter e receba nosso conteúdo exclusivo</p>

					<form>
						<fieldset>
							<input type="text" name="email" placeholder="*Seu e-mail">
						</fieldset>
						<button class="btn transparente right">receber</button>
					</form>
				</div>
			</div>

		</div>
	</footer>

	<section class="box-section no-padding" id="demonstracao">
		<div class="container">

			<h2 class="titulo-form">Agende uma demonstração</h2>
			<form>
				
				<div class="row">
					<div class="scrollbar scrollbar-dynamic">
					<div class="col-12">
						<p>Preencha seus contatos no formuláro abaixo e um membro de nossa equipe irá entrar em contato.</p>
					</div>

					<fieldset class="col-7 margin-top clear">
						<input type="text" name="" placeholder="*Seu nome">
					</fieldset>

					<fieldset class="col-7 clear">
						<input type="text" name="" placeholder="*Seu e-mail">
					</fieldset>

					<fieldset class="col-7 clear">
						<input type="text" name="" placeholder="*Empresa">
					</fieldset>

					<fieldset class="col-7 clear">
						<input type="text" name="" placeholder="*Telefone">
					</fieldset>

					<fieldset class="col-7 clear">
						<input type="text" name="" placeholder="*Assunto">
					</fieldset>

					<fieldset class="col-7 clear">
						<textarea name="" placeholder="*Mensagem"></textarea>
					</fieldset>

					<fieldset class="col-12">
						<button class="btn mini transparente">enviar</button>
					</fieldset>
					</div>
				</div>

			</form>

		</div>
	</section>

	<?php wp_footer(); ?>

	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){
			scroll_body = $(window).scrollTop();
			if(scroll_body > 100){
				$('.header').addClass('scroll');
			}else{
				$('.header').removeClass('scroll');
			}
		});

		$(window).scroll(function(){
			scroll_body = $(window).scrollTop();
			if(scroll_body > 100){
				$('.header').addClass('scroll');
			}else{
				$('.header').removeClass('scroll');
			}
		});

	</script>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/scrollbar/jquery.scrollbar.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.scrollbar').scrollbar();
		});
	</script>

</body>
</html>