<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="breadcrumbs">
			<ul class="container">
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li>Quiénes Somos</li>
			</ul>
		</div>

		<section class="box-content"> 
			<div class="container">

				<div class="row">
					<div class="col-12">

						<h2 class="center"><span><?php the_title(); ?></span></h2>
						<p class="sub-tituto mini"><?php the_field('content'); ?></p>

					</div>
				</div>

			</div>
		</section>



<?php if( have_rows('mision') ): ?>
    <?php while( have_rows('mision') ): the_row(); 

    	$images = get_sub_field('imagens_mision'); ?>

		<section class="box-content no-padding">
			<div class="container">
				<div class="slide">

					<div id="slide-mision" class="carousel slide slide-quienes-somos" data-ride="carousel" data-interval="80000">
						<ol class="carousel-indicators">
					        <?php 
					        	$slide_elem = 0;
					        	foreach( $images as $image ): ?>
					        		<li data-target="#slide-mision" data-slide-to="<?php echo $slide_elem; ?>" class="<?php if($slide_elem == 0){ echo 'active'; } ?>"></li>
					        		<?php $slide_elem = $slide_elem+1;
					        	endforeach;
					        ?>
						</ol>

						<div class="carousel-inner">
					        <?php 
					        	$slide_elem = 0;
					        	foreach( $images as $image ): ?>
					        		<div class="carousel-item <?php if($slide_elem == 0){ echo 'active'; } ?>" style="background-image: url('<?php echo esc_url($image['sizes']['slide']); ?>');"></div>
					        	<?php $slide_elem = $slide_elem+1;
					        	endforeach;
					        ?>
						</div>

						<div class="mask-slide cor1 lg"></div>

						<div class="text-item text-fixo lg">				
							<div class="vertical-center">
								<div class="content-vertical">
									<span class="titulo-slide justify active">
										<h2 class="center extra-grande">MISIÓN</h2>
									</span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>

		<?php if(get_sub_field('texto_mision')){ ?>
			<div class="container">
				<section class="box-content bg-claro">	
					<p class="text-destaque grande">
						<?php the_sub_field('texto_mision'); ?>
					</p>
				</section>
			</div>
		<?php } ?>


    <?php endwhile; ?>
<?php endif; ?>



<?php if( have_rows('vision') ): ?>
    <?php while( have_rows('vision') ): the_row(); 

    	$images = get_sub_field('imagens_vision'); ?>

		<section class="box-content no-padding-bottom">
			<div class="container">
				<div class="slide">

					<div id="slide-vision" class="carousel slide slide-quienes-somos" data-ride="carousel" data-interval="80000">
						<ol class="carousel-indicators">
					        <?php 
					        	$slide_elem = 0;
					        	foreach( $images as $image ): ?>
					        		<li data-target="#slide-vision" data-slide-to="<?php echo $slide_elem; ?>" class="<?php if($slide_elem == 0){ echo 'active'; } ?>"></li>
					        		<?php $slide_elem = $slide_elem+1;
					        	endforeach;
					        ?>
						</ol>

						<div class="carousel-inner">
					        <?php 
					        	$slide_elem = 0;
					        	foreach( $images as $image ): ?>
					        		<div class="carousel-item <?php if($slide_elem == 0){ echo 'active'; } ?>" style="background-image: url('<?php echo esc_url($image['sizes']['slide']); ?>');"></div>
					        	<?php $slide_elem = $slide_elem+1;
					        	endforeach;
					        ?>
						</div>

						<div class="mask-slide cor1 lg"></div>

						<div class="text-item text-fixo lg">				
							<div class="vertical-center">
								<div class="content-vertical">
									<span class="titulo-slide justify active">
										<h2 class="center extra-grande">VISIÓN</h2>
									</span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>

		<?php if(get_sub_field('texto_vision')){ ?>
			<div class="container">
				<section class="box-content bg-claro">	
					<p class="text-destaque grande">
						<?php the_sub_field('texto_vision'); ?>
					</p>
				</section>
			</div>
		<?php } ?>


    <?php endwhile; ?>
<?php endif; ?>



