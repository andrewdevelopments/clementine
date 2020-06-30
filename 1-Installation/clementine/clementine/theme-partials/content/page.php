<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php if( has_post_thumbnail() ) : ?>
		<div class="post-media">
			<?php the_post_thumbnail( 'original', array( 'class' => 'img-responsive' )); ?>
		</div>
		<?php endif; ?>
		<?php the_content(); ?>
		<?php
		 	$defaults = array(
				'before'           => '<div class="page-links"><p>' . esc_html__( 'Pages:', 'clementine' ),
				'after'            => '</p></div>',
				'pagelink'         => '%',
				'echo'             => 1
			);
			wp_link_pages( $defaults );
		?>
	</div>
</article>