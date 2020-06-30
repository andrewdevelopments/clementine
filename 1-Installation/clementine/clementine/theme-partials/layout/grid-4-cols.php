<div class="container-full fullwidth-layout">
	<div class="main">
	
		<div class="row grid masonry">
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	
				<?php
				$format = get_post_format();
				if( $format == false ) : $format = 'default'; endif;
				?>
				
				<div class="block c-3">
					<?php get_template_part( 'theme-partials/content/' . $format ); ?>
				</div>
	
			<?php endwhile; endif; ?>
		</div>
				
		<!-- Pagination -->
		<?php clementine_pagination(); ?>
		<!-- End Pagination -->
	
	</div>