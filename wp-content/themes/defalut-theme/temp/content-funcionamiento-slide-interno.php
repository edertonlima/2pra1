

			<div class="funcionamiento owl-carousel owl-theme owl-loaded" id="">
				<div class="owl-stage-outer">
					<div class="owl-stage">

						<?php 
							if( have_rows('itens-funcionamiento-interno') ):
								while ( have_rows('itens-funcionamiento-interno') ) : the_row();
									$imagem = get_sub_field('imagem'); ?>

									<div class="owl-item">
										<div class="row">
										
											<div class="col-6">
												<div class="conteudo-texto cont-left">

													<?php if(is_singular('funcionamiento')){
														if(get_sub_field('titulo')){ ?>
															<h3 class="center"><?php the_sub_field('titulo'); ?></h3>
														<?php }

													}else{ ?>

														<div class="link-mais margin-top-10 margin-bottom-20">
															<a href="<?php the_permalink(); ?>">
																<h4 class="link link-bloco">
																	<?php the_title(); ?>
																</h4>
															</a>
														</div>

													<?php } ?>
													
													<p class="justify"><?php the_sub_field('texto'); ?></p>
												</div>
											</div>

											<div class="col-6">
												<div class="conteudo-texto cont-right">
													<img src="<?php echo esc_url($imagem['sizes']['slide-funcionamiento']); ?>" alt="">
												</div>
											</div>

										</div>
									</div>

									<?php
								endwhile;
							endif;
						?>

					</div>
				</div>
			</div>