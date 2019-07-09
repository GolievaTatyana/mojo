<?php get_header(); ?>

<div id="content-404" class="content-404 custom-offset">
  <div class="container d-flex flex-column justify-content-center align-items-center no-scroll-page">
    <div class="row">
      <div class="col my-5">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>