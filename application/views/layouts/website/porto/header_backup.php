<header class="header">
    <div class="header-top" style="">
        <div class="container">
            <div class="header-left d-none d-sm-block">
                <p class="top-message text-uppercase"><?php echo $link['brand']; ?>, <?php echo $link['contact']['address']['office']; ?></p>
            </div>
            <div class="header-right header-dropdowns ml-0 ml-sm-auto w-sm-100">
                <div class="header-dropdown dropdown-expanded d-none d-lg-block">
                    <a href="#">Links</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="<?php echo $link['account']; ?>">My Account</a></li>
                            <li><a href="<?php echo $link['about']; ?>">About Us</a></li>
                            <li><a href="<?php echo $link['articles']; ?>">Blog</a></li>
                            <li><a href="<?php echo $link['wishlist']; ?>">My Wishlist</a></li>
                            <li><a href="<?php echo $link['cart']; ?>">Cart</a></li>
                            <li><a href="<?php echo $link['signin']; ?>" class="login-link">Log In</a></li>
                        </ul>
                    </div>
                </div>
                <span class="separator"></span>

                <div class="header-dropdown">
                    <a href="#"><i class="flag-id flag"></i>ID</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#"><i class="flag-id flag mr-2"></i>ID</a>
                            </li>
                            <li><a href="#"><i class="flag-us flag mr-2"></i>ENG</a></li>
                        </ul>
                    </div>
                </div>
                <div class="header-dropdown mr-auto mr-sm-3 mr-md-0">
                    <a href="#">IDR</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">IDR</a></li>
                            <li><a href="#">USD</a></li>
                        </ul>
                    </div>
                </div>
                <span class="separator"></span>

                <div class="social-icons">
                    <?php 
                        if(!empty($link)){
                            foreach($link['social'] as $v){
                            ?>
                                <a href="#" target="_blank"><span style="font-size:18px;" class="<?php echo $v['icon'];?>"></span></a>
                            <?php 
                            }
                            
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
        <div class="container">
            <div class="header-left col-lg-2 w-auto pl-0">
                <button class="mobile-menu-toggler text-primary mr-2" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="<?php echo $link['home']; ?>" class="logo">
                    <img src="<?php echo $asset; ?>assets/images/logo.png" width="111" height="44" alt="<?php echo $link['brand']; ?> Logo">
                </a>
            </div>
            <div class="header-right w-lg-max">
                <div class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="">All Categories</option>
                                    <!-- <option value="4">Fashion</option>
                                    <option value="12">- Women</option>
                                    <option value="13">- Men</option>
                                    <option value="66">- Jewellery</option>
                                    <option value="67">- Kids Fashion</option>
                                    <option value="5">Electronics</option>
                                    <option value="21">- Smart TVs</option>
                                    <option value="22">- Cameras</option>
                                    <option value="63">- Games</option>
                                    <option value="7">Home &amp; Garden</option>
                                    <option value="11">Motors</option>
                                    <option value="31">- Cars and Trucks</option>
                                    <option value="32">- Motorcycles &amp; Powersports</option>
                                    <option value="33">- Parts &amp; Accessories</option>
                                    <option value="34">- Boats</option>
                                    <option value="57">- Auto Tools &amp; Supplies</option> -->
                                </select>
                            </div>
                            <!-- End .select-custom -->
                            <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>

                <div class="header-contact d-none d-lg-flex pl-4 pr-4">
                    <img alt="phone" src="<?php echo $asset; ?>assets/images/phone.png" width="30" height="30" class="pb-1">
                    <h6><span>Call us now</span><a href="tel:<?php echo $link['contact']['phone'][0]['phone'];?>" class="text-dark font1"><?php echo $link['contact']['phone'][0]['phone'];?></a></h6>
                </div>

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
    <div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
        <div class="container">
            <nav class="main-nav w-100">
                <ul class="menu">
                    <li class="active">
                        <a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo $link['routing']['product'];?>">Products</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Variasi 1</a>
                                    <ul class="submenu">
                                        <?php 
                                        if(!empty($link['product_category'])){
                                            foreach($link['product_category'] as $v){ 
                                                echo "<li><a href='".site_url().$link['routing']['product'].'/'.$v['category_url']."'>".$v['category_name']."</a></li>";
                                            }
                                        }
                                        foreach($link['products'] as $a => $v){ ?>
                                            <li><a href="<?php echo base_url().$link['routing']['product'].'/'.$v['category_url'].'/'.$v['product_url'];?>"><?php echo $v['product_name'];?></a></li>
                                            <?php 
                                        } 
                                        ?>                                                
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Variasi 1</a>
                                    <ul class="submenu">
                                        <?php 
                                        if(!empty($link['product_category'])){
                                            foreach($link['product_category'] as $v){ 
                                                echo "<li><a href='".site_url().$link['routing']['product'].'/'.$v['category_url']."'>".$v['category_name']."</a></li>";
                                            }
                                        }
                                        foreach($link['products'] as $a => $v){ ?>
                                            <li><a href="<?php echo base_url().$link['routing']['product'].'/'.$v['category_url'].'/'.$v['product_url'];?>"><?php echo $v['product_name'];?></a></li>
                                            <?php 
                                        } 
                                        ?>                                                
                                    </ul>
                                </div>
                                <div class="col-lg-4 p-0">
                                    <div class="menu-banner">
                                        <figure>
                                            <img src="<?php echo $asset; ?>assets/images/menu-banner.jpg" width="192" height="313" alt="Menu banner">
                                        </figure>
                                        <div class="banner-content">
                                            <h4>
                                                <span class="">UP TO</span><br />
                                                <b class="">50%</b>
                                                <i>OFF</i>
                                            </h4>
                                            <a href="#" class="btn btn-sm btn-dark">SHOP NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#">Blogs</a>
                        <ul>
                            <?php 
                            if(!empty($link['article_category'])){
                                foreach($link['article_category'] as $v){
                                    echo "<li><a href=".site_url().$link['routing']['blog'].'/'.$v['category_url'].">".$v['category_name']."</a>"; 
                                }
                            }
                            ?>
                            <!-- <li><a href="<?php #echo $link['articles'];?>">Blog</a>
                                <ul>
                                    <li><a href="<?php #echo $link['article'];?>">Blog</a></li>
                                    <li><a href="<?php #echo $link['article'];?>">Blog Post</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="#">Projects</a>
                        <ul>
                            <?php 
                            if(!empty($link['project'])){
                                foreach($link['project'] as $v){
                                    echo "<li><a href=".site_url().$link['routing']['project'].'/'.$v['news_url'].">".$v['news_title']."</a>"; 
                                }
                            }
                            ?>
                            <!-- <li><a href="<?php #echo $link['articles'];?>">Blog</a>
                                <ul>
                                    <li><a href="<?php #echo $link['article'];?>">Blog</a></li>
                                    <li><a href="<?php #echo $link['article'];?>">Blog Post</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </li>   
                    <li>
                        <a href="#">Gallery</a>
                        <ul>
                            <?php 
                            if(!empty($link['gallery'])){
                                foreach($link['gallery'] as $v){
                                    echo "<li><a href=".site_url().$link['routing']['gallery'].'/'.$v['news_url'].">".$v['news_title']."</a>"; 
                                }
                            }
                            ?>
                            <!-- <li><a href="<?php #echo $link['articles'];?>">Blog</a>
                                <ul>
                                    <li><a href="<?php #echo $link['article'];?>">Blog</a></li>
                                    <li><a href="<?php #echo $link['article'];?>">Blog Post</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </li>        
                    <li>
                        <a href="#">Menu</a>
                        <ul>
                            <?php 
                            if(!empty($link['menu'])){
                                foreach($link['menu'] as $v){
                                    // if(($v['news_position'] == 1) or ($v['news_position'] == 3)){                                      
                                        echo "<li><a href=".site_url().$v['news_url'].">".$v['news_title']."</a>"; 
                                    // }
                                }
                            }
                            ?>
                            <!-- <li><a href="<?php #echo $link['articles'];?>">Blog</a>
                                <ul>
                                    <li><a href="<?php #echo $link['article'];?>">Blog</a></li>
                                    <li><a href="<?php #echo $link['article'];?>">Blog Post</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </li>                                                                                                    
                    <li>
                        <a href="#">Demo</a>
                        <ul>
                            <li><a href="<?php echo $link['wishlist'];?>">Wishlist</a></li>
                            <li><a href="<?php echo $link['cart'];?>">Shopping Cart</a></li>
                            <li><a href="<?php echo $link['checkout'];?>">Checkout</a></li>
                            <li><a href="<?php echo $link['about'];?>">About Us</a></li>
                            <li><a href="<?php echo $link['articles'];?>">Blog</a>
                                <ul>
                                    <li><a href="<?php echo $link['article'];?>">Blog</a></li>
                                    <li><a href="<?php echo $link['article'];?>">Blog Post</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo $link['contact_us'];?>">Contact Us</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo $link['contact_us'];?>">Kontak</a></li>
                    <li class="float-right"><a href="#" class="pl-5">Jelajahi Koleksi Kami</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
