
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer id="colophon" class="site-footer bg-gray-50 py-12" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>



	<div class="container mx-auto text-center text-gray-500">
		&copy; <?php echo date_i18n( 'Y' );?> - <?php echo get_bloginfo( 'name' );?>
		<?php 
		wp_nav_menu(
			array(
				'container_id'    => 'secondary-menu',
				'container_class' => 'hidden bg-slate-100 mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
				'menu_class'      => 'lg:flex lg:-mx-4',
				'theme_location'  => 'secondary',
				'li_class'        => 'lg:mx-4  text-primary ',
				'fallback_cb'     => false,
			)
		);
	?>
	</div>
	<div class="inline-block"><b>Förderverein Pro Mirke e.V.</b><br>
Am Marktweg 43
42781 Haan-Gruiten</div>
	
</footer>

</div>

</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
