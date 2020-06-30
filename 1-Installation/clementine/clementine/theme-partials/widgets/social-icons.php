<?php

/*

* Plugin name: Social Icons Widget

* This widget show social icons

*/



add_action('widgets_init', 'clementine_si_widget');

function clementine_si_widget() {

	register_widget( 'clementine_si_wdg' );

}



class clementine_si_wdg extends WP_Widget {



	function __construct() {

		parent::__construct(



			// widget base ID

			'widget_social',



			// widget name

			esc_html__('Clementine - Social Icons', 'clementine'),



			// widget options

			array(

				'description' => esc_html__('This widget show social icons, you can edit this information from Customize - Social Media Settings', 'clementine')

			)



		);

	}



	function form( $instance ) {



		$defaults = array(

			'social' => 'on',

		);

		$instance = wp_parse_args((array)$instance, $defaults );

		?>



		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:96%;" />

		</p>

		<?php



	}

	

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;



		$instance['title'] = strip_tags( $new_instance['title'] );



		return $instance;

	}

	

	function widget( $args, $instance ) {

		extract( $args );



		$title = apply_filters('widget_title', $instance['title'] );



		echo $before_widget;



			if( $title ) : ?>

				<h4 class="widget-title"><?php echo $title; ?></h4>

			<?php endif;

			?>

				<div class="widget-body">

				

					<div class="social-widget">

						<!-- @facebook -->

						<?php if( _clementine_get_option_('adD_facebook') ) : ?>

							<a class="facebook" href="<?php echo _clementine_get_option_('adD_facebook'); ?>">Facebook</a>

						<?php endif; ?>

					

						<!-- @twitter -->

						<?php if( _clementine_get_option_('adD_twitter') ) : ?>

							<a class="twitter" href="<?php echo _clementine_get_option_('adD_twitter'); ?>">Twitter</a>

						<?php endif; ?>



						<!-- @google -->

						<?php if( _clementine_get_option_('adD_google') ) : ?>

							<a class="google" href="<?php echo _clementine_get_option_('adD_google'); ?>">Google+</a>

						<?php endif; ?>



						<!-- @instagram -->

						<?php if( _clementine_get_option_('adD_instagram') ) : ?>

							<a class="instagram" href="<?php echo _clementine_get_option_('adD_instagram'); ?>">Instagram</a>

						<?php endif; ?>



						<!-- @pinterest -->

						<?php if( _clementine_get_option_('adD_pinterest') ) : ?>

							<a class="pinterest" href="<?php echo _clementine_get_option_('adD_pinterest'); ?>">Pinterest</a>

						<?php endif; ?>



						<!-- @tumblr -->

						<?php if( _clementine_get_option_('adD_tumblr') ) : ?>

							<a class="tumblr" href="<?php echo _clementine_get_option_('adD_tumblr'); ?>">Tumblr</a>

						<?php endif; ?>



						<!-- @dribbble -->

						<?php if( _clementine_get_option_('adD_dribbble') ) : ?>

							<a class="dribbble" href="<?php echo _clementine_get_option_('adD_dribbble'); ?>">Dribbble</a>

						<?php endif; ?>



						<!-- @youtube -->

						<?php if( _clementine_get_option_('adD_youtube') ) : ?>

							<a class="youtube" href="<?php echo _clementine_get_option_('adD_youtube'); ?>">Youtube</a>

						<?php endif; ?>



						<!-- @behance -->

						<?php if( _clementine_get_option_('adD_behance') ) : ?>

							<a class="behance" href="<?php echo _clementine_get_option_('adD_behance'); ?>">Behance</a>

						<?php endif; ?>



						<!-- @flickr -->

						<?php if( _clementine_get_option_('adD_flickr') ) : ?>

							<a class="flickr" href="<?php echo _clementine_get_option_('adD_flickr'); ?>">Flickr</a>

						<?php endif; ?>



						<!-- @vimeo -->

						<?php if( _clementine_get_option_('adD_vimeo') ) : ?>

							<a class="vimeo" href="<?php echo _clementine_get_option_('adD_vimeo'); ?>">Vimeo</a>

						<?php endif; ?>



						<!-- @soundcloud -->

						<?php if( _clementine_get_option_('adD_soundcloud') ) : ?>

							<a class="soundcloud" href="<?php echo _clementine_get_option_('adD_soundcloud'); ?>">Soundcloud</a>

						<?php endif; ?>



						<!-- @deviantart -->

						<?php if( _clementine_get_option_('adD_deviantart') ) : ?>

							<a class="deviantart" href="<?php echo _clementine_get_option_('adD_deviantart'); ?>">Deviantart</a>

						<?php endif; ?>



						<!-- @rss -->

						<?php if( _clementine_get_option_('adD_rss') ) : ?>

							<a class="rss" href="<?php echo _clementine_get_option_('adD_rss'); ?>">RSS</a>

						<?php endif; ?>

					</div>

				

				</div>

			<?php

		echo $after_widget;

	}



}

?>