<?php

/*

* Plugin name: Categories Widget

* This widget show all available categories

*/



add_action('widgets_init', 'clementine_cb_widget');

function clementine_cb_widget() {

	register_widget( 'clementine_cb_wdg' );

}



class clementine_cb_wdg extends WP_Widget {



	function __construct() {

		parent::__construct(



			// widget base ID

			'widget_category_banner',



			// widget name

			esc_html__('Clementine - Category Banner', 'clementine')



		);

	}



	function form( $instance ) {



		$defaults = array(

			'title' => '',

			'image' => '',

			'cat' => ''

		);

		$instance = wp_parse_args((array)$instance, $defaults );

		?>



		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:96%;" />

		</p>



		<p>

			<label for="<?php echo $this->get_field_id( 'image' ); ?>">Image URL:</label>

			<input id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" style="width:96%;" />

		</p>



		<p>

			<label for="<?php echo $this->get_field_id( 'cat' ); ?>">Category:</label>

			<select id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" style="width:96%;">



				<?php $categories = get_categories('hide_empty=0'); ?>



				<?php foreach( $categories as $category ) { ?>

					<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['cat']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>

				<?php } ?>



			</select>



		</p>



		<?php



	}

	

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;



		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['image'] = strip_tags( $new_instance['image'] );

		$instance['cat'] = strip_tags( $new_instance['cat'] );



		return $instance;

	}

	

	function widget( $args, $instance ) {

		extract( $args );



		$title = apply_filters('widget_title', $instance['title'] );

		$image = $instance['image'];

		$cat = $instance['cat'];



		$category_name = get_cat_name($instance['cat']);



		echo $before_widget;



			if( $title ) : ?>

				<h4 class="widget-title"><?php echo $title; ?></h4>

			<?php endif;

			?>

				<div class="widget-body">

					<a class="category-banner-link" href="<?php echo get_category_link( $cat ); ?>">

						<div class="category-over">

							<div class="category-inner">

								<h4><?php echo $category_name; ?></h4>

								<?php foreach( get_categories() as $number ) : ?>

									<?php if( $number->term_id == $instance['cat'] ) : ?>

									<div class="count">

										<i class="fa fa-pencil"></i>

										<span><?php echo $number->count; ?> <?php echo $number->count == '1' ? 'article' : 'articles'; ?></span>

									</div>

									<?php endif; ?>

								<?php endforeach; ?>

							</div>

						</div>

						<img class="img-responsive" src="<?php echo $image; ?>" alt="<?php echo $cat; ?>">

					</a>

				</div>

			<?php

		echo $after_widget;

	}



}

?>