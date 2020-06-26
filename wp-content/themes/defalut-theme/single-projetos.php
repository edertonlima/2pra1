<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<section class="box-section breadcrumbs">
			<div class="container">

				<ul>
					<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
					<li><span>></span></li>
					<li><a href="<?php echo get_home_url(); ?>/Projetos" title="Projetos">Projetos</a></li>
					<li><span>></span></li>
					<li><?php the_title(); ?></li>
				</ul>

			</div>
		</section>

		<section class="box-section">
			<div class="container">

				<div class="row">
					<div class="col-12">
						
						<h1 class="no-margin"><?php the_title(); ?></h1>
						<div class="conteudo cont-destaque">
							<p><?php the_field('subtitulo'); ?></p> 
						</div>

					</div>
				</div>

			</div>
		</section>

		<section class="box-section section-mobile-full">
			<div class="container">

				<div class="row no-padding list-post">
					<div class="col-12">

						<div class="article article-full <?php if(!get_field('texto-destaque-imagem')){ echo 'no-hover color'; } ?>">

							<?php 
							$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'wide' );
							if($imagem[0]){ ?>
								<img src="<?php echo $imagem[0]; ?>" alt="<?php the_field('texto-destaque-imagem'); ?>">
							<?php } ?>

							<?php if(get_field('texto-destaque-imagem')){ ?>	
								<div class="conteudo-list">
								
									<div class="box-vertical vertical-center">
										<div class="conteúdo-vertical">
											<h2><?php the_field('texto-destaque-imagem'); ?></h2>
										</div>
									</div>
									<span class="bottom"><?php the_field('legenda-destaque-imagem'); ?></span>
								
								</div>
							<?php } ?>
						</div>

					</div>
				</div>

				<div class="row">
					<div class="col-12">

						<article class="conteudo-post">

							<?php if( have_rows('conteudo_flexivel') ):
								while( have_rows('conteudo_flexivel') ): the_row();

									switch (get_row_layout()) {
										
										case 'titulo': ?>
											<h1 class="margin-top-2x"><?php the_sub_field('titulo'); ?></h1>
										<?php break;

										case 'texto-destaque': ?>
											<div class="conteudo margin-top">
												<h2 class="right"><?php the_sub_field('texto-destaque'); ?></h2>
											</div>
										<?php break;

										case 'texto': ?>
											<div class="conteudo margin-top">
												<p><?php the_sub_field('texto'); ?></p> 
											</div>
										<?php break;

										case 'imagem': ?>
											<?php $image = get_sub_field('imagem'); ?>
											<img class="margin-top" src="<?php echo esc_url($image['sizes']['wide']); ?>" alt="<?php the_title(); ?>">	
										<?php break;

									}
								
								endwhile;
							endif; ?>

							<?php if(get_field('processos')){ ?>
								<div class="conteudo cont-mini margin-top">
									<h2 class="ico-titulo">Processos</h2>
									<p><?php the_field('processos'); ?></p> 
								</div>
							<?php }

							if(get_field('galeria')){
								$images = get_field('galeria');
								
								if(count($images) > 0){
									foreach( $images as $image ): ?>

										<img class="margin-top" src="<?php echo esc_url($image['sizes']['wide-medium']); ?>" alt="<?php the_title(); ?>">

									<?php endforeach;
								}
							} ?>

						</article>						
					
					</div>
				</div>

			</div>
		</section>


		<?php
		$category = wp_get_post_terms( $post->ID, 'categoria_projetos' )[0]; //var_dump($category);
		$query = array(
				'posts_per_page'	=> 3,
				'post_type' 	 	=> 'projetos',
				'taxonomy'			=> $category->taxonomy,
				'post__not_in'		=> array( $post->ID ),
				'terms'				=> $category->term_id,
				'orderby' => 'rand',
				'order'    => 'ASC'
			);
		query_posts( $query );

		if( have_posts() ){ ?>

			<section class="box-section no-padding-bottom outros-projetos">
				<div class="container">

					<h2>
						Outros projetos
						<a href="https://ederton.com.br/preview/2pra1/projetos" class="btn mini no-padding transparente cinza-claro position-right btn-ver-todos" title="ver todos">ver todos</a>
					</h2>

				</div>
			</section>

			<section class="box-section no-padding-top section-mobile-full">
				<div class="container">
							
					<div class="row no-padding list-post projetos outros-projetos">

						<?php while ( have_posts() ) : the_post();

							$row = 1;
							get_template_part( 'content', 'list-projeto' );

						endwhile;
						wp_reset_query(); ?>

					</div>

				</div>
			</section>

		<?php } ?>

	<?php endwhile; ?>

<?php get_footer(); ?>

<script type="text/javascript">
	proj_height = $('.projetos .col-4:first-child').width();
	$('.projetos .article').height(proj_height);

	$(window).resize(function(){
		proj_height = $('.projetos .col-4:first-child').width();
		$('.projetos .article').height(proj_height);
	});
</script>