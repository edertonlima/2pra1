<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<?php if(get_field('select-slide') == 'video'){ ?>
		
		<section class="box-section video-slide no-padding full-height bg-imagem bg-mascara">
			
			<video autoplay="true" loop="true" muted="true">
				<source src="<?php the_field('video-slide'); ?>" type="video/mp4">
			</video>

			<div class="container">
				<div class="sub-cont">
				
					<div class="box-vertical vertical-center">
						<div class="conteúdo-vertical">
							
							<div class="box-destaque">
								<span class="titulo">
									<?php the_field('titulo-slide'); ?>
								</span>

								<?php /*if(get_field('subtitulo-slide')){ ?>
									<span class="subtitulo">
										<?php the_field('subtitulo-slide'); ?>
									</span>
								<?php } */?>

								<?php /*if(get_field('link-slide')){ ?>
									<a href="<?php the_field('link-slide'); ?>" class="btn extra transparente"><?php the_field('titulo-link-slide'); ?></a>
								<?php } */?>
							</div>
							
						</div>
					</div>
				
				</div>
			</div>
		</section>

	<?php }else{
		$banner_image = get_field('imagem-slide'); ?>

		<section class="box-section no-padding full-height bg-imagem bg-mascara" style="background-image: url('<?php echo $banner_image['sizes']['wide']; ?>');">

			<div class="container">
				
				<div class="box-vertical vertical-center">
					<div class="conteúdo-vertical">
						
						<div class="box-destaque">
							<span class="titulo">
								<?php the_field('titulo-slide'); ?>
							</span>

							<?php if(get_field('subtitulo-slide')){ ?>
								<span class="subtitulo">
									<?php the_field('subtitulo-slide'); ?>
								</span>
							<?php } ?>

							<?php if(get_field('link-slide')){ ?>
								<a href="<?php the_field('link-slide'); ?>" class="btn extra transparente" title="<?php the_field('titulo-link-slide'); ?>"><?php the_field('titulo-link-slide'); ?></a>
							<?php } ?>
						</div>

					</div>
				</div>

			</div>
		</section>

	<?php } ?>

	<section class="box-section breadcrumbs">
		<div class="container">

			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li><span>></span></li>
				<li><?php the_field('titulo_menu'); ?></li>
			</ul>

		</div>
	</section>

	
	<?php if(is_page(icl_object_id( 184, 'page', false, ICL_LANGUAGE_CODE ))){ ?>
	<section class="box-section">
		<div class="container">

			<div class="row">
				<div class="col-12">
					
					<div class="conteudo ico-contato">
						<div class="item endereco">
							<i class="far fa-map"></i>
							<span>
								<?php the_field('endereco'); ?>
							</span>
						</div>

						<div class="item center whatsapp">
							<a href="https://api.whatsapp.com/send?phone=<?php the_field('whatsapp_api'); ?>&amp;text=Ol%C3%A1%2C%20tudo%20bem%3F%20Gostaria%20de%20falar%20com%20voc%C3%AA!%20" target="_blank" title="whatsapp">
								<i class="fab fa-whatsapp"></i>							
								<span><?php the_field('whatsapp'); ?></span>
							</a>
						</div>

						<div class="item center email">
							<a href="mailto:<?php the_field('email'); ?>" title="<?php the_field('email'); ?>" target="_blank">
								<i class="far fa-envelope"></i>
								<span><?php the_field('email'); ?></span>
							</a>
						</div>
					</div>

				</div>
			</div>

		</div>
	</section>

	<section class="box-section">
		<div class="container">

			<h1 class="no-margin"><?php the_title(); ?></h1>

			<form class="contato">
				
				<div class="row">

					<div class="col-12">
						<?php the_content(); ?>
					</div>

					<?php switch (ICL_LANGUAGE_CODE) {
						case 'pt-br':
							$nome = 'Seu nome';
							$email = 'Seu e-mail';
							$empresa = 'Empresa';
							$telefone = 'Telefone';
							$assunto = 'Assunto';
							$mensagem = 'Mensagem';
							$txtbtn = 'enviar';
						break;

						case 'en':
							$nome = 'Your name';
							$email = 'Your name email';
							$empresa = 'Company';
							$telefone = 'Telephone';
							$assunto = 'Subject';
							$mensagem = 'Message';
							$txtbtn = 'send';
						break;

						case 'es':
							$nome = 'Seu nome';
							$email = 'Seu e-mail';
							$empresa = 'Empresa';
							$telefone = 'Teléfono';
							$assunto = 'Tema';
							$mensagem = 'Mensaje';
							$txtbtn = 'enviar';
						break;
					} ?>

					<fieldset class="col-10 margin-top clear">
						<input type="text" name="" placeholder="*<?php echo $nome; ?>">
					</fieldset>

					<fieldset class="col-10 clear">
						<input type="text" name="" placeholder="*<?php echo $email; ?>">
					</fieldset>

					<fieldset class="col-10 clear">
						<input type="text" name="" placeholder="*<?php echo $empresa; ?>">
					</fieldset>

					<fieldset class="col-10 clear">
						<input type="text" name="" placeholder="*<?php echo $telefone; ?>">
					</fieldset>

					<fieldset class="col-10 clear">
						<input type="text" name="" placeholder="*<?php echo $assunto; ?>">
					</fieldset>

					<fieldset class="col-10 clear">
						<textarea name="" placeholder="*<?php echo $mensagem; ?>"></textarea>
					</fieldset>

					<fieldset class="col-10 right">
						<button class="btn mini transparente default"><?php echo $txtbtn; ?></button>
					</fieldset>
					
				</div>

			</form>

		</div>
	</section>
	<?php } ?>


	<?php if(is_page(icl_object_id( 10, 'page', false, ICL_LANGUAGE_CODE ))){ ?>
	<section class="box-section section-mobile-full">
		<div class="container">

			<h1><?php the_title(); ?></h1> 

			<div class="row">
				<div class="col-12">

					<?php $images = get_field('galeria');
					if(count($images) > 0){
						$num_item = 0; 
						$i = 0;
						$count_item = count($images); ?>

						<div class="clientes owl-carousel owl-theme owl-loaded">
							<div class="owl-stage-outer">
								<div class="owl-stage"> 
								
									<?php foreach( $images as $image ): 
										$num_item++; 
										$i++; 
										
										if($i == 1){ ?>

											<div class="item-cliente owl-item">

										<?php } ?>

										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['caption']; ?>">

										<?php if(($i == 3) or ($count_item == $num_item)){ 
											$i = 0; ?>
											</div>
										<?php } ?>

									<?php endforeach; ?>

								</div>
							</div>
						</div>

					<?php } ?>				


					<?php if( have_rows('depoimentos') ): ?>

						<div class="depoimentos owl-carousel owl-theme owl-loaded">
							<div class="owl-stage-outer">
								<div class="owl-stage"> 

    								<?php while ( have_rows('depoimentos') ) : the_row(); ?>

    									<div class="item-depoimento owl-item">
											<span class="titulo"><?php the_sub_field('texto'); ?></span>
											<span class="autor"><?php the_sub_field('autor'); ?></span>
    									</div>

								    <?php endwhile; ?>

								</div>
							</div>
						</div>
					<?php endif; ?>

				</div>	
			</div>

		</div>
	</section>
	<?php } ?>

