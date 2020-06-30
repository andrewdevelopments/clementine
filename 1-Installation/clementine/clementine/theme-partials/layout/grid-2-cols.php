<div class="container">
	<div class="row">

		<?php if( _clementine_get_option_('adD_sidebar_position') == 'left' ) : ?>
			<div class="c-4">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>

		<div class="main <?php if( _clementine_get_option_('adD_sidebar_position') == 'left' || _clementine_get_option_('adD_sidebar_position') == 'right' ) : echo 'c-8'; endif; ?>">

			<div class="row grid masonry">
				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

					<?php
					$format = get_post_format();
					if( $format == false ) : $format = 'default'; endif;
					?>
					
					<div class="block c-6">
						<?php get_template_part( 'theme-partials/content/' . $format ); ?>
					</div>

				<?php endwhile; endif; ?>
			</div>
					
			<!-- Pagination -->
			<?php clementine_pagination(); ?>
			<!-- End Pagination -->

		</div>

		<?php if( _clementine_get_option_('adD_sidebar_position') == 'right' ) : ?> 
			<div class="c-4">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>

	</div>