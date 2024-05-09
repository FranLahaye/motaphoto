<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<footer class="footer_bar">

		<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
			<nav class="navigation_bar">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						'container'      => false,
						'menu_class' => 'footer_menu',
					)
				);
				?>
			</nav>
		<?php endif; ?>

		<p class="copyright">TOUS DROITS RÉSERVÉS</p>

	</footer>
	
	<?php get_template_part('/template-parts/contact', 'modal'); /* contact modal */ ?>

	<?php wp_footer(); ?>

</body>
</html>