<?php endwhile; ?>
<?php get_footer(); ?>

<!-- CAROUSEL -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl-carousel/owl.carousel.min.js"></script>

<script type="text/javascript">
	$('.clientes').owlCarousel({
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
				nav:true,
				margin:0,
			},
			680:{
				items:3,
				nav:false
			},
			1000:{
				items:5,
				nav:true,
				loop:false
			}
		}
	})

	$('.depoimentos').owlCarousel({
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
				nav:true
			}
		}
	})

	<?php /*

	$(document).ready(function(){

		<?php if(get_field('select-slide') == 'dinamico'){ ?>

			hover_auto = true;
			img_hover = 0;

			setInterval(function(){ 
				if(hover_auto == true){
					img_hover++

					if(img_hover == 5){
						img_hover = 1;
					}

					$('.slide-image-hover img').removeClass('ativo');
					$('#img-'+img_hover).addClass('ativo');
					console.log('auto - ' + img_hover);
				}
			}, 4000);

			$('.btn-hover').hover(
				function() {

					hover_auto = false;
					img_hover = $(this).attr('var-img');
					$('.slide-image-hover img').removeClass('ativo');
					$('#img-'+img_hover).addClass('ativo');
					//console.log('pause');
					//console.log('houve - ' + img_hover);
				
				}, function() {
					hover_auto = true;
					//console.log('auto');
				}
			);

		<?php }else{ ?>

			<?php if(get_field('select-slide') == 'video'){ ?>
						
				//$(document).ready(function(){
					video_width = ($('.video-slide').width())/2.333333;
					$('.video-slide .container').height(video_width);
					$('.video-slide video').height(video_width);
				//});

				$(window).resize(function(){
					video_width = ($('.video-slide').width())/2.333333;
					$('.video-slide .container').height(video_width);
					$('.video-slide video').height(video_width);
				});

			<?php } ?>

		<?php } ?>
	});

	*/ ?>

</script>