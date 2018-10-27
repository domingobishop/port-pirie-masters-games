<?php
/**
 * Template Name: Home page
 *
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <div class="home-header-banner">
        <?php get_template_part( 'partials/slider' ); ?>
    </div>
    <main id="main" class="main" role="main">
        <div class="container">
            <div class="content clearfix">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center">
                                <?php get_template_part( 'partials/content' ); ?>
                            </div>
                        </div>
                </article>
            </div>
        </div>
    </main>

<?php endwhile; ?>

<?php get_footer(); ?>