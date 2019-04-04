<?php get_header(); ?>

  <div class="page">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</header>

<?php get_footer(); ?>