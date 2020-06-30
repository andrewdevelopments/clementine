<header class="header">
	<div class="container">
		<div class="row valign">
			<div class="c-3">
				<!-- Branding -->
				<div id="logo">
					<a href="<?php echo esc_url( home_url('/') ); ?>">
						<?php if( _clementine_get_option_('adD_logo')['url'] ) : ?>
							<img src="<?php echo _clementine_get_option_('adD_logo')['url']; ?>" alt="<?php bloginfo( 'name' ); ?>">
						<?php else : ?>
							<?php bloginfo( 'name' ); ?>
						<?php endif; ?>
					</a>
				</div>
				<!-- End Branding -->
			</div>
			<div class="c-9">
				<a href="#" class="menu-trigger"><i class="fa fa-bars"></i> <span><?php esc_html_e( 'MENU', 'clementine' ); ?></span></a>
				<!-- Navigation -->
				<nav class="navbar align-right">
					<?php wp_nav_menu(array( 'theme_location' => 'main-menu', 'container' => false, 'menu_id' => 'menu' )); ?>
				</nav>
				<!-- End Navigation -->
			</div>
		</div>	
	</div>
	<nav class="navbar navbar-mobile">
		<?php wp_nav_menu(array( 'theme_location' => 'responsive-menu', 'container' => false )); ?>
		<?php get_search_form(); ?>
	</nav>
</header>