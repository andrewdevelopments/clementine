<?php



#

# Meta Box Sidebar

#



add_action( 'add_meta_boxes', 'clementine_meta_box' );

function clementine_meta_box() {

	add_meta_box( 'sidebar-meta-box', esc_html__( 'Sidebar Options', 'clementine' ), 'clementine_meta_sidebar', 'post', 'side', 'high', null );

	add_meta_box( 'map-meta-box', esc_html__( 'Options', 'clementine' ), 'clementine_meta_googlemap', 'post', 'normal', 'high', null );

}



function clementine_meta_sidebar( $post ) {



    global $post;

	$values = get_post_custom( $post->ID );

	$selected = isset( $values['sidebar_dropdown'] ) ? esc_attr( $values['sidebar_dropdown'][0] ) : '';

	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

	?>

	

		<p><label for="sidebar_dropdown"><?php esc_html_e('Select Sidebar', 'clementine') ?></label></p>

		<select name="sidebar_dropdown" id="sidebar_dropdown">

			<?php foreach( $GLOBALS['wp_registered_sidebars'] as $sidebars ) : ?>

				<option value="<?php echo $sidebars['id']; ?>" <?php selected( $selected, $sidebars['id'] ); ?>><?php echo $sidebars['name']; ?></option>

			<?php endforeach; ?>

		</select>

	<?php



}



function clementine_meta_googlemap() {



    global $post;

	$values = get_post_custom( $post->ID );

	$coordinates = isset( $values['map_coordinates'] ) ? esc_attr( $values['map_coordinates'][0] ) : '';

	$show_only_image = isset( $values['show_only_image'] ) ? esc_attr( $values['show_only_image'][0] ) : '';

	$map_post_title = isset( $values['map_post_title'] ) ? esc_attr( $values['map_post_title'][0] ) : '';

	// $map_post_descr = isset( $values['map_post_descr'] ) ? esc_attr( $values['map_post_descr'][0] ) : '';

	$map_post_icon = isset( $values['map_post_icon'] ) ? esc_attr( $values['map_post_icon'][0] ) : '';

	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

	?>

	<div class="adD_meta-option padding">

		<input type="checkbox" id="show_only_image" name="show_only_image" <?php if( $show_only_image == 'on' ) : echo 'checked="checked"'; endif; ?> >

		<label for="show_only_image"><strong><?php esc_html_e('Show image without content in main listing', 'clementine') ?></strong></label>

	</div>

	<div id="post-map" style="width: 100%;height:300px"></div>

	<div class="adD_meta-option">

		<p><label for="search-location"><strong><?php esc_html_e('Search location', 'clementine'); ?></strong></label></p>

		<input type="text" id="search-location" name="search-location">

		<button id="search-map" class="button-primary button button-large">Search</button>

	</div>

	<div class="adD_meta-option">

		<p><label for="map_coordinates"><strong><?php esc_html_e('Marker Coordinates', 'clementine') ?></strong> - or you can use <a target="_blank" href="http://www.latlong.net/">this address</a> to get coordinates</label></p>

		<input type="text" id="map_coordinates" name="map_coordinates" placeholder="<?php esc_html_e('Latitude, Longitude', 'clementine') ?>" value="<?php echo esc_html( $coordinates ); ?>">

	</div>

	<div class="adD_meta-option">

		<p><label for="map_post_title"><strong><?php esc_html_e('Marker Title', 'clementine') ?></strong></label></p>

		<input type="text" id="map_post_title" name="map_post_title" placeholder="<?php the_title(); ?>" value="<?php echo esc_html( $map_post_title ); ?>">

	</div>

	<div class="adD_meta-option">

		<p><label for="map_post_icon"><strong><?php esc_html_e('Marker Icon', 'clementine') ?></strong></label></p>

		<label style="margin: 0 7px;" for="map_post_icon_1">

            <input type="radio" id="map_post_icon_1" name="map_post_icon" value="icon1" <?php checked( $map_post_icon, 'icon1' ); ?> >

            <img style="position: relative;top:7px" width="24" height="24" src="<?php echo THEME_URL . '/theme-functions/assets/images/icon1.png' ?>" alt="Map Icon">

        </label>

        <label style="margin: 0 7px;" for="map_post_icon_2">

            <input type="radio" id="map_post_icon_2" name="map_post_icon" value="icon2" <?php checked( $map_post_icon, 'icon2' ); ?> >

            <img style="position: relative;top:7px" width="24" height="24" src="<?php echo THEME_URL . '/theme-functions/assets/images/icon2.png' ?>" alt="Map Icon">

        </label>

        <label style="margin: 0 7px;" for="map_post_icon_3">

            <input type="radio" id="map_post_icon_3" name="map_post_icon" value="icon3" <?php checked( $map_post_icon, 'icon3' ); ?> >

            <img style="position: relative;top:7px" width="24" height="24" src="<?php echo THEME_URL . '/theme-functions/assets/images/icon3.png' ?>" alt="Map Icon">

        </label>

        <label style="margin: 0 7px;" for="map_post_icon_4">

            <input type="radio" id="map_post_icon_4" name="map_post_icon" value="icon4" <?php checked( $map_post_icon, 'icon4' ); ?> >

            <img style="position: relative;top:7px" width="24" height="24" src="<?php echo THEME_URL . '/theme-functions/assets/images/icon4.png' ?>" alt="Map Icon">

        </label>

        <label style="margin: 0 7px;" for="map_post_icon_5">

            <input type="radio" id="map_post_icon_5" name="map_post_icon" value="icon5" <?php checked( $map_post_icon, 'icon5' ); ?> >

            <img style="position: relative;top:7px" width="24" height="24" src="<?php echo THEME_URL . '/theme-functions/assets/images/icon5.png' ?>" alt="Map Icon">

        </label>

        <label style="margin: 0 7px;" for="map_post_icon_6">

            <input type="radio" id="map_post_icon_6" name="map_post_icon" value="icon6" <?php checked( $map_post_icon, 'icon6' ); ?> >

            <img style="position: relative;top:7px" width="24" height="24" src="<?php echo THEME_URL . '/theme-functions/assets/images/icon6.png' ?>" alt="Map Icon">

        </label>

	</div>

	<!-- <div class="adD_meta-option">

		<p><label for="map_post_descr"><strong><?php esc_html_e('Marker Description', 'clementine') ?></strong></label></p>

		<?php echo wp_editor( $map_post_descr, 'map_post_descr', array( 'textarea_name' => 'map_post_descr' ) ); ?>

	</div> -->

	

	<?php

}



