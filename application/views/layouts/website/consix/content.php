<!-- 
 <section class="hero hero--layout3">
    <div class="vs-carousel vsslider1" data-slide-show="1" data-fade="true" data-arrows="false">
        <div>
            <div class="hero-inner">
                <div class="hero-bg3" data-bg-src="<?php echo $asset; ?>assets/img/hero/hero-3-1.jpg"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9">
                            <div class="hero-content3">
                                <span class="hero-subtitle">AN EXTENSIVE RA NGE OF SERVICES</span>
                                <h1 class="hero-title">Residential and commercial Solution</h1>
                                <p class="hero-text">Consik is a construction and architecture most
                                    responsible for any kinds of themes.</p>
                                <div class="hero-btns">
                                    <a href="#" class="vs-btn">
                                        <span class="vs-btn__bar"></span>
                                        START CONSULTING
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="hero-inner">
                <div class="hero-bg" data-bg-src="<?php echo $asset; ?>assets/img/hero/hero-1-1.jpg"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="hero-content3">
                                <span class="hero-subtitle">AN EXTENSIVE RA NGE OF SERVICES</span>
                                <h1 class="hero-title">Residential and commercial Solution</h1>
                                <p class="hero-text">Consik is a construction and architecture most
                                    responsible for any kinds of themes.</p>
                                <div class="hero-btns">
                                    <a href="<?php echo $asset; ?>about.html" class="vs-btn">
                                        <span class="vs-btn__bar"></span>
                                        START CONSULTING
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider--buttons">
        <div class="container">
            <div class="d-flex align-items-center">
                <button class="icon-btn style7" data-slick-prev=".vsslider1"><i class="fal fa-angle-double-left"></i></button>
                <button class="icon-btn style7" data-slick-next=".vsslider1"><i class="fal fa-angle-double-right"></i></button>
            </div>
        </div>
    </div>
</section>
-->
<!--==============================
  Category Area
  ==============================-->
<div class="cate--layout1 space-top space-extra-bottom">
    <div class="container">
        <div class="row">
                <div class="col-xl-6 col-lg-8 mx-auto">
                    <div class="title-area text-center">
                        <span class="sec-subtitle2">Kategori Blog</span>
                        <h2 class="sec-title">Recent Category</h2>
                    </div>
                </div>
            </div>        
        <div class="row justify-content-center">
            <?php 
            foreach ($result['category'] as $v) {
            // $set_url = $pages['sitelink']['categories']['url'] . '/' . $v['news_url'];
            $set_image = !empty($v['image']) ? $v['image'] : site_url('upload/noimage.image');
            $set_title = substr($v['title'], 0, 20);
            ?>     
            <div class="col-lg-3 col-md-4 col-auto">
                <div class="cate-block--style">
                    <div class="cate-block__img">
                        <img src="<?php echo $set_image;?>" alt="cate">
                    </div>
                    <h3 class="cate-block__title"><a href="<?php echo $v['url'];?>"><?php echo $set_title;?></a></h3>
                </div>
            </div>
            <?php 
            }
            ?>
        </div>
    </div>
</div>
<!--==============================
  About Area
  ==============================-->
  <!--
