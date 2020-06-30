<?php

/*

* Plugin name: Facebook Widget

* This widget This widget is for Facebok Like Box

*/



add_action('widgets_init', 'clementine_facebook_widget');

function clementine_facebook_widget() {

	register_widget( 'clementine_facebook_wdg' );

}



class clementine_facebook_wdg extends WP_Widget {



	function __construct() {

		parent::__construct(



			// widget base ID

			'widget_facebook',



			// widget name

			esc_html__('Clementine - Facebook', 'clementine'),



			// widget options

			array(

				'description' => esc_html__('This widget is for Facebok Like Box', 'clementine')

			)



		);

	}



	function form( $instance ) {



		$defaults = array(

			'title' => '',

			'page_url' => '',

			'height' => '',

			'stream' => 'on',

			'header' => 'on',

			'faces' => 'on',

		);

		$instance = wp_parse_args((array)$instance, $defaults );

		?>



		<!-- Widget Title -->

		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:96%;" />

		</p>



		<!-- Widget Page URL -->

		<p>

			<label for="<?php echo $this->get_field_id( 'page_url' ); ?>">Page URL:</label>

			<input id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" value="<?php echo $instance['page_url']; ?>" style="width:96%;" />

		</p>



		<!-- Widget Width & Height -->

		<div><label for="<?php echo $this->get_field_id( 'height' ); ?>">Height:</label></div>

		<p>

			<input id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" style="width:20%;" />

			<small>px</small>

		</p>



		<!-- Widget Stream -->

		<p>

			<input type="checkbox" id="<?php echo $this->get_field_id( 'stream' ); ?>" name="<?php echo $this->get_field_name( 'stream' ); ?>" <?php checked( (bool) $instance['stream'], true ); ?> />

			<label for="<?php echo $this->get_field_id( 'stream' ); ?>">Enable streaming</label>

		</p>



		<!-- Widget Header -->

		<p>

			<input type="checkbox" id="<?php echo $this->get_field_id( 'header' ); ?>" name="<?php echo $this->get_field_name( 'header' ); ?>" <?php checked( (bool) $instance['header'], true ); ?> />

			<label for="<?php echo $this->get_field_id( 'header' ); ?>">Enable header</label>

		</p>



		<!-- Widget Faces -->

		<p>

			<input type="checkbox" id="<?php echo $this->get_field_id( 'faces' ); ?>" name="<?php echo $this->get_field_name( 'faces' ); ?>" <?php checked( (bool) $instance['faces'], true ); ?> />

			<label for="<?php echo $this->get_field_id( 'faces' ); ?>">Enable faces</label>

		</p>

		<?php



	}

	

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;



		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['page_url'] = strip_tags( $new_instance['page_url'] );

		$instance['height'] = strip_tags( $new_instance['height'] );

		$instance['stream'] = strip_tags( $new_instance['stream'] );

		$instance['header'] = strip_tags( $new_instance['header'] );

		$instance['faces'] = strip_tags( $new_instance['faces'] );



		return $instance;

	}

	

	function widget( $args, $instance ) {

		extract( $args );



		$title = apply_filters('widget_title', $instance['title'] );

		$page_url = $instance['page_url'];

		$height = $instance['height'];

		$stream = $instance['stream'];

		$header = $instance['header'];

		$faces = $instance['faces'];



		echo $before_widget;



			if( $title && $page_url ) : ?>

				<h4 class="widget-title"><?php echo $title; ?></h4>

			<?php endif;

			?>



			<?php if( $page_url ) : ?>

				<div class="widget-body">

				

					<iframe id="facebook" src="http://www.facebook.com/plugins/likebox.php?href=<?php echo $page_url; ?>&amp;colorscheme=light&amp;show_faces=<?php if( $faces ) : echo 'true'; else : echo 'false'; endif; ?>&amp;border_color&amp;stream=<?php if( $stream ) : echo 'true'; else : echo 'false'; endif; ?>&amp;header=<?php if( $header ) : echo 'true'; else : echo 'false'; endif; ?>&amp;height=<?php echo $height; ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:<?php echo $height; ?>px;" allowTransparency="true"></iframe>

				

				</div>

			<?php endif;



		echo $after_widget;

	}



}

?>