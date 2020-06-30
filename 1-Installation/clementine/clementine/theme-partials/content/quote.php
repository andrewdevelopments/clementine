<?php
$quote = get_post_meta( $post->ID, '_format_quote_source_name', true);
$author = get_post_meta( $post->ID, '_format_quote_source_url', true);
if( _clementine_get_option_('adD_layout') == 'full-width' ) :
	$thumb = 'clementine-fullwidth-thumbnail';
else :
	$thumb = 'clementine-default-thumbnail';
endif;
$fullheight_article = get_post_meta( get_the_ID(), 'show_only_image', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if( !is_single() ) : ?>
		<header class="entry-header <?php if( !has_post_thumbnail() ) : echo 'no-thumbnail'; endif;?> <?php if( $fullheight_article == 'on' || has_post_thumbnail() && $fullheight_article == '' ) : echo 'fullheight-thumbnail'; endif; ?> <?php if( $quote ) : echo 'quote'; endif; ?>">
			<?php if( has_post_thumbnail() && $fullheight_article == 'off' ) : ?>
				<!-- Post Media -->
				<div class="post-media">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( $thumb, array('class' => 'img-responsive') ); ?>
					</a>
					<div class="category"><?php clementine_categories(); ?></div>
				</div>
				<!-- End Post Media -->
			<?php elseif( _clementine_get_option_('adD_layout') == 'full-width' ) : ?>
				<!-- Post Media -->
				<div class="post-media">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( $thumb, array('class' => 'img-responsive') ); ?>
					</a>
					<div class="category"><?php clementine_categories(); ?></div>
				</div>
				<!-- End Post Media -->
			<?php elseif( has_post_thumbnail() && $fullheight_article == 'on' ) : ?>
				<!-- Full height media -->
				<div class="post-media">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( 'clementine-fullheight-thumbnail', array('class' => 'img-responsive') ); ?>
					</a>
					<div class="category"><?php clementine_categories(); ?></div>
				</div>
				<!-- End Full height media -->
			<?php elseif( has_post_thumbnail() && $fullheight_article == '' ) : ?>
				<!-- Normal media -->
				<div class="post-media">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( 'clementine-default-thumbnail', array('class' => 'img-responsive') ); ?>
					</a>
					<div class="category"><?php clementine_categories(); ?></div>
				</div>
				<!-- End Normal media -->
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
						<img src="<?php echo esc_url(_clementine_get_option_('adD_author_image')['url']) ?>" alt="<?php if( _clementine_get_option_('adD_author_name') ) : echo _clementine_get_option_('adD_author_name'); endif; ?>" width="30" height="30">
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
		<?php if( $quote ) : ?>
			<!-- Quote -->
			<div class="entry-content">
				<p><?php echo $quote; ?></p>
			</div>
			<!-- End Quote -->
			<!-- Article footer -->
			<footer class="entry-footer">
				<div class="post-permalink row valign">
					<div class="<?php if( _clementine_get_option_('adD_layout') == 'grid-2-cols' || _clementine_get_option_('adD_layout') == 'post-grid' || _clementine_get_option_('adD_layout') == 'grid-3-cols' || _clementine_get_option_('adD_layout') == 'grid-4-cols' ) : echo 'c-8'; else : echo 'c-4'; endif; ?>">
						<a href="<?php the_permalink(); ?>" class="btn read-more">
							<?php
							if( _clementine_get_option_('adD_read_more_string') ) :
								echo sprintf( esc_html__( '%s', 'clementine' ), _clementine_get_option_('adD_read_more_string') );
							else :
								esc_html_e( 'Continue Reading', 'clementine' );
							endif;
							?>
						</a>
					</div>
					<div class="align-right <?php if( _clementine_get_option_('adD_layout') == 'grid-2-cols' || ( _clementine_get_option_('adD_layout') == 'post-grid' && !is_sticky() ) || _clementine_get_option_('adD_layout') == 'grid-3-cols' || _clementine_get_option_('adD_layout') == 'grid-4-cols' ) : echo 'c-4'; else : echo 'c-8'; endif; ?>">
						<?php if( ( _clementine_get_option_('adD_layout') == 'default' || _clementine_get_option_('adD_layout') == 'full-width' || is_sticky() ) && ( _clementine_get_option_('adD_layout') != 'grid-2-cols' ) && ( _clementine_get_option_('adD_layout') != 'grid-3-cols' ) && ( _clementine_get_option_('adD_layout') != 'grid-4-cols' ) ) : ?>
							<div class="box">
								<span class="views">
									<i class="fa fa-eye"></i>
									<?php echo views::get( get_the_ID() ); ?>
								</span>
								<span class="like">
									<?php echo get_simple_likes_button( get_the_ID() ); ?>
								</span>
								<?php if( _clementine_get_option_('adD_general_options')['hide-comments'] != 1 ) : ?>
									<span class="comments">
										<a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comment"></i><?php echo clementine_count_comments( get_the_ID() ); ?></a>
									</span>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<?php clementine_sharing(); ?>
					</div>
				</div>
			</footer>
			<!-- End Article footer -->
		<?php endif; ?>
	<?php endif; ?>
	<?php if( is_single() ) : ?>
		<?php $coordinates = explode(',', get_post_meta( $post->ID, 'map_coordinates', true )); ?>
		<?php
		$marker = get_post_meta( get_the_ID(), 'map_post_icon', true );
		if( !$marker ) :
			$marker_icon = THEME_URL . '/theme-functions/assets/images/icon1.png';
		else :
			$marker_icon = THEME_URL . '/theme-functions/assets/images/'. $marker .'.png';
		endif;
		?>
		<?php if( get_post_meta( $post->ID, 'map_coordinates', true ) ) : ?>
			<!-- Post Map -->
			<div id="post-map" data-marker="<?php echo $marker_icon; ?>" data-lat="<?php echo $coordinates[0]; ?>" data-long="<?php echo $coordinates[1]; ?>"></div>
			<!-- End Post Map -->
		<?php endif; ?>
		<!-- Post Content -->
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<!-- End Post Content -->
		<?php if( has_tag() ) : ?>
			<div class="entry-footer row">
				<div class="c-12">
					<i class="fa fa-tags"></i>
					<?php the_tags( '<ul class="post-tags default"><li>', '</li><li>', '</li></ul>' ); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if( _clementine_get_option_('adD_post_sharing') == 1 ) : ?>
			<div class="post-sharing">
				<p><?php esc_html_e( 'Share this on', 'clementine' ); ?></p>
				<div class="post-share">
					<a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
						<i class="fa fa-facebook"></i>
						<?php echo esc_html_e( 'Facebook', 'clementine' ); ?>
					</a>
					<a class="twitter" target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20-%20<?php the_permalink(); ?>">
						<i class="fa fa-twitter"></i>
						<?php echo esc_html_e( 'Twitter', 'clementine' ); ?>
					</a>
					<a class="google" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
						<i class="fa fa-google-plus"></i>
						<?php echo esc_html_e( 'Google +', 'clementine' ); ?>
					</a>
					<a class="pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())) ); ?>">
						<i class="fa fa-pinterest-p"></i>
						<?php echo esc_html_e( 'Pinterest', 'clementine' ); ?>
					</a>
				</div>
			</div>
		<?php endif; ?>
		<!-- Post Author -->
		<?php get_template_part( 'theme-partials/author' ); ?>
		<!-- End Post Author -->
		<!-- Post Pagination -->
		<?php get_template_part( 'theme-partials/post-pagination' ); ?>
		<!-- End Post Pagination -->
		<!-- Related Posts -->
		<?php if( _clementine_get_option_('adD_post_related') == 1 ) :
			get_template_part( 'theme-partials/related-posts' );
		endif;
		?>
		<!-- End Related Posts -->
		<!-- Post Comments -->
		<?php if( _clementine_get_option_('adD_general_options')['hide-comments'] != 1 ) : ?>
			<?php comments_template( '', true );  ?>
		<?php endif; ?>
		<!-- End Post Comments -->
		
	<?php endif; ?>
</article>