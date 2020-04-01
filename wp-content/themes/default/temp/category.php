<?php get_header(); ?>
<?php $category = get_queried_object(); //var_dump($category); ?>
		
		<div class="breadcrumbs">
			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li><a href="<?php echo get_home_url(); ?>/sala-de-prensa" title="Sala de Prensa">Sala de Prensa</a></li>
				<li><?php echo $category->name; ?></li>
			</ul>
		</div>

		<section class="box-content"> 
			<div class="container">

				<div class="row">
					<div class="col-12">

						<h2 class="center"><span><?php echo $category->name; ?></span></h2>

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
							<li class="<?php if($category->term_id != 1): echo 'off'; endif; ?>">
								<a href="<?php echo get_term_link(1); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-prensa-1.png" align="">
									<span class="cor3">Prensa</span>
								</a>
							</li>
							<li class="<?php if($category->term_id != 6): echo 'off'; endif; ?>">
								<a href="<?php echo get_term_link(6); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-prensa-2.png" align="">
									<span class="laranja">Medios</span>
								</a>
							</li>
							<li class="<?php if($category->term_id != 7): echo 'off'; endif; ?>">
								<a href="<?php echo get_term_link(7); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-prensa-3.png" align="">
									<span class="verde-limao">Videos</span>
								</a>
							</li>
							<li class="<?php if($category->term_id != 8): echo 'off'; endif; ?>">
								<a href="<?php echo get_term_link(8); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-prensa-4.png" align="">
									<span class="lilas">Fotos</span>
								</a>
							</li>
							<li class="<?php if($category->term_id != 9): echo 'off'; endif; ?>">
								<a href="<?php echo get_term_link(9); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-prensa-5.png" align="">
									<span class="verde-claro">Documentación</span>
								</a>
							</li>
							<li class="off">
								<a href="<?php echo get_permalink(get_page_by_path('contactenos')); ?>" class="<?php if ( is_page('contactenos') ) : echo 'ativo'; endif ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-prensa-6.png" align="">
									<span class="">Contacto</span>
								</a>
							</li>
						</ul>

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




<?php /*
<?php $category = get_queried_object(); //var_dump($category); ?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide','option') ):
					$slide = 0;
					while ( have_rows('slide','option') ) : the_row();

						if(get_sub_field('imagem','option')){
							$slide = $slide+1; ?>

							<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem','option');?>')">

								<div class="box-height">
									<div class="box-texto">
										
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_projetos.png" alt="<?php echo $category->name; ?>" />
										<h2 class="title_page"><?php echo $category->name; ?></h2>

										<p class="texto"><?php the_sub_field('texto',$category->taxonomy.'_'.$category->term_id); ?></p>
										<?php if(get_sub_field('sub_texto',$category->taxonomy.'_'.$category->term_id)){ ?>
											<p class="sub-texto"><?php the_sub_field('sub_texto',$category->taxonomy.'_'.$category->term_id); ?></p>
										<?php } ?>

									</div>
								</div>
								
							</div>

						<?php }

					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				
				<?php for($i=0; $i<$slide; $i++){ ?>
					<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
				<?php } ?>
				
			</ol>

		</div>

		<ul class="ico-page">
			<?php
				$args = array(
				    'taxonomy'      => 'categoria_projeto',
				    'parent'        => 0,
				    'orderby'       => 'name',
				    'order'         => 'ASC',
				    'hierarchical'  => 1,
				    'pad_counts'    => 0
				);
				$categories = get_categories( $args );
				foreach ( $categories as $categoria ){ //var_dump($categoria); ?>

						<li>
							<a href="<?php echo get_term_link($categoria->term_id); ?>" title="<?php echo $categoria->name; ?>" class="cat_projeto <?php if($category->term_id != $categoria->term_id){ echo 'off'; } ?>">
								<img src="<?php the_field('ico_listagem',$categoria->taxonomy.'_'.$categoria->term_id); ?>" class="" alt="<?php echo $categoria->name; ?>"/>
								<span><?php echo $categoria->name; ?></span>
							</a>
						</li>

						<?php /*<li>
							<a href="javascript:" title="<?php echo $categoria->name; ?>" class="cat_projeto" rel="<?php echo $categoria->slug; ?>">
								<img src="<?php the_field('ico_listagem',$categoria->taxonomy.'_'.$categoria->term_id); ?>" class="" alt="<?php echo $categoria->name; ?>"/>
								<span><?php echo $categoria->name; ?></span>
							</a>
						</li>*/?>


					
				<?php
				/*}
			?>
		</ul>

	</div>
</section> */ ?>

<section class="box-content sombra">
	<div class="container">
		<div class="grid">
			<div class="grid-sizer"></div>

			<?php
				while ( have_posts() ) : the_post();
					//get_template_part( 'content-list-projetos', get_post_format() );
				endwhile;
			?>

		</div>
		<?php paginacao(); ?>

	</div>
</section>

<?php get_footer(); ?>







<?php /*
<?php get_header(); ?>

<?php $terms = get_queried_object(); ?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="controle-slide">
			<a class="left" href="#slide" role="button" data-slide="prev"></a>
			<a class="right" href="#slide" role="button" data-slide="next"></a>
		</div>
		<div class="carousel slide" data-ride="carousel" data-interval="1000000" id="slide">

			<div class="carousel-inner" role="listbox"> 

				<?php if( have_rows('slide_categoria',$terms->taxonomy.'_'.$terms->term_id) ):
					$slide = 0;
					while ( have_rows('slide_categoria',$terms->taxonomy.'_'.$terms->term_id) ) : the_row();

							$slide = $slide+1; ?>

							<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');"></div>

					<?php
					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				
				<?php 
					if($slide > 1){ 
						for($i=0; $i<$slide; $i++){ ?>
							<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
						<?php }
					}
				?>
				
			</ol>

		</div>
	</div>
</section>

<section class="box-content">
	<h2 class="bege"><?php single_term_title(); ?></h2>
	<div class="list-produto">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'content-list-produto', 'post' );

		endwhile;
		?>

	</div>
</section>


<?php get_footer(); ?>
*/ ?>