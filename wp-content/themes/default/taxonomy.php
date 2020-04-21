<?php get_header(); ?>
<?php $category_current = get_queried_object(); ?>

	<section class="box-section breadcrumbs">
		<div class="container">

			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li><span>></span></li>
				<li><a href="<?php echo get_post_type_archive_link('projetos'); ?>" title="Projetos">Projetos</a></li>
				<li><span>></span></li>
				<li><?php echo $category_current->name; ?></li>
			</ul>

		</div>
	</section>

	<section class="box-section">
		<div class="container">

			<h1><?php echo ucfirst($category_current->name); ?></h1>
			
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

				<?php 		
				$row = 0;		
				while ( have_posts() ) : the_post(); 

					//for ($i=0; $i < 3; $i++) { 
						$row++; 
						get_template_part( 'content', 'list-projeto' );
					//}

				endwhile; ?>

			</div>

			<?php if($wp_query->max_num_pages > 1){ ?>
				<div class="row no-padding list-post projetos row-load-more">

				</div>

				<div class="row no-padding list-post projetos">

					<div class="col-12 center">
						<button class="load-more btn btn-mais extra transparente cinza-claro" var-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" var-taxonomy="<?php echo $category_current->taxonomy; ?>" var-category="<?php echo $category_current->term_id; ?>" var-post-type="projetos" var-paged="2" var-max-paged="<?php echo $wp_query->max_num_pages; ?>" id="load-more">
							mais
						</button>
						<?php //<a href="" class="btn btn-mais extra transparente cinza-claro">mais</a> ?>
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