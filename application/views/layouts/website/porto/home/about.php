

<style>
    .about-hero {
        position: relative;
        background: linear-gradient(rgba(30, 41, 59, 0.7), rgba(30, 41, 59, 0.7)), url('<?php echo $asset; ?>assets/images/page-header-bg.jpg') center/cover;
        color: #fff;
        padding: 80px 0 60px 0;
        margin-bottom: 0;
    }
    .about-hero .container {
        position: relative;
        z-index: 2;
    }
    .about-hero h1 {
        font-size: 2.6rem;
        font-weight: bold;
        letter-spacing: 2px;
    }
    .about-hero .subtitle {
        font-size: 1.25rem;
        margin-top: 10px;
        color: #e5e7eb;
    }
    .about-section {
        background: #f8fafc;
        padding: 40px 0 30px 0;
        border-radius: 12px;
        margin-top: -30px;
        box-shadow: 0 4px 24px rgba(30,41,59,0.06);
    }
    .company-values .icon {
        font-size: 2.5rem;
        color: #0ea5e9;
        margin-bottom: 10px;
    }
    .service-card {
        transition: transform 0.2s, box-shadow 0.2s;
        border-radius: 16px !important;
        overflow: hidden;
        border: none !important;
    }
    .service-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 8px 32px rgba(14,165,233,0.13);
    }
    .service-card .icon {
        font-size: 2.8rem;
        color: #0ea5e9;
        margin-bottom: 12px;
    }
    .gallery-section h2 {
        font-weight: bold;
        color: #22223b;
    }
</style>

<main class="main about">
    <div class="page-header page-header-bg text-left"
        style="background: 50%/cover #D4E1EA url('<?php echo base_url(); ?>upload/web/banner/page-header-bg-1.jpg');">
        <div class="container">
            <h1><span><?php echo $link['brand'];?></span>
            <?php echo $title; ?></h1>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </div>
    </nav>
    <div class="about-section">
        <div class="container">
            <p><?php #echo $description_full; ?></p>
        </div>
    </div>
    <!-- Tentang Kami Section -->
    <div class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="<?php echo base_url('upload/branch/MEGADATA-ISP-1024x507.png'); ?>" alt="Tentang Perusahaan" class="img-fluid rounded shadow-sm" style="width:70%;min-height:220px;">
                </div>
                <div class="col-md-6">
                    <h2 class="font-weight-bold mb-3">Tentang Perusahaan</h2>
                    <p class="mb-3">
                        PT. MEGA ARTHA LINTAS DATA dengan branding MEGADATA ISP merupakan suatu perusahaan berbasis teknologi yang menyediakan layanan jaringan akses internet dan komunikasi radio yang didirikan pada tahun 2017. MEGADATA ISP merupakan perusahaan penyedia layanan akses jaringan internet yang menangani layanan Internet Service Provider, Colocation, IT Managed Services, dan Data Center.
                    </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check-circle text-primary mr-2"></i> Visi: Menjadi penyedia layanan profesional yang meningkatkan produktivitas dan efisiensi perusahaan melalui teknologi terkini dan sumber daya manusia yang berkualitas.</li>
                            <li class="mb-2"><i class="fa fa-check-circle text-primary mr-2"></i> Misi: Memberikan layanan berkualitas dengan harga terjangkau melalui tenaga ahli, serta terus berinovasi menghadirkan akses internet cepat sesuai kebutuhan zaman.</li>
                            <li><i class="fa fa-check-circle text-primary mr-2"></i> Nilai: Integritas, Inovasi, Pelayanan</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="gallery-section py-5" style="background: #f8fafc;">
        <div class="container">
            <h2 class="text-center mb-5 font-weight-bold">Layanan & Infrastruktur Kami</h2>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card service-card shadow h-100">
                        <div class="card-img-top bg-white d-flex flex-column align-items-center justify-content-center pt-4" style="height:200px;">
                            
                            <img src="<?php echo base_url('upload/web/about_us/istockphoto-1477214859-612x612.jpg'); ?>" alt="Jaringan Fiber Optik" style="padding:12px;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">Jaringan Fiber Optik</h5>
                            <p class="card-text text-muted">Jaringan backbone fiber optik berkecepatan tinggi yang menghubungkan berbagai wilayah untuk koneksi internet stabil.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card service-card shadow h-100">
                        <div class="card-img-top bg-white d-flex flex-column align-items-center justify-content-center pt-4" style="height:200px;">
                            
                            <img src="<?php echo base_url('upload/web/about_us/istockphoto-174865357-612x612.jpg'); ?>" alt="Data Center Modern" style="padding:12px;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">Data Center Modern</h5>
                            <p class="card-text text-muted">Fasilitas data center dengan keamanan dan keandalan tinggi untuk mendukung layanan pelanggan dan bisnis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card service-card shadow h-100">
                        <div class="card-img-top bg-white d-flex flex-column align-items-center justify-content-center pt-4" style="height:200px;">
                            
                            <img src="<?php echo base_url('upload/web/about_us/Pelatihan-Customer-Service-dan-Call-Center.jpg'); ?>" alt="Tim Support 24/7" style="padding:12px;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">Tim Support 24/7</h5>
                            <p class="card-text text-muted">Tim profesional siap membantu pelanggan kapan saja untuk memastikan layanan berjalan lancar.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card service-card shadow h-100">
                        <div class="card-img-top bg-white d-flex flex-column align-items-center justify-content-center pt-4" style="height:200px;">
                            
                            <img src="<?php echo base_url('upload/web/about_us/360_F_483692442_ePcyN8IunaiTXPvIj7LGt8GUcAFJmm1m.jpg'); ?>" alt="Layanan Internet Cepat" style="padding:12px;">
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
            <h2 class="text-center mb-4">Topologi Jaringan Megadata</h2>
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-4 text-center">
                    <div class="bg-light p-3 rounded">
                        <img src="<?php echo base_url('upload/web/about_us/topologi.png'); ?>" alt="No Picture" class="img-fluid rounded mb-2" style="margin:0 auto;">
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
    <div class="page-header page-header-bg text-left"
        style="background: 50%/cover #D4E1EA url('<?php echo base_url('upload/web/brave_with_innovation.png'); ?>">
    </div>    
</main>
