        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="<?php echo $asset; ?>assets/img/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title"><?php echo $title; ?></h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('produk'); ?>">Produk</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- shop-area -->
            <section class="shop-area shop-bg" data-background="<?php echo $asset; ?>assets/img/bg/shop_bg.jpg">
                <div class="container custom-container-five">
                    <div class="shop-inner-wrap">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="shop-top-wrap">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="shop-showing-result">
                                                <?php 
                                                $res = $pages['sitelink']['categories']['other_count'];
                                                if($res > 0){
                                                ?>
                                                <p>Showing 1–8 of <?php echo $pages['sitelink']['categories']['other_count'];?> results</p>
                                                <?php 
                                                }else{
                                                    echo '<p>Data tidak ada</p>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <div class="shop-ordering">
                                                <select name="orderby" class="orderby">
                                                    <option value="Default sorting">Sort by Top Rating</option>
                                                    <option value="Sort by popularity">Sort by popularity</option>
                                                    <option value="Sort by average rating">Sort by average rating</option>
                                                    <option value="Sort by latest">Sort by latest</option>
                                                    <option value="Sort by latest">Sort by latest</option>
                                                </select>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="shop-item-wrap">
                                    <div id="div_product" class="row justify-content-center">
                                        <?php 
                                        if(count($pages['sitelink']['categories']['other_product']) > 0){
                                            $res = $pages['sitelink']['categories']['other_product'];
                                            foreach($res as $v){
                                                $curl = site_url('produk').'/'.$v['category_url'];
                                                $surl = site_url('produk').'/'.$v['category_url'].'/'.$v['product_url'];
                                            ?>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="product-item-three inner-product-item" style="height:420px;">
                                                    <div class="product-thumb-three">
                                                        <a href="<?php echo $surl; ?>"><img src="<?php echo base_url().$v['product_image'];?>" alt=""></a>
 
                                                    </div>
                                                    <div class="product-content-three">
                                                        <a href="<?php echo $curl; ?>" class="tag"><?php echo $v['category_name']; ?></a>
                                                        <h2 class="title"><a href="<?php echo $surl; ?>"><?php echo strtolower($v['product_name']); ?></a></h2>
                                                        <h2 class="price"><?php echo number_format($v['product_price_sell'],0,'.',',').' / '.$v['product_unit']; ?></h2>
                                                        <?php 
                                                        if($v['product_stock'] < 1){
                                                        ?>
                                                        <span class="batch">Stok Habis
                                                        <?php 
                                                        } 
                                                        ?>   
                                                        <!-- <div class="product-cart-wrap">
                                                            <form action="#">
                                                                <div class="cart-plus-minus">
                                                                    <i class="fas fa-star"></i></span>
                                                                    <input type="text" value="1">
                                                                </div>
                                                            </form>
                                                        </div> -->
                                                    </div>
                                                    <div class="product-shape-two">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                                            <path d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z" transform="translate(-309 -3802)" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php 
                                    $res = $pages['sitelink']['categories']['other_count'];
                                    if($res > 0){
                                    ?>
                                    <div class="col-lg-12">
                                        <div id="div_product_loading" class="shop-details-content">
                                            <a href="#" id="btn_load_more" class="buy-btn" data-total-row="<?php echo $pages['sitelink']['categories']['other_count'];?>">
                                                Load more
                                            </a>
                                        </div>
                                    </div>
                                    <?php 
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- shop-area-end -->

        </main>
        <!-- main-area-end -->
