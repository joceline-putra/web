<!-- main-area -->
<main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="<?php echo $asset;?>assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title"><?php echo $title; ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <section class="services-area services-bg" data-background="assets/img/bg/services_bg.jpg">
        <div class="choose-bg-shape services-shape" data-background="assets/img/images/choose_bg_shape.png"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="services-content">
                        <?php echo $description; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>    

</main>