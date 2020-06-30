<footer class="footer">
	<div class="container">

		<div class="row footer-widget">
			
			<div class="c-3">
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'footer-1' ) ) ?>
			</div>
			<div class="c-3">
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'footer-2' ) ) ?>
			</div>
			<div class="c-3">
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'footer-3' ) ) ?>
			</div>
			<div class="c-3">
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'footer-4' ) ) ?>
			</div>

		</div>

		<div class="copyright widget-active">
			<div class="row">
				<div class="c-6">
					<p><?php echo htmlspecialchars_decode(_clementine_get_option_('adD_copyright')); ?></p>
				</div>
				<div class="c-6 align-right">
					<?php get_template_part( 'theme-partials/footer/icons' ); ?>
				</div>
			</div>
		</div>
		
	</div>
</footer>