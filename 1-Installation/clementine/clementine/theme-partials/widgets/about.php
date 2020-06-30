<?php

/*

* Plugin name: About Widget

* This widget show user information using @user_page

*/



add_action('widgets_init', 'clementine_about_widget');

function clementine_about_widget() {

	register_widget( 'clementine_about_wdg' );

}



class clementine_about_wdg extends WP_Widget {



	function __construct() {

		parent::__construct(



			// widget base ID

			'widget_about',



			// widget name

			esc_html__('Clementine - About Me', 'clementine'),



			// widget options

			array(

				'description' => esc_html__('This widget show user information', 'clementine')

			)



		);

	}



	function form( $instance ) {



		$defaults = array(

			'title' => '',

			'second_title' => '',

			'image' => '',

			'description' => '',

			'social' => 'on',

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

			<label for="<?php echo $this->get_field_id( 'second_title' ); ?>">Second title:</label>

			<input id="<?php echo $this->get_field_id( 'second_title' ); ?>" name="<?php echo $this->get_field_name( 'second_title' ); ?>" value="<?php echo $instance['second_title']; ?>" style="width:96%;" />

		</p>



		<p>

			<label for="<?php echo $this->get_field_id( 'description' ); ?>">Short description:</label>

			<textarea id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" style="width:95%;" rows="6"><?php echo $instance['description']; ?></textarea>

		</p>



		<p>

			<p><em><small>You can add information for Social Media in <strong>Customize - Social Media Settings</strong></small></em></p>

			<input type="checkbox" id="<?php echo $this->get_field_id( 'social' ); ?>" name="<?php echo $this->get_field_name( 'social' ); ?>" <?php checked( (bool) $instance['social'], true ); ?> />

			<label for="<?php echo $this->get_field_id( 'social' ); ?>">Enable Social Media</label>

		</p>

		<?php



	}

	

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;



		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['second_title'] = strip_tags( $new_instance['second_title'] );

		$instance['image'] = strip_tags( $new_instance['image'] );

		$instance['social'] = strip_tags( $new_instance['social'] );

		$instance['description'] = $new_instance['description'];



		return $instance;

	}

	

	function widget( $args, $instance ) {



		extract( $args );



		$title = apply_filters('widget_title', $instance['title'] );

		$second_title = $instance['second_title'];

		$image = $instance['image'];

		$social = $instance['social'];

		$description = $instance['description'];



		echo $before_widget;



			if( $title ) : ?>

				<h4 class="widget-title"><?php echo $title; ?></h4>

			<?php endif;

			?>

				<div class="widget-body">

				

					<?php if( $image ) : ?>

						<img class="img-responsive" src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />

					<?php endif; ?>



					<?php if( $second_title ) : ?>

						<span class="second-title"><?php echo $second_title; ?></span>

					<?php endif; ?>

					

					<?php if( $description ) : ?>

						<p><?php echo $description; ?></p>

					<?php endif; ?>	



					<?php if( $social ) : ?>

						<div class="social-widget">

							<!-- @facebook -->

							<?php if( _clementine_get_option_('adD_facebook') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_facebook'); ?>"><i class="fa fa-facebook"></i></a>

							<?php endif; ?>

	

							<!-- @twitter -->

							<?php if( _clementine_get_option_('adD_twitter') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_twitter'); ?>"><i class="fa fa-twitter"></i></a>

							<?php endif; ?>



							<!-- @google -->

							<?php if( _clementine_get_option_('adD_google') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_google'); ?>"><i class="fa fa-google-plus"></i></a>

							<?php endif; ?>



							<!-- @instagram -->

							<?php if( _clementine_get_option_('adD_instagram') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_instagram'); ?>"><i class="fa fa-instagram"></i></a>

							<?php endif; ?>



							<!-- @pinterest -->

							<?php if( _clementine_get_option_('adD_pinterest') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_pinterest'); ?>"><i class="fa fa-pinterest-p"></i></a>

							<?php endif; ?>



							<!-- @tumblr -->

							<?php if( _clementine_get_option_('adD_tumblr') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_tumblr'); ?>"><i class="fa fa-tumblr"></i></a>

							<?php endif; ?>



							<!-- @dribbble -->

							<?php if( _clementine_get_option_('adD_dribbble') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_dribbble'); ?>"><i class="fa fa-dribbble"></i></a>

							<?php endif; ?>



							<!-- @youtube -->

							<?php if( _clementine_get_option_('adD_youtube') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_youtube'); ?>"><i class="fa fa-youtube"></i></a>

							<?php endif; ?>



							<!-- @behance -->

							<?php if( _clementine_get_option_('adD_behance') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_behance'); ?>"><i class="fa fa-behance"></i></a>

							<?php endif; ?>



							<!-- @flickr -->

							<?php if( _clementine_get_option_('adD_flickr') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_flickr'); ?>"><i class="fa fa-flickr"></i></a>

							<?php endif; ?>



							<!-- @vimeo -->

							<?php if( _clementine_get_option_('adD_vimeo') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_vimeo'); ?>"><i class="fa fa-vimeo"></i></a>

							<?php endif; ?>



							<!-- @soundcloud -->

							<?php if( _clementine_get_option_('adD_soundcloud') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_soundcloud'); ?>"><i class="fa fa-soundcloud"></i></a>

							<?php endif; ?>



							<!-- @deviantart -->

							<?php if( _clementine_get_option_('adD_deviantart') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_deviantart'); ?>"><i class="fa fa-deviantart"></i></a>

							<?php endif; ?>



							<!-- @rss -->

							<?php if( _clementine_get_option_('adD_rss') ) : ?>

								<a href="<?php echo _clementine_get_option_('adD_rss'); ?>"><i class="fa fa-rss"></i></a>

							<?php endif; ?>

						</div>



					<?php endif; ?>

				

				</div>

			<?php

		echo $after_widget;

	}



}

?>