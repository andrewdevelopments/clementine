<?php
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 3,
		'ignore_sticky_posts' => true,
		'orderby' => 'rand'
	);
	$random_posts = new WP_Query($args); ?>
	<div class="main">

		<div class="row grid masonry">
			<?php if( $random_posts->have_posts() ) : while( $random_posts->have_posts() ) : $random_posts->the_post(); ?>

				<?php
				$format = get_post_format();
				if( $format == false ) : $format = 'default'; endif;
				?>
				
				<div class="block c-4">
					<?php get_template_part( 'theme-partials/content/' . $format ); ?>
				</div>

			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
				
	</div>