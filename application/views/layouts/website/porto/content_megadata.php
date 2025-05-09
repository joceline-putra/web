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
                    <img width="1920" height="700" src="<?php echo base_url(); ?>upload/web/map1.png"
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
                    <img width="1920" height="700" src="<?php echo base_url(); ?>upload/web/map2.png"
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