    <footer class="site-footer py-5">
      <div class="container">
        <div class="row justify-content-center">
          
          <?php
            wp_nav_menu( array(
              'theme_location'  => 'footer_menu',
              'menu'            => 'footer_menu',
              'container'       => false,
              'menu_class'      => 'footer-nav d-sm-flex text-center',
              )
            );
          ?>
          
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>

</html>

