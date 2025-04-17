<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<?php 
$theme = 'bg-dark2';
$theme_text = 'text-white';
?>
<main class="main">
    <section class="hover-section"> <!-- mt-8 -->
        <!-- <h3 class="text-center">Jaringan Megadata ISP</h3>
        <p class="text-center mx-auto mb-3">Peta Lokasi Persebaran</p> -->
        <div class="owl-carousel owl-theme show-nav-hover slide-animate" data-owl-options="{
            'dots': false,
            'nav': true,
            'loop': false
        }">
            <div class="banner banner3">
                <figure>
                    <img width="1920" height="700" src="<?php echo base_url(); ?>upload/map1.png"
                        style="background:#f6e1e8;min-height:36rem;" alt="banner" />
                    <div class="snowfall particle-effect"></div>
                </figure>

                <div class="banner-layer banner-layer-middle">
                    <div class="appear-animate text-center" data-animation-name="fadeInRightShorter">
                        <!-- <h4 class="banner-subtitle">Subtitle</h4>
                        <h3 class="banner-title">Title</h3>
                        <p>Paragraf</p>
                        <h5 class="d-inline-block mb-0">
                            <span class="text-uppercase">Starting At</span>
                            <b class="coupon-sale-text align-middle">$<em class="align-text-top">39</em>99</b>
                        </h5>
                        <a href="#" class="btn btn-dark" role="button">Button!</a> -->
                    </div>
                </div>
            </div>
            <div class="banner banner4">
                <figure>
                    <img width="1920" height="700" src="<?php echo base_url(); ?>upload/map2.png"
                        style="background:#f6e1e8;min-height:36rem;" alt="banner" />
                    <div class="particle-effect sparkle"></div>
                </figure>

                <div class="banner-layer banner-layer-middle text-right">
                    <div class="appear-animate text-center" data-animation-name="fadeInRightShorter">
                        <!-- <h4 class="banner-subtitle">Subtitle</h4>
                        <h3 class="banner-title">Title</h3>
                        <p>Paragraf</p>
                        <h5 class="d-inline-block mb-0">
                            <span class="text-uppercase">Starting At</span>
                            <b class="coupon-sale-text align-middle">$<em class="align-text-top">39</em>99</b>
                        </h5>
                        <a href="#" class="btn btn-dark" role="button">Button!</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    <!-- Slider -->
    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big text-uppercase" data-owl-options="{'loop': false}">
        <?php 
        if(count($link['slider']) > 0){
            foreach($link['slider'] as $i => $v){
                // echo $v['news_id'];
                $simg       = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url().'upload/noimage.png'; 
                // $simg       = base_url().'upload/banner.png';                 
                $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
                $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this blog details, please update on admin panel';   

            ?>
            <div class="home-slide home-slide1 banner">
                <img class="slide-bg" src="<?php echo $simg;?>" width="1903" height="280" alt="slider image" style="height:380px;">
                <div class="container d-flex align-items-center">
                    <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                        <!-- <h4 class="text-transform-none m-b-3" style="text-align:center;color:white;"><?php echo $stitle;?></h4> -->
                        <!-- <h2 class="text-transform-none m-b-3" style="text-align:center;font-family:inherit;">.</h2> -->
                            <!-- <h2 class="text-transform-none m-b-3" style="text-align:center;font-family:inherit;"><?php echo $stitle;?></h2> -->
                        <!-- <?php echo $scontent;?>
                        <p class="text-transform-none m-b-3" style="text-align:center;">
                            <br>
                            <a href="<?php echo base_url('contact-us');?>" class="btn btn-primary btn-lg" style="text-align:center;">Hubungi Kami</a>
                        </p> -->
                    </div>
                </div>
            </div>
            <?php 
            }
        } 
        ?>
        <?php 
        if(count($link['slider']) > 0){
            foreach($link['slider'] as $i => $v){
                // echo $v['file_url'];
                $simg       = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url().'upload/noimage.png'; 
                // $simg       = base_url().'upload/banner.png';                 
                $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
                $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this blog details, please update on admin panel';   

            ?>
            <div class="home-slide home-slide1 banner">
                <img class="slide-bg" src="<?php echo $simg;?>" width="1903" height="280" alt="slider image" style="height:380px;">
                <div class="container d-flex align-items-center">
                    <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                        <!-- <h4 class="text-transform-none m-b-3" style="text-align:center;color:white;"><?php echo $stitle;?></h4> -->
                        <!-- <h2 class="text-transform-none m-b-3" style="text-align:center;font-family:inherit;">.</h2> -->
                            <!-- <h2 class="text-transform-none m-b-3" style="text-align:center;font-family:inherit;">Banner II</h2> -->
                        <!-- <?php echo $scontent;?>
                        <p class="text-transform-none m-b-3" style="text-align:center;">
                            <br>
                            <a href="<?php echo base_url('contact-us');?>" class="btn btn-primary btn-lg" style="text-align:center;">Hubungi Kami</a>
                        </p> -->
                    </div>
                </div>
            </div>
            <?php 
            }
        } 
        ?>   
    </div>

    <!-- <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="assets/images/demoes/demo4/banners/banner-5.jpg">
        <div class="promo-banner banner container text-uppercase">
            <div class="banner-content row align-items-center text-center">
                <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                    <h2 class="mb-md-0 text-white">Top Fashion<br>Deals</h2>
                </div>
                <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn" data-animation-delay="300">
                    <a href="category.html" class="btn btn-dark btn-black ls-10">View Sale</a>
                </div>
                <div class="col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="600">
                    <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">
                        <b>Exclusive
                            COUPON</b></h4>
                    <h5 class="mb-1 coupon-sale-text text-white ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-white bg-secondary ls-n-10">$100</b> OFF</h5>
                </div>
            </div>
        </div>
    </section> -->

        <!-- Tentang Kami -->
        <div class="section-elements <?php echo $theme;?>">
            <div class="container">
                <?php 
                foreach($link['menu'] as $v){
                    if($v['news_id'] == 1){
                        $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
                        $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,250) : 'No description available on this blog details, please update on admin panel';   
                        $surl       = base_url().$v['news_url'];  
                        $simg       = !empty($v['file_url']) ? base_url().$v['file_url'] : base_url().'upload/noimage.png';                                   
                    }
                }

                if((isset($stitle) && (strlen($stitle)>0))){
                ?>
                <div class="row justify-content-left">
                    <div class="col-md-5">
                        <div class="info-box info-box-img">
                            <div class="info-box-content">
                                <h2 class="text-primary text-left text-white"><?php echo $stitle; ?></h2>
                                <div style="text-align: left;">
                                    <p class="text-white"><?php echo $scontent; ?></p>
                                    <br>
                                    <div class="btn btn-primary btn-ellipse btn-md mt-2"><a href="<?php echo $surl;?>" style="color:white;">Baca Selengkapnya</a></div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="info-box info-box-img">
                            <img src="<?php echo $simg;?>" alt="info-box-image" style="border-radius:20px;">
                        </div>
                    </div>                
                </div>
                <?php 
                }   
                ?>
            </div>
        </div>

    <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="<?php echo base_url('upload/banner5.png');?>">
        <!-- <div class="promo-banner banner container text-uppercase">
            <div class="banner-content row align-items-center text-center">
                <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                    <h2 class="mb-md-0 text-white">Top Fashion<br>Deals</h2>
                </div>
                <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn" data-animation-delay="300">
                    <a href="category.html" class="btn btn-dark btn-black ls-10">View Sale</a>
                </div>
                <div class="col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="600">
                    <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">
                        <b>Exclusive
                            COUPON</b></h4>
                    <h5 class="mb-1 coupon-sale-text text-white ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-white bg-secondary ls-n-10">$100</b> OFF</h5>
                </div>
            </div>
        </div>
        <div class="banner banner-big-sale appear-animate" data-animation-delay="200" data-animation-name="fadeInUpShorter" style="background: #2A95CB center/cover url(<?php echo base_url('upload/banner5.png');?>);">
            <div class="banner-content row align-items-center mx-0">
                <div class="col-md-9 col-sm-8">
                    <h2 class="text-white text-uppercase text-center text-sm-left ls-n-20 mb-md-0 px-4">
                        <b class="d-inline-block mr-3 mb-1 mb-md-0">Big Sale</b> All new fashion brands items up to 70% off
                        <small class="text-transform-none align-middle">Online Purchases Only</small>
                    </h2>
                </div>
                <div class="col-md-3 col-sm-4 text-center text-sm-right">
                    <a class="btn btn-light btn-white btn-lg" href="category.html">View Sale</a>
                </div>
            </div>
        </div>
        -->
    </section>
    
        <!-- Kategori Produk -->
        <div class="section-elements <?php echo $theme;?>">
            <div class="container">
                <h2 class="heading-bottom-border text-center text-uppercase mt-5">
                    Kategori Produk
                </h2>
                <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="row justify-content-center">
                    <div class="row">
                        <?php 
                        $routing = base_url().$link['routing']['product'];
                        foreach($link['product_category'] as $i => $v){
                            $scurl       = $routing.'/'.$v['category_url'];                 
                            $simg       = !empty($v['category_image']) ? base_url().$v['category_image'] : base_url().'upload/noimage.png'; 
                            $stitle     = !empty($v['category_name']) ? substr($v['category_name'],0,25) : 'Untitled';
                            $scontent   = !empty($v['category_short']) ? substr(strip_tags($v['category_short']),0,130) : 'No description available on this cvategory details, please update on admin panel';                                                   
                            ?>                    
                                <div class="col-md-4">
                                    <div class="info-box info-box-img">
                                        <img src="<?php echo $simg; ?>" alt="info-box-image" width="800" height="524">
                                        <div class="info-box-content" style="padding-top:20px;">
                                            <h4 class="<?php echo $theme_text?>"><?php echo $stitle; ?></h4>
                                            <p style="font-family:Poppins,sans-serif!important;" class="<?php echo $theme_text?>"><?php echo $scontent; ?>
                                                <br><br><a href="<?php echo $scurl;?>" style="color:black;" class="<?php echo $theme_text?>">Lihat Selengkapnya <i class="fas fa-greater-than" style="font-size:1rem;color:black;"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    <!-- Kategori Produk -->
    <section class="section-elements new-products-section <?php echo $theme; ?>">
        <div class="container">
            <h2 class="heading-bottom-border text-center <?php echo $theme_text; ?> text-uppercase mt-5">
                Produk Megadata
            </h2>
            <p class="text-center <?php echo $theme_text; ?> mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">
                <?php 
                    if(!empty($link['product_category'])){
                        $routing = base_url().$link['routing']['product'];
                        foreach($link['product_category'] as $v){ 
                            $scurl       = $routing.'/'.$v['category_url'];  
                            $simg       = !empty($v['category_image']) ? base_url().$v['category_image'] : base_url().'upload/noimage.png'; 
                            ?>
                            <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                                <a href="<?php echo $scurl; ?>">
                                    <figure>
                                        <img src="<?php echo $simg; ?>" alt="category" width="280" height="240" style="width:100%;height:240px;"/>
                                    </figure>
                                    <div class="category-content">
                                        <h3 class="<?php echo $theme_text; ?>"><?php echo $v['category_name']; ?></h3>
                                        <span class="<?php echo $theme_text; ?>"></span>
                                    </div>
                                </a>
                            </div>                    
                            <?php 
                        }
                    }
                ?>   
            </div>            
        </div>
    </section>

    <!-- Portofolio -->
    <section class="section-elements blog-section pb-0">
        <div class="container">
            <h2 class="ext-center text-uppercase mt-5 mb-5">
            Mereka yang Mempercayai kami
            </h2>
            <!-- <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
            <div class="brands-slider owl-carousel owl-theme images-center appear-animate" data-animation-name="fadeIn" data-animation-duration="500" data-owl-options="{
            'margin': 0}">
            <?php 
                if(count($link['portofolio']) > 0){
                    // $routing = base_url().$link['routing']['blog'];
                    foreach($link['portofolio'] as $v){

                        // $scurl       = $routing.'/'.$v['category_url'];  
                        // $spurl       = $routing.'/'.$v['category_url'].'/'.$v['news_url'];  
                        $simg       = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url().'upload/noimage.png'; 

                        $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
                        $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this blog details, please update on admin panel';   
                        // $scat       = !empty($v['category_name']) ? $v['category_name'] : 'Uncategory';
                        ?>  
                        <img src="<?php echo $simg; ?>" width="130" height="56" alt="brand">
                    <?php 
                    }
                }
            ?>
            </div>
            <hr class="mt-4 m-b-5">           
        </div>
    </section>

        <!-- Hubungi Kami -->
        <section class="section-elements feature-boxes-container mb-8 <?php echo $theme; ?>" style="">
            <div class="container p-4">
                <h2 class="text-center <?php echo $theme_text; ?>">Hubungi Kami</h2>
                <p class="text-center <?php echo $theme_text; ?> mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="row">
                    <div class="col-lg-6 text-left">
                        <h2 class="mt-6 mb-1 <?php echo $theme_text; ?>">Alamat Kami</h2>
                            <p class="<?php echo $theme_text; ?>">
                            Silahkan hubungi kami untuk pertanyaan dan kerjasama. Kami senang mendengar dari anda.
                            <br>
                            <address class="<?php echo $theme_text; ?>">
                                <i class="fas fa-map-marker"></i> Alamat<br>
                                    <?php echo $link['contact']['address']['office'].', '.$link['contact']['address']['city'];?>
                                    <br><br>
                                <i class="fas fa-inbox"></i> Email<br>
                                    <?php 
                                    if(!empty($link['contact']['email'][0]['email'])){ ?> 
                                        <a href="mailto:<?php echo $link['contact']['email'][0]['email'];?>" target="_blank" class="font1 <?php echo $theme_text; ?>"><?php echo $link['contact']['email'][0]['email'];?>
                                        </a>  
                                    <?php 
                                    } else {
                                        echo '-';
                                    }
                                    ?>   <br><br>
                                <i class="fas fa-phone"></i> Telepon<br>
                                    <?php 
                                    if(!empty($link['contact']['phone'][0]['phone'])){ ?> 
                                        <a href="tel:<?php echo $link['contact']['phone'][0]['phone'];?>" target="_blank" class="font1 <?php echo $theme_text; ?>"><?php echo $link['contact']['phone'][0]['phone'];?>
                                        </a>  
                                    <?php 
                                    } else {
                                        echo '-';
                                    }
                                    ?><br><br>       
                                <i class="fab fa-whatsapp"></i> WhatsApp<br>
                                    <?php 
                                    if(!empty($link['contact']['phone'][1]['phone'])){ ?> 
                                        <a href="https://wa.me/<?php echo $link['contact']['phone'][1]['phone'];?>?text=Halo,%20saya%20tertarik%20dengan%20informasi%20produk%20Mega%20Data%20" target="_blank" class="font1 <?php echo $theme_text; ?>"><?php echo $link['contact']['phone'][1]['phone'];?>
                                        </a>  
                                    <?php 
                                    } else {
                                        echo '-';
                                    }
                                    ?>     
                            </address>                        
                            <!-- Ikuti<br>
                            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                            </p> -->
                    </div>

                    <div class="col-lg-6">
                        <h2 class="mt-6 mb-2 <?php echo $theme_text; ?>">Kirim Pesan</h2>

                        <form id="form_contact" name="form_contact" class="mb-0" action="#">
                            <div class="form-group text-left">
                                <label class="mb-1 <?php echo $theme_text; ?>" for="contact-name">Nama Anda
                                    <span class="required">*</span></label>
                                <input id="contact_name" name="contact_name" type="text" class="form-control" required />
                            </div>
                            <div class="form-group text-left">
                                <label class="mb-1 <?php echo $theme_text; ?>" for="contact-phone">Nomor Telepon / WhatsApp
                                    <span class="required">*</span></label>
                                <input id="contact_phone" name="contact_phone" type="email" class="form-control" required />
                            </div>
                            <div class="form-group text-left">
                                <label class="mb-1 <?php echo $theme_text; ?>" for="contact-email">Email
                                    <span class="required">*</span></label>
                                <input id="contact_email" name="contact_email" type="email" class="form-control" required />
                            </div>

                            <div class="form-group text-left">
                                <label class="mb-1 <?php echo $theme_text; ?>" for="contact-message">Isi Pesan
                                    <span class="required">*</span></label>
                                <textarea cols="30" rows="1" id="contact_message" class="form-control"
                                    name="contact_message" required></textarea>
                            </div>

                            <div class="form-footer mb-0">
                                <button id="btn_form_contact_send" type="button" class="btn btn-primary font-weight-normal">
                                    Kirim
                                </button>
                            </div>
                        </form>
                    </div>                                             
                </div>
            </div>
        </section>

        <!-- Proyek Terkini -->
        <section class="creative-section mt-5">
            <h2 class="heading-bottom-border text-center text-uppercase mt-5">
                Proyek Terkini
            </h2>
            <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="creative-grid grid row" style="margin-bottom:1240px;">
                <?php
                $cl = [
                    "col-md-6 col-12 product-category content-left-bottom hidden-count overlay-darker grid-item height-400",
                    "col-md-3 col-sm-6 col-12 product-category content-left-bottom hidden-count overlay-darker grid-item height-300",
                    "col-md-3 col-sm-6 col-12 product-category content-left-bottom hidden-count overlay-darker grid-item height-600",
                    "col-md-3 col-sm-6 col-12 product-category content-left-bottom hidden-count overlay-darker order-md-1 grid-item height-300",
                    "col-md-3 col-sm-6 col-12 product-category content-left-bottom hidden-count overlay-darker order-md-1 grid-item height-300",                        
                    "col-md-3 col-12 product-category content-left-bottom hidden-count overlay-darker grid-item height-200"
                ];

                if(count($link['project']) > 0){
                    $routing = base_url().$link['routing']['project'];                              
                    foreach($link['project'] as $i => $v){
                        $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
                        $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this cvategory details, please update on admin panel';   
                                                    
                        $surl       = $routing.'/'.$v['news_url'];          
                        $simg = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url('upload/noimage.png'); 
                
                        ?>
                        <div class="<?php echo $cl[$i]; ?>">
                            <a href="<?php echo $surl;?>">
                                <figure>
                                    <!-- <img src="<?php echo $simg; ?>" width="800" height="800" alt="category"> -->
                                </figure>
                                <div class="category-content">
                                    <h3><?php echo $stitle;?></h3>
                                    <span><mark class="count">5</mark> gambar</span>
                                </div>
                            </a>
                        </div>
                        <?php 
                    }
                }
                ?>
                <div class="col-1 grid-col-sizer"></div>
            </div>
            <div class="clearfix"></div>
        </section>

        <!-- Blog -->
        <section class="blog-section pb-0">
            <div class="container">
                <h2 class="heading-bottom-border text-center text-uppercase mt-5">
                    Blog Terkini
                </h2>
                <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeIn" data-owl-options="{
                    'loop': false,
                    'margin': 20,
                    'autoHeight': true,
                    'autoplay': false,
                    'dots': false,
                    'items': 2,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '480': {
                            'items': 2
                        },
                        '576': {
                            'items': 3
                        },
                        '768': {
                            'items': 4
                        }
                    }
                    }">
                    <?php 
                        if(count($link['blog']) > 0){
                            $routing = base_url().$link['routing']['blog'];
                            foreach($link['blog'] as $v){

                                $scurl       = $routing.'/'.$v['category_url'];  
                                $spurl       = $routing.'/'.$v['category_url'].'/'.$v['news_url'];  
                                $simg       = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url().'upload/noimage.png'; 

                                $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,125) : 'Untitled';
                                $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this blog details, please update on admin panel';   
                                $scat       = !empty($v['category_name']) ? $v['category_name'] : 'Uncategory';
                                ?>          
                                <article class="post">
                                    <div class="post-media">
                                        <a href="<?php echo $spurl;?>">
                                            <img src="<?php echo $simg;?>" alt="<?php echo $title; ?>" width="220px" height="220px" style="width:100%;height:220px;">
                                        </a>
                                        <div class="post-date">
                                            <span class="day"><?php echo date("d",strtotime($v['news_date_created']));?></span>
                                            <span class="month"><?php echo date("M",strtotime($v['news_date_created']));?></span>
                                        </div>
                                    </div>

                                    <div class="post-body">
                                        <h2 class="post-title">
                                            <a href="<?php echo $spurl;?>"><?php echo $stitle; ?></a>
                                        </h2>
                                        <div class="post-content">
                                            <p><?php echo $scontent; ?></p>
                                        </div>
                                        <a href="<?php echo $scurl;?>" class="post-comment"><?php echo $scat;?></a>
                                    </div>
                                </article>  
                                <?php 
                            }
                        }
                    ?>          
                </div>
            </div>
        </section>
        
        <!-- Other Component -->
        <section class="blog-section pb-0">
            <div class="container">
                <h2 class="heading-bottom-border text-center text-uppercase mt-5">
                    Other Component
                </h2>
                <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                <!-- Card Info -->
                <div class="info-boxes-slider owl-carousel owl-theme mb-2 mt-2" data-owl-options="{
                        'dots': false,
                        'loop': false,
                        'responsive': {
                            '576': {
                                'items': 2
                            },
                            '992': {
                                'items': 3
                            }
                        }
                    }">
                    <div class="info-box info-box-icon-left">
                        <i class="icon-shipping"></i>
                        <div class="info-box-content">
                            <h4>Kualitas Nomor Satu</h4>
                            <p class="text-body">Beli Satu / Lebih kami tetap layani dengan tulus dan sepenuh hati</p>
                        </div>
                    </div>
                    <div class="info-box info-box-icon-left">
                        <i class="icon-star-empty"></i>
                        <div class="info-box-content">
                            <h4>Garansi Barang Terbaik</h4>
                            <p class="text-body">100% barang dikirim setelah melalui QC dengan prosedur ketat</p>
                        </div>
                    </div>
                    <div class="info-box info-box-icon-left">
                        <i class="icon-earphones-alt"></i>
                        <div class="info-box-content">
                            <h4>Layanan Pelanggan</h4>
                            <p class="text-body">Tim kami akan sigap senantiasa melayani keluhan pelanggan</p>
                        </div>
                    </div>
                </div>
                <!-- Desain Info -->                
                <div class="banners-container mb-2">
                    <div class="banners-slider owl-carousel owl-theme" data-owl-options="{'dots': false}">
                        <div class="banner banner1 banner-sm-vw d-flex align-items-center appear-animate" style="background-color: #ccc;" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                            <figure class="w-100">
                                <img src="<?php echo $asset; ?>assets/images/demoes/demo4/banners/banner-1.jpg" alt="banner" width="380" height="175" />
                            </figure>
                            <div class="banner-layer">
                                <h3 class="m-b-2">Porto Watches</h3>
                                <h4 class="m-b-3 text-primary"><sup class="text-dark"><del>20%</del></sup>30%<sup>OFF</sup></h4>
                                <a href="category.html" class="btn btn-sm btn-dark">Shop Now</a>
                            </div>
                        </div>
                        <div class="banner banner2 banner-sm-vw text-uppercase d-flex align-items-center appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                            <figure class="w-100">
                                <img src="<?php echo $asset; ?>assets/images/demoes/demo4/banners/banner-2.jpg" style="background-color: #ccc;" alt="banner" width="380" height="175" />
                            </figure>
                            <div class="banner-layer text-center">
                                <div class="row align-items-lg-center">
                                    <div class="col-lg-7 text-lg-right">
                                        <h3>Deal Promos</h3>
                                        <h4 class="pb-4 pb-lg-0 mb-0 text-body">Starting at $99</h4>
                                    </div>
                                    <div class="col-lg-5 text-lg-left px-0 px-xl-3">
                                        <a href="category.html" class="btn btn-sm btn-dark">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="banner banner3 banner-sm-vw d-flex align-items-center appear-animate" style="background-color: #ccc;" data-animation-name="fadeInRightShorter" data-animation-delay="500">
                            <figure class="w-100">
                                <img src="<?php echo $asset; ?>assets/images/demoes/demo4/banners/banner-3.jpg" alt="banner" width="380" height="175" />
                            </figure>
                            <div class="banner-layer text-right">
                                <h3 class="m-b-2">Handbags</h3>
                                <h4 class="m-b-2 text-secondary text-uppercase">Starting at $99</h4>
                                <a href="category.html" class="btn btn-sm btn-dark">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="product-widgets-container row pb-2">
                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                        <h4 class="section-sub-title">Featured Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-4.jpg" width="84" height="84" alt="product">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-4-2.jpg" width="84" height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Blue Backpack for the Young -
                                        S</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-5.jpg" width="84" height="84" alt="product">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-5-2.jpg" width="84" height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Casual Spring Blue Shoes</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                            </div>
                        </div>                    
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                        <h4 class="section-sub-title">Best Selling Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-4.jpg" width="84" height="84" alt="product">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-4-2.jpg" width="84" height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Blue Backpack for the Young -
                                        S</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-5.jpg" width="84" height="84" alt="product">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-5-2.jpg" width="84" height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Casual Spring Blue Shoes</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                            </div>
                        </div>     
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="800">
                        <h4 class="section-sub-title">Latest Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-4.jpg" width="84" height="84" alt="product">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-4-2.jpg" width="84" height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Blue Backpack for the Young -
                                        S</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-5.jpg" width="84" height="84" alt="product">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-5-2.jpg" width="84" height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Casual Spring Blue Shoes</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                            </div>
                        </div>     
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="1100">
                        <h4 class="section-sub-title">Top Rated Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-4.jpg" width="84" height="84" alt="product">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-4-2.jpg" width="84" height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Blue Backpack for the Young -
                                        S</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-5.jpg" width="84" height="84" alt="product">
                                    <img src="<?php echo $asset; ?>assets/images/products/small/product-5-2.jpg" width="84" height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Casual Spring Blue Shoes</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                            </div>
                        </div>     
                    </div>
                </div>
                <div class="container appear-animate" data-animation-name="fadeInUpShorter">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-box px-sm-5 feature-box-simple text-center">
                                <div class="feature-box-icon">
                                    <i class="icon-earphones-alt"></i>
                                </div>

                                <div class="feature-box-content p-0">
                                    <h3>Customer Support</h3>
                                    <h5>You Won't Be Alone</h5>

                                    <p>We really care about you and your website as much as you do. Purchasing Porto or any other theme from us you get 100% free support.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box px-sm-5 feature-box-simple text-center">
                                <div class="feature-box-icon">
                                    <i class="icon-credit-card"></i>
                                </div>

                                <div class="feature-box-content p-0">
                                    <h3>Fully Customizable</h3>
                                    <h5>Tons Of Options</h5>

                                    <p>With Porto you can customize the layout, colors and styles within only a few minutes. Start creating an amazing website right now!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box px-sm-5 feature-box-simple text-center">
                                <div class="feature-box-icon">
                                    <i class="icon-action-undo"></i>
                                </div>
                                <div class="feature-box-content p-0">
                                    <h3>Powerful Admin</h3>
                                    <h5>Made To Help You</h5>

                                    <p>Porto has very powerful admin features to help customer to build their own shop in minutes without any special skills in web development.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </section>
        <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="<?php echo base_url(); ?>upload/banner-5.png">
            <div class="promo-banner banner container text-uppercase">
                <div class="banner-content row align-items-center text-center">
                    <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                        <h2 class="mb-md-0 text-white">Kunjungi Show Room Kami</h2>
                    </div>
                    <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn" data-animation-delay="300">
                        <a href="https://maps.app.goo.gl/SfDAvN2keYuhirgp8" class="btn btn-dark btn-black ls-10">Petunjuk Arah</a>
                    </div>
                    <div class="col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="600">
                        <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">
                            <b>Dapatkan Penawaran Menarik</b></h4>
                        <h5 class="mb-1 coupon-sale-text text-white ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-white bg-secondary ls-n-10">10%</b> OFF</h5>
                    </div>
                </div>
            </div>
        </section>
        <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="<?php echo $asset; ?>assets/images/demoes/demo4/banners/banner-4.jpg">
            <div class="promo-banner banner container text-uppercase">
                <div class="banner-content row align-items-center mx-0">
                    <div class="col-md-9 col-sm-8">
                        <h2 class="text-white text-uppercase text-center text-sm-left ls-n-20 mb-md-0 px-4">
                            <b class="d-inline-block mr-3 mb-1 mb-md-0">Big Sale</b> All new fashion brands items up to 70% off
                            <small class="text-transform-none align-middle">Online Purchases Only</small>
                        </h2>
                    </div>
                    <div class="col-md-3 col-sm-4 text-center text-sm-right">
                        <a class="btn btn-light btn-white btn-lg" href="category.html">View Sale</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Kami -->
        <div class="section-elements" style="background: #f1f1fd;">
            <div class="container">
                <h2 class="text-center"><?php echo (count($link['gallery'])>0) ? $link['gallery'][0]['news_title'] : ""; ?></h2>
                <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>             
                <div class="row justify-content-center">
                    <?php 
                    if(count($link['gallery']) > 0){
                        foreach($link['gallery'] as $v){
                            $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
                            $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this cvategory details, please update on admin panel';   
                                                        
                            $surl   = base_url().$v['news_url'];  
                            $simg   = base_url().$v['file_url']; 

                            if(!empty($v['news_url']) or !empty($v['file_url'])){
                                $simg = base_url('upload/noimage.png');
                            }
                            ?>
                            <div class="col-md-4 mb-4">
                                <div class="info-box info-box-img">
                                    <img src="<?php echo $simg;?>" style="border-radius:20px;" alt="<?php echo $stitle;?>">
                                    <div class="info-box-content">
                                    </div>
                                </div>
                            </div>
                            <?php 
                        }
                    }
                    ?>                              
                </div>
            </div>
        </div>

        <!-- Tanya Gratis -->
        <div class="section-elements bg-dark">
            <div class="container">
                <h2 class="text-center text-white">Tanya Gratis</h2>
                <p class="text-center text-white mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>             
                <div class="row justify-content-center">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-2">
                            </div>
                            <div class="col-lg-8">
                                <div class="cta-simple cta-border">
                                    <h4 class="elements text-white">Tanya Gratis Kepada Kami</h4>
                                    <p class="text-white">Konsultasikan kebutuhan anda dengan pakar kami</p>
                                    <div class="btn btn-primary btn-ellipse btn-xl mt-2">
                                        <a class="" href="<?php echo $link['contact_us'];?>" style="color:white;">Hubungi Kami</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
</main>