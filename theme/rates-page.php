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
        <?php $thumbnailUrl = get_the_post_thumbnail_url( get_the_id(), full); ?>
        <?php $meta_alt = get_post_meta( get_the_ID(), 'alt', true ); ?>
        <?php $meta_icon = get_post_meta( get_the_id(), 'icon_class', true ); ?>
          <div class="col-sm-6 col-xl-3">
            <i class="<?php echo $meta_icon; ?> icon-common icon-sub-color d-flex justify-content-center align-items-center mx-auto mb-3"></i>
            <div class="card rounded-0 mb-5">
              <!-- <img class="img-fluid image-filter" src="<//?php echo $thumbnailUrl; ?>" alt="<//?php echo $meta_alt; ?>"> -->
              <div class="card-body border-bottom-0 p-0">
                <h5 class="card-title font-weight-bold primary-dark-bg text-center text-white px-4 py-3 mb-0"><?php echo get_the_title(); ?></h5>
                <div class="list-group list-group-flush p-3"><?php echo get_the_content(); ?></div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</div>


