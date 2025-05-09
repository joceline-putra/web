<?php
$project = ($_SERVER['SERVER_NAME']=='localhost') ? strtoupper(substr($_SERVER['PHP_SELF'],5,3)): 'Admin';

//Configuration User Menu Display From Session, 0=Vertical, 1=Horizontal
$user_menu_style = intval($session['menu_display']);
if($user_menu_style == 0){
	$body_class 				= '';
	$horizontal_menu_div_style  = 'display:none;';
	$horizontal_logo_style 		= 'display:none;';
}elseif($user_menu_style == 1){
	$body_class 				= 'horizontal-menu';
	$horizontal_menu_div_style 	= 'display:block;';
	$horizontal_logo_style 		= 'display:block;';
}
$switch_do = !empty($this->session->flashdata('switch_branch')) ?  intval($this->session->flashdata('switch_branch')) : 0;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <link rel="manifest" href="<?php echo base_url();?>manifest.json">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>upload/favicon.png">
    <link rel="shortcut icon" href="<?php echo base_url();?>upload/favicon.png" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo base_url();?>upload/favicon.png">
    <!-- Mendeklarasikan warna yang muncul pada address bar Chrome versi seluler -->
    <meta name="theme-color" content="#fff" />

    <!-- Mendeklarasikan ikon untuk iOS -->
    <!-- <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <meta name="apple-mobile-web-app-title" content="Nama Situs" />
    <link rel="apple-touch-icon" href="path/to/icons/128x128.png" /> -->

    <!-- Mendeklarasikan ikon untuk Windows -->
    <!-- <meta name="msapplication-TileImage" content="path/to/icons/128x128.png" />
    <meta name="msapplication-TileColor" content="#000000" /> -->

    <meta content="" name="description"/>
	<meta content="" name="author"/>
	
	<title><?php echo $project;?> : <?php echo $title; ?> : <?php echo ucfirst($session['user_data']['user_name']);?></title>
	<link href="<?php echo base_url();?>assets/core/favicon.png" sizes="16x16 32x32" type="image/png" rel="icon"> 

	<!-- Core CSS -->
	<link href="<?php echo base_url();?>assets/core/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/core/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/core/css/<?php echo !empty($theme['user_theme']) ? $theme['user_theme'] : 'white'; ?>.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/core/css/custom.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/core/css/webarch.css" rel="stylesheet" type="text/css"/>
	<!-- <link href="<?php #echo base_url();?>assets/webarch/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" /> -->
	<!-- <link href="<?php #echo base_url();?>assets/webarch/plugins/animate.min.css" rel="stylesheet" type="text/css"/> -->
	<!-- <link href="<?php #echo base_url();?>assets/webarch/css/dark.css" rel="stylesheet" type="text/css"/>	 -->
	
	<!-- Icon & Notification -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/core/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />   
	<!-- <link href="<?php #echo base_url();?>assets/core/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/> -->
	<link href="<?php echo base_url();?>assets/core/plugins/jquery-notifications/css/messenger.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="<?php echo base_url();?>assets/core/plugins/jquery-notifications/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen"/>  
	<link href="<?php echo base_url();?>assets/core/plugins/sweetalert2/sweetalert2.min.css"  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/core/plugins/toastr/toastr.min.css">   

	<!-- Form, Confirm, Select, Image -->
	<link href="<?php echo base_url();?>assets/core/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/core/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/core/plugins/bootstrap-clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="<?php echo base_url();?>assets/core/plugins/select2-4.0.8/css/select2.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="<?php echo base_url();?>assets/core/plugins/jconfirm-3.3.4/dist/jquery-confirm.min.css" rel="stylesheet">  
	<link href="<?php echo base_url();?>assets/core/plugins/croppie/css/croppie.css" rel="stylesheet" type="text/css"/>

	<!-- Datatable -->
	<link href="<?php echo base_url();?>assets/core/plugins/datatables-1.10.24/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
	
	<!-- <link href="<?php #echo base_url();?>assets/core/plugins/datatables-1.13.6/DataTables-1.13.6/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>		 -->
	<!-- <link href="<?php #echo base_url();?>assets/core/plugins/datatables-1.13.6/DataTables-1.13.6/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>	 -->
	<link href="<?php echo base_url();?>assets/core/plugins/datatables-1.13.6/FixedColumns-4.3.0/css/fixedColumns.bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<!-- <link href="<?php #echo base_url();?>assets/core/plugins/datatables-1.10.24/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css"/> -->
	<!-- <link href="<?php #echo base_url();?>assets/core/plugins/datatables-1.10.24/css/rowReorder.dataTables.min.css" rel="stylesheet" type="text/css"/> -->
	<!-- <link href="<?php #echo base_url();?>assets/core/plugins/datatables-1.10.24/css/datatables.checbox.min.css" rel="stylesheet" type="text/css"/> -->
		
	<!-- Other -->
	<link href="<?php echo base_url();?>assets/core/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">

	<!-- Third Party -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" rel="stylesheet">
	<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
	<style>
        .btn_switch_branch{
            padding:10px 5px;
        }
        .btn_switch_branch p {
            color:var(--back-primary)!important;
        }
        .btn_switch_branch:hover p{
            color:var(--theme-font)!important;
        }		
        .btn_switch_branch:hover, .btn_switch_branch:active, .btn_switch_branch:focus, .btn_switch_branch:visited, .btn_switch_branch:target{
            background-color: var(--back-primary);
        }
        .btn_switch_branch:hover p, .btn_switch_branch:active p, .btn_switch_branch:focus p, .btn_switch_branch:visited p, .btn_switch_branch:target p{
            color:var(--theme-font);
        }         
    </style>	  	
