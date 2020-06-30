<form action="<?php echo esc_url( home_url('/') ); ?>" method="get">

	<input type="search" name="s" placeholder="<?php if( _clementine_get_option_('adD_search_string') ) : echo sprintf( esc_html__( '%s', 'clementine' ), _clementine_get_option_('adD_search_string') ); else : esc_html_e( 'Search', 'clementine' ); endif; ?>" required />

	<button><i class="fa fa-search"></i></button>

</form>