<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title><?php echo $title; ?></title>
        <meta name="keywords" content="<?php echo strip_tags($keywords); ?>"/>
        <meta name="description" content="<?php echo strip_tags($description); ?>">
        <meta name="author" content="<?php echo strip_tags($author); ?>">

        <meta name="robots" content="INDEX,FOLLOW">
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicons - Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $asset; ?>assets/img/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $asset; ?>assets/img/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $asset; ?>assets/img/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $asset; ?>assets/img/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $asset; ?>assets/img/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $asset; ?>assets/img/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $asset; ?>assets/img/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $asset; ?>assets/img/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $asset; ?>assets/img/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $asset; ?>assets/img/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $asset; ?>assets/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $asset; ?>assets/img/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $asset; ?>assets/img/favicons/favicon-16x16.png">
        <!-- <link rel="manifest" href="<?php echo $asset; ?>assets/img/favicons/manifest.json"> -->
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo $asset; ?>assets/img/favicons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <?php include "link_css.php"; ?>
    </head>
    <body>
        <div class="preloader">
            <button class="vs-btn preloaderCls">Cancel Preloader </button>
            <div class="preloader-inner">
                <img src="<?php echo $asset; ?>assets/img/logo-black.png" alt="logo">
                <span class="loader"></span>
            </div>
        </div>
        <div class="vs-menu-wrapper">
            <div class="vs-menu-area text-center">
                <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
                <div class="mobile-logo">
                    <a href="<?php echo $asset; ?>index.html"><img src="<?php echo $asset; ?>assets/img/logo-black.png" alt="Consik" class="logo"></a>
                </div>
                <div class="vs-mobile-menu">
                    <ul>
                        <li class="menu-item-has-children">
                            <a href="<?php echo $asset; ?>index.html">Home</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo $asset; ?>index.html">Home 1</a></li>
                                <li><a href="<?php echo $asset; ?>index-2.html">Home 2</a></li>
                                <li><a href="<?php echo $asset; ?>index-3.html">Home 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $asset; ?>about.html">About Us</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="<?php echo $asset; ?>service.html">Services</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo $asset; ?>services.html">Service</a></li>
                                <li><a href="<?php echo $asset; ?>service-details.html">Service Details</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="<?php echo $asset; ?>#none">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo $asset; ?>index.html">Home 1</a></li>
                                <li><a href="<?php echo $asset; ?>index-2.html">Home 2</a></li>
                                <li><a href="<?php echo $asset; ?>index-3.html">Home 3</a></li>
                                <li><a href="<?php echo $asset; ?>shop.html">Shop</a></li>
                                <li><a href="<?php echo $asset; ?>shop-details.html">Shop Details</a></li>
                                <li><a href="<?php echo $asset; ?>faq.html">FAQ's</a></li>
                                <li><a href="<?php echo $asset; ?>blog.html">Blog List</a></li>
                                <li><a href="<?php echo $asset; ?>blog-grid.html">Blog Grid</a></li>
                                <li><a href="<?php echo $asset; ?>blog-details.html">Blog Details</a>
                                </li>
                                <li><a href="<?php echo $asset; ?>services.html">Service</a></li>
                                <li><a href="<?php echo $asset; ?>service-details.html">Service
                                        Details</a></li>
                                <li><a href="<?php echo $asset; ?>team.html">Team</a></li>
                                <li><a href="<?php echo $asset; ?>team-details.html">Team Details</a>
                                </li>
                                <li><a href="<?php echo $asset; ?>project.html">Projects</a></li>
                                <li><a href="<?php echo $asset; ?>project-details.html">Projects
                                        Details</a></li>
                                <li><a href="<?php echo $asset; ?>contact.html">Contact Us</a></li>
                                <li><a href="<?php echo $asset; ?>error.html">Error Page</a></li>
                                <li><a href="<?php echo $asset; ?>comming-soon.html">Comming Soon</a></li>
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
                        <li class="menu-item-has-children">
                            <a href="<?php echo $asset; ?>blog.html">News</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo $asset; ?>blog.html">Blog List</a></li>
                                <li><a href="<?php echo $asset; ?>blog-grid.html">Blog Grid</a></li>
                                <li><a href="<?php echo $asset; ?>blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $asset; ?>contact.html">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidemenu-wrapper d-none d-lg-block">
            <div class="sidemenu-content">
                <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
                <div class="widget  ">
                    <div class="vs-widget-about">
                        <div class="footer-logo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo $asset; ?>assets/img/logo-black.png" alt="Consik" class="logo"></a>
                        </div>
                        <p>Intrinsicly evisculate emerging cutting edge scenarios redefine future-proof
                            e-markets
                            demand line</p>
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="widget  ">
                    <h4 class="widget_title">Gallery Posts</h4>
                    <div class="sidebar-gallery">
                        <div class="gallery-thumb">
                            <img src="<?php echo $asset; ?>assets/img/widget/gal-1-1.jpg" alt="Gallery Image" class="w-100">
                        </div>
                        <div class="gallery-thumb">
                            <img src="<?php echo $asset; ?>assets/img/widget/gal-1-2.jpg" alt="Gallery Image" class="w-100">
                        </div>
                        <div class="gallery-thumb">
                            <img src="<?php echo $asset; ?>assets/img/widget/gal-1-3.jpg" alt="Gallery Image" class="w-100">
                        </div>
                        <div class="gallery-thumb">
                            <img src="<?php echo $asset; ?>assets/img/widget/gal-1-4.jpg" alt="Gallery Image" class="w-100">
                        </div>
                        <div class="gallery-thumb">
                            <img src="<?php echo $asset; ?>assets/img/widget/gal-1-5.jpg" alt="Gallery Image" class="w-100">
                        </div>
                        <div class="gallery-thumb">
                            <img src="<?php echo $asset; ?>assets/img/widget/gal-1-6.jpg" alt="Gallery Image" class="w-100">
                        </div>
                    </div>
                </div>
                <div class="widget  ">
                    <h3 class="widget_title">Office Maps</h3>
                    <div class="footer-map">
                        <iframe title="office location map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163720.11965853968!2d8.496481908353967!3d50.121347879150306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bd096f477096c5%3A0x422435029b0c600!2sFrankfurt%2C%20Germany!5e0!3m2!1sen!2sbd!4v1651732317319!5m2!1sen!2sbd" width="200" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            include "header.php"; 
            if (!empty($_content)) {
                $this->load->view($_content);
            }
            #include "content.php";
            include "footer.php";
            include "link_js.php"; 
        ?>
    </body>
</html>