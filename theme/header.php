<?php $templateUri = get_template_directory_uri();?>
<!DOCTYPE html>
<html lang="en">

<?php $url = site_url(); ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="<?php echo $templateUri ?>/images/logo.png">
  <title><?php wp_title(); ?></title>

  <?php wp_head(); ?>
</head>

<body class="text-secondary">
  <header class="site-header primary-dark-bg position-fixed w-100">
    <div class="container">
      <div class="row justify-content-between position-relative">
        <nav class="header-nav navbar navbar-expand-xl w-100 d-flex justify-content-between">
          <a class="d-flex navbar-brand text-white font-weight-bold order-lg-0" href="<?php echo $url; ?>">
            <img class="logo" src="<?php echo $templateUri ?>/images/logo.png" alt="logo">
          </a>
          <div class="phone-wrapper d-flex justify-content-end align-items-center order-lg-2">
            <div class="d-flex align-items-center">
              <i class="fas fa-phone-square sub-color mr-2 fa-3x"></i>
              <?php
              wp_nav_menu( array(
                'theme_location'  => 'phone_header_menu',
                'menu'            => 'phone_header_menu',
                'container'       => 'div',
                'container_class' => 'mr-2 mr-md-4',
                'menu_class'      => 'phone-header-menu text-white',
                )
              );
            ?> 
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z" /></svg>
            </button>
          </div>
          <?php
            wp_nav_menu( array(
              'theme_location'  => 'header_menu',
              'menu'            => 'header_menu',
              'container'       => 'div',
              'container_class' => 'collapse navbar-collapse flex-grow-0',
              'container_id'    => 'navbarNav',
              'menu_class'      => 'navbar-nav justify-content-end w-100 py-3 order-lg-1',
              )
            );
          ?> 
        </nav>
      </div>
    </div>
  </header>
    