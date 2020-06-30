<?php get_header(); ?>

	<div class="section-medium">
		<div class="container">
			<div class="row">
				<div class="c-12 align-center">
					<?php
					if( is_category() ) :
						printf( __('<span>Browsing Category: %s</span>', 'clementine'), '<h2>'. single_cat_title('', false) .'</h2>' );
					elseif( is_tag() ) :
						printf( __('<span>Browsing Tag: %s</span>', 'clementine'), '<h2>'. single_tag_title('', false) .'</h2>' );
					elseif( is_author() ) :
						printf( __('<span>Posts by: %s</span>', 'clementine'), '<h2>'. get_the_author() .'</h2>' );
					elseif( is_day() ) :
						printf( __( '<span>Posts by Day: %s</span>', 'clementine' ), '<h2>' . get_the_date() . '</h2>' );
					elseif( is_month() ) :
						printf( __( '<span>Posts by Month: %s</span>', 'clementine' ), '<h2>' . get_the_date( 'F Y' ) . '</h2>' );
					elseif( is_year() ) :
						printf( __( '<span>Posts by Year: %s</span>', 'clementine' ), '<h2>' . get_the_date( 'Y' ) . '</h2>' );
					endif;
					?>
				</div>
			</div>
		</div>
	</div>

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