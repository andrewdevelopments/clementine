<?php $menu = wp_get_nav_menu_object(_clementine_get_option_('adD_topbar_menu')); ?>

<!-- Top Bar -->
<div class="top-bar">
	<div class="container">
		<div class="row valign">

			<?php if( _clementine_get_option_('adD_topbar_layout') == 'top-1' ) : ?>
				<div class="c-9">
					<div class="top-menu">
						<?php if( _clementine_get_option_('adD_topbar_menu') ) : ?>
							<?php wp_nav_menu(array( 'theme_location' => $menu->slug, 'container' => false )); ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="c-3 align-right">
					<?php get_template_part( 'theme-partials/social' ); ?>
				</div>
			<?php elseif( _clementine_get_option_('adD_topbar_layout') == 'top-2' ) : ?>
				<div class="c-3">
					<?php get_template_part( 'theme-partials/social' ); ?>
				</div>
				<div class="c-9 align-right">
					<div class="top-menu">
						<?php wp_nav_menu(array( 'theme_location' => $menu->slug, 'container' => false )); ?>
					</div>
				</div>
			<?php elseif( _clementine_get_option_('adD_topbar_layout') == 'top-3' ) : ?>
				<div class="c-12 align-center">
					<div class="top-menu">
						<?php wp_nav_menu(array( 'theme_location' => $menu->slug, 'container' => false )); ?>
					</div>
				</div>
			<?php elseif( _clementine_get_option_('adD_topbar_layout') == 'top-4' ) : ?>
				<div class="c-12 align-center">
					<?php get_template_part( 'theme-partials/social' ); ?>
				</div>
			<?php elseif( _clementine_get_option_('adD_topbar_layout') == 'top-5' ) : ?>
				<div class="c-9">
					<?php get_template_part( 'theme-partials/social' ); ?>
				</div>
				<div class="c-3">
					<?php get_search_form(); ?>
				</div>
			<?php elseif( _clementine_get_option_('adD_topbar_layout') == 'top-6' ) : ?>
				<div class="c-3">
					<?php get_search_form(); ?>
				</div>
				<div class="c-9 align-right">
					<?php get_template_part( 'theme-partials/social' ); ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>
<!-- End Top Bar -->