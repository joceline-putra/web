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
                <img src="<?php echo site_url(); ?>upload/branch/default_logo.png" alt="logo">
                <span class="loader"></span>
            </div>
        </div>
        <div class="vs-menu-wrapper">
            <div class="vs-menu-area text-center">
                <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
                <div class="mobile-logo">
                    <a href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>upload/branch/default_logo.png" alt="Consik" class="logo"></a>
                </div>
                <div class="vs-mobile-menu">
                    <ul>
                        <li>
                            <a href="<?php echo $link['home']; ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo $link['about']; ?>">Tentang Kami</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Blog</a>
                            <ul class="sub-menu">
                                <?php 
                                if(!empty($link['article_category'])){
                                    foreach($link['article_category'] as $v){
                                        echo "<li><a href=".site_url($link['routing']['blog']).'/'.$v['category_url'].">".$v['category_name']."</a>"; 
                                    }
                                }
                                ?>                                
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $link['login']; ?>">Login</a>
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
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo site_url(); ?>upload/branch/default_logo.png" alt="Consik" class="logo"></a>
                        </div>
                        <p>
                            <?php echo $link['contact']['address']['office']; ?><br>
                            <?php echo $link['contact']['address']['city']; ?>, 
                            <?php echo $link['contact']['address']['state']; ?><br> 
                            <?php echo $link['contact']['work_hour']; ?><br>  
                            <?php echo $link['contact']['phone'][0]['phone']; ?>
                        </p>
                        <div class="footer-social">
                            <?php 
                            if(!empty($link)){
                                foreach($link['social'] as $v){
                                ?>
                                <a href="<?php echo $v['url'];?>" target="_blank"><i class="fab fa-<?php echo strtolower($v['name']);?>"></i></a>
                                <?php 
                                }
                            }
                            ?>                            
                            <!-- <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="widget  ">
                    <h3 class="widget_title">Office Maps</h3>
                    <div class="footer-map">
                        <iframe title="office location map" src="<?php echo $link['contact']['map']['link'];?>" width="200" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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