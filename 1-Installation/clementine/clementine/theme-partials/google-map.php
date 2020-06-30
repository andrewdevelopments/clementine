<?php
// Inject Google Map
clementine_google_map();
?>

<div id="map" <?php if( is_page() && _clementine_get_option_('adD_google_map_on_all') == '1' && _clementine_get_option_('adD_post_slider') == 'map' ): echo 'class="map-onpage"'; endif; ?>></div>