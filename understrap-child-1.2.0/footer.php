<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">
			<div class="col-md-12 text-center">
				<footer class="site-footer" id="colophon">
					<div class="site-info">
						<?php $image = get_field( 'logotype', 'option' ); ?>
						<?php if ( ! empty( $image ) ) : ?>
							<img class="site-footer-logo" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
						<?php endif; ?>
					</div><!-- .site-info -->
					<div class="site-footer-menu-wrapper">

						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'footer',
								'container_class' => 'footer-menu',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'footer-menu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						);
						?>
					</div>
				</footer><!-- #colophon -->
			</div><!-- col -->

			<div class="col-md-12 text-center">

				<?php if ( $footer_copyrigth = get_field( 'footer_copyright', 'option' ) ) : ?>
					<div class="site-copyright">
							<?php echo $footer_copyrigth; ?>
					</div><!-- .site-info -->
				<?php endif; ?>

			</div><!-- col -->
		</div><!-- .row -->
	</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

