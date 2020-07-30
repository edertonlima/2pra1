<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if(get_field('select-slide-home') == 'dinamico'){ ?>

		<?php if( have_rows('dinamico-slide-home') ): ?>
		    <?php while( have_rows('dinamico-slide-home') ): the_row(); ?>

				<section class="box-section dinamico-slide no-padding full-height">
					<div class="slide-image-hover">

						<?php 
							$dinamico_slide = get_sub_field('dinamico-slide');
							$first_image = $dinamico_slide[0]['image-dinamico-slide-bg'];
						?>

						<img src="<?php echo $first_image; ?>" alt="" id="" class="img-bg">						
						
						<div class="btn-action">

							<?php foreach ($dinamico_slide as $key => $value) { 
								$background = 'background: rgb(' . implode(", ", hex2rgb($value['cor-dinamico-slide'])) . ');';

								if($key == 0 || $key == 3){
									$background .= 'background: linear-gradient(90deg, rgba(' . implode(", ", hex2rgb($value['cor-dinamico-slide'])) . ',0) 0%, rgba(' . implode(", ", hex2rgb($value['cor-dinamico-slide'])) . ',1) 30%);';
								}else{
									$background .= 'background: linear-gradient(90deg, rgba(' . implode(", ", hex2rgb($value['cor-dinamico-slide'])) . ',1) 70%, rgba(' . implode(", ", hex2rgb($value['cor-dinamico-slide'])) . ',0) 100%);';
								}

								//$background .= 'background: linear-gradient(90deg, rgba(' . implode(", ", hex2rgb($value['cor-dinamico-slide'])) . ',0) 0%, rgba(' . implode(", ", hex2rgb($value['cor-dinamico-slide'])) . ',1) 30%, rgba(' . implode(", ", hex2rgb($value['cor-dinamico-slide'])) . ',1) 100%);'; ?>


								
								
								<a href="<?php echo $value['link-dinamico-slide']; ?>" class="btn-hover <?php if($key == 0){ echo 'ativo'; } ?>" id="btn-<?php echo $key; ?>" var-img="<?php echo $key; ?>" title="<?php echo $value['titulo-dinamico-slide']; ?>">
									<img src="<?php echo $value['image-dinamico-slide-bg']; ?>" alt="<?php echo $value['titulo-dinamico-slide']; ?>">
									<span class="txt" id="txt-<?php echo $key; ?>" style="<?php echo $background; ?>">
										<?php echo $value['titulo-dinamico-slide']; ?>
									</span>
								</a>

							<?php } ?>

						</div>

						
						<div class="selo-ico">
							<?php foreach ($dinamico_slide as $key => $value) { ?>
								<?php /*<img src="<?php echo get_template_directory_uri(); ?>/assets/images/selo00.png" alt="" id="" class="selo-bg">*/ ?>
								<img src="<?php echo $value['selo-dinamico-slide']; ?>" class="selo <?php if($key == 0){ echo 'ativo'; } ?>" alt="<?php echo $value['titulo-dinamico-slide']; ?>" id="selo-<?php echo $key; ?>">
							<?php } ?>
						</div>

					</div>
				</section>

			<?php endwhile; ?>
		<?php endif; ?>

	<?php }else{ ?>

		<?php if(get_field('select-slide-home') == 'video'){ ?>
			
			<section class="box-section video-slide no-padding full-height bg-imagem bg-mascara">
				
				<video autoplay="true" loop="true" muted="true">
					<source src="<?php the_field('video-slide-home'); ?>" type="video/mp4">
				</video>

				<div class="container">
					
					<div class="box-vertical vertical-center">
						<div class="conteúdo-vertical">
							
							<div class="box-destaque">
								<span class="titulo medium">
									<?php the_field('titulo-slide-home'); ?>
								</span>

								<?php if(get_field('subtitulo-slide-home')){ ?>
									<span class="subtitulo">
										<?php the_field('subtitulo-slide-home'); ?>
									</span>
								<?php } ?>

								<?php if(get_field('link-slide-home')){ ?>
									<a href="<?php the_field('link-slide-home'); ?>" class="btn extra transparente" title="<?php the_field('titulo-link-slide-home'); ?>">
										<?php the_field('titulo-link-slide-home'); ?>										
									</a>
								<?php } ?>
							</div>

						</div>
					</div>

				</div>
			</section>

		<?php }else{ 
			$banner_image = get_field('imagem-slide-home'); ?>

			<section class="box-section no-padding full-height bg-imagem bg-mascara" style="background-image: url('<?php echo $banner_image['sizes']['wide']; ?>');">

				<div class="container">
					
					<div class="box-vertical vertical-center">
						<div class="conteúdo-vertical">
							
							<div class="box-destaque">
								<span class="titulo">
									<?php the_field('titulo-slide-home'); ?>
								</span>

								<?php if(get_field('subtitulo-slide-home')){ ?>
									<span class="subtitulo">
										<?php the_field('subtitulo-slide-home'); ?>
									</span>
								<?php } ?>

								<?php if(get_field('link-slide-home')){ ?>
									<a href="<?php the_field('link-slide-home'); ?>" class="btn extra transparente" title="<?php the_field('titulo-link-slide-home'); ?>">
										<?php the_field('titulo-link-slide-home'); ?>
									</a>
								<?php } ?>
							</div>

						</div>
					</div>

				</div>
			</section>

		<?php } ?>

	<?php } ?>

	<section class="box-section">
		<div class="container">

			<div class="row">
				<div class="col-12">
					
					<div class="conteudo">
						<?php the_content(); ?>
					</div>

				</div>
			</div>

		</div>
	</section>



	<?php
	$query = array(
			'post_type' => 'servicos'
		);
	query_posts( $query );

	if( have_posts() ){ ?>

		<section class="box-section section-mobile-full">
			<div class="container">

				<h1>
					<?php switch (ICL_LANGUAGE_CODE) {
						case 'pt-br':
							echo "Serviços";
						break;

						case 'en':
							echo "Services";
						break;

						case 'es':
							echo "Servicios";
						break;
					} ?>
				</h1>
				<div class="row list-post">

					<?php while ( have_posts() ) : the_post();

						get_template_part( 'content', 'list-servico' );

					endwhile;
					wp_reset_query(); ?>

				</div>

			</div>
		</section>

	<?php } ?>

	<?php
	$query = array(
			'posts_per_page' => 9,
			'post_type' 	 => 'projetos',
			//'category_name'  => 'prensa'
		);
	query_posts( $query );

	//if( have_posts() ){ ?>

		<section class="box-section section-mobile-full">
			<div class="container">
						
				<h1 class="margin-top">
					<?php switch (ICL_LANGUAGE_CODE) {
						case 'pt-br':
							echo "Projetos";
						break;

						case 'en':
							echo "Projects";
						break;

						case 'es':
							echo "Proyectos";
						break;
					} ?>
				</h1>
				<div class="row no-padding list-post projetos">

					<?php while ( have_posts() ) : the_post();

						$row = 1;
						get_template_part( 'content', 'list-projeto' );

					endwhile;
					wp_reset_query(); ?>

					<div class="col-12 center">
						<?php switch (ICL_LANGUAGE_CODE) {
							case 'pt-br':
								$title = 'ver todos';
							break;

							case 'en':
								$title = 'see all';
							break;

							case 'es':
								$title = 'ver todo';
							break;
						} ?>
						<a href="<?php echo get_post_type_archive_link('projetos'); ?>" class="btn btn-mais extra transparente cinza-claro" title="<?php echo $title; ?>">
							<?php echo $title; ?>
						</a>
					</div>

				</div>

			</div>
		</section>

	<?php// } ?>


	<?php $banner_image = get_field('imagem-banner-inferior'); ?>
	<section class="box-section no-padding margin-top full-max-height bg-imagem bg-mascara" style="background-image: url('<?php echo $banner_image['sizes']['wide']; ?>');">
		<div class="container">
			
			<div class="box-vertical vertical-center">
				<div class="conteúdo-vertical">
					
					<div class="box-destaque">
						<span class="subtitulo">
							<?php the_field('titulo-banner-inferior'); ?>
						</span>

						<a href="<?php the_field('link-banner-inferior'); ?>" class="btn extra transparente" title="<?php the_field('titulo-link-banner-inferior'); ?>"><?php the_field('titulo-link-banner-inferior'); ?></a>
					</div>
				</div>
			</div>

		</div>
	</section>

