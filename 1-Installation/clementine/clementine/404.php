<?php get_header(); ?>

<div class="section-medium">
	<div class="container">
		<div class="row">
			<div class="c-12 align-center">
				<h1 class="error"><?php esc_html_e( 'Oops !', 'clementine' ); ?></h1>
				<span><?php esc_html_e('We can\'t seem to find the page you\'re looking for', 'clementine') ?></span>
			</div>
		</div>
	</div>
</div>

<div class="container">

	<?php get_template_part( 'theme-partials/random-posts' ); ?>

<?php get_footer(); ?>