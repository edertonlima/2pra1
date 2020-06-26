

	<?php $marcas = get_field('marcas','option');
	if(count($marcas) > 0){ ?>		
		<section class="box-section box-marcas">
			<div class="container">

				<h3 class="center"><?php the_field('titulo-marcas','option'); ?></h3>

				<div class="row">
					<div class="col-12">
						<?php
							$num_item = 0; 
							$i = 0;
							$count_item = count($marcas);
						?>

						<div class="marcas owl-carousel owl-theme owl-loaded">
							<div class="owl-stage-outer">
								<div class="owl-stage"> 
								
									<?php foreach( $marcas as $marca ): ?>
										<div class="item-cliente owl-item">
											<img src="<?php echo esc_url($marca['url']); ?>" alt="<?php echo $marca['caption']; ?>">
										</div>
									<?php endforeach; ?>

								</div>
							</div>
						</div>

					</div>	
				</div>

			</div>
		</section>
	<?php } ?>


	<footer class="box-section footer">
		<div class="container">
			
			<div class="row">
				<div class="footer-col">
					<h4>Contato</h4>
					<p>
						<?php the_field('endereco',184); ?>
					</p>

					<p><?php the_field('whatsapp',184); ?></p>

					<p>
						<a href="mailto:<?php the_field('email',184); ?>" title="<?php the_field('email',184); ?>" target="_blank">
							<?php the_field('email',184); ?>
						</a>
					</p>

					<?php if( have_rows('redes-sociais','option') ): ?>

						<div class="redes">
							<?php while( have_rows('redes-sociais','option') ): the_row(); ?>

								<a href="<?php the_sub_field('url'); ?>" title="<?php the_sub_field('titulo'); ?>" target="_blank">
									<?php the_sub_field('icone'); ?>
								</a>

							<?php endwhile; ?>
						</div>
						
					<?php endif; ?>

				</div>
			
				
				<?php // NOTÍCIAS
					$query = array(
							'posts_per_page'	=> 3,
							'post_type' 	 	=> 'post',
							'category_name'  => 'blog'
						);
					query_posts( $query );

					if(have_posts()){ ?>

						<div class="footer-col">
							<h4>Últimos posts</h4>

							<?php while ( have_posts() ) : the_post(); ?>
								<p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_title(); ?>
								</a></p>
							<?php endwhile; ?>

						</div>

					<?php } ?>

				<div class="footer-col">
					<h4>Newletter</h4>
					<p>Inscreva-se em nossa newsletter e receba nosso conteúdo exclusivo</p>

					<form>
						<fieldset>
							<input type="text" name="email" placeholder="*Seu e-mail">
						</fieldset>
						<button class="btn mini transparente right">receber</button>
					</form>
				</div>
			</div>

		</div>
	</footer>

	<section class="box-section no-padding" id="demonstracao">
		<div class="container">

			<h2 class="titulo-form">Agende uma demonstração</h2>
			<form class="demonstracao">
				
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

	<!-- CAROUSEL -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl-carousel/owl.carousel.min.js"></script>

	<script type="text/javascript">
		$('.marcas').owlCarousel({
			loop:false,
			margin:30,
			responsiveClass:true,
			dots:false,
			nav:true,
			navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
			//rtl:true,
			responsive:{
				0:{
					items:1,
					nav:false
				},
				680:{
					items:3,
					nav:false
				},
				1000:{
					items:3,
					nav:true,
					loop:false
				}
			}
		})
	</script>

	<script type="text/javascript">

		$(document).ready(function(){
			scroll_body = $(window).scrollTop();
			if(scroll_body > 100){
				$('.header').addClass('scroll');
			}else{
				$('.header').removeClass('scroll');
			}


			// MENU MOBILE
			widthWindow = $(window).width();
			if(widthWindow < 980){
				$('.menu-mobile').click(function(){
					//$('.submenu').removeClass('ativo');

					$(this).toggleClass('open');
					$('.nav').toggleClass('open');
					$('body').toggleClass('open');
				});

				/*$('.btn-menu-mobile').click(function(){
					$(this).parent().toggleClass('ativo');
				});*/
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

		$(window).resize(function(){

			// MENU MOBILE
			$('.menu-mobile').removeClass('open');
			$('.nav').removeClass('open');
			$('body').removeClass('open');
			//$('.submenu').removeClass('ativo');

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