<section class="about--layout3 space-extra-bottom position-relative overflow-hidden">
    <div class="position-absolute end-0 bottom-0">
        <img src="<?php echo $asset; ?>assets/img/about/ab-3-3.png" alt="about">
    </div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5">
                <div class="title-area">
                    <span class="sec-subtitle">WELCOME TO OUR COMPANY</span>
                    <h2 class="sec-title">WE ARE QUALIFIED IN EVERY WORKING DEPARTMENTS</h2>
                </div>
                <div class="about-img--style3">
                    <img src="<?php echo $asset; ?>assets/img/about/ab-3-1.jpg" alt="about img">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-img--style3">
                    <img src="<?php echo $asset; ?>assets/img/about/ab-3-2.jpg" alt="about img">
                    <a href="<?php echo $asset; ?>https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn2 popup-video" tabindex="0">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.875" height="36.156" viewBox="0 0 18.875 36.156">
                            <g id="Triangle_1" data-name="Triangle 1" transform="translate(-753.451 -2955.813)" fill="rgba(0,0,0,0)"
                               stroke-linejoin="round">
                            <path
                                d="M 755.951171875 2986.11279296875 L 755.951171875 2961.6689453125 L 768.7118530273438 2973.890869140625 L 755.951171875 2986.11279296875 Z"
                                stroke="none"></path>
                            <path
                                d="M 758.451171875 2967.525146484375 L 758.451171875 2980.256591796875 L 765.0975952148438 2973.890869140625 L 758.451171875 2967.525146484375 M 753.451171875 2955.812744140625 L 772.326171875 2973.890869140625 L 753.451171875 2991.968994140625 L 753.451171875 2955.812744140625 Z"
                                stroke="none" fill="currentColor"></path>
                            </g>
                            </svg>
                        </i>
                    </a>
                </div>
                <div class="about-widget">
                    <p class="about-text--style3">We successfully cope with tasks of varying complexity, provide long-term
                        guarantees and regularly master new technologies. Our portfolio includes dozens of successfully.</p>
                    <a href="<?php echo $asset; ?>about.html" class="vs-btn style2" tabindex="0">
                        <span class="vs-btn__bar"></span>
                        MORE EXPLORE
                    </a>
                </div>
            </div>
        </div>
        <div class="space-extra-top">
            <div class="brand--layout3 position-relative z-index-common">
                <div class="vs-carousel vsslider2 brand-boxes" data-dots="false" data-slide-show="5" data-lg-slide-show="3" data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="1" data-center-mode="true" data-arrows="false">
                    <div>
                        <div class="brand-style">
                            <img src="<?php echo $asset; ?>assets/img/brand/1.png" alt="brand">
                        </div>
                    </div>
                    <div>
                        <div class="brand-style">
                            <img src="<?php echo $asset; ?>assets/img/brand/2.png" alt="brand">
                        </div>
                    </div>
                    <div>
                        <div class="brand-style">
                            <img src="<?php echo $asset; ?>assets/img/brand/3.png" alt="brand">
                        </div>
                    </div>
                    <div>
                        <div class="brand-style">
                            <img src="<?php echo $asset; ?>assets/img/brand/4.png" alt="brand">
                        </div>
                    </div>
                    <div>
                        <div class="brand-style">
                            <img src="<?php echo $asset; ?>assets/img/brand/5.png" alt="brand">
                        </div>
                    </div>
                    <div>
                        <div class="brand-style">
                            <img src="<?php echo $asset; ?>assets/img/brand/1.png" alt="brand">
                        </div>
                    </div>
                </div>
                <button class="icon-btn style8" data-slick-prev=".vsslider2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30.002" height="7.002" viewBox="0 0 30.002 7.002">
                    <path id="Rectangle_50_copy_7" data-name="Rectangle 50 copy 7" d="M407.723,7509.983q-1.86-1.736-3.724-3.472,1.874-1.759,3.751-3.515v2.884H434v1.24H407.749V7510A.181.181,0,0,1,407.723,7509.983Z" transform="translate(-403.999 -7502.996)" />
                    </svg>
                </button>
                <button class="icon-btn style8" data-slick-next=".vsslider2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30.004" height="7.002" viewBox="0 0 30.004 7.002">
                    <path id="Rectangle_50_copy_6" data-name="Rectangle 50 copy 6" d="M1506.25,7507.12H1480v-1.24h26.251V7503q1.877,1.756,3.753,3.515-1.866,1.736-3.726,3.472a.182.182,0,0,1-.026.015Z" transform="translate(-1480 -7502.996)" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
-->

