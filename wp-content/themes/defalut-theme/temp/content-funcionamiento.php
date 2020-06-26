<div class="owl-item">
	<div class="row">
	
		<div class="col-6">
			<div class="conteudo-texto cont-left">
				<?php if(!get_field('ocultar-titulo') and (!is_singular('funcionamiento'))){ ?>
					<h3 class="center"><?php the_title(); ?></h3>
				<?php } ?>
																	
				<p class="justify"><?php the_field('content'); ?></p>
			</div>
		</div>

		<div class="col-6">
			<div class="conteudo-texto cont-right">
				<?php 
					$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide-funcionamiento' ); 
					if($imagem[0]){ ?>
						<img src="<?php echo $imagem[0]; ?>">
					<?php }
				?>
			</div>
		</div>

	</div>
</div>