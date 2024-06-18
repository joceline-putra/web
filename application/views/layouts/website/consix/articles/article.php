<?php
$site = $pages['sitelink'];
?>
<div class="breadcumb-wrapper" data-bg-src="<?php echo $asset; ?>assets/img/breadcumb/breadcumb-bg.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php echo $title; ?></h1>
            <p class="breadcumb-text"><?php echo substr(strip_tags($site['article']['content']), 0, 80); ?></p>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
                    <li><a href="<?php echo $site['categories']['url']; ?>"><?php echo $site['categories']['title']; ?></a></li>
                    <li><?php echo $title; ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--==============================
  Blog Area
  ==============================-->
<section class="vs-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-30">
            <div class="col-lg-8">
                <div class="vs-blog blog-single">
                    <div class="blog-img">
                        <a href="<?php echo $site['article']['url']; ?>"><img class="blog-img__img" src="<?php echo $site['article']['image']; ?>" alt="Blog Image" style="width:100%;"></a>
                        <span class="blog-date"><?php echo date("d M Y", strtotime($site['article']['created'])); ?></span>
                        <div class="blog-author">
                            <img src="<?php echo site_url('upload/default.png'); ?>" alt="Blog Author" style="width:80px;height:80px;">
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="#">by <span class="blog-meta__highlight"><?php echo ucfirst($site['article']['author']); ?></span></a>
                            <a href="<?php echo $site['article']['url']; ?>">
                              <!-- <img src="<?php #echo $asset;  ?>assets/img/icons/comment.svg" alt="comments"> -->
                              <!-- <span class="blog-meta__highlight">No Comment</span> -->
                            </a>
                        </div>
                        <h2 class="blog-title"><?php echo $title; ?></h2>
                        <p class="blog-content__text--details">
                            <?php echo $site['article']['content']; ?>
                        </p>

                        <!--
                        <div class="blog-footer">
                          <p class="wp-block-tag-cloud style2">
                            <span class="wp-block-tag-cloud__title">TAGS:</span>
                            <a href="#" class="tag-cloud-link tag-link-12">PROJECTS</a>
                            <a href="#" class="tag-cloud-link tag-link-4">IDEAS</a>
                            <a href="#" class="tag-cloud-link tag-link-13">Grow</a>
                          </p>
                          <div class="blog-social">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                          </div>
                        </div>
                        <div class="vs-comments-wrap">
                          <h2 class="blog-inner-title">3 Comments</h2>
                          <ul class="comment-list">
                            <li class="vs-comment-item">
                              <div class="vs-post-comment">
                                <div class="reply_and_edit">
                                  <a href="blog-details.html" class="replay-btn">Reply</a>
                                </div>
                                <div class="comment-avater">
                                  <img src="<?php echo $asset; ?>assets/img/blog/comment-author-1.jpg" alt="Comment Author">
                                </div>
                                <div class="comment-content">
                                  <div class="comment-content__header">
                                    <h4 class="name h4">ROKKI WALIM</h4>
                                    <span class="commented-on">DEC 20, 2024</span>
                                  </div>
                                  <p class="text">Cupcake ipsum dolor sit amet Dragée sweet roll tiramisu sweet Sesame asit amet
                                    Drag croissant lollipop candy.</p>
                                </div>
                              </div>
                              <ul class="children">
                                <li class="vs-comment-item">
                                  <div class="vs-post-comment">
                                    <div class="reply_and_edit">
                                      <a href="blog-details.html" class="replay-btn">Reply</a>
                                    </div>
                                    <div class="comment-avater">
                                      <img src="<?php echo $asset; ?>assets/img/blog/comment-author-2.jpg" alt="Comment Author">
                                    </div>
                                    <div class="comment-content">
                                      <div class="comment-content__header">
                                        <h4 class="name h4">THOMAS WILLIM</h4>
                                        <span class="commented-on">DEC 20, 2024</span>
                                      </div>
                                      <p class="text">Cupcake ipsum dolor sit amet Dragée sweet roll tiramisu sweet Sesame asit amet
                                        Drag croissant lollipop candy.</p>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                        <div class="vs-comment-form  ">
                          <div id="respond" class="comment-respond">
                            <div class="form-title">
                              <h3 class="blog-inner-title">Leave a Comment</h3>
                            </div>
                            <div class="form-inner">
                              <div class="row gx-20">
                                <div class="col-md-6 form-group">
                                  <input type="text" class="form-control" placeholder="Your Name">
                                  <i class="fal fa-user"></i>
                                </div>
                                <div class="col-md-6 form-group">
                                  <input type="email" class="form-control" placeholder="Email Address">
                                  <i class="fal fa-envelope"></i>
                                </div>
                                <div class="col-12 form-group">
                                  <textarea class="form-control" placeholder="Message"></textarea>
                                  <i class="fal fa-pencil"></i>
                                </div>
                                <div class="col-12 form-group mb-0">
                                  <button class="vs-btn d-none d-vc-sm-block">
                                    <span class="vs-btn__bar"></span>Post Comment
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget">
                        <h3 class="widget_title">Artikel Lainnya</h3>
                        <div class="recent-post-wrap">
                            <?php
                            foreach ($site['categories']['result_news'] as $v) {
                                $set_url = $pages['sitelink']['categories']['url'] . '/' . $v['news_url'];
                                $set_image = !empty($v['news_image']) ? site_url() . $v['news_image'] : site_url('upload/noimage.png');
                                $set_title = substr($v['news_title'], 0, 20);
                                $set_description = substr(strip_tags($v['news_content']), 0, 20);
                                ?>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="<?php echo $set_url; ?>"><img src="<?php echo $set_image; ?>" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="<?php echo $set_url; ?>"><?php echo $set_title; ?></a></h4>
                                        <div class="recent-post-meta">
                                            <a href="<?php echo $set_url; ?>"><?php echo date("d M, Y", strtotime($v['news_date_created'])); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="wp-block-group widget_categories is-layout-constrained wp-block-group-is-layout-constrained">
                            <div class="wp-block-group__inner-container">
                                <h3 class="wp-block-heading widget_title">Kategori Blog</h3>
                                <ul class="wp-block-categories-list wp-block-categories">
                                    <?php
                                    foreach ($site['categories']['result'] as $v) {
                                        if ($v['category_count'] > 0) {
                                            ?>
                                            <li class="cat-item cat-item-7">
                                                <a href="<?php echo $v['category_url']; ?>">
                                                    <?php echo $v['category_name']; ?>
                                                    <span class="cat-item__number"><?php echo $v['category_count']; ?></span>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="widget">
                      <div class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
                        <div class="wp-block-group__inner-container">
                          <h3 class="widget_title wp-block-heading">TAGS CLOUD</h3>
                          <p class="wp-block-tag-cloud"><a href="#" class="tag-cloud-link tag-link-11" aria-label="Advice (1 item)">BUSINESS</a>
                            <a href="#" class="tag-cloud-link tag-link-12">PROJECTS</a>
                            <a href="#" class="tag-cloud-link tag-link-13">UNIQUE</a>
                            <a href="#" class="tag-cloud-link tag-link-4">IDEAS</a>
                            <a href="#" class="tag-cloud-link tag-link-15">GROW</a>
                            <a href="#" class="tag-cloud-link tag-link-3">MARKETING</a>
                            <a href="#" class="tag-cloud-link tag-link-14">CREATIVE</a>
                            <a href="#" class="tag-cloud-link tag-link-14">COMPANY</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="widget">
                      <h3 class="widget_title">Photos Gallery</h3>
                      <div class="sidebar-gallery">
                        <div class="gallery-thumb"><img src="<?php echo $asset; ?>assets/img/blog/gal-1-1.jpg" alt="gal 1 1" class="w-100"><a href="#" class="popup-image gal-btn"><i class="fal fa-plus"></i></a></div>
                        <div class="gallery-thumb"><img src="<?php echo $asset; ?>assets/img/blog/gal-1-2.jpg" alt="gal 1 2" class="w-100"><a href="#" class="popup-image gal-btn"><i class="fal fa-plus"></i></a></div>
                        <div class="gallery-thumb"><img src="<?php echo $asset; ?>assets/img/blog/gal-1-3.jpg" alt="gal 1 3" class="w-100"><a href="#" class="popup-image gal-btn"><i class="fal fa-plus"></i></a></div>
                        <div class="gallery-thumb"><img src="<?php echo $asset; ?>assets/img/blog/gal-1-4.jpg" alt="gal 1 4" class="w-100"><a href="#" class="popup-image gal-btn"><i class="fal fa-plus"></i></a></div>
                        <div class="gallery-thumb"><img src="<?php echo $asset; ?>assets/img/blog/gal-1-5.jpg" alt="gal 1 5" class="w-100"><a href="#" class="popup-image gal-btn"><i class="fal fa-plus"></i></a></div>
                        <div class="gallery-thumb"><img src="<?php echo $asset; ?>assets/img/blog/gal-1-6.jpg" alt="gal 1 6" class="w-100"><a href="#" class="popup-image gal-btn"><i class="fal fa-plus"></i></a></div>
                      </div>
                    </div>
                    <div class="widget widget--bg1 background-image border-0" data-bg-src="<?php echo $asset; ?>assets/img/widget/widget-bg-1-1.png">
                      <h3 class="widget_title text-white">NEWSLETTER</h3>
                      <form action="#" class="wp-block--submit">
                        <div class="vs-widget-about">
                          <p class="vs-widget-about__text">Subscribe and get latest news.</p>
                          <input class="wp-block--submit__input" placeholder="Enter your email address...." type="search" name="s">
                          <button type="button" class="vs-btn style11 w-100">Subscribe Now</button>
                        </div>
                      </form>
                    </div>
                    -->
                </aside>
            </div>
        </div>
    </div>
</section>