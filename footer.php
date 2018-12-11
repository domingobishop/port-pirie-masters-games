<div class="sponsors">
  <div class="container">
    <div class="row text-center">
        <p>
            <a href="<?php echo get_option('reg_btn'); ?>" type="button" class="btn btn-primary">Register now</a>
        </p>
    </div>
  </div>
</div>
<div class="major-sponsors">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
          <div class="sponsor-logos">
          <?php
          echo get_option('sponsors');
          ?>
          </div>
      </div>
    </div>
  </div>
</div>
<footer id="footer" class="bc-footer">
  <div class="container">
    <?php if ( is_active_sidebar( 'footer-widget-area' ) ) { ?>
      <div class="row">
          <?php dynamic_sidebar( 'footer-widget-area' ); ?>
      </div>
    <?php } ?>
    <div class="row bc-info">
      <div class="col-lg-8 col-lg-offset-2 text-center">
        <h4>Port Pirie Masters Games 2018</h4>
        <p>
          <a href="<?php echo get_option('hp_facebook'); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/facebook.png"></a>
          <a href="<?php echo get_option('hp_twitter'); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/twitter.png"></a>
        </p>
          <p>
              <?php echo get_option('hp_address_1'); ?><br>
              <?php echo get_option('hp_address_2'); ?><br>
              <?php echo get_option('hp_tel'); ?><br>
              <a href="mailto:<?php echo get_option('hp_email'); ?>">Email us</a>
          </p>
        <p><small>Copyright © <?php echo date("Y"); ?> <br>
            Website by <a href="http://creatistic.com.au/" target="_blank">Creatistic</a></small></p>
      </div>
    </div>
  </div>
</footer>
<!-- #foot -->

<?php wp_footer(); ?>

</body>
</html>
