

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
					<h4>
						<?php switch (ICL_LANGUAGE_CODE) {
							case 'pt-br':
								echo 'Contato';
							break;

							case 'en':
								echo 'Contact';
							break;

							case 'es':
								echo 'Contacto';
							break;
						} ?>
					</h4>
					<p>
						<?php 
							$id_page_contato = icl_object_id( 184, 'page', false, ICL_LANGUAGE_CODE );
							the_field('endereco',$id_page_contato); 
						?>
					</p>

					<p><?php the_field('whatsapp',$id_page_contato); ?></p>

					<p>
						<a href="mailto:<?php the_field('email',$id_page_contato); ?>" title="<?php the_field('email',$id_page_contato); ?>" target="_blank">
							<?php the_field('email',$id_page_contato); ?>
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
			
				<div class="footer-col">
					<h4>
						<?php switch (ICL_LANGUAGE_CODE) {
							case 'pt-br':
								echo 'Últimos posts';
							break;

							case 'en':
								echo 'Latest posts';
							break;

							case 'es':
								echo 'Últimas publicaciones';
							break;
						} ?>
					</h4>

					<?php // NOTÍCIAS
						$query = array(
								'posts_per_page'	=> 3,
								'post_type' 	 	=> 'post',
								'category_name'  => 'blog'
							);
						query_posts( $query );

						if(have_posts()){ ?>
							
							<?php while ( have_posts() ) : the_post(); ?>
								<p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_title(); ?>
								</a></p>
							<?php endwhile; ?>

						<?php }
					?>
				</div>

				<div class="footer-col">
					<?php switch (ICL_LANGUAGE_CODE) {
						case 'pt-br':
							$title_imput = 'Seu e-mail';
							$title_btn = 'receber'; ?>
							<h4>Newletter</h4>
							<p>Inscreva-se em nossa newsletter e receba nosso conteúdo exclusivo</p>
						<?php break;

						case 'en':
							$title_imput = 'Your email';
							$title_btn = 'receive'; ?>
							<h4>Newletter</h4>
							<p>Subscribe to our newsletter and receive our exclusive content</p>
						<?php break;

						case 'es':
							$title_imput = 'Su e-mail';
							$title_btn = 'recibir'; ?>
							<h4>Newletter</h4>
							<p>Suscríbase a nuestro boletín y reciba nuestro contenido exclusivo</p> 
						<?php break;
					} ?>

					<form>
						<fieldset>
							<input type="text" name="email" placeholder="*<?php echo $title_imput; ?>">
						</fieldset>
						<button class="btn mini transparente right"><?php echo $title_btn; ?></button>
					</form>
				</div>
			</div>

		</div>
	</footer>

	<section class="box-section no-padding" id="demonstracao">
		<div class="container">

			<h2 class="titulo-form"><?php echo get_the_title($id_page_contato); ?></h2> 
			<form class="demonstracao">
				
				<div class="row">
					<div class="scrollbar scrollbar-dynamic">
					<div class="col-12">
						<p><?php echo get_post_field('post_content', $id_page_contato); ?></p>
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
						<button class="btn mini transparente">
							<?php switch (ICL_LANGUAGE_CODE) {
								case 'pt-br':
									echo 'send';
								break;

								case 'en':
									echo 'send';
								break;

								case 'es':
									echo 'enviar'; 
								break;
							} ?>
						</button>
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