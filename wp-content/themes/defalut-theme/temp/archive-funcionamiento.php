<?php get_header(); ?>
<?php $category = get_queried_object(); //var_dump($category); ?> 

	<div class="breadcrumbs">
		<ul class="container">
			<li><a href="<?php echo get_home_url(); ?>" title="Home">Início</a></li> 
			<li><?php the_field('titulo_menu', 11); ?></li>
		</ul>
	</div>


	<?php if( have_rows('conteudo_flexivel', 11) ):
		while( have_rows('conteudo_flexivel', 11) ): the_row();

			switch (get_row_layout()) {
				case 'conteudo': ?>

					<section class="box-content no-padding-top"> 
						<div class="container">

							<?php if(get_sub_field('titulo')){ ?>
								<h2 class="center"><span><?php the_sub_field('titulo'); ?></span></h2>
							<?php } ?>

							<?php if(get_sub_field('subtitulo')){ ?>
								<p class="sub-tituto center"><?php the_sub_field('subtitulo'); ?></p>
							<?php } ?>

							<?php if(get_sub_field('texto')){ ?>
								<div class="conteudo-texto margin-top-40"><?php the_sub_field('texto'); ?></div>
							<?php } ?>

						</div>
					</section>	

				<?php break;

				case 'video': ?>

					<section class="box-content no-padding-top prensa prensa-list">
						<div class="container">
									
							<div class="row conteudo-texto">
								<div class="col-m-2 col-8 item-list-prensa video">

										<?php 
											$video_array = get_sub_field('video');
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
										</a>

								</div>
							</div>

						</div>
					</section>

				<?php break;

				case 'imagem': ?>

					<section class="box-content no-padding-top">
						<?php if(get_sub_field('tamanho-imagem')){ ?>
							<div class="container">
						<?php } ?>

							<div class="conteudo-texto <?php if(get_sub_field('tamanho-imagem')){ echo 'full'; } ?>">
								<?php $image = get_sub_field('imagem'); ?>
								<img src="<?php echo esc_url($image['sizes']['slide']); ?>">
							</div>

						<?php if(get_sub_field('tamanho-imagem')){ ?>
							</div>
						<?php } ?>
					</section>	

				<?php break;

				case 'arquivo': ?>

					<section class="box-content no-padding-top">
						<div class="container">

							<div class="link-mais center">
								<a href="<?php the_sub_field('arquivo'); ?>" target="_blank" title="<?php the_sub_field('titulo-arquivo'); ?>" class="link link-bloco">
									<?php the_sub_field('titulo-arquivo'); ?>
								</a>
							</div>

						</div>
					</section>	

				<?php break;

				case 'slide-destaque':

					$images = get_sub_field('imagens-slide'); ?>

					<section class="box-content no-padding-top">
						<div class="slide">

							<div id="slide" class="carousel slide" data-ride="carousel" data-interval="80000">
								<ol class="carousel-indicators">
							        <?php 
							        	$slide_elem = 0;
							        	foreach( $images as $image ): ?>
							        		<li data-target="#slide" data-slide-to="<?php echo $slide_elem; ?>" class="<?php if($slide_elem == 0){ echo 'active'; } ?>"></li>
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

								<div class="text-item">				
									<div class="vertical-center">
										<div class="content-vertical">
											<span class="titulo-slide active">
												<?php the_sub_field('texto-destaque'); ?>
											</span>
										</div>
									</div>
								</div>
							</div>

						</div>
					</section>

				<?php break;

			}
		
		endwhile;
	endif; ?>


	<section class="box-content no-padding-top servicios list-servicios"> 
		<div class="container">

			<div class="row">

				<?php
					$args = array(
					    'taxonomy'      	=> 'categoria_funcionamiento',
					    'parent'        	=> 0, // get top level categories
					    'orderby'       	=> 'name',
					    'order'         	=> 'ASC',
					    'hide_empty'      	=> false
					);
					$categories = get_categories( $args );

					foreach ( $categories as $category ){ ?>

						<div class="col-4">
							<div class="item-servicios center">
								<img src="<?php the_field('icone', $category->taxonomy . '_' . $category->term_id ); ?>">
								<h4 class="uppercase"><?php echo $category->name; ?></h4>
							</div>
							<div class="link-mais margin-top-20 margin-bottom-40 center">
								<a href="<?php echo get_term_link( $category->term_id); ?>" title="Conoce" class="link link-bloco cor1">
									Conoce más
								</a>
							</div>
						</div>

					<?php }
				?>

			</div>

		</div>
	</section>


<?php /*
				<?php while ( have_posts() ) : the_post(); ?>


		<section class="box-content no-padding-top"> 
			<div class="container">

				<div class="row">
					<div class="col-12 center">
						<div class="row-mini block-center">

							<?php while ( have_rows('arquivo_downloads') ) : the_row();

								$arquivo = get_sub_field('arquivo');
								$filesize = filesize( get_attached_file( $arquivo['ID'] ) );
								$filesize = size_format($filesize, 2); ?>

								<div class="col-4">
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
								</div>

	 						<?php endwhile; ?>

						</div>
					</div>
				</div>

			</div>
		</section>

		<?php if( get_field('titulo_info') ): ?>
			<section class="box-content"> 
				<div class="container">

					<div class="row">
						<div class="col-12">

							<h2 class="center"><span><?php the_field('titulo_info'); ?></span></h2>
							<?php if( get_field('descricao_info') ): ?>
								<p class="sub-tituto mini"><?php the_field('descricao_info'); ?></p>
							<?php endif; ?> 
						</div>

					</div>

				</div>
			</section>
		<?php endif; ?> 

		<?php if( have_rows('itens_info') ): ?>
			<section class="box-content"> 
				<div class="container">

					<div class="row">

						<?php while ( have_rows('itens_info') ) : the_row(); ?>
							<div class="col-3">
								<div class="operacion-segura operacion-segura-header">
									<img src="<?php the_sub_field('icone'); ?>" align="">
									<h4 style="color: <?php the_sub_field('cor'); ?>">
										<?php the_sub_field('titulo'); ?>
									</h4>
								</div>
								<div class="operacion-segura operacion-segura-footer txt2">
									<?php the_sub_field('descricao'); ?>
								</div>
							</div>
						<?php endwhile; ?>

					</div>

				</div>
			</section>
		<?php endif; ?>
		

				<?php endwhile; ?>
*/ ?>


<?php get_footer(); ?>

<?php /*
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/horizontal-timeline/util.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/horizontal-timeline/swipe-content.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/horizontal-timeline/main.js"></script>

<script type="text/javascript">

	$(document).ready(function(){	

		height_header = 0;
		$('.operacion-segura-header').each(function() {
			height_item_header = $(this).height();
			
			if(height_item_header > height_header){
				height_header = height_item_header;
				//alert(height_header);
			}
		});	

		setTimeout(function(){ 
			$('.operacion-segura-header').height(height_header);
		}, 1000);

	});


	$('.prev-timeline').click(function(){
		ele = $('.cd-h-timeline__date--selected').parent().prev();
		$('button',ele).trigger( 'click' );			
	});

	$('.next-timeline').click(function(){
		ele = $('.cd-h-timeline__date--selected').parent().next();
		$('button',ele).trigger( 'click' );			
	});

</script>
*/ ?>