
<main class="main about">
    <!-- Carousel -->
    <div style="top:-117px;" class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase" data-owl-options="{'loop': false}">
    <?php 
    foreach($link['blog'] as $i => $v){
        echo $v['file_url'];
    ?>
        <div class="home-slide home-slide1 banner">
            <img class="slide-bg" src="<?php echo base_url().$v['news_image']; ?>" width="1903" height="499" alt="slider image">
            <div class="container d-flex align-items-center">
                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                    <h4 class="text-transform-none m-b-3" style="text-align:center;color:white;"><?php echo $v['news_title'];?></h4>
                    <!-- <h2 class="text-transform-none m-b-3" style="text-align:center;font-family:inherit;">.</h2> -->
                    <?php echo $v['news_short'];?>
                    <p class="text-transform-none m-b-3" style="text-align:center;">
                        <br>
                        <a href="<?php echo base_url('contact-us');?>" class="btn btn-primary btn-lg" style="text-align:center;">Hubungi Kami</a>
                    </p>
                </div>
            </div>
        </div>
    <?php 
    } 
    ?>
        <!--         
        <div class="home-slide home-slide1 banner">
            <img class="slide-bg" src="<?php #echo $asset; ?>assets/images/demoes/demo4/slider/slide-1.jpg" width="1903" height="499" alt="slider image">
            <div class="container d-flex align-items-center">
                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                    <h4 class="text-transform-none m-b-3" style="text-align:center;">Batik dengan Sentuhan Modern</h4>
                    <h2 class="text-transform-none m-b-3" style="text-align:center;font-family:inherit;">Batik Nusantara Premium</h2>
                    <p class="text-transform-none m-b-3" style="text-align:center;">
                        Memberikan keindahan batik nusantara yang dirancang dengan kualitas tinggi dan elegan, 
                        merepresentasikan tradisi Indonesia di panggung dunia.
                        <br>
                        <a href="category.html" class="btn btn-dark btn-lg" style="text-align:center;">Hubungi Kami</a>
                    </p>
                </div>
            </div>
        </div> 
        -->
    </div>
		
	<!-- <div class="page-header page-header-bg text-left"
		style="background: 50%/cover #D4E1EA url('<?php echo $asset; ?>assets/images/page-header-bg.jpg');">
		<div class="container">
			<h1><span>ABOUT US</span>
				OUR COMPANY</h1>
			<a href="contact.html" class="btn btn-dark">Contact</a>
		</div>
	</div> -->

	<!-- <nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
				<li class="breadcrumb-item active" aria-current="page">About Us</li>
			</ol>
		</div>
	</nav> -->

    <!-- Layanan Utama Kami -->
    <div class="section-elements" style="background: #131739;">
        <div class="container">
            <h5 class="text-primary">Keunggulan</h5>
            <h2 class="mb-5 elements" style="color:white;">Mengapa Memilih Florina Vania Indonesia untuk Batik Anda</h2>
            <div class="row justify-content-center">
                <div class="row">
					<div class="col-md-4">
                        <h4 class="text-left" style="color:white;"><i class="fas fa-check"></i></h4>                        
                        <h4 class="text-left" style="color:white;">Kualitas Premium</h4><br>
						<p class="text-left" style="color:white;">
                            Florina Vania Indonesia menawarkan batik premium yang diproduksi dengan bahan berkualitas tinggi, 
                            memberikan kenyamanan dan keanggunan bagi setiap pemakainya.
                            Kami memastikan setiap produk mencerminkan filosofi dan keindahan budaya Indonesia.
						</p>
					</div>			    
                    <div class="col-md-4">
                        <h4 class="text-left" style="color:white;"><i class="fas fa-check"></i></h4>
                        <h4 class="text-left" style="color:white;">Desain yang Elegan</h4><br>
						<p class="text-left" style="color:white;">
                            Setiap desain batik kami terinspirasi oleh kekayaan warisan budaya lokal menggabungkan 
                            teknik tradisional dengan inovasi modern, sehingga menciptakan produk yang tidak hanya menarik tetapi juga memiliki nilai sejarah yang mendalam.
						</p>
					</div>
                    <div class="col-md-4">
                        <h4 class="text-left" style="color:white;"><i class="fas fa-check"></i></h4>                        
                        <h4 class="text-left" style="color:white;">Menghormati Tradisi</h4><br>
						<p class="text-left" style="color:white;">
                            Kami memastikan bahwa semua koleksi batik kami dapat diaplikasikan secara luas, cocok untuk berbagi kalangan mulai dari 
                            sekolah hingga instansi pemerintah, sehingga setiap orang bisa merasakan keindahan batik nusantara.
                        </p>
					</div>  
                    <div class="col-md-4">
                        <h4 class="text-left" style="color:white;"><i class="fas fa-check"></i></h4>                        
                        <h4 class="text-left" style="color:white;">Sentuhan Modern</h4><br>
						<p class="text-left" style="color:white;">
                            Dengan fokus pada kualitas dan keaslian, kami menjaga setiap detail dari proses produksi, mulai dari pemilihan bahan hingga 
                            teknik pewarnaan, untuk memastikan setiap potong batik mencerminkan keindahan dan keberagaman budaya Indonesia.
                        </p>
					</div>                                        			                        
                    <div class="col-md-4">
                        <h4 class="text-left" style="color:white;"><i class="fas fa-check"></i></h4>                        
                        <h4 class="text-left" style="color:white;">Koleksi Batik Premium dan Elegan</h4><br>
						<p class="text-left" style="color:white;">
                            Kami berkomitmen untuk membawa batik nusantara ke kancah internasional, mempromosikan keunikan dan keindahan desain yang 
                            memiliki ciri khas tersendiri, sambil tetap menjaga nilai-nilai tradisional dalam setiap produk.
                        </p>
					</div>                                       			                        
                    <div class="col-md-4">
                        <h4 class="text-left" style="color:white;"><i class="fas fa-check"></i></h4>                        
                        <h4 class="text-left" style="color:white;">Desain yang Terinspirasi oleh Budaya Lokal</h4><br>
						<p class="text-left" style="color:white;">
                            Dengan pelayanan yang ramah dan profesional, kami siap membantu pelanggan dalam memilih batik yang sesuai dengan kebutuhan mereka, 
                            menghadirkan pengalaman berbelanja yang menyenangkan dan memuaskan.
                        </p>
					</div>                      
                </div>
            </div>
        </div>
    </div>	

    <!-- Bergabunglah dalam melestarikan Batik Nusantara -->
    <div class="section-elements" style="background: #ffffff;">
        <div class="container">
            <!-- <h4 class="elements">Bergabunglah dalam melestarikan Batik Nusantara</h4> -->
            <!-- <p class="mb-5">Daftar sekarang untuk mendapatkan update dan promosi terbaru dari koleksi batik kami</p> -->
            <div class="row justify-content-center">
                <div class="">
					<!-- <h3>Small</h3> -->
					<div class="row">
						<div class="col-lg-2">
						</div>
						<div class="col-lg-8">
                            <div class="cta-simple cta-border">
								<h4 class="elements">Bergabunglah dalam melestarikan Batik Nusantara</h4>
								<p>Daftar sekarang untuk mendapatkan update dan promosi terbaru dari koleksi batik kami</p>
								<div class="btn btn-primary btn-ellipse btn-md mt-2"><a href="<?php echo $link['contact_us'];?>" style="color:white;">Hubungi Kami</a></div>
							</div>
						</div>
						<div class="col-lg-2">
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>    
</main><!-- End .main -->