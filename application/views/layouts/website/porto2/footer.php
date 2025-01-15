<footer id="footer" class="bg-primary border-0">
    <div class="container container-xl-custom pt-5 pb-3">
        <div class="row py-5">
            <div class="col-md-4 col-lg-2 mb-4 mb-lg-0">
                <h4 class="font-weight-extra-bold text-5 ls-0">Alamat Kantor</h4>
                <ul class="list list-unstyled">
                    <li class="mb-1">
                        <?php echo $link['contact']['address']['office'].'<br>'.$link['contact']['address']['city'].'<br>'.$link['contact']['address']['state']; ?>
                    </li>
                    <li class="mb-1">
                        Jam Layanan: <br><?php echo $link['contact']['work_hour'];?>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-2 mb-4 mb-lg-0">
                <h4 class="font-weight-extra-bold text-5 ls-0">Kontak Kami</h4>
                <ul class="list-unstyled">
                    <li>
                        <span class="d-block line-height-2 mb-1">Kantor</span>
                        <a href="tel:+<?php echo $link['contact']['phone'][0]['phone'];?>" class="text-color-light text-6 text-lg-4 text-xl-6 font-weight-bold"><?php echo $link['contact']['phone'][0]['phone'];?></a>
                    </li>
                    <li>
                        <span class="d-block line-height-2 mb-1">Sales</span>
                        <a href="tel:+<?php echo $link['contact']['phone'][1]['phone'];?>" class="text-color-light text-6 text-lg-4 text-xl-6 font-weight-bold">
                            <?php echo $link['contact']['phone'][1]['phone'];?>
                        </a>
                    </li>                                
                </ul>
            </div>
            <div class="col-md-4 col-lg-2 mb-4 mb-md-0">
                <h4 class="font-weight-extra-bold text-5 ls-0">Advertising</h4>
                <ul class="list-unstyled">
                    <li class="mb-1">
                        <a href="#">Interior Branding</a>
                    </li>
                    <li class="mb-1">
                        <a href="#">Exsterior Branding</a>
                    </li>                    
                    <li class="mb-1">
                        <a href="#">Vehicle Branding</a>
                    </li>
                    <li class="mb-1">
                        <a href="#">Planning Konstruksi</a>
                    </li>                                       
                </ul>
            </div>
            <div class="col-md-4 col-lg-2 mb-4 mb-md-0">
                <h4 class="font-weight-extra-bold text-5 ls-0">Billboard</h4>
                <ul class="list-unstyled">
                    <li class="mb-1">
                        <a href="demo-architecture-2-services-detail.html">Videotron</a>
                    </li> 
                    <li class="mb-1">
                        <a href="#">Baliho</a>
                    </li>
                    <li class="mb-1">
                        <a href="#">Street Sign</a>
                    </li>
                    <li class="mb-1">
                        <a href="#">Neon Box</a>
                    </li>    
                    <li class="mb-1">
                        <a href="demo-architecture-2-services-detail.html">Peta Media Billboard</a>
                    </li>                                                    
                </ul>
            </div>
            <div class="col-md-4 col-lg-2 mb-4 mb-md-0">
                <h4 class="font-weight-extra-bold text-5 ls-0">Event Organizer</h4>
                <ul class="list-unstyled">
                    <li class="mb-1">
                        <a href="demo-architecture-2-services-detail.html">Agency</a>
                    </li>
                    <li class="mb-1">
                        <a href="demo-architecture-2-services-detail.html">Event Planner</a>
                    </li>                    
                    <li class="mb-1">
                        <a href="demo-architecture-2-services-detail.html">Community Engagement</a>
                    </li>
                    <li class="mb-1">
                        <a href="demo-architecture-2-services-detail.html">Brand Activation</a>
                    </li>                    
                </ul>
            </div>            
            <div class="col-md-4 col-lg-2 mb-4 mb-md-0">
                <h4 class="font-weight-extra-bold text-5 ls-0">Murba</h4>
                <ul class="list-unstyled">
                    <?php 
                    if(!empty($link['menu'])){
                        foreach($link['menu'] as $v){
                        ?>
                            <li class="mb-1">
                                <a href="<?php echo base_url().$v['news_url'];?>"><?php echo ucfirst($v['news_title']);?></a>
                            </li>
                        <?php 
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-4 col-lg-2">
                <h4 class="font-weight-extra-bold text-5 ls-0">Ikuti Kami</h4>
                <ul class="social-icons social-icons-clean social-icons-icon-light">
                    <?php 
                        if(!empty($link['social'])){
                            foreach($link['social'] as $v){
                            ?>
                            <li class="social-icons-<?php echo $v['name'];?>">
                                <a href="<?php echo $v['url'];?>" title="<?php echo $v['name'];?>" target="_blank">
                                    <i class="<?php echo $v['icon'];?>"></i>
                                </a>
                            </li>
                            <?php 
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright bg-primary">
        <div class="container container-xl-custom pb-4">
            <div class="row">
                <div class="col opacity-3">
                    <hr class="my-0 bg-color-light opacity-1">
                </div>
            </div>
            <div class="row py-5 my-3">
                <div class="col text-center">
                    <a href="demo-architecture-2.html" class="d-inline-block mb-3">
                        <img alt="<?php echo $link['brand'];?>" width="115" height="30" src="<?php echo $link['logo']; ?>">
                    </a>
                    <p class="text-3 mb-0">© All Rights Reserved <?php echo $link['brand'].". ".date("Y");?></p>
                </div>
            </div>
        </div>
    </div>
</footer>