<section class="project--layout1 blog--layout1 space-top z-index-common">
    <div class="container">
        <div class="space-extra-bottom">
            <div class="row">
                <div class="col-xl-6 col-lg-8 mx-auto">
                    <div class="title-area text-center">
                        <span class="sec-subtitle2">Terbaru Kami</span>
                        <h2 class="sec-title">Blog Terbaru</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center ">
                <?php 
                foreach ($result['news']['news_new'] as $v) {
                // $set_url = $pages['sitelink']['categories']['url'] . '/' . $v['news_url'];
                $set_image = !empty($v['image']) ? $v['image'] : site_url('upload/noimage.png');
                $set_title = substr($v['title'], 0, 20);
                ?>                   
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style5" data-bg-src="<?php echo $set_image; ?>">
                        <div class="blog-shape">
                            <img src="<?php echo $asset; ?>assets/img/textures/texture-1.png" alt="texture">
                        </div>
                        <div class="blog-content">
                            <div class="blog-header">
                                <span class="blog-date"><?php echo date("d M Y", strtotime($v['created']))?></span>
                                <h2 class="blog-title"><a href="<?php echo $v['url']; ?>"><?php echo $set_title; ?></a>
                                </h2>
                                <p class="blog-text"><?php echo $v['content']; ?></p>
                            </div>
                            <div class="blog-footer">
                                <div class="blog-meta">
                                    <a class="blog-meta__link" href="<?php echo $v['url']; ?>">by <span class="blog-meta__highlight"><?php echo $v['author']; ?></span></a>
                                </div>
                                <!-- <a href="<?php echo $v['url']; ?>" class="link-btn">
                                    <i class="fal fa-plus"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="blog-content overlay">
                            <div class="blog-header">
                                <span class="blog-date"><?php echo date("d M Y", strtotime($v['created']))?></span>
                                <h2 class="blog-title"><a href="<?php echo $v['url']; ?>"><?php echo $set_title; ?></a>
                                </h2>
                            </div>
                            <div class="blog-footer">
                                <div class="blog-meta">
                                    <a class="blog-meta__link" href="<?php echo $v['url']; ?>">by <span class="blog-meta__highlight"><?php echo $v['author']; ?></span></a>
                                </div>
                                <!-- <a href="<<?php echo $v['url']; ?>" class="link-btn">
                                    <i class="fal fa-plus"></i>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                }
                ?>
            </div>
            <!-- <div class="section-button pt-5 d-flex justify-content-center text-center">
                <a href="# class="vs-btn style2" tabindex="0">
                    <span class="vs-btn__bar"></span>
                    VIEW ALL NEWS
                </a>
            </div> -->
        </div>
    </div>
</section>
<!--==============================
  Projects Area
  ==============================-->
