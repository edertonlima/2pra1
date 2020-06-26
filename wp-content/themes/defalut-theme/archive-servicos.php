<?php get_header(); ?>


	<?php if(get_field('select-slide','1081') == 'video'){ ?>
		
		<?php //<section class="box-section no-padding full-height bg-imagem bg-mascara video-single-servico mask-single-servico"> ?>
		<section class="box-section video-slide no-padding full-height bg-imagem bg-mascara">			
			<video autoplay="true" loop="true" muted="true">
				<source src="<?php the_field('video-slide','1081'); ?>" type="video/mp4">
			</video>

			<div class="container not-hide">
				<div class="sub-cont">

					<div class="box-vertical vertical-center">
						<div class="conteúdo-vertical">
							
							<div class="box-destaque">
								<span class="titulo">
									<?php echo get_the_title(1081); ?>
								</span>
							</div>
							
						</div>
					</div>
				
				</div>
			</div>
		</section>

	<?php }else{
		$banner_image = get_field('imagem-slide','1081'); ?>

		<section class="box-section no-padding full-height bg-imagem bg-mascara" style="background-image: url('<?php echo $banner_image['sizes']['wide']; ?>');">

			<div class="container">
				
				<div class="box-vertical vertical-center">
					<div class="conteúdo-vertical">
						
						<div class="box-destaque">
							<span class="titulo">
								<?php the_field('titulo-slide','1081'); ?>
							</span>

							<?php if(get_field('subtitulo-slide','1081')){ ?>
								<span class="subtitulo">
									<?php the_field('subtitulo-slide','1081'); ?>
								</span>
							<?php } ?>

							<?php if(get_field('link-slide','1081')){ ?>
								<a href="<?php the_field('link-slide','1081'); ?>" title="<?php the_field('titulo-link-slide','1081'); ?>" class="btn extra transparente">
									<?php the_field('titulo-link-slide','1081'); ?>
								</a>
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
				<li>Serviços</li>
			</ul>

		</div>
	</section>

	<section class="box-section section-mobile-full">
		<div class="container">

			<?php //<h1>Serviços</h1> ?>
			<div class="row list-post">

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'content', 'list-servico' );

				endwhile;
				wp_reset_query(); ?>

			</div>

		</div>
	</section>

<?php get_footer(); ?>

<script type="text/javascript">

</script>