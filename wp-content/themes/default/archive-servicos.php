<?php get_header(); ?>

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

			<h1>Serviços</h1>
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