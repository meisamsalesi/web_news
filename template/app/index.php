<?php 
use Admin\Category;
require_once(BASE_PATH . '/Template/app/layouts/header.php');
?>

    <div class="site-main-container">
      <!-- Start top-post Area -->
      <section class="top-post-area pt-10">
        <div class="container no-padding">
          <div class="row small-gutters">
            <div class="col-lg-8 top-post-left">
              <div class="feature-image-thumb relative">
                <div class="overlay overlay-bg"></div>
                <?php if(isset($topSelectPosts[0])){?>
                <img class="img-fluid" src="<?=asset($topSelectPosts[0]['image'])?>" alt="" />
              </div>
              <div class="top-post-details">
                <ul class="tags">
                  <li><a href="#"><?= $topSelectPosts[0]['category']?></a></li>
                </ul>
                <a href="image-post.html">
                  <h3><?= $topSelectPosts[0]['title']?></h3>
                </a>
                <ul class="meta">
                  <li>
                    <a href="#"><span class="lnr lnr-user"></span><?= $topSelectPosts[0]['username']?></a>
                  </li>
                  <li>
                    <a href="#"
                      ><?=jalaliDate( $topSelectPosts[0]['created_at'])?><span class="lnr lnr-calendar-full"></span
                    ></a>
                  </li>
                  <li>
                    <a href="#"><?= $topSelectPosts[0]['comment_count']?><span class="lnr lnr-bubble"></span></a>
                  </li>
                </ul>
              </div>
            </div>
            <?php }?>
            <div class="col-lg-4 top-post-right">
                <?php
                if(isset($topSelectPosts[1])){
                ?>
              <div class="single-top-post">
                <div class="feature-image-thumb relative">

                  <div class="overlay overlay-bg"></div>
                  <img class="img-fluid" src="<?=asset($topSelectPosts[1]['image'])?>" alt="" />
                </div>
                <div class="top-post-details">
                  <ul class="tags">
                    <li><a href="#"><?= $topSelectPosts[1]['category']?></a></li>
                  </ul>
                  <a href="image-post.html">
                    <h4><?= $topSelectPosts[1]['title']?></h4>
                  </a>
                  <ul class="meta">
                    <li>
                      <a href="#"><span class="lnr lnr-user"></span><?= $topSelectPosts[1]['username']?></a>
                    </li>
                    <li>
                      <a href="#"
                        ><?=jalaliDate( $topSelectPosts[1]['created_at'])?><span class="lnr lnr-calendar-full"></span
                      ></a>
                    </li>
                    <li>
                      <a href="#"> <?= $topSelectPosts[1]['comment_count']?><span class="lnr lnr-bubble"></span></a>
                    </li>
                  </ul>
                </div>
              </div>
              <?php }
              if(isset($topSelectPosts[2])){
              ?>
              <div class="single-top-post mt-10">
                <div class="feature-image-thumb relative">

                
                
                

                  <div class="overlay overlay-bg"></div>
                  <img class="img-fluid" src="<?=asset($topSelectPosts[2]['image'])?>" alt="" />
                </div>
                <div class="top-post-details">
                  <ul class="tags">
                    <li><a href="#"><?= $topSelectPosts[2]['category']?></a></li>
                  </ul>
                  <a href="image-post.html">
                    <h4><?= $topSelectPosts[2]['title']?></h4>
                  </a>
                  <ul class="meta">
                    <li>
                      <a href="#"><span class="lnr lnr-user"></span><?= $topSelectPosts[2]['username']?></a>
                    </li>
                    <li>
                      <a href="#"
                        ><?=jalaliDate( $topSelectPosts[2]['created_at'])?><span class="lnr lnr-calendar-full"></span
                      ></a>
                    </li>
                    <li>
                      <a href="#"><?= $topSelectPosts[2]['comment_count']?><span class="lnr lnr-bubble"></span></a>
                    </li>
                  </ul>
                </div>
              </div>
              <?php }?>
            </div>
            <?php if(!empty($beakingNews)){?>
            <div class="col-lg-12">
              <div class="news-tracker-wrap">
                <h6>
                  <span>خبر فوری:</span> <a href="#"><?= $beakingNews['title']?></a>
                </h6>
              </div>
            </div>
            <?php }?>
          </div>
        </div>
      </section>
      <!-- End top-post Area -->
      <!-- Start latest-post Area -->
      <section class="latest-post-area pb-120">
        <div class="container no-padding">
          <div class="row">
            <div class="col-lg-8 post-list">
              <!-- Start latest-post Area -->
              <div class="latest-post-wrap">

                <h4 class="cat-title">آخرین اخبار</h4>

                <?php foreach($lastPosts as $lastPost){?>

                <div class="single-latest-post row align-items-center">
                  <div class="col-lg-5 post-left">
                    <div class="feature-img relative">
                      <div class="overlay overlay-bg"></div>
                      <img class="img-fluid" src="<?= asset($lastPost['image'])?>" alt="" />
                    </div>
                    <ul class="tags">
                      <li><a href="#"><?= $lastPost['category']?></a></li>
                    </ul>
                  </div>
                  <div class="col-lg-7 post-right">
                    <a href="image-post.html">
                      <h4><?= $lastPost['title']?></h4>
                    </a>
                    <ul class="meta">
                      <li>
                        <a href="#"><span class="lnr lnr-user"></span><?= $lastPost['username']?></a>
                      </li>
                      <li>
                        <a href="#"
                          ><?= jalaliDate($lastPost['created_at'])?><span class="lnr lnr-calendar-full"></span
                        ></a>
                      </li>
                      <li>
                        <a href="#"> <?= $lastPost['comment_count']?><span class="lnr lnr-bubble"></span></a>
                      </li>
                    </ul>
                    <p class="excert"><?= $lastPost['summary']?></p>
                  </div>
                </div>
                <?php }?>
              <!-- End latest-post Area -->

              <!-- Start banner-ads Area -->
               <?php if(!empty($banners[0])){?>
              <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                <a href="<?= $banners[0]['url']?>"><img class="img-fluid" src="<?= asset($banners[0]['image'])?>" alt="" /></a>
              </div>
              <?php }?>
              <!-- End banner-ads Area -->
              <!-- Start popular-post Area -->
              <div class="popular-post-wrap">
                <h4 class="title">اخبار پربازدید</h4>
                <?php if(isset($popularPost[0])){?>
                <div class="feature-post relative">
                  <div class="feature-img relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid" src="<?= asset($popularPost[0]['image'])?>" alt="" />
                  </div>
                  <div class="details">
                    <ul class="tags">
                      <li><a href="#"><?= $popularPost[0]['category'] ?></a></li>
                    </ul>
                    <a href="image-post.html">
                      <h3><?= $popularPost[0]['title'] ?></h3>
                    </a>
                    <ul class="meta">
                      <li>
                        <a href="#"><span class="lnr lnr-user"></span><?= $popularPost[0]['username'] ?></a>
                      </li>
                      <li>
                        <a href="#"
                          ><?= jalaliDate($popularPost[0]['created_at']) ?><span class="lnr lnr-calendar-full"></span
                        ></a>
                      </li>
                      <li>
                        <a href="#"><?= $popularPost[0]['comment_count'] ?><span class="lnr lnr-bubble"></span></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <?php }?>
                <div class="row mt-20 medium-gutters">
                <?php if(isset($popularPost[1])){?>
                  <div class="col-lg-6 single-popular-post">
                    <div class="feature-img-wrap relative">
                      <div class="feature-img relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="<?= asset($popularPost[1]['image'])?>" alt="" />
                      </div>
                      <ul class="tags">
                        <li><a href="#"><?= $popularPost[1]['category']?></a></li>
                      </ul>
                    </div>
                    <div class="details">
                      <a href="image-post.html">
                        <h4><?= $popularPost[1]['title']?></h4>
                      </a>
                      <ul class="meta">
                        <li>
                          <a href="#"
                            ><span class="lnr lnr-user"></span><?= $popularPost[1]['username']?></a
                          >
                        </li>
                        <li>
                          <a href="#"
                            ><?= jalaliDate($popularPost[1]['created_at'])?><span class="lnr lnr-calendar-full"></span
                          ></a>
                        </li>
                        <li>
                          <a href="#"><?= $popularPost[1]['comment_count']?><span class="lnr lnr-bubble"></span></a>
                        </li>
                      </ul>
                      <p class="excert"><?= $popularPost[1]['summary']?></p>
                    </div>
                  </div>
                  <?php }if(isset($popularPost[2])){?>
                  <div class="col-lg-6 single-popular-post">
                    <div class="feature-img-wrap relative">
                      <div class="feature-img relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="<?= asset($popularPost[2]['image'])?>" alt="" />
                      </div>
                      <ul class="tags">
                        <li><a href="#"><?= $popularPost[2]['category']?></a></li>
                      </ul>
                    </div>
                    <div class="details">
                      <a href="image-post.html">
                        <h4><?= $popularPost[2]['title']?></h4>
                      </a>
                      <ul class="meta">
                        <li>
                          <a href="#"
                            ><span class="lnr lnr-user"></span><?= $popularPost[2]['username']?></a
                          >
                        </li>
                        <li>
                          <a href="#"
                            ><?= jalaliDate($popularPost[2]['created_at'])?><span class="lnr lnr-calendar-full"></span
                          ></a>
                        </li>
                        <li>
                          <a href="#"><?= $popularPost[2]['comment_count']?><span class="lnr lnr-bubble"></span></a>
                        </li>
                      </ul>
                      <p class="excert"><?= $popularPost[2]['summary']?></p>
                    </div>
                  </div>
                  <?php }?>
                </div>
              </div>
              <!-- End popular-post Area -->
            </div>


          </div>
<?php 
require_once(BASE_PATH . '/Template/app/layouts/sidebar.php');
?>
        </div>
      </section>
      <!-- End latest-post Area -->
    </div>

    <!-- start footer Area -->
    <?php 
require_once(BASE_PATH . '/Template/app/layouts/footer.php');
?>