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
$blog = [];
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
		case 'blog':
		$blog[] = $page;
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
          <img class="carousel-item-image d-block w-100" src="<?php echo $thumbnailUrl; ?>" alt="<?php echo $meta_alt; ?>">
        </div>
      <?php endforeach; ?>
      </div>
    </div>
<?php endif; ?>
  <?php $banner_section = $banner[0];?>
    <div class="banner">
      <div class="col slogan-wrapper text-white">
        <h2 class="sub-slogan"><?php echo $banner_section->post_excerpt; ?></h2>
        <h1 class="slogan font-weight-bold mt-4"><?php echo $banner_section->post_content; ?></h1>
      </div>
    </div>
  </section>
</div>

<?php $about_section = $about[0];?>
<?php $thumbnailUrl = get_the_post_thumbnail_url($about_section, full);?>
<?php $meta_alt = get_post_meta( $about_section->ID, 'alt', true ); ?>
  <section class="about py-5">
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
  <section class="free sub-bg-color">
    <div class="container">
      <div class="row">
      <?php foreach ($free as $key => $item): ?>
      <?php $meta_icon = get_post_meta( $item->ID, 'icon_class', true ); ?>
        <div class="col-sm-6 col-md-3 free-item">
          <div class="d-flex flex-column align-items-center text-center text-white">
            <i
              class="<?php echo $meta_icon; ?> icon-common icon-aсcent d-flex justify-content-center align-items-center mx-auto mb-3"></i>
            <p><?php echo $item->post_content; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php if ($resources): ?>
  <section class="resources my-5">
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
  <section class="services py-5">
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
  <section class="rates">
    <div class="rates-cover-bg py-5">
      <div class="container">
        <div class="row text-center text-white">
          <div class="col">
            <h3 class="text-uppercase font-weight-bold"><?php echo $rates_section->post_title; ?></h3>
            <div class="my-5"><?php echo $rates_section->post_content; ?></div>
            <button type="button" class="btn white-button font-weight-bold"><a href="#"><?php echo $rates_section->post_excerpt; ?></a></button>
          </div>
        </div>
      </div>
    </div>
  </section>


<section class="blog py-5">
  <div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
      <h3 class="text-uppercase text-dark font-weight-bold">Blog</h3>
      <div class="underlining sub-color-line mt-3 mb-5"></div>
    </div>
    <div class="row">
      <div class="col-md-4 blog-item mb-4">
        <div class="image-wrapper mb-4">
          <img class="images-size img-fluid" src="images/blog1.jpg" alt="">
          <div class="date sub-bg-color d-flex justify-content-center align-items-center flex-column text-white">
            <p class="font-weight-bold">12</p>
            <span>Jun</span>
          </div>
        </div>
        <h4 class="text-uppercase text-dark mb-3">Ut enim ad minim</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam.</p>
        <div class="tags text-white mt-4">
          <i class="fas fa-paperclip text-dark"></i>
          <span>tags</span><span>tags</span><span>tags</span>
        </div>
      </div>
      <div class="col-md-4 blog-item mb-4">
        <div class="image-wrapper mb-4">
          <img class="images-size img-fluid" src="images/blog2.jpg" alt="">
          <div class="date sub-bg-color d-flex justify-content-center align-items-center flex-column text-white">
            <p class="font-weight-bold">25</p>
            <span>Oct</span>
          </div>
        </div>
        <h4 class="text-uppercase text-dark mb-3">Ut enim ad minim</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam.</p>
        <div class="tags text-white mt-4">
          <i class="fas fa-paperclip text-dark"></i>
          <span>tags</span><span>tags</span>
        </div>
      </div>
      <div class="col-md-4 blog-item mb-4">
        <div class="image-wrapper mb-4">
          <img class="images-size img-fluid" src="images/blog3.jpg" alt="">
          <div class="date sub-bg-color d-flex justify-content-center align-items-center flex-column text-white">
            <p class="font-weight-bold">9</p>
            <span>Nov</span>
          </div>
        </div>
        <h4 class="text-uppercase text-dark mb-3">Ut enim ad minim</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam.</p>
        <div class="tags text-white mt-4">
          <i class="fas fa-paperclip text-dark"></i>
          <span>tags</span><span>tags</span><span>tags</span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="connect">
  <div class="connect-cover-bg">
    <div class="container py-5">
      <div class="row text-center text-white">
        <div class="col">
          <h3 class="text-uppercase font-weight-bold mb-5">Connect width us</h3>
          <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
            ut labore et
            dolore magna aliqua , consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna.
          </p>
        </div>
      </div>
      <form>
        <div class="row">
          <div class="form-group col-md-6">
            <input type="text" class="form-control rounded-0" placeholder="Name">
          </div>
          <div class="form-group col-md-6">
            <input type="text" class="form-control rounded-0" placeholder="Lust name">
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control rounded-0" placeholder="Subgect">
        </div>
        <div class="form-group">
          <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="row justify-content-center">
          <button type="submit" class="btn white-button font-weight-bold">Sign in</button>
        </div>
      </form>
    </div>
  </div>
</section>

<?php get_footer(); ?>
