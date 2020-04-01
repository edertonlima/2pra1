<?php get_header(); ?>
<?php $category = get_queried_object(); //var_dump($category); ?>
		
		<div class="breadcrumbs">
			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li>Buscar</li>
				<li><?php echo $_GET['s']; ?></li>
			</ul>
		</div>

		<section class="box-content"> 
			<div class="container">

				<div class="row">
					<div class="col-12">

						<h2 class="center"><span>Sala de Prensa</span></h2>

						<form action="<?php echo home_url(); ?>" class="form-busca margin-top-20" method="get">
							<fieldset>
								<input type="text" name="s" id="search" placeholder="Buscar en el sitio…" value="<?php echo $_GET['s']; ?>">
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


						<ul class="list-category sala-prensa">
							<li class="<?php //if($category->term_id != 1): echo 'off'; endif; ?>">
								<a href="<?php echo get_term_link(1); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-prensa-1.png" align="">
									<span class="cor3">Prensa</span>
								</a>
							</li>
							<li class="<?php //if($category->term_id != 6): echo 'off'; endif; ?>">
								<a href="<?php echo get_term_link(6); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-prensa-2.png" align="">
									<span class="laranja">Medios</span>
								</a>
							</li>
							<li class="<?php //if($category->term_id != 7): echo 'off'; endif; ?>">
								<a href="<?php echo get_term_link(7); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-prensa-3.png" align="">
									<span class="verde-limao">Videos</span>
								</a>
							</li>
							<li class="<?php //if($category->term_id != 8): echo 'off'; endif; ?>">
								<a href="<?php echo get_term_link(8); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-prensa-4.png" align="">
									<span class="lilas">Fotos</span>
								</a>
							</li>
							<li class="<?php //if($category->term_id != 9): echo 'off'; endif; ?>">
								<a href="<?php echo get_term_link(9); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-prensa-5.png" align="">
									<span class="verde-claro">Documentación</span>
								</a>
							</li>
							<li class="">
								<a href="<?php echo get_permalink(get_page_by_path('contactenos')); ?>" class="<?php if ( is_page('contactenos') ) : echo 'ativo'; endif ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-prensa-6.png" align="">
									<span class="">Contacto</span>
								</a>
							</li>
						</ul>

						<?php /*<p class="text-destaque center"><br><br>No se encontraron entradas</p> */?>

					</div>
				</div>

			</div>
		</section>

		<section class="box-content prensa prensa-list">
			<div class="container">

				<div class="row">

					<?php
						if(have_posts()){
							while ( have_posts() ) : the_post(); ?>
								
								<div class="col-4 margin-bottom-60">

									<a href="<?php the_permalink(); ?>" class="capa" title="">
										<?php 
											$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'list-post' ); 
											if($imagem[0]){ ?>
												<img src="<?php echo $imagem[0]; ?>">
											<?php }
										?>
									</a>
									<span class="data-prensa"><?php echo get_the_date(); ?></span>
									<a href="<?php the_permalink(); ?>->name;" title="" class="titulo-prensa">
										<?php the_title(); ?>
									</a>
									<span class="categoria-prensa">
										<i class="fas fa-circle"></i>
										<?php 
											$categorias = wp_get_post_terms( $post->ID, 'category' );
											foreach ( $categorias as $categoria ) { ?>										
												<?php echo $categoria->name . '; ';
											}	
										?>
									</span>

								</div>

							<?php endwhile;
						}else{ ?>

							<div class="col-12">
								<p class="text-destaque center"><br><br>No se encontraron entradas</p>
							</div>

						<?php }
					?>

					<?php paginacao(); ?>

				</div>
			</div>
		</section>

<?php get_footer(); ?>