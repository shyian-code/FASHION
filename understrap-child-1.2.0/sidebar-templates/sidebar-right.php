<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="right-sidebar">
<?php else : ?>
	<div class="col-md-3 offset-md-1 widget-area" id="right-sidebar">

        <h3 class="wp-block-heading author-title">About the author</h3>
        <div class="about-author-wrapper">
            <figure class="wp-block-image size-full author-photo">
                <img src="http://gowp-online.com/wp-content/uploads/2023/09/author.jpg" alt="" class="wp-image-89"/>
            </figure>
            <div class="about-author-info">
                <h5 class="author-name">Kate Willems</h5>
                <p class="author-status">Food & cooking bloger</p>
                <p class="author-info">
                    Hi, I'm Sonia. Cooking is the way I express my creative side to the world. Welcome to my Kitchen Corner on…
                </p>
                <a class="author-link" href="<?php get_the_author_link(); ?>">
                    Continue Reading
                </a>
            </div>
        </div>

        <div class="posts-list-count">
            <h3 class="wp-block-heading categories-title">Categories</h3>
            <ul class="cat-menu list-group">
                <?php
                $args = array(
                    'orderby' => 'slug',
                    'parent' => 0
                );
                $categories = get_categories( $args );
                foreach( $categories as $category ){
                    echo '<li class="list-group-item d-flex align-items-center">
                            <a class="list-group-item-link" href="' . get_category_link( $category->term_id ) . '" rel="bookmark">'
                        . $category->name . '
                            </a>
                            <span>(' . $category->category_count . ')</span>
                          </li>';
                }
                ?>
            </ul>
        </div>

<?php endif; ?>
<?php dynamic_sidebar( 'right-sidebar' ); ?>

</div><!-- #right-sidebar -->
