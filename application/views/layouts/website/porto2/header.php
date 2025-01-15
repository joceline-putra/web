<header id="header" class="header-transparent header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyHeaderContainerHeight': 80, 'stickyStartAt': 50, 'stickyChangeLogo': false}">
    <div class="header-body border-top-0 bg-primary appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="2000" data-plugin-options="{'forceAnimation': true}">
        <div class="header-container container-fluid">
            <div class="header-row">
                <div class="header-column align-items-start justify-content-center">
                    <div class="header-logo z-index-2 col-lg-2 px-0">
                        <a href="<?php echo base_url();?>">
                            <img alt="<?php echo $link['brand'];?>" width="123" height="32" src="<?php echo $link['logo']; ?>">
                        </a>
                    </div>
                </div>
                <div class="header-column flex-row justify-content-end justify-content-lg-center">
                    <div class="header-nav header-nav-line header-nav-bottom-line header-nav-bottom-line-effect-1 header-nav-dropdowns-dark header-nav-light-text justify-content-end">
                        <div class="header-nav-main header-nav-main-arrows header-nav-main-mobile-dark header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1">
                            <nav class="collapse">
                                <ul class="nav nav-pills" id="mainNav">
                                    <li><a href="<?php echo base_url('advertising');?>" class="nav-link active">Advertising</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="nav-link dropdown-toggle">Branding</a>
                                        <ul class="dropdown-menu">
                                            <!-- <li><a href="demo-architecture-2-services.html" class="dropdown-item">View All</a></li> -->
                                            <!-- <li><a href="demo-architecture-2-services-detail.html" class="dropdown-item">Design & Planning</a></li> -->
                                            <li><a href="demo-architecture-2-services-detail.html" class="dropdown-item">Interior Branding</a></li>
                                            <li><a href="demo-architecture-2-services-detail.html" class="dropdown-item">Exterior Branding</a></li>
                                            <li><a href="demo-architecture-2-services-detail.html" class="dropdown-item">Vehicle Branding</a></li>
                                        </ul>
                                    </li>                                    
                                    <li><a href="<?php echo base_url('event-organizer');?>" class="nav-link">Event Organizer</a></li>
                                    <li><a href="<?php echo base_url('media');?>" class="nav-link">Media</a></li>
                                    <li><a href="<?php echo base_url('tentang-kami');?>" class="nav-link">Tentang Kami</a></li>
                                    <!-- <li><a href="<?php echo base_url('blog');?>" class="nav-link">Blog</a></li> -->
                                    <!-- <li><a href="<?php echo base_url('privacy');?>" class="nav-link">Kebijakan Privasi</a></li> -->
                                    <!-- <li><a href="<?php echo base_url('term-of-service');?>" class="nav-link">Syarat dan Ketentuan</a></li>                                                                         -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--
                    <div class="header-nav-features ps-0 ms-3">
                        <div class="header-nav-features-search-reveal-container">
                            <div class="header-nav-feature header-nav-features-search header-nav-features-search-reveal d-inline-flex">
                                <a href="#" class="header-nav-features-search-show-icon d-inline-flex text-decoration-none"><i class="icons icon-magnifier header-nav-top-icon text-color-light text-4 font-weight-bold position-relative top-1"></i></a>
                            </div>
                        </div>
                    </div>
                    -->
                    <button class="btn header-btn-collapse-nav bg-transparent border-0 text-4 position-relative top-2 p-0 ms-4" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="header-column align-items-end justify-content-center d-none d-lg-flex">
                    <ul class="header-social-icons social-icons social-icons-clean social-icons-icon-light social-icons-medium custom-social-icons-divider">
                        <!-- 
                        <li class="social-icons-facebook">
                            <a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="social-icons-twitter">
                            <a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-x-twitter"></i></a>
                        </li> 
                        -->
                        <li class="social-icons-instagram">
                            <a href="https://www.instagram.com/murba_advertising" target="_blank" title="Linkedin"><i class="fab fa-instagram"></i></a>
                        </li>
                        <?php 
                            if(!empty($link)){
                                foreach($link['social'] as $v){
                                ?>
                                <li class="social-icons-<?php echo $v['name'];?>">
                                    <a href="<?php echo $v['url'];?>" class="<?php echo $v['icon'];?>" title="<?php echo $v['name'];?>" target="_blank"></a>
                                </li>
                                <?php 
                                }
                            }
                        ?>                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav-features header-nav-features-no-border p-static">
        <div class="header-nav-feature header-nav-features-search header-nav-features-search-reveal header-nav-features-search-reveal-big-search header-nav-features-search-reveal-big-search-full">
            <div class="container">
                <div class="row h-100 d-flex">
                    <div class="col h-100 d-flex">
                        <form role="search" class="d-flex h-100 w-100" action="https://www.okler.net/previews/porto/10.2.0/page-search-results.html" method="get">
                            <div class="big-search-header input-group">
                                <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Type and hit enter...">
                                <a href="#" class="header-nav-features-search-hide-icon"><i class="fas fa-times header-nav-top-icon"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>