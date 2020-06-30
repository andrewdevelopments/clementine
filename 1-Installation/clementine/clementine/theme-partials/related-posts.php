<?php

global $post;



$categories = get_the_category( $post->ID );



if( $categories ) :



	$category_IDs = array();



	foreach( $categories as $category ) :

		$category_IDs[] = $category->term_id;

	endforeach;



	$args = array(

		'category__in'     => $category_IDs,

		'post__not_in'     => array($post->ID),

		'posts_per_page'   => 2,

		'ignore_sticky_posts' => 1,

		'orderby' => 'rand'

	);



	$related_posts_query = new WP_Query($args);



	if( $related_posts_query->have_posts() ) :

		?>

		<div class="related-posts">

			<div class="row">

				<div class="c-12">

					<h3 class="title"><?php esc_html_e('You might also like', 'clementine'); ?></h3>

				</div>

			</div>

			<div class="row">

			<?php while( $related_posts_query->have_posts() ) : $related_posts_query->the_post(); ?>

				<div class="c-6">

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



						<header class="entry-header <?php if( !has_post_thumbnail() ) : echo 'no-thumbnail'; endif;?> fullheight-thumbnail">



							<?php if( has_post_thumbnail() ) : ?>

								<!-- Full height media -->

								<div class="post-media">

									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

										<?php the_post_thumbnail( 'clementine-fullheight-thumbnail', array('class' => 'img-responsive') ); ?>

									</a>

									<div class="category"><?php clementine_categories(); ?></div>

								</div>

								<!-- End Full height media -->

							<?php else : ?>

								<div class="category"><?php clementine_categories(); ?></div>

							<?php endif; ?>



							<!-- Post Title -->

							<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

							<!-- End Post Title -->



							<div class="post-meta">



								<!-- Author -->

								<div class="author">
									<?php if( !empty( _clementine_get_option_('adD_author_image')['url'] ) ) : ?>
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>" title="<?php if( _clementine_get_option_('adD_author_name') ) : echo _clementine_get_option_('adD_author_name'); endif; ?>">
										<img src="<?php echo esc_url( _clementine_get_option_('adD_author_image')['url'] ) ?>" alt="<?php if( _clementine_get_option_('adD_author_name') ) : echo _clementine_get_option_('adD_author_name'); endif; ?>" width="30" height="30">
									</a>
									<?php else : ?>
										<?php echo get_avatar( get_the_author_meta('email'), '30' ); ?>
									<?php endif; ?>
								</div>

								<!-- End Author -->



								<!-- Date -->

								<div class="date">

									<span><?php echo _e( '<i class="fa fa-clock-o"></i> ', 'clementine' ); ?>

										<?php echo human_time_diff( esc_attr( get_the_time('U') ), current_time('timestamp') ) . ' ' . esc_html__('ago', 'clementine'); ?>

										<?php //the_time(get_option('date_format')); ?>

									</span>

								</div>

								<!-- End Date -->



							</div>



						</header>



					</article>

				</div>

			<?php endwhile; ?>

			</div>

		</div>

	<?php endif;



endif;



wp_reset_postdata();

?>