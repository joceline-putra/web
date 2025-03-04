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
                    <i class="fas fa-cogs"></i>
                    <span class="title">Pager Semar</span> <span class="selected"></span>
                </a> 
                <li class="start open">
                    <ul class="open sub-menu" style="display:block;">
                        <li><a href="<?php echo site_url('pagersemar/card')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> Card</a></li>
                        <li><a href="<?php echo site_url('pagersemar/member')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> Member</a></li>     
                        <li><a href="<?php echo site_url('pagersemar/merchant')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> Merchant</a></li>   
                        <li><a href="<?php echo site_url('pagersemar/user')?>"><i class="fas fa-hdd" style="display:<?php echo $icon; ?>"></i> User</a></li>                                                                      
                    </ul>
                </li>                       
            </li> 
        </ul>
        <div class="clearfix"></div>
        <br><br>
    </div>
</div>
<!-- <a href="#" class="scrollup">Scroll</a> -->

