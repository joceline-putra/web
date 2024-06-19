<!--==============================
    Breadcumb
    ============================== -->
<div class="breadcumb-wrapper" data-bg-src="<?php echo $asset; ?>assets/img/breadcumb/breadcumb-bg.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php echo $title; ?></h1>
            <p class="breadcumb-text">
                <?php echo $short; ?>
            </p>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><?php echo $title; ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="space-top space-extra-bottom z-index-common overflow-hidden">
    <div class="about-overlay--style2 position-absolute start-0 bottom-0">
        <img src="<?php echo $asset; ?>assets/img/about/ab-2-4.png" alt="about">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-area text-center">
                    <span class="sec-icon">
                        <img src="<?php echo site_url(); ?>upload/branch/default_logo.png" alt="icon">
                    </span>
                    <!-- <span class="sec-subtitle2">WELCOME TO OUR COMPANY</span>
                    <h2 class="sec-title">
                        WE ARE QUALIFIED IN EVERY WORKING DEPARTMENTS
                    </h2> -->
                </div>
            </div>
            <div class="col-lg-12">
                <div class="about-content">
                    <?php echo $description; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==============================
  About Area
  ==============================-->
<!-- <section class="space-top space-extra-bottom z-index-common overflow-hidden">
    <div class="about-overlay--style2 position-absolute start-0 bottom-0">
        <img src="<?php echo $asset; ?>assets/img/about/ab-2-4.png" alt="about">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-area text-center">
                    <span class="sec-icon">
                        <img src="<?php echo $asset; ?>assets/img/icons/logo-icon.png" alt="icon">
                    </span>
                    <span class="sec-subtitle2">WELCOME TO OUR COMPANY</span>
                    <h2 class="sec-title">
                        WE ARE QUALIFIED IN EVERY WORKING DEPARTMENTS
                    </h2>
                </div>
            </div>
        </div>
        <div class="row gx-60">
            <div class="col-lg-6">
                <div class="img-box1--style2">
                    <div class="img-box1__left">
                        <div class="img-box1__img1">
                            <img src="<?php echo $asset; ?>assets/img/about/ab-2-1.jpg" alt="about">
                        </div>
                        <div class="counter-box--style1">
                            <span class="counter-box__number">3526</span>
                            <h3 class="counter-box__title">STARTED JOURNEY</h3>
                        </div>
                    </div>
                    <div class="img-box1__right">
                        <div class="img-box1__img2">
                            <img src="<?php echo $asset; ?>assets/img/about/ab-2-2.jpg" alt="about">
                        </div>
                        <div class="img-box1__img3">
                            <img src="<?php echo $asset; ?>assets/img/about/ab-2-3.jpg" alt="about">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <span class="sec-subtitle5">WHO WE ARE?</span>
                    <p class="sec-text">We successfully cope with tasks of varying complexity, provide
                        long-term guarantees and regularly master new technologies. Our portfolio includes dozens of successfully
                        completed projects of houses.</p>
                    <span class="sec-subtitle5">WHAT WE DO!</span>
                    <div class="list-style4">
                        <ul class="list-unstyled">
                            <li>Geographical diversity, project complexity</li>
                            <li>Whether building on land or over water</li>
                            <li>Construction companies respond to the unique needs</li>
                            <li>Emerjency Solution Anytime</li>
                        </ul>
                    </div>
                    <div class="signature-box--style1">
                        <div class="signature-box__img">
                            <img src="<?php echo $asset; ?>assets/img/about/avatar-2-1.jpg" alt="Avatar 2 1">
                        </div>
                        <div class="signature-box__content">
                            <h4 class="signature-box__title">Rodja Hartmann</h4>
                            <span class="signature-box__desig">Director of Company</span>
                            <img src="<?php echo $asset; ?>assets/img/about/ab-2-5.png" alt="Avatar 2 1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--==============================
  Service Area
  ==============================-->
