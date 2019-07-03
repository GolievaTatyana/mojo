<?php /* Template Name: RatesPage */ ?>

<?php get_header(); ?>

<?php 

$static_children = new WP_Query(array(
  'post_type' => 'page',
  'post_parent' => get_the_ID(),
  'order' => 'ASC',
  'orderby' => 'menu_order'
  )
);

?>

<div class="rates-page custom-offset py-3">
  <div class="container">
    <div class="row">
      <div class="col d-flex flex-column justify-content-center align-items-center">
        <h3 class="text-uppercase text-dark font-weight-bold"><?php echo get_the_title(); ?></h3>
        <div class="underlining sub-color-line mt-3 mb-5"></div>
      </div>
    </div>
    <div class="row">
      <?php if( $static_children->have_posts() ) : ?>
        <?php while( $static_children->have_posts() ) : $static_children->the_post(); ?>
          <!-- <div class="col-sm-6">
            <div class="card rounded-0 mb-5">
              <div class="card-body border-bottom-0 p-0">
                <h5 class="card-title font-weight-bold primary-dark-bg text-center text-white px-4 py-3 mb-0"><//?php echo get_the_title(); ?></h5>
                <div class="list-group list-group-flush"><//?php echo get_the_content(); ?></div>
              </div>
            </div>
            <//?php echo apply_filters( 'the_content', $static_children->post_content ); ?>
          </div> -->
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
      <?php echo do_shortcode('[ctu_ultimate_oxi  id="3"]'); ?>
    </div>
  </div>
</div>


