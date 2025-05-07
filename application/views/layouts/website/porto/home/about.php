

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
    <div class="about-section">
        <div class="container">
            <p><?php echo $description_full; ?></p>
        </div>
    </div>

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
</main>
