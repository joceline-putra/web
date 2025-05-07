<main class="main about">
    <!-- <div class="page-header page-header-bg text-left"
        style="background: 50%/cover #D4E1EA url('<?php echo $asset; ?>assets/images/page-header-bg.jpg');">
        <div class="container">
            <h1><span><?php echo $link['brand'];?></span>
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
    </nav> -->

    <!-- ✅ Coverage Area -->
    <section class="feature-boxes-container mb-8" style="background-color:#2c93d0;">
        <div class="container p-4">

            <div class="row">
                <!-- <div class="col-lg-4">
                    <h2 class="mt-6 mb-2">Pilih Kota Anda</h2>
                    <form id="form_coverage" name="form_contact" class="mb-0" action="#">
                        <div class="form-group">
                            <label class="mb-1" for="contact-name">Cari
                            <span class="required">*</span></label>
                            <select id="coverage_search" name="coverage_search" class="form-control">
                                <option value="0">Cari</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="contact-name">Provinsi
                            <span class="required">*</span></label>
                            <select id="coverage_province" name="coverage_province" class="form-control">
                                <option value="pilihan1">Pilihan 1</option>
                                <option value="pilihan2">Pilihan 2</option>
                                <option value="pilihan3">Pilihan 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="contact-name">Kota
                            <span class="required">*</span></label>
                            <select id="coverage_city" name="coverage_city" class="form-control">
                                <option value="pilihan1">Pilihan 1</option>
                                <option value="pilihan2">Pilihan 2</option>
                                <option value="pilihan3">Pilihan 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="contact-name">Kecamatan
                            <span class="required">*</span></label>
                            <select id="coverage_district" name="coverage_district" class="form-control">
                                <option value="pilihan1">Pilihan 1</option>
                                <option value="pilihan2">Pilihan 2</option>
                                <option value="pilihan3">Pilihan 3</option>
                            </select>
                        </div>
                        <div class="form-footer mb-0">
                            <button id="btn_coverage" type="button" class="btn btn-dark font-weight-normal">
                                <i class="fas fa-paper-plane"></i> Lihat
                            </button>
                        </div>
                    </form>
                </div>   -->
                <!-- <div class="col-lg-offset-3 col-lg-3">
                </div>
                <div class="col-lg-3">
                    <h2 class="mt-6 mb-1">Jaringan Kami</h2>
                    <p>
                    Silahkan hubungi kami untuk pertanyaan dan kerjasama. Kami senang mendengar dari anda.
                    <br>
                    <address>
                        <i class="fas fa-map-marker"></i> Alamat<br>
                            <?php echo $link['contact']['address']['office'].', '.$link['contact']['address']['city'];?>
                            <br><br>
                        <i class="fas fa-inbox"></i> Email<br>
                            <?php 
                            if(!empty($link['contact']['email'][0]['email'])){ ?> 
                                <a href="mailto:<?php echo $link['contact']['email'][0]['email'];?>" target="_blank" class="text-dark font1"><?php echo $link['contact']['email'][0]['email'];?>
                                </a>  
                            <?php 
                            } else {
                                echo '-';
                            }
                            ?>   <br><br>
                        <i class="fas fa-phone"></i> Telepon<br>
                            <?php 
                            if(!empty($link['contact']['phone'][0]['phone'])){ ?> 
                                <a href="tel:<?php echo $link['contact']['phone'][0]['phone'];?>" target="_blank" class="text-dark font1"><?php echo $link['contact']['phone'][0]['phone'];?>
                                </a>  
                            <?php 
                            } else {
                                echo '-';
                            }
                            ?><br><br>       
                        <i class="fab fa-whatsapp"></i> WhatsApp<br>
                            <?php 
                            if(!empty($link['contact']['phone'][1]['phone'])){ ?> 
                                <a href="https://wa.me/<?php echo $link['contact']['phone'][1]['phone'];?>?text=Halo,%20saya%20tertarik%20dengan%20informasi%20produk%20Mega%20Data%20" target="_blank" class="text-dark font1"><?php echo $link['contact']['phone'][1]['phone'];?>
                                </a>  
                            <?php 
                            } else {
                                echo '-';
                            }
                            ?>     
                    </address> 
                </div>-->
                <section class="kenBurns-section pt-5">
                    <h2 class="text-center">Coverage Area</h2>
                    <p class="text-center text-white">Silahkan lihat apakah area anda tercover oleh jaringan Megadata</p>
                    <div class="row">
                        <div class="col-lg-offset-3 col-lg-3 col-xs-12">
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <p class="text-center">
                                <div class="form-group">
                                    <label class="mb-1" for="contact-name">Cari Kota Anda
                                    <span class="required">*</span></label>
                                    <select id="coverage_search" name="coverage_search" class="form-control">
                                        <option value="0">Cari</option>
                                    </select>
                                </div>
                            </p>
                        </div>
                    </div>
                    <div class="banner ken-banner" style="background: #e2e2e0">
                        <figure class="kenBurnsToUp" style="animation-duration: 20s">
                            <img class="slide-bg" src="<?php echo base_url('upload/web/coverage_area/map1.png');?>" alt="slider image" width="1200" height="575" style="background-color: #ccc;">
                        </figure>
                        <div class="container">
                            <div class="banner-layer banner-layer-middle banner-layer-left">
                                <div class="appear-animate animated fadeInLeftShorter appear-animation-visible" data-animation-name="fadeInLeftShorter" data-animation-delay="200" style="animation-duration: 1000ms;">
                                    <h2 class="font-weight-light ls-10"></h2>
                                    <a href="#" class="btn btn-link"><i class="icon-right-open-big"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>                   
            </div>
        </div>
    </section>


    <section class="gallery-section py-5">
        <div class="container">
            <h2 class="text-center mb-4">Our Network Infrastructure</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-4 text-center">
                    <div class="bg-light p-3 rounded">
                        <img src="<?php echo base_url('upload/noimage.png'); ?>" alt="No Picture" class="img-fluid rounded mb-2" style="max-height: 200px;">
                        <p class="text-muted">Network Infrastructure</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4 text-center">
                    <div class="bg-light p-3 rounded">
                        <img src="<?php echo base_url('upload/noimage.png'); ?>" alt="No Picture" class="img-fluid rounded mb-2" style="max-height: 200px;">
                        <p class="text-muted">Data Center</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4 text-center">
                    <div class="bg-light p-3 rounded">
                        <img src="<?php echo base_url('upload/noimage.png'); ?>" alt="No Picture" class="img-fluid rounded mb-2" style="max-height: 200px;">
                        <p class="text-muted">Network Connectivity</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4 text-center">
                    <div class="bg-light p-3 rounded">
                        <img src="<?php echo base_url('upload/noimage.png'); ?>" alt="No Picture" class="img-fluid rounded mb-2" style="max-height: 200px;">
                        <p class="text-muted">Server Room</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery-section py-5" style="background: #f8fafc;">
        <div class="container">
            <h2 class="text-center mb-5 font-weight-bold">Galeri Infrastruktur & Layanan</h2>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-img-top bg-white d-flex align-items-center justify-content-center" style="height:200px;">
                            <img src="<?php echo base_url('upload/noimage.png'); ?>" alt="Jaringan Fiber Optik" style="max-height: 160px; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">Jaringan Fiber Optik</h5>
                            <p class="card-text text-muted">Jaringan backbone fiber optik berkecepatan tinggi yang menghubungkan berbagai wilayah untuk koneksi internet stabil.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-img-top bg-white d-flex align-items-center justify-content-center" style="height:200px;">
                            <img src="<?php echo base_url('upload/noimage.png'); ?>" alt="Data Center Modern" style="max-height: 160px; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">Data Center Modern</h5>
                            <p class="card-text text-muted">Fasilitas data center dengan keamanan dan keandalan tinggi untuk mendukung layanan pelanggan dan bisnis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-img-top bg-white d-flex align-items-center justify-content-center" style="height:200px;">
                            <img src="<?php echo base_url('upload/noimage.png'); ?>" alt="Tim Support 24/7" style="max-height: 160px; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">Tim Support 24/7</h5>
                            <p class="card-text text-muted">Tim profesional siap membantu pelanggan kapan saja untuk memastikan layanan berjalan lancar.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-img-top bg-white d-flex align-items-center justify-content-center" style="height:200px;">
                            <img src="<?php echo base_url('upload/noimage.png'); ?>" alt="Layanan Internet Cepat" style="max-height: 160px; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">Layanan Internet Cepat</h5>
                            <p class="card-text text-muted">Solusi internet cepat dan stabil untuk rumah, kantor, dan bisnis di seluruh Indonesia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
</main><!-- End .main -->
