<?php

$fullwidth_slider = new WP_Query(

	array( 

		'cat' => _clementine_get_option_('adD_slide_category'),

		'category__not_in' => _clementine_get_option_('adD_slide_exclude_category'),

		'order' => _clementine_get_option_('adD_post_slider_order'),

		'showposts' => _clementine_get_option_('adD_slides_no')

	)

);

?>



<div class="post-slider slider-fullwidth">

	



	<?php if( $fullwidth_slider->have_posts() ) : while( $fullwidth_slider->have_posts() ) : $fullwidth_slider->the_post(); ?>



		<?php if( has_post_thumbnail() ) : ?>



			<article class="item">



				<?php the_post_thumbnail( 'clementine-full-slider', array('class' => 'img-responsive') ); ?>

				<div class="slider-content">

					<div class="container">

						<div class="row">

							<div class="c-12">

								

								<!-- Category -->

								<div class="category"><?php clementine_categories(); ?></div>

								<!-- End Category -->

				

								<!-- Title -->

								<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

								<!-- End Title -->

				

								<div class="post-meta">



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