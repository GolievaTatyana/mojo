<?php /* Template Name: ratesTypePage */ ?>

<?php
$args = array(
  'sort_column' => 'menu_order',
  'hierarchical' => 0,
  'meta_key' => 'add_to',
);
$ratesTypeForSections = get_pages($args);

$ratesType = [];
$counter  = 0;

foreach ($ratesTypeForSections as $rate) {
  switch ($rate->meta_value) {
    case 'ratesType':
		$ratesType[] = $rate;
    break;
	}
}
?>

<?php get_header(); ?>

<?php if ($ratesType): ?>
  <div class="ratesType-page custom-offset no-scroll-page">
    <?php foreach ($ratesType as $key => $item): ?>
      <?php $thumbnailUrl = get_the_post_thumbnail_url($item, full);?>
      <?php $meta_alt = get_post_meta( $item->ID, 'alt', true ); ?>
      <?php if ($key == 0): ?>
        <div class="container-fluid px-0">
          <div class="row">
            <div class="col-12">
              <img class="rates-banner image-filter img-fluid mb-5" src="<?php echo $thumbnailUrl; ?>" alt="<?php echo $meta_alt; ?>">
              <div class="d-flex flex-column justify-content-center align-items-center">
                <h3 class="text-uppercase text-dark font-weight-bold"><?php echo get_the_title( 205 ); ?></h3>
                <div class="underlining sub-color-line mt-3 mb-5"></div>
              </div>
            </div>
          </div>
        </div>
      <?php elseif ($key !== 0): ?>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h4 class="text-dark text-uppercase mb-3 text-center mb-5"><?php echo $item->post_title; ?></h4>
              <?php echo apply_filters( 'the_content', $item->post_content ); ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<?php get_footer(); ?>

