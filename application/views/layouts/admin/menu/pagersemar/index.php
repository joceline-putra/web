<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
$branch_logo = !empty($branch['branch_logo_login']) ? $branch['branch_logo_login'] : site_url() . 'upload/branch/default_logo.png';

$message = !empty($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';
$status = !empty($this->session->flashdata('status')) ? $this->session->flashdata('status') : 0;
if ($status == 0) {
    // redirect(base_url(), 'refresh');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url(); ?>assets/core/favicon.png" sizes="16x16 32x32" type="image/png" rel="icon">     
        <link href="<?php echo base_url(); ?>assets/core/plugins/jquery-notifications/css/messenger.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo base_url(); ?>assets/core/plugins/jquery-notifications/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo base_url(); ?>assets/core/plugins/select2-4.0.8/css/select2.css" rel="stylesheet" type="text/css" media="screen"/>     
        <link href="<?php echo base_url(); ?>assets/core/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />    
        <link href="<?php echo base_url(); ?>assets/core/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/core/plugins/toastr/toastr.min.css"> 
        <link href="<?php echo base_url(); ?>assets/core/plugins/sweetalert2/sweetalert2.min.css"  rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/core/css/custom.css" rel="stylesheet" type="text/css" />        
        <link href="<?php echo base_url(); ?>assets/core/css/webarch.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/core/plugins/jconfirm-3.3.4/dist/jquery-confirm.min.css" rel="stylesheet">        

   
    </head>
    <style>
        /*@font-family: 'Open Sans', sans-serif!important;*/
        .form-control{
            height: 34px!important;
        }
        .form-label{
            display: block!important;
            text-align: left!important;
        }
        .login-container{
            margin-top:2%!important;
        }
        .login-container > div{
            /*padding: 15px;*/
            background-color: #ffffff;
            margin-bottom: 20px;
            border: 1px solid #cacaca!important;
            padding:0px!important;
        }
        .login-form input{
            font-family: var(--font-family);
            font-size: 14px;
            font-weight: 600;
        }
        .div-login{
            margin-bottom:6px;
        }
        #btnLogin{
            width: 100%;
        } 
        .select2-container .select2-selection--single {
            height: 34px;
        }
        .select2-selection__rendered {
            padding-top:2px;
            text-align: left!important;
        }
        #captcha_image{
            width: 100%;
            padding-top:2px;
            padding-bottom:10px;    
        }        
        /*@background-url: '';*/
        /*// Extra small devices (portrait phones, less than 576px)*/
        /*// No media query for `xs` since this is the default in Bootstrap*/

        /*// Small devices (landscape phones, 576px and up)*/
        @media only screen and (min-width: 576px) {
            #body{
                background-color:#f89b1c!important;
                /*background: white url('services/assets/images/wallpaper/corona.png') no-repeat center center fixed; */
                /*background: white url('services/assets/images/wallpaper/pattern.jpg') repeat center center fixed;       */
                /*background: url('https://wallpaperaccess.com/full/417163.jpg') no-repeat center center fixed;   */
            } 
        }

        /*// Medium devices (tablets, 768px and up)*/
        @media only screen and (min-width: 768px) {

        }

        /*// Large devices (desktops, 992px and up)*/
        @media only screen and (min-width: 992px) {

        }

        /*// Extra large devices (large desktops, 1200px and up)*/
        @media only screen and (min-width: 1200px) {

        }
    </style>  
    <body class="error-body no-top" style="background: #cacaca!important;">
        <div class="container-fluid">
            <div class="row login-container column-seperation">
                <div class="col-md-offset-5 col-md-3 col-xs-12 col-sm-12" style="padding: 20px;background-color: #ffffff;margin-bottom: 10px;border: 4px solid #cacaca!important;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;padding-left:0px;padding-right:0px;">
                        <img src="<?php echo $branch_logo; ?>" class="img-responsive" style="padding-top:20px;margin:0 auto;width:150px;">
                        <h4 style="margin-bottom:0px;">Registrasi Member</h4>
                        <p>Silahkan isikan formulir dibawah ini</p>       
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="grid simple">
                            <div class="grid-body">
                                <a href="<?php echo base_url('pagersemar/register');?>">
                                    <div class="tiles white ">
                                        <div class="tiles-body">
                                            <div class="heading">
                                                <i class="fas fa-1x fa-id-card" style="top:-6px;position:relative;"></i> 
                                                <b style="position:relative;top:-8px;">Aktivasi Kartu</b>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>                                           
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="grid simple">
                            <div class="grid-body">
                                <a id="btn_scan" href="#"><?php #echo base_url('pagersemar/scan');?>
                                    <div class="tiles white ">
                                        <div class="tiles-body">
                                            <div class="heading">
                                                <i class="fas fa-1x fa-qrcode" style="top:-6px;position:relative;"></i> 
                                                <b style="position:relative;top:-8px;">Scan Kartu</b>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>                  
                    </div>   
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="grid simple">
                            <div class="grid-body">
                                <a href="<?php echo base_url('login');?>">
                                    <div class="tiles white ">
                                        <div class="tiles-body">
                                            <div class="heading">
                                                <i class="fas fa-1x fa-sign-in-alt" style="top:-6px;position:relative;"></i> 
                                                <b style="position:relative;top:-8px;">Login</b>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>                                                             
                </div>
            </div>
        </div>

        <!-- BEGIN JS DEPENDECENCIES-->
        <script src="<?php echo base_url(); ?>assets/core/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/core/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- <script src="<?php echo base_url(); ?>assets/core/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script> -->
        <script src="<?php echo base_url(); ?>assets/core/plugins/select2-4.0.8/js/select2.min.js" type="text/javascript"></script>
        <!-- END CORE JS DEPENDECENCIES-->

        <script src="<?php echo base_url(); ?>assets/core/plugins/jquery-notifications/js/messenger.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/core/plugins/jquery-notifications/js/messenger-theme-future.js" type="text/javascript"></script>

        <!-- END -->
        <!-- BEGIN PAGE LEVEL JS -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/core/plugins/jquery-notifications/js/demo/demo.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/core/plugins/notifications.js"></script>
        <script src="<?php echo base_url(); ?>assets/core/plugins/toastr/toastr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/core/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/core/plugins/jquery.redirect.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>assets/core/plugins/jconfirm-3.3.4/dist/jquery-confirm.min.js"></script>
        <script src="https://unpkg.com/html5-qrcode"></script>     
    </body>
    <div class="modal fade" id="modal-scanner" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="scanner-title"><b><i class="fas fa-1x fa-qrcode"></i> QRCode Scan</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:#888888;">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background: white!important;">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-xs-12 col-sm-12 scroll-track scroll-order-item" style="padding: 0px;margin-top: 0;margin-left:0px;margin-right:0px;"> 
                                <div id="qr-div" style="width: 100%;" class="col-md-12"></div>    
                                <p id="qr-result" style="text-align:center;"></p>                            
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <script>
        $(document).ready(function () {
            // HTML5 Scanner QR/Bar Code
            let scannerConfig = {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                },
                rememberLastUsedCamera: true,
                // formatsToSupport: {
                //     QR_CODE, CODE_39
                // }
            };
                // formatsToSupport: {
                //     QR_CODE, AZTEC,
                //     CODABAR, CODE_39, CODE_93, CODE_128,
                //     DATA_MATRIX,
                //     MAXICODE,
                //     ITF,
                //     EAN_13, EAN_8,
                //     PDF_417, RSS_14, RSS_EXPANDED,
                //     UPC_A, UPC_E, UPC_EAN_EXTENSION
                // }    
            let scanner = new Html5QrcodeScanner(
                "qr-div", scannerConfig
            );
            scanner.render(scannerResult);
            // var html5QrcodeScanner = new Html5QrcodeScanner(
            //         "qr-reader", { fps: 10, qrbox: 250 });
            //     html5QrcodeScanner.render(onScanSuccess);

            $('#btn_scan').click(function() {
                $("#modal-scanner").modal('show');
            });

            function scannerResult(decodedText, decodedResult) {
                window.open(decodedText, '_blank');
                $("#qr-result").html(decodedText);
            }
        });
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        function notif($type, $msg) {
            if (parseInt($type) === 1) {
                //Toastr.success($msg);
                Toast.fire({
                    type: 'success',
                    title: $msg
                });
            } else if (parseInt($type) === 0) {
                //Toastr.error($msg);
                Toast.fire({
                    type: 'error',
                    title: $msg
                });
            }
        }
    </script>    
</html>