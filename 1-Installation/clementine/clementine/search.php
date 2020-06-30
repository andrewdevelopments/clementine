<?php get_header(); ?>

	<div class="section-medium">
		<div class="container">
			<div class="row">
				<div class="c-12 align-center">
					<span>
						<?php esc_html_e( 'Search results for', 'clementine' ); ?>
						<h2><?php printf( esc_html__( '%s', 'clementine' ), get_search_query() ); ?></h2>
					</span>
					
				</div>
			</div>
		</div>
	</div>
	
	<?php if ( have_posts() ) : ?>
	
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
		elseif( _clementine_get_option_('adD_layout') == 'post-list' ) :
			get_template_part( 'theme-partials/layout/post-list' );
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
		
	<?php else : ?>

		<div class="container">
			<div class="row">
				
				<?php if( _clementine_get_option_('adD_sidebar_position') == 'left' ) : ?> 
					<div class="c-4">
						<?php get_sidebar(); ?>
					</div>
				<?php endif; ?>

				<div class="main c-8">
					<p class="nothing"><?php esc_html_e( 'Sorry, no posts were found. Try searching for something else.', 'clementine' ); ?></p>
				</div>

				<?php if( _clementine_get_option_('adD_sidebar_position') == 'right' ) : ?> 
					<div class="c-4">
						<?php get_sidebar(); ?>
					</div>
				<?php endif; ?>

			</div>
			
	<?php endif; ?>
	
<?php get_footer(); ?>