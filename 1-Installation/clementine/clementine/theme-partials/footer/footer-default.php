<footer class="footer-default footer">
	<div class="container align-center">

		<?php if( _clementine_get_option_('adD_footer_logo') ) : ?>
			<div class="logo">
				<a href="<?php echo home_url(); ?>">
					<?php if( _clementine_get_option_('adD_footer_logo')['url'] ) : ?>
						<img src="<?php echo _clementine_get_option_('adD_footer_logo')['url']; ?>" alt="<?php bloginfo( 'name' ); ?>">
					<?php endif; ?>
				</a>
			</div>
		<?php endif; ?>

		<div class="copyright align-center">
			<div class="row">
				<?php if( _clementine_get_option_('adD_footer_social') == 1 ) : ?>
					<div class="c-12">
						<?php get_template_part( 'theme-partials/footer/icons' ); ?>
					</div>
				<?php endif; ?>
				<div class="c-12">
					<p><?php echo htmlspecialchars_decode(_clementine_get_option_('adD_copyright')); ?></p>
				</div>
			</div>
		</div>
		
	</div>
</footer>