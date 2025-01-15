<section class="page-header page-header-modern bg-color-grey page-header-md">
	<div class="container">
		<div class="row">
			<div class="col-md-12 align-self-center p-static order-2 text-center">
				<h1 class="text-dark font-weight-bold text-8"><?php echo $title; ?></h1>
				<span class="sub-title text-dark"><?php echo ucfirst($link['routing']['gallery']);?></span>
			</div>
		</div>
	</div>
</section>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo $pages['sitelink']['home']['url']; ?>"><i class="icon-home"></i></a></li>
				<li class="breadcrumb-item" aria-current="page"><?php echo ucfirst($link['routing']['gallery']);?></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
			</ol>
		</div>
	</nav>    
    <div class="container"> 
        <div class="row mt-2">
            <?php 			
                $source = $pages['sitelink']['images'];
                if(count($source) > 0){
                    foreach($source as $v){						 
                        $simg       = $v['file_url']; 
                        $stitle     = $pages['sitelink']['gallery']['title'];
                        ?>   		            
            <div class="col-lg-3 col-md-4 col-6">
                <div class="product-default left-details hidden-description inner-icon">
                    <figure>
                        <a href="<?php echo $simg;?>" target="_blank">
                            <img src="<?php echo $simg;?>" alt="<?php echo $stitle;?>" width="300" height="300" />
                        </a>
                    </figure>

                    <div class="product-details">
                        <h3 class="product-title"> <a href="<?php echo $simg;?>" target="_blank"><?php echo $stitle;?></a> </h3>
                        <div class="product-action">
                            <a href="<?php echo $simg;?>" class="btn-quickview" title="Zoom" target="_blank" style="width:100%;">Zoom</a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <!-- End .product-default -->
            </div>
                <?php 
                    } 
                }
                ?>
        </div>
    </div>

</main><!-- End .main -->
