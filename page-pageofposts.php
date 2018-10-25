<?php
/**
 * Template Name: Page of posts
 *
 */
get_header(); ?>

<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <div class="banner-header" <?php
    if ( has_post_thumbnail() ) {
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
        style="background-image: url(<?php echo $thumbnail_src[0]; ?>);"
    <?php } ?>>
        <div class="page-header">
            <h1>
                <?php the_title(); ?>
            </h1>
        </div>
    </div>
<?php endwhile; ?>
    <main id="main" class="main" role="main">
        <div id="content" class="content-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-offset-1">
                        <div class="entry-content">
                            <?php query_posts('category_name=' . get_the_title() . '&post_status=publish,future'); ?>
                            <?php if (have_posts()) : ?>
                                <?php /* The loop */ ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <article id="post-<?php the_ID(); ?>">
                                        <h3 class="entry-title">
                                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <small><?php the_date('F j, Y'); ?></small>
                                        <div class="entry-content">
                                            <?php the_content(); ?>
                                        </div>
                                    </article>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <h2>No content</h2>
                            <?php endif; ?>
                            <nav>
                                <?php next_posts_link( '&#8249; Older news', 'blankcanvas' ); ?>
                                <?php previous_posts_link( 'Newer news &#8250;', 'blankcanvas' ); ?>
                                <!-- end of .navigation -->
                            </nav>
                            <!-- #post-loop -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>