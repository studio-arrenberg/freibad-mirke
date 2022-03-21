<div class="bg-slate-50 " id="post-<?php the_ID(); ?>" > <?php// post_class(); ?>

	<div class=" z-0 absolute left-0 right-0 bottom-0 top-[152px]">
		<?php the_post_thumbnail(); ?>
	</div>

	<div class="relative py-16 px-12 z-10 bg-white container my-8 mx-auto mt-[40vh] min-h-screen max-w-screen-lg">
		<header class="mb-4">
		<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
			<?php the_title( sprintf( '<h1 class="entry-title  text-xl lg:text-4xl font-extrabold leading-tight mb-1 text-red"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		</header>

		<div class="max-w-80">
			<?php the_content(); ?>

			<?php
				// the_post_thumbnail();
				wp_link_pages(
					array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
			?>
		</div>
	</div>

</div>
