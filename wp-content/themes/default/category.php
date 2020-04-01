<?php get_header(); ?>
<?php $category_current = get_queried_object(); ?>

	<?php
		$args = array(
		    'taxonomy'      	=> 'category',
		    'parent'        	=> 0, // get top level categories
		    'orderby'       	=> 'count',
		    'order'         	=> 'DESC',
		    'hide_empty'      	=> false
		);
		$categories = get_categories( $args );
	?>

	<section class="box-section breadcrumbs">
		<div class="container">

			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li><span>></span></li>
				<li><a href="<?php echo get_home_url(); ?>/Blog" title="Blog">Blog</a></li>
				<li><span>></span></li>
				<li><?php echo $category_current->name; ?></li>
			</ul>

		</div>
	</section>

	<section class="box-section">
		<div class="container">

			<h1>A melhor experiência e retorno para o seu projeto</h1>

			<ul class="list-category">
				<?php foreach ( $categories as $category ){ ?>

					<li>
						<a href="<?php echo get_term_link( $category->term_id); ?>" title="<?php echo $category->name; ?>">
							<?php echo $category->name; ?>
						</a>
					</li>

				<?php } ?>
			</ul>

			<div class="row no-padding list-post blog">
				<?php while ( have_posts() ) : the_post();

					get_template_part( 'content', '' );

				endwhile; ?>
			</div>

		</div>
	</section>
















<?php /*

	<section class="box-content no-padding">
		<div class="container">
			<h2 class="center"><span><?php the_field('titulo_menu',20); ?></span></h2>

			<form action="<?php echo home_url(); ?>" class="form-busca" method="get">
				<fieldset>
					<input type="text" name="s" id="search" placeholder="Buscar en el sitio…" value="<?php if(isset($_GET['s'])){ echo $_GET['s']; } ?>">
					<button type="submit" class="button"><i class="fas fa-search"></i></button>
				</fieldset>

				<?php /*if(is_search()){ ?>
					<div class="col-6">
						<span class="result">
							<span><?php _e( 'Resultados da pesquisa encontrados para', 'locale' ); ?>: "<?php the_search_query(); ?></span>
						</span>
					</div>
				<?php } *?>
			</form>
		</div>
	</section>

	<section class="box-content no-padding"> 
		<div class="container">

			<div class="row">
				<div class="col-12">

					<ul class="list-category">

						<?php foreach ( $categories as $category ){ ?>

							<li>
								<a href="<?php echo get_term_link( $category->term_id); ?>" title="<?php echo $category->name; ?>">
									<img src="<?php the_field('icone', $category->taxonomy . '_' . $category->term_id ); ?>" alt="<?php echo $category->name; ?>">	
									<span style="color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>"><?php echo $category->name; ?></span>
								</a>
							</li>

						<?php } ?>

						<li>
							<a href="<?php echo get_permalink(get_page_by_path('contactenos')); ?>" class="<?php if ( is_page('contactenos') ) : echo 'ativo'; endif ?>" title="<?php the_field('titulo_menu',23); ?>">
								<img src="<?php the_field('icone', 23 ); ?>" alt="<?php the_field('titulo_menu',23); ?>">	
								<span><?php the_field('titulo_menu',23); ?></span>
							</a>
						</li>

					</ul>
				</div>
			</div>

		</div>
	</section>


	<section class="box-content no-padding-top prensa prensa-list">
		<div class="container">

			<div class="row">

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="col-4 margin-bottom-60">

						<?php 	
							if(get_field('video')){

								get_template_part( 'content', 'video' );

							}else{
								if(get_field('galeria')){

									get_template_part( 'content', 'galeria' );

								}else{
									if(get_field('link')){

										get_template_part( 'content', 'link' );

									}else{
										if(get_field('arquivo')){

											get_template_part( 'content', 'arquivo' );

										}else{
											get_template_part( 'content', '' );
										}
									}
								}
							}
						?>
					
					</div>

				<?php endwhile; ?>

			</div>

		</div>
	</section>


<?php /*
		<section class="box-content"> 
			<div class="container">

				<h2 class="center"><span>PROCESO DE FUNCIONAMIENTO DEL OCP</span></h2>
				<p class="sub-tituto center">Conoce cómo funcionamos y nuestras estaciones.</p>

			</div>
		</section>

		<section class="box-content"> 
			<div class="container">

				<div class="iframe-video">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/video-funcionamento.jpg" >
				</div>

			</div>
		</section>

		<section class="box-content"> 
			<div class="container">

				<h2 class="center"><span>RUTA DE LAS ESTACIONES</span></h2>
				<p class="sub-tituto center">Mapa interactivo de la ruta de las estaciones y sus caracerísticas básicas</p>

			</div>
		</section>

		<section class="box-content no-padding-top"> 
			<div class="slide">

				<div id="slide-mision" class="carousel slide" data-ride="carousel" data-interval="80000">
					<div class="carousel-inner">
						<div class="carousel-item active" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/bg-slide.jpg');">
						</div>
					</div>

					<div class="mask-slide cor1 lg"></div>

					<div class="text-item">				
						<div class="vertical-center">
							<div class="content-vertical">
								<span class="titulo-slide active">
									Política Integrada de Gestión Ambiental, Seguridad Industrial y Salud Ocupacional
								</span>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>

		<section class="box-content"> 
			<div class="container">

				<div class="row">
					<div class="col-12">

						<h2 class="center"><span>CUIDADO DEL AMBIENTE</span></h2>
						<p class="text-destaque">En concordancia con nuestra Misión y Valores Corporativos, todas las operaciones que se desarrollan en OCP, se orientan a la protección y conservación del medio ambiente, así como el cumplimiento legal vigente en materia ambiental.
						<br><br>
						La identi!cación de aspectos e impactos, su análisis, seguimiento, control y minimización, constituyen factores importantes en la gestión ambiental de nuestra empresa. Este análisis se ejecuta a través de monitoreos internos y de cumplimiento legal.
						<br><br>
						Los objetivos en materia ambiental, se hallan enfocados hacia la minimización de los impactos ambientales y se encuentran plasmados mediante una gestión adecuada para el tratamiento de aspectos ambientales identi!cados.</p>

					</div>
				</div>

			</div>
		</section>

		<section class="box-content"> 
			<div class="container">

				<div class="row">
					<div class="col-12">

						<h2 class="center"><span>OPERACIÓN SEGURA</span></h2>
						<p class="text-destaque ">El compromiso de la Dirección de la Empresa ha permitido implementar e integrar un Sistema de Gestión de Seguridad y Salud en el Trabajo, tomando como referencia las directrices de la Organización Internacional de Trabajo, el Instrumento Andino de Seguridad y Salud en el Trabajo y el marco legal vigente en el Ecuador.</p>

					</div>
				</div>

			</div>
		</section>

		*/ ?>

	

<?php get_footer(); ?>

<script type="text/javascript">

	$(document).ready(function(){
		$('.article').height($('.article:first-child').width());
	});

	$(window).resize(function(){
		$('.article').height($('.article:first-child').width());
	})

</script>