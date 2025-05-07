<footer class="footer bg-dark2">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Kontak Kami</h4>
                        <ul class="contact-info">
                            <li>
                                <span class="contact-info-label"></span><?php echo $link['contact']['name']; ?>
                            </li>
                            <li>
                                <span class="contact-info-label">Alamat:</span><?php echo $link['contact']['address']['office'].'<br>'.$link['contact']['address']['city'].'<br>'.$link['contact']['address']['state']; ?>
                            </li>
                            <li>
                                <span class="contact-info-label">Telepon:</span>
                                    <a href="tel:"><?php echo $link['contact']['phone'][0]['phone'];?></a>  
                            </li>
                            <li>
                                <span class="contact-info-label">WhatsApp:</span>
                                <?php 
                                if(!empty($link['contact']['phone'][1]['phone'])){ ?> 
                                    <a href="https://wa.me/<?php echo $link['contact']['phone'][1]['phone'];?>?text=Halo,%20saya%20tertarik%20dengan%20informasi%20produk%20Mega%20Data%20" target="_blank"><?php echo $link['contact']['phone'][1]['phone'];?>                       
                                <?php }
                                ?>  
                            </li>                            
                            <li>
                                <span class="contact-info-label">Email:</span> 
                                    <a href="#"><?php echo $link['contact']['email'][0]['email'];?>
                                    <?php 
                                    if(!empty($link['contact']['email'][1]['email'])){ echo '<br>';?> 
                                        <a href="mailto:"><?php echo $link['contact']['email'][1]['email'];?>                       
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
                            <li><a href="<?php echo base_url('coverage-area');?>">Coverage Area</a></li>
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
                            // if(!empty($link['products'])){                                
                                foreach($link['products'] as $a => $v){ ?>
                                    <!-- <li><a href="<?php #echo base_url().$link['routing']['product'].'/'.$v['category_url'].'/'.$v['product_url'];?>"><?php echo $v['product_name'];?></a></li> -->
                                    <?php 
                                } 
                            // }

                            if(!empty($link['product_category'])){
                                foreach($link['product_category'] as $v){
                                    echo "<li><a href=".site_url().$link['routing']['product'].'/'.$v['category_url'].">".$v['category_name']."</a>"; 
                                }
                            }                            
                        ?>
                        </ul>
                    </div>  
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Blog</h4>
                        <!-- <div class="tagcloud"> -->
                        <ul class="links">
                            <?php 
                            if(!empty($link['blog'])){
                                foreach($link['blog'] as $v){
                                    echo "<li><a href='".site_url().$link['routing']['blog'].'/'.$v['category_url']."'>".$v['news_title']."</a></li>"; 
                                }
                            }       
                            ?>                                    
                        <!-- </div> -->
                        </ul>
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
                        <span style="background-image: url('<?php echo base_url('upload/web/megadata_footer.png'); ?>'); background-size: contain; background-repeat: no-repeat; display: inline-block; width: 100px; height: 50px; margin-right: 10px;"></span>
                        <span style="background-image: url('<?php echo base_url('upload/web/streamfast_footer.png'); ?>'); background-size: contain; background-repeat: no-repeat; display: inline-block; width: 100px; height: 50px;"></span>
                    </div>
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



