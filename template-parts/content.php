<article id="post-<?php the_ID(); ?>" <?php post_class( ' block mb-12' ); ?>>

	<a class="flex" href="<?php echo  esc_url( get_permalink())?>"> 

		<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<div class="w-2/5">
		    	<?php the_post_thumbnail('large'); ?>
			</div>
		<?php endif; ?>

		<div class="w-3/5 pl-8">
			<div class="entry-header mb-4">
				<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class=" text-gray-700 text-sm font-light "><?php echo get_the_date(); ?></time>
				<h2 class="text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight mb-1">
					<?php the_title(); ?>
				</h2>
			</div>

			<div class="entry-summary font-light leading-6">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</a>
</article>




