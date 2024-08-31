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
                            <li class="breadcrumb-item"><a href="<?php echo $pages['sitelink']['categories']['url']; ?>"><?php echo $pages['sitelink']['categories']['title']; ?></a></li>                            
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- shop-details-area -->
<section class="shop-details-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="shop-details-images-wrap">
                    <div class="tab-content" id="myTabContent">
                        <?php 
                        if(count($pages['sitelink']['product']['images']) > 0){
                            $images = $pages['sitelink']['product']['images'];
                            foreach($images as $i => $v){
                                $active = '';
                                if($i == 0){
                                    $active = ' active';
                                }
                            ?>
                            <div class="tab-pane show<?php echo $active;?>" id="item<?php echo $v['file_id']; ?>-tab-pane" role="tabpanel" aria-labelledby="item<?php echo $v['file_id']; ?>-tab" tabindex="0">
                                <a href="<?php echo site_url().$v['file_url']; ?>" class="popup-image">
                                    <img src="<?php echo site_url().$v['file_url']; ?>" alt="">
                                </a>
                            </div>
                            <?php 
                            }
                        }
                        ?>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php 
                            if(count($pages['sitelink']['product']['images']) > 0){
                                $images = $pages['sitelink']['product']['images'];
                                foreach($images as $i => $v){
                                    $active = '';
                                    $true = 'false';
                                    if($i == 0){
                                        $active = ' active';
                                        $true = 'true';
                                    }
                                ?>                        
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link<?php echo $active;?>" id="item<?php echo $v['file_id']; ?>-tab" data-bs-toggle="tab" data-bs-target="#item<?php echo $v['file_id']; ?>-tab-pane" type="button" role="tab" aria-controls="item<?php echo $v['file_id']; ?>-tab-pane" aria-selected="<?php echo $true;?>">
                                        <img src="<?php echo site_url().$v['file_url']; ?>" alt="" style="width:174px;">
                                    </button>
                                </li>
                            <?php 
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shop-details-content">
                    <h2 class="title"><?php echo $title; ?></h2>
                    <!-- <div class="review-wrap">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span>(4 customer reviews)</span>
                    </div> -->
                    <h3 class="price"><?php echo $pages['sitelink']['product']['stock'].' '.$pages['sitelink']['product']['unit']; ?> <span>- In stock</span></h3>
                    <!-- <div class="product-count-wrap">
                        <span class="title">Hurry Up! Sale ends in:</span>
                        <div class="coming-time" data-countdown="2024/7/6"></div>
                    </div> -->
                    <p>
                        <?php echo $pages['sitelink']['product']['content']; ?>
                    </p>
                    <!-- <div class="shop-details-qty">
                        <span class="title">Quantity :</span>
                        <div class="shop-details-qty-inner">
                            <form action="#">
                                <div class="cart-plus-minus">
                                    <input type="text" value="1">
                                </div>
                            </form>
                            <button class="purchase-btn">PURCHASE</button>
                        </div>
                    </div> -->
                    <?php 
                     $phone = $link['contact']['phone'][0]['phone'];
                        $wa = "https://wa.me/".$phone;
                        $wa = "https://api.whatsapp.com/send?phone=".$phone."&text=halo,%20saya%20tertarik%20dengan%20ini%20".$pages['final_url']."";
                    ?>
                    <a href="<?php echo $wa; ?>" class="buy-btn" target="_blank"><i class="fab fa-whatsapp"></i>Tanya Produk Ini</a>
                    <!-- <div class="payment-method-wrap"> -->
                        <!-- <span class="title">GUARANTEED SAFE CHECKOUT:</span> -->
                        <!-- <img src="<?php #echo $asset; ?>assets/img/product/payment_method.png" alt=""> -->
                    <!-- </div> -->
                    <!-- <div class="shop-add-Wishlist">
                        <a href="<?php #echo $asset; ?>#"><i class="far fa-heart"></i>Add to Wishlist</a>
                    </div> -->
                    <div class="sd-sku">
                        <span class="title">Kode:</span>
                        <a href="#"><?php echo $pages['sitelink']['product']['code']; ?></a>
                    </div>
                    <div class="sd-category">
                        <span class="title">Kategori:</span>
                        <ul class="list-wrap">
                            <li><a href="<?php echo $pages['sitelink']['categories']['url']; ?>"><?php echo $pages['sitelink']['categories']['title']; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-12">
                <div class="product-desc-wrap">
                    <ul class="nav nav-tabs" id="descriptionTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" type="button" role="tab" aria-controls="description-tab-pane" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Reviews (0)</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="descriptionTabContent">
                        <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
                            <div class="product-description-content">
                                <p>committed are products that have been produced using sustainable fibers or processes, reducing their environmental impact. Umino’s goal is to support the implementation of practices more committed to the environment. I am like a freight train. Working on the details, twisting and playing with them over the years, but always staying on the same track I design from instinct. It’s the only way I know how to live.</p>
                                <ul class="list-wrap">
                                    <li>Committed are products that have been produced</li>
                                    <li>It’s the only way I know how to live.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                            <div class="product-desc-review">
                                <div class="product-desc-review-title mb-15">
                                    <h5 class="title">Customer Reviews (0)</h5>
                                </div>
                                <div class="left-rc">
                                    <p>No reviews yet</p>
                                </div>
                                <div class="right-rc">
                                    <a href="<?php echo $asset; ?>#">Write a review</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</section>
<!-- shop-details-area-end -->

<!-- product-area -->
<section class="related-product-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <span class="sub-title">Organic Shop</span>
                    <h2 class="title">Related Products</h2>
                    <div class="title-shape" data-background="<?php echo $asset; ?>assets/img/images/title_shape.png"></div>
                </div>
            </div>
        </div>
        <div class="product-item-wrap-three">
            <div class="row justify-content-center rp-active">
                <div class="col-xl-3">
                    <div class="product-item-three inner-product-item">
                        <div class="product-thumb-three">
                            <a href="<?php echo $asset; ?>shop-details.html"><img src="<?php echo $asset; ?>assets/img/product/inner_product01.png" alt=""></a>
                            <span class="batch">New<i class="fas fa-star"></i></span>
                        </div>
                        <div class="product-content-three">
                            <a href="<?php echo $asset; ?>shop.html" class="tag">organic</a>
                            <h2 class="title"><a href="<?php echo $asset; ?>shop-details.html">roast chicken</a></h2>
                            <h2 class="price">$4.99</h2>
                            <div class="product-cart-wrap">
                                <form action="#">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="1">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="product-shape-two">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                <path d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z" transform="translate(-309 -3802)" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="product-item-three inner-product-item">
                        <div class="product-thumb-three">
                            <a href="<?php echo $asset; ?>shop-details.html"><img src="<?php echo $asset; ?>assets/img/product/inner_product02.png" alt=""></a>
                            <span class="batch">New<i class="fas fa-star"></i></span>
                        </div>
                        <div class="product-content-three">
                            <a href="<?php echo $asset; ?>shop.html" class="tag">organic</a>
                            <h2 class="title"><a href="<?php echo $asset; ?>shop-details.html">Venison meat</a></h2>
                            <h2 class="price">$4.99</h2>
                            <div class="product-cart-wrap">
                                <form action="#">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="1">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="product-shape-two">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                <path d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z" transform="translate(-309 -3802)" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="product-item-three inner-product-item">
                        <div class="product-thumb-three">
                            <a href="<?php echo $asset; ?>shop-details.html"><img src="<?php echo $asset; ?>assets/img/product/inner_product03.png" alt=""></a>
                            <span class="batch">New<i class="fas fa-star"></i></span>
                        </div>
                        <div class="product-content-three">
                            <a href="<?php echo $asset; ?>shop.html" class="tag">organic</a>
                            <h2 class="title"><a href="<?php echo $asset; ?>shop-details.html">processed meat</a></h2>
                            <h2 class="price">$4.99</h2>
                            <div class="product-cart-wrap">
                                <form action="#">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="1">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="product-shape-two">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                <path d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z" transform="translate(-309 -3802)" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="product-item-three inner-product-item">
                        <div class="product-thumb-three">
                            <a href="<?php echo $asset; ?>shop-details.html"><img src="<?php echo $asset; ?>assets/img/product/inner_product04.png" alt=""></a>
                            <span class="batch">New<i class="fas fa-star"></i></span>
                        </div>
                        <div class="product-content-three">
                            <a href="<?php echo $asset; ?>shop.html" class="tag">organic</a>
                            <h2 class="title"><a href="<?php echo $asset; ?>shop-details.html">roast chicken</a></h2>
                            <h2 class="price">$4.99</h2>
                            <div class="product-cart-wrap">
                                <form action="#">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="1">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="product-shape-two">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                <path d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z" transform="translate(-309 -3802)" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="product-item-three inner-product-item">
                        <div class="product-thumb-three">
                            <a href="<?php echo $asset; ?>shop-details.html"><img src="<?php echo $asset; ?>assets/img/product/inner_product05.png" alt=""></a>
                            <span class="batch">New<i class="fas fa-star"></i></span>
                        </div>
                        <div class="product-content-three">
                            <a href="<?php echo $asset; ?>shop.html" class="tag">organic</a>
                            <h2 class="title"><a href="<?php echo $asset; ?>shop-details.html">Venison meat</a></h2>
                            <h2 class="price">$4.99</h2>
                            <div class="product-cart-wrap">
                                <form action="#">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="1">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="product-shape-two">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                <path d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z" transform="translate(-309 -3802)" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-area-end -->

</main>