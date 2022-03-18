
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <!-- <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(77,186,189,0.7)" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(77,186,189,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(77,186,189,0.3)" /> -->
                <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(77,186,189,1)" />
        </svg>
    </div>

<footer id="colophon" class="site-footer bg-primary py-12 text-slate-50" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="container mx-auto text-center ">
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
	<div class="inline-block text-slate-50"><b>Förderverein Pro Mirke e.V.</b><br>
	Am Marktweg 43
	42781 Haan-Gruiten</div>
	
</footer>

</div>

</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
