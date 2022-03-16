
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer id="colophon" class="site-footer bg-primary py-12 text-white text-center" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="container mx-auto ">
		&copy; <?php echo date_i18n( 'Y' );?>
		<?php 
		wp_nav_menu(
			array(
				'container_id'    => 'secondary-menu',
				'container_class' => 'hidden bg-slate-100 mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
				'menu_class'      => 'lg:flex lg:-mx-4',
				'theme_location'  => 'secondary',
				'li_class'        => 'lg:mx-4  ',
				'fallback_cb'     => false,
			)
		);
	?>
	</div>
	<div>
		
		<a href="https://www.instagram.com/freibad_mirke/"><span class="dashicons dashicons-instagram text-primary"></span></a>
	</div>
	<div class="inline-block">
		<b>Förderverein Pro Mirke e.V.</b><br>
		Am Marktweg 43
		42781 Haan-Gruiten
	</div>
	
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
