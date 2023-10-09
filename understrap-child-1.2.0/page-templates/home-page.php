<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}

$wrapper_id = 'full-width-page-wrapper';
if ( is_page_template( 'page-templates/no-title.php' ) ) {
	$wrapper_id = 'no-title-page-wrapper';
}
?>

    <?php query_posts(array(
            'post_type' => 'hero-slider',
            'orderby' => 'rand'
    )); ?>

    <?php if ( have_posts() ) : ?>
        <div class="home-page-slider">
            <div class="slick-slider">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php
                    // Get the thumbnail URL
                    $thumbnail_url = get_the_post_thumbnail_url();
                    ?>
                    <div class="single-slide slick-slide d-flex align-items-end" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');">
                        <div class="<?php echo esc_attr( $container ); ?>">
                            <h1 class="single-slide__hero-title">
                                    <?php the_title(); ?>
                            </h1>
                            <div class="single-slide__info-wrapper">
                                    <span class="single-slide__post-date"><?php the_date(); ?></span>
                                    <p class="single-slide__post-author">
                                        <span class="single-slide__post-author-prefix">By</span>
                                        <?php the_author(); ?>
                                    </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="<?php echo esc_attr( $container ); ?>">
                <div class="dots">
                </div>
            </div>
        </div>
    <?php endif; wp_reset_query(); ?>

	<div class="wrapper home-page-wrapper" id="<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?>">

		<div class="<?php echo esc_attr( $container ); ?>" id="content">

			<div class="row">
				<div class="col-md-8 content-area text-center" id="primary">

					<main class="site-main" id="main" role="main">
						<?php

                        $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
                        //var_dump($paged);
                        // Query the 6 latest blog posts
						$args = array(
							'post_type'  => 'post', // Change to your custom post type if necessary
							'orderby' => 'post_date',
							'order' => 'DESC',
							'posts_per_page' => 6,
                            'paged' => $paged,
						);
						$query = new WP_Query($args);

						if ($query->have_posts()) :
							while ($query->have_posts()) : $query->the_post();
								?>
								<a class="grid-item single-post-card" href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('custom-post-thumbnail'); ?>

									<article class="post-description">
										<?php $categories = get_the_category(); ?>
										<?php if ($categories) : ?>
											<?php foreach ($categories as $category) : ?>
												<span class="single-post-card__category">
													<?php echo esc_html($category->name); ?>
												</span>
											<?php endforeach; ?>
										<?php endif; ?>
										<h2 class="single-post-card__title"><?php the_title(); ?></h2>
										<div class="single-post-card__info-wrapper">
											<span class="post-date"><?php the_date(); ?></span>
											<p class="post-author">
												<span class="post-author-prefix">By</span>
                                                <?php the_author(); ?>
											</p>
										</div>
									</article>
								</a>
							<?php
							endwhile;

						endif;

						wp_reset_postdata();
						?>
					</main>

                    <?php //understrap_pagination(); ?>
                    <?php

                    global $wp_query;
                    //Pagination
                    $big = 999999999; // A large number unlikely to be reached in your posts.
                    $pagination_args = array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?page=%#%',
                        'current' => max(1, get_query_var('page')),
                        'total' => $query->max_num_pages,
                        'prev_text' => '<span class="pagination-arrow">&larr;</span><span class="pagination-prev-custom">OLDER POST</span>',
                        'next_text' => '<span class="pagination-next-custom">NEXT POST</span><span class="pagination-arrow">&rarr;</span>',
                    );

                    echo '<div class="pagination">';
                    echo paginate_links($pagination_args);
                    echo '</div>';

                    ?>
					<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
				</div>
			</div><!-- .row -->
		</div><!-- #content -->

	</div><!-- #<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?> -->

<?php
get_footer();
