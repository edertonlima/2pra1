<?php get_header(); ?>
<?php $category = get_queried_object(); //var_dump($category); ?>
		
	<div class="breadcrumbs">
		<ul>
			<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
			<li><?php echo $category->label; ?></li>
		</ul>
	</div>

	<section class="box-content"> 
		<div class="container">

			<div class="row">
				<div class="col-12">

					<h2 class="center"><span>PROYECTOS DE GRAN IMPACTO</span></h2>

					<ul class="list-category">
						<li class="<?php //if($category->term_id != 2): echo 'off'; endif; ?>">
							<a href="<?php echo get_term_link(2); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-aporte-1.png" align="">
								<span class="cor3">Educación</span>
							</a>
						</li>
						<li class="<?php //if($category->term_id != 3): echo 'off'; endif; ?>">
							<a href="<?php echo get_term_link(3); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-aporte-2.png" align="">
								<span class="laranja">Salud</span>
							</a>
						</li>
						<li class="<?php //if($category->term_id != 4): echo 'off'; endif; ?>">
							<a href="<?php echo get_term_link(4); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-aporte-3.png" align="">
								<span class="verde-limao">Productividad</span>
							</a>
						</li>
						<li class="<?php //if($category->term_id != 5): echo 'off'; endif; ?>">
							<a href="<?php echo get_term_link(5); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-aporte-4.png" align="">
								<span class="lilas">Otros</span>
							</a>
						</li>
					</ul>

					<p class="text-destaque center"><br><br>No se encontraron proyectos</p>

				</div>
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