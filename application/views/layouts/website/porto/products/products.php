
<main class="main about">
    <div class="page-header page-header-bg text-left"
        style="background: 50%/cover #D4E1EA url('<?php echo $asset; ?>assets/images/page-header-bg.png');">
        <div class="container">
            <h1 class="text-white"><span class="text-white"><?php echo $link['brand'];?></span>
            <?php echo $title; ?></h1>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav bg-dark2">
        <div class="container bg-dark2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $pages['sitelink']['home']['url']; ?>" class="text-white"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item text-white" aria-current="page"><?php echo ucfirst($link['routing']['product']);?></li>
                <li class="breadcrumb-item text-white active" aria-current="page"><?php echo $title; ?></li>		
            </ol>
        </div>
    </nav>
    <div class="about-section">
        <div class="container">
            <div class="row">
                <div class="sidebar-toggle custom-sidebar-toggle">
                    <i class="fas fa-sliders-h"></i>
                </div>
                <div class="sidebar-overlay"></div>
                <aside class="col-lg-3 sidebar mobile-sidebar">
                    <div class="sidebar-wrapper" data-sticky-sidebar-options='{"offsetTop": 72}'>
                        <div class="widget widget-categories">
                            <h4 class="widget-title">Produk Megadata</h4>

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
                        </div>

                        <div class="widget widget-post">
                            <h4 class="widget-title">Produk Megadata</h4>

                            <ul class="simple-post-list">
                                <?php
                                $source = $pages['sitelink']['categories']['result'];
                                
                                if(count($source) > 0){
                                    $routing = base_url().$link['routing']['blog'];
                                    foreach($source as $v){

                                        $scurl       = $routing.'/'.$v['category_url'];  
                                        $spurl       = $routing.'/'.$v['category_url'];  
                                        $simg       = !empty($v['category_image']) ? $v['category_image'] : base_url().'upload/noimage.png'; 

                                        $stitle     = !empty($v['category_name']) ? substr($v['category_name'],0,25) : 'Untitled';
                                        ?>  
                                    <li>
                                        <div class="post-media">
                                            <a href="<?php echo $spurl;?>">
                                                <img src="<?php echo $simg;?>" alt="Post">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="<?php echo $spurl;?>"><?php echo $stitle; ?></a>
                                            <div class="post-meta"><?php echo date("d-M-Y",strtotime($v['category_date_created']));?></div>
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
                <div class="col-lg-9">
                    <p><?php echo $description_full; ?></p>
                </div>
            </div>
        </div>        
    </div>
</main>
