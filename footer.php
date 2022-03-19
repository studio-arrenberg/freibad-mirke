
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<div class="bg-slate-50 ">
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

<footer id="colophon" class="site-footer bg-primary pt-12 pb-6 text-slate-50 " role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="container max-w-screen-xl mx-auto grid grid-cols-3">
		
		<!-- &copy; <?php // echo date_i18n( 'Y' );?> - <?php // echo get_bloginfo( 'name' );?> -->

		<div>
			<?php 

			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object( $locations['secondary'] );
			echo '<h4 class="font-bold mb-3">' . wp_kses_post( $menu->name ) . '</h4>';


			wp_nav_menu(
				array(
					'container_id'    => 'secondary-menu',
					'container_class' => 'hidden mt-4 p-4 lg:mt-0 lg:p-0 lg:block',
					'menu_class'      => '',
					'theme_location'  => 'secondary',
					'li_class'        => ' text-slate-50',
					'fallback_cb'     => false,
				)
			);
			?>
		</div>

		<div>
			<?php 

			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object( $locations['secondary'] );
			echo '<div class="font-bold mb-3">' . wp_kses_post( $menu->name ) . '</div>';


			wp_nav_menu(
				array(
					'container_id'    => 'secondary-menu',
					'container_class' => 'hidden mt-4 p-4 lg:mt-0 lg:p-0 lg:block',
					'menu_class'      => '',
					'theme_location'  => 'secondary',
					'li_class'        => ' text-slate-50',
					'fallback_cb'     => false,
				)
			);
			?>
		</div>


		<div class="text-slate-50"><b>
			<h4 class="font-bold mb-3">Kontakt</h4>
			<p class="text-slate-50 font-normal">
			E-Mail: info@promirke.de<br>
			Telefon: 02104 8311<br>
			Fax: 02104 831134<br>
			Telefon: 02104 8311<br>
		</div>
	</div>
	<div class="container max-w-screen-xl  mx-auto grid grid-cols-3 mt-8  ">

		<div class=" ">
			<a  href="" class="text-slate-200 font-normal">Impressum</a>
			<a  href="" class="text-slate-200 font-normal ml-6">Datenschutz</a>
		</div>


		<div class=" text-center">
			<a  href="" class="text-slate-200 font-normal">I</a>
			<a  href="" class="text-slate-200 font-normal ml-6">F</a>
		</div>

		<div class=" ">
			<a  href="" class="text-slate-200 font-normal">© Förderverein Pro Mirke eV</a>
		</div>
		
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
