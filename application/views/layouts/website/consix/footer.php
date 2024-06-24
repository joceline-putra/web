
<div class="info-section position-relative">
    <div class="info-section__shape">
        <div class="info-section__shape__block info-section__shape__left">
            <span class="info-section__shape__sqr"></span>
            <span class="info-section__shape__sqr"></span>
            <span class="info-section__shape__sqr"></span>
            <span class="info-section__shape__sqr"></span>
        </div>
        <div class="info-section__shape__block info-section__shape__right">
            <span class="info-section__shape__sqr"></span>
            <span class="info-section__shape__sqr"></span>
            <span class="info-section__shape__sqr"></span>
            <span class="info-section__shape__sqr"></span>
        </div>
    </div>
    <!-- <div class="container">
        <div class="row gx-0">
            <div class="col-md-4">
                <div class="footer-info">
                    <div class="footer-info_icon">
                        <i>
                            <img src="<?php echo $asset; ?>assets/img/icons/phone-info.svg" alt="phone-info">
                        </i>
                    </div>
                    <div class="media-body">
                        <span class="footer-info_label">Phone No:</span>
                        <div class="footer-info_link">
                            <a href="tel:<?php echo $link['contact']['phone'][0]['phone']; ?>"><?php echo $link['contact']['phone'][0]['phone']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-info">
                    <div class="footer-info_icon">
                        <i>
                            <img src="<?php echo $asset; ?>assets/img/icons/open-mail-info.svg" alt="open-email-info">
                        </i>
                    </div>
                    <div class="media-body">
                        <span class="footer-info_label">Email Address:</span>
                        <div class="footer-info_link">
                            <a href="mailto:<?php echo $link['contact']['email'][0]['email']; ?>"><?php echo $link['contact']['email'][0]['email']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-info">
                    <div class="footer-info_icon">
                        <i>
                            <img src="<?php echo $asset; ?>assets/img/icons/location-info.svg" alt="location info">
                        </i>
                    </div>
                    <div class="media-body">
                        <div class="footer-info_link">
                            <?php echo $link['contact']['address']['office']; ?>
                            <?php #echo $link['contact']['address']['city']; ?>, 
                            <?php #echo $link['contact']['address']['state']; ?>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<footer class="footer-wrapper footer-layout3" data-bg-src="<?php echo $asset; ?>assets/img/footer/footer-bg.jpg">
    <div class="footer-layout3__overlay"></div>
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between">
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="widget footer-widget">
                        <div class="widget__logo">
                            <img src="<?php echo $link['logo']; ?>" alt="logo">
                        </div>
                        <div class="vs-widget-about">
                            <p class="footer-text">
                                Hotel resort yang bertema rumah adat diseluruh nusantara indonesia
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Kontak Kami</h3>
                        <div class="footer-info--style2">
                            <div class="footer-info_icon">
                                <i><img src="<?php echo $asset; ?>assets/img/icons/location-info.svg" alt="location info"></i>
                            </div>
                            <div class="media-body">
                                <span class="footer-info_label">Alamat:</span>
                                <div class="footer-info_link">
                                    <p class="footer-text">
                                        <?php echo $link['contact']['address']['office']; ?><br>
                                        <a href="<?php echo $link['contact']['map']['link']; ?>" style="color:#fc6601;" target="_blank">Klik Untuk Petunjuk Arah</a>
                                    </p>                                    
                                </div>
                            </div>                            
                        </div>
                        <div class="footer-info--style2 pt-4">
                            <div class="footer-info_icon">
                                <i><img src="<?php echo $asset; ?>assets/img/icons/phone-info.svg" alt="location info"></i>
                            </div>
                            <div class="media-body">
                                <span class="footer-info_label">Telepon / WhatsApp:</span>
                                <div class="footer-info_link">
                                    <a href="https://wa.me/+<?php echo $link['contact']['phone'][0]['phone']; ?>"><?php echo $link['contact']['phone'][0]['phone']; ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="footer-info--style2 pt-4">
                            <div class="footer-info_icon">
                                <i><img src="<?php echo $asset; ?>assets/img/icons/open-mail-info.svg" alt="location info"></i>
                            </div>
                            <div class="media-body">
                                <span class="footer-info_label">Email Address:</span>
                                <div class="footer-info_link">
                                    <a href="mailto:<?php echo $link['contact']['email'][0]['email']; ?>"><?php echo $link['contact']['email'][0]['email']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Ikuti Kami</h3>
                        <!-- <div class="footer-social"> -->
                            <?php 
                            if(!empty($link)){
                                foreach($link['social'] as $v){
                                ?>
                                <!-- <a href="<?php echo $v['url'];?>" target="_blank"><?php echo strtolower($v['name']);?></a> -->
                                <?php 
                                }
                            }
                            ?>                            
                        <!-- </div> -->
                        <div class="footer-menu--style">
                            <ul>
                                <?php 
                                if(!empty($link)){
                                    foreach($link['social'] as $v){
                                    ?>
                                    <li><a href="<?php echo $v['url'];?>" target="_blank"><?php echo ucfirst($v['name']);?></a></li>
                                    <?php 
                                    }
                                }
                                ?>                             
                            </ul>
                        </div>                         
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p class="copyright-text text-center text-lg-start">© <?php echo date("Y")." ".$link['brand'];?>. All Rights Reserved By <a href="#">UBR</a></p>
                </div>
                <div class="col-lg-6">
                    <div class="widget widget_nav_menu footer-widget">
                        <div class="menu-all-pages-container">
                            <ul class="menu justify-content-center justify-content-lg-end">
                                <li><a href="<?php echo $link['privacy']; ?>">Kebijakan Privasi</a></li>
                                <li><a href="<?php echo $link['term_of_service']; ?>">Syarat & Ketentuan</a></li>
                                <li><a href="<?php echo $link['about']; ?>">Tentang Kami</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>