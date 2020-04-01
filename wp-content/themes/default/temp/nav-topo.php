<nav class="nav nav-topo">
	<ul>
		<li class="rede-social">
			<a href="https://www.facebook.com/ocpecuadorsa " title="" target="_blank"><i class="fab fa-facebook-f"></i></a>
		</li>
		<li class="rede-social">
			<a href="https://www.youtube.com/user/ocpecuador" title="" target="_blank"><i class="fab fa-youtube"></i></a>
		</li>
		<li class="rede-social last-rede-social">
			<a href="https://twitter.com/ocpecuador" title="" target="_blank"><i class="fab fa-twitter"></i></a>
		</li>

		<li class="">
			<a href="<?php echo get_home_url(); ?>" title="">SALA DE CLIENTES</a>
		</li>
		<li class="">
			<a href="<?php echo get_permalink(get_page_by_path('sala-de-prensa')); ?>" title="" class="<?php if ( is_page('sala-de-prensa') ) : echo 'ativo'; endif ?>">SALA DE PRENSA</a>
		</li>
		<li class="">
			<a href="<?php echo get_permalink(get_page_by_path('contactenos')); ?>" title="" class="<?php if ( is_page('contactenos') ) : echo 'ativo'; endif ?>">CONTÁCTENOS</a>
		</li>
	</ul>

	<ul class="idiomas">
		<li style="display: none;">
			<a href="<?php echo get_home_url(); ?>" title=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/idiomas-en.jpg" alt="EN"><span>EN</span></a>
		</li>

		<li>
			<a href="<?php echo get_home_url(); ?>" title=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/idiomas-es.jpg" alt="ES"><span>ES</span></a>
		</li>
	</ul>
</nav>