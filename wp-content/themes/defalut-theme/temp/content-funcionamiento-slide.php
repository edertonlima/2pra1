
			
										<div class="row">										
											<div class="col-6">

												<?php if(get_the_title()){ ?>
													<div class="conteudo-texto cont-left">
														<div class="link-mais margin-top-10 margin-bottom-20">
															<a href="<?php the_permalink(); ?>">
																<h4 class="link link-bloco">
																	<?php the_title(); ?>
																</h4>
															</a>
														</div>
													</div>
												<?php } ?>												

												<div class="funcionamiento funcionamiento-navegacao owl-carousel owl-theme owl-loaded">
													<div class="owl-stage-outer">
														<div class="owl-stage">

															<?php 
																if( have_rows('itens-funcionamiento') ):
																	while ( have_rows('itens-funcionamiento') ) : the_row(); ?>


																		<div class="owl-item">
																			<div class="conteudo-texto cont-left">

																				<?php //if(is_singular('funcionamiento')){

																					if(get_sub_field('titulo')){ ?>
																						<h3 class="center"><?php the_sub_field('titulo'); ?></h3>
																					<?php } ?>

																				<?php // } ?>
																				
																				<p class="justify"><?php the_sub_field('texto'); ?></p>

																			</div>
																		</div>


																		<?php
																	endwhile;
																endif;
															?>

														</div>
													</div>
												</div>

											</div>

											<div class="col-6">
												<div class="conteudo-texto cont-right">

													<?php 
														$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide-funcionamiento' ); 
														if($imagem[0]){ ?>
															<img src="<?php echo $imagem[0]; ?>">
														<?php }
													?>

													<?php 
														/*
														$imagem = get_field('imagem-funcionamiento');
														<img src="<?php echo esc_url($imagem['sizes']['slide-funcionamiento']); ?>" alt="">
														*/
													?>

												</div>
											</div>

										</div>



