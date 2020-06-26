<?php get_header(); ?>
<?php $category_current = get_queried_object(); ?>

	<section class="box-section breadcrumbs">
		<div class="container">

			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li><span>></span></li>
				<li><?php echo $category_current->name; ?></li>
			</ul>

		</div>
	</section>


	<?php // NOTÍCIAS
		$query = array(
				//'posts_per_page'	=> 9,
				'post_type' 	 	=> 'post',
				'category_name'  => 'noticias'
			);
		query_posts( $query );
	?>

	<section class="box-section section-mobile-full">
		<div class="container">

			<h1><?php echo get_cat_name(8); ?></h1>

			<div class="row no-padding list-post blog cat-especifica">
				<?php while ( have_posts() ) : the_post();

					get_template_part( 'content', '' );

				endwhile;
				wp_reset_query(); ?>
			</div>

			<?php /* if($wp_query->max_num_pages > 1){ ?>
				<div class="row no-padding list-post projetos row-load-more">

				</div>

				<div class="row no-padding list-post projetos">

					<div class="col-12 center">
						<button class="load-more btn btn-mais extra transparente cinza-claro" var-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" var-taxonomy="category" var-category="6" var-post-type="post" var-paged="2" var-max-paged="<?php echo $wp_query->max_num_pages; ?>" var-not-category="" id="load-more">
							mais
						</button>
						<?php //<a href="" class="btn btn-mais extra transparente cinza-claro">mais</a> ?>
					</div>

				</div>
			<?php } */?>

		</div>
	</section>
	

	<section class="box-section section-mobile-full">
		<div class="container">

			<h1><?php echo ucfirst($category_current->name); ?></h1>

			<div class="row no-padding list-post blog cat-especifica">
				<?php if( have_posts() ){
					while ( have_posts() ) : the_post();

						get_template_part( 'content', '' );

					endwhile; 
				}else{
					echo '<div class="col-12 center margin-top-2x"><p>Nenhum conteúdo encontrado.</p></div>';
				} ?>
			</div>

			<?php if($wp_query->max_num_pages > 1){ ?>
				<div class="row no-padding list-post blog cat-especifica row-load-more">

				</div>

				<div class="row no-padding list-post blog cat-especifica">

					<div class="col-12 center">
						<button class="load-more btn btn-mais extra transparente cinza-claro" var-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" var-taxonomy="category" var-category="7" var-post-type="post" var-paged="2" var-max-paged="<?php echo $wp_query->max_num_pages; ?>" var-not-category="" id="load-more">
							mais
						</button>
						<?php //<a href="" class="btn btn-mais extra transparente cinza-claro">mais</a> ?>
					</div>

				</div>
			<?php } ?>

		</div>
	</section>
	<?php wp_reset_query(); ?>


	<?php // NA MÍDIA
		$query = array(
				//'posts_per_page'	=> 9,
				'post_type' 	 	=> 'post',
				'category_name'  => 'na-midia'
			);
		query_posts( $query );
	?>

	<section class="box-section section-mobile-full">
		<div class="container">

			<h1><?php echo get_cat_name(6); ?></h1>

			<div class="row no-padding list-post blog cat-especifica">
				<?php while ( have_posts() ) : the_post();

					get_template_part( 'content', '' );

				endwhile;
				wp_reset_query(); ?>
			</div>

			<?php /* if($wp_query->max_num_pages > 1){ ?>
				<div class="row no-padding list-post projetos row-load-more">

				</div>

				<div class="row no-padding list-post projetos">

					<div class="col-12 center">
						<button class="load-more btn btn-mais extra transparente cinza-claro" var-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" var-taxonomy="category" var-category="6" var-post-type="post" var-paged="2" var-max-paged="<?php echo $wp_query->max_num_pages; ?>" var-not-category="" id="load-more">
							mais
						</button>
						<?php //<a href="" class="btn btn-mais extra transparente cinza-claro">mais</a> ?>
					</div>

				</div>
			<?php } */?>

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