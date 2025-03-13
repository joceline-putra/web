<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php $title = isset($title) ? $title : "Welcome"; echo $title; ?></title>

    <meta name="keywords" content="<?php echo substr(strip_tags($keywords),0,125);?>"/>
    <meta name="description" content="<?php echo substr(strip_tags($description),0,125);?>">
    <meta name="author" content="<?php echo $author?>">

    <meta property="og:title" content="<?php echo strip_tags($title);?>"/>
    <meta property="og:description" content="<?php echo substr(strip_tags($description),0,125);?>"/>
    <meta property="og:url" content="<?php echo $url;?>"/>
    <meta property="og:locale" content="en_ID"/>
    <meta property="og:image" content="<?php echo !empty($image) ? $image : 'upload/noimage.png';?>"/>
    <meta property="og:author" content="<?php echo $author;?>"/>
    <meta property="og:keywords" content="<?php echo strip_tags($keywords);?>"/>                
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="<?php echo $sitename;?>"/>    

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo $favicon; ?>">
    <link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo $favicon; ?>">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    
    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '<?php echo $asset; ?>assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Link CSS -->
    <?php 
        $this->load->view($this->nav['web']['css']);
    ?>
    <style>
       /* .gradient-bg {
            width: 100%;
            height: 100vh;
            background: linear-gradient(to bottom, #007bff, #000);
        } */
    </style>
</head>

<body class="gradient-bg">
    <div class="page-wrapper">
        <!--
            <div class="top-notice bg-primary text-white">
                <div class="container text-center">
                    <h5 class="d-inline-block">Get Up to <b>40% OFF</b> New-Season Styles</h5>
                    <a href="category.html" class="category">MEN</a>
                    <a href="category.html" class="category ml-2 mr-3">WOMEN</a>
                    <small>* Limited time only.</small>
                    <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                </div>
            </div>
        -->
        <?php 
        $this->load->view($this->nav['web']['header']);
    
        if (!empty($_content)) { 
            $this->load->view($_content); 
        } 
    
        $this->load->view($this->nav['web']['footer']);
        ?> 
    </div>
    <?php 
        $this->load->view($this->nav['web']['js']);

        if (!empty($_js)) { 
            $this->load->view($_js); 
        } 
    ?>
</html>