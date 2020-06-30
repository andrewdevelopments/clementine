<?php

$boxed_slider = new WP_Query(

	array( 

		'cat' => _clementine_get_option_('adD_slide_category'),

		'category__not_in' => _clementine_get_option_('adD_slide_exclude_category'),

		'order' => _clementine_get_option_('adD_post_slider_order'),

		'showposts' => _clementine_get_option_('adD_slides_no')

	)

);

?>



<div class="container">

	<div class="row">

		<div class="c-12">

			

			<div class="post-slider boxed-slider">

				

				<?php if( $boxed_slider->have_posts() ) : while( $boxed_slider->have_posts() ) : $boxed_slider->the_post(); ?>



					<?php if( has_post_thumbnail() ) : ?>



						<article class="item">



							<?php the_post_thumbnail( 'clementine-fullwidth-thumbnail', array('class' => 'img-responsive') ); ?>

							<div class="container">

								<div class="row">

									<div class="c-6 offset-3">



										<div class="slider-content">

											<!-- Category -->

											<div class="category"><?php clementine_categories(); ?></div>

											<!-- End Category -->

															

											<!-- Title -->

											<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

											<!-- End Title -->

															

											<div class="post-meta">



												<!-- Author -->

												<div class="author">

													<?php if( _clementine_get_option_('adD_author_image')['url'] != '' ) : ?>

													<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>" title="<?php if( _clementine_get_option_('adD_author_name') ) : echo _clementine_get_option_('adD_author_name'); endif; ?>">

														<img src="<?php echo esc_url( _clementine_get_option_('adD_author_image')['url'] ); ?>" alt="<?php if( _clementine_get_option_('adD_author_name') ) : echo _clementine_get_option_('adD_author_name'); endif; ?>" width="30" height="30">

													</a>

													<?php else : ?>

														<?php echo get_avatar( get_the_author_meta('email'), '30' ); ?>

													<?php endif; ?>

												</div>

												<!-- End Author -->



												<!-- Date -->

												<div class="date">

													<span><?php echo _e( '<i class="fa fa-clock-o"></i> ', 'clementine' ); ?>

														<?php echo human_time_diff( esc_attr( get_the_time('U') ), current_time('timestamp') ) . ' ' . esc_html__('ago', 'clementine'); ?>

														<?php //the_time(get_option('date_format')); ?>

													</span>

												</div>

												<!-- End Date -->



											</div>

											

										</div>



									</div>

								</div>

							</div>



						</article>



					<?php endif; ?>



				<?php endwhile; endif; wp_reset_postdata(); ?>



			</div>



		</div>

	</div>

</div>