<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
$branch_logo = !empty($branch['branch_logo_login']) ? $branch['branch_logo_login'] : site_url() . 'upload/branch/default_logo.png';

// $return_url = $this->session->userdata('url_before');
$result     = !empty($this->session->flashdata('result')) ? $this->session->flashdata('result') : '';
$message    = !empty($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';
$status     = !empty($this->session->flashdata('status')) ? $this->session->flashdata('status') : 0;
$return_url = !empty($this->session->flashdata('return_url')) ? $this->session->flashdata('return_url') : '';
$qrc = !empty($this->session->flashdata('qr')) ? $this->session->flashdata('qr') : '';


$v = '';
if($status==1){
    $data_url = base_url().'pagersemar/card_info/'.$result['card_session'];

    if($result['card_flag']==1){
        $periode = date("d-M-Y", strtotime($result['card_date_start'])).' sd '.date("d-M-Y",strtotime($result['card_date_end']));
    } else {
        $periode = '-';
    }
    // $qrcode = 'https://api.qrserver.com/v1/create-qr-code/?size=80x80&data='.$data_url;
// if ($status == 0) {
    // redirect(base_url(), 'refresh');
// }else if($status==1){
    // $v .= '<i class="fas fa-address-card fa-4x" style=""></i>';
    // $v .= '<h4 style="margin-bottom:0px;">Card Information</h4>';
    // $v .= '<div class="col-md-12 col-sm-12">';
    //     $v .= '<i class="fas fa-address-card fa-4x" style=""></i>';
    //     $v .= '<h4 style="margin-bottom:0px;">Card Information</h4>';    
    // $v .= '</div>';
    $v .= '<div class="col-md-12 col-sm-12">';    
        $v .= '<h4 style="margin-bottom:0px;">Pager Semar Member</h4>';           
        $v .= '<img src="data:image/png;base64,'.$qrc.'" class="img-responsive" style="margin:0 auto;">';
        // $v .= '<img src="'.$qrcode.'" class="img-responsive" style="margin:0 auto;">';
        $v .= '<h4 style="margin-bottom:0px;">Card Information</h4>';           
    $v .= '</div>';
    $v .= '<div class="col-md-12 col-sm-12">';  
    $v .=   '<p style="padding-top: 20px;">
                <table class="table">
                    <tr>
                        <td class="text-left"><b>KARTU</b></td>
                        <td class="text-left"></td>                        
                    </tr>                           
                    <tr>
                        <td class="text-left">Nomor</td>
                        <td class="text-left">: <b>'.$result['card_number'].'</td>                        
                    </tr>              
                    <tr>
                        <td class="text-left">Jenis</td>
                        <td class="text-left">: <b>'.$result['card_type'].'</td>                        
                    </tr>              
                    <tr>
                        <td class="text-left">Valid</td>
                        <td class="text-left">: <b>'.$periode.'</td>                        
                    </tr>     
                    <tr>
                        <td class="text-left"><b>MEMBER</b></td>
                        <td class="text-left"></td>                        
                    </tr>                        
                    <tr>
                        <td class="text-left">Nama</td>
                        <td class="text-left">: <b>'.$result['contact_name'].'</td>                        
                    </tr>
                    <tr>
                        <td class="text-left">Handphone</td>
                        <td class="text-left">: <b>'.mask_last_digits($result['contact_phone_1']).'</b></td>                        
                    </tr>                                                                                 
                </table>
            </p>';
    $v .= '</div>';
// }else if($status==2){
    // $v = '<i class="fas fa-exclamation fa-4x" style="color:#c73640;"></i>';
    // $v .= '<h4 style="margin-bottom:0px;">Gagal</h4>';
    // $v .= '<p style="padding-top: 20px;">'.$message.'</p>';
// }else if($status==3){
    // Berhasil Mendaftar
    // $v .= '<i class="fas fa-smile fa-4x" style="color:#318fff;"></i>';
    // $v .= '<h4 style="margin-bottom:0px;">Sukses</h4>';
    // $v .= '<p style="padding-top: 20px;">Berhasil aktivasi, Silahkan melanjutkan verifikasi akun anda dengan klik link dibawah ini.</p>';
    // $v .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
    //     $v .= '<a href="'.$return_url.'" target="_self" class="btn btn-success" style="width:100%;background-color:#318fff;color:white;"><i class="fas fa-check-double"></i> Verifikasi Akun</a>';
    // $v .= '</div>';
// }else if ($status == 4) {
    // redirect($return_url, 'refresh');
// }
}else if($status==0){
    $v .= '<i class="fas fa-exclamation fa-4x" style="color:#c73640;"></i>';
    $v .= '<h4 style="margin-bottom:0px;">Gagal</h4>';
    $v .= '<p style="padding-top: 20px;">'.$message.'</p>';
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

        <!-- BEGIN PLUGIN CSS -->
        <link href="<?php echo base_url(); ?>assets/core/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />    
        <link href="<?php echo base_url(); ?>assets/core/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!--Sweet Alert-->
        <link href="<?php echo base_url(); ?>assets/core/plugins/toastr/toastr.min.css"> 
        <link href="<?php echo base_url(); ?>assets/core/plugins/sweetalert2/sweetalert2.min.css"  rel="stylesheet" type="text/css"/>
        <!-- END PLUGIN CSS -->
        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link href="<?php echo base_url(); ?>assets/webarch/css/webarch.css" rel="stylesheet" type="text/css" />
        <!-- END CORE CSS FRAMEWORK -->
        <script src="<?php echo base_url(); ?>assets/core/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
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
            margin-top:10%!important;
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
    <!-- BEGIN BODY -->
    <body class="error-body no-top" style="background: #cacaca!important;">
        <div class="container-fluid">
            <div class="row login-container column-seperation" style="">
                <div class="col-md-offset-4 col-md-4 col-xs-12 col-sm-12" 
                     style="padding: 30px;
                     background-color: #ffffff;
                     margin-bottom: 20px;
                     /*border-radius:20px;*/
                     border: 4px solid #cacaca!important;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;padding:20px 0px">
                        <!-- <img src="<?php #echo $branch_logo; ?>" class="img-responsive" style="padding-top:20px;margin:0 auto;"> -->
                        <div class="col-md-12 col-sm-12">
                        <?php 
                        echo $v; 
                        if($status==3){

                        }else{
                            ?>
                            <!-- <form action="<?php echo base_url('login/register_activation_submit'); ?>" method="post" class="login-form validate" id="form-confirmation" name="form-confirmation">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <input class="form-control" id="phone" name="phone" type="hidden" placeholder="" value="<?php echo $phone; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <input class="form-control" id="otp" name="otp" type="number" placeholder="Kode OTP" value="" required>
                                        </div>
                                    </div>                              		  	
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12 col-sm-12 div-login">
                                            <button class="btn pull-right" id="btnSubmit" name="btnSubmit" type="submit" style="width: 100%;background-color:#318fff;color:white;">
                                                <i class="fas fa-thumbs-up"></i>&nbsp;
                                                Proses Aktivasi
                                            </button>
                                        </div>
                                    </div>
                                </div>    
                            </form> -->
                            <?php 
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/core/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/core/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/core/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/core/plugins/jquery-notifications/js/messenger.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/core/plugins/jquery-notifications/js/messenger-theme-future.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/core/plugins/jquery-notifications/js/demo/demo.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/core/plugins/notifications.js"></script>
        <script src="<?php echo base_url(); ?>assets/core/plugins/toastr/toastr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/core/plugins/sweetalert2/dist/sweetalert2.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#otp").focus();

                $(document).on("click", "#btnBack", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    var url = "<?php echo base_url(); ?>";
                    window.open(url, '_self');
                });
            });
        </script>        
    </body>
</html>