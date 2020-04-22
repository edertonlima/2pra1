<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post();
		$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'wide' ); ?>

		<section class="box-section no-padding full-height bg-imagem bg-mascara" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');">
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

		<section class="box-section breadcrumbs">
			<div class="container">

				<ul>
					<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
					<li><span>></span></li>
					<li><a href="javascript:" title="Serviços">Serviços</a></li>
					<li><span>></span></li>
					<li><?php the_title(); ?></li>
				</ul>

			</div>
		</section>

		<section class="box-section no-padding section-mobile-full">
			<div class="container">

				<div class="row">
					<div class="col-12">

<?php if( have_rows('conteudo_flexivel') ):
	$ele_video = 0;
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
				<div class="conteudo">
					<p><?php the_sub_field('texto'); ?></p> 
				</div>
			<?php break;

			case 'video': 
				$ele_video++;
				if(get_sub_field('capa-video')){ ?>
					</div>
				</div>
			</div>
		</section>

		<section class="box-section no-padding-top margin-top section-mobile-full">
			<div class="list-post">

				<?php 
					$capa_video = get_sub_field('capa-video');
					$video_array = get_sub_field('video');
					$video_html = false;
					
					if(preg_match(array('youtube','vimeo'), $video_array, $matches)){
						
						// youtube 
						preg_match('/src="(.+?)"/', $video_array, $matches);
						$video_url = $matches[1];

					}else{

						// video upload
						preg_match('/href="(.+?)"/', $video_array, $matches);
						$video_url = $matches[1];
						$video_html = true;					

						//echo '<pre>' . $video_url . '</pre>';
					}

					/*$video_id = explode("embed/", $video_url);
					$video_id = $video_id[1];
					$video_id = explode("?feature=oembed", $video_id);
					$video_id = $video_id[0];
					$thumbnail = "https://img.youtube.com/vi/".$video_id."/maxresdefault.jpg";*/
				?>						

				<div class="article list-servico bg-imagem no-hover video" style="background-image: url('<?php echo esc_url($capa_video['sizes']['wide']); ?>');">
					<div class="conteudo-list">
						
						<a data-fancybox href="<?php if($video_html){ echo '#video_html-'.$ele_video; }else{ echo $video_url; } ?>"><i class="far fa-play-circle"></i></a>

						<?php if($video_html){ ?>
							<video width="" height="" controls id="video_html-<?php echo $ele_video; ?>" style="display:none;">
								<source src="<?php echo $video_url; ?>">
							</video>
						<?php } ?>

					</div>
				</div>

			</div>

			<div class="container">
				<div class="row">
					<div class="col-12">

			<?php } break;

			case 'imagem': 
				if(get_sub_field('imagem')){ ?>
				<?php $image = get_sub_field('imagem'); ?>

					</div>
				</div>

				<div class="row list-post">
					<div class="col-12">
						<article class="article list-servico bg-imagem margin-top-2x" style="background-image: url('<?php echo esc_url($image['sizes']['wide-medium']); ?>');">
						</article>
					</div>
				</div>

				<div class="row">
					<div class="col-12">

			<?php } break;

		}
	
	endwhile;
endif; ?>

					</div>
				</div>

			</div>
		</section>



		<section class="box-section no-padding margin-top full-max-height bg-imagem bg-mascara vermelho" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/ab59cfed-0cc0-44ab-beb8-8874b94052b5c5572409-a018-4e8c-8301-8123efd765042f7a257e-ad8a-4898-a967-76587090ac49cima-carrinho.jpg');">
			<div class="container">
				
				<div class="box-vertical vertical-center">
					<div class="conteúdo-vertical">
						
						<div class="box-destaque">
							<span class="titulo">
								Vamos conversar!
							</span>
							<span class="subtitulo">
								Receba um relatório<br>completo para reduzir<br>seus custos
							</span>

							<a data-fancybox href="#demonstracao" class="btn extra-grande transparente" title="agende uma demonstração">agende uma demonstração</a>
						</div>
					</div>
				</div>

			</div>
		</section>


	<?php
	if(get_field('arquivo-ebook')){ 
		$image = get_field('imagem-ebook'); ?>

		<section class="box-section section-mobile-full">
			<div class="container">

				<h2 class="titulo">Acesse nosso conteúdo exclusivo</h2>
				<div class="row list-post">

					<div class="col-12">
						<div class="article bg-imagem no-hover e-book" style="background-image: url('<?php echo esc_url($image['sizes']['wide-medium']); ?>');">
							<div class="conteudo-list">
								
								<span>E-book</span>

								<div class="box-vertical vertical-bottom">
									<div class="conteúdo-vertical">
								
										<h3><?php the_field('titulo-ebook'); ?></h3>
										<a href="<?php the_field('arquivo-ebook'); ?>" target="_blank" class="btn largo transparente">baixar</a>

									</div>
								</div>

							</div>
						</div>
					</div>

				</div>

			</div>
		</section>

	<?php } ?>


	<?php endwhile; ?>

<?php get_footer(); ?>