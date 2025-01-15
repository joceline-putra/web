<!DOCTYPE html>
<html lang="en" data-style-switcher-options="{'showBordersStyle': true, 'showLayoutStyle': false, 'showBackgroundColor': false, 'changeLogo': false, 'colorPrimary': '#2a2a2a', 'colorSecondary': '#e36159', 'colorTertiary': '#2baab1', 'colorQuaternary': '#383f48'}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $title; ?></title>	
        
        <meta name="keywords" content="<?php echo strip_tags($title);?>" />
        <meta name="description" content="<?php echo strip_tags($description);?>"/>
        <meta name="author" content="<?php echo $author;?>">
        <meta property="og:title" content="<?php echo strip_tags($title);?>"/>
        <meta property="og:description" content="<?php echo strip_tags($description);?>"/>
        <meta property="og:url" content="<?php echo site_url();?>"/>
        <meta property="og:locale" content="en_ID"/>
        <meta property="og:image" content="<?php echo !empty($image) ? $image : 'upload/noimage.png';?>"/>
        <meta property="og:author" content="<?php echo $author;?>"/>
        <meta property="og:keywords" content="<?php echo strip_tags($keywords);?>"/>                
        <meta property="og:type" content="website"/>
        <meta property="og:site_name" content="<?php echo site_url();?>"/>
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo $asset; ?>assets/img/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="<?php echo $asset; ?>assets/img/apple-touch-icon.png">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

        <!-- Web Fonts  -->		
        <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7COverpass:200,400,600,700,800,900%7CPT+Serif&amp;display=swap" rel="stylesheet" type="text/css">

        
        <!-- Link CSS -->
        <?php include 'link_css.php'; ?>      
        <style>
            .img-portofolio > img{
                filter:grayscale(100);
            }
            .img-portofolio > img:hover{
                filter:grayscale(0);
            }            
        </style>  
    </head>

    <body class="loading-overlay-showing" data-loading-overlay data-plugin-page-transition>
        <!-- 
            <div class="loading-overlay">
                <div class="bounce-loader">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </div> 
        -->
        <div class="body">
            <?php $this->load->view($this->nav['web']['header']); ?>         

            <div role="main" class="main">
                <?php 
                    if (!empty($_content)) { 
                        $this->load->view($_content); 
                    } else {
                        // include "404.php";
                        $this->load->view('layouts/website/2024/404'); 
                    }
                ?>
            </div> 
            <?php $this->load->view($this->nav['web']['footer']); ?>
        </div>
        <?php 
            $this->load->view($this->nav['web']['js']);
            if (!empty($_js)) { 
                $this->load->view($_js); 
            } 
        ?>
    </body>
</html>
