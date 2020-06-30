	</div>

	<?php
	if( _clementine_get_option_('adD_footer_widgets') == 1 ) :
		get_template_part( 'theme-partials/footer/' . _clementine_get_option_('adD_footer_layout') );
	else: 
		get_template_part( 'theme-partials/footer/footer-default' );
	endif;
	?>

	<?php if( _clementine_get_option_('adD_back_to_top') == 1 ) : ?>
		<!-- Back To Top -->
		<a id='back-to-top' href='#'>
			<?php
			if( _clementine_get_option_('adD_totop_string') ) :
				echo _clementine_get_option_('adD_totop_string');
			else :
				esc_html_e( 'To top', 'clementine' );
			endif;
			?>
		</a>
		<!-- Back To Top -->
	<?php endif; ?>

	<?php wp_footer(); ?>
</body>
</html>