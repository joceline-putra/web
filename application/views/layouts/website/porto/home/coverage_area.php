<main class="main about">
    <div class="page-header page-header-bg text-left"
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
    </nav>

    <!-- ✅ Coverage Area -->
    <section class="feature-boxes-container mb-8" style="background-color:#f1f1fd;">
        <div class="container p-4">
            <h2 class="text-center">Coverage Area</h2>
            <p class="text-center mb-5">Silahkan lihat apakah area anda tercover oleh jaringan Megadata</p>
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="mt-6 mb-2">Pilih Kota Anda</h2>
                    <form id="form_coverage" name="form_contact" class="mb-0" action="#">
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
                </div>  
                <div class="col-lg-6">
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
                </div>                                           
            </div>
        </div>
    </section>

</main><!-- End .main -->
