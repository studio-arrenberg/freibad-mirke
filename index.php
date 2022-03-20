<?php get_header(); ?>

<!-- <main  role="main" data-track-content> -->
<!-- class="container max-w-screen-lg mx-auto my-12 py-48" -->

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

		<!-- </main> -->

<?php
get_footer();
