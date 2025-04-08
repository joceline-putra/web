<main class="main">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $pages['sitelink']['home']['url']; ?>"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item" aria-current="page"><?php echo ucfirst($link['routing']['product']);?></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-9">
                <!-- <div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url('<?php echo $asset; ?>assets/images/banners/banner-top.jpg');">
                    <div class="row">
                        <div class="pb-5 pb-md-0 col-sm-5 col-lg-5 offset-1">
                            <h3 class="mb-2 ls-10">Electronic<br>Deals</h3>
                            <a href="#" class="btn btn-dark btn-black ls-10">Get Yours!</a>
                        </div>
                        <div class="col-sm-4 offset-sm-0 offset-1">
                            <div class="coupon-sale-content">
                                <h4 class="m-b-2 coupon-sale-text bg-white ls-10 text-transform-none">Exclusive COUPON
                                </h4>
                                <h5 class="mb-2 coupon-sale-text d-block ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-dark">$100</b> OFF</h5>
                            </div>
                        </div>
                    </div>
                </div> -->

                <nav class="toolbox sticky-header mt-2" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3"
                                viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                <path
                                    d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                                <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                <path
                                    d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                            </svg>
                            <span>Filter</span>
                        </a>

                        <div class="toolbox-item toolbox-sort">
                            <label>Sort By:</label>

                            <div class="select-custom">
                                <select name="orderby" class="form-control">
                                    <option value="menu_order" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->


                        </div>
                        <!-- End .toolbox-item -->
                    </div>
                    <!-- End .toolbox-left -->

                    <div class="toolbox-right">
                        <div class="toolbox-item toolbox-show">
                            <label>Show:</label>

                            <div class="select-custom">
                                <select name="count" class="form-control">
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->
                        </div>
                        <!-- End .toolbox-item -->

                        <div class="toolbox-item layout-modes">
                            <a href="#" class="layout-btn btn-grid active" title="Grid">
                                <i class="icon-mode-grid"></i>
                            </a>
                            <a href="#" class="layout-btn btn-list" title="List">
                                <i class="icon-mode-list"></i>
                            </a>
                        </div>
                        <!-- End .layout-modes -->
                    </div>
                    <!-- End .toolbox-right -->
                </nav>

                <div id="div_load" class="row">
                    <?php 			
                    $source = $pages['sitelink']['categories']['other_product'];
                    // echo json_encode($source);
                    if(count($source) > 0){
                        $routing = $pages['sitelink']['categories']['url'];
                        foreach($source as $v){

                            // $scurl       = $routing;  
                            // $spurl       = '/'.$v['news_url']; 
                            $scurl       = $routing.'/'.$v['category_url'];  
                            $spurl       = $routing.'/'.$v['product_url'];  						 
                            $simg       = !empty($v['product_image']) ? base_url().$v['product_image'] : base_url().'upload/noimage.png'; 

                            $stitle     = !empty($v['product_name']) ? $v['product_name'] : 'Untitled';
                            $scontent   = !empty($v['product_note']) ? $v['product_note'] : 'No description available on this blog details, please update on admin panel';   
                            $scat       = !empty($v['category_name']) ? $v['category_name'] : 'Uncategory';
                            ?>                               
                    <div class="col-6 col-sm-4">
                        <div class="product-default">
                            <figure>
                                <a href="<?php echo $spurl;?>">
                                    <img src="<?php echo $simg;?>" alt="<?php echo $title; ?>" width="220px" height="220px" style="width:100%;height:220px;">
                                </a>

                                <!-- <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div> -->
                            </figure>

                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="<?php echo $scurl;?>" class="product-category"><?php echo $scat;?></a>
                                    </div>
                                </div>

                                <h3 class="product-title"> <a href="<?php echo $spurl;?>"><?php echo $stitle; ?></a> </h3>

                                <!-- <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div> -->

                                <!-- <div class="price-box">
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div> -->

                                <!-- <div class="product-action">
                                    <a href="<?php echo $spurl;?>" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="<?php echo $spurl;?>" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="<?php echo $spurl;?>" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                </div> -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <?php 
                        }
                    }?>
                </div>
                <button id="btn_load_more" type="button" class="btn btn-default btn-place-order" form="checkout-form">
                    Load more...
                </button>
                <nav class="d-none toolbox toolbox-pagination">
                    <div class="toolbox-item toolbox-show">
                        <label>Show:</label>

                        <div class="select-custom">
                            <select name="count" class="form-control">
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="36">36</option>
                            </select>
                        </div>
                        <!-- End .select-custom -->
                    </div>
                    <!-- End .toolbox-item -->

                    <ul class="pagination toolbox-item">
                        <li class="page-item disabled">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><span class="page-link">...</span></li>
                        <li class="page-item">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="sidebar-overlay"></div>
            <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                <div class="sidebar-wrapper">
                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Kategori Produk</a>
                        </h3>

                        <div class="collapse show" id="widget-body-2">
                            <div class="widget-body">
                                <ul class="cat-list">
                                <?php 			
                                $source = $pages['sitelink']['categories']['result'];
                                if(count($source) > 0){
                                    // $routing = $pages['sitelink']['categories']['url'];
                                    foreach($source as $v){

                                        // $scurl       = $routing;  
                                        $spurl       = $v['category_url'];  
                                        // $simg       = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url().'upload/noimage.png'; 

                                        // $stitle     = !empty($v['news_title']) ? $v['news_title'] : 'Untitled';
                                        // $scontent   = !empty($v['news_short']) ? $v['news_short'] : 'No description available on this blog details, please update on admin panel';   
                                        $scount     = !empty($v['category_count_data']) ? $v['category_count_data'] : '0';
                                        $scat       = !empty($v['category_name']) ? $v['category_name'] : 'Uncategory';
                                        ?>  
                                    <li><a href="<?php echo $spurl;?>"><?php echo $scat;?></a><span class="products-count">(<?php echo $scount;?>)</span></li>
                                    <?php 
                                    }
                                }
                                    ?>
                                </ul>
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div>
                    <!-- End .widget -->

                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Harga</a>
                        </h3>

                        <div class="collapse show" id="widget-body-3">
                            <div class="widget-body pb-0">
                                <form action="#">
                                    <div class="price-slider-wrapper">
                                        <div id="price-slider"></div>
                                    </div>
                                    <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                        <div class="filter-price-text">
                                            Price:
                                            <span id="filter-price-range"></span>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-color">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true" aria-controls="widget-body-4">Warna</a>
                        </h3>

                        <div class="collapse show" id="widget-body-4">
                            <div class="widget-body pb-0">
                                <ul class="config-swatch-list">
                                    <li class="active">
                                        <a href="#" style="background-color: #000;"></a>
                                    </li>
                                    <li>
                                        <a href="#" style="background-color: #0188cc;"></a>
                                    </li>
                                    <li>
                                        <a href="#" style="background-color: #81d742;"></a>
                                    </li>
                                    <li>
                                        <a href="#" style="background-color: #6085a5;"></a>
                                    </li>
                                    <li>
                                        <a href="#" style="background-color: #ab6e6e;"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-size">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true" aria-controls="widget-body-5">Ukuran</a>
                        </h3>
                        <div class="collapse show" id="widget-body-5">
                            <div class="widget-body pb-0">
                                <ul class="config-size-list">
                                    <li class="active"><a href="#">XL</a></li>
                                    <li><a href="#">L</a></li>
                                    <li><a href="#">M</a></li>
                                    <li><a href="#">S</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-none widget widget-featured">
                        <h3 class="widget-title">Produk Lainnya</h3>

                        <div class="widget-body">
                            <div class="owl-carousel widget-featured-products">
                                <div class="featured-col">
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="<?php echo $asset; ?>assets/images/products/small/product-4.jpg" width="75" height="75" alt="product" />
                                                <img src="<?php echo $asset; ?>assets/images/products/small/product-4-2.jpg" width="75" height="75" alt="product" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="product.html">Blue Backpack for
                                                    the Young - S</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="<?php echo $asset; ?>assets/images/products/small/product-5.jpg" width="75" height="75" alt="product" />
                                                <img src="<?php echo $asset; ?>assets/images/products/small/product-5-2.jpg" width="75" height="75" alt="product" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="product.html">Casual Spring Blue
                                                    Shoes</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="<?php echo $asset; ?>assets/images/products/small/product-6.jpg" width="75" height="75" alt="product" />
                                                <img src="<?php echo $asset; ?>assets/images/products/small/product-6-2.jpg" width="75" height="75" alt="product" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="product.html">Men Black Gentle
                                                    Belt</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-block">
                        <h3 class="widget-title">Custom HTML Block</h3>
                        <h5>This is a custom sub-title.</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus </p>
                    </div>
                </div>
                <!-- End .sidebar-wrapper -->
            </aside>
        </div>
    </div>
    <div class="mb-4"></div>
</main>