</head>
<body class="<?php echo $body_class; ?>"> <!-- horizontal-menu -->
	<?php include "header.php"; ?>
	<div class="page-container row">
		<?php 
			include "sidebar_web.php";                  
		?>
		<div id="page-content" class="page-content">
			<?php include "header_menu.php"; ?>
			<div id="portlet-config" class="modal">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Widget Settings</h3>
				</div>
				<div class="modal-body"> Widget settings form goes here 
				</div>
			</div>
			<div class="clearfix"></div>
			<div id="content" class="content col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php 
				if(isset($_view) && $_view)
					$this->load->view($_view);
				?>                    
			</div>
		</div>
	  	<?php #include "chat.php";?>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modal-form" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div id="modal-size" class="modal-dialog">
			<div class="modal-content">
				<form id="form-modal">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel">
							Modal Header
						</h4>
					</div>
					<div class="modal-body" style="background: white!important;">
					</div>
					<div class="modal-footer hide">            
					</div>
				</form>
			</div>
		</div>
	</div> 
	<div class="modal fade" id="modal-search-stock" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div id="modal-size" class="modal-dialog">
			<div class="modal-content modal-lg">
				<form id="form-modal-search-stock">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">
							Cari Stok Produk
						</h4>
						<!-- <p>Ketikkan nama / kode produk untuk mencari tahu saldo akhir setiap lokasi</p> -->
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="">
							<span aria-hidden="true" style="color:#888888;">&times;</span>
						</button>
					</div>
					<div class="modal-body" style="">
						<div class="grid simple">
            				<div class="grid-body">
								<div class="row">
									<div class="col-md-12 col-xs-12 col-sm-12">
										<b>Filter Produk Spesifik</b>
										<p>Ketikkan nama / kode produk untuk mencari saldo akhir setiap gudang</p>
									</div>
									<div class="col-md-12 col-xs-12 col-sm-12">
										<div class="form-group">
											<!-- <label class="form-label">Cari Stok Barang Setiap Gudang</label> -->
											<select id="header-goods" name="header-goods" class="form-control">
											</select>
										</div>
									</div>
									<div class="col-md-12 col-xs-12 col-sm-12 table-responsive">
										<table id="table-stock" class="table table-bordered">
											<thead>
												<th>Gudang</th>
												<th class="text-right">Stok</th>
												<th>Action</th>
											</thead>
											<tbody>
												<tr>
													<td colspan="3">Data tidak ada</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="grid simple">
            				<div class="grid-body">
								<div class="row">								
									<div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side" style="padding-top:8px;">
										<div class="col-md-12 col-xs-12 col-sm-12">
											<b>Filter Produk Tingkat Lanjut</b>
											<p>Ketikkan nama / kode produk yang memeliki kemiripan nama</p>
										</div>
										<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 form-group">
											<div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">
												<label class="form-label">Produk</label>
												<input id="filter_table_dashboard_stock_search" name="filter_table_dashboard_stock_search" class="form-control" style="border-radius:1px!important;" placeholder="Ketik Nama Produk (minimal 3 huruf)">
											</div>
										</div> 									
										<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 form-group">
											<div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">
												<label class="form-label">Gudang</label>
												<select id="filter_table_dashboard_stock_location" name="filter_table_dashboard_stock_location" class="form-control">
													<option value="0">-- Semua --</option>
												</select>
											</div>
										</div>                 
										<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 form-group">
											<div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">
												<label class="form-label">Sorting</label>
												<select id="filter_table_dashboard_stock_order" name="filter_table_dashboard_stock_order" class="form-control">
													<option value="1">Nama</option>
													<option value="0">Kode</option>
												</select>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 form-group">
											<div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">
											<label class="form-label">Urutan</label>
												<select id="filter_table_dashboard_stock_dir" name="filter_table_dashboard_stock_dir" class="form-control">
													<option value="asc">Ascending</option>
													<option value="desc">Descending</option>
												</select>
											</div>
										</div>                                      
									</div> 							
									<div class="col-md-12 col-xs-12 col-sm-12">
										<table id="table_dashboard_stock" class="table table-bordered" style="width:100%;">
											<thead>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">            
					</div>
				</form>
			</div>
		</div>
	</div> 
	<div class="modal fade" id="modal-search-product-history" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div id="modal-size" class="modal-dialog modal-lg">
			<div class="modal-content">
				<form id="form-modal-search-product-history">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">
							Cari Riwayat Produk
						</h4>
						<p>Ketikkan kode / nama produk untuk mencari tahu riwayat harga jual maupun beli terakhir</p>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="">
							<span aria-hidden="true" style="color:#888888;">&times;</span>
						</button>
					</div>
					<div class="modal-body" style="">
						<div class="row">
							<div class="col-md-6 col-xs-12 col-sm-12">
								<div class="form-group">
									<label class="form-label">Filter Produk</label>
									<select id="header-goods-history" name="header-goods-history" class="form-control">
									</select>
								</div>
							</div>
							<div class="col-md-6 col-xs-12 col-sm-12">
								<div class="form-group">
									<label class="form-label">Filter Customer / Supplier</label>
									<select id="header-contact-history" name="header-contact-history" class="form-control">
									</select>
								</div>
							</div>
							<div class="col-md-12 col-xs-12 col-sm-12 table-responsive">
								<table id="table-product-history" class="table table-bordered">
									<thead>
										<th>Tanggal</th>
										<th class="text-left">Transaksi</th>
										<th class="text-right">Harga Beli</th>
										<th class="text-right">Qty</th>
										<th class="text-right">Harga Jual</th>
										<th class="text-right">Qty</th>
									</thead>
									<tbody>
										<tr>
											<td colspan="6">Data tidak ada</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-product-stock-min" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div id="modal-size" class="modal-dialog">
			<div class="modal-content">
				<form id="form-modal-product-stock-min">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">
							Produk Mendekati Stok Minimal
						</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="">
							<span aria-hidden="true" style="color:#888888;">&times;</span>
						</button>
					</div>
					<div class="modal-body" style="">
						<div class="row">
							<div class="col-md-12 col-xs-12 col-sm-12">
								<table id="table-product-stock-min" class="table table-bordered">
									<thead>
										<th>Produk</th>
										<th class="text-right">Stok Minimal</th>
										<th class="text-right">Stok Saat Ini</th>
										<th>Action</th>
									</thead>
									<tbody>
										<tr>
											<td colspan="4">Data tidak ada</td>
										</tr>
									</tbody>
								</table>
							</div>                
						</div>
					</div>
					<div class="modal-footer">
					</div>
				</form>
			</div>
		</div>
	</div>	 	
	<div class="modal fade" id="modal-search-trans-over-due" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div id="modal-size" class="modal-dialog modal-lg">
			<div class="modal-content">
				<form id="form-modal-search-trans-over-due">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">
							Cari Data Jatuh Tempo
						</h4>
						<p>Ketikkan customer/supplier untuk melihat data yang telah jatuh tempo</p>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="">
							<span aria-hidden="true" style="color:#888888;">&times;</span>
						</button>
					</div>
					<div class="modal-body" style="">
						<div class="row">
							<div class="col-md-6 col-xs-12 col-sm-12">
								<div class="form-group">
									<label class="form-label">Filter Customer</label>
									<select id="header-trans-date-due-customer" name="header-trans-date-due-customer" class="form-control">
									</select>
								</div>
							</div>
							<div class="col-md-6 col-xs-12 col-sm-12">
								<div class="form-group">
									<label class="form-label">Filter Supplier</label>
									<select id="header-trans-date-due-supplier" name="header-trans-date-due-supplier" class="form-control">
									</select>
								</div>
							</div>
							<div class="col-md-6 col-xs-6 col-sm-6 table-responsive">
								<table id="table-trans-date-due-sales" class="table table-bordered">
									<thead>
										<th>Jatuh Tempo</th>
										<th class="text-left">Transaksi</th>
									</thead>
									<tbody>
										<tr>
											<td colspan="2">Data tidak ada</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-6 col-xs-6 col-sm-6 table-responsive">
								<table id="table-trans-date-due-purchase" class="table table-bordered">
									<thead>
										<th>Jatuh Tempo</th>
										<th class="text-left">Transaksi</th>
									</thead>
									<tbody>
										<tr>
											<td colspan="2">Data tidak ada</td>
										</tr>
									</tbody>
								</table>
							</div>				
						</div>
					</div>
					<div class="modal-footer">
					</div>
				</form>
			</div>
		</div>
	</div>	
	<div class="modal fade" id="modal-search-down-payment" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div id="modal-size" class="modal-dialog">
			<div class="modal-content modal-md">
				<form id="form-modal-search-stock">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">
							Cari Down Payment
						</h4>
						<!-- <p>Ketikkan nama / kode produk untuk mencari tahu saldo akhir setiap lokasi</p> -->
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="">
							<span aria-hidden="true" style="color:#888888;">&times;</span>
						</button>
					</div>
					<div class="modal-body" style="">
						<div class="grid simple">
            				<div class="grid-body">
								<div class="row">
									<div class="col-md-12 col-xs-12 col-sm-12">
										<b>Filter Customer Spesifik</b>
										<p>Ketikkan nama / kode customer untuk mencari saldo akhir down payment</p>
									</div>
									<div class="col-md-12 col-xs-12 col-sm-12">
										<div class="form-group">
											<!-- <label class="form-label">Cari Stok Barang Setiap Gudang</label> -->
											<select id="header-down-payment" name="header-down-payment" class="form-control">
											</select>
										</div>
									</div>
									<div class="col-md-12 col-xs-12 col-sm-12 table-responsive">
										<table id="table-down-payment" class="table table-bordered">
											<thead>
												<th>Customer</th>
												<th class="text-right">Sisa Down Payment</th>
												<th>Action</th>
											</thead>
											<tbody>
												<tr>
													<td colspan="3">Data tidak ada</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">            
					</div>
				</form>
			</div>
		</div>
	</div>        
	<!-- END CONTAINER -->

	<!-- Core JS -->
	<script src="<?php echo base_url();?>assets/core/plugins/pace/pace.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/core/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>  
	<!-- <script src="<?php #echo base_url();?>assets/core/plugins/jquery/jquery-3.6.3.min.js" type="text/javascript"></script>  	 -->
	<script src="<?php echo base_url();?>assets/core/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- <script src="<?php #echo base_url();?>assets/core/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script> -->
	<!-- <script src="<?php #echo base_url();?>assets/core/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script> -->
	<script src="<?php echo base_url();?>assets/core/js/webarch.js" type="text/javascript"></script>	

	<!-- Icon & Notification -->
	<script src="<?php echo base_url();?>assets/core/plugins/jquery-notifications/js/messenger.min.js" type="text/javascript"></script>
	<!-- <script src="<?php #echo base_url();?>assets/core/plugins/jquery-notifications/js/messenger-theme-future.js" type="text/javascript"></script> -->
	<script src="<?php echo base_url();?>assets/core/plugins/sweetalert2/sweetalert2.min.js"></script>
	<!-- <script src="<?php #echo base_url();?>assets/core/plugins/jquery-notifications/js/demo/demo.js" type="text/javascript"></script> -->
	<!-- <script src="<?php #echo base_url();?>assets/core/plugins/toastr/toastr.min.js"></script> -->

	<!-- Form,  Confirm, Select, Image -->
	<script src="<?php echo base_url();?>assets/core/plugins/autonumeric-4.1.0.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/core/plugins/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/core/plugins/daterangepicker/daterangepicker.js"></script>	
	<script src="<?php echo base_url();?>assets/core/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/core/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/core/plugins/bootstrap-clockpicker/bootstrap-clockpicker.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/core/plugins/select2-4.0.8/js/select2.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/core/plugins/jconfirm-3.3.4/dist/jquery-confirm.min.js"></script>
	<script src="<?php echo base_url();?>assets/core/plugins/croppie/js/croppie.min.js"></script>

	<!-- Datatable -->
	<script src="<?php echo base_url();?>assets/core/plugins/datatables-1.10.24/jquery.dataTables.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/core/plugins/datatables-1.10.24/dataTables.rowGroup.js" type="text/javascript"></script>
	
	<!-- <script src="<?php #echo base_url();?>assets/core/plugins/datatables-1.13.6/DataTables-1.13.6/js/jquery.dataTables.min.js" type="text/javascript"></script> -->
	<script src="<?php echo base_url();?>assets/core/plugins/datatables-1.13.6/FixedColumns-4.3.0/js/dataTables.fixedColumns.min.js" type="text/javascript"></script> 

	<!-- <script src="<?php #echo base_url();?>assets/core/plugins/datatables-1.10.24/dataTables.rowReorder.min.js" type="text/javascript"></script> -->
	<!-- <script src="<?php #echo base_url();?>assets/core/plugins/datatables-1.10.24/dataTables.responsive.min.js" type="text/javascript"></script> -->

	<!-- Other -->   
	<script src="<?php echo base_url();?>assets/core/plugins/base64.js" type="text/javascript"></script>  
	<script src="<?php echo base_url();?>assets/core/plugins/jquery.redirect.js" type="text/javascript"></script>   
	<script src="<?php echo base_url();?>assets/core/plugins/magnific-popup/jquery.magnific-popup.js" type="text/javascript"></script> 
	<!-- <script src="<?php echo base_url();?>assets/core/plugins/ckeditor-4.22/ckeditor.js" type="text/javascript"></script>   -->
	<!-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js" type="text/javascript"></script>   -->
	<!-- <script src="//cdn.ckeditor.com/4.25.1-lts/full/ckeditor.js"></script> -->

	<!-- Third Party -->    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>  
	<script src="<?php echo base_url();?>assets/core/plugins/apexcharts/apexcharts.min.js" type="text/javascript"></script>  	
	<!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>   -->
	<!-- <script src="<?php #echo base_url();?>assets/webarch/plugins/jquery-qrcode/qrcode.js"></script> -->
	<!-- <script src="<?php #echo base_url();?>assets/webarch/plugins/jquery-qrcode/jquery.qrcode.js"></script> -->	
	<!-- <script src="<?php #echo base_url();?>assets/webarch/js/form_elements.js" type="text/javascript"></script> -->
	<!-- <script src="<?php #cho base_url();?>assets/webarch/js/support_ticket.js" type="text/javascript"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

	<!-- Place the first <script> tag in your HTML's <head> -->
	<!-- <script src="https://cdn.tiny.cloud/1/74363np22ml1f8a2125wm4wcsrb7or7opnxcstl4lhxk54rh/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> -->

	<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
	<script>
		// tinymce.init({
		// 	selector: 'textarea',
		// 	plugins: [
		// 	// Core editing features
		// 	'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
		// 	// Your account includes a free trial of TinyMCE premium features
		// 	// Try the most popular premium features until May 23, 2025:
		// 	'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
		// 	],
		// 	toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
		// 	tinycomments_mode: 'embedded',
		// 	tinycomments_author: 'Author name',
		// 	mergetags_list: [
		// 	{ value: 'First.Name', title: 'First Name' },
		// 	{ value: 'Email', title: 'Email' },
		// 	],
		// 	ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
		// });
	</script>

  	<script type="text/javascript">
		$(document).ready(function() {
			var url_login 		= "<?= base_url('login'); ?>";
			var url_dashboard 	= "<?= base_url('dashboard/manage'); ?>";
			var url_search 		= "<?= base_url('search/manage'); ?>";
			var site_url        = "<?= site_url(); ?>";

            var switch_do          = parseInt("<?php echo $switch_do;?>");

			$('#search_input').select2({
				// placeholder: 'Cari Barang ?',
				minimumInputLength: 3,
				ajax: {
					type: "get",
					url: "<?= base_url('Barang/barang_search/');?>",
					dataType: 'json',
					delay: 250,
					processResults: function ( data ) {
						return {
							results: data
						};

					},
					cache: false
				},
				templateSelection: function ( data, container ) {
					// Add custom attributes to the <option> tag for the selected option
					return data.text;
				}
			});

			$(document).on("click",".btn-user-theme, .btn-user-theme", function(e) {
				// e.preventDefault(e);
				// var id = $(this);
				$.confirm({
					title: 'Ganti Warna Interface',
					columnClass: 'col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1',
					icon: 'fas fa-fill-drip',
					autoClose: 'btn2|10000',
					closeIcon: true,
					closeIconClass: 'fa fa-close',      
					content: function(){
						var disp = '';
							disp += '<div class="form-group">';
								disp += '<div class="controls">';
									disp += '<select name="theme" id="theme" style="width:100%">';
                                        disp += '<optgroup label="Minimalist">';
                                            disp += '<option value="black">Black</option>';
                                            disp += '<option value="blue">Blue</option>'; 
                                            disp += '<option value="white">White</option> ';                                                                               
                                            disp += '<option value="green">Green</option>';                                      
                                            disp += '<option value="red">Red</option>';                                      
                                            disp += '<option value="purple">Purple</option>';
                                            disp += '<option value="peach">Peach</option>';
                                            disp += '<option value="orange">Orange</option>';
                                            disp += '<option value="dark">Dark Mode</option>';                                            
                                        disp += '</optgroup>';
                                        disp += '<optgroup label="Gradient Colorfull">';
                                            disp += '<option value="black-blue">Blue Sapphire</option>';
                                            disp += '<option value="blue_sea">Blue Sea</option>';
                                            disp += '<option value="blue_scooter">Blue Scooter</option>';                                             
                                            // disp += '<option value="black-white">Black White</option>';
                                            disp += '<option value="black_steel">Black Steel</option>';  
									        disp += '<option value="green_lush">Green Lush</option>';                                                                                    
                                            disp += '<option value="orange_coral">Orange Coral</option>';
										    disp += '<option value="red_celestial">Red Celestial</option>'
                                            disp += '<option value="purple_virgin_america">Purple Virgin America</option>';                                            ;  
                                            disp += '<option value="purple_aubergine">Purple Aubergine</option>';                                                                                        
                                        disp += '</optgroup>';                                       																								
									disp += '</select>';
								disp += '</div>';
							disp += '</div>';   
						return disp; 
					},
					onContentReady: function(){
						// when content is fetched & rendered in DOM
					},
					buttons: {
						btn1: {
							text: 'Terapkan',
							btnClass: 'btn-primary',
							action: function(){
								var color = this.$content.find('#theme option:selected').val();
								$.ajax({
									type: "POST",     
									url: "<?php echo base_url('user/manage');?>",
									data: {
										action: 'change-theme',
										theme: color
									},
									dataType:'json',
									success:function(d){
										if(d.status==1){ /* Success Message */
											// notifSuccess(result['message']);
											window.location.href = d.url;
										}else{ /* Error */
											// notifError(result['message']);  
										}           
									}
								});
							}
						},
						btn2: {
							text: 'Batal',
							btnClass: 'btn-default',
							action: function(){
								
							}
						}
					}
				});
			});
			$(document).on("click","#btn-user-password, btn-user-password", function(e) {
				$.confirm({
					title: 'Ganti Password Anda',
					columnClass: 'col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1',
					icon: 'fas fa-key',
					autoClose: 'cancel|30000',
					closeIcon: true,
					closeIconClass: 'fa fa-close',
					content: function(){
					var disp = '';
						disp += '<div class="form-group">';
						disp += '<label for="label-password" class="label-password">Password Baru</label>';
						disp += '<div class="controls">';
						disp += '<input type="password" name="password" id="password" style="width:100%">';
						disp += '<label for="label-confirm-password" class="label-confirm-password">Confirm Password</label>';
						disp += '<input type="password" name="cpassword" id="cpassword" style="width:100%">';
						disp += '</div>';
						disp += '</div>';
					return disp;
					},
					onContentReady: function(){
					// when content is fetched & rendered in DOM
					},
					buttons: {
					formSubmit: {
						text: '<i class="fas fa-check"></i> Ganti', btnClass: 'btn-blue',
						action: function () {
						var password = this.$content.find('#password').val();
						var confirm_password = this.$content.find('#cpassword').val();
						if(password == ''){
							$.alert('Password tidak boleh kosong');
							return false;
						}
						if(confirm_password == ''){
							$.alert('Konfirmasi password harus diisi');
							return false;
						}
						if(password != confirm_password){
							$.alert('Konfirmasi password harus sama dengan password baru');
							return false;
						}
						var data = {
							action: 'change-password',
							password: password
						};
						$.ajax({
							type: "POST",
							url: "<?= base_url('user/manage');?>",
							data: data,
							dataType: 'json',
							success:function(d){
							if(d.status == 1){
								notif(1,d.message);
							}else{
								notif(0,d.message);
							}
							}
						});
						}
					},
					cancel: {
						text:'<i class="fas fa-window-close"></i> Batal', btnClass: 'btn-default',
						action: function(){
						}
					}
					// cancel: function () {
						//close
					// }
					},
					onContentReady: function () {
						// bind to events
						var jc = this;
						this.$content.find('form').on('submit', function (e) {
							// if the user submits the form by pressing enter in the field.
							e.preventDefault();
							jc.$$formSubmit.trigger('click'); // reference the button and click it
						});
					}
					/*btn1: {
						text: 'Ganti',
						btnClass: 'btn-primary',
						action: function(){
						var password = this.$content.find('#password').val();
						var confirm_password = this.$content.find('#cpassword').val();
						console.log(password,confirm_password);
						if(password == ''){
							notif(0, 'Password tidak boleh kosong');
							console.log('a');
						} else if(confirm_password == ''){
							notif(0, 'Konfirmasi password harus diisi');
							console.log('b');
						} else if(password != confirm_password){
							notif(0, 'Konfirmasi password harus sama dengan password baru');
							console.log('c');
						}else{
							var data = {
							action: 'change-password',
							password: password
							};
							$.ajax({
							type: "POST",
							url: "<?= base_url('User/manage');?>",
							data: data,
							dataType: 'json',
							success:function(d){
								if(parseInt(d.status) == 1){
								notif(1,d.message);
								}else{
								notif(0,d.message);
								}
							}
							});
						}
						}
					},
					btn2: {
						text: 'Batal',
						btnClass: 'btn-default',
						action: function(){

						}
					}*/
					//}
				});
			});
			$(document).on("click","#btn-user-switch, .btn-user-switch",function(e) {
				e.preventDefault();
				e.stopPropagation();
				let title   = 'Pindah User';
				$.confirm({
					title: title,
					columnClass: 'col-md-5 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1',      
					autoClose: 'button_2|60000',    
					closeIcon: true, closeIconClass: 'fas fa-times',    
					animation:'zoom', closeAnimation:'bottom', animateFromElement:false,      
					content: function(){
						let self = this;
				
						let data = {
							source:'users'
						};        
						
						// let form = new FormData();
						// form.append('action','switch-user');
						// form.append('source','users');
				
						return $.ajax({
							url: url_search+'?source=users-switch',
							// data: data,
							dataType: 'json',
							type: 'get',
							cache: 'false', contentType: false, processData: false,
						}).done(function (d) {
							// let len = d.length;
							// var dsp = '';
							// for(var a=0; a<len; a++){
							// 	if(parseInt(d[a]['id']) > 0){
							// 		dsp += '<option value="'+d[a]['id']+'">'+d[a]['nama']+'</option>';
							// 	}
							// }
							// console.log(dsp);
							// self.setContentAppend('<select>'+dsp+'</select');			
						}).fail(function(){
							self.setContent('Something went wrong, Please try again.');
						});
					},
					onContentReady: function(){
						let self = this;
						let content = '';
						let dsp     = '';
				
						let d = self.ajaxResponse.data;
						let s = d.status;
						let m = d.message;
						let r = d.result;
				
						let len = d.length;

						// dsp += '<div>Content is ready after process !</div>';
						dsp += '<form id="jc_form">';
							dsp += '<div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">';
							dsp += '    <div class="form-group">';
							dsp += '    <label class="form-label">Choice User [Cabang - Group - Username]</label>';
							dsp += '        <select id="jc_select" name="jc_select" class="form-control">';
							for(var a=0; a<len; a++){
								if(parseInt(d[a]['id']) > 0){
									dsp += '<option value="'+d[a]['id']+'">'+d[a]['text']+'</option>';
								}
							}								
							dsp += '        </select>';
							dsp += '    </div>';
							dsp += '</div>';
						dsp += '</form>';
						content = dsp;
						self.setContentAppend(content);

						$('#jc_select').select2({
							dropdownParent:$(".jconfirm-box-container"), //If Select2 Inside Modal
							// placeholder: '<i class="fas fa-search"></i> Search',
							//width:'100%',
							tags:true,
							minimumInputLength: 0,
							ajax: {
								type: "get",
								url: url_search,
								dataType: 'json',
								delay: 250,
								data: function (params) {
									var query = {
										search: params.term,
										tipe: 1,
										source: 'users-switch'
									};
									return query;
								},
								processResults: function (data) {
									return {
										results: data
									};
								},
								cache: true
							},
							escapeMarkup: function(markup){ 
								return markup; 
							},
							templateResult: function(datas){ //When Select on Click
								if (!datas.id) { return datas.text; }
								if($.isNumeric(datas.id) == true){
									// return '<i class="fas fa-user-check '+datas.id.toLowerCase()+'"></i> '+datas.text;
									return datas.text;          
								}else{
									return datas.text;          
								}  
							},
							templateSelection: function(datas) { //When Option on Click
								if (!datas.id) { return datas.text; }
								return datas.text;
							}
						}); 
						// self.buttons.button_1.disable();
						// self.buttons.button_2.disable();
			
						// this.$content.find('form').on('submit', function (e) {
						//      e.preventDefault();
						//      self.$$formSubmit.trigger('click'); // reference the button and click it
						// });
					},
					buttons: {
						button_1: {
							text:'<span class="fas fa-sign-in-alt"></span> Masuk',
							btnClass: 'btn-primary',
							keys: ['enter'],
							action: function(){
								let self      = this;
								let select    = self.$content.find('#jc_select').val();
								
								if(select == 0){
									$.alert('User dipilih dahulu');
									return false;
								} else{
									let form = new FormData();
									form.append('action', 'action');
									// form.append('input', input);
									// form.append('textarea', textarea);
									form.append('user_id', select);
									$.ajax({
										type: "post",
										url: url_login+'/authentication_switch',
										data: form, dataType: 'json',
										cache: 'false', contentType: false, processData: false,
										beforeSend: function() {},
										success: function(d) {
											let s = d.status;
											let m = d.message;
											let r = d.result;
											if(parseInt(s) == 1){
												window.location.href = d.result.return_url;												
											}else{
												notif(s,m);
											}
										},
										error: function(xhr, status, err) {}
									});
								}            
							}
						},
						button_2: {
							text: '<span class="fas fa-times"></span> Tutup',
							btnClass: 'btn-danger',
							keys: ['Escape'],
							action: function(){
								//Close
							}
						}
					}
				});
			});
			$(document).on("click",".btn-user-navigation",function(e) {
				e.preventDefault();
				e.stopPropagation();
				var user = $(this).attr('data-user');
				var is_root = $(this).attr('data-is-r');
                var is_allowed = $(this).attr('data-is-allowed');				
				// let title   = 'Hai '+user;
				let title = '';

				$.confirm({
					title: title,
					columnClass: 'col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1',      
					autoClose: 'button_2|20000',
					closeIcon: false, closeIconClass: 'fas fa-times', 
					animation:'zoom', closeAnimation:'bottom', animateFromElement:false, useBootstrap:true,
					content: function(){
					},
					onContentReady: function(e){
						let self    = this;
						let content = '';
						let dsp     = '';
				
						// dsp += '<div></div>';
						dsp += '<div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">';
						// dsp += '<div class="navbar-inner" class="visible-xs visible-sm">';
						// dsp += '<div class="header-seperation">';
						dsp += '<ul class="ul-user-navigation">';						
							dsp += '<li><a href="#" class="btn-user-password"><i class="fas fa-key"></i><span style="position: relative;">&nbsp;Ganti Password</span></a></li>';
							dsp += '<li><a href="<?= base_url('login/logout'); ?>"><i class="fa fa-power-off"></i><span style="position: relative;">&nbsp;Keluar</span></a></li>';
						dsp += '</ul>';
						dsp += '</div>';
						// dsp += '</div>';
						content = dsp;
						self.setContentAppend(content);
					},
					buttons: {
						button_2: {
							text: 'Batal',
							btnClass: 'btn-danger',
							keys: ['Escape'],
							action: function(){
								//Close
							}
						}
					}
				});
			});
			$(document).on("click",".btn-user-menu-style",function(e) {
				e.preventDefault();
				e.stopPropagation();
				var user = $(this).attr('data-user');
				var is_root = $(this).attr('data-is-r');
				// let title   = 'Hai '+user;
				let title = 'Pengaturan posisi menu ?';

				$.confirm({
					title: title,
					columnClass: 'col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1',      
					// autoClose: 'button_2',
					closeIcon: true, closeIconClass: 'fas fa-times', 
					animation:'zoom', closeAnimation:'bottom', animateFromElement:false, useBootstrap:true,
					content: function(){
					},
					onContentReady: function(e){
					},
					buttons: {
						button_1: {
							text: '<i class="fas fa-arrow-left"></i> Menu di Kiri',
							btnClass: 'btn-success',
							keys: ['Escape'],
							action: function(){
								$.ajax({type: "post",url: url_login+'/manage',data: {action:'change-menu-style',val:0}, 
									dataType: 'json', cache: 'false', 
									beforeSend:function(){},
									success:function(d){window.location.href = d.return_url;
									},error:function(xhr,status,err){}
								});
							}
						},
						button_2: {
							text: '<i class="fas fa-arrow-up"></i> Menu di Atas',
							btnClass: 'btn-primary',
							keys: ['Escape'],
							action: function(){
								$.ajax({type: "post",url: url_login+'/manage',data: {action:'change-menu-style',val:1}, 
									dataType: 'json', cache: 'false', 
									beforeSend:function(){},
									success:function(d){window.location.href = d.return_url;
									},error:function(xhr,status,err){}
								});
							}
						}
					}
				});
			});
			$(document).on("click","#btn-branch-switch, .btn-branch-switch",function(e) {
				e.preventDefault();
				e.stopPropagation();
                switch_branch();
			});         		
		  	//on change #search_input => info stok barang berdasarkan gudang
		  	$("#search_input").on("change", function(){
				var id = $(this).val();
				if(id > 0){
				  	$.ajax({
						type: "GET",     
						url: "<?= base_url('Barang/barang_get_satuan/'); ?>"+id,
						beforeSend:function(){},
						success:function(result){
							// reset select value 0
							$("#search_input").val(0).trigger('change');

							// nama + satuan
							var nama_a = result.nama + ' - ' +result.satuan;
							// nama
							var nama_b = result.nama;
							// jumlah desimal  = 4 => 1,0000
							var jumlah_desimal = 2;
						  
						  	/* BEGIN JCONFIRM X TABLE */
							// documentation : https://craftpip.github.io/jquery-confirm/
							$.confirm({
							  // custom layout
							  columnClass: 'medium',
							  // content
							  content: function () {
								  var self = this;
								  return $.ajax({
									  url: "<?= base_url('Barang/barang_get_stock_on_gudang/'); ?>"+id+"/"+jumlah_desimal,
									  dataType: 'json',
									  method: 'GET'
								  }).done(function (result) {
									  // title content
									  self.setTitle(nama_a);
									  
									  if(result.total_records > 0){
										
										// table tag
										var head = '<table class="table table-bordered table-striped"><tbody><tr><td style="padding:4px 0px!important;text-align:center"><b>Stok</b>&nbsp;</td><td style="padding:4px 0px!important;text-align:center">&nbsp;<b>Gudang</b></td><td class="hide" style="padding:4px 0px!important;text-align:center">&nbsp;<b>Riwayat</b></td></tr>';
										
										// table body
										var body = '';
										
										// end tag table
										var end = '</tbody></table>';
										
										$.each(result.result, function(i,val){
										   
											// table body
											body += '<tr>'+
													  '<td style="padding:4px 0px!important;text-align:right;"><b>'+ val.qty_akhir+'</b>&nbsp;<span class="hide fa fa-arrow-right"></td>'+
													  '<td style="padding:4px 0px!important;">&nbsp;<b>'+ val.gudang_kode +' - '+ val.gudang_nama +'</b>&nbsp;</td>'+
													  '<td class="hide" style="text-align:center;">'+
														'<button class="btn btn-primary btn-mini btn-riwayat-kartu-stok"'+
														' data-id-barang='+ val.id_barang+''+
														' data-id-lokasi='+ val.id_gudang+''+
														'>'+
														'Kartu Stok</button></td>'+
													'</tr>';

											// table structure
											var table = head+body+end;
											// content        
											self.setContent(table);
										 });
									  };

								  }).fail(function(){
									  // error
									  self.setContent('Something went wrong...');
								  });
							  },
								// autoClose: 'close|30000',
								buttons: {
									close: {
										btnClass: 'btn-dark',
										action: function(){}
									}
								}      
							});
						  	/* END JCONFIRM X TABLE */
						},
						error:function(xhr, Status, err){
							notifError('Error');
						}
				  	});
				};
		  	});
			$(document).on("click","#body-condense",function(e) {
				$("body").condensMenu();
			});
			$(document).on("click","#body-showhide",function(e) {
				$("body").toggleMenu();
			});   
		  	$.fn.datepicker.dates['id'] = {
				days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
				daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
				daysMin: ["Mi", "Se", "Sl", "Rb", "Km", "Ju", "Sb"],
				months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
				today: "Today",
				clear: "Clear",
				format: "mm/dd/yyyy",
				titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
				weekStart: 0
		  	};
            function switch_branch(){
                let title   = 'Ganti Cabang';
                $.confirm({
                    title: title,
                    columnClass: 'col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1',
                    closeIcon: true, closeIconClass: 'fas fa-times',    
                    animation:'zoom', closeAnimation:'bottom', animateFromElement:false,      
                    content: function(){
                        let self = this;
                        return $.ajax({
                            url: url_search+'?source=branchs',
                            dataType: 'json',
                            type: 'get',
                            cache: 'false', contentType: false, processData: false,
                        }).done(function (d) {		
                        }).fail(function(){
                            self.setContent('Something went wrong, Please try again.');
                        });
                    },
                    onContentReady: function(){
                        let self = this;
                        let content = '';
                        let dsp     = '';
                
                        let d = self.ajaxResponse.data;
                        let s = d.status;
                        let m = d.message;
                        let r = d.result;
                
                        let len = d.length;
                        // dsp += '<div>Silahkan pilih cabang yg ingin diinginkan</div>';
                        dsp += '<form id="jc_form">';
                            dsp += '<div class="col-md-12 col-xs-12 col-sm-12 padding-remove-side">';
                            for(var a=0; a<len; a++){
                                if(parseInt(d[a]['id']) > 0){
                                    dsp += '<div class="col-md-3 col-sm-4 col-xs-6 padding-remove-side" style="cursor:pointer;">';
                                        dsp += '<a href="#" class="btn_switch_branch col-md-12 col-sm-12 col-xs-12" data-id="'+d[a]['id']+'">';
                                            dsp += '<div class="col-md-12 col-sm-12 col-xs-12">';
                                                dsp += '<img src="'+site_url+d[a]['branch_logo']+'" class="img-responsive">';
                                            dsp += '</div>';
                                            dsp += '<div class="col-md-12 col-sm-12 col-xs-12">';                  
                                                dsp += '<p style="text-align: center;font-size: 15px;font-weight: 800;">'+d[a]['nama']+'</p>';
                                            dsp += '</div>';           
                                        dsp += '</a>';                                   
                                    dsp += '</div>';
                                }
                            }							
                            dsp += '</div>';
                            dsp += '<input id="jc_input" name="jc_input" value="0" type="hidden">';
                        dsp += '</form>';
                        content = dsp;
                        self.setContentAppend(content);

                        $(document).on("click",".btn_switch_branch",function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            var id = $(this).attr('data-id');
                            $("#jc_input").val(id);
                        });
                    },
                    buttons: {
                        button_1: {
                            text:'<span class="fas fa-sign-out-alt"></span> Masuk',
                            btnClass: 'btn-primary',
                            keys: ['enter'],
                            action: function(){
                                let self      = this;
                                let select    = self.$content.find('#jc_input').val();
                                
                                if(select == 0){
                                    $.alert('Cabang dipilih dahulu');
                                    return false;
                                } else{
                                    let form = new FormData();
                                    form.append('action', 'action');
                                    // form.append('input', input);
                                    // form.append('textarea', textarea);
                                    form.append('branch_id', select);
                                    $.ajax({
                                        type: "post",
                                        url: url_login+'/authentication_switch_branch',
                                        data: form, dataType: 'json',
                                        cache: 'false', contentType: false, processData: false,
                                        beforeSend: function() {
                                        },
                                        success: function(d) {
                                            let s = d.status;
                                            let m = d.message;
                                            let r = d.result;
                                            if(parseInt(s) == 1){
                                                window.location.href = d.result.return_url;												
                                            }else{
                                                notif(s,m);
                                            }
                                        },
                                        error: function(xhr, status, err) {}
                                    });
                                }            
                            }
                        },
                        button_2: {
                            text: '<span class="fas fa-times"></span> Batal',
                            btnClass: 'btn-default',
                            keys: ['Escape'],
                            action: function(){
                                //Close
                            }
                        }
                    }
                });
            } 
            if(switch_do > 0){
                // switch_branch();
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
		function loader($stat) {
			if ($stat == 1) {
				swal({
					title: '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
					html: '<span style="font-size: 14px;">Loading...</span>',
					width: '20%',
					showConfirmButton: false,
					allowOutsideClick: false
				});
			} else if ($stat == 0) {
				swal.close();
			}
		}
		function notif($type,$msg) {
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

		// Notif Messenger Example
		function notifSuccess(msg){
			Messenger().post({
				message: msg,
				type: 'success',
				showCloseButton: true
			});
			// toastr.success('j');
			// toastr.options = {
			//     "closeButton": false,
			//     "debug": false,
			//     "newestOnTop": true,
			//     "progressBar": true,
			//     "positionClass": "toast-top-right",
			//     "preventDuplicates": false,
			//     "showDuration": "300",
			//     "hideDuration": "1000",
			//     "timeOut": "5000",
			//     "extendedTimeOut": "1000",
			//     "showEasing": "swing",
			//     "hideEasing": "linear",
			//     "showMethod": "slideDown",
			//     "hideMethod": "fadeOut",
			//     "rtl": false
			//   }  
			//   // Command: toastr['success'](msg, msg)
			//   // toastr.options.onclick = function() { console.log('clicked'); }
			//   // toastr.options.onCloseClick = function() { console.log('close button clicked'); }    
			//   // toastr.info('Are you the 6 fingered man?')
			//   toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000})
		}
		function notifConfirm(message){
			msg = Messenger().post({
				message: message,
				type: 'info',
				actions: {
					ok: {
						label: "Ok",
						action: function(){
						//
						// msg.hide()
						alert('You click ok');
						}
					},
					cancel: {
						action: function(){
							msg.hide()
						}
					}
				}
			})
		}
		function notifError(msg){
			Messenger().post({
				message: msg,
				type: 'error',
				showCloseButton: true
			});
		} 
		function notifProgress(errorMessage,successMessage){
			var i = 0;
			Messenger().run({
				errorMessage: errorMessage,
				successMessage: successMessage,
				action: function(opts) {
					if (++i < 3) {
						return opts.error({
						status: 500,
						readyState: 0,
						responseText: 0
						});
					} else {
						return opts.success();
					}
				}
			});
		}        

		// JConfirm
		function alerts(title,message,buttonText){
			$.alert({
				title: title,
				content: message,
				type: 'green',
				animation: 'scale',
				closeAnimation: 'scale',
				escapeKey: true,
				backgroundDismiss: true,
				buttons:{
					ok:{
						text: buttonText,
						btnClass: 'btn-primary',
						action: function(){
							// code here..
						}
					}
				}
			});
		}
		function openAlert(title,message,buttonText,milisecond){
			$.alert({
				title: title,
				content: message,
				autoClose: 'ok|'+milisecond,                
				buttons:{
					ok:{
						text: buttonText,
						btnClass: 'btn-green',
						action: function(){

						}
					}
				}
			});
		}
		function openConfirm(){
			$.confirm({
				title: 'Confirm!',
				content: 'Simple confirm!',
				buttons: {
					info: {
						btnClass: 'btn-blue',
						action: function(){

						}
					},
					confirm: function () {
						$.alert('Confirmed!');
					},
					cancel: function () {
						$.alert('Canceled!');
					},
					somethingElse: {
						text: 'Something else',
						btnClass: 'btn-blue',
						keys: ['enter', 'shift'],
						action: function(){
							$.alert('Something else?');
						}
					}
				}
			});
		}               
		// Custom  
		function logout(page,action){
			$.ajax({
				type: "POST",     
				url : "<?php echo base_url('login/logout');?>", 
				beforeSend:function(){
				},
				success:function(msg){
					var d=JSON.parse(msg);
					if(d['status']==1){
						notifSuccess(d['message']);
						window.location.href = '<?php echo base_url();?>';
					}
					else if(d['status']==0){ 
						notifError(d['message']);
					}            
				},
				error:function(xhr, Status, err){
					alert('Gagal');
				}
			});
		}   
		function checkInternet(status){
		  	if(status=='offline'){
				var stat = 'Internet Offline';
		  	}else{
				var stat = 'Internet Online';
		  	}
	  		$.confirm({
			 	// theme: 'bootstrap',
				type: 'red',
				title: stat,
				content: 'Check your internet connections',
				autoClose: 'trying|10000',
				buttons: {
					trying: {
						text: 'Trying In',
						btnClass: 'btn-red',                          
						action: function () {
						}
					},
					close: {
						text: 'Close',
						action: function () {
						}
					}
				}
			});
		}
		function setSelect2(formid,idoption,textoption){
			var data = {
				id: idoption
			};
			// Set the value, creating a new option if necessary
			if ($(formid).find("option[value='" + data.id + "']").length) {
				$(formid).val(data.id).trigger('change');
			} 
			else { 
				// Create a DOM Option and pre-select by default
				var newOption = new Option(data.id, true, true);
				// Append it to the select
				$(formid).append(newOption).trigger('change');
			}                
		}      
		function activeTab(tab){
			$('.nav-tabs a[href="#' + tab + '"]').tab('show');
		}
		function loadNotif(){
			$.ajax({
				type: "POST",     
				url: "<?= base_url('menu/notif/'); ?>",
				data:$("#form-master").serialize(), 
				beforeSend:function(){},
				success:function(result){
					if(result['total_records'] >= 1){ /* Success Message */
						console.log(result)
						$('#my-task-list').append('<span id="notif-count" class="badge badge-important bubble-only" style="padding: 3px 1px;height: 15px; width: 15px;bottom: 4px;">'+result['total_records']+'</span>');

						var data = result['result'];
						var text = "";
						var i = 0;
						for (; i < result['total_records']; i++) {
							text += '<div class="upd" style="width: 300px" onClick="approve(&#39;'+data[i]['controller']+'&#39;,&#39;'+data[i]['idPrint']+'&#39;);"><div style="width:290px; margin-left: auto; margin-right: auto;"><div class="notification-messages info"><div class="user-profile"><img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35"></div><div class="message-wrapper"><div class="heading">'+data[i]['user']+' Meminta Persetujuan</div><div class="description">'+data[i]['menu']+' '+data[i]['nomor']+'</div><div class="recent pull-left">'+data[i]['tgl']+'</div></div><div class="clearfix"></div></div></div><div>';
						}
						$('.upd').remove();
						$('#drop').append(text);
					}
				},
				error:function(xhr, Status, err){
					notifError('Error');
				}
			});
		}
		function approve(menu,id){
			window.open('<?= base_url();?>'+menu+'/prints/'+id)
		}
		function scrollUp(idelement){
			$([document.documentElement, document.body]).animate({
			scrollTop: $("#"+ idelement).offset().top
			}, 2000);
		}   
		// $(".sidebarz").scroll(function() { //.box is the class of the div
		//   var sidebar_from_top = $(".sidebarz").offset().top;
		//   console.log('As:'+sidebar_from_top);
		//     // $("span").css( "display", "inline" ).fadeOut( "slow" );
		// });
		function addCommas(string){
			string += '';
			var x = string.split('.');
			var x1 = x[0];
			var x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + ',' + '$2');
			}
			return x1 + x2;
		}
		function removeCommas(string){

		 	return string.split(',').join("");
		}
		function numberWithCommas(x) {
		    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}
  	</script>   
	<!-- <script src="<?php #echo base_url();?>assets/pwa.min.js" type="text/javascript"></script> -->
	<script>
		// UpUp.start({ 'content-url' : '<?php #echo base_url();?>' });
        // var BASE_URL = '<?= base_url() ?>';
        // document.addEventListener('DOMContentLoaded', init, false);
        // function init() {
        //     if ('serviceWorker' in navigator && navigator.onLine) {
        //         navigator.serviceWorker.register( BASE_URL + 'manifest_sw.js')
        //         .then((reg) => {
        //             console.log('ServiceWorker: Registered'); 
		// 			// console.log(reg);                    
        //         }, (err) => {
        //             console.error('ServiceWorker: Failed'); 
		// 			console.log(err);
        //         });
        //     }
        // }
	</script>    
<?php if (isset($script)) { /* $this->load->view($script); */ } ?>
<?php 
	if(isset($_js) && $_js)
		$this->load->view($_js);
?>       
</body>
</html>