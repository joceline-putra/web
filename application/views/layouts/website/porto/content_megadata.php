<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<?php 
$theme = 'bg-dark2';
$theme_text = 'text-white';
?>
<style>
    /* Typewriter */
    .cursor{
        position: relative;
        width: 24em;
        margin: 0 auto;
        border-right: 2px solid rgba(255,255,255,.75);
        font-size: 30px;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        transform: translateY(-50%);    
    }
    /* Animation */
    .typewriter-animation {
    animation: 
        typewriter 5s steps(50) 1s 1 normal both, 
        blinkingCursor 500ms steps(50) infinite normal;
    }
    @keyframes typewriter {
    from { width: 0; }
    to { width: 100%; }
    }
    @keyframes blinkingCursor{
    from { border-right-color: rgba(255,255,255,.75); }
    to { border-right-color: transparent; }
    }


    .line-animation {
        position: relative;
        overflow: hidden;
        background: #000;
        padding: 20px 0;
        margin-bottom: 30px;
    }
    .neon-container {
        position: relative;
        overflow: hidden;
        background: #000;
        padding: 20px 0;
        margin-bottom: 30px;
    }
    .animated-line {
        position: absolute;
        width: 100%;
        height: 2px;
        background: linear-gradient(to right, #007bff, #00ff00);
        animation: lineMove 2s infinite;
    }

    .fast-text {
        text-align: center;
        color: white;
        font-size: 2.5em;
        font-weight: bold;
        opacity: 0;
        animation: textFade 2s forwards;
    }

    @keyframes lineMove {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(100%);
        }
    }

    @keyframes textFade {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }


    .motto-container {
        background: linear-gradient(45deg, #000428, #004e92);
        padding: 40px 0;
        text-align: center;
        margin-bottom: 30px;
    }

    .motto-primary {
        font-size: 3em;
        font-weight: 800;
        color: #fff;
        text-transform: uppercase;
        margin-bottom: 15px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .motto-secondary {
        font-size: 1.8em;
        color: #00ffff;
        font-weight: 500;
        margin-bottom: 10px;
    }

    .motto-description {
        color: #fff;
        font-size: 1.2em;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .fade-in-up {
        animation: fadeInUp 1s ease-out;
    }

    /* Neon */
    .neon-text {
        font-size: 4rem;
        color: #fff;
        text-shadow: 0 0 5px #ff005e, 0 0 10px #ff005e, 0 0 20px #ff005e, 0 0 40px #ff005e, 0 0 80px #ff005e;
        animation: glow 1.5s infinite alternate;
    }

    @keyframes glow {
        0% {
            text-shadow: 0 0 5px #ff005e, 0 0 10px #ff005e, 0 0 20px #ff005e, 0 0 40px #ff005e, 0 0 80px #ff005e;
        }
        100% {
            text-shadow: 0 0 10px #00d4ff, 0 0 20px #00d4ff, 0 0 40px #00d4ff, 0 0 80px #00d4ff, 0 0 160px #00d4ff;
        }
    }          
</style>
<main class="main">
    <!-- <div class="motto-container">
        <div class="fade-in-up">
            <h1 class="motto-primary">Kecepatan Tanpa Batas</h1>
            <p class="motto-description">
                Koneksi Super Cepat | Stabilitas Maksimal | Layanan 24/7<br>
                Menjadi Mitra Terpercaya dalam Perjalanan Digital Anda
            </p>
        </div>
    </div> -->

    <!-- <div class="neon-container">
        <h1 class="neon-text">NEON GLOW</h1>
    </div> -->
    <section class="entire-banner">
        <!-- <h3 class="text-center">Entrance Effect for Entire and Individuals</h3> -->
        <!-- <p class="text-center mx-auto mb-3 px-5">Now we provide lots of animations in banner and other elements.
            It
            makes your site more beautiful than ever before. Please purchase Porto without hesitation.
        </p> -->
        <!-- <p class="cursor typewriter-animation">Koneksi Super Cepat | Stabilitas Maksimal | Layanan 24/7</p> -->

        <div class="owl-carousel owl-theme show-nav-hover slide-animate owl-loaded owl-drag" data-owl-options="{
            'dots': false,'nav': true,'loop': true
            }">
               
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: 0.25s; width: 3267px;">
                    <div class="owl-item active" style="width: 1633.33px;">
                        <div class="banner banner1">
                            <figure>
                                <img width="1920" height="580" src="<?php echo site_url();?>upload/web/map5.png" style="background:#d8dce5;min-height:36rem;" alt="banner">
                            </figure>
                            <div class="container align-items-center d-flex">
                                <div class="banner-layer">
                                    <!-- <h4 class="banner-subtitle appear-animate fadeInUpShorter animated appear-animation-visible" data-animation-name="fadeInUpShorter" data-animation-delay="200" style="animation-delay: 200ms; animation-duration: 1000ms;">Find
                                        the Boundaries. Push Through!</h4>
                                    <h3 class="banner-title appear-animate fadeInUpShorter animated appear-animation-visible" data-animation-name="fadeInUpShorter" data-animation-delay="400" style="animation-delay: 400ms; animation-duration: 1000ms;">
                                        Sunglasses
                                    </h3> -->

                                    <!-- <img class="box-border appear-animate fadeInLeftShorter animated appear-animation-visible" data-animation-name="fadeInLeftShorter" data-animation-delay="700" src="assets/images/elements/banners/icon1.png" width="260" height="26" alt="icon" style="animation-delay: 700ms; animation-duration: 1000ms;"> -->
                                    <!-- <div class="d-flex justify-content-between">
                                        <a href="#" data-animation-name="fadeInRightShorter" data-animation-delay="900" class="btn btn-dark appear-animate fadeInRightShorter animated appear-animation-visible" role="button" style="animation-delay: 900ms; animation-duration: 1000ms;">Shop Now!</a>
                                        <h5 class="d-inline-block mb-0 appear-animate fadeInLeftShorter animated appear-animation-visible" data-animation-name="fadeInLeftShorter" data-animation-delay="1100" style="animation-delay: 1100ms; animation-duration: 1000ms;">
                                            <span class="text-uppercase">Starting At</span>
                                            <b class="coupon-sale-text text-white align-middle">$<em class="align-text-top">99</em>99</b>
                                        </h5>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-item" style="width: 1633.33px;">
                        <div class="banner banner2">
                            <figure>
                                <img width="1920" height="580" src="<?php echo site_url();?>upload/web/map5-1.png" style="background:#d8dce5;min-height:36rem;" alt="banner">
                            </figure>
                            <div class="container align-items-center d-flex">
                                <!-- <div class="banner-layer">
                                    <h4 class="banner-subtitle appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200" style="">Take Your Chill Up a Level</h4>
                                    <h3 class="banner-title appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="400" style="">Casual Wear</h3>

                                    <img class="box-border appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="500" src="assets/images/elements/banners/icon1.png" width="260" height="26" alt="icon" style="">
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="btn btn-dark appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="800" role="button" style="">Shop Now!</a>
                                        <h5 class="d-inline-block mb-0 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="1000" style="">
                                            <span class="text-uppercase">Starting At</span>
                                            <b class="coupon-sale-text text-white align-middle">$<em class="align-text-top">99</em>99</b>
                                        </h5>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-nav">
                <button type="button" title="nav" role="presentation" class="owl-prev disabled"><i class="icon-angle-left"></i>
                </button>
                <button type="button" title="nav" role="presentation" class="owl-next"><i class="icon-angle-right"></i>
                </button>
            </div>
            <div class="owl-dots disabled">
            </div>
        </div>
    </section>
    <div class="line-animation">
        <div class="animated-line"></div>
        <h1 class="neon-text" style="text-align:center;">FAST INTERNET CONNECTION</h1>
    </div>
        

    <section class="d-none hover-section"> <!-- mt-8 -->
        <!-- <h3 class="text-center">Jaringan Megadata ISP</h3>
        <p class="text-center mx-auto mb-3">Peta Lokasi Persebaran</p> -->
        <div class="owl-carousel owl-theme show-nav-hover slide-animate owl-loaded owl-drag" data-owl-options="{
            'dots': false,
            'nav': true,
            'loop': false
        }">
            
            
        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all; width: 3267px;"><div class="owl-item active" style="width: 1633.33px;"><div class="banner banner3">
                <figure>
                    <img width="1920" height="700" src="https://kepoo.in/app/megadata/upload/web/map1.png" style="background:#f6e1e8;min-height:36rem;" alt="banner">
                    <div class="snowfall particle-effect"></div>
                </figure>

                <div class="banner-layer banner-layer-middle">
                    <div class="appear-animate text-center animated fadeInRightShorter appear-animation-visible" data-animation-name="fadeInRightShorter" style="animation-duration: 1000ms;">
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
            </div></div><div class="owl-item" style="width: 1633.33px;"><div class="banner banner4">
                <figure>
                    <img width="1920" height="700" src="https://kepoo.in/app/megadata/upload/web/map2.png" style="background:#f6e1e8;min-height:36rem;" alt="banner">
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
            </div></div></div></div><div class="owl-nav"><button type="button" title="nav" role="presentation" class="owl-prev disabled"><i class="icon-angle-left"></i></button><button type="button" title="nav" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button></div><div class="owl-dots disabled"></div></div>
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

    <!-- Kategori Produk -->
    <section class="section-elements new-products-section <?php echo $theme; ?>">
        <div class="container">
            <h2 class="text-center <?php echo $theme_text; ?> text-uppercase mt-5 mb-5">
                Produk
            </h2>
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
        <div class="container mb-5">
            <h2 class="ext-center text-uppercase mt-5 mb-5">
            Mereka yang Mempercayai kami
            </h2>
            <!-- <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
            <div class="d-block d-sm-none brands-slider owl-carousel owl-theme images-center appear-animate" data-animation-name="fadeIn" data-animation-duration="500" data-owl-options="{
            'margin': 0}">
                <?php 
                    if(count($link['portofolio']) > 0){
                        foreach($link['portofolio'] as $v){
                            $simg       = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url().'upload/noimage.png'; 
                            $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
                            $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this blog details, please update on admin panel';   
                            ?>  
                            <img src="<?php echo $simg; ?>" width="130" height="56" alt="brand">
                        <?php 
                        }
                    }
                ?>
            </div>     
            
            <div class="row justify-content-center d-none d-md-flex">
                <?php 
                if(count($link['portofolio']) > 0){
                    foreach($link['portofolio'] as $v){
                        $simg       = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url().'upload/noimage.png'; 
                        $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
                        $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this blog details, please update on admin panel';   
                        ?>  
                        <div class="col-sm-3 col-md-2 col-lg-2">
                            <div class="banner overlay-effect1 mb-3">
                                <figure>
                                    <img src="<?php echo $simg; ?>" alt="element-banner" style="width:70%;"></figure>
                                <div class="banner-layer banner-layer-middle text-center">
                                    <h3 class="text-white mb-0"></h3>
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