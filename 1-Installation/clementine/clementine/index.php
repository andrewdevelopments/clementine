<?php get_header(); ?>



	<!-- Post Slider -->

	<?php

		if( _clementine_get_option_('adD_post_slider') == 'slider' ) :

        	get_template_part( 'theme-partials/slider/' . _clementine_get_option_('adD_post_slider_style') );

	    elseif( _clementine_get_option_('adD_post_slider') == 'map' ) :

	    	get_template_part( 'theme-partials/google-map' );

	    endif;

	?>

	<!-- End Post Slider -->



	<!-- Layout -->

	<?php

	if( _clementine_get_option_('adD_layout') == 'default' ) :

		get_template_part( 'theme-partials/layout/default' );

	elseif( _clementine_get_option_('adD_layout') == 'full-width' ) :

		get_template_part( 'theme-partials/layout/full-width' );

	elseif( _clementine_get_option_('adD_layout') == 'grid-2-cols' ) :

		get_template_part( 'theme-partials/layout/grid-2-cols' );

	elseif( _clementine_get_option_('adD_layout') == 'grid-3-cols' ) :

		get_template_part( 'theme-partials/layout/grid-3-cols' );

	elseif( _clementine_get_option_('adD_layout') == 'grid-4-cols' ) :

		get_template_part( 'theme-partials/layout/grid-4-cols' );

	elseif( _clementine_get_option_('adD_layout') == 'post-grid' ) :

		get_template_part( 'theme-partials/layout/post-grid' );

	else :

	?>

		<div class="container">

			<div class="row">

				

				<div class="main c-8">



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



				<div class="c-4">

					<?php get_sidebar(); ?>

				</div>



			</div>

	<?php endif; ?>

	<!-- End Layout -->



<?php get_footer(); ?>