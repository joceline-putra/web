<section class="page-header page-header-modern bg-color-grey page-header-md">
	<div class="container">
		<div class="row">
			<div class="col-md-12 align-self-center p-static order-2 text-center">
				<h1 class="text-dark font-weight-bold text-8"><?php echo $title; ?></h1>
				<span class="sub-title text-dark"><?php echo ucfirst($link['routing']['project']);?></span>
			</div>
		</div>
	</div>
</section>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo $pages['sitelink']['home']['url']; ?>"><i class="icon-home"></i></a></li>
				<li class="breadcrumb-item" aria-current="page"><?php echo $link['routing']['project'];?></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
			</ol>
		</div>
	</nav>    
    <div class="container"> 
        <div class="row mb-8 ">
            <div class="col-lg-3 ">
                <h4 class="text-uppercase heading-bottom-border mt-6 mt-lg-4 ">Other Projects</h4>
                <div class="product-default left-details product-widget ">
                    <figure>
                        <a href="product.html">
                            <img src="<?php echo $asset;?>assets/images/products/small/product-1.jpg" width="84 " height="84 "
                                alt="product ">
                            <img src="<?php echo $asset;?>assets/images/products/small/product-1-2.jpg" width="84 " height="84 "
                                alt="product ">
                        </a>
                    </figure>
                    <div class="product-details ">
                        <h3 class="product-title "> <a href="product.html">Porto Extended Camera</a> </h3>
                        <div class="ratings-container ">
                            <div class="product-ratings ">
                                <span class="ratings " style="width:100% "></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top "></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .product-container -->
                        <div class="price-box ">
                            <span class="product-price ">$49.00</span>
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
                <div class="product-default left-details product-widget ">
                    <figure>
                        <a href="product.html">
                            <img src="<?php echo $asset;?>assets/images/products/small/product-4.jpg" width="84 " height="84 "
                                alt="product ">
                            <img src="<?php echo $asset;?>assets/images/products/small/product-4-2.jpg" width="84 " height="84 "
                                alt="product ">
                        </a>
                    </figure>
                    <div class="product-details ">
                        <h3 class="product-title "> <a href="product.html">Blue BackPack</a> </h3>
                        <div class="ratings-container ">
                            <div class="product-ratings ">
                                <span class="ratings " style="width:100% "></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top "></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .product-container -->
                        <div class="price-box ">
                            <span class="product-price ">$49.00</span>
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
                <div class="product-default left-details product-widget ">
                    <figure>
                        <a href="product.html">
                            <img src="<?php echo $asset;?>assets/images/products/small/product-5.jpg" width="84 " height="84 "
                                alt="product ">
                            <img src="<?php echo $asset;?>assets/images/products/small/product-5-2.jpg" width="84 " height="84 "
                                alt="product ">
                        </a>
                    </figure>
                    <div class="product-details ">
                        <h3 class="product-title "> <a href="product.html">Casual Blue Shoes</a> </h3>
                        <div class="ratings-container ">
                            <div class="product-ratings ">
                                <span class="ratings " style="width:100% "></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top "></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .product-container -->
                        <div class="price-box ">
                            <span class="product-price ">$49.00</span>
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
            </div>
            <div class="col-lg-9 ">
                <h4 class="text-uppercase heading-bottom-border mt-4"><?php echo $title;?></h4>
                <div class="row mt-2 row-joined product-nogap">
                    <?php 			
                    $source = $pages['sitelink']['images'];
                    if(count($source) > 0){
                        foreach($source as $v){						 
                            $simg       = $v['file_url']; 
                            $stitle     = $pages['sitelink']['project']['title'];
                            ?>   		                          
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="<?php echo $simg;?>" target="_blank">
                                    <img src="<?php echo $simg;?>" style="width:100%;height:162px;" alt="<?php echo $stitle;?>">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="<?php echo $simg;?>" class="btn-quickview" title="Quick View">Zoom
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="<?php echo $simg;?>" target="_blank"><?php echo $stitle;?></a>
                                </h3>
                            </div>
                        </div>
                    </div>                
                    <?php 
                        }
                    }
                    ?>  
                </div>                
            </div>
        </div>
    </div>

</main><!-- End .main -->
