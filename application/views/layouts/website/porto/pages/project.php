<section class="page-header page-header-modern bg-color-grey page-header-md">
	<div class="container">
		<div class="row">
			<div class="col-md-12 align-self-center p-static order-2 text-center">
				<h1 class="text-dark font-weight-bold text-8"><?php echo $title; ?></h1>
				<span class="sub-title text-dark"><?php echo ucfirst($link['routing']['project']);?></span>
			</div>
		</div>
	</div>
</section>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo $pages['sitelink']['home']['url']; ?>"><i class="icon-home"></i></a></li>
				<li class="breadcrumb-item" aria-current="page"><?php echo $link['routing']['project'];?></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
			</ol>
		</div>
	</nav>    
    <div class="container"> 
        
        <div class="row">
            <div class="col-lg-9 ">
                <h4 class="text-uppercase heading-bottom-border mt-4"><?php echo $title;?></h4>
                <div class="row mt-2 row-joined product-nogap">
                    <?php 			
                    $source = $pages['sitelink']['images'];
                    if(count($source) > 0){
                        foreach($source as $v){						 
                            $simg       = $v['file_url']; 
                            $stitle     = $pages['sitelink']['project']['title'];
                            ?>   		                          
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="<?php echo $simg;?>" target="_blank">
                                    <img src="<?php echo $simg;?>" style="width:100%;height:162px;" alt="<?php echo $stitle;?>">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="<?php echo $simg;?>" class="btn-quickview" title="Quick View">Zoom
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="<?php echo $simg;?>" target="_blank"><?php echo $stitle;?></a>
                                </h3>
                            </div>
                        </div>
                    </div>                
                    <?php 
                        }
                    }
                    ?>  
                </div>                
            </div>         
			<div class="sidebar-toggle custom-sidebar-toggle">
				<i class="fas fa-sliders-h"></i>
			</div>
			<div class="sidebar-overlay"></div>      

			<aside class="col-lg-3 sidebar mobile-sidebar">
				<div class="sidebar-wrapper" data-sticky-sidebar-options='{"offsetTop": 152}'>
                    <div class="widget widget-categories">
						<h4 class="widget-title">Kategori Lainnya</h4>

						<ul class="list">
                            <?php 
                            for($a=0; $a<25;$a++){
                            ?>
							<li><a href="#">A</a></li>
							<?php 
                            }
                            ?>
						</ul>
					</div>                    
					<div class="widget widget-post">
						<h4 class="widget-title">Terbanyak Dibaca</h4>
						<ul class="simple-post-list">
                            <?php 
                            for($a=0; $a<25;$a++){
                            ?>
                            <li>
                                <div class="post-media">
                                    <a href="http://localhost/git/web/blog/kategori-blog-1/interior-dinding-dengan-hpl-yutai">
                                        <img src="<?php echo $image;?>" alt="Post">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <a href="http://localhost/git/web/blog/kategori-blog-1/interior-dinding-dengan-hpl-yutai">Interior Dinding Dengan H</a>
                                    <div class="post-meta">24-Nov-2024</div>
                                </div>
                            </li>               
                            <?php } ?>                                         
						</ul>
					</div>
				</div>
			</aside>                     
        </div>
    </div>

</main><!-- End .main -->
