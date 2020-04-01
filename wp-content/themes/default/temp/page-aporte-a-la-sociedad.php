<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="breadcrumbs">
			<ul class="container">
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Início</a></li> 
				<li><?php the_field('titulo_menu'); ?></li>
			</ul>
		</div>

		<section class="box-content no-padding">
			<div class="container">
				<h2 class="center"><span><?php the_title(); ?></span></h2>

				<form action="<?php echo home_url(); ?>" class="form-busca" method="get">
					<fieldset>
						<input type="text" name="s" id="search" placeholder="Buscar en el sitio…" value="<?php if(isset($_GET['s'])){ echo $_GET['s']; } ?>">
						<button type="submit" class="button"><i class="fas fa-search"></i></button>
					</fieldset>

					<?php /*if(is_search()){ ?>
						<div class="col-6">
							<span class="result">
								<span><?php _e( 'Resultados da pesquisa encontrados para', 'locale' ); ?>: "<?php the_search_query(); ?></span>
							</span>
						</div>
					<?php } */?>
				</form>
			</div>
		</section>

		<?php if( have_rows('itens_dados') ): ?>
			<section class="box-content no-padding-bottom">
				<div class="container">		
					<h2 class="center"><span><?php the_field('titulo_dados'); ?></span></h2>
				</div>
			</section>

			<section class="box-content bg-claro no-padding-top">
				<div class="container">
					
					<div class="row">
						<div class="col-12">

							<div class="conteudo-texto margin-top-30"><?php the_field('descricao_dados'); ?></div>
							<?php /* <p class="sub-tituto margin-top-30"><?php the_field('descricao_dados'); ?></p> */ ?>

							<ul class="icon-page count-item-5">

								<?php while ( have_rows('itens_dados') ) : the_row(); ?>

									<li>
										<img src="<?php the_sub_field('icone'); ?>" align="">
										<span class="titulo center"><span class="num" style="color: <?php the_sub_field('cor'); ?>"><?php the_sub_field('dados'); ?></span></span>
										<p class="destaque" style="color: <?php the_sub_field('cor'); ?>"><?php the_sub_field('titulo'); ?></p>
									</li>

		 						<?php endwhile; ?>

							</ul>

							<?php /*
							<div class="link-mais center">
								<a href="<?php echo get_home_url(); ?>/proyectos" title="Conoce más de nuestros logros" class="link cor1">
									<i class="fas fa-plus-circle cinza"></i> Conoce más de nuestros logros
								</a>
							</div>
							*/ ?>

						</div>
					</div>
				
				</div>
			</section>
		<?php endif; ?>


		<section class="box-content"> 
			<div class="container">

				<div class="row">
					<div class="col-12">

						<ul class="icon-page count-item-4 no-margin-top">

							<?php
								$args = array(
								    'taxonomy'      	=> 'categoria_proyectos',
								    'parent'        	=> 0, // get top level categories
								    'orderby'       	=> 'count',
								    'order'         	=> 'DESC',
								    'hide_empty'      	=> false
								);
								$categories = get_categories( $args );
								//$qtd_proj = count($categories);

								$count_post = wp_count_posts( 'proyectos' )->publish;
								$porc_post = (100/$count_post);
								$item_post = 1;

								foreach ( $categories as $category ){ ?>

									<li class="info-dados">
										<img src="<?php the_field('icone', $category->taxonomy . '_' . $category->term_id ); ?>">				
										<span class="titulo center" style="color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>">
											<span class="num" style="color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>">

												<?php //echo $category->category_count*$porc_post;
												if($item_post == 1){
													echo ceil($category->category_count*$porc_post) . '%';
													$item_post = 0;
												}else{
													echo round($category->category_count*$porc_post) . '%'; 
												} ?>

											</span>
											<?php echo $category->name; ?>
										</span>
									</li>

									<?php /* <a href="<?php echo get_term_link( $category->term_id); ?>" title="<?php echo $category->name; ?>" class=""> */?>

								<?php }
							?>

						</ul>

					</div>
				</div>

			</div>
		</section>


		<section class="box-content no-padding"> 
			<div class="container">

				<div class="row">
					<div class="col-m-1 col-10">

						<?php if(get_field('titulo_etica')){ ?>
							<h2 class="center"><span><?php the_field('titulo_etica'); ?></span></h2>
						<?php } ?>

						<?php if(get_field('descricao_etica')){ ?>
							<p class="margin-bottom-20"><?php the_field('descricao_etica'); ?></p>
						<?php } ?>

						<?php if(get_field('link_etica')){ ?>
						<div class="link-mais margin-bottom-40 center">
							<a href="<?php the_field('link_etica'); ?>" target="_blank" title="<?php the_field('titulo_link_etica'); ?>" class="link link-bloco">
								<?php the_field('titulo_link_etica'); ?>
							</a>
						</div>
						<?php } ?>

						<div class="block-center">
							<?php 
								$count_arquivo = 1;
								$count = count(get_field('arquivos_etica'));
							 ?>
							
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
											<br>(<?php echo strtoupper($arquivo['subtype']) . ', ' . $filesize; ?>)
										</a>
									</div>
								</div>

								<?php if($count_arquivo != $count){ ?>
									<div class="item-margin <?php echo 'item-count-'.$count; ?>"></div>
								<?php } 
								$count_arquivo = $count_arquivo+1;
	 						endwhile; ?>
						</div>

					</div>
				</div>

			</div>
		</section>


		<section class="box-content no-padding-bottom"> 
			<div class="container">

				<div class="row">
					<div class="col-12">

						<h2 class="center uppercase"><span><?php the_field('tit_proyectos'); ?></span></h2>

						<ul class="list-category">

							<?php foreach ( $categories as $category ){ ?>

								<li>
									<a href="<?php echo get_term_link( $category->term_id); ?>" title="<?php echo $category->name; ?>">
										<img src="<?php the_field('icone', $category->taxonomy . '_' . $category->term_id ); ?>" alt="<?php echo $category->name; ?>">	
										<span style="color: <?php the_field('cor_categoria', $category->taxonomy . '_' . $category->term_id ); ?>"><?php echo $category->name; ?></span>
									</a>
								</li>

							<?php } ?>

						</ul>
					</div>
				</div>

			</div>
		</section>


		<section class="box-content no-padding-top prensa prensa-list">
			<div class="container">

				<div class="row">

					<?php
						$prensa_list = array(
								'post_type' => 'proyectos'
							);
						query_posts( $prensa_list );

						if(have_posts()){

							//global $row_proj;
							//global $category;
							
							$row_proj = 0;
							while ( have_posts() ) : the_post(); 

								$row_proj = $row_proj+1; ?>

								<div class="<?php if($row_proj <= 3){ echo 'col-4'; }else{ echo 'col-6'; } ?> margin-bottom-60">

									<?php 	
										if(get_field('video')){

											get_template_part( 'content', 'video' );

										}else{
											if(get_field('galeria')){

												get_template_part( 'content', 'galeria' );

											}else{
												if(get_field('link')){

													get_template_part( 'content', 'link' );

												}else{
													if(get_field('arquivo')){

														get_template_part( 'content', 'arquivo' );

													}else{
														get_template_part( 'content', '' );
													}
												}
											}
										}
									?>
								
								</div>

							<?php endwhile;
							wp_reset_query();

						}else{ ?>

							<div class="col-12">
								<p class="text-destaque center"><br><br>No se encontraron entradas</p>
							</div>

						<?php }
					?>

					<?php //paginacao(); ?>

				</div>
			</div>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>


<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript">
	$('.carousel-itens').owlCarousel({
		loop:false,
		margin:0,
		responsiveClass:true,
		nav:true,
		navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
		//rtl:true,
		responsive:{
			0:{
				items:1,
				nav:true
			}
		}
	})

	/*var qtddot = $('.owl-dots').children().length;
	qtddot = (((qtddot*22)/2)+10)+'px';
	$('.owl-prev').css('margin-right',qtddot);
	$('.owl-next').css('margin-left',qtddot);*/
</script>