<?php get_header(); ?>

	<?php
		$args = array(
		    'taxonomy'      	=> 'categoria_proyectos',
		    'parent'        	=> 0, // get top level categories
		    'orderby'       	=> 'count',
		    'order'         	=> 'DESC',
		    'hide_empty'      	=> false
		);
		$categories = get_categories( $args );
		$category_current = get_queried_object();
	?>

	<div class="breadcrumbs">
		<ul class="container">
			<li><a href="<?php echo get_home_url(); ?>" title="Home">Início</a></li> 

			<?php if(is_tax('categoria_proyectos')){ ?>
				<li><a href="<?php echo get_home_url(); ?>/aporte-a-la-sociedad" title="Proyectos"><?php the_field('titulo_menu',16); ?></a></li> 
			<?php } ?>

			<li><?php echo $category_current->name; ?></li>
		</ul>
	</div>

	<section class="box-content no-padding">
		<div class="container">
			<h2 class="center"><span><?php echo ( is_archive('proyectos') ? get_field('titulo_menu',16) : '' ); ?></span></h2>

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
				<?php } */?>
			</form>
		</div>
	</section>

	<section class="box-content no-padding"> 
		<div class="container">

			<div class="row">
				<div class="col-12">

					<ul class="list-category">

						<?php foreach ( $categories as $category ){ ?>

							<li class="<?php if($category_current->term_id != $category->term_id): echo 'off'; endif; ?>">
								<a href="<?php echo get_term_link( $category->term_id); ?>" title="<?php echo $category->name; ?>">
									<img src="<?php the_field('icone', $category->taxonomy . '_' . $category->term_id ); ?>" alt="<?php echo $category->name; ?>">	
									<span style="color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>"><?php echo $category->name; ?></span>
								</a>
							</li>

						<?php } ?>

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

<?php get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript">
	$('.carousel-itens').owlCarousel({
		loop:false,
		margin:0,
		responsiveClass:true,
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

	/*var qtddot = $('.owl-dots').children().length;
	qtddot = (((qtddot*22)/2)+10)+'px';
	$('.owl-prev').css('margin-right',qtddot);
	$('.owl-next').css('margin-left',qtddot);*/
</script>