<!--
<section class="project--layout3 z-index-common space-top space-extra-bottom overflow-hidden">
    <div class="start-0 bottom-0 position-absolute z-index-n1">
        <img src="<?php echo $asset; ?>assets/img/project/element-2.png" alt="Project">
    </div>
    <div class="end-0 bottom-0 position-absolute z-index-n1">
        <svg width="698.018" height="351.713" viewBox="0 0 698.018 351.713">
        <g transform="translate(-1221.982 -2951.369)">
        <path d="M1499.325,2951.369l175.95,114.074L1329.917,3227.5l-64.147,26.876Z" fill="#fc6601" />
        <path d="M810,1086.805v336.276H111.982Z" transform="translate(1110 1880)" fill="#fc6601" />
        </g>
        </svg>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-9 mx-auto">
                <div class="title-area text-center">
                    <span class="sec-subtitle2">OUR WORK SHOWCASE</span>
                    <h2 class="sec-title">EXPLORE RECENT PROJECTS</h2>
                </div>
            </div>
        </div>
        <div class="vs-carousel vsslider3" data-dots="true" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="1" data-center-mode="true" data-arrows="false">
            <div>
                <div class="project-block--style3">
                    <div class="project-block__media">
                        <a href="<?php echo $asset; ?>project-details.html">
                            <img class="project-block__img" src="<?php echo $asset; ?>assets/img/project/project-3-1.jpg" alt="project details">
                        </a>
                    </div>
                    <div class="project-block__content">
                        <div class="project-block__content__left">
                            <h3 class="project-block__title h4">
                                <a class="project-block__title__link" href="<?php echo $asset; ?>project-details.html">Superstructure Cardina Martime</a>
                            </h3>
                            <span class="project-block__location">LOCATION: United State</span>
                        </div>
                        <a class="project-block__arrow" href="<?php echo $asset; ?>project-details.html">
                            <i class="fal fa-angle-double-down"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="project-block--style3">
                    <div class="project-block__media">
                        <a href="<?php echo $asset; ?>project-details.html">
                            <img class="project-block__img" src="<?php echo $asset; ?>assets/img/project/project-3-2.jpg" alt="project details">
                        </a>
                    </div>
                    <div class="project-block__content">
                        <div class="project-block__content__left">
                            <h3 class="project-block__title h4">
                                <a class="project-block__title__link" href="<?php echo $asset; ?>project-details.html">Roof Reparation</a>
                            </h3>
                            <span class="project-block__location">LOCATION: United State</span>
                        </div>
                        <a class="project-block__arrow" href="<?php echo $asset; ?>project-details.html">
                            <i class="fal fa-angle-double-down"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="project-block--style3">
                    <div class="project-block__media">
                        <a href="<?php echo $asset; ?>project-details.html">
                            <img class="project-block__img" src="<?php echo $asset; ?>assets/img/project/project-3-3.jpg" alt="project details">
                        </a>
                    </div>
                    <div class="project-block__content">
                        <div class="project-block__content__left">
                            <h3 class="project-block__title h4">
                                <a class="project-block__title__link" href="<?php echo $asset; ?>project-details.html">Hull University
                                    VInci Construction</a>
                            </h3>
                            <span class="project-block__location">LOCATION: United State</span>
                        </div>
                        <a class="project-block__arrow" href="<?php echo $asset; ?>project-details.html">
                            <i class="fal fa-angle-double-down"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="project-block--style3">
                    <div class="project-block__media">
                        <a href="<?php echo $asset; ?>project-details.html">
                            <img class="project-block__img" src="<?php echo $asset; ?>assets/img/project/project-3-4.jpg" alt="project details">
                        </a>
                    </div>
                    <div class="project-block__content">
                        <div class="project-block__content__left">
                            <h3 class="project-block__title h4">
                                <a class="project-block__title__link" href="<?php echo $asset; ?>project-details.html">Steel and Glass</a>
                            </h3>
                            <span class="project-block__location">LOCATION: United State</span>
                        </div>
                        <a class="project-block__arrow" href="<?php echo $asset; ?>project-details.html">
                            <i class="fal fa-angle-double-down"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="project-block--style3">
                    <div class="project-block__media">
                        <a href="<?php echo $asset; ?>project-details.html">
                            <img class="project-block__img" src="<?php echo $asset; ?>assets/img/project/project-3-5.jpg" alt="project details">
                        </a>
                    </div>
                    <div class="project-block__content">
                        <div class="project-block__content__left">
                            <h3 class="project-block__title h4">
                                <a class="project-block__title__link" href="<?php echo $asset; ?>project-details.html">A large industrial
                                    manufacturing wtye</a>
                            </h3>
                            <span class="project-block__location">LOCATION: United State</span>
                        </div>
                        <a class="project-block__arrow" href="<?php echo $asset; ?>project-details.html">
                            <i class="fal fa-angle-double-down"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="project-block--style3">
                    <div class="project-block__media">
                        <a href="<?php echo $asset; ?>project-details.html">
                            <img class="project-block__img" src="<?php echo $asset; ?>assets/img/project/project-3-1.jpg" alt="project details">
                        </a>
                    </div>
                    <div class="project-block__content">
                        <div class="project-block__content__left">
                            <h3 class="project-block__title h4">
                                <a class="project-block__title__link" href="<?php echo $asset; ?>project-details.html">Superstructure Cardina Martime</a>
                            </h3>
                            <span class="project-block__location">LOCATION: United State</span>
                        </div>
                        <a class="project-block__arrow" href="<?php echo $asset; ?>project-details.html">
                            <i class="fal fa-angle-double-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<!--==============================
  Team Area
  ==============================-->
