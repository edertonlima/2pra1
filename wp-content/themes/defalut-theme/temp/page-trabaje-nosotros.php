<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="breadcrumbs">
			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li>Trabaje con Nosotros</li>
			</ul>
		</div>

		<section class="box-content no-padding margin-top-15 contacto">
			<div class="container">
				<div class="slide">

					<div id="slide-mision" class="carousel slide slide-quienes-somos" data-ride="carousel" data-interval="80000">
						<ol class="carousel-indicators">
							<!--<li data-target="#slide-mision" data-slide-to="0" class="active"></li>-->
						</ol>

						<div class="carousel-inner">
							<div class="carousel-item active" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/bg-slide.jpg');">
							</div>
						</div>

						<div class="mask-slide cor1 lg"></div>

						<div class="text-item text-fixo lg">				
							<div class="vertical-center">
								<div class="content-vertical">
									<span class="titulo-slide justify active">
										<h2 class="">Trabaje con <br>Nosotros</h2>
									</span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>

		<section class="box-content"> 
			<div class="container">

				<div class="row">
					<div class="col-12">

						<h2 class="center"><span>TRABAJE CON NOSOTROS</span></h2>
						<p class="sub-tituto mini justify">
							El compromiso y entusiasmo de nuestra gente, permiten que nuestros sueños se cristalicen, sueños que van más allá de nuestra empresa y que buscan contribuir con el desarrollo de nuestro país. Déjanos saber si tú eres un profesional que quiere ser parte de este importante reto, porque por donde pasa OCP suceden cosas buenas!!!!
							<br><br>
							A través de este portal podemos conocerte, por favor llena el siguiente formulario y adjunta tu hoja de vida actualizada.
						</p>

						<form class="contacto" id="contacto" action="javascript:" method="post">
							<fieldset>
								<label for="nombre">Nombre*</label>
								<input type="text" name="nombre" id="nombre">
							</fieldset>

							<fieldset>
								<label for="telefono">Teléfono*</label>
								<input type="text" name="telefono" id="telefono">
							</fieldset>

							<fieldset>
								<label for="direccion">Dirección*</label>
								<input type="text" name="direccion" id="direccion">
							</fieldset>

							<fieldset>
								<label for="email">Correo electrónico*</label>
								<input type="text" name="email" id="email">
							</fieldset>

							<fieldset>
								<label for="mensaje">Mensaje*</label>
								<textarea name="mensaje" id="mensaje"></textarea>
							</fieldset>

							<fieldset>
								<p class="msg-form center off"></p>
								<button class="enviar right">ENVIAR</button>
							</fieldset>
						</form>

					</div>
				</div>

			</div>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>