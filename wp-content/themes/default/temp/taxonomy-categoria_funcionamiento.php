<?php 
	get_header();
	$term_id = get_queried_object_id();
	$description = get_queried_object()->description;
	$term = get_queried_object();  
	$image = get_field('imagem-taxonomy', $taxonomy . '_' . $term_id ); 
?>

	<div class="breadcrumbs">
		<ul class="container">
			<li><a href="<?php echo get_home_url(); ?>" title="Início">Início</a></li>
			<li><a href="<?php echo get_home_url(); ?>/funcionamiento" title="<?php the_field('titulo_menu', 11); ?>"><?php the_field('titulo_menu', 11); ?></a></li>
			<li><?php single_term_title(); ?></li>
		</ul>
	</div>

	<section class="box-content"> 
		<div class="container">

			<h2 class="center"><span><?php the_field('titulo-taxonomy', $taxonomy . '_' . $term_id ); ?></span></h2>
			<p class="sub-tituto mini center"><?php echo $description; ?></p>

		</div>
	</section>

	<section class="box-content no-padding-top">
		<div class="container">

			<div class="funcionamiento owl-carousel owl-theme owl-loaded" id="funcionamiento">
				<div class="owl-stage-outer">
					<div class="owl-stage">

						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'content-funcionamiento', get_post_format() );

							endwhile;
						?>

					</div>
				</div>
			</div>

		</div>
	</section>	

<?php get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>

<script type="text/javascript">
	$('#funcionamiento').owlCarousel({
		loop:false,
		margin:60,
		responsiveClass:true,
		nav:true,
		dots: false,
		navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
		//rtl:true,
		responsive:{
			0:{
				items:1,
				nav:true
			}
		}
	})
/*
	var qtddot = $('.owl-dots').children().length;
	qtddot = (((qtddot*22)/2)+10)+'px';
	$('.owl-prev').css('margin-right',qtddot);
	$('.owl-next').css('margin-left',qtddot);
*/
</script>