<?php
	$prev_post = get_previous_post();
	$next_post = get_next_post();
?>

<div class="post-pagination row">
	
	<div class="prev-post c-6">

		<?php if( $prev_post ) : ?>
			<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
				<div class="pagination-text">
					<span><?php esc_html_e( 'Previous Post', 'clementine' ); ?></span>
					<h5><?php echo get_the_title( $prev_post->ID ); ?></h5>
				</div>
				<?php if( has_post_thumbnail( $prev_post->ID ) ) : ?>
					<div class="post-thumb">
						<?php echo get_the_post_thumbnail( $prev_post->ID, 'fullheight-thumbnail', array('class' => 'img-responsive') ); ?>
					</div>
				<?php endif; ?>
			</a>
		<?php endif; ?>

	</div>
	
	<div class="next-post c-6">

		<?php if( $next_post ) : ?>
			<a href="<?php echo get_permalink( $next_post->ID ); ?>">
				<div class="pagination-text">
					<span><?php esc_html_e( 'Next Post', 'clementine' ); ?></span>
					<h5><?php echo get_the_title( $next_post->ID ); ?></h5>
				</div>
				<?php if( has_post_thumbnail( $next_post->ID ) ) : ?>
					<div class="post-thumb">
						<?php echo get_the_post_thumbnail( $next_post->ID, 'fullheight-thumbnail', array('class' => 'img-responsive') ); ?>
					</div>
				<?php endif; ?>
			</a>
		<?php endif; ?>

	</div>
		
</div>