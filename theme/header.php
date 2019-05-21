<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>

  <?php wp_head(); ?>
</head>

<body class="text-secondary">
    <header class="site-header primary-dark-bg position-fixed w-100">
      <div class="container">
        <div class="row">
          <nav class="header-nav navbar navbar-expand-lg w-100">
            <a class="navbar-brand text-white font-weight-bold" href="#"><span class="sub-color">Mo</span>go</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z" /></svg>
            </button>

            <?php
              wp_nav_menu( array(
                'theme_location'  => 'header_menu',
                'menu'            => 'header_menu',
                'container'       => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id'    => 'navbarNav',
                'menu_class'      => 'navbar-nav justify-content-end w-100 py-3',
                )
              );
            ?>
            
          </nav>
        </div>
      </div>
    </header>
    