<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from themegenix.net/html/bemet/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Aug 2024 06:03:53 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Bemet - Butcher & Meat Shop HTML Template</title>
        <meta name="description" content="Bemet - Butcher & Meat Shop HTML Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
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
