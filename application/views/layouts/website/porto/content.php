<main class="main">

    <div class="d-none home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase" data-owl-options="{'loop': false}">

        <div class="home-slide home-slide2 banner banner-md-vw">
            <img class="slide-bg" style="background-color: #ccc;" width="1903" height="499" src="<?php echo $asset; ?>assets/images/demoes/demo4/slider/slide-1.jpg" alt="slider image">
            <div class="container d-flex align-items-center">
                <div class="banner-layer d-flex justify-content-center appear-animate" data-animation-name="fadeInUpShorter">
                    <div class="mx-auto">
                        <h4 class="m-b-1">Extra</h4>
                        <h3 class="m-b-2">20% off</h3>
                        <h3 class="mb-2 heading-border">Accessories</h3>
                        <h2 class="text-transform-none m-b-4">Summer Sale</h2>
                        <a href="category.html" class="btn btn-block btn-dark">Shop All Sale</a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        if(count($link['blog']) > 0){        
            foreach($link['blog'] as $i => $v){
                echo $v['file_url'];
                $simg       = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url().'upload/noimage.png'; 
                $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
                $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this blog details, please update on admin panel';   

            ?>
            <div class="home-slide home-slide1 banner">
                <img class="slide-bg" src="<?php echo $simg;?>" width="1903" height="499" alt="slider image">
                <div class="container d-flex align-items-center">
                    <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                        <h4 class="text-transform-none m-b-3" style="text-align:center;color:white;"><?php echo $stitle;?></h4>
                        <!-- <h2 class="text-transform-none m-b-3" style="text-align:center;font-family:inherit;">.</h2> -->
                        <?php echo $scontent;?>
                        <p class="text-transform-none m-b-3" style="text-align:center;">
                            <br>
                            <a href="<?php echo base_url('contact-us');?>" class="btn btn-primary btn-lg" style="text-align:center;">Hubungi Kami</a>
                        </p>
                    </div>
                </div>
            </div>
            <?php 
            }
        } 
        ?>
    </div>

    <div class="container">
        <div class="d-none info-boxes-slider owl-carousel owl-theme mb-2" data-owl-options="{
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
                    <h4>Gratis Ongkir</h4>
                    <p class="text-body">Untuk pembelian jumlah banyak</p>
                </div>
            </div>
            <div class="info-box info-box-icon-left">
                <i class="icon-money"></i>
                <div class="info-box-content">
                    <h4>Garansi Barang Terbaik</h4>
                    <p class="text-body">100% barang dikirim setelah QC</p>
                </div>
            </div>
            <div class="info-box info-box-icon-left">
                <i class="icon-support"></i>
                <div class="info-box-content">
                    <h4>Online 24/7</h4>
                    <p class="text-body">8 Jam kerja support</p>
                </div>
            </div>
        </div>
        <div class="d-none banners-container mb-2">
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
    </div>

        <section class="d-none featured-products-section">
            <div class="container">
                <h2 class="section-title heading-border ls-20 border-0">Featured Products</h2>

                <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center" data-owl-options="{
                    'dots': false,
                    'nav': true
                }">
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="product.html">
                                <img src="<?php echo $asset; ?>assets/images/products/product-1.jpg" width="280" height="280" alt="product">
                                <img src="<?php echo $asset; ?>assets/images/products/product-1-2.jpg" width="280" height="280" alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <div class="product-label label-sale">-20%</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="category.html" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="product.html">Ultimate 3D Bluetooth Speaker</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="price-box">
                                <del class="old-price">$59.00</del>
                                <span class="product-price">$49.00</span>
                            </div>
                            <div class="product-action">
                                <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                        class="icon-heart"></i></a>
                                <a href="product.html" class="btn-icon btn-add-cart"><i
                                        class="fa fa-arrow-right"></i><span>SELECT
                                        OPTIONS</span></a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="product.html">
                                <img src="<?php echo $asset; ?>assets/images/products/product-2.jpg" width="280" height="280" alt="product">
                                <img src="<?php echo $asset; ?>assets/images/products/product-2-2.jpg" width="280" height="280" alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <div class="product-label label-sale">-30%</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="category.html" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="product.html">Brown Women Casual HandBag</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="price-box">
                                <del class="old-price">$59.00</del>
                                <span class="product-price">$49.00</span>
                            </div>
                            <div class="product-action">
                                <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                        class="icon-heart"></i></a>
                                <a href="product.html" class="btn-icon btn-add-cart"><i
                                        class="fa fa-arrow-right"></i><span>SELECT
                                        OPTIONS</span></a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="product.html">
                                <img src="<?php echo $asset; ?>assets/images/products/product-3.jpg" width="280" height="280" alt="product">
                                <img src="<?php echo $asset; ?>assets/images/products/product-3-2.jpg" width="280" height="280" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="category.html" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="product.html">Circled Ultimate 3D Speaker</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="price-box">
                                <del class="old-price">$59.00</del>
                                <span class="product-price">$49.00</span>
                            </div>
                            <div class="product-action">
                                <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                        class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="product.html">
                                <img src="<?php echo $asset; ?>assets/images/products/product-4.jpg" width="280" height="280" alt="product">
                                <img src="<?php echo $asset; ?>assets/images/products/product-4-2.jpg" width="280" height="280" alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <div class="product-label label-sale">-40%</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="category.html" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="product.html">Blue Backpack for the Young - S</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="price-box">
                                <del class="old-price">$59.00</del>
                                <span class="product-price">$49.00</span>
                            </div>
                            <div class="product-action">
                                <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                        class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="product.html">
                                <img src="<?php echo $asset; ?>assets/images/products/product-5.jpg" width="280" height="280" alt="product">
                                <img src="<?php echo $asset; ?>assets/images/products/product-5-2.jpg" width="280" height="280" alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <div class="product-label label-sale">-15%</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="category.html" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="product.html">Casual Spring Blue Shoes</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="price-box">
                                <del class="old-price">$59.00</del>
                                <span class="product-price">$49.00</span>
                            </div>
                            <div class="product-action">
                                <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                        class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section class="new-products-section">
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">Produk Baru</h2>

            <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2" data-owl-options="{
                    'dots': false,
                    'nav': true,
                    'responsive': {
                        '992': {
                            'items': 4
                        },
                        '1200': {
                            'items': 5
                        }
                    }
                }">
                <?php 
            if(!empty($link['products'])){                  
                $routing = base_url().$link['routing']['product'];                              
                foreach($link['products'] as $a => $v){ 
                    $scurl       = $routing.'/'.$v['category_url'];  
                    $spurl       = $routing.'/'.$v['category_url'].'/'.$v['product_url'];                      
                    $simg       = !empty($v['product_image']) ? base_url().$v['product_image'] : base_url().'upload/noimage.png'; 

                    $set_price_div = 0;
                    $set_price = !empty($v['product_price_sell']) ? number_format($v['product_price_sell'],0) : '-';
                    ?>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="<?php echo $spurl;?>">
                                <img src="<?php echo $simg;?>" width="220" height="220" alt="product">
                                <img src="<?php echo $simg;?>" width="220" height="220" alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="<?php echo $scurl;?>" class="product-category"><?php echo $v['category_name'];?></a>
                            </div>
                            <h3 class="product-title">
                                <a href="<?php echo $spurl;?>"><?php echo $v['product_name'];?></a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <?php if($set_price_div == 1){?>
                                <div class="price-box">
                                    <!-- <del class="old-price"></del> -->
                                    <span class="product-price"><?php echo $set_price;?></span>
                                </div>
                                <div class="product-action">
                                    <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php 
                } 
            }
                ?>

            </div>

            <div class="d-none banner banner-big-sale appear-animate" data-animation-delay="200" data-animation-name="fadeInUpShorter" style="background: #2A95CB center/cover url('<?php echo $asset; ?>assets/images/demoes/demo4/banners/banner-4.jpg');">
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

        </div>
    </section>

    <section class="new-products-section">
        <div class="container">
            <h2 class="section-title categories-section-title heading-border border-0 ls-0 appear-animate" data-animation-delay="100" data-animation-name="fadeInUpShorter">
                Kategori Produk
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
                                <h3><?php echo $v['category_name']; ?></h3>
                                <span><mark class="count"><?php echo $v['category_count_data']; ?></mark> products</span>
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

        <section class="d-none feature-boxes-container">
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
        </section>

    <section class="d-none promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="<?php echo base_url(); ?>upload/banner-5.png">
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

    <section class="blog-section pb-0">
        <div class="container">
            <h2 class="section-title heading-border border-0 appear-animate" data-animation-name="fadeInUp">
                Blog Terkini
            </h2>

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

                        $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
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

            <hr class="mt-0 m-b-5">
            <h2 class="d-none section-title heading-border border-0 appear-animate" data-animation-name="fadeInUp">
                Mereka yang mempercayai kami
            </h2>
            <div class="d-none brands-slider owl-carousel owl-theme images-center appear-animate" data-animation-name="fadeIn" data-animation-duration="500" data-owl-options="{
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

            <div class="d-none product-widgets-container row pb-2">
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
        </div>
    </section>

        <section class="d-none promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="<?php echo $asset; ?>assets/images/demoes/demo4/banners/banner-4.jpg">
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

        <!-- Kategori Produk -->
        <div class="section-elements" style="background: #ffffff;">
            <div class="container">
                <h5 class="text-primary">Sesuaikan Dengan Kebutuhan</h5>
                <h2 class="mb-5 elements">Kategori Produk</h2>
                <div class="row justify-content-center">
                    <div class="row">
                        <?php 
                        $routing = base_url().$link['routing']['product'];
                        foreach($link['product_category'] as $i => $v){
                            if($i < 3){
                                $scurl       = $routing.'/'.$v['category_url'];                                  
                                // if($v['news_id'] == 46){
                                //     $stitle     = $v['news_title'];
                                //     $scontent   = $v['news_short'];   
                                //     $surl   = base_url().$v['news_url'];  
                                //     $simg = base_url().$v['file_url'];                                      
                                // }
                                $simg       = !empty($v['category_image']) ? base_url().$v['category_image'] : base_url().'upload/noimage.png'; 
                                $stitle     = !empty($v['category_name']) ? substr($v['category_name'],0,25) : 'Untitled';
                                $scontent   = !empty($v['category_short']) ? substr(strip_tags($v['category_short']),0,130) : 'No description available on this cvategory details, please update on admin panel';   
                                                                                    
                            ?>                    
                        <div class="col-md-4">
                            <div class="info-box info-box-img">
                                <img src="<?php echo $simg; ?>" alt="info-box-image" width="800" height="524">
                                <div class="info-box-content" style="padding-top:20px;">
                                    <h4><?php echo $stitle; ?></h4>
                                    <p style="font-family:Poppins,sans-serif!important;"><?php echo $scontent; ?>
                                        <br><br><a href="<?php echo $scurl;?>" style="color:black;">Lihat Selengkapnya <i class="fas fa-greater-than" style="font-size:1rem;color:black;"></i></a>
                                    </p>
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
        </div>

            <!-- Keunggulan Kami -->
            <div class="d-none section-elements" style="background: #f1f1fd;">
                <div class="container">
                    <?php 
                    foreach($link['menu'] as $v){
                        if($v['news_id'] == 46){
                            $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
                            $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this blog details, please update on admin panel';   
                            $surl       = base_url().$v['news_url'];  
                            $simg       = !empty($v['file_url']) ? base_url().$v['file_url'] : base_url().'upload/noimage.png';                                   
                        }
                    }
                    ?>
                    <div class="row justify-content-left">
                        <div class="col-md-5">
                            <div class="info-box info-box-img">
                                <div class="info-box-content">
                                    <h5 class="text-primary"><?php echo $stitle; ?></h5>
                                    <div style="text-align: left;">
                                        <p><?php echo $scontent; ?></p>
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
                </div>
            </div>
            
            <!-- <article class="post">
                <div class="post-media">
                    <a href="single.html">
                        <img src="<?php echo $asset ; ?>assets//images/blog/home/post-2.jpg" alt="Post" width="225" height="280">
                    </a>
                    <div class="post-date">
                        <span class="day">26</span>
                        <span class="month">Feb</span>
                    </div>
                </div>

                <div class="post-body">
                    <h2 class="post-title">
                        <a href="single.html">Fashion Trends</a>
                    </h2>
                    <div class="post-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non
                            placerat mi.
                            Etiam non tellus sem. Aenean...</p>
                    </div>
                    <a href="single.html" class="post-comment">0 Comments</a>
                </div>
            </article>
            -->

            <!-- Tentang Kami --> 
            <div class="section-elements" style="background: #ffffff;">
                <div class="container">
                    <?php 
                    foreach($link['menu'] as $v){
                        if($v['news_id'] == 1){
                            $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
                            $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this blog details, please update on admin panel';   
                            $surl       = base_url().$v['news_url'];  
                            $simg       = !empty($v['file_url']) ? base_url().$v['file_url'] : base_url().'upload/noimage.png';                              
                        }
                    }
                    ?>
                    <div class="row justify-content-left">
                        <div class="col-md-7">
                            <div class="info-box info-box-img">
                                <img src="<?php echo $simg;?>" alt="info-box-image" style="border-radius:20px;">
                            </div>
                        </div> 
                        <div class="col-md-5">
                            <div class="info-box info-box-img">
                                <div class="info-box-content">
                                    <h5 class="text-primary" style="text-align: left;"><?php echo $stitle; ?></h5>
                                    <div style="text-align: left;">
                                        <p><?php echo $scontent; ?></p>
                                        <br>
                                        <div class="btn btn-primary btn-ellipse btn-md mt-2"><a href="<?php echo $surl;?>" style="color:white;">Baca Selengkapnya</a></div>
                                    </div>  
                                </div>
                            </div>
                        </div>               
                    </div>
                </div>
            </div>

        <!-- Gallery Kami -->
        <div class="section-elements" style="background: #f1f1fd;">
            <div class="container">
                <h5 class="text-primary">Gallery Kami</h5>
                <h2 class="mb-5 elements">Beragam HPL Yutai</h2>
                <div class="row justify-content-center">
                    <?php 
                    foreach($link['gallery'] as $v){
                            $stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
                            $scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this cvategory details, please update on admin panel';   
                                                        
                            $surl   = base_url().$v['news_url'];  
                            $simg = base_url().$v['file_url']; 
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
                    ?>                              
                </div>
            </div>
        </div>

        <!-- Bergabunglah dalam melestarikan Batik Nusantara -->
        <div class="section-elements" style="background: #ffffff;">
            <div class="container">
                <!-- <h4 class="elements">Bergabunglah dalam melestarikan Batik Nusantara</h4> -->
                <!-- <p class="mb-5">Daftar sekarang untuk mendapatkan update dan promosi terbaru dari koleksi batik kami</p> -->
                <div class="row justify-content-center">
                    <div class="">
                        <!-- <h3>Small</h3> -->
                        <div class="row">
                            <div class="col-lg-2">
                            </div>
                            <div class="col-lg-8">
                                <div class="cta-simple cta-border">
                                    <h4 class="elements">Tanya Gratis Kepada Kami</h4>
                                    <p>Konsultasikan kebutuhan anda dengan pakar kami</p>
                                    <div class="btn btn-primary btn-ellipse btn-md mt-2"><a href="<?php echo $link['contact_us'];?>" style="color:white;">Hubungi Kami</a></div>
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