<?php get_header(); ?>

	<section class="box-section breadcrumbs">
		<div class="container">

			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li><span>></span></li>
				<li>Projetos</li>
			</ul>

		</div>
	</section>

	<section class="box-section section-mobile-full">
		<div class="container">

			<h1>A melhor experiência<br>e retorno para o seu projeto</h1>
			
			<?php /*
			<div class="row no-padding list-post projetos">

				<div class="col-12">
					<ul class="filtro-list">
						<li>todos</li>

						<?php
						$args = array(
						    'taxonomy'      	=> 'categoria_projetos',
						    'parent'        	=> 0, // get top level categories
						    'orderby'       	=> 'name',
						    'order'         	=> 'ASC',
						    'hide_empty'      	=> false
						);
						$categories = get_categories( $args );

						foreach ( $categories as $category ){ ?>
							<li>
								<a href="<?php echo get_term_link( $category->term_id); ?>" title="<?php echo $category->name; ?>">
								<?php echo $category->name; ?>
								</a>
							</li>
						<?php } ?>

					</ul>
				</div>
			</div>
			*/ ?>

			<div class="row no-padding list-post projetos">

				<?php while ( have_posts() ) : the_post(); 

					get_template_part( 'content', 'list-projeto' );

				endwhile; ?>

			</div>
			
			<?php if($wp_query->max_num_pages > 1){ ?>
				<div class="row no-padding list-post projetos row-load-more">

				</div>

				<div class="row no-padding list-post projetos">

					<div class="col-12 center">
						<button class="load-more-projetos btn btn-mais extra transparente cinza-claro" var-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" var-taxonomy="categoria_projetos" var-category="" var-post-type="projetos" var-paged="2" var-max-paged="<?php echo $wp_query->max_num_pages; ?>" id="load-more">
							mais
						</button>
					</div>

				</div>
			<?php } ?>

		</div>
	</section>

<?php get_footer(); ?>

<script type="text/javascript">
	proj_height = $('.projetos .col-4:first-child').width();
	$('.projetos .article').height(proj_height);

	$(window).resize(function(){
		proj_height = $('.projetos .col-4:first-child').width();
		$('.projetos .article').height(proj_height);
	});
</script>