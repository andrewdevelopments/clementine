<div class="post-comments" id="comments">

	<h3><?php echo sprintf( esc_html__('%s Comments', 'clementine'), clementine_count_comments( get_the_id() ) ); ?></h3>

	<div class="comments-body">
		<?php
		wp_list_comments(
			array(
				'avatar_size'	=> 50,
				'max_depth'		=> 5,
				'style'			=> 'ul',
				'callback'		=> 'clementine_comments',
				'type'			=> 'all'
			)
		);
		?>
	</div>

	<div class="comments-pagination">
		<?php paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?>
	</div>

	<?php $comment_field = '<p class="comment-form-comment">
		<textarea id="comment" name="comment" rows="6" aria-required="true"></textarea>
	</p>'; ?>

	<?php
	$fields = array(
		'author' => '<p class="comment-form-author"><input id="author" name="author" placeholder="'. esc_html__( 'Name *', 'clementine' ) .'" type="text" /></p>',
		'email' => '<p class="comment-form-email"><input id="email" placeholder="'. esc_html__( 'Email *', 'clementine' ) .'" name="email" type="text" /></p>',
		'url' => '<p class="comment-form-url"><input id="url" placeholder="'. esc_html__( 'Website', 'clementine' ) .'" name="url" type="text" /></p>'
	);
	?>
	
	<?php 
		comment_form(
			array(
				'comment_field'			=> $comment_field,
				'fields' 				=> apply_filters( 'comment_form_default_fields', $fields ),
				'comment_notes_after'	=> '',
				'logged_in_as' 			=> '',
				'comment_notes_before' 	=> esc_html__('<p>Your email address will not be published. Required fields are marked *</p>', 'clementine'),
				'title_reply'			=> esc_html__('Leave a Comment', 'clementine'),
				'cancel_reply_link'		=> esc_html__('Cancel Comment', 'clementine'),
				'label_submit'			=> esc_html__('Post Comment', 'clementine')
			)
		);
	 ?>


</div>