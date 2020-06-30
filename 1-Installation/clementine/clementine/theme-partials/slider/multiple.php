<?php

$multiple_slider = new WP_Query(

	array( 

		'cat' => _clementine_get_option_('adD_slide_category'),

		'category__not_in' => _clementine_get_option_('adD_slide_exclude_category'),

		'order' => _clementine_get_option_('adD_post_slider_order'),

		'showposts' => _clementine_get_option_('adD_slides_no')

	)

);

?>



<div class="post-slider multiple-slider">

	



	<?php if( $multiple_slider->have_posts() ) : while( $multiple_slider->have_posts() ) : $multiple_slider->the_post(); ?>



		<?php if( has_post_thumbnail() ) : ?>



			<article class="item">



				<?php the_post_thumbnail( 'clementine-fullheight-thumbnail', array('class' => 'img-responsive') ); ?>

				<div class="slider-content">

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



			</article>



		<?php endif; ?>



	<?php endwhile; endif; wp_reset_postdata(); ?>



</div>