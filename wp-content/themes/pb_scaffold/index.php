<?php
get_header() ;?>

<header>
  <nav class="nav">
      <?php
        // wp_nav_menu(
        //   array(
        //     'menu'=>'上方導覽',
        //     'menu_class'=>'nav-list',
        //     'container'=>'',
        //   )
        // );
        $locations = get_nav_menu_locations();
        $location_id = $locations['index_menu'];
        // print_r($locations);
        // echo $location_id;
        $menu_items = wp_get_nav_menu_items($location_id,array());
        if($menu_items){
          echo '<ul  class="nav-list">';
          foreach ($menu_items as $item) {
            $permalink = $item->post_url;
            $title = $item->title;
            
            echo '<li class="nav-list-item">';
            echo '<a href="'.$permalink.'">'.$title.'</a>';
            echo '</li>';
          }
          echo '</ul>';
        }
        
      ?>
      
    <button type="button" class="nav-button">
      <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
  </nav>
</header>
<main>
  <section>
    <!-- 首頁標語 -->
    <div class="pb-row">
      <div class="col-phone-100">
        <?php
          $locations = get_nav_menu_locations();
          $location_id = $locations['index_slider'];
          $menu_items = wp_get_nav_menu_items($location_id,array());
          if($menu_items){
            foreach ($menu_items as $item) {
              $permalink = $item->post_url;
              $title = $item->title;
            }
          }
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://picsum.photos/300/200/?random=10" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
              <img src="https://picsum.photos/300/200/?random=1" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
              <img src="https://picsum.photos/300/200/?random=3" class="d-block w-100" alt="">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <!-- <div class="index-cover">
          <div class="index-container">
            <h1 class="_title">進度條線上課程範例</h1>
            <div>
              <a href="https://progressbar.tw/users/sign_in" target="_pb">
                <button type="button" class="btn btn_light">
                  登入
                </button>
              </a>
              <a href="https://progressbar.tw/users/sign_up" target="_pb">
                <button type="button" class="btn btn_dark">
                  註冊
                </button>
              </a>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <section>
    <!-- cards -->
    <div class="pb-container">
      <div class="pb-row">
        <?php
          $args = array(
            'numberposts' => 2,
            'post_type'   => 'product'
          );
          $products = get_posts( $args );
          foreach ($products as $key => $product) {
            $img = get_the_post_thumbnail_url($product);
            $permalink = get_permalink($product);
        ?>
          <div class="col-phone-100 col-tablet-50">
            <div class="card">
              <div class="_image">
                <div class="ratio_3_2">
                  <img class="ratio_content" src="<?= $img; ?>">
                </div>
              </div>
              <div class="_content">
                <a class="_link" href="<?= $permalink; ?>" target="_pb">
                  <h4 class="_title">
                    <?= $product->post_title; ?>
                  </h4>
                </a>
                <p class="_detail">
                  <?= $product->post_content; ?>
                </p>
              </div>
              <div class="_action">
                <div class="_action_content">
                  <a class="_link" href="<?= $product->guid; ?>" target="_pb">
                    <button class="btn" type="button">
                      閱讀更多
                    </button>
                  </a>
                </div>
              </div>
            </div> <!-- card end -->
          </div> <!-- col-phone-100 end -->
        <?php
          }
        ?>
      </div> <!-- pb-row end -->
    </div> <!-- pb-container end -->
  </section>
  <section>
    <!-- video player -->
    <div class="pb-container">
      <div class="pb-row">
        <div class="col-phone-100 col-tablet-67">
          <div class="video-player">
            <div class="ratio_16_9">
              <iframe id="video_player" class="ratio_content" src="https://www.youtube.com/embed/-TDjWe5xZ0w"
                frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-phone-100 col-tablet-33">
          <div class="video-list-container mdl-shadow--2dp">
            <div class="ratio_8_9">
              <ul class="ratio_content video-list">
              <?php
                $args = array(
                  'numberposts' => -1, //全部
                  'post_type'   => 'video'
                );
                $videos = get_posts( $args );
                foreach ($videos as $key => $video) {
                  $videoTitle=$video->post_title;
                  $youtubeVideoId=get_post_meta($video->ID,'youtube_video_id',true);
                  echo '<li class="_video" data-video="' . $youtubeVideoId . '">' . $videoTitle . '</li>';
                }
              ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="remove_padding">
    <!-- image links -->
    <div class="pb-container">
      <div class="pb-row">
        <?php
        $args = array(
          'numberposts' => -1, //全部
          'post_type'   => 'new'
        );
        $news = get_posts( $args );
        $countNews=count($news);
        for ($i=0; $i < 4 && $countNews > 0; $i++) {
          if($i >= $countNews){
            $eachNew=$news[0];
          }else{
            $eachNew=$news[$i];
          }
          $img = get_the_post_thumbnail_url($eachNew);
          $permalink = get_permalink($eachNew);
        ?>
        <div class="col-phone-100 col-tablet-50 col-desktop-25">
          <a href="<?= $permalink; ?>">
            <div class="ratio_3_2">
              <img class="ratio_content" src="<?= $img; ?>">
            </div>
          </a>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();