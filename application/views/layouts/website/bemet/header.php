
        <!-- header-area -->
        <header class="transparent-header">
            <div class="header-top-wrap">
                <div class="container custom-container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="header-top-left">
                                <ul class="list-wrap">
                                    <li class="header-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo $link['contact']['address']['office']; ?>, <?php echo $link['contact']['address']['city']; ?>
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <a href="mailto:<?php echo $link['contact']['email'][0]['email']; ?>"><?php echo $link['contact']['email'][0]['email']; ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4">
                            <div class="header-top-right">
                                <div class="header-top-menu">
                                    <ul class="list-wrap">
                                        <li><a href="<?php echo $link['term_of_service']; ?>">Syarat & Ketentuan</a></li>
                                        <li><a href="<?php echo $link['privacy']; ?>">Kebijakan Privasy</a></li>         
                                    </ul>
                                </div>
                                <div class="header-top-social">
                                    <ul class="list-wrap">
                                        <?php 
                                            if(!empty($link)){
                                                foreach($link['social'] as $v){
                                                ?>
                                                    <li><a href="<?php echo $v['url'];?>"><i class="<?php echo $v['icon'];?>"></i></a></li>
                                                <?php 
                                                }
                                            }
                                        ?>                                        
                                        <!-- <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="menu-area">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="menu-wrap">
                                <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                                <nav class="menu-nav">
                                    <div class="logo">
                                        <a href="<?php echo site_url(); ?>"><img src="<?php echo $link['logo']; ?>" alt="Logo"></a>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class="active menu-item-has-children"><a href="#">Home</a></li>
                                            <li class="menu-item-has-children"><a href="#">Produk</a>
                                                <ul class="sub-menu">
                                                <li><a href="<?php echo base_url().$link['routing']['product'];?>">Semua</a></li>
                                                <?php 
                                                    if(!empty($link)){
                                                    foreach($link['product_category'] as $v){
                                                    ?>
                                                        <li><a href="<?php echo base_url().$link['routing']['product'].'/'.$v['category_url'];?>"><?php echo $v['category_name'];?></a></li>
                                                    <?php 
                                                    }
                                                    }
                                                ?>
                                                </ul>
                                            </li>
                                            <?php 
                                                if(!empty($link)){
                                                foreach($link['menu'] as $v){
                                                    if(($v['news_id'] < 2) or ($v['news_id'] > 3)){
                                                ?>
                                                    <li><a href="<?php echo base_url().$v['news_url'];?>"><?php echo $v['news_title'];?></a></li>
                                                <?php 
                                                    }
                                                }
                                                }
                                            ?>                                            
                                        </ul>
                                    </div>
                                    <div class="header-action d-none d-md-block">
                                        <ul class="list-wrap">
                                            <li class="header-search">
                                                <a href="#"><i class="flaticon-search"></i></a>
                                            </li>
                                            <!-- <li class="header-shop-cart">
                                                <a href="#">
                                                    <i class="flaticon-shopping-basket"></i>
                                                    <span>0</span>
                                                </a>
                                            </li> -->
                                            <li class="header-btn"><a href="https://wa.me/<?php echo $link['contact']['phone'][0]['phone']; ?>" class="btn">WhatsApp</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>

                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <nav class="menu-box">
                                    <div class="close-btn"><i class="fas fa-times"></i></div>
                                    <div class="nav-logo">
                                        <a href="<?php echo site_url(); ?>"><img src="<?php echo $link['logo']; ?>" alt="Logo"></a>
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix list-wrap">
                                        <?php 
                                            if(!empty($link)){
                                                foreach($link['social'] as $v){
                                                ?>
                                                    <li><a href="<?php echo $v['url'];?>"><i class="<?php echo $v['icon'];?>"></i></a></li>
                                                <?php 
                                                }
                                            }
                                        ?>
                                            <!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-youtube"></i></a></li> -->
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu-backdrop"></div>
                            <!-- End Mobile Menu -->

                        </div>
                    </div>
                </div>
            </div>

            <!-- header-search -->
            <div class="search-popup-wrap" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="search-wrap text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Enter your keyword...">
                                        <button class="search-btn"><i class="flaticon-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-backdrop"></div>
            <!-- header-search-end -->

        </header>
        <!-- header-area-end -->