<div class="breadcumb-wrapper" data-bg-src="<?php echo site_url(); ?>upload/penginapan.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php echo $title; ?></h1>
            <!-- <p class="breadcumb-text">construction and architecture environmentally most responsible for any kinds of themes.</p> -->
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
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
        <div class="row">
            <?php
            foreach ($pages['sitelink']['categories']['result_news'] as $v) {
                $set_url = $pages['sitelink']['categories']['url'] . '/' . $v['news_url'];
                $set_image = !empty($v['news_image']) ? site_url() . $v['news_image'] : site_url('upload/noimage.png');
                $set_title = substr($v['news_title'], 0, 20);
                $set_description = substr(strip_tags($v['news_content']), 0, 20);
                ?>        
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style2">
                        <div class="blog-img">
                            <a href="<?php echo $set_url; ?>"><img class="blog-img__img" src="<?php echo $set_image; ?>" alt="Blog Image"></a>
                            <span class="blog-date"><?php echo date("d M Y", strtotime($v['news_date_created'])); ?></span>
                            <div class="blog-author">
                                <img src="<?php echo $asset; ?>assets/img/blog/blog-author-1.jpg" alt="Blog Author">
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="<?php echo $pages['sitelink']['categories']['url']; ?>">by <span class="blog-meta__highlight"><?php echo ucfirst($v['user_username']); ?></span></a>
                            </div>
                            <h2 class="blog-title"><a href="<?php echo $set_url; ?>"><?php echo $set_title; ?></a>
                            </h2>
                            <div class="blog-footer">
                                <a href="<?php echo $set_url; ?>" class="link-btn">Read Details
                                    <svg width="54.014" height="13.003" viewBox="0 0 54.014 13.003">
                                    <path d="M516.253,1547.64H468.99v-2.291h47.263v-5.356q3.375,3.26,6.752,6.526l-6.707,6.451-.045.026Z" transform="translate(-468.99 -1539.994)" fill="currentColor" />
                                    <path d="M516.253,1547.64H468.99v-2.291h47.263v-5.356q3.375,3.26,6.752,6.526l-6.707,6.451-.045.026Z" transform="translate(-468.99 -1539.994)" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>