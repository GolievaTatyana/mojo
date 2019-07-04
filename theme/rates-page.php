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
<div class="ratesType-page custom-offset py-3">
  <div class="container">
    <div class="row">
      <div class="col d-flex flex-column justify-content-center align-items-center">
        <h3 class="text-uppercase text-dark font-weight-bold">Тарифы</h3>
        <div class="underlining sub-color-line mt-3 mb-5"></div>
      </div>
    </div>
    <div class="row">
    <?php foreach ($ratesType as $key => $item): ?>
      <div class="col-12">
        <h3 class="text-uppercase text-dark font-weight-bold"><?php echo $item->post_title; ?></h3>
        <?php echo apply_filters( 'the_content', $item->post_content ); ?>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>

<?php get_footer(); ?>

