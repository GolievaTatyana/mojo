<?php
$args = array(
  'sort_column' => 'menu_order',
  'hierarchical' => 0,
  'meta_key' => 'add_to',
);
$pagesForSections = get_pages($args);

$slider = [];
$stock = [];
$banner = [];
$about = [];
$free = [];
$resources = [];
$services = [];
$rates = [];
$simple = [];
$connect = [];
$counter  = 0;

foreach ($pagesForSections as $page) {
  switch ($page->meta_value) {
    case 'slider':
		$slider[] = $page;
    break;
    case 'stock':
		$stock[] = $page;
		break;
		case 'banner':
		$banner[] = $page;
		break;
		case 'about':
		$about[] = $page;
		break;
		case 'free':
		$free[] = $page;
		break;
		case 'resources':
		$resources[] = $page;
		break;
		case 'services':
		$services[] = $page;
		break;
		case 'rates':
		$rates[] = $page;
		break;
		case 'simple':
		$simple[] = $page;
    break;
    case 'connect':
		$connect[] = $page;
		break;
	}

}
?>

<?php get_header(); ?>

<?php if ($slider): ?>
<section class="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators header-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"><span></span></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"><span></span></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"><span></span></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"><span></span></li>
    </ol>
    <div class="carousel-inner">
      <?php foreach ($slider as $key => $item): ?>
        <?php echo $item->post_excerpt; ?>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>
  <?php $banner_section = $banner[0];?>
  <div class="banner">
    <div class="col slogan-wrapper text-white">
      <h2 class="sub-slogan sub-color"><?php echo $banner_section->post_excerpt; ?></h2>
      <h1 class="slogan font-weight-bold mt-4"><?php echo $banner_section->post_content; ?></h1>
    </div>
  </div>
</section>
<div class="custom">

<?php if ($stock): ?>
  <?php $stock_section = $stock[0];?>
  <section id="stock" class="stock py-custom">
    <div class="container">
      <div class="row">
        <div class="col d-flex flex-column justify-content-center align-items-center">
          <h3 class="text-uppercase text-dark font-weight-bold"><?php echo $stock_section->post_title; ?></h3>
          <div class="underlining sub-color-line mt-3 mb-5"></div>
        </div>
      </div>
      <div class="row text-center">
        <div class="col">
          <div><?php echo $stock_section->post_content; ?></div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php $about_section = $about[0];?>
<?php $thumbnailUrl = get_the_post_thumbnail_url($about_section, full);?>
<?php $meta_alt = get_post_meta( $about_section->ID, 'alt', true ); ?>
<section id="about" class="about py-custom">
  <div class="container">
    <div class="row">
      <div class="col d-flex flex-column justify-content-center align-items-center">
        <h3 class="text-uppercase text-dark font-weight-bold"><?php echo $about_section->post_title; ?></h3>
        <div class="underlining sub-color-line mt-3 mb-5"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <img class="img-fluid section-image mb-5" src="<?php echo $thumbnailUrl; ?>" alt="<?php echo $meta_alt; ?>">
      </div>
      <div class="col-lg-6 text-center text-lg-left">
        <?php echo $about_section->post_content; ?>
      </div>
    </div>
  </div>
</section>

<?php if ($free): ?>
<section id="free" class="free sub-bg-color">
  <div class="container-fluid">
    <div class="row">
      <?php foreach ($free as $key => $item): ?>
      <?php $meta_icon = get_post_meta( $item->ID, 'icon_class', true ); ?>
      <div class="col-sm-6 col-md-4 col-xl-2 free-item">
        <div class="d-flex flex-column align-items-center text-center text-white">
          <i
            class="<?php echo $meta_icon; ?> icon-common icon-aсcent d-flex justify-content-center align-items-center mx-auto mb-3"></i>
          <p><?php echo $item->post_title; ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ($resources): ?>
<section id="resources" class="resources py-custom">
  <div class="container">
    <?php foreach ($resources as $key => $item): ?>
      <?php if ($key == 0): ?>
        <div class="row text-center mb-5">
          <div class="col">
            <div class="d-flex flex-column justify-content-center align-items-center">
              <h3 class="text-uppercase text-dark font-weight-bold"><?php echo $item->post_title; ?></h3>
              <div class="underlining main-color-line mt-3 mb-5"></div>
            </div>
            <div><?php echo $item->post_content; ?></div>
          </div>
        </div>
      <?php elseif ($key !== 0): ?>
        <div class="row">
          <div class="col">
            <?php echo apply_filters( 'the_content', $item->post_content ); ?>
          </div>
        </div> 
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<?php if ($services): ?>
  <section id="services" class="services py-custom">
    <div class="container">
      <div class="d-flex flex-column justify-content-center align-items-center">
        <h3 class="text-uppercase text-dark font-weight-bold"><?php echo esc_html( get_the_title( 75 ) ); ?></h3>
        <div class="underlining main-color-line mt-3 mb-5"></div>
      </div>
      <div class="row">
        <?php foreach ($services as $key => $item): ?>
        <?php $meta_icon = get_post_meta( $item->ID, 'icon_class', true ); ?>
          <div class="col-md-6 col-lg-4 services-item text-center mb-5">
            <div class="services-item-headding">
              <i
                class="<?php echo $meta_icon; ?> icon-common icon-sub-color d-flex justify-content-center align-items-center mx-auto mb-3"></i>
              <h4 class="services-item-name text-uppercase text-dark mb-3"><?php echo $item->post_title; ?></h4>
            </div>
            <div class="services-item-text">
              <p><?php echo $item->post_content; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php $rates_section = $rates[0];?>
<section id="rates" class="rates">
  <div class="rates-cover-bg py-custom">
    <div class="container">
      <div class="row text-center text-white">
        <div class="col">
          <h3 class="text-uppercase font-weight-bold"><?php echo $rates_section->post_title; ?></h3>
          <div class="mt-5"><?php echo $rates_section->post_content; ?></div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $simple_section = $simple[0];?>
<?php $thumbnailUrl = get_the_post_thumbnail_url($simple_section, full);?>
<?php $meta_alt = get_post_meta( $simple_section->ID, 'alt', true ); ?>
<section id="simple" class="simple py-custom">
  <div class="container">
    <div class="row">
      <div class="col d-flex flex-column justify-content-center align-items-center">
        <h3 class="text-uppercase text-dark font-weight-bold"><?php echo $simple_section->post_title; ?></h3>
        <div class="underlining sub-color-line mt-3 mb-5"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 order-lg-2">
        <img class="img-fluid section-image mb-5" src="<?php echo $thumbnailUrl; ?>" alt="<?php echo $meta_alt; ?>">
      </div>
      <div class="col-lg-6 mb-4 order-lg-1 text-center text-lg-left">
        <?php echo $simple_section->post_content; ?>
      </div>
    </div>
  </div>
</section>

<?php if ($connect): ?>
  <section id="connect" class="connect">
    <div class="connect-cover-bg">
      <div class="container py-custom">
        <div class="row text-center text-white">
          <div class="col">
            <h3 class="text-uppercase font-weight-bold mb-5"><?php echo get_the_title( 110 ); ?></h3>
          </div>
        </div>
        <div class="row text-white">
          <?php foreach ($connect as $key => $item): ?>
            <div class="col-lg-6 contact-form-wrapper">
              <?php echo apply_filters( 'the_content', $item->post_content ); ?>            
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_footer(); ?>