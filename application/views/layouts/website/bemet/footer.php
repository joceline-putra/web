        <!-- footer-area -->
        <footer>
            <div class="footer-area">
                <!-- <div class="footer-logo-area">
                    <div class="container">
                        <div class="footer-logo-wrap">
                            <ul class="list-wrap">
                                <li class="order-0 order-lg-2">
                                    <div class="footer-logo">
                                        <a href="<?php echo base_url(); ?>"><img src="<?php echo $link['logo']; ?>" alt=""></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-social">
                                        <ul class="list-wrap">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="order-lg-3">
                                    <div class="footer-newsletter">
                                        <h4 class="title">Our Newsletter</h4>
                                        <form action="#">
                                            <input type="email" placeholder="Enter your email...">
                                            <button type="submit">subscribe</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer-widget">
                                    <h4 class="fw-title"><?php echo $link['brand']; ?></h4>
                                    <div class="" style="padding:0px 13px 10px 0px;">
                                        <a href="<?php echo base_url(); ?>"><img src="<?php echo $link['logo']; ?>" alt="" style="width:164px;"></a>
                                    </div>
                                    <div class="footer-contact">
                                        <ul class="list-wrap">
                                            <li><?php echo $link['contact']['address']['office']; ?></li>
                                            <li><a href="tel:<?php echo $link['contact']['phone'][0]['phone']; ?>"><?php echo $link['contact']['phone'][0]['phone']; ?></a></li>
                                            <li><a href="mailto:<?php echo $link['contact']['email'][0]['email']; ?>"><?php echo $link['contact']['email'][0]['email']; ?>m</a></li>
                                        </ul>
                                    </div>
                                    <div class="footer-content">
                                        <h4 class="title">Jam Operasional</h4>
                                        <p><?php echo $link['contact']['work_hour']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer-widget">
                                    <h4 class="fw-title">Produk</h4>
                                    <div class="footer-link">
                                        <ul class="list-wrap">
                                            <?php 
                                                if(!empty($link)){
                                                foreach($link['product_category'] as $a => $v){
                                                    if($a < 5){
                                                ?>
                                                    <li><a href="<?php echo base_url().$link['routing']['product'].'/'.$v['category_url'];?>"><?php echo $v['category_name'];?></a></li>
                                                <?php 
                                                    }
                                                }
                                                if(count($link['product_category']) > 5){ ?>
                                                    <li><a href="<?php echo base_url().$link['routing']['product'];?>">Lainnya ...</a></li>
                                                    <?php }
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-4">
                                <div class="footer-widget">
                                    <h4 class="fw-title">Informasi</h4>
                                    <div class="footer-link">
                                        <ul class="list-wrap">
                                        <?php 
                                            if(!empty($link)){
                                            foreach($link['menu'] as $v){
                                            ?>
                                                <li><a href="<?php echo base_url().$v['news_url'];?>"><?php echo $v['news_title'];?></a></li>
                                            <?php 
                                            }
                                            }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-4">
                                <div class="footer-widget">
                                    <h4 class="fw-title">Social Media</h4>
                                    <div class="footer-link">
                                        <ul class="list-wrap">
                                        <?php 
                                            if(!empty($link)){
                                            foreach($link['menu'] as $v){
                                            ?>
                                                <li><a href="<?php echo base_url().$v['news_url'];?>"><?php echo $v['news_title'];?></a></li>
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
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-7">
                                <div class="copyright-text">
                                    <p>© <?php echo date("Y");?> By <a href="<?php echo base_url(); ?>"><?php echo $link['brand']; ?></a>, All Rights Reserved</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5">
                                <div class="footer-card text-end">
                                    <!-- <img src="<?php #echo $asset;?>assets/img/images/card.png" alt=""> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area-end -->