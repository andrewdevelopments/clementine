<div class="container">
	<div class="row">
		
		<?php if( _clementine_get_option_('adD_sidebar_position') == 'left' ) : ?> 
			<div class="c-4">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
		
		<div class="main post-grid c-8">
			<?php			
			if( have_posts() ) :

				$format = get_post_format();
				if( $format == false ) : $format = 'default'; endif;

				if( is_sticky() ) :
					get_template_part( 'theme-partials/content/' . $format );
				endif;

				?>
				<div class="row grid masonry">
					<?php while( have_posts() ) : the_post(); ?>

						<?php
						$format = get_post_format();
						if( $format == false ) : $format = 'default'; endif;
						?>
					
						<?php if( !is_sticky() ) : ?>
							<div class="block c-6">
								<?php get_template_part( 'theme-partials/content/' . $format ); ?>
							</div>
						<?php endif; ?>

					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		
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