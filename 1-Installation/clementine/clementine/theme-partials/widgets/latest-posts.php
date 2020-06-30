<?php

/*

* Plugin name: Latest Posts Widget

* This widget show latest posts

*/



add_action('widgets_init', 'clementine_lp_widget');

function clementine_lp_widget() {

	register_widget( 'clementine_lp_wdg' );

}



class clementine_lp_wdg extends WP_Widget {



	function __construct() {

		parent::__construct(



			// widget base ID

			'widget_posts',



			// widget name

			esc_html__('Clementine - Latest Posts', 'clementine'),



			// widget options

			array(

				'description' => esc_html__('This widget show latest posts', 'clementine')

			)



		);

	}



	function form( $instance ) {



		$defaults = array(

			'title' => '',

			'number' => '',

			'thumb' => 'on',

			'categories' => '',

		);

		$instance = wp_parse_args((array)$instance, $defaults );

		?>



		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:96%;" />

		</p>



		<p>

			<label for="<?php echo $this->get_field_id( 'categories' ); ?>">Filter by Categories:</label>

			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" style="width:96%;">



				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All categories</option>



				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>



				<?php foreach($categories as $category) { ?>

					<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>

				<?php } ?>



			</select>

		</p>



		<p>

			<div><label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of posts</label></div>

			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" style="width:20%;" />

		</p>



		<p>

			<input type="checkbox" id="<?php echo $this->get_field_id( 'thumb' ); ?>" name="<?php echo $this->get_field_name( 'thumb' ); ?>" <?php checked( (bool) $instance['thumb'], true ); ?> />

			<label for="<?php echo $this->get_field_id( 'thumb' ); ?>">Show post image</label>

		</p>

		<?php



	}

	

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;



		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['number'] = $new_instance['number'];

		$instance['thumb'] = $new_instance['thumb'];

		$instance['categories'] = $new_instance['categories'];



		return $instance;

	}

	

	function widget( $args, $instance ) {

		extract( $args );



		$title = apply_filters('widget_title', $instance['title'] );

		$number = $instance['number'];

		$thumb = $instance['thumb'];

		$categories = $instance['categories'];



		array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'cat' => $categories);



		$query = new WP_Query(

			array(

				'post_status' => 'publish',

				'showposts' => $number,

				'meta_key'    => '_thumbnail_id',

				'post__not_in' => get_option('sticky_posts'),

				'cat' => $categories

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

							<li class="row valign">

								<?php if( $thumb ) : ?>

									<div class="post-media c-4">

										<a href="<?php the_permalink(); ?>">

											<?php the_post_thumbnail( 'fullheight-thumbnail', array('class' => 'img-responsive') ); ?>

										</a>

									</div>

								<?php endif; ?>



								<div class="c-8">

									<h3 class="post-title">

										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

									</h3>

									<div class="post-meta">



										<!-- Date -->

										<div class="date">

											<span><?php echo _e( '<i class="fa fa-clock-o"></i> ', 'clementine' ); ?>

												<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ' . __('ago', 'clementine'); ?>

												<?php //the_time(get_option('date_format')); ?>

											</span>

										</div>

										<!-- End Date -->



									</div>

								</div>

							</li>

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