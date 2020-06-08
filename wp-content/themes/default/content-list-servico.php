<?php 
	if(!get_field('video')){
		$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'wide-medium' );
	}
?>

<div class="col-12">
	<div class="article list-servico bg-imagem <?php if(get_field('video')){ echo 'video-servico'; } ?>" <?php if(!get_field('video')){ ?>style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');" <?php } ?>>
		
		<a href="<?php the_permalink(); ?>">
			<?php if(get_field('video')){ ?>
				<video autoplay="true" loop="true" muted="true">
					<source src="<?php the_field('video'); ?>" type="video/mp4">
				</video>
			<?php }else{ ?>

				<?php if($imagem[0]){ ?>
					<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="img-servico-mobile">
				<?php } ?>

			<?php } ?>

			<div class="conteudo-list">
				
				<h2 class=""><?php the_title(); ?></h2>
				<h3><?php the_field('subtitulo'); ?></h3>
				<span class="btn-in btn extra transparente">Descubra</span>

			</div>
		</a>

	</div>
</div>