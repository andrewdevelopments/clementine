<?php

/*

* Plugin name: Popular Stories

* This widget show popular stories

*/



add_action('widgets_init', 'clementine_ps_widget');

function clementine_ps_widget() {

	register_widget( 'clementine_ps_wdg' );

}



class clementine_ps_wdg extends WP_Widget {



	function __construct() {

		parent::__construct(



			// widget base ID

			'popular_stories',



			// widget name

			esc_html__('Clementine - Popular Stories', 'clementine'),



			// widget options

			array(

				'description' => esc_html__('This widget show popular stories', 'clementine')

			)



		);

	}



	function form( $instance ) {



		$defaults = array(

			'title' => '',

			'number' => ''

		);

		$instance = wp_parse_args((array)$instance, $defaults );

		?>



		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:96%;" />

		</p>



		<p>

			<div><label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of posts</label></div>

			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" style="width:20%;" />

		</p>

		<?php



	}

	

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;



		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['number'] = $new_instance['number'];



		return $instance;

	}

	

	function widget( $args, $instance ) {

		extract( $args );



		$title = apply_filters('widget_title', $instance['title'] );

		$number = $instance['number'];



		$query = new WP_Query(

			array(

				'showposts' => $number,

				'meta_key' => '_post_like_count',

				'order' => 'DESC',

				'orderby' => 'meta_value_num',

				'ignore_sticky_posts' => true

			)

		);



		



		if( $query->have_posts() ) :



			echo $before_widget;



				if( $title ) : ?>

					<h4 class="widget-title"><?php echo $title; ?></h4>

				<?php endif;

				?>

				<div class="widget-body">

					<ul class="default">

						<?php while( $query->have_posts() ) : $query->the_post(); ?>



							<?php if( has_post_thumbnail() ) : ?>



								<?php

								$like_count = get_post_meta( get_the_ID(), '_post_like_count', true );

								$likes = get_like_count( $like_count );

								?>



								<?php if( $likes ) : ?>

									<li>

										<div class="post-media">

											<a href="<?php the_permalink(); ?>">

												<?php the_post_thumbnail( 'fullheight-thumbnail', array('class' => 'img-responsive') ); ?>

											</a>

											<div class="popular-post">

												<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

												<span class="like">

													<i class="fa fa-heart"></i> <?php echo $likes; ?>

												</span>

											</div>

										</div>

									</li>

								<?php endif; ?>

								

							<?php endif; ?>



						<?php endwhile; ?>

					</ul>

				</div>

				<?php

			echo $after_widget;



		wp_reset_query();

		endif;

	}



}

?>