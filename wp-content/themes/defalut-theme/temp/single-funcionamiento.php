<?php 
	get_header();

	while ( have_posts() ) : the_post();

		$term = wp_get_post_terms( $post->ID, 'categoria_funcionamiento' )[0]; 
		$term_id = $term->term_id;
?>

		<div class="breadcrumbs">
			<ul class="container">
				<li><a href="<?php echo get_home_url(); ?>" title="Início">Início</a></li>
				<li><a href="<?php echo get_home_url(); ?>/funcionamiento" title="<?php the_field('titulo_menu', 11); ?>"><?php the_field('titulo_menu', 11); ?></a></li>
				<li><a href="<?php echo get_term_link($term_id); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a></li>
				<li><?php the_title(); ?></li>
			</ul>
		</div>

		<section class="box-content"> 
			<div class="container">

				<h2 class="center no-uppercase"><span><?php the_title(); ?></span></h2>
				<?php /*if(get_field('content')){ ?>
					<p class="sub-tituto mini center"><?php the_field('content'); ?></p>
				<?php } */ ?>

			</div>
		</section>

		<section class="box-content no-padding-top">
			<div class="container">


				<?php get_template_part( 'content-funcionamiento-slide-interno', get_post_format() ); ?>


			</div>
		</section>	

	<?php endwhile;

	get_footer();
?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>

<script type="text/javascript">
	$('.funcionamiento').owlCarousel({
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