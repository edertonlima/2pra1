<?php 
	get_header();
	$term_id = get_queried_object_id();
	$description = get_queried_object()->description;
	$term = get_queried_object(); //var_dump($term);
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

	<section class="box-content no-padding servicios det-servicios"> 
		<div class="img-topo">
			<img src="<?php echo esc_url($image['sizes']['slide']); ?>">
		</div>
	</section>	
	
	<section class="box-content no-padding-top time-line"> 
		<div class="cd-h-timeline js-cd-h-timeline margin-bottom-md"> 
			<div class="container">
				<div class="cd-h-timeline__container">
					<div class="cd-h-timeline__dates">
						<div class="cd-h-timeline__line">
							<ol>
								<?php 
									$nun_nav = 0;
									while ( have_posts() ) : the_post();
										$nun_nav = $nun_nav+1; ?>

										<li>
											<button type="button" data-date="<?php echo get_the_date('d/m/Y'); ?>" class="cd-h-timeline__date <?php if($nun_nav == 1){ echo 'cd-h-timeline__date--selected'; } ?>"></button>
										</li>

									<?php endwhile;
								?>
							</ol>

							<span class="cd-h-timeline__filling-line" aria-hidden="true"></span>
						</div>
					</div>

					<ul style="opacity: 0;">
						<li><a href="#0" class="text-replace cd-h-timeline__navigation cd-h-timeline__navigation--prev">Prev</a></li>
						<li><a href="#0" class="text-replace cd-h-timeline__navigation cd-h-timeline__navigation--next">Next</a></li>
					</ul>
				</div>
			</div>

			<div class="cd-h-timeline__events">

				<div class="container">
					<div class="link-nav">
						<a href="javascript:" class="link-timeline prev-timeline" style="">
							<i class="fas fa-chevron-left"></i>
						</a>
						<a href="javascript:" class="link-timeline next-timeline">
							<i class="fas fa-chevron-right"></i>
						</a>
					</div>
				</div>
				

					<ol>
						<?php 
							$nun_cont = 0;
							while ( have_posts() ) : the_post();
								$nun_cont = $nun_cont+1; ?>

								<li class="cd-h-timeline__event <?php if($nun_nav == 1){ echo 'cd-h-timeline__event--selected'; } ?> text-component">
									<div class="cd-h-timeline__event-content">

										<div class="container">

											<h2 class="center uppercase"><span><?php the_field('titulo-funcionamiento'); ?></span></h2>
											<p class="sub-tituto center"><?php the_field('subtitulo-funcionamiento'); ?></p>


											<?php get_template_part( 'content-funcionamiento-slide', get_post_format() ); ?>

										</div>

		<?php /*
										<div class="img-timeline">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-funcionamento-1.jpg">
										</div>
										
										<div class="text-timeline">

											<div class="link-mais margin-top-10 margin-bottom-20">
												<a href="<?php the_permalink(); ?>">
													<h4 class="link link-bloco">
														<?php the_title(); ?>
													</h4>
												</a>
											</div>

											<p class="">
		sadadadadadada
											</p>	
										</div>
		*/ ?>

									</div>
								</li>

							<?php endwhile;
						?>
					</ol>

							
			</div> 
		</div>
	</section>

<?php get_footer(); ?>


<script src="<?php echo get_template_directory_uri(); ?>/assets/js/horizontal-timeline/util.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/horizontal-timeline/swipe-content.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/horizontal-timeline/main.js"></script>


<script type="text/javascript">

	// nav timeline
	$('.prev-timeline').click(function(){
		ele = $('.cd-h-timeline__date--selected').parent().prev();
		$('button',ele).trigger( 'click' );

		if(!ele.prev().length){
			$(this).hide();
		}

		if(ele.next().length){
			$('.next-timeline').show();
		}
	});

	$('.next-timeline').click(function(){
		ele = $('.cd-h-timeline__date--selected').parent().next();
		$('button',ele).trigger( 'click' );

		if(!ele.next().length){
			$(this).hide();
		}

		if(ele.prev().length){
			$('.prev-timeline').show();
		}
	});

</script>


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