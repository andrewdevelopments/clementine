<?php get_header(); ?>

	<?php if( _clementine_get_option_('adD_google_map_on_all') == '1' && _clementine_get_option_('adD_post_slider') == 'map' ) : ?>
		<?php get_template_part( 'theme-partials/google-map' ); ?>
	<?php endif; ?>

	<!-- Page Title -->

	<div class="section-page">

		<div class="container">

			<div class="row">

				<div class="c-12">

					<div class="post-header align-center">

						<h1><?php the_title(); ?></h1>

					</div>

				</div>

			</div>

		</div>

	</div>

	<!-- End Page Title -->

	

	<div class="container">

		<div class="row">

			<div class="main c-12">



				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

					

					<?php get_template_part( 'theme-partials/content/page' ); ?>



				<?php endwhile; endif; ?>

				

			</div>



			<div class="post-sharing c-12">

				<p><?php esc_html_e( 'Share this on', 'clementine' ); ?></p>

				<div class="post-share">
					<a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
						<i class="fa fa-facebook"></i>
						<?php echo esc_html_e( 'Facebook', 'clementine' ); ?>
					</a>
					<a class="twitter" target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20-%20<?php the_permalink(); ?>">
						<i class="fa fa-twitter"></i>
						<?php echo esc_html_e( 'Twitter', 'clementine' ); ?>
					</a>
					<a class="google" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
						<i class="fa fa-google-plus"></i>
						<?php echo esc_html_e( 'Google +', 'clementine' ); ?>
					</a>
					<a class="pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())) ); ?>">
						<i class="fa fa-pinterest-p"></i>
						<?php echo esc_html_e( 'Pinterest', 'clementine' ); ?>
					</a>
				</div>

			</div>

		</div>



<?php get_footer(); ?>