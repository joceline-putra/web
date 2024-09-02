<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="<?php echo $asset; ?>assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title"><?php echo $title; ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <section class="blog-post-area">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-70">
                        <span class="sub-title">Latest News</span>
                        <h2 class="title"><?php echo $title; ?></h2>
                        <div class="title-shape" data-background="<?php echo $asset;?>assets/img/images/title_shape.png"></div>
                    </div>
                </div>
            </div> -->
            <div class="row justify-content-center">
                <?php 
                    if(count($pages['sitelink']['categories']['result']) > 0){
                        $res = $pages['sitelink']['categories']['result'];
                        foreach($res as $v){                
                        ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="blog-post-item">
                                    <div class="blog-post-thumb">
                                        <a href="<?php echo $v['category_url']; ?>"><img src="<?php echo $v['category_image']; ?>" alt=""></a>
                                    </div>
                                    <div class="blog-post-content">
                                        <!-- <div class="blog-meta">
                                            <ul class="list-wrap">
                                                <li><a href="blog.html"><i class="fas fa-user"></i>Hamolin Pilot</a></li>
                                                <li><i class="fas fa-comments"></i>03</li>
                                            </ul>
                                        </div> -->
                                        <h4 class="title"><a href="<?php echo $v['category_url']; ?>"><?php echo $v['category_name']; ?></a></h4>
                                        <!-- <p>Keterangan</p> -->
                                        <div class="blog-post-bottom">
                                            <a href="<?php echo $v['category_url']; ?>" class="link-btn"><?php echo $v['category_count']; ?> Data</a>
                                            <a href="<?php echo $v['category_url']; ?>" class="link-arrow"><i class="fas fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>