<?php get_header(); ?>

		<div class="breadcrumbs">
			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li>Servicios</li>
			</ul>
		</div>

		<section class="box-content no-padding"> 
			<div class="slide slide-grande">

				<div id="slide-servicios" class="carousel slide" data-ride="carousel" data-interval="80000">

					<div class="carousel-inner">
						<div class="carousel-item active" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/slide-servicios.jpg');">
						</div>
					</div>
				</div>

			</div>
		</section>

	<section class="box-content"> 
		<div class="container">

			<h2 class="center"><span>NUESTROS SERVICIOS</span></h2>
			<p class="sub-tituto center">Conoce y entienda nuestros servicios y procesos.</p>

			<div class="link-mais margin-top-20 margin-bottom-40 center">
				<a href="#" title="Catalogo de Servicios" class="link link-bloco">
					Catalogo de Servicios
				</a>
			</div>

		</div>
	</section>

		<section class="box-content servicios list-servicios"> 
			<div class="container">

				<div class="row">

					<div class="col-4">
						<div class="item-servicios center">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-servicios-1.jpg">
							<h4 class="">TRANSPORTE DE CRUDO PESADO</h4>
						</div>
						<div class="link-mais margin-top-20 margin-bottom-40 center">
							<a href="<?php echo get_home_url(); ?>/servicios/transporte-de-crudo-pesado" title="Conoce" class="link link-bloco">
								Conoce
							</a>
						</div>
					</div>

					<div class="col-4">
						<div class="item-servicios center">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-servicios-2.jpg">
							<h4>TRANSPORTE DE CRUDO SEGREGADO</h4>
						</div>
						<div class="link-mais margin-top-20 margin-bottom-40 center">
							<a href="<?php echo get_home_url(); ?>/servicios/transporte-de-crudo-segregado" title="Conoce" class="link link-bloco">
								Conoce
							</a>
						</div>
					</div>

					<div class="col-4">
						<div class="item-servicios center">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-servicios-3.jpg">
							<h4>RECEPCIÓN POR CARROTANQUES</h4>
						</div>
						<div class="link-mais margin-top-20 margin-bottom-40 center">
							<a href="<?php echo get_home_url(); ?>/servicios/transporte-de-crudo-pesado" title="Conoce" class="link link-bloco">
								Conoce
							</a>
						</div>
					</div>
				</div>

			</div>
		</section>

	<?php while ( have_posts() ) : the_post(); ?>



	<?php endwhile; ?>

<?php get_footer(); ?>