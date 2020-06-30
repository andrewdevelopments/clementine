<div class="container">
	<div class="row">
		
		<div class="main c-12">

			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		
			<?php
			$format = get_post_format();
			if( $format == false ) : $format = 'default'; endif;
			?>
		
			<?php get_template_part( 'theme-partials/content/' . $format ); ?>
		
			<?php endwhile; endif; ?>
		
			<!-- Pagination -->
			<?php clementine_pagination(); ?>
			<!-- End Pagination -->

		</div>

	</div>
