<div class="sponsors">
  <div class="container">
    <div class="row">
      
    </div>
  </div>
</div>
<div class="major-sponsors">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h3>Major Sponsors</h3>
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
          <a href="#" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/facebook.png"></a>
          <a href="#" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/twitter.png"></a>
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