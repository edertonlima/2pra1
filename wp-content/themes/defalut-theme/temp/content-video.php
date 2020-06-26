	<?php
		$category = wp_get_post_terms( $post->ID, 'categoria_proyectos' )[0];
	?>

	<div class="item-prensa video">

		<?php 
			$video_array = get_field('video');
			preg_match('/src="(.+?)"/', $video_array, $matches);
			$video_url = $matches[1];

				$video_id = explode("embed/", $video_url);
				$video_id = $video_id[1];
				$video_id = explode("?feature=oembed", $video_id);
				$video_id = $video_id[0];
				$thumbnail="https://img.youtube.com/vi/".$video_id."/maxresdefault.jpg";
		?>	

		<a data-fancybox href="<?php echo $video_url; ?>" class="capa">
			<img src="<?php echo $thumbnail; ?>">

			<div class="mask" style="background-color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>"></div>
		</a>

		<div class="box-bg-content bg-claro">
			<span class="data-prensa" style="color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>">
				<?php echo get_the_date(); ?>
			</span>
			
			<a data-fancybox href="<?php echo $video_url; ?>" title="<?php the_title(); ?>" class="titulo-prensa" onmouseover = "this.style.color = '<?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>'" onmouseout="this.style.color = '#4a4a4a'">
				<?php the_title(); ?>
			</a>
			
			<span class="categoria-prensa" style="color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>">
				<i class="fas fa-circle" style="color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>"></i>
				<?php echo $category->name; ?>
			</span>
		</div>

	</div>