 <?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); 
		$category_current = get_queried_object();
		$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'wide' ); ?>

		<section class="box-section no-padding full-height bg-imagem bg-mascara <?php if(get_field('video')){ echo 'video-single-servico mask-single-servico'; } ?>" style="background-image: url('<?php if(!get_field('video') AND $imagem[0]){ echo $imagem[0]; } ?>');">

			<?php if(get_field('video')){ ?>
				<video autoplay="true" loop="true" muted="true" class="">
					<source src="<?php the_field('video'); ?>" type="video/mp4">
				</video>
			<?php } ?>

			<div class="container">
				
				<div class="box-vertical vertical-bottom">
					<div class="conteúdo-vertical">
						
						<div class="box-destaque">
							<span class="titulo tit-single">
								<?php the_title(); ?>
							</span>

						</div>
					</div>
				</div>

			</div>
		</section>

		<section class="box-section breadcrumbs no-padding margin-top">
			<div class="container">

				<ul>
					<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
					<li><span>></span></li>
					<li><a href="<?php echo get_home_url(); ?>/blog" title="Blog">Blog</a></li>
					<li><span>></span></li>
					<li><?php the_title(); ?></li>
				</ul>

			</div>
		</section>

		<section class="box-section">
			<div class="container">

				<div class="row">
					<div class="col-12">

						<div class="conteudo">							
							<?php the_content(); ?>
						</div>

						<?php
						$query = array(
								'posts_per_page'	=> 3,
								'post_type' 	 	=> 'post',
								'post__not_in'		=> array( $post->ID ),
								'order'    => 'ASC'
							);
						query_posts( $query );

						if( have_posts() ){ ?>

							<ul class="outro-conteudo">
								<li><span>Outros conteúdos:</span></li>

								<?php while ( have_posts() ) : the_post(); ?>
									
									<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>

								<?php endwhile;
								wp_reset_query(); ?>
								
							</ul>

						<?php } ?>
					</div>
				</div>

			</div>
		</section>



		<?php
		$category = wp_get_post_terms( $post->ID, 'category' )[0];
		//var_dump($category);
		$query = array(
				'posts_per_page'	=> 2,
				'post_type' 	 	=> 'post',
				'category'			=> $category->taxonomy,
				'category_name'  	=> $category->slug,
				'post__not_in'		=> array( $post->ID ),
				'orderby' => 'rand',
				'order'    => 'ASC'
			);
		query_posts( $query );

		if( have_posts() ){ ?>

			<section class="box-section margin-top outros-blogs">
				<div class="container">
							
					<h2>
						Leia mais
						<a href="https://ederton.com.br/preview/2pra1/blog" class="btn mini no-padding transparente cinza-claro position-right">ver todos</a>
					</h2>

				</div>
			</section>

			<section class="box-section no-padding-top section-mobile-full">
				<div class="container">
					
					<div class="row no-padding list-post blog outros-blogs">

						<?php while ( have_posts() ) : the_post();

							$row = 1;
							get_template_part( 'content', '' );

						endwhile;
						wp_reset_query(); ?>

					</div>

				</div>
			</section>

		<?php } ?>

	<?php endwhile; ?>

<?php get_footer(); ?>

<script type="text/javascript">

	$(document).ready(function(){
		$('.article').height($('.article:first-child').width());
	});

	$(window).resize(function(){
		$('.article').height($('.article:first-child').width());
	})

</script>