<section class="page-header page-header-modern bg-color-grey page-header-md">
	<div class="container">
		<div class="row">
			<div class="col-md-12 align-self-center p-static order-2 text-center">
				<h1 class="text-dark font-weight-bold text-8"><?php echo $title; ?></h1>
				<span class="sub-title text-dark">Blog</span>
			</div>
		</div>
	</div>
</section>
<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php $pages['sitelink']['home']['url']; ?>"><i class="icon-home"></i></a></li>
				<li class="breadcrumb-item" aria-current="page">Blog</li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
			</ol>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div id="div_load" class="blog-section row">
					<?php 			
					$source = $pages['sitelink']['categories']['result_news'];
					if(count($source) > 0){
						$routing = $pages['sitelink']['categories']['url'];
						foreach($source as $v){

							// $scurl       = $routing;  
							// $spurl       = '/'.$v['news_url']; 
							$scurl       = $routing.'/'.$v['category_url'];  
							$spurl       = $routing.'/'.$v['news_url'];  						 
							$simg       = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url().'upload/noimage.png'; 

							$stitle     = !empty($v['news_title']) ? $v['news_title'] : 'Untitled';
							$scontent   = !empty($v['news_short']) ? $v['news_short'] : 'No description available on this blog details, please update on admin panel';   
							$scat       = !empty($v['category_name']) ? $v['category_name'] : 'Uncategory';
							?>   					
						<div class="col-md-6 col-lg-4">
							<article class="post">
								<div class="post-media">
									<a href="<?php echo $spurl;?>">
										<img src="<?php echo $simg;?>" alt="<?php echo $title; ?>" width="220px" height="220px" style="width:100%;height:220px;">
									</a>
									<div class="post-date">
										<span class="day"><?php echo date("d",strtotime($v['news_date_created']));?></span>
										<span class="month"><?php echo date("M",strtotime($v['news_date_created']));?></span>
									</div>
								</div>

								<div class="post-body">
									<h2 class="post-title">
										<a href="<?php echo $spurl;?>"><?php echo $stitle; ?></a>
									</h2>
									<div class="post-content">
										<p><?php echo $scontent; ?></p>
									</div>
									<a href="<?php echo $scurl;?>" class="post-comment"><?php echo $scat;?></a>
								</div>
							</article>
						</div>
						<?php 
						}
					}
					?>
				</div>
				<button id="btn_load_more" type="button" class="btn btn-success btn-place-order" form="checkout-form">
					Load more...
				</button>
				<!-- <nav class="toolbox toolbox-pagination">
					<div class="toolbox-item toolbox-show">
						<label>Show:</label>

						<div class="select-custom">
							<select name="count" class="form-control">
								<option value="6">12</option>								
								<option value="12">12</option>
								<option value="24">24</option>
								<option value="36">36</option>
							</select>
						</div>
					</div>
					<ul class="pagination toolbox-item">
						<li class="page-item disabled">
							<a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
						</li>
						<li class="page-item active">
							<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
						</li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><span class="page-link">...</span></li>
						<li class="page-item">
							<a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
						</li>
					</ul>
				</nav> -->
			</div>

			<div class="sidebar-toggle custom-sidebar-toggle">
				<i class="fas fa-sliders-h"></i>
			</div>
			<div class="sidebar-overlay"></div>
			<aside class="col-lg-3 sidebar mobile-sidebar">
				<div class="sidebar-wrapper" data-sticky-sidebar-options='{"offsetTop": 72}'>
					<div class="widget widget-categories">
						<h4 class="widget-title">Kategori Lainnya</h4>

						<ul class="list">
						<?php 			
						$source = $pages['sitelink']['categories']['result'];
						if(count($source) > 0){
							// $routing = $pages['sitelink']['categories']['url'];
							foreach($source as $v){

								// $scurl       = $routing;  
								$spurl       = $v['category_url'];  
								// $simg       = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url().'upload/noimage.png'; 

								// $stitle     = !empty($v['news_title']) ? $v['news_title'] : 'Untitled';
								// $scontent   = !empty($v['news_short']) ? $v['news_short'] : 'No description available on this blog details, please update on admin panel';   
								$scat       = !empty($v['category_name']) ? $v['category_name'] : 'Uncategory';
								?>  
							<li><a href="<?php echo $spurl; ?>"><?php echo $scat; ?></a></li>
							<?php 
							}
						}
						?>
						</ul>
					</div>

					<div class="widget widget-post">
						<h4 class="widget-title">Terbanyak Dibaca</h4>

						<ul class="simple-post-list">
							<?php 			
							$source = $pages['sitelink']['categories']['result_popular'];
							if(count($source) > 0){
								$routing = base_url().$link['routing']['blog'];
								foreach($source as $v){

									$scurl       = $routing.'/'.$v['category_url'];  
									$spurl       = $routing.'/'.$v['category_url'].'/'.$v['news_url'];  
									$simg       = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url().'upload/noimage.png'; 

									$stitle     = !empty($v['news_title']) ? $v['news_title'] : 'Untitled';
									$scontent   = !empty($v['news_short']) ? $v['news_short'] : 'No description available on this blog details, please update on admin panel';   
									$scat       = !empty($v['category_name']) ? $v['category_name'] : 'Uncategory';
									?>  
								<li>
									<div class="post-media">
										<a href="<?php echo $spurl;?>">
											<img src="<?php echo $simg;?>" alt="Post">
										</a>
									</div>
									<div class="post-info">
										<a href="<?php echo $spurl;?>"><?php echo $stitle; ?></a>
										<div class="post-meta"><?php echo date("d-M-Y",strtotime($v['news_date_created']));?></div>
									</div>
								</li>
								<?php 
								}
							}
							?>			
						</ul>
					</div>
				</div>
			</aside>
		</div>

	</div>
</main>