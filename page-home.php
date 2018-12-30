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
    <main id="sports" class="sports">
        <div class="container">
            <div class="content clearfix">
                <article>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <ul>
                            <?php
                            $category_id = get_cat_ID('sport');
                            $args = array(
                                'category' => $category_id,
                                'post_type'   => 'page',
                                'order'          => 'ASC',
                                'orderby'        => 'title'
                            );
                            $sports = get_posts( $args );
                            foreach ( $sports as $sport ) {
                                // var_dump($sport);
                                ?>
                                <li>
                                    <a href="<?php echo get_page_link( $sport->ID ); ?>" title="<?php echo $sport->post_title ?>" type="button" class="btn btn-default">
                                        <?php echo $sport->post_title; ?>
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </main>

<?php endwhile; ?>

<?php get_footer(); ?>