<?php if( have_rows('valores') ): ?>
    <?php while( have_rows('valores') ): the_row(); 

    	$images = get_sub_field('imagens_valores'); ?>

		<section class="box-content no-padding-bottom">
			<div class="container">
				<div class="slide">

					<div id="slide-valores" class="carousel slide slide-quienes-somos" data-ride="carousel" data-interval="80000">
						<ol class="carousel-indicators">
					        <?php 
					        	$slide_elem = 0;
					        	foreach( $images as $image ): ?>
					        		<li data-target="#slide-valores" data-slide-to="<?php echo $slide_elem; ?>" class="<?php if($slide_elem == 0){ echo 'active'; } ?>"></li>
					        		<?php $slide_elem = $slide_elem+1;
					        	endforeach;
					        ?>
						</ol>

						<div class="carousel-inner">
					        <?php 
					        	$slide_elem = 0;
					        	foreach( $images as $image ): ?>
					        		<div class="carousel-item <?php if($slide_elem == 0){ echo 'active'; } ?>" style="background-image: url('<?php echo esc_url($image['sizes']['slide']); ?>');"></div>
					        	<?php $slide_elem = $slide_elem+1;
					        	endforeach;
					        ?>
						</div>

						<div class="mask-slide cor1 lg"></div>

						<div class="text-item text-fixo lg">				
							<div class="vertical-center">
								<div class="content-vertical">
									<span class="titulo-slide justify active">
										<h2 class="center extra-grande">VALORES</h2>
									</span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>

		<?php if(get_sub_field('texto_valores')){ ?>
			<div class="container">
				<section class="box-content bg-claro">	
					<p class="text-destaque grande">
						<?php the_sub_field('texto_valores'); ?>
					</p>
				</section>
			</div>
		<?php } ?>

    <?php endwhile; ?>
<?php endif; ?>



<?php if( have_rows('itens_info') ): ?>
<div class="container">
	<section class="box-content bg-claro">
		<ul class="icon-page itens-style-2 count-item-4">

			<?php while ( have_rows('itens_info') ) : the_row(); ?>
				<li>
					<img src="<?php the_sub_field('icone'); ?>" align="">
					<div class="vertical-center">
						<div class="content-vertical">
							<span class="titulo center" style="color: <?php the_sub_field('cor'); ?>">
								<?php the_sub_field('titulo'); ?>
							</span>
						</div>
					</div>
					<p><?php the_sub_field('descricao'); ?></p>
				</li>
			<?php endwhile; ?>

		</ul>
	</section>
</div>
<?php endif; ?> 



		<section class="box-content"> 
			<div class="container">

				<div class="row">
					<div class="col-12">

						<h2 class="center"><span><?php the_field('titulo_etica'); ?></span></h2>
						<p class="sub-tituto mini"><?php the_field('descricao_etica'); ?></p>

						<div class="link-mais margin-top-20 margin-bottom-40 center">
							<a href="<?php the_field('link_etica'); ?>" target="_blank" title="<?php the_field('titulo_link_etica'); ?>" class="link link-bloco">
								<?php the_field('titulo_link_etica'); ?>
							</a>
						</div>

						<div class="block-center">
							<?php $count_arquivo = 1; ?>
							<?php while ( have_rows('arquivos_etica') ) : the_row();
								$arquivo = get_sub_field('arquivo');
								$filesize = filesize( get_attached_file( $arquivo['ID'] ) );
								$filesize = size_format($filesize, 2); ?>

								<div class="item-block bg-claro">
									<span class="titulo center"><?php the_sub_field('titulo'); ?></span>
									<div class="link-mais margin-top-30">
										<a href="<?php echo $arquivo['url']; ?>" title="Código de Ética y política antifraude (PDF, 657 kB)" target="_blank" class="link cor3 center">
											<i class="fas fa-arrow-circle-down cor3"></i> 
											<?php the_sub_field('nome'); ?>
											<br>(<?php echo strtoupper($arquivo['subtype']) . ', ' . $filesize; ?>,)
										</a>
									</div>
								</div>

								<?php if($count_arquivo == 1){ ?>
									<div class="item-margin"></div>
								<?php } 
								$count_arquivo = $count_arquivo+1;
	 						endwhile; ?>
						</div>

					</div>
				</div>

			</div>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>