<?php

/*

* Plugin name: Banner Widget

* This widget show a banner image

*/



add_action('widgets_init', 'clementine_banner_widget');

function clementine_banner_widget() {

	register_widget( 'clementine_banner_wdg' );

}



class clementine_banner_wdg extends WP_Widget {



	function __construct() {

		parent::__construct(



			// widget base ID

			'widget_banner',



			// widget name

			esc_html__('Clementine - Banner', 'clementine'),



			// widget options

			array(

				'description' => esc_html__('This widget show a banner image', 'clementine')

			)



		);

	}



	function form( $instance ) {



		$defaults = array(

			'title' => '',

			'image' => '',

			'url' => '',

			'width' => '',

			'height' => '',

			'auto' => '',

			'new_window' => ''

		);

		$instance = wp_parse_args((array)$instance, $defaults );

		?>



		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:96%;" />

		</p>



		<p>

			<label for="<?php echo $this->get_field_id( 'image' ); ?>">Image URL:</label>

			<input id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" style="width:96%;" /><br />

		</p>



		<p>

			<label for="<?php echo $this->get_field_id( 'url' ); ?>">Target:</label>

			<input id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" style="width:96%;" /><br />

		</p>



		<div><label for="<?php echo $this->get_field_id( 'width' ); ?>">Width & Height:</label></div>

		<p><strong><small>Enter only the value (300 x 400)</small></strong></p>

		<p>

			<input id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" style="width:20%;" />

			<small>x</small>

			<input id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" style="width:20%;" />

		</p>



		<p>

			<input type="checkbox" id="<?php echo $this->get_field_id( 'new_window' ); ?>" name="<?php echo $this->get_field_name( 'new_window' ); ?>" <?php checked( (bool) $instance['new_window'], true ); ?> />

			<label for="<?php echo $this->get_field_id( 'new_window' ); ?>">Open in New Window</label>

		</p>



		<p>

			<input type="checkbox" id="<?php echo $this->get_field_id( 'auto' ); ?>" name="<?php echo $this->get_field_name( 'auto' ); ?>" <?php checked( (bool) $instance['auto'], true ); ?> />

			<label for="<?php echo $this->get_field_id( 'auto' ); ?>">Enable responsive image</label>

		</p>

		<?php



	}

	

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;



		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['image'] = strip_tags( $new_instance['image'] );

		$instance['url'] = strip_tags( $new_instance['url'] );

		$instance['width'] = strip_tags( $new_instance['width'] );

		$instance['height'] = strip_tags( $new_instance['height'] );

		$instance['auto'] = strip_tags( $new_instance['auto'] );

		$instance['new_window'] = strip_tags( $new_instance['new_window'] );



		return $instance;

	}

	

	function widget( $args, $instance ) {

		extract( $args );



		$title = apply_filters('widget_title', $instance['title'] );

		$image = $instance['image'];

		$width = $instance['width'];

		$height = $instance['height'];

		$auto = $instance['auto'];

		$url = $instance['url'];

		$new_window = $instance['new_window'];



		echo $before_widget;



			if( $title ) : ?>

				<h4 class="widget-title"><?php echo $title; ?></h4>

			<?php endif;

			?>

				<div class="widget-body">

				

					<?php if( $image && !$url ) : ?>

						<?php if( $auto  ) : ?>

							<img class="img-responsive" src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />

						<?php elseif( $width && $height ) : ?>

							<img width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />

						<?php else : ?>

							<img class="img-responsive" src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />

						<?php endif; ?>



					<?php elseif( $image && $url ) : ?>

						<a href="<?php echo $url; ?>" <?php if( $new_window ) : echo 'target="_blank"'; endif; ?>>

							<?php if( $auto  ) : ?>

								<img class="img-responsive" src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />

							<?php elseif( $width && $height ) : ?>

								<img width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />

							<?php else : ?>

								<img class="img-responsive" src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />

							<?php endif; ?>

						</a>

					<?php endif; ?>



				</div>

			<?php

		echo $after_widget;

	}



}

?>