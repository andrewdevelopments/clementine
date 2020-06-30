<?php get_header(); ?>

	<?php if( _clementine_get_option_('adD_google_map_on_all') == '1' && _clementine_get_option_('adD_post_slider') == 'map' ) : ?>

		<?php get_template_part( 'theme-partials/google-map' ); ?>

	<?php else : ?>

		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

			<?php $attachment = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'clementine-single' ) ?>

			<?php

			$quoteName = get_post_meta( $post->ID, '_format_quote_source_name', true);

			$quoteUrl = get_post_meta( $post->ID, '_format_quote_source_url', true);

			?>

			<div <?php if( $attachment[0] ) : echo 'class="section-large" style="background: url('. $attachment[0] .');"'; else : echo 'class="section-large noimage"'; endif; ?>>

				<div class="container">

					<div class="row">

						<div class="c-12">

							

							<!-- Post Category -->

							<div class="category"><?php clementine_categories(); ?></div>

							<!-- End Post Category -->

							

							<!-- Post Title -->

							<?php if( $quoteName ) : ?>

								<h1 class="post-title"><?php echo $quoteName; ?></h1>

								<p class="quote-author"><?php echo $quoteUrl; ?></p>

							<?php else : ?>

								<h1 class="post-title"><?php the_title(); ?></h1>

							<?php endif; ?>

							<!-- End Post Title -->

							

							<!-- Post Meta -->

							<div class="post-meta">



								<span>

									<?php echo _e( '<i class="fa fa-clock-o"></i> ', 'clementine' ); ?>

									<?php echo human_time_diff( esc_attr( get_the_time('U') ), current_time('timestamp') ) . ' ' . esc_html__('ago', 'clementine'); ?>

									<?php //the_time(get_option('date_format')); ?>

								</span>



								<span class="views">

									<i class="fa fa-eye"></i>

									<?php echo views::get( get_the_ID() ); ?>

								</span>



								<span class="like">

									<?php echo get_simple_likes_button( get_the_ID() ); ?>

								</span>



								<?php if( _clementine_get_option_('adD_general_options')['hide-comments'] != 1 ) : ?>

									<span class="comments">

										<a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comment"></i><?php echo clementine_count_comments( get_the_ID() ); ?></a>

									</span>

								<?php endif; ?>



							</div>

							<!-- End Post Meta -->

							

						</div>

					</div>

				</div>

			</div>

		<?php endwhile; endif; ?>

	<?php endif; ?>



	<div class="container <?php if( !has_post_thumbnail() ) : echo 'no-attachment'; endif; ?>">

		<div class="row">



			<?php $post_sidebar = get_post_meta( $post->ID, 'sidebar_dropdown', true ); ?>



			<?php if( _clementine_get_option_('adD_post_sidebar_position') == 'left' && _clementine_get_option_('adD_post_type') != 'full' ) : ?> 

				<div class="c-4">

					<?php if( empty($post_sidebar) ) : ?>

						<?php get_sidebar(); ?>

					<?php else : ?>

						<aside id="sidebar">

							<?php dynamic_sidebar( $post_sidebar ); ?>

						</aside>

					<?php endif; ?>

				</div>

			<?php endif; ?>



			<div class="main <?php if( _clementine_get_option_('adD_post_type') == 'full' ) : echo 'c-12'; else : echo 'c-8'; endif; ?>">



				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

					<?php if( _clementine_get_option_('adD_google_map_on_all') == '1' && _clementine_get_option_('adD_post_slider') == 'map' ) : ?>

						<?php
						$quoteName = get_post_meta( $post->ID, '_format_quote_source_name', true);
						$quoteUrl = get_post_meta( $post->ID, '_format_quote_source_url', true);
						?>

						<div class="section-large noimage with-map">
							<!-- Post Category -->
							<div class="category"><?php clementine_categories(); ?></div>
							<!-- End Post Category -->
													
							<!-- Post Title -->
							<?php if( $quoteName ) : ?>
								<h1 class="post-title"><?php echo $quoteName; ?></h1>
								<p class="quote-author"><?php echo $quoteUrl; ?></p>
							<?php else : ?>
								<h1 class="post-title"><?php the_title(); ?></h1>
							<?php endif; ?>
							<!-- End Post Title -->
													
							<!-- Post Meta -->
							<div class="post-meta">
													
								<span>
									<?php echo _e( '<i class="fa fa-clock-o"></i> ', 'clementine' ); ?>
									<?php echo human_time_diff( esc_attr( get_the_time('U') ), current_time('timestamp') ) . ' ' . esc_html__('ago', 'clementine'); ?>
									<?php //the_time(get_option('date_format')); ?>
								</span>
													
								<span class="views">
									<i class="fa fa-eye"></i>
									<?php echo views::get( get_the_ID() ); ?>
								</span>
													
													
								<span class="like">
									<?php echo get_simple_likes_button( get_the_ID() ); ?>
								</span>
													
													
								<?php if( _clementine_get_option_('adD_general_options')['hide-comments'] != 1 ) : ?>
									<span class="comments">
										<a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comment"></i><?php echo clementine_count_comments( get_the_ID() ); ?></a>
									</span>
								<?php endif; ?>
													
							</div>
							<!-- End Post Meta -->

							<?php if( has_post_thumbnail() ) : ?>
								<!-- Normal media -->
								<div class="post-media">
									<?php the_post_thumbnail( 'clementine-default-thumbnail', array('class' => 'img-responsive') ); ?>
								</div>
								<!-- End Normal media -->
							<?php endif; ?>
						</div>

					<?php endif; ?>



					<?php views::set( get_the_ID() ); ?>



					<?php

					$format = get_post_format();

					if( $format == false ) : $format = 'default'; endif;



					get_template_part( 'theme-partials/content/' . $format );

					?>

					

				<?php endwhile; endif; ?>

			</div>



			<?php if( _clementine_get_option_('adD_post_sidebar_position') == 'right' && _clementine_get_option_('adD_post_type') != 'full' ) : ?> 

				<div class="c-4">

					<?php if( empty($post_sidebar) ) : ?>

						<?php get_sidebar(); ?>

					<?php else : ?>

						<aside id="sidebar">

							<?php dynamic_sidebar( $post_sidebar ); ?>

						</aside>

					<?php endif; ?>

				</div>

			<?php endif; ?>



		</div>



<?php get_footer(); ?>