<!--
<section class="vsteam--layout1 space-top z-index-common overflow-hidden">
    <div class="end-0 bottom-0 position-absolute z-index-n1 opacity-10">
        <img src="<?php echo $asset; ?>assets/img/team/team-backlay-1.jpg" alt="Project">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-area text-center">
                    <span class="sec-icon">
                        <img src="<?php echo $asset; ?>assets/img/icons/logo-icon.png" alt="icon">
                    </span>
                    <span class="sec-subtitle2">OUR SKILLED TEAM</span>
                    <h2 class="sec-title">MEET THE EXPERT TEAM</h2>
                </div>
            </div>
        </div>
        <div class="row gx-50 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="vsteam-block--style item">
                    <div class="vsteam-block__media">
                        <a href="<?php echo $asset; ?>team-details.html">
                            <img src="<?php echo $asset; ?>assets/img/team/team-member-3-1.jpg" alt="Team Member 3 1" class="team-block__member--img">
                        </a>
                    </div>
                    <div class="vsteam-block__content">
                        <h3 class="vsteam-block__title">
                            <a class="vsteam-block__title__link" href="<?php echo $asset; ?>team-details.html">Harald Gindl</a>
                        </h3>
                        <span class="vsteam-block__designation">Head Railway Construction</span>
                    </div>
                    <div class="social-style">
                        <ul>
                            <li>
                                <a href="<?php echo $asset; ?>facebook.html"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $asset; ?>facebook.html"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $asset; ?>facebook.html"><i class="fab fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="vsteam-block--style item">
                    <div class="vsteam-block__media">
                        <a href="<?php echo $asset; ?>team-details.html">
                            <img src="<?php echo $asset; ?>assets/img/team/team-member-3-2.jpg" alt="Team Member 3 1" class="team-block__member--img">
                        </a>
                    </div>
                    <div class="vsteam-block__content">
                        <h3 class="vsteam-block__title">
                            <a class="vsteam-block__title__link" href="<?php echo $asset; ?>team-details.html">Thomas Walkar</a>
                        </h3>
                        <span class="vsteam-block__designation">Head Railway Construction</span>
                    </div>
                    <div class="social-style">
                        <ul>
                            <li>
                                <a href="<?php echo $asset; ?>facebook.html"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $asset; ?>facebook.html"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $asset; ?>facebook.html"><i class="fab fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="vsteam-block--style item">
                    <div class="vsteam-block__media">
                        <a href="<?php echo $asset; ?>team-details.html">
                            <img src="<?php echo $asset; ?>assets/img/team/team-member-3-3.jpg" alt="Team Member 3 1" class="team-block__member--img">
                        </a>
                    </div>
                    <div class="vsteam-block__content">
                        <h3 class="vsteam-block__title">
                            <a class="vsteam-block__title__link" href="<?php echo $asset; ?>team-details.html">Mehadi Hassan</a>
                        </h3>
                        <span class="vsteam-block__designation">Head Railway Construction</span>
                    </div>
                    <div class="social-style">
                        <ul>
                            <li>
                                <a href="<?php echo $asset; ?>facebook.html"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $asset; ?>facebook.html"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $asset; ?>facebook.html"><i class="fab fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<!--==============================
  Our Banner Widget
  ==============================-->
<!--
<div class="space-extra-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="consik-widget--style" data-bg-src="<?php echo $asset; ?>assets/img/textures/widget-textures-1.svg">
                    <div class="consik-widget__img">
                        <img src="<?php echo $asset; ?>assets/img/widget/widget-3-1.png" alt="widget">
                    </div>
                    <div class="consik-widget__element">
                        <svg width="372.006" height="87" viewBox="0 0 372.006 87">
                        <g transform="translate(-573.997 -4493.999)">
                        <path d="M647.062,4516.9l50.349,19.889-98.826,28.253-18.356,4.686Z" fill="#fc6601" />
                        <path d="M864.6,4494l81.4,86.333L631.178,4581,574,4579.7Z" fill="#fc6601" />
                        </g>
                        </svg>
                    </div>
                    <div class="consik-widget__body">
                        <h4 class="consik-widget__title">Best Repair & Painting</h4>
                        <p class="consik-widget__text">Elementum nisi quis eleifend am adipis
                            vitae proin. Iac elit ullamc urna.
                        </p>
                        <a href="<?php echo $asset; ?>about.html" class="vs-btn" tabindex="0">
                            <span class="vs-btn__bar"></span>
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="consik-widget--style" data-bg-src="<?php echo $asset; ?>assets/img/textures/widget-textures-1.svg">
                    <div class="consik-widget__img">
                        <img src="<?php echo $asset; ?>assets/img/widget/widget-3-2.png" alt="widget">
                    </div>
                    <div class="consik-widget__element">
                        <svg width="372.006" height="87" viewBox="0 0 372.006 87">
                        <g transform="translate(-573.997 -4493.999)">
                        <path d="M647.062,4516.9l50.349,19.889-98.826,28.253-18.356,4.686Z" fill="#fc6601" />
                        <path d="M864.6,4494l81.4,86.333L631.178,4581,574,4579.7Z" fill="#fc6601" />
                        </g>
                        </svg>
                    </div>
                    <div class="consik-widget__body">
                        <h4 class="consik-widget__title">Civils Projects</h4>
                        <p class="consik-widget__text">Elementum nisi quis eleifend am adipis
                            vitae proin. Iac elit ullamc urna.
                        </p>
                        <a href="<?php echo $asset; ?>about.html" class="vs-btn" tabindex="0">
                            <span class="vs-btn__bar"></span>
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<!--==============================
  Our Sucess
  ==============================-->
