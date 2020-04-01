<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'wide-medium' ); ?>

<div class="col-12">
	<div class="article bg-imagem" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');">
		<div class="conteudo-list">
			
			<h2 class="teste"><?php the_title(); ?></h2>
			<h3><?php the_field('subtitulo'); ?></h3>
			<a href="<?php the_permalink(); ?>" class="btn extra transparente" title="Descrubra">Descrubra</a>

		</div>
	</div>
</div>