add_action( 'save_post', 'clementine_save_meta' );

function clementine_save_meta( $post_id ) {



	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;



	if ( ! current_user_can( 'edit_post', $post_id ) )

	    return;

	     

    // if our nonce isn't there, or we can't verify it, bail

    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

     

	if( isset( $_POST['sidebar_dropdown'] ) )

	update_post_meta( $post_id, 'sidebar_dropdown', esc_attr( $_POST['sidebar_dropdown'] ) );

	if( isset( $_POST['map_coordinates'] ) )

	update_post_meta( $post_id, 'map_coordinates', esc_attr( $_POST['map_coordinates'] ) );



	if( isset( $_POST['show_only_image'] ) ) :

		update_post_meta( $post_id, 'show_only_image', 'on' );

	else :

		update_post_meta( $post_id, 'show_only_image', 'off' );

	endif;



	if( isset( $_POST['map_post_title'] ) )

	update_post_meta( $post_id, 'map_post_title', esc_attr( $_POST['map_post_title'] ) );

	if( isset( $_POST['map_post_icon'] ) )

	update_post_meta( $post_id, 'map_post_icon', esc_attr( $_POST['map_post_icon'] ) );

	// if( isset( $_POST['map_post_descr'] ) )

	// update_post_meta( $post_id, 'map_post_descr', esc_attr( $_POST['map_post_descr'] ) );



}