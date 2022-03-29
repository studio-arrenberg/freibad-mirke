
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<div class="">
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

	<div class="container max-w-screen-xl mx-auto md:grid grid-cols-3">
		
		<!-- &copy; <?php // echo date_i18n( 'Y' );?> - <?php // echo get_bloginfo( 'name' );?> -->

		<div>
			<?php 

			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object( $locations['secondary'] );
			echo '<h4 class="font-bold mb-3">' . wp_kses_post( $menu->name ) . '</h4>';


			wp_nav_menu(
				array(
					'container_id'    => 'secondary-menu',
					'container_class' => ' md:mt-4 md:p-4 lg:mt-0 lg:p-0 lg:block',
					'menu_class'      => '',
					'theme_location'  => 'secondary',
					'li_class'        => 'text-slate-50 hover:text-dark',
					'fallback_cb'     => false,
				)
			);
			?>
		</div>

		<div>
			<?php 

			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object( $locations['third'] );
			echo '<div class="font-bold mb-3 mt-6 md:mt-0">' . wp_kses_post( $menu->name ) . '</div>';


			wp_nav_menu(
				array(
					'container_id'    => 'third-menu',
					'container_class' => ' md:mt-4 md:p-4 lg:mt-0 lg:p-0 lg:block',
					'menu_class'      => '',
					'theme_location'  => 'third',
					'li_class'        => ' text-slate-50',
					'fallback_cb'     => false,
				)
			);
			?>
			<!-- Begin Mailchimp Signup Form -->
				<div id="mc_embed_signup" class="mb-6 mt-3 md:mb-0 md:mt-6">
					<p class="mb-2">Für den Newsletter registrieren</p>
					<form action="https://freibad-mirke.us14.list-manage.com/subscribe/post?u=019ee74186a81164d81b45391&amp;id=6ec16cff59" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="" novalidate>
						<div id="mc_embed_signup_scroll">
					<div class="mc-field-group">
						<!-- <label for="mce-EMAIL">E-Mail Adresse  <span class="asterisk">*</span> -->
						</label>
						<input type="email" value="" name="EMAIL" class="text-primary required email px-4 py-2 placeholder:text-primary" id="mce-EMAIL" placeholder="Deine E-Mail Adresse">
					</div>
						<div id="mce-responses" class="clear foot">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_019ee74186a81164d81b45391_6ec16cff59" tabindex="-1" value=""></div>
							<div class="optionalParent">
								<div class="clear foot">
									<input type="submit" value="Anmelden" name="subscribe" id="mc-embedded-subscribe" class=" mt-2 bg-transparent hover:bg-secondary  hover:text-white py-1 cursor-pointer px-4 border border-white hover:border-transparent " >
									
								</div>
							</div>
						</div>
					</form>
				</div>

				<!--End mc_embed_signup-->
		</div>


		<div class="text-slate-50"><b>
			<h4 class="font-bold mb-3">Kontakt</h4>
			<p class="text-slate-50 font-normal">
			E-Mail: <a href="mailto:info@pro-mirke.de">info@pro-mirke.de</a><br>
			Csilla Letay: <a href="tel:+49176 62228840">0176 62228840</a><br>
			Heiner Mokroß: <a href="tel:+492104 831117">02104 831117</a><br>
		</div>
	</div>
	<div class="container max-w-screen-xl  mx-auto flex justify-between md:grid  md:grid-cols-3 mt-8  text-sm ">
		<div class="hover:text-white">
			<a  href="<?php echo get_site_url()."/impressum/";?>" class="text-slate-200 font-normal">Impressum</a>
			<a  href="<?php echo get_site_url()."/datenschutz/";?>" class="text-slate-200 font-normal ml-6">Datenschutz</a>
		</div>


		<div class="  md:block hover:text-white">
			<a  href="https://www.instagram.com/freibad_mirke/" class="text-slate-200 font-normal"><span class="inline text-5xl dashicons dashicons-instagram mb-4 "></span></a>
			<a  href="https://de-de.facebook.com/mirkerfreibad/" class="text-slate-200 font-normal"><span class="inline text-5xl dashicons dashicons-facebook"></span></a>
		</div>

		<div class=" ">
			<a  href="<?php echo get_site_url();?>" class="text-slate-200 font-normal">© Pro Mirke e.V.</a>
		</div>
		
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
