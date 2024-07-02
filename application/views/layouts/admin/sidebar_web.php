<?php
$icon = 'none;';
// $icon = 'inline;';
?>
<div id="main-menu" class="page-sidebar col-md-2" style="padding-bottom: 30px!important;display: block!important;">
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
        <p class="menu-title sm" style="padding-top:0px!important;margin:0px 0px 0px!important;">
        </p>
        <ul id="sidebar" class="sidebarz">        
            <li class="start"> 
                <a href="<?php echo base_url('admin'); ?>">
                    <i class="fas fa-home"></i>
                    <span class="title">Website</span> <span class="selected"></span>
                </a> 
                <li class="start open">
                    <ul class="open sub-menu" style="display:block;">
                        <li><a href="<?php echo site_url('blog/article')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> Blog</a></li>
                        <li><a href="<?php echo site_url('blog/project')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> Project</a></li>   
                        <li><a href="<?php echo site_url('blog/gallery')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> Gallery</a></li> 
                        <li><a href="<?php echo site_url('blog/portofolio')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> Portofolio</a></li>                                                                
                        <li><a href="<?php echo site_url('blog/team')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> Team</a></li>                           
                    </ul>
                </li>                       
            </li>            
            <li class="start"> 
                <a href="<?php echo base_url('admin'); ?>">
                    <i class="fas fa-cogs"></i>
                    <span class="title">Content</span> <span class="selected"></span>
                </a> 
                <li class="start open">
                    <ul class="open sub-menu" style="display:block;">
                        <li><a href="<?php echo site_url('blog/product')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> - Produk</a></li>  
                        <li><a href="<?php echo site_url('webpage/faq')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> - FAq</a></li>                            
                    </ul>
                </li>                       
            </li>  
            <li class="start"> 
                <a href="<?php echo base_url('admin'); ?>">
                    <i class="fas fa-cogs"></i>
                    <span class="title">Pengaturan</span> <span class="selected"></span>
                </a> 
                <li class="start open">
                    <ul class="open sub-menu" style="display:block;">
                        <li><a href="<?php echo site_url('webpage/menu')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> Halaman</a></li>                                              
                        <li><a href="<?php echo site_url('webpage/contact')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> Contact</a></li>
                    </ul>
                </li>                       
            </li>              
        </ul>
        <div class="clearfix"></div>
        <br><br>
    </div>
</div>
<!-- <a href="#" class="scrollup">Scroll</a> -->

