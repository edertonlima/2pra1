<?php 
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb' );
	$category = wp_get_post_terms( $post->ID, 'category' )[0];
?>

<div class="col-4">
	<div class="article bg-imagem" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');">
		<a href="<?php the_permalink(); ?>" class="conteudo-list">
				
			<span class="top"><?php echo $category->name; ?></span>
			<div class="box-vertical vertical-bottom">
				<div class="conteúdo-vertical">
					<h2><?php the_title(); ?></h2>
				</div>
			</div>

		</a>
	</div>
</div>