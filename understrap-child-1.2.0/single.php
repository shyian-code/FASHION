<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>


    <?php
        // Get the thumbnail URL
        $thumbnail_url = get_the_post_thumbnail_url();
    ?>
    <div class="hero-single-page" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');">
        <div class="<?php echo esc_attr( $container ); ?>">

            <h1 class="hero-single-page__hero-title">
                <?php the_title(); ?>
            </h1>
            <div class="hero-single-page__info-wrapper">
                <span class="hero-single-pagee-slide__post-date"><?php the_date(); ?></span>
                <p class="hero-single-page__post-author">
                    <span class="hero-single-page__post-author-prefix">By</span>
                    <?php get_the_author(); ?>
                </p>
            </div>
        </div>
    </div>

    <div class="wrapper single-wrapper">
        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

            <div class="row">
                <div class="col-md-8">
                    <article>
                        <?php the_content();?>
                    </article>
                    <?php
                    // Do the right sidebar check and close div#primary.
                    get_template_part( 'global-templates/right-sidebar-check' );
                    ?>
                </div>
            </div><!-- .row -->

        </div><!-- #content -->

    </div><!-- #single-wrapper -->

<?php
get_footer();
