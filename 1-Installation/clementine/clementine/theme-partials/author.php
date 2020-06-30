<div class="post-author">

	

	<div class="row valign">



		<div class="c-3 align-center">

			<div class="author-img">

				<?php if( !empty( _clementine_get_option_('adD_author_image')['url'] ) ) : ?>

					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>" title="<?php if( _clementine_get_option_('adD_author_name') ) : echo _clementine_get_option_('adD_author_name'); endif; ?>">

						<img src="<?php echo esc_url(_clementine_get_option_('adD_author_image')['url']) ?>" alt="<?php if( _clementine_get_option_('adD_author_name') ) : echo _clementine_get_option_('adD_author_name'); endif; ?>" width="<?php echo _clementine_get_option_('adD_author_image')['width'] ?>" height="<?php echo _clementine_get_option_('adD_author_image')['height'] ?>">

					</a>

				<?php else : ?>

					<?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>

				<?php endif; ?>

			</div>

		</div>



		<div class="c-9">

			<div class="author-information">

				<?php if( _clementine_get_option_('adD_author_name') != '' ) : ?>

					<h4><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php echo _clementine_get_option_('adD_author_name'); ?></a></h4>

				<?php else : ?>

					<h4><?php the_author_posts_link(); ?></h4>

				<?php endif; ?>

			</div>



			<div class="author-biography">

				<?php if( _clementine_get_option_('adD_author_bio') != '' ) : ?>

					<p><?php echo _clementine_get_option_('adD_author_bio'); ?></p>

				<?php else : ?>

					<p><?php the_author_meta('description'); ?></p>

				<?php endif; ?>

			</div>



			<?php if( _clementine_get_option_('adD_author_website') || _clementine_get_option_('adD_author_facebook') || _clementine_get_option_('adD_author_twitter') || _clementine_get_option_('adD_author_google') || _clementine_get_option_('adD_author_instagram') || _clementine_get_option_('adD_author_behance') || _clementine_get_option_('adD_author_dribbble') || _clementine_get_option_('adD_author_linkedin') || _clementine_get_option_('adD_author_pinterest') || _clementine_get_option_('adD_author_youtube') || _clementine_get_option_('adD_author_tumblr') ) : ?>

				<div class="social-media">

					<!-- @website -->

					<?php if( _clementine_get_option_('adD_author_website') ) : ?>

						<a href="<?php echo esc_url( _clementine_get_option_('adD_author_website') ); ?>"><i class="fa fa-globe"></i></a>

					<?php endif; ?>



					<!-- @facebook -->

					<?php if( _clementine_get_option_('adD_author_facebook') ) : ?>

						<a href="<?php echo esc_url( _clementine_get_option_('adD_author_facebook') ); ?>"><i class="fa fa-facebook"></i></a>

					<?php endif; ?>

						

					<!-- @twitter -->

					<?php if( _clementine_get_option_('adD_author_twitter') ) : ?>

						<a href="<?php echo esc_url( _clementine_get_option_('adD_author_twitter') ); ?>"><i class="fa fa-twitter"></i></a>

					<?php endif; ?>

					

					<!-- @google -->

					<?php if( _clementine_get_option_('adD_author_google') ) : ?>

						<a href="<?php echo esc_url( _clementine_get_option_('adD_author_google') ); ?>"><i class="fa fa-google-plus"></i></a>

					<?php endif; ?>

					

					<!-- @instagram -->

					<?php if( _clementine_get_option_('adD_author_instagram') ) : ?>

						<a href="<?php echo esc_url( _clementine_get_option_('adD_author_instagram') ); ?>"><i class="fa fa-instagram"></i></a>

					<?php endif; ?>



					<!-- @behance -->

					<?php if( _clementine_get_option_('adD_author_behance') ) : ?>

						<a href="<?php echo esc_url( _clementine_get_option_('adD_author_behance') ); ?>"><i class="fa fa-behance"></i></a>

					<?php endif; ?>



					<!-- @dribbble -->

					<?php if( _clementine_get_option_('adD_author_dribbble') ) : ?>

						<a href="<?php echo esc_url( _clementine_get_option_('adD_author_dribbble') ); ?>"><i class="fa fa-dribbble"></i></a>

					<?php endif; ?>



					<!-- @linkedin -->

					<?php if( _clementine_get_option_('adD_author_linkedin') ) : ?>

						<a href="<?php echo esc_url( _clementine_get_option_('adD_author_linkedin') ); ?>"><i class="fa fa-linkedin"></i></a>

					<?php endif; ?>



					<!-- @pinterest -->

					<?php if( _clementine_get_option_('adD_author_pinterest') ) : ?>

						<a href="<?php echo esc_url( _clementine_get_option_('adD_author_pinterest') ); ?>"><i class="fa fa-pinterest-p"></i></a>

					<?php endif; ?>



					<!-- @youtube -->

					<?php if( _clementine_get_option_('adD_author_youtube') ) : ?>

						<a href="<?php echo esc_url( _clementine_get_option_('adD_author_youtube') ); ?>"><i class="fa fa-youtube"></i></a>

					<?php endif; ?>

					

					<!-- @tumblr -->

					<?php if( _clementine_get_option_('adD_author_tumblr') ) : ?>

						<a href="<?php echo esc_url( _clementine_get_option_('adD_author_tumblr') ); ?>"><i class="fa fa-tumblr"></i></a>

					<?php endif; ?>

				</div>

			<?php endif; ?>

		</div>



	</div>



</div>