<!--
<section class="sucess--layout1 z-index-common space-top" data-bg-src="<?php #echo $asset; ?>assets/img/bg/bg-2.jpg">
    <div class="sucess__overlay"></div>
    <div class="sucess__shape"></div>
    <div class="sucess__element1 position-absolute top-0 start-0 z-index-n1">
        <svg width="537.549" height="430.304" viewBox="0 0 537.549 430.304">
        <g transform="translate(0 -4705)">
        <path d="M310.6,5135.3,152.516,4998.368,462.806,4803.84l57.633-32.263Z" fill="#fc6601" />
        <path d="M0,4705H537.549L0,5052.363Z" fill="#fc6601" />
        </g>
        </svg>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-6 mx-auto">
                <div class="title-area text-center">
                    <span class="sec-subtitle2 text-white">COVERING ARCHITECTURAL DESIGN</span>
                    <h2 class="sec-titlexh1 text-white">YOUR <span class="highlight">RENOVATION</span> STARTS HERE</h2>
                    <a href="<?php echo $asset; ?>about.html" class="vs-btn" tabindex="0">
                        <span class="vs-btn__bar"></span>
                        START CONSULTING
                    </a>
                </div>
            </div>
        </div>
        <div class="row gx-0">
            <div class="col-lg-4 col-md-6">
                <div class="sucess-block--style1" data-bg-src="<?php echo $asset; ?>assets/img/textures/sucess-bg-1.svg">
                    <div class="sucess-block__icon">
                        <img src="<?php echo $asset; ?>assets/img/icons/sucess-icon-1.svg" alt="sucess icon 1">
                    </div>
                    <div class="sucess-block__number">
                        <span>80</span> Million SQFT
                        <sup>Over</sup>
                    </div>
                    <p class="sucess-block__text">of Industrial space delivered.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="sucess-block--style1" data-bg-src="<?php echo $asset; ?>assets/img/textures/sucess-bg-1.svg">
                    <div class="sucess-block__icon">
                        <img src="<?php echo $asset; ?>assets/img/icons/sucess-icon-2.svg" alt="sucess icon 1">
                    </div>
                    <div class="sucess-block__number">
                        <span>8,000</span> multi-room
                        <sup>Over</sup>
                    </div>
                    <p class="sucess-block__text">of Industrial space delivered.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="sucess-block--style1" data-bg-src="<?php echo $asset; ?>assets/img/textures/sucess-bg-1.svg">
                    <div class="sucess-block__icon">
                        <img src="<?php echo $asset; ?>assets/img/icons/sucess-icon-3.svg" alt="sucess icon 1">
                    </div>
                    <div class="sucess-block__number">
                        <span>100</span> Kilometters
                        <sup>Over</sup>
                    </div>
                    <p class="sucess-block__text">of Industrial space delivered.</p>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<!--==============================
  Client Area
  ==============================-->
