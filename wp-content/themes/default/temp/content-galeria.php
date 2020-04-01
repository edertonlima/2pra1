<?php
	global $row_proj;
	$category = wp_get_post_terms( $post->ID, 'categoria_proyectos' )[0];

	if($row_proj <= 3){ 
		$size = 'list-post';
	}else{
		$size = 'galeria-post';
	}
	
	$images = get_field('galeria'); 
?>

<div class="item-prensa galeria">
	<div class="carousel-itens owl-carousel owl-theme owl-loaded">
		<div class="owl-stage-outer">
			<div class="owl-stage"> 

					<?php if(count($images) > 1){
						foreach( $images as $image ): ?>

							<div class="owl-item">
								<div class="capa">
									<img src="<?php echo esc_url($image['sizes'][$size]); ?>">
								</div>
							</div>

						<?php endforeach;
					}else{ ?>

						<a href="<?php the_permalink(); ?>" class="owl-item capa" title="<?php the_title(); ?>">
							<img src="<?php echo esc_url($images[0]['sizes'][$size]); ?>">
							<div class="mask" style="background-color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>"></div>
							<i class="far fa-file-image"></i>
						</a>

					<?php } ?>

			</div>
		</div>
	</div>

	<div class="box-bg-content bg-claro">
		<span class="data-prensa" style="color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>">
			<?php echo get_the_date(); ?>
		</span>
		
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="titulo-prensa" onmouseover = "this.style.color = '<?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>'" onmouseout="this.style.color = '#4a4a4a'">
			<?php the_title(); ?>
		</a>
				
		<span class="categoria-prensa" style="color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>">
			<i class="fas fa-circle" style="color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>"></i>
			<?php echo $category->name; ?>
		</span>
	</div>

</div>