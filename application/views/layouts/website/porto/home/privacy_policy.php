<main class="main about">
    <div class="page-header page-header-bg text-left"
        style="background: 50%/cover #D4E1EA url('<?php echo base_url(); ?>upload/web/banner/page-header-bg.png');">
        <div class="container">
            <h1 class="text-white"><span class="text-white"><?php echo $link['brand'];?></span>
            <?php echo $title; ?></h1>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </div>
    </nav>
    <div class="about-section">
        <div class="container">
            <p><?php echo $description_full; ?></p>
        </div>
    </div>
</main>