<?php endwhile; ?>

<?php get_footer(); ?>

<script type="text/javascript">

	proj_height = $('.projetos .col-4:first-child').width();
	$('.projetos .article').height(proj_height);

	$(window).resize(function(){
		proj_height = $('.projetos .col-4:first-child').width();
		$('.projetos .article').height(proj_height);
	});


	$(document).ready(function(){

		<?php if(get_field('select-slide-home','2') == 'dinamico'){ ?>

			hover_auto = true;
			img_hover = 0;

			setInterval(function(){ 
				if(hover_auto == true){

					if(img_hover == 4){
						img_hover = 0;
					}

					$('.slide-image-hover .btn-hover').removeClass('ativo');
					$('.slide-image-hover .selo').removeClass('ativo');
					//$('.slide-image-hover .txt').removeClass('ativo');
					$('#btn-'+img_hover).addClass('ativo');
					$('#selo-'+img_hover).addClass('ativo');
					//console.log('auto - ' + img_hover);

					img_hover++;
				}
			}, 4000);

			$('.btn-hover').hover(
				function() {

					hover_auto = false;
					img_hover = $(this).attr('var-img');

					$('.slide-image-hover .btn-hover').removeClass('ativo');
					$('.slide-image-hover .selo').removeClass('ativo');
					//$('#txt-'+img_hover).addClass('ativo');
					$('#btn-'+img_hover).addClass('ativo');
					$('#selo-'+img_hover).addClass('ativo');
					//console.log('pause');
					//console.log('houve - ' + img_hover);
				
				}, function() {
					hover_auto = true;
					//console.log('auto');
				}
			);

		<?php }else{ ?>

			<?php if(get_field('select-slide-home','2') == 'video'){ ?>
						
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

</script>