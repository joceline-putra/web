<style>
.main-nav .menu>li.active>a,.main-nav .menu>li>a:hover {
    border-top-color: #ffffff;
}
.menu>li.active>a,.menu>li.show>a,.menu>li:hover>a {
    color: #ffffff;
    background: transparent
}
.menu>li>a {
    padding: 1rem 0;
    font-size: 13px;
    font-weight: 400;
    color: #ffffff
}
.home-slide1 .banner-layer {
    left: 0;
    right: 0;
}
</style>
<header class="header" style="z-index:99999;">
    <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
        <div class="container">
            <div class="header-left col-lg-3 w-auto pl-0">
                <button class="mobile-menu-toggler text-primary mr-2" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="<?php echo $link['home']; ?>" style="color:white;font-weight:800;font-size:larger;"><?php echo $link['brand']; ?>
                    <!-- <img src="<?php echo $asset; ?>assets/images/logo.png" alt="<?php echo $link['brand']; ?> Logo"> -->
                </a>
            </div>
            <div class="header-right w-lg-max">
                <nav class="main-nav w-100" style="padding-left:192px;">
                    <ul class="menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li><a href="<?php echo base_url('tentang-kami');?>">Tentang</a></li>
                        <li><a href="<?php echo base_url('layanan');?>">Layanan</a></li>       
                        <!-- <li>
                            <a href="#">Blogs</a>
                            <ul>
                                <?php 
                                if(!empty($link['article_category'])){
                                    foreach($link['article_category'] as $v){
                                        echo "<li><a href=".site_url().$link['routing']['blog'].'/'.$v['category_url'].">".$v['category_name']."</a>"; 
                                    }
                                }
                                ?>
                            </ul>
                        </li>                                                                  -->
                        <li><a href="#">Blog</a></li>                          
                        <li><a href="<?php echo base_url('contact-us');?>">Kontak</a></li>  
                        <li class="float-right"><a href="#" class="pl-5">Jelajahi Koleksi Kami</a></li>
                    </ul>
                </nav>

                <!-- <div class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">

                </div> -->

                <!-- <div class="header-contact d-none d-lg-flex pl-4 pr-4">
                    <img alt="phone" src="<?php echo $asset; ?>assets/images/phone.png" width="30" height="30" class="pb-1">
                    <h6><span>Call us now</span><a href="tel:<?php echo $link['contact']['phone'][0]['phone'];?>" class="text-dark font1"><?php echo $link['contact']['phone'][0]['phone'];?></a></h6>
                </div> -->

                <!-- <a href="<?php echo $link['signin'];?>" class="header-icon" title="login"><i class="icon-user-2"></i></a>

                <a href="<?php echo $link['wishlist'];?>" class="header-icon" title="wishlist"><i class="icon-wishlist-2"></i></a> -->

                <!-- <div class="dropdown cart-dropdown">
                    <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="minicart-icon"></i>
                        <span class="cart-count badge-circle">3</span>
                    </a>
                    <div class="cart-overlay"></div>
                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">×</a>

                        <div class="dropdownmenu-wrapper custom-scrollbar">
                            <div class="dropdown-cart-header">Shopping Cart</div>
                            <div class="dropdown-cart-products">
                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="<?php echo $link['product'];?>">Ultimate 3D Bluetooth Speaker</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $99.00
                                        </span>
                                    </div>
                                    <figure class="product-image-container">
                                        <a href="<?php echo $link['product'];?>" class="product-image">
                                            <img src="<?php echo $asset; ?>assets/images/products/product-1.jpg" alt="product" width="80" height="80">
                                        </a>

                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="<?php echo $link['product'];?>">Brown Women Casual HandBag</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $35.00
                                        </span>
                                    </div>
                                    <figure class="product-image-container">
                                        <a href="<?php echo $link['product'];?>" class="product-image">
                                            <img src="<?php echo $asset; ?>assets/images/products/product-2.jpg" alt="product" width="80" height="80">
                                        </a>

                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                            </div>
                            <div class="dropdown-cart-total">
                                <span>SUBTOTAL:</span>

                                <span class="cart-total-price float-right">$134.00</span>
                            </div>
                            <div class="dropdown-cart-action">
                                <a href="<?php echo $link['cart'];?>" class="btn btn-gray btn-block view-cart">View
                                    Cart</a>
                                <a href="<?php echo $link['checkout'];?>" class="btn btn-dark btn-block">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</header>