<!--
<section class="client--layout2 space-top space-extra-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-6">
                <div class="title-area">
                    <span class="sec-subtitle2">CLIENTS REVIEWS</span>
                    <h2 class="sec-title">TESTIMONIALS</h2>
                </div>
                <div class="vs-carousel vssliderClient2 row" data-dots="false" data-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-xs-slide-show="1" data-center-mode="true">
                    <div class="col">
                        <div class="client-block--style2">
                            <span class="client-block__shape position-absolute top-0 end-0 z-n1">
                                <img src="<?php echo $asset; ?>assets/img/icons/quote-icon.svg" alt="quote icon">
                            </span>
                            <p class="client-block__text">To my mind, the greatest reward for any renovation being able to experience
                                the
                                transformation from end. enjoy getting to see how a renovation can go to a reality and lead to an
                                elevated
                                mood.</p>
                            <div class="client-block__clientInfo">
                                <div class="client-block__avatar">
                                    <img src="<?php echo $asset; ?>assets/img/client/client-1-1.png" alt="client">
                                </div>
                                <div class="client-block__info">
                                    <h3 class="client-block__name">Thomas Marko</h3>
                                    <span class="client-block__designation">Chairman, Building Company</span>
                                    <div class="client-block__ratings">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-block--style2">
                            <span class="client-block__shape position-absolute top-0 end-0 z-n1">
                                <img src="<?php echo $asset; ?>assets/img/icons/quote-icon.svg" alt="quote icon">
                            </span>
                            <p class="client-block__text">To my mind, the greatest reward for any renovation being able to experience
                                the
                                transformation from end. enjoy getting to see how a renovation can go to a reality and lead to an
                                elevated
                                mood.</p>
                            <div class="client-block__clientInfo">
                                <div class="client-block__avatar">
                                    <img src="<?php echo $asset; ?>assets/img/client/client-1-1.png" alt="client">
                                </div>
                                <div class="client-block__info">
                                    <h3 class="client-block__name">Thomas Marko</h3>
                                    <span class="client-block__designation">Chairman, Building Company</span>
                                    <div class="client-block__ratings">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="client-block--style2">
                            <span class="client-block__shape position-absolute top-0 end-0 z-n1">
                                <img src="<?php echo $asset; ?>assets/img/icons/quote-icon.svg" alt="quote icon">
                            </span>
                            <p class="client-block__text">To my mind, the greatest reward for any renovation being able to experience
                                the
                                transformation from end. enjoy getting to see how a renovation can go to a reality and lead to an
                                elevated
                                mood.</p>
                            <div class="client-block__clientInfo">
                                <div class="client-block__avatar">
                                    <img src="<?php echo $asset; ?>assets/img/client/client-1-1.png" alt="client">
                                </div>
                                <div class="client-block__info">
                                    <h3 class="client-block__name">Thomas Marko</h3>
                                    <span class="client-block__designation">Chairman, Building Company</span>
                                    <div class="client-block__ratings">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 mb-30">
                    <button class="icon-btn style9" data-slick-prev=".vssliderClient2">
                        <svg width="30.002" height="7.003" viewBox="0 0 30.002 7.003">
                        <path data-name="Rectangle 50 copy 8" d="M416.723,6229.985,413,6226.51q1.876-1.756,3.751-3.515v2.885H443v1.24H416.748V6230A.082.082,0,0,0,416.723,6229.985Z" transform="translate(-412.997 -6222.996)" />
                        </svg>
                    </button>
                    <button class="icon-btn style9" data-slick-next=".vssliderClient2">
                        <svg width="30.003" height="7.003" viewBox="0 0 30.003 7.003">
                        <path d="M550.251,6227.12H524v-1.24h26.252V6223q1.876,1.757,3.751,3.515l-3.726,3.475a.149.149,0,0,0-.025.014Z" transform="translate(-523.999 -6222.996)" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="client-img">
                    <div class="client-img__two">
                        <img src="<?php echo $asset; ?>assets/img/client/testi-1-2.jpg" alt="testi 2">
                    </div>
                    <div class="client-img__one">
                        <img src="<?php echo $asset; ?>assets/img/client/testi-1-1.png" alt="testi 1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--==============================
  Pricing
  ==============================-->
