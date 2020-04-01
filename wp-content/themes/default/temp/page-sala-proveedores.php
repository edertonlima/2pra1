<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="breadcrumbs">
			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li>Sala de Proveedores</li>
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
										<h2 class="">Sala de <br> Proveedores</h2>
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

						<h2 class="center"><span>CONTACTO</span></h2>
						<p class="sub-tituto mini justify">
							El Departamento de Compras y Contrataciones agradece su interés en querer ser Proveedor de OCP Ecuador S. A. y formar parte de nuestro grupo de Aliados Estratégicos.
							<br><br>
							Aquellos proveedores que ya han trabajado o participado anteriormente en algún proceso de compras, deberán de igual manera llenar el formulario y enviar sus documentos para actualización de datos.
							<br><br>
							Este canal está diseñado para dar la información necesaria a las empresas y de esta manera puedan solicitar su calificación y registro.
							<br><br>
							<i>Por favor siga lo siguientes pasos:</i>
						</p>

						<ul class="container-mini list-cont">
							<li>1. Se deberán adjuntar en un archivo PDF los siguientes documentos actualizados:</li>

							<li>2. Llenar el Formulario de Matriculación Proveedores (<a href="#">FMP</a>):</li>

							<li>3. Para proveedores Nacionales, llenar y firmar por la persona habilitada para tal efecto, el <a href="#">Formato de Transferencia Bancaria Nacional.</a></li>

							<li>4. Para proveedores Internacionales, llenar y firmar por la persona habilitada para tal efecto el <a href="#">Formato de Transferencia Bancaria Internacional</a>, en inglés <a href="#">Wire Transfer Instructions.</a></li>

							<li>5. Para todos los proveedores llenar <a href="#">Formulario de declaración de origen lícito de bienes o recursos económicos</a>.</li>
						</ul>

						<p class="sub-tituto mini justify">Para mayor información contactarse con el departamento de compras: (593 2) 2973-200, ext. 5280
							<br><br>
						Formulario de contacto:</p>


						<form class="contacto" id="contacto" action="javascript:" method="post">
							<fieldset>
								<label for="nombre">Nombre de la Empresa o Razón Social*</label>
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
								<label for="Ciudad">Ciudad*</label>
								<input type="text" name="Ciudad" id="Ciudad">
							</fieldset>

							<fieldset>
								<label for="País">País*</label>
								<input type="text" name="País" id="País">
							</fieldset>

							<fieldset>
								<label for="Página Web">Página Web*</label>
								<input type="text" name="Página Web" id="Página Web">
							</fieldset>

							<fieldset>
								<label for="nombre-contacto">Nombre del contacto para solicitudes de cotización*</label>
								<input type="text" name="nombre-contacto" id="nombre-contacto">
							</fieldset>

							<fieldset>
								<label for="email">Correo electrónico*</label>
								<input type="text" name="email" id="email">
							</fieldset>

							<fieldset>
								<label for="mensaje">Producto/Servicio que oferece (breve descripción) 600 caracteres max*</label>
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