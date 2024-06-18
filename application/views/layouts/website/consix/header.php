<header class="vs-header header-layout3">
    <!-- Header Top -->
    <div class="header-topper position-relative">
        <div class="header-shape"></div>
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center justify-content-between gy-1 text-center text-lg-start">
                    <div class="col-lg-auto d-none d-lg-block">
                        <p class="header-text"><span class="header-text__bullet"></span> <?php echo $link['newsticker'];?></p>
                    </div>
                    <div class="col-lg-auto">
                        <div class="header-social style-white">
                            <?php 
                            if(!empty($link)){
                                foreach($link['social'] as $v){
                                ?>
                                <a href="<?php echo $v['url'];?>" target="_blank"><i class="<?php echo $v['icon'];?>"></i></a>
                                <?php 
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main position-relative">
            <div class="header-texures position-absolute end-0 top-0">
                <img src="<?php echo $asset; ?>assets/img/textures/header-textures-1.svg" alt="texture">
            </div>
            <div class="container">
                <div class="menu-top">
                    <div class="row justify-content-center justify-content-sm-between align-items-center gx-sm-0">
                        <div class="col-lg-3 col-md-4 col-auto">
                            <div class="header-logo">
                                <a href="<?php echo site_url();?>"><img src="<?php echo $asset; ?>assets/img/logo.png" alt="TechBiz" class="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-auto">
                            <div class="header-infos">
                                <div class="header-info">
                                    <div class="header-info_icon"><i><img src="<?php echo $asset; ?>assets/img/icons/phone.svg"
                                                                          alt="phone-icon"></i></div>
                                    <div class="media-body">
                                        <span class="header-info_label">Phone No</span>
                                        <div class="header-info_link"><a href="<?php echo $asset; ?>tel:<?php echo $link['contact']['phone'][0]['phone']; ?>"><?php echo $link['contact']['phone'][0]['phone']; ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-info d-none d-md-flex">
                                    <div class="header-info_icon"><i><img src="<?php echo $asset; ?>assets/img/icons/email.svg"
                                                                          alt="phone-icon"></i></div>
                                    <div class="media-body">
                                        <span class="header-info_label">Email Address</span>
                                        <div class="header-info_link"><a href="<?php echo $asset; ?>mailto:<?php echo $link['contact']['email'][0]['email']; ?>"><?php echo $link['contact']['email'][0]['email']; ?></a></div>
                                    </div>
                                </div>
                                <div class="header-info d-none d-lg-flex">
                                    <div class="header-info_icon"><i><img src="<?php echo $asset; ?>assets/img/icons/map-location.svg"
                                                                          alt="phone-icon"></i>
                                    </div>
                                    <div class="media-body">
                                        <span class="header-info_label">Address</span>
                                        <div class="header-info_link">
                                            <?php echo $link['contact']['address']['office']; ?><br>
                                            <?php echo $link['contact']['address']['city']; ?>, 
                                            <?php echo $link['contact']['address']['state']; ?>                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu Area -->
    <div class="header-bottom sticky-wrapper">
        <div class="sticky-active">
            <div class="container">
                <div class="header-menu">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-block">
                                <ul class="main-menu__list">
                                    <li>
                                        <a href="<?php echo $link['about']; ?>">Home</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $link['about']; ?>">About</a>
                                    </li>                                                        
                                    <li class="menu-item-has-children">
                                      <a href="<?php echo $asset; ?>services.html">Articles</a>
                                      <ul class="sub-menu">
                                        <?php 
                                        if(!empty($link['article_category'])){
                                            foreach($link['article_category'] as $v){
                                                echo "<li><a href=".site_url('article').'/'.$v['category_url'].">".$v['category_name']."</a>"; 
                                            }
                                        }
                                        ?>
                                      </ul>
                                    </li>
                                    <li>
                                        <a href="<?php echo $link['login']; ?>">Login</a>
                                    </li>    
                                    <!--
                                    <li class="menu-item-has-children mega-menu-wrap">
                                      <a href="<?php echo $asset; ?>#">Pages</a>
                                      <ul class="mega-menu">
                                        <li><a href="<?php echo $asset; ?>#">Pagelist 1</a>
                                          <ul>
                                            <li><a href="<?php echo $asset; ?>index.html">Home 1</a></li>
                                            <li><a href="<?php echo $asset; ?>index-2.html">Home 2</a></li>
                                            <li><a href="<?php echo $asset; ?>index-3.html">Home 3</a></li>
                                            <li><a href="<?php echo $asset; ?>shop.html">Shop</a></li>
                                            <li><a href="<?php echo $asset; ?>shop-details.html">Shop Details</a></li>
                                            <li><a href="<?php echo $asset; ?>faq.html">FAQ's</a></li>
                                          </ul>
                                        </li>
                                        <li><a href="<?php echo $asset; ?>#">Pagelist 3</a>
                                          <ul>
                                            <li><a href="<?php echo $asset; ?>blog.html">Blog List</a></li>
                                            <li><a href="<?php echo $asset; ?>blog-grid.html">Blog Grid</a></li>
                                            <li><a href="<?php echo $asset; ?>blog-details.html">Blog Details</a>
                                            </li>
                                            <li><a href="<?php echo $asset; ?>services.html">Service</a></li>
                                            <li><a href="<?php echo $asset; ?>service-details.html">Service
                                                Details</a></li>
                                            <li><a href="<?php echo $asset; ?>team.html">Team</a></li>
                                          </ul>
                                        </li>
                                        <li><a href="<?php echo $asset; ?>#">Pagelist 4</a>
                                          <ul>
                                            <li><a href="<?php echo $asset; ?>team-details.html">Team Details</a>
                                            </li>
                                            <li><a href="<?php echo $asset; ?>project.html">Projects</a></li>
                                            <li><a href="<?php echo $asset; ?>project-details.html">Projects
                                                Details</a></li>
                                            <li><a href="<?php echo $asset; ?>contact.html">Contact Us</a></li>
                                            <li><a href="<?php echo $asset; ?>error.html">Error Page</a></li>
                                            <li><a href="<?php echo $asset; ?>comming-soon.html">Comming Soon</a></li>
                                          </ul>
                                        </li>
                                        <li><a href="<?php echo $asset; ?>#">Pagelist 5</a>
                                          <ul>
                                            <li><a href="<?php echo $asset; ?>account.html">My Account</a></li>
                                            <li><a href="<?php echo $asset; ?>cart.html">Cart</a></li>
                                            <li><a href="<?php echo $asset; ?>checkout.html">Checkout</a></li>
                                            <li><a href="<?php echo $asset; ?>price.html">Pricing Plan</a></li>
                                            <li><a href="<?php echo $asset; ?>element-typography.html">Elements
                                                Typography</a></li>
                                            <li><a href="<?php echo $asset; ?>element-buttons.html">Button Elements</a>
                                            </li>
                                          </ul>
                                        </li>
                                      </ul>
                                    </li> -->
                                </ul>
                            </nav>
                            <button class="vs-menu-toggle d-inline-block d-lg-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="16.02" viewBox="0 0 38 16.02">
                                <path d="M1268,206.78v-2h38v2Zm0-7.01v-2h38v2Zm0-7.01v-2h38v2Z" transform="translate(-1268 -190.76)" fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                        <div class="col-auto d-none d-vc-sm-block">
                            <div class="header-btns">
                                <button class="icon-btn style3 sideMenuToggler d-none d-lg-inline-block">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="16.02"
                                             viewBox="0 0 38 16.02">
                                        <path d="M1268,206.78v-2h38v2Zm0-7.01v-2h38v2Zm0-7.01v-2h38v2Z"
                                              transform="translate(-1268 -190.76)" fill="currentColor" />
                                        </svg>
                                    </i>
                                </button>
                                <a href="<?php echo site_url(); ?>" class="vs-btn d-none d-vc-sm-block">
                                    <span class="vs-btn__bar"></span>
                                    Call Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>