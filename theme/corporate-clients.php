<?php /* Template Name: сorpInfoItemClients */ ?>

<?php
$args = array(
  'sort_column' => 'menu_order',
  'hierarchical' => 0,
  'meta_key' => 'add_to',
);
$сorpInfoItemClients = get_pages($args);

$сorpInfoItem = [];
$counter  = 0;

foreach ($сorpInfoItemClients as $infoItem) {
  switch ($infoItem->meta_value) {
    case 'сorpInfoItem':
		$сorpInfoItem[] = $infoItem;
    break;
	}
}
?>

<?php get_header(); ?>

<?php if ($сorpInfoItem): ?>
  <div class="сorpInfoItem-page custom-offset no-scroll-page">
    <?php foreach ($сorpInfoItem as $key => $item): ?>
      <?php $thumbnailUrl = get_the_post_thumbnail_url($item, full);?>
      <?php $meta_alt = get_post_meta( $item->ID, 'alt', true ); ?>
      <?php if ($key == 0): ?>
        <div class="container-fluid px-0">
          <div class="row">
            <div class="col-12">
              <img class="rates-banner image-filter img-fluid mb-5" src="<?php echo $thumbnailUrl; ?>" alt="<?php echo $meta_alt; ?>">
              <div class="d-flex flex-column justify-content-center align-items-center">
                <h3 class="text-uppercase text-dark font-weight-bold"><?php echo get_the_title( 242 ); ?></h3>
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
              <div class="mb-5">
                <?php echo $item->post_content; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<?php get_footer(); ?>

