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

    <!-- ✅ Hubungi Kami -->
    <section class="feature-boxes-container mb-8" style="background-color:#f1f1fd;">
        <div class="container p-4">
            <h2 class="text-center">Hubungi Kami</h2>
            <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="mt-6 mb-1">Alamat Kami</h2>
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
                        <!-- Ikuti<br>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        </p> -->
                </div>

                <div class="col-lg-6">
                    <h2 class="mt-6 mb-2">Kirim Pesan</h2>

                    <form id="form_contact" name="form_contact" class="mb-0" action="#">
                        <div class="form-group">
                            <label class="mb-1" for="contact-name">Nama Anda
                                <span class="required">*</span></label>
                            <input id="contact_name" name="contact_name" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="contact-phone">Nomor Telepon / WhatsApp
                                <span class="required">*</span></label>
                            <input id="contact_phone" name="contact_phone" type="email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="contact-email">Email
                                <span class="required">*</span></label>
                            <input id="contact_email" name="contact_email" type="email" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label class="mb-1" for="contact-message">Isi Pesan
                                <span class="required">*</span></label>
                            <textarea cols="30" rows="1" id="contact_message" class="form-control"
                                name="contact_message" required></textarea>
                        </div>

                        <div class="form-footer mb-0">
                            <button id="btn_form_contact_send" type="button" class="btn btn-dark font-weight-normal">
                                <i class="fas fa-paper-plane"></i> Kirim
                            </button>
                        </div>
                    </form>
                </div>                                             
            </div>
        </div>
    </section>

</main><!-- End .main -->
