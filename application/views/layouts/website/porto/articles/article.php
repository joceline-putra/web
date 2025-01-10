<section class="page-header page-header-modern bg-color-grey page-header-md">
	<div class="container">
		<div class="row">
			<div class="col-md-12 align-self-center p-static order-2 text-center">
				<h1 class="text-dark font-weight-bold text-8"><?php echo $title; ?></h1>
				<span class="sub-title text-dark"><?php echo $pages['sitelink']['categories']['title']; ?></span>
			</div>
		</div>
	</div>
</section>
<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo $pages['sitelink']['home']['url']; ?>"><i class="icon-home"></i></a></li>
				<li class="breadcrumb-item" aria-current="page">Blog</li>
				<li class="breadcrumb-item" aria-current="page"><?php echo $pages['sitelink']['categories']['title']; ?></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>												
			</ol>
		</div><!-- End .container -->
	</nav>
	
	
	<?php 
		$page = $pages['sitelink']['article']; 
	?>

	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<article class="post single">
					<div class="post-media">
						<img src="<?php echo $page['image'];?>" alt="<?php echo $page['title'];?>">
					</div><!-- End .post-media -->

					<div class="post-body">
						<div class="post-date">
							<span class="day"><?php echo date("d",strtotime($page['created']));?></span>
							<span class="month"><?php echo date("d",strtotime($page['created']));?></span>
						</div><!-- End .post-date -->

						<h2 class="post-title">
							<?php echo $page['title'];?>
						</h2>

						<div class="post-meta">
							<a href="#" class="hash-scroll"><?php $pages['sitelink']['categories']['title']; ?></a>
						</div><!-- End .post-meta -->

						<div class="post-content">
							<p><?php echo $page['content'];?></p>
						</div><!-- End .post-content -->

						<div class="post-share">
							<h3 class="d-flex align-items-center">
								<i class="fas fa-share"></i>
								Share this post
							</h3>

							<div class="d-none social-icons">
								<a href="#" class="social-icon social-facebook" target="_blank"
									title="Facebook">
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon social-twitter" target="_blank" title="Twitter">
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon social-linkedin" target="_blank"
									title="Linkedin">
									<i class="fab fa-linkedin-in"></i>
								</a>
								<a href="#" class="social-icon social-gplus" target="_blank" title="Google +">
									<i class="fab fa-google-plus-g"></i>
								</a>
								<a href="#" class="social-icon social-mail" target="_blank" title="Email">
									<i class="icon-mail-alt"></i>
								</a>
							</div><!-- End .social-icons -->
						</div><!-- End .post-share -->

						<div class="post-author">
							<h3><i class="far fa-user"></i>Author</h3>

							<figure>
								<a href="#">
									<img src="<?php echo base_url(); ?>upload/default.png" alt="author">
								</a>
							</figure>

							<div class="author-content">
								<h4><a href="#"><?php echo $page['author'];?></a></h4>
								<p>Merupakan seorang penulis blog untuk website hpl yutai, hplyutai sudah tidak perlu diragukan lagi keunggulan produknya</p>
							</div>
						</div>

						<div class="d-none comment-respond">
							<h3>Leave a Reply</h3>

							<form action="#">
								<p>Your email address will not be published. Required fields are marked *</p>

								<div class="form-group">
									<label>Comment</label>
									<textarea cols="30" rows="1" class="form-control" required></textarea>
								</div><!-- End .form-group -->

								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" required>
								</div><!-- End .form-group -->

								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" required>
								</div><!-- End .form-group -->

								<div class="form-group">
									<label>Website</label>
									<input type="url" class="form-control">
								</div><!-- End .form-group -->

								<div class="form-group-custom-control mb-2">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="save-name">
										<label class="custom-control-label" for="save-name">Save my name, email,
											and website in this browser for the next time I comment.</label>
									</div><!-- End .custom-checkbox -->
								</div><!-- End .form-group-custom-control -->

								<div class="form-footer my-0">
									<button type="submit" class="btn btn-sm btn-primary">Post
										Comment</button>
								</div><!-- End .form-footer -->
							</form>
						</div><!-- End .comment-respond -->
					</div><!-- End .post-body -->
				</article><!-- End .post -->

				<hr class="mt-2 mb-1">

				<div class="related-posts">
					<h4>Related <strong>Posts</strong></h4>

					<div class="owl-carousel owl-theme related-posts-carousel" data-owl-options="{
						'dots': false
					}">
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

							$stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
							$scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this cvategory details, please update on admin panel';   
							$scat       = !empty($v['category_name']) ? $v['category_name'] : 'Uncategory';
							?>   								
						<article class="post">
							<div class="post-media zoom-effect">
								<a href="<?php echo $spurl;?>">
									<img src="<?php echo $simg;?>" alt="<?php echo $title; ?>" style="width:100%;height:220px;">
								</a>
							</div><!-- End .post-media -->

							<div class="post-body">
								<div class="post-date">
									<span class="day"><?php echo date("d",strtotime($v['news_date_created']));?></span>
									<span class="month"><?php echo date("M",strtotime($v['news_date_created']));?></span>
								</div>

								<h2 class="post-title">
									<a href="<?php echo $spurl;?>"><?php echo $stitle; ?></a>
								</h2>

								<div class="post-content">
									<p><?php echo $scontent; ?></p>
								</div>
								<a href="<?php echo $scurl;?>" class="post-comment"><?php echo $scat;?></a>
							</div><!-- End .post-body -->
						</article>
						<?php 
						}
					}
						?>
					</div><!-- End .owl-carousel -->
				</div><!-- End .related-posts -->
			</div><!-- End .col-lg-9 -->

			<div class="sidebar-toggle custom-sidebar-toggle">
				<i class="fas fa-sliders-h"></i>
			</div>
			<div class="sidebar-overlay"></div>

			<aside class="sidebar mobile-sidebar col-lg-3">
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
								$scat       = !empty($v['category_name']) ? substr(strip_tags($v['category_name']),0,25) : 'Uncategory';
								?>
							<li><a href="<?php echo $spurl; ?>"><?php echo $scat; ?></a></li>
							<?php
							}
						}
						?>
						</ul>
					</div><!-- End .widget -->

					<div class="widget">
						<h4 class="widget-title">Blog Lainnya</h4>

						<ul class="simple-post-list">
							<?php
							$source = $pages['sitelink']['categories']['result_popular'];
							if(count($source) > 0){
								$routing = base_url().$link['routing']['blog'];
								foreach($source as $v){

									$scurl       = $routing.'/'.$v['category_url'];  
									$spurl       = $routing.'/'.$v['category_url'].'/'.$v['news_url'];  
									$simg       = !empty($v['news_image']) ? base_url().$v['news_image'] : base_url().'upload/noimage.png'; 

									$stitle     = !empty($v['news_title']) ? substr($v['news_title'],0,25) : 'Untitled';
									$scontent   = !empty($v['news_short']) ? substr(strip_tags($v['news_short']),0,130) : 'No description available on this blog details, please update on admin panel';   
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
					</div><!-- End .widget -->

					<div class="d-none widget">
						<h4 class="widget-title">Tags</h4>

						<div class="tagcloud">
							<a href="#">ARTICLES</a>
							<a href="#">CHAT</a>
						</div><!-- End .tagcloud -->
					</div><!-- End .widget -->
				</div><!-- End .sidebar-wrapper -->
			</aside><!-- End .col-lg-3 -->
		
		</div><!-- End .row -->
	</div><!-- End .container -->
</main>