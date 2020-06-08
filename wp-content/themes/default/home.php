<?php get_header(); ?>

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
				<li>Blog</li>
			</ul>

		</div>
	</section>

	<section class="box-section section-mobile-full">
		<div class="container">

			<h1>A melhor experiência e retorno para o seu projeto</h1>

			<?php /*
			<ul class="list-category">
				<?php foreach ( $categories as $category ){ ?>

					<li>
						<a href="<?php echo get_term_link( $category->term_id); ?>" title="<?php echo $category->name; ?>">
							<?php echo $category->name; ?>
						</a>
					</li>

				<?php } ?>
			</ul>
			*/ ?>
		
			<?php
				$query = array(
						'posts_per_page'	=> 9,
						//'post_type' 	 	=> 'post',
						'category__not_in' => array(6,7,8),
						//'category_name'  => 'na-midia'
					);
				query_posts( $query );
			?>
		
			<div class="row no-padding list-post blog">
				<?php while ( have_posts() ) : the_post();

					get_template_part( 'content', '' );

				endwhile; ?>
			</div>
			
			<?php if($wp_query->max_num_pages > 1){ ?>
				<div class="row no-padding list-post blog row-load-more">

				</div>

				<div class="row no-padding list-post projetos">

					<div class="col-12 center">
						<button class="load-more btn btn-mais extra transparente cinza-claro" var-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" var-taxonomy="category" var-category="" var-post-type="post" var-paged="2" var-max-paged="<?php echo $wp_query->max_num_pages; ?>" var-not-category="6,7" id="load-more">
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
	proj_height = $('.blog .col-4:first-child').width();
	$('.blog .article').height(proj_height);

	$(window).resize(function(){
		proj_height = $('.blog .col-4:first-child').width();
		$('.blog .article').height(proj_height);
	});
</script>