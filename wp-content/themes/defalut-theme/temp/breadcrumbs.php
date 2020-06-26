<?php //if( (!is_home()) && (!is_page('sair')) ){ ?>
<?php if( !is_home() ): ?>

	<div class="breadcrumbs">
		<div class="container">
			

			<?php // ASSOCIADOS
				if(get_post_type() == 'associado'): ?>
					<h4>ASSOCIADOS</h4>
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="HOME"><i class="fas fa-home"></i></a><span></span></li>
						<li><a href="<?php echo get_home_url(); ?>/associado" title="Associados">associados</a></li>

						<?php if(is_singular('associado')): ?>
							<li><span><?php echo the_title(); ?></span></li>
						<?php endif; ?>

						<?php if( $_GET['editar'] == 'perfil' ) : ?>
							<li><span>editar</span></li>
						<?php endif; ?>

						<?php if( $_GET['editar'] == 'senha' ) : ?>
							<li><span>alterar senha</span></li>
						<?php endif; ?>
					</ul>
				<?php endif;
			?>

			<?php // FÓRUM
				if(get_post_type() == 'forum'): ?>
					<h4>FÓRUM</h4>
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="HOME"><i class="fas fa-home"></i></a><span></span></li>
						<li><a href="<?php echo get_home_url(); ?>/forum" title="Fórum">fórum</a></li>

						<?php if( $_GET['post'] == 'novo' ) : ?>
							<li><span>novo post</span></li>
						<?php endif; ?>
						<!--<li><span class="">
							<?php 
								$categorias = wp_get_post_terms( $post->ID, 'category' );
								foreach ( $categorias as $categoria ) { ?>
									<a href="#" title=""><?php echo $categoria->name;
									
										if( next( $categorias ) ) {
											echo ', ';
										} ?>

									</a>
									
								<?php }
							?>	
						</span></li>-->

						<?php if(is_singular('forum')): ?>
							<li><span><?php echo the_title(); //$_SESSION['associado']['nome-completo']; ?></span></li>
						<?php endif; ?>
					</ul>
				<?php endif;
			?>


			<?php // SAIR
				if(is_page('sair')): ?>
					<h4>ASSOCIADOS</h4>
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="HOME"><i class="fas fa-home"></i></a><span></span></li>
						<li><a href="<?php echo get_home_url(); ?>/associado" title="Associados">associados</a></li>
					</ul>
				<?php endif;
			?>


			<?php // NOTÍCIAS
				if(is_singular('post')): ?>
					<h4>NOTÍCIAS</h4>
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="HOME"><i class="fas fa-home"></i></a><span></span></li>
						<li><a href="<?php echo get_home_url(); ?>/noticias" title="notícias">notícias</a></li>
						<li><span class="">
							<?php 
								$categorias = wp_get_post_terms( $post->ID, 'category' );
								foreach ( $categorias as $categoria ) { ?>
									<a href="#" title=""><?php echo $categoria->name;
									
										if( next( $categorias ) ) {
											echo ', ';
										} ?>

									</a>
									
								<?php }
							?>	
						</span></li>
					</ul>
				<?php endif;
			?>

		</div>
	</div>

<?php endif; ?>