
<?php 

	/*global $row;
	if($row%3){
		$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb-medium' );
		$class = 'col-6';
	}else{
		$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'wide-medium' );
		//$class = 'col-12';
	}*/

	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb-medium' );
	$class = 'col-4';

?>

<div class="<?php echo $class; ?>">
	<div class="article bg-imagem" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');">
		<a href="<?php the_permalink(); ?>" class="conteudo-list">
				
			<span class="top"><?php the_field('autor'); ?></span>
			<?php /*
			<div class="box-vertical vertical-center">
				<div class="conteúdo-vertical">
					<h2><?php the_field('texto-destaque-imagem'); ?></h2>
				</div>
			</div>
			*/ ?>
			<span class="bottom"><?php the_title(); ?></span>

		</a>
	</div>
</div>