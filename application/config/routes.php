<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['default_controller'] = 'Index/index';
$route['default_controller']    = 'website';
$route['404_override']          = 'website/notfound';
$route['translate_uri_dashes']  = FALSE;
$route['search']                = "search/index";

/* LOGIN / REGISTER */
	$route['login'] 		= "login/pages/0";
	$route['register'] 		= "login/pages/1";
	$route['password'] 		= "login/pages/2";
	$route['activation'] 	= "login/pages/3";

	//Confirmasi Berhasil Dikirim Ke Email/WA
    // $route['register/confirmation/(:any)'] = "login/register_confirmation/$1"; //http://localhost:8888/git/jrn/register/confirmation/PSR6F7
    $route['register/confirmation'] 		= "login/register_confirmation"; //http://localhost:8888/git/jrn/register/confirmation/PSR6F7
	//Saat User Tekan Konfirmasi di Email/Wa
	$route['register/activation/(:any)'] 	= "login/register_activation/$1"; //http://localhost:8888/git/jrn/register/activation/W82A86WXSJTUYGC2ER7NNP2PAG8SDEPZ/PSR6F7

	//Saat User Mengirim Permintaan Lupa Password
	$route['password_sent'] 			 	= "login/password_sent"; //http://localhost:8888/git/jrn/password_sent
	$route['password/recovery/(:any)']   	= "login/password_reset_form/$1"; //http://localhost:8888/git/jrn/register/activation/W82A86WXSJTUYGC2ER7NNP2PAG8SDEPZ/PSR6F7

	$route['setup'] 				        = "setup/setup_company";	
	// $route['admin/setup_company'] 			= "setup/company";
	// $route['admin/setup_account'] 			= "setup/account";

/* ADMIN */
	$route['admin'] = "index/index";
	$route['session'] = "login/session";
	// $route['login/'] = "auth";
	// $route['report/(:any)'] = "report/manage/$1";

	$route['blog/article'] 					= "news/pages/1";
	$route['message/template'] 				= "news/pages/2";
	$route['blog/project'] 					= "news/pages/5";
	$route['blog/gallery'] 					= "news/pages/6";
	$route['blog/portofolio'] 				= "news/pages/7";	
	$route['blog/team'] 				    = "news/pages/8";	
	$route['blog/product'] 					= "product";			
	$route['message/device'] 				= "device";    
	$route['message/survey'] 				= "survey";
	$route['message/recipient']		        = "recipient";    

	$route['category/product'] 				= "kategori/pages/1";
	$route['category/article'] 				= "kategori/pages/2";
	$route['category/contact'] 				= "kategori/pages/4";	   

/* WEBSITE */
    // Home
	$route['tentang-kami']          = "website/about";
	$route['contact-us']            = "website/contact_us";	
	$route['masuk']                 = "website/signin";
	$route['faqs']                  = "website/faqs";
	$route['firebase']              = "website/firebase";
	// $route['map']                = "website/map";	
	$route['career']       			= "website/career";				
	$route['privacy']               = "website/privacy";
	$route['term-of-service']       = "website/term";
	$route['account']       		= "website/account";

	// Shop
	$route['cart']      	        = "website/cart";
	$route['checkout']  	        = "website/checkout";
	$route['wishlist']   	        = "website/wishlist";	
	$route['payment']   	        = "website/payment";	
	
	// Pages View DEMO
	$route['products']              = "website/products";
	$route['product']               = "website/product";
	$route['articles']              = "website/articles";
	$route['article']               = "website/article";

	// Pages View REAL
	$route['produk']  				= "website/produk";	    	// produk
	$route['produk/(:any)']  		= "website/produk/$1";	    // produk/sncak
	$route['produk/(:any)/(:any)']  = "website/produk/$1/$2";	// produk/sncak/anekagetuk
	$route['blog/(:any)']        	= "website/blog/$1";	    // article/olahraga
	$route['blog/(:any)/(:any)'] 	= "website/blog/$1/$2";	    // article/olahraga/hai-kawan

    //Not Used / OLD Concept
    // $route['blog'] 					= "website/blog";
	// $route['agent']              = "website/agent";      
	// $route['blog/(:any)'] 							= "website/blog/$1";
	// $route['blog/(:any)/(:any)'] 					= "website/blog/$1/$2";
	// $route['product/kategori_produk'] 	            = "produk/pages/7";
	// $route['agent'] 								    = "website/agent";
	// $route['agent/(:any)'] 							= "website/agent/$1";
	// $route['properti'] 								= "website/product"; //properti
	// $route['properti/(:any)'] 						= "website/product/$1"; //properti/jual
	// $route['properti/(:any)/(:any)'] 				= "website/product/$1/$2"; //properti/jual/apartemen
	// $route['properti/(:any)/(:any)/(:any)'] 		    = "website/product/$1/$2/$3"; //properti/jual/apartemen/semarang
	// $route['properti/(:any)/(:any)/(:any)/(:any)'] 	= "website/product/$1/$2/$3/$4"; //properti/jual/apartemen/semarang/namaproduct
	// $route['product'] 
