<article id="post-<?php the_ID(); ?>" <?php post_class( ' ' ); ?>>


	<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<div class="w-auto">
			<?php the_post_thumbnail('large'); ?>
		</div>
	<?php endif; ?>



	<?php if( '' !== get_post()->post_content ) { ?>

		<?php
			// Gutenberg
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
		?>

	<?php } ?>
</article>




