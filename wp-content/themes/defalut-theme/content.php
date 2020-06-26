<?php 
	//$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb' );
	$category = wp_get_post_terms( $post->ID, 'category' )[0];

	if(get_field('imagem-listagem-blog')){
		$imagem_array = get_field('imagem-listagem-blog');
		$imagem = $imagem_array['sizes']['thumb'];
	}else{
		$imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb' );
		$imagem = $imagem_array[0];
	}
?>

<div class="col-4">
	<div class="article bg-imagem" style="background-image: url('<?php if($imagem){ echo $imagem; } ?>');">

		<?php if((get_field('video-preview')) AND (get_field('video') != '')){ ?>
			
			<a data-fancybox href="<?php echo '#video-blog-'.$post->ID; ?>" class="conteudo-list" title="<?php the_title(); ?>">
				<span class="top"><?php echo $category->name; ?></span>
				<div class="box-vertical vertical-bottom">
					<div class="conteúdo-vertical">
						<i class="far fa-play-circle"></i>
						<?php //<h2><?php the_title(); </h2> ?>
					</div>
				</div>

				<video width="" height="" controls id="video-blog-<?php echo $post->ID; ?>" style="display:none;">
					<source src="<?php the_field('video'); ?>">
				</video>
			</a>

		<?php }else{ ?>

			<a href="<?php the_permalink(); ?>" class="conteudo-list" title="<?php the_title(); ?>">
				<span class="top"><?php echo $category->name; ?></span>
				<div class="box-vertical vertical-bottom">
					<div class="conteúdo-vertical">
						<h2><?php the_title(); ?></h2>
					</div>
				</div>
			</a>

		<?php } ?>
	</div>
</div>