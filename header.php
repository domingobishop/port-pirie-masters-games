<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="initial-scale = 1.0" name="viewport">
    <title>
        <?php wp_title('|', true, 'right'); ?>
    </title>
    <?php wp_head(); ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>
<div class="branding-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <a href="<?php echo home_url(); ?>"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="branding">
                    <?php echo esc_attr(get_bloginfo('name', 'display')); ?>
                </a>
            </div>
            <div class="col-sm-4 text-right">
                <p>
                    <?php if ( $hp_facebook = get_option('hp_facebook') ) { ?>
                    <a href="<?php echo $hp_facebook; ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/facebook.png"></a>
                    <?php } ?>
                    <?php if ( $hp_twitter = get_option('hp_twitter') ) { ?>
                    <a href="<?php echo $hp_twitter; ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/twitter.png"></a>
                    <?php } ?>
                </p>
            </div>
            <div class="col-sm-2 text-right">
                <p>
                    <a href="<?php echo get_option('reg_btn'); ?>" type="button" class="btn btn-primary">Register now</a>
                </p>
            </div>
        </div>
    </div>
</div>
<header id="head" class="bc-head">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php bloginfo('siteurl'); ?>/"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php wp_nav_menu(array('menu' => 'primary', 'items_wrap' => '<ul class="nav navbar-nav" role="menu">%3$s</ul>', 'container' => false)); ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
<!-- #head -->
