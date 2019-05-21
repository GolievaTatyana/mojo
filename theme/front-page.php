<?php
$args = array(
  'sort_column' => 'menu_order',
  'hierarchical' => 0,
  'meta_key' => 'add_to',
);
$pagesForSections = get_pages($args);

$slider = [];
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
      <?php $thumbnailUrl = get_the_post_thumbnail_url($item, full);?>
      <?php $meta_alt = get_post_meta( $item->ID, 'alt', true ); ?>
      <div class="carousel-item active">
        <img class="carousel-item-image d-block w-100" src="<?php echo $thumbnailUrl; ?>"
          alt="<?php echo $meta_alt; ?>">
      </div>
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


<?php $about_section = $about[0];?>
<?php $thumbnailUrl = get_the_post_thumbnail_url($about_section, full);?>
<?php $meta_alt = get_post_meta( $about_section->ID, 'alt', true ); ?>
<section id="about" class="about py-5">
  <div class="container">
    <div class="row">
      <div class="col d-flex flex-column justify-content-center align-items-center">
        <h3 class="text-uppercase text-dark font-weight-bold"><?php echo $about_section->post_title; ?></h3>
        <div class="underlining sub-color-line mt-3 mb-5"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-4">
        <img class="img-fluid" src="<?php echo $thumbnailUrl; ?>" alt="<?php echo $meta_alt; ?>">
      </div>
      <div class="col-md-6">
        <p class="text-center text-md-left"><?php echo $about_section->post_content; ?></p>
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
<section id="resources" class="resources my-5">
  <div class="container">
    <?php foreach ($resources as $key => $item): ?>
    <?php $thumbnailUrl = get_the_post_thumbnail_url($item, full);?>
    <?php if ($key == 0): ?>
    <div class="row text-center mb-4">
      <div class="col">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h3 class="text-uppercase text-dark font-weight-bold"><?php echo $item->post_title; ?></h3>
          <div class="underlining main-color-line mt-3 mb-5"></div>
        </div>
        <p><?php echo $item->post_content; ?></p>
      </div>
    </div>
    <div class="row">
      <?php elseif ($key !== 0): ?>
      <div class="col-md-4">
        <img class="images-size mb-3 img-fluid" src="<?php echo $thumbnailUrl; ?>" alt="">
      </div>
      <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ($services): ?>
  <section id="services" class="services py-5">
    <div class="container">
      <div class="d-flex flex-column justify-content-center align-items-center">
        <h3 class="text-uppercase text-dark font-weight-bold"><?php echo esc_html( get_the_title( 67 ) ); ?></h3>
        <div class="underlining main-color-line mt-3 mb-5"></div>
      </div>
      <div class="row">
        <?php foreach ($services as $key => $item): ?>
        <?php $meta_icon = get_post_meta( $item->ID, 'icon_class', true ); ?>
          <div class="col-md-4 services-item text-center mb-5">
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
  <div class="rates-cover-bg py-5">
    <div class="container">
      <div class="row text-center text-white">
        <div class="col">
          <h3 class="text-uppercase font-weight-bold"><?php echo $rates_section->post_title; ?></h3>
          <div class="my-5"><?php echo $rates_section->post_content; ?></div>
          <button type="button" class="btn white-button font-weight-bold"><a
              href="#"><?php echo $rates_section->post_excerpt; ?></a></button>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $simple_section = $simple[0];?>
<?php $thumbnailUrl = get_the_post_thumbnail_url($simple_section, full);?>
<?php $meta_alt = get_post_meta( $simple_section->ID, 'alt', true ); ?>
<section id="simple" class="simple py-5">
  <div class="container">
    <div class="row">
      <div class="col d-flex flex-column justify-content-center align-items-center">
        <h3 class="text-uppercase text-dark font-weight-bold"><?php echo $simple_section->post_title; ?></h3>
        <div class="underlining sub-color-line mt-3 mb-5"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <p class="text-center text-md-left"><?php echo $simple_section->post_content; ?></p>
      </div>
      <div class="col-md-6 mb-4">
        <img class="img-fluid" src="<?php echo $thumbnailUrl; ?>" alt="<?php echo $meta_alt; ?>">
      </div>
    </div>
  </div>
</section>

<?php $connect_section = $connect[0];?>
<section id="connecr" class="connect">
  <div class="connect-cover-bg">
    <div class="container py-5">
      <div class="row text-center text-white">
        <div class="col mb-5">
          <h3 class="text-uppercase font-weight-bold mb-5"><?php echo $connect_section->post_title; ?></h3>
          <p><?php echo $connect_section->post_excerpt; ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <?php echo apply_filters( 'the_content', $connect_section->post_content ); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>



<!-- <label> Your Name (required)
    [text* your-name] </label>

<label> Your Email (required)
    [email* your-email] </label>

<label> Subject
    [text your-subject] </label>

<label> Your Message
    [textarea your-message] </label>

[submit "Send"] -->



<!-- golieva.tatyana@gmail.com
khgruz <wordpress@mxak.local>
khgruz "[your-subject]"
Reply-To: [your-email]
From: [your-name] <[your-email]>
Subject: [your-subject]

Message Body:
[your-message]

-- 
This e-mail was sent from a contact form on khgruz (http://mxak.local) -->

<!-- [contact-form-7 id="95" title="Contact form 1"] -->