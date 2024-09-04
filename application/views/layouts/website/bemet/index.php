<!doctype html>
<html class="no-js" lang="en">
<?php 
if(!empty($pages['final_url'])){
    $url = $pages['final_url'];
}else{
    $url = site_url();
}

if(!empty($pages['sitelink']['product']['image'])){
    $img = $pages['sitelink']['product']['image'];
    // var_dump($img);die;
}else{
    $img = base_url();
}
?>
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $title; ?></title>
        <meta name="keywords" content="<?php echo strip_tags($keywords); ?>"/>
        <meta name="description" content="<?php echo strip_tags($description); ?>">
        <meta name="author" content="<?php echo strip_tags($author); ?>">

        <!-- Open Graph meta tags for Facebook and other platforms -->
        <meta property="og:title" content="<?php echo $title; ?>">
        <meta property="og:description" content="<?php echo strip_tags($description); ?>">
        <meta property="og:image" content="<?php echo $img; ?>">
        <meta property="og:url" content="<?php echo $url; ?>">
                
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $asset; ?>assets/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <?php include "link_css.php"; ?>
    </head>
    <body>

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div class="loader">
                    <div class="loader-outter"></div>
                    <div class="loader-inner"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->


        <?php 
            include "header.php"; 
            if (!empty($_content)) {
                $this->load->view($_content);
            }
            #include "content.php";
            include "footer.php";
            include "link_js.php"; 
            if (!empty($_js)) {
                $this->load->view($_js);
            }            
        ?>
    </body>
</html>