<!--
<div class="price space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 mx-auto">
                <div class="title-area text-center">
                    <span class="sec-icon">
                        <img src="<?php echo $asset; ?>assets/img/icons/logo-icon.png" alt="icon">
                    </span>
                    <span class="sec-subtitle2">BEST PRICING PLAN</span>
                    <h2 class="sec-title">CHOOSE YOUR PLAN</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="price-block--style">
                    <div class="price-block__body">
                        <div class="price-block__header" data-bg-src="<?php echo $asset; ?>assets/img/textures/price-textures.svg">
                            <span class="price-block__name">Basic Plan</span>
                            <span class="price-block__price"><span>$150<span>.00</span></span><sub>/per monthly</sub></span>
                            <div class="price-block__header--bottom">
                                <span class="price-block__icon">
                                    <img src="<?php echo $asset; ?>assets/img/icons/price-icon-1.svg" alt="pricing icon one">
                                </span>
                            </div>
                        </div>
                        <div class="price-block__content">
                            <ul>
                                <li>500+ Sq Metres</li>
                                <li>Swimming Pool Included</li>
                                <li>Up to 10 Rooms</li>
                                <li>Best Premium Materials</li>
                                <li>Floor Plan Design</li>
                            </ul>
                            <a href="<?php echo $asset; ?>price.html" class="vs-btn style2" tabindex="0">
                                <span class="vs-btn__bar"></span>
                                PURCHASE NOW
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="price-block--style">
                    <div class="price-block__body">
                        <div class="price-block__header" data-bg-src="<?php echo $asset; ?>assets/img/textures/price-textures.svg">
                            <span class="price-block__name">Basic Plan</span>
                            <span class="price-block__price"><span>$230<span>.00</span></span><sub>/per monthly</sub></span>
                            <div class="price-block__header--bottom">
                                <span class="price-block__icon">
                                    <img src="<?php echo $asset; ?>assets/img/icons/price-icon-2.svg" alt="pricing icon one">
                                </span>
                            </div>
                        </div>
                        <div class="price-block__content">
                            <ul>
                                <li>500+ Sq Metres</li>
                                <li>Swimming Pool Included</li>
                                <li>Up to 10 Rooms</li>
                                <li>Best Premium Materials</li>
                                <li>Floor Plan Design</li>
                            </ul>
                            <a href="<?php echo $asset; ?>price.html" class="vs-btn style2" tabindex="0">
                                <span class="vs-btn__bar"></span>
                                PURCHASE NOW
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="price-block--style">
                    <div class="price-block__body">
                        <div class="price-block__header" data-bg-src="<?php echo $asset; ?>assets/img/textures/price-textures.svg">
                            <span class="price-block__name">Basic Plan</span>
                            <span class="price-block__price"><span>$320<span>.00</span></span><sub>/per monthly</sub></span>
                            <div class="price-block__header--bottom">
                                <span class="price-block__icon">
                                    <img src="<?php echo $asset; ?>assets/img/icons/price-icon-3.svg" alt="pricing icon one">
                                </span>
                            </div>
                        </div>
                        <div class="price-block__content">
                            <ul>
                                <li>500+ Sq Metres</li>
                                <li>Swimming Pool Included</li>
                                <li>Up to 10 Rooms</li>
                                <li>Best Premium Materials</li>
                                <li>Floor Plan Design</li>
                            </ul>
                            <a href="<?php echo $asset; ?>price.html" class="vs-btn style2" tabindex="0">
                                <span class="vs-btn__bar"></span>
                                PURCHASE NOW
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!--==============================
  Request Quote Form
  ==============================-->
<!--
<div class="quote--layout1 z-index-common overflow-hidden" data-bg-src="<?php echo $asset; ?>assets/img/bg/bg-1.jpg">
    <div class="quote__shape position-absolute start-0 top-0 bottom-0 z-index-n1">
        <svg width="929" height="771.999" viewBox="0 0 929 771.999">
        <path id="Rectangle_523_copy" data-name="Rectangle 523 copy" d="M0,7286H636.73L929,8058,0,8056Z" transform="translate(0 -7286)" fill="#fc6601" />
        </svg>
    </div>
    <div class="quote__img position-absolute bottom-0">
        <img src="<?php echo $asset; ?>assets/img/quote/quote-img-1.png" alt="quote-img-1">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form action="https://html.vecurosoft.com/consik/demo/mail.php" class="form--style2 z-index-common" data-bg-src="<?php echo $asset; ?>assets/img/textures/quote-textures.svg">
                    <div class="position-absolute end-0 bottom-0">
                        <svg width="464.008" height="109" viewBox="0 0 464.008 109">
                        <g transform="translate(-628.996 -7868)">
                        <path d="M720.131,7896.7l62.8,24.918-123.266,35.4-22.9,5.87Z" fill="#f0f0f0" />
                        <path id="Rectangle_2_copy" data-name="Rectangle 2 copy" d="M991.469,7868,1093,7976.163,700.318,7977,629,7975.375Z" fill="#f0f0f0" />
                        </g>
                        </svg>
                    </div>
                    <span class="sec-subtitle">GET IN TOUCH</span>
                    <h2 class="sec-title mb-1">REQUEST A QUOTE</h2>
                    <p class="sec-text">To get the cost estimation of your house please select from the following:</p>
                    <div class="row gx-20">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" placeholder="Complete Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="tel" class="form-control" placeholder="Phone No">
                        </div>
                        <div class="col-12 form-group">
                            <select name="area" id="area" class="form-select">
                                <option value="" disabled selected>Select Service</option>
                                <option value="area1">Roof Maintaince</option>
                                <option value="area2">Roof Maintaince</option>
                                <option value="area3">Roof Maintaince</option>
                                <option value="area4">Roof Maintaince</option>
                                <option value="area5">Roof Maintaince</option>
                            </select>
                        </div>
                        <div class="col-12 form-group">
                            <a href="<?php echo $asset; ?>contact.html" class="vs-btn" tabindex="0">
                                <span class="vs-btn__bar"></span>
                                SUBMIT NOW
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
-->