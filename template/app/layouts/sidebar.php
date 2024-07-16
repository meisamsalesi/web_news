<div class="col-lg-4">
              <div class="sidebars-area">
                <?php if(isset($topSelectPosts[0])){?>
                <div class="single-sidebar-widget editors-pick-widget">
                  <h6 class="title">انتخاب سردبیر</h6>
                  <div class="editors-pick-post">
                    <div class="feature-img-wrap relative">
                      <div class="feature-img relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="<?= asset($topSelectPosts[0]['image'])?>" alt="" />
                      </div>
                      <ul class="tags">
                        <li><a href="#"><?=$topSelectPosts[0]['category']?></a></li>
                      </ul>
                    </div>
                    <div class="details">
                      <a href="image-post.html">
                        <h4 class="mt-20"><?=$topSelectPosts[0]['title']?></h4>
                      </a>
                      <ul class="meta">
                        <li>
                          <a href="#"
                            ><span class="lnr lnr-user"></span><?=$topSelectPosts[0]['username']?></a
                          >
                        </li>
                        <li>
                          <a href="#"
                            ><?=jalaliDate($topSelectPosts[0]['image']) ?><span class="lnr lnr-calendar-full"></span
                          ></a>
                        </li>
                        <li>
                          <a href="#"><?= $topSelectPosts[0]['comment_count']?><span class="lnr lnr-bubble"></span></a>
                        </li>
                      </ul>
                      <p class="excert"><?= $topSelectPosts[0]['summary']?></p>
                    </div>
                  </div>
                </div>
                <?php }
                if(!empty($banners[1])){
                ?>
                <div class="single-sidebar-widget ads-widget">
                  <a href="<?= $banners[1]['url']?>"><img class="img-fluid" src="<?= asset($banners[1]['image'])?>" alt="" /></a>
                </div>
                <?php }?>

                <div class="single-sidebar-widget most-popular-widget">
                  <h6 class="title">پر بحث ترین ها</h6>
                  <?php foreach($mostCommentPosts as $mostCommentPost){?>
                  <div class="single-list flex-row d-flex">
                    <div class="thumb">
                      <img src="<?=asset($mostCommentPost['image'])?>" alt="" / width="150px" height="100px">
                    </div>
                    <div class="details">
                      <a href="image-post.html">
                        <h6><?= $mostCommentPost['title']?></h6>
                      </a>
                      <ul class="meta">
                        <li>
                          <a href="#"
                            ><?= jalaliDate($mostCommentPost['created_at'])?><span class="lnr lnr-calendar-full"></span
                          ></a>
                        </li>
                        <li>
                          <a href="#"
                            ><?= $mostCommentPost['created_at']?><span class="lnr lnr-bubble"></span
                          ></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <?php }?>
                  
                </div>
              </div>
            </div>