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
    <?php
    $google_map = get_post_meta($post->ID, 'google-map', true);
    $contact_details = get_post_meta($post->ID, 'contact-details', true);
    $fee = get_post_meta($post->ID, 'fee', true);
    if ( $google_map ) {
        $col_class = 'col-md-6';
    } else {
        $col_class = 'col-lg-10 col-md-offset-1';
    }
    ?>
    <main id="main" class="main" role="main">
        <div id="content" class="content-area">
            <div class="container">
                <div class="row">
                    <div class="<?php echo $col_class ?>">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    </div>
                    <?php if ($google_map) { ?>
                        <div class="col-md-6 sports-details">
                            <div class="sports-heading">
                                <h3>VENUE</h3>
                            </div>
                            <div class="google-map sports-entry">
                                <?php echo $google_map ?>
                            </div>
                            <div class="sports-heading">
                                <h3>FEE</h3>
                            </div>
                            <div class="fee sports-entry">
                                <?php echo $fee ?>
                            </div>
                            <div class="sports-heading">
                                <h3>CONTACT</h3>
                            </div>
                            <div class="contact-details sports-entry">
                                <?php echo $contact_details ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
<?php endwhile; ?>
<?php get_footer(); ?>