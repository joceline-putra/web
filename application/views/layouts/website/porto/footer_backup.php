<footer class="footer" style="background-color:#131739;">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Kontak Kami</h4>
                        <ul class="contact-info">
                            <li>
                                <span class="contact-info-label">Alamat:</span><?php echo $link['contact']['address']['office'].'<br>'.$link['contact']['address']['city'].'<br>'.$link['contact']['address']['state']; ?>
                            </li>
                            <li>
                                <span class="contact-info-label">Telepon:</span>
                                    <a href="tel:"><?php echo $link['contact']['phone'][0]['phone'];?></a>
                                    <?php 
                                    if(!empty($link['contact']['phone'][1]['phone'])){ echo '<br>';?> 
                                        <a href="tel:<?php echo $link['contact']['phone'][1]['phone'];?>"><?php echo $link['contact']['phone'][1]['phone'];?>                       
                                    <?php }
                                    ?>  
                            </li>
                            <li>
                                <span class="contact-info-label">Email:</span> 
                                    <a href="#"><?php echo $link['contact']['email'][0]['email'];?>
                                    <?php 
                                    if(!empty($link['contact']['email'][1]['email'])){ echo '<br>';?> 
                                        <a href="#"><?php echo $link['contact']['email'][1]['email'];?>                       
                                    <?php }
                                    ?>                                            
                                </span>
                                </a>
                            </li>
                            <li>
                                <span class="contact-info-label">Jam Kerja:</span><?php echo $link['contact']['work_hour'];?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Layanan Pelanggan</h4>

                        <ul class="links">
                        <?php 
                            if(!empty($link)){
                                foreach($link['menu'] as $v){
                                    if(($v['news_position'] == 2) or ($v['news_position'] == 3)){
                                    ?>
                                    <li><a href="<?php echo base_url().$v['news_url'];?>"><?php echo $v['news_title'];?></a></li>
                                    <?php 
                                    }
                                }
                            }
                        ?>
                            <!-- <li><a href="<?php echo $link['login'];?>">Masuk</a></li> -->
                        </ul>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Social Media</h4>

                        <ul class="links">
                        <?php 
                            if(!empty($link)){
                                foreach($link['social'] as $v){
                                ?>
                                <!-- <a href="<?php echo $v['url'];?>" class="<?php echo $v['icon'];?>" target="_blank" title="<?php echo $v['name'];?>"></a> -->
                                <li><a href="<?php echo $v['url'];?>"><?php echo ucwords($v['name']);?></a></li>
                                <?php 
                                }
                            }
                            ?>
                        </ul>
                    </div>               
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Produk</h4>
                        <ul class="links">
                        <?php 
                            if(!empty($link['products'])){                                
                                foreach($link['products'] as $a => $v){ ?>
                                    <li><a href="<?php echo base_url().$link['routing']['product'].'/'.$v['category_url'].'/'.$v['product_url'];?>"><?php echo $v['product_name'];?></a></li>
                                    <?php 
                                } 
                            }
                        ?>
                        </ul>
                    </div>  
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Blog</h4>
                        <div class="tagcloud">
                            <?php 
                            if(!empty($link['article_category'])){
                                foreach($link['article_category'] as $v){
                                    echo "<a href='".site_url().$link['routing']['blog'].'/'.$v['category_url']."'>".$v['category_name']."</a>"; 
                                }
                            }
                            ?>                                    
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-sm-6">
                    <div class="widget widget-newsletter">
                        <h4 class="widget-title">Subscribe newsletter</h4>
                        <p>Get all the latest information on events, sales and offers. Sign up for newsletter:
                        </p>
                        <form action="#" class="mb-0">
                            <input type="email" class="form-control m-b-3" placeholder="Email address" required>

                            <input type="submit" class="btn btn-primary shadow-none" value="Subscribe">
                        </form>
                    </div>
                </div> -->
                <!-- End .col-lg-3 -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-bottom">
            <div class="container d-sm-flex align-items-center">
                <div class="footer-left">
                    <span class="footer-copyright text-center" style="color:white;">© <?php echo $link['brand'].". ".date("Y");?>. All Rights Reserved</span>
                </div>

                <div class="footer-right ml-auto mt-1 mt-sm-0">
                    <div class="payment-icons">
                        <!-- <span class="payment-icon visa" style="background-image: url(<?php echo $asset; ?>assets/images/payments/payment-visa.svg)"></span>
                        <span class="payment-icon paypal" style="background-image: url(<?php echo $asset; ?>assets/images/payments/payment-paypal.svg)"></span>
                        <span class="payment-icon stripe" style="background-image: url(<?php echo $asset; ?>assets/images/payments/payment-stripe.png)"></span>
                        <span class="payment-icon verisign" style="background-image:  url(<?php echo $asset; ?>assets/images/payments/payment-verisign.svg)"></span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



