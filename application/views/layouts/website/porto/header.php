<style>
/* .main-nav .menu>li.active>a,.main-nav .menu>li>a:hover {
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
} */
.menu > li:not(:first-child) {
    /* Add your styles here for <li> elements with children except the first one */
    padding:20px;
}
    
}
</style>
<?php 
$theme = 'bg-dark2';
$theme_text = 'text-white';
?>
<header class="header">
    <div class="d-none header-top">
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
                            <li><a href="<?php echo $link['wishlist']; ?>">My Wishlist</a></li>
                            <li><a href="<?php echo $link['cart']; ?>">Cart</a></li>
                            <li><a href="<?php echo $link['checkout']; ?>">Checkout</a></li>                            
                            <li><a href="<?php echo $link['signin']; ?>">Log In</a></li>
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
                    <a href="#">Page</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="<?php echo $link['wishlist'];?>">Wishlist</a></li>
                            <li><a href="<?php echo $link['cart'];?>">Shopping Cart</a></li>
                            <li><a href="<?php echo $link['checkout'];?>">Checkout</a></li>
                            <li><a href="<?php echo $link['contact_us'];?>">Contact Us</a></li>
                            <li><a href="<?php echo $link['articles'];?>">Blogs</a></li>
                            <li><a href="<?php echo $link['article'];?>">Blog</a></li> 
                            <li><a href="<?php echo $link['products_template'];?>">Products</a></li>
                            <li><a href="<?php echo $link['product_template'];?>">Product</a></li>                             
                        </ul>
                    </div>
                </div>                
                <div class="header-dropdown mr-auto mr-sm-3 mr-md-0">
                    <a href="#">Menu</a>
                    <div class="header-menu">
                        <ul>
                            <?php 
                            if(!empty($link['menu'])){
                                foreach($link['menu'] as $v){
                                    if(($v['news_position'] == 1) or ($v['news_position'] == 3)){                                      
                                        echo "<li><a href=".site_url().$v['news_url'].">".$v['news_title']."</a>"; 
                                    }
                                }
                            }
                            ?>
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
    <div class="header-middle sticky-header d-lg-none <?php echo $theme;?>" data-sticky-options="{'mobile': true}">
        <div class="container">
            <div class="header-left col-lg-2 w-auto pl-0">
                <button class="mobile-menu-toggler text-primary mr-2 d-lg-none" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="<?php echo $link['home']; ?>" class="logo d-lg-none">
                    <img src="<?php echo $link['logo']; ?>" width="111" height="44" alt="<?php echo $link['brand']; ?> Logo">
                </a>
            </div>
            <div class="header-right w-lg-max">              
            </div>
        </div>
    </div>
    <div class="header-bottom sticky-header d-lg-block <?php echo $theme;?>" data-sticky-options="{'mobile': false}">
        <div class="container">
            <nav class="main-nav w-100">
                <ul class="menu">
                    <li>
                        <a href="<?php echo $link['home']; ?>" class="logo">
                            <img src="<?php echo $link['logo']; ?>" width="111" height="44" alt="<?php echo $link['brand']; ?> Logo">
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>" class="text-white">Home</a>
                    </li>
                    <?php 
                        if(!empty($link)){
                            foreach($link['menu'] as $v){
                                if(($v['news_position'] == 1) or ($v['news_position'] == 3)){
                                ?>
                                <li><a href="<?php echo base_url().$v['news_url'];?>" class="text-white"><?php echo $v['news_title'];?></a></li>
                                <?php 
                                }
                            }
                        }
                    ?>     
                    <li>
                        <a href="<?php echo base_url('coverage-area'); ?>" class="text-white">Coverage Area</a>
                    </li>            
                    <li>
                        <a href="#" class="text-white">Produk</a>
                        <ul class="<?php echo $theme;?>">
                            <?php 
                            if(!empty($link['product_category'])){
                                foreach($link['product_category'] as $v){
                                    echo "<li><a href=".site_url().$link['routing']['product'].'/'.$v['category_url'].">".$v['category_name']."</a>"; 
                                }
                            }
                            ?>
                        </ul>
                    </li>                  
                    <li>
                        <a href="#" class="text-white">Blog</a>
                        <ul class="<?php echo $theme;?>">
                            <?php 
                            if(!empty($link['blog'])){
                                foreach($link['blog'] as $v){
                                    echo "<li><a href=".site_url().$link['routing']['blog'].'/'.$v['category_url'].'/'.$v['news_url'].">".$v['news_title']."</a>"; 
                                }
                            }
                            ?>
                        </ul>
                    </li>                             
                    <li class="float-right"><a href="#" id="btn_download" data-url="<?php echo base_url('upload/Company-Profile-Megadata-ISP.pdf');?>" class="pl-5 text-white">Download Company Profile</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
