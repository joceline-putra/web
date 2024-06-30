<!--==============================
    Breadcumb
    ============================== -->
    <div class="breadcumb-wrapper" data-bg-src="<?php echo site_url(); ?>upload/penginapan.jpg">
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
        <!-- <img src="<?php #echo $asset; ?>assets/img/about/ab-2-4.png" alt="about"> -->
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