
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
    <div class="container">
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
<footer class="footer-wrapper footer-layout3" data-bg-src="<?php echo $asset; ?>assets/img/footer/footer-bg.jpg">
    <div class="footer-layout3__overlay"></div>
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between">
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="widget footer-widget">
                        <div class="widget__logo">
                            <img src="<?php echo $asset; ?>assets/img/logo.png" alt="logo">
                        </div>
                        <div class="vs-widget-about">
                            <p class="footer-text">
                                Lorem ipsum dolor sit amet, conse auctor
                                aliquet Aenesollicitudi, lobibendum auctor.
                                lobiben aliquet. Lorem ipsum dolor sit ame
                                aliquet Aenesollicitudi, lobibendum auctor.
                                lobiben aliquet. 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">JOIN NEWSLETTER</h3>
                        <div class="vs-widget-about">
                            <p class="vs-widget-about__text">Subscribe and get latest news.</p>
                            <div class="widget__submit position-relative">
                                <input class="wp-block--submit__input" placeholder="Enter your email address...." type="search" name="s">
                                <button type="button" class="vs-btn style11">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                            <div class="d-flex align-items-center">
                                <input id="footer-checkbox" class="widget__submit--checkbox" type="checkbox">
                                <label class="widget__submit--label" for="footer-checkbox">I agree that data will be
                                    saved for the purpose of making contact</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Ikuti Kami</h3>
                        <div class="footer-social">
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
                                <li><a href="<?php echo $link['privacy']; ?>">PRIVACY</a></li>
                                <li><a href="<?php echo $link['term_and_condition']; ?>">TERMS & CONDITION</a></li>
                                <li><a href="<?php echo $link['about']; ?>">About Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>