<!-- <section class="service--layout4 space-top space-extra-bottom">
    <div class="container">
        <div class="title-area text-center">
            <span class="sec-icon">
                <img src="<?php echo $asset; ?>assets/img/icons/logo-icon.png" alt="icon">
            </span>
            <span class="sec-subtitle2">QUALITY SERVICING OPPORTUNITY</span>
            <h2 class="sec-title">QUALITY SERVICES</h2>
        </div>
        <div class="vs-carousel" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true" data-md-dots="true" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-center-mode="true">
            <div>
                <div class="service-block" data-bg-src="<?php echo $asset; ?>assets/img/textures/service-block-bg.png">
                    <div class="service-block__icon">
                        <img src="<?php echo $asset; ?>assets/img/icons/service-icon-1-1.svg" alt="icon">
                    </div>
                    <h3 class="service-block__title h4">
                        <a class="service-block__title__link" href="service-details.html">General Construction</a>
                    </h3>
                    <p class="service-block__text">Lorem ipsum dolor sit amet, conse auctor aliquet. Aenean sollicitudi, lo
                        bibendum auctor.</p>
                    <a href="service-details.html" class="service-block__link">
                        <svg width="30.002" height="7.002" viewBox="0 0 30.002 7.002">
                        <path d="M573.251,2284.12H547v-1.24h26.251V2280q1.875,1.756,3.751,3.515l-3.726,3.473-.025.014Z" transform="translate(-547 -2279.996)" />
                        </svg>
                    </a>
                    <div class="service-block__shape">
                        <svg width="372.006" height="87" viewBox="0 0 372.006 87">
                        <g transform="translate(-374.997 -2256)">
                        <path d="M448.062,2278.9l50.349,19.889-98.825,28.254-18.356,4.685Z" fill="#f0f0f0" />
                        <path d="M665.6,2256l81.4,86.332L432.178,2343,375,2341.7Z" fill="#f0f0f0" />
                        </g>
                        </svg>
                    </div>
                </div>
            </div>
            <div>
                <div class="service-block" data-bg-src="<?php echo $asset; ?>assets/img/textures/service-block-bg.png">
                    <div class="service-block__icon">
                        <img src="<?php echo $asset; ?>assets/img/icons/service-icon-1-2.svg" alt="icon">
                    </div>
                    <h3 class="service-block__title h4">
                        <a class="service-block__title__link" href="service-details.html">General Construction</a>
                    </h3>
                    <p class="service-block__text">Lorem ipsum dolor sit amet, conse auctor aliquet. Aenean sollicitudi, lo
                        bibendum auctor.</p>
                    <a href="service-details.html" class="service-block__link">
                        <svg width="30.002" height="7.002" viewBox="0 0 30.002 7.002">
                        <path d="M573.251,2284.12H547v-1.24h26.251V2280q1.875,1.756,3.751,3.515l-3.726,3.473-.025.014Z" transform="translate(-547 -2279.996)" />
                        </svg>
                    </a>
                    <div class="service-block__shape">
                        <svg width="372.006" height="87" viewBox="0 0 372.006 87">
                        <g transform="translate(-374.997 -2256)">
                        <path d="M448.062,2278.9l50.349,19.889-98.825,28.254-18.356,4.685Z" fill="#f0f0f0" />
                        <path d="M665.6,2256l81.4,86.332L432.178,2343,375,2341.7Z" fill="#f0f0f0" />
                        </g>
                        </svg>
                    </div>
                </div>
            </div>
            <div>
                <div class="service-block" data-bg-src="<?php echo $asset; ?>assets/img/textures/service-block-bg.png">
                    <div class="service-block__icon">
                        <img src="<?php echo $asset; ?>assets/img/icons/service-icon-1-3.svg" alt="icon">
                    </div>
                    <h3 class="service-block__title h4">
                        <a class="service-block__title__link" href="service-details.html">Quality Materials</a>
                    </h3>
                    <p class="service-block__text">Lorem ipsum dolor sit amet, conse auctor aliquet. Aenean sollicitudi, lo
                        bibendum auctor.</p>
                    <a href="service-details.html" class="service-block__link">
                        <svg width="30.002" height="7.002" viewBox="0 0 30.002 7.002">
                        <path d="M573.251,2284.12H547v-1.24h26.251V2280q1.875,1.756,3.751,3.515l-3.726,3.473-.025.014Z" transform="translate(-547 -2279.996)" />
                        </svg>
                    </a>
                    <div class="service-block__shape">
                        <svg width="372.006" height="87" viewBox="0 0 372.006 87">
                        <g transform="translate(-374.997 -2256)">
                        <path d="M448.062,2278.9l50.349,19.889-98.825,28.254-18.356,4.685Z" fill="#f0f0f0" />
                        <path d="M665.6,2256l81.4,86.332L432.178,2343,375,2341.7Z" fill="#f0f0f0" />
                        </g>
                        </svg>
                    </div>
                </div>
            </div>
            <div>
                <div class="service-block" data-bg-src="<?php echo $asset; ?>assets/img/textures/service-block-bg.png">
                    <div class="service-block__icon">
                        <img src="<?php echo $asset; ?>assets/img/icons/service-icon-1-3.svg" alt="icon">
                    </div>
                    <h3 class="service-block__title h4">
                        <a class="service-block__title__link" href="service-details.html">Quality Materials</a>
                    </h3>
                    <p class="service-block__text">Lorem ipsum dolor sit amet, conse auctor aliquet. Aenean sollicitudi, lo
                        bibendum auctor.</p>
                    <a href="service-details.html" class="service-block__link">
                        <svg width="30.002" height="7.002" viewBox="0 0 30.002 7.002">
                        <path d="M573.251,2284.12H547v-1.24h26.251V2280q1.875,1.756,3.751,3.515l-3.726,3.473-.025.014Z" transform="translate(-547 -2279.996)" />
                        </svg>
                    </a>
                    <div class="service-block__shape">
                        <svg width="372.006" height="87" viewBox="0 0 372.006 87">
                        <g transform="translate(-374.997 -2256)">
                        <path d="M448.062,2278.9l50.349,19.889-98.825,28.254-18.356,4.685Z" fill="#f0f0f0" />
                        <path d="M665.6,2256l81.4,86.332L432.178,2343,375,2341.7Z" fill="#f0f0f0" />
                        </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!--
<section class="space-top space-extra-bottom z-index-common overflow-hidden">
    <div class="element--history position-absolute bottom-0 z-index-n1">
        <img src="<?php echo $asset; ?>assets/img/about/ab-4-1.png" alt="about">
    </div>
    <div class="container">
        <div class="row align-items-end justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="title-area">
                    <span class="sec-subtitle2">COMPANY HISTORY</span>
                    <h2 class="sec-title">
                        A TEAM OF RELIABLE AND EXPERIENCED CONTRACTORS
                    </h2>
                </div>
                <div class="history-style d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">1990</button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">2010</button>
                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">2010</button>
                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">2018</button>
                        <button class="nav-link" id="v-pills-2022-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2022" type="button" role="tab" aria-controls="v-pills-2022" aria-selected="false">2022</button>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <div class="history-block">
                                <h3 class="history-block__title">Provide Guaranteed Quality in Construction</h3>
                                <p class="history-block__text">Lorem ipsum dolor sit amet, consectetur adip
                                    iscing elit, sed do eiusmod tempor incididunt ut
                                    dolore magna aliqua.
                                </p>
                                <span class="history-block__year">1990</span>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                            <div class="history-block">
                                <h3 class="history-block__title">Provide Guaranteed Quality in Construction</h3>
                                <p class="history-block__text">Lorem ipsum dolor sit amet, consectetur adip
                                    iscing elit, sed do eiusmod tempor incididunt ut
                                    dolore magna aliqua.
                                </p>
                                <span class="history-block__year">2010</span>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                            <div class="history-block">
                                <h3 class="history-block__title">Provide Guaranteed Quality in Construction</h3>
                                <p class="history-block__text">Lorem ipsum dolor sit amet, consectetur adip
                                    iscing elit, sed do eiusmod tempor incididunt ut
                                    dolore magna aliqua.
                                </p>
                                <span class="history-block__year">2010</span>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
                            <div class="history-block">
                                <h3 class="history-block__title">Provide Guaranteed Quality in Construction</h3>
                                <p class="history-block__text">Lorem ipsum dolor sit amet, consectetur adip
                                    iscing elit, sed do eiusmod tempor incididunt ut
                                    dolore magna aliqua.
                                </p>
                                <span class="history-block__year">2018</span>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-2022" role="tabpanel" aria-labelledby="v-pills-2022-tab" tabindex="0">
                            <div class="history-block">
                                <h3 class="history-block__title">Provide Guaranteed Quality in Construction</h3>
                                <p class="history-block__text">Lorem ipsum dolor sit amet, consectetur adip
                                    iscing elit, sed do eiusmod tempor incididunt ut
                                    dolore magna aliqua.
                                </p>
                                <span class="history-block__year">2022</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-8 col-md-9">
                <div class="history-img">
                    <img src="<?php echo $asset; ?>assets/img/about/ab-4-2.jpg" alt="about">
                </div>
            </div>
        </div>
    </div>
</section> 
-->
<!--
<section class="vsfaqs--layout1 space-top space-extra-bottom z-index-common">
    <div class="vsfaqs__img1">
        <img src="<?php echo $asset; ?>assets/img/faq/faq-1-3.png" alt="">
    </div>
    <div class="container">
        <div class="row gx-60">
            <div class="col-lg-6">
                <span class="sec-subtitle2">BIGGER, BETTER, FASTER</span>
                <h2 class="sec-title">LEADERSHIP IN THE CONSTRUCTION</h2>
                <div class="vsfaqs-accordion">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="accordion-button__number">1</span>Early Engagement
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, conse auctor aliquet Aene
                                    sollicitudi, lobibendum auctor.Lorem ipsum dolor sit am
                                    et, conse auctor aliquet.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="accordion-button__number">2</span>Factory Manufacture
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, conse auctor aliquet Aene
                                    sollicitudi, lobibendum auctor.Lorem ipsum dolor sit am
                                    et, conse auctor aliquet.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="accordion-button__number">3</span>Metal Engineering
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, conse auctor aliquet Aene
                                    sollicitudi, lobibendum auctor.Lorem ipsum dolor sit am
                                    et, conse auctor aliquet.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <span class="accordion-button__number">4</span>Roof Renovation
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, conse auctor aliquet Aene
                                    sollicitudi, lobibendum auctor.Lorem ipsum dolor sit am
                                    et, conse auctor aliquet.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="vsfaqs-img">
                    <div class="vsfaqs-img__img1">
                        <img src="<?php echo $asset; ?>assets/img/faq/faq-1-1.jpg" alt="faq 1">
                    </div>
                    <div class="vsfaqs-img__img2">
                        <img src="<?php echo $asset; ?>assets/img/faq/faq-1-2.jpg" alt="faq 1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->