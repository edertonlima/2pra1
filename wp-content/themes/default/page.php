<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<?php $banner_image = get_field('imagem-slide'); ?>
	<section class="box-section no-padding full-height bg-imagem bg-mascara" style="background-image: url('<?php echo $banner_image['sizes']['wide']; ?>');">
		<div class="container">
			
			<div class="box-vertical vertical-center">
				<div class="conteúdo-vertical">
					
					<div class="box-destaque">
						<span class="titulo medium">
							<?php the_field('titulo-slide'); ?>
						</span>

						<?php if(get_field('subtitulo-slide')){ ?>
							<span class="subtitulo">
								<?php the_field('subtitulo-slide'); ?>
							</span>
						<?php } ?>

						<?php if(get_field('link-slide')){ ?>
							<a href="<?php the_field('link-slide'); ?>" class="btn extra transparente"><?php the_field('titulo-link-slide'); ?></a>
						<?php } ?>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="box-section breadcrumbs">
		<div class="container">

			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li><span>></span></li>
				<li><?php the_field('titulo_menu'); ?></li>
			</ul>

		</div>
	</section>

	
	<?php if(is_page(184)){ ?>
	<section class="box-section">
		<div class="container">

			<div class="row">
				<div class="col-12">
					
					<div class="conteudo ico-contato">
						<div class="item endereco">
							<i class="far fa-map"></i>
							<span>
								Parque Tecnológico Alfa - <br>
								Rod. José Carlos Daux, 600<br>
								João Paulo / Florianópolis<br>
								SC 88030-000
							</span>
						</div>

						<div class="item center whatsapp">
							<i class="fab fa-whatsapp"></i>
							<span>+55 48 3024.5212</span>
						</div>

						<div class="item center email">
							<i class="far fa-envelope"></i>
							<span>comercial@doispraum.com.br</span>
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

					<fieldset class="col-10 margin-top clear">
						<input type="text" name="" placeholder="*Seu nome">
					</fieldset>

					<fieldset class="col-10 clear">
						<input type="text" name="" placeholder="*Seu e-mail">
					</fieldset>

					<fieldset class="col-10 clear">
						<input type="text" name="" placeholder="*Empresa">
					</fieldset>

					<fieldset class="col-10 clear">
						<input type="text" name="" placeholder="*Telefone">
					</fieldset>

					<fieldset class="col-10 clear">
						<input type="text" name="" placeholder="*Assunto">
					</fieldset>

					<fieldset class="col-10 clear">
						<textarea name="" placeholder="*Mensagem"></textarea>
					</fieldset>

					<fieldset class="col-10 right">
						<button class="btn mini transparente default">enviar</button>
					</fieldset>
					
				</div>

			</form>

		</div>
	</section>
	<?php } ?>


	<?php if(is_page(10)){ ?>
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
</script>