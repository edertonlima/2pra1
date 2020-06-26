<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="breadcrumbs">
			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li><a href="<?php echo get_home_url(); ?>/servicios" title="">Servicios</a></li>
				<li><?php the_title(); ?></li>
			</ul>
		</div>

		<section class="box-content"> 
			<div class="container">

				<h2 class="center"><span>RUTA DE LAS ESTACIONES</span></h2>
				<p class="sub-tituto center">Mapa interactivo de la ruta de las estaciones y sus caracerísticas básicas</p>

			</div>
		</section>

		<section class="box-content no-padding-top servicios det-servicios"> 
			<div class="img-topo">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-servicios-1.jpg">
			</div>
		</section>		

			<div class="cd-h-timeline js-cd-h-timeline margin-bottom-md">
				<div class="container">
					<div class="cd-h-timeline__container">
						<div class="cd-h-timeline__dates">
							<div class="cd-h-timeline__line">
								<ol>
									<li><button type="button" data-date="01/01/2019" class="cd-h-timeline__date cd-h-timeline__date--selected"></button></li>
									<li><button type="button" data-date="02/01/2019" class="cd-h-timeline__date"></button></li>
									<li><button type="button" data-date="03/01/2019" class="cd-h-timeline__date"></button></li>
								</ol>

								<span class="cd-h-timeline__filling-line" aria-hidden="true"></span>
							</div>
						</div>

						<ul style="opacity: 0;">
							<li><a href="#0" class="text-replace cd-h-timeline__navigation cd-h-timeline__navigation--prev">Prev</a></li>
							<li><a href="#0" class="text-replace cd-h-timeline__navigation cd-h-timeline__navigation--next">Next</a></li>
						</ul>
					</div>
				</div>

				<div class="cd-h-timeline__events">

					<div class="link-nav">
						<a href="javascript:" class="link-timeline prev-timeline" style="display: none;">
							<i class="fas fa-chevron-left"></i>
						</a>
						<a href="javascript:" class="link-timeline next-timeline">
							<i class="fas fa-chevron-right"></i>
						</a>
					</div>
					
					<ol>

						<li class="cd-h-timeline__event cd-h-timeline__event--selected text-component">
							<div class="cd-h-timeline__event-content">

							<h2 class="center"><span>TERMINAL AMAZONAS</span></h2>
							<p class="sub-tituto center">Estación de Bombeo 01</p>

								<div class="img-timeline">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-funcionamento-1.jpg">
								</div>
								
								<div class="text-timeline">

									<div class="link-mais margin-top-10 margin-bottom-20">
										<h4 class="link link-bloco">
											¿Cómo funciona una Estación de Bombeo?
										</h4>
									</div>

									<p class="">
La operación de transporte de crudo pesado del OCP se inicia con el arribo del hidrocarburo de los usuarios –por medio de
oleoductos secundarios– a la estación Amazonas, a 5 kilómetros de la ciudad de Nueva Loja.

<br><br>Al llegar a la estación pasa por un sistema de medición del crudo mediante el cual se cuantifica el ingreso del producto que
entrega cada empresa. Luego de este proceso el crudo es enviado a uno de los cuatro tanques de almacenamiento, la
capacidad total neta de la estación es de 1'200.000 barriles.

<br><br>Para iniciar el transporte, el crudo pesado es calentado indirectamente por un sistema de recirculación de aceite térmico e
intercambio de calor, además, las bombas principales dan el impulso necesario para que el crudo tenga la presión suficiente
para iniciar el recorrido.
									</p>	
								</div>					
							</div>
						</li>

						<li class="cd-h-timeline__event">
							<div class="cd-h-timeline__event-content">

							<h2 class="center"><span>TERMINAL AMAZONAS</span></h2>
							<p class="sub-tituto center">Estación de Bombeo 01</p>

								<div class="img-timeline">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-funcionamento-2.jpg">
								</div>
								
								<div class="text-timeline">

									<div class="link-mais margin-top-10 margin-bottom-20">
										<h4 class="link link-bloco">
											¿Cómo funciona una Estación de Bombeo?
										</h4>
									</div>

									<p class="">
										Al llegar el crudo a Esmeraldas finaliza su viaje. El Terminal Marítimo de OCP, ubicado en Punta Gorda, a 15 kilómetros de la ciudad de Esmeraldas, tiene la capacidad de recibir el crudo y almacenar 3 millones 750 mil barriles en sus instalaciones.
										<br><br>El Terminal Marítimo de OCP tiene un área marina que se inicia con las tuberías que conectan a los tanques de almacenamiento con las válvulas de cierre de Emergencia y control de "ujo, de allí se conectan con el PLEM (Pipe Line end Manifold). El sistema de carga es por gravedad.
										<br><br>Desde el PLEM salen dos strings de mangueras submarinas que se conectan cada una con una boya: Charlie o Papa. Desde cada monoboya sale dos strings de mangueras "otantes de 24” y 16” que se conectan con el buque tanquero. Esta operación es controlada desde la Sala de Control del Terminal.
										<br><br>Los buques son amarrados con la participación de SUINBA y los capitanes de amarre y carga del Terminal, cumpliendo con las normas OCIMF e ISGOTT.
									</p>	
								</div>					
							</div>
						</li>

						<li class="cd-h-timeline__event">
							<div class="cd-h-timeline__event-content">

							<h2 class="center"><span>TERMINAL AMAZONAS</span></h2>
							<p class="sub-tituto center">Estación de Bombeo 01</p>

								<div class="img-timeline">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-funcionamento-3.jpg">
								</div>
								
								<div class="text-timeline">

									<div class="link-mais margin-top-10 margin-bottom-20">
										<h4 class="link link-bloco">
											¿Cómo funciona una Estación de Bombeo?
										</h4>
									</div>

									<p class="">
										Al llegar el crudo a Esmeraldas finaliza su viaje. El Terminal Marítimo de OCP, ubicado en Punta Gorda, a 15 kilómetros de la ciudad de Esmeraldas, tiene la capacidad de recibir el crudo y almacenar 3 millones 750 mil barriles en sus instalaciones.
										<br><br>El Terminal Marítimo de OCP tiene un área marina que se inicia con las tuberías que conectan a los tanques de almacenamiento con las válvulas de cierre de Emergencia y control de "ujo, de allí se conectan con el PLEM (Pipe Line end Manifold). El sistema de carga es por gravedad.
										<br><br>Desde el PLEM salen dos strings de mangueras submarinas que se conectan cada una con una boya: Charlie o Papa. Desde cada monoboya sale dos strings de mangueras "otantes de 24” y 16” que se conectan con el buque tanquero. Esta operación es controlada desde la Sala de Control del Terminal.
										<br><br>Los buques son amarrados con la participación de SUINBA y los capitanes de amarre y carga del Terminal, cumpliendo con las normas OCIMF e ISGOTT.
									</p>	
								</div>					
							</div>
						</li>

					</ol>
				</div> 
			</div>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/horizontal-timeline/util.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/horizontal-timeline/swipe-content.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/horizontal-timeline/main.js"></script>

<script type="text/javascript">

	$('.prev-timeline').click(function(){
		ele = $('.cd-h-timeline__date--selected').parent().prev();
		$('button',ele).trigger( 'click' );

		if(!ele.prev().length){
			$(this).hide();
		}

		if(ele.next().length){
			$('.next-timeline').show();
		}
	});

	$('.next-timeline').click(function(){
		ele = $('.cd-h-timeline__date--selected').parent().next();
		$('button',ele).trigger( 'click' );

		if(!ele.next().length){
			$(this).hide();
		}

		if(ele.prev().length){
			$('.prev-timeline').show();
		}
	});

	$(document).ready(function(){

		setTimeout(function(){
			height_img_timeline = 0;
			$('.img-timeline img').each(function() {
				item_height = $(this).height(); //alert(item_height);
				
				if(item_height > height_img_timeline){
					height_img_timeline = item_height;
				}
			});

			height_img_timeline = height_img_timeline+20;
			$('.link-nav').css('top', height_img_timeline);
		}, 1000);

	});

</script>
