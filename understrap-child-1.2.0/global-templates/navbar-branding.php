<?php
/**
 * Navbar branding
 *
 * @package Understrap
 * @since 1.2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! has_custom_logo() ) { ?>

	<?php if ( is_front_page() && is_home() ) : ?>

		<h1 class="navbar-brand mb-0">
			<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
				<?php $image = get_field( 'logotype', 'option' ); ?>
				<?php if ( ! empty( $image ) ) : ?>
					<img class="navbar-brand-logo-img" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
				<?php endif; ?>
				<?php // get_field('logotype', 'option'); ?>
			</a>
		</h1>

	<?php else : ?>

		<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
			<?php $image = get_field( 'logotype', 'option' ); ?>
			<?php if ( ! empty( $image ) ) : ?>
				<img class="navbar-brand-logo-img" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
			<?php endif; ?>
			<?php // get_field('logotype', 'option'); ?>
		</a>

	<?php endif; ?>

	<?php
} else {
	the_custom_logo();
}
