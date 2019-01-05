<?php get_header(); ?>
<main id="main" class="bc-main" role="main">
    <div id="content" class="bc-content">
        <section id="post-loop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="entry-header">
                            <h1>Latest news</h1>
                        </div>
                        <div class="post-loop">
                            <?php if (have_posts()) : ?>
                                <?php /* The loop */ ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <article id="post-<?php the_ID(); ?>" class="row post-item">
                                        <div class="col-sm-9">
                                            <h2 class="entry-title">
                                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h2>
                                            <div class="entry-summary">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) : ?>
                                                <div class="entry-thumbnail">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </article>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <h1>No content</h1>
                            <?php endif; ?>
                            <nav class="paged-posts clearfix">
                                <div class="previous"><?php next_posts_link( '&#8249; Older posts' ); ?></div>
                                <div class="next"><?php previous_posts_link( 'Newer posts &#8250;' ); ?></div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- #content -->
</main>

<?php get_footer(); ?>
