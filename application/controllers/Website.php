<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller{

    public $asset; public $layout; public $controller;
    
    public $product_routing; public $blog_routing; public $contact_routing; public $gallery_routing; public $project_routing;
    public $dir; public $nav;
    
    public $header_file; public $content_file; public $footer_file;
    public $css_file; public $js_file;
    public $site_dir;
    
    public $blogs_dir; public $blogs_file; public $blog_file;    
    public $products_dir; public $products_file; public $product_file;
    
    public $contacts_dir; public $contacts_file; public $contact_file;
    
    public $about_file; public $cart_file; public $checkout_file; public $contact_us_file; 
    public $login_file; public $wishlist_file; public $faq_file; public $tos_file; public $pp_file; public $payment_file; public $career_file;

    function __construct(){
        parent::__construct();
        $this->load->library('form_validation');                  
        $this->load->helper('form');        
        $this->load->helper('string');
        $this->load->helper(array('cookie', 'url'));         

        //Configuration
        $this->layout           = 'porto'; /* layouts/website/?  */
        $this->asset            = 'porto'; /* assets/? */

        //Routing
        $this->product_routing  = 'produk';
        $this->blog_routing     = 'blog'; //blog
        $this->contact_routing  = 'agent';
        $this->gallery_routing  = 'gallery';
        $this->project_routing  = 'project';                

        //Website Map
        $this->header_file      = 'header';
        $this->content_file     = 'content_v2';
        $this->footer_file      = 'footer';
        $this->css_file         = 'link_css';
        $this->js_file          = 'link_js';

        //Sub Folder
        $this->site_dir         = 'home';

        $this->blogs_dir        = 'articles';
            $this->blogs_file       = 'articles';
            $this->blog_file        = 'article';

        $this->products_dir     = 'products';
            $this->products_file    = 'category_product';
            $this->product_file     = 'product';

        $this->contacts_dir     = 'contacts'; //Not Used
            $this->contacts_file    = 'agents';   //Not Used
            $this->contact_file     = 'agent';    //Not Used

        $this->about_file       = $this->site_dir.'/'.'about';
        $this->contact_us_file  = $this->site_dir.'/'.'contact_us';
        $this->cart_file        = $this->site_dir.'/'.'cart';
        $this->checkout_file    = $this->site_dir.'/'.'checkout';        
        $this->login_file       = $this->site_dir.'/'.'login';
        $this->wishlist_file    = $this->site_dir.'/'.'wishlist'; 
        $this->payment_file     = $this->site_dir.'/'.'payment';

        $this->faq_file         = $this->site_dir.'/'.'faqs';
        $this->tos_file         = $this->site_dir.'/'.'term_of_service';
        $this->pp_file          = $this->site_dir.'/'.'privacy_policy';
        $this->career_file      = $this->site_dir.'/'.'career';                 

        //New Concept
		$this->nav = array(
			'web' => array(
				'asset' => array(
					'folder' => $this->asset,
					'dir' => site_url().'assets/'
				),
                'header' => 'layouts/website/'.$this->layout.'/'.$this->header_file,
                'footer' => 'layouts/website/'.$this->layout.'/'.$this->footer_file, 
                'layout' => 'layouts/website/'.$this->layout.'/',               
				'index' => 'layouts/website/'.$this->layout.'/index',
				'js' => 'layouts/website/'.$this->layout.'/'.$this->js_file,
				'css' => 'layouts/website/'.$this->layout.'/'.$this->css_file,                
				'content' => 'layouts/website/'.$this->layout.'/'.$this->content_file
			),
			'admin' => array(
				'asset' => array(
					'folder' => 'admin',
					'dir' => site_url().'assets/'
				),				
				'index' => 'layouts/admin/index',
                'layout' => 'layouts/admin/',  
				'js' => 'layouts/admin/index_js'
			)
		);       
        // var_dump($this->nav);die; 
        $this->load->model('Branch_model');        
        $this->load->model('Aktivitas_model');
        $this->load->model('News_model');
        $this->load->model('Produk_model');
        $this->load->model('Product_model');        
        $this->load->model('Product_item_model');
        $this->load->model('Kontak_model');
        $this->load->model('User_model');
        $this->load->model('Kategori_model');
        $this->load->model('Map_model');
        $this->load->model('Transaksi_model');
        $this->load->model('File_model');        

        //Set Cookie if Not Exists
        if(empty($this->input->cookie('trans_session'))){
            $cookie = array(
                'name' => 'trans_session',
                'value' => random_string('alnum', 20),
                'expire' => strtotime('+30 day'),
                'path' => '/'                    
            );
            $this->input->set_cookie($cookie);    
        }
    }
    function sitelink(){ //Sitelink Directory & Menu for FrontEnd
        $b = $this->Branch_model->get_branch_nojoin(1);
        // var_dump($b);die;
        $json = json_decode($b['branch_note'],true);
        // echo json_encode($json);die;
        $json_social = [];
        foreach($json['social_media'] as $v){
            if(strlen($v['link']) > 0){
                if($v['name']=='facebook'){ $icon = 'bx bxl-facebook-circle';} 
                else if($v['name']=='twitter'){ $icon = 'bx bxl-twitter';} 
                else if($v['name']=='instagram'){ $icon = 'bx bxl-instagram';} 
                else if($v['name']=='tiktok'){ $icon = 'bx bxl-tiktok';} 
                else if($v['name']=='youtube'){ $icon = 'bx bxl-youtube';}                                                                
                $json_social[] = [
                    'name' => $v['name'], 
                    'url' => $v['link'], 
                    'icon' => $icon
                ];
            }
        }        
        $a = array(
            'brand' => $b['branch_name'],
            'logo' => !empty($b['branch_logo']) ? base_url() . $b['branch_logo'] : base_url() . 'upload/branch/default_logo.png',
            'home' => site_url(),
                'products' => site_url('products'),
                'product' => site_url('product'),
                'articles' => site_url('articles'),
                'article' => site_url('article'),
            'about' => site_url('about'),//NotUsed
            'contact_us' => site_url('contact-us'),//NotUsed
            'career' => site_url('career'),//NotUsed
            'privacy' => site_url('privacy'),//NotUsed               
            'term_of_service' => site_url('term-of-service'),//NotUsed            
            'faqs' => site_url('faqs'),//NotUsed                        
            'tracking' => site_url('tracking'), //NotUsed
            'shipping' => site_url('shipping'),//NotUsed
            'history' => site_url('history'),//NotUsed             
            'signin' => site_url('masuk'),
            'login' => site_url('login'),
            'forgot' => site_url('lupa_password'),            
            'register' => site_url('daftar'),
            'account' => site_url('account'),  
            'wishlist' => site_url('wishlist'),            
            'checkout' => site_url('checkout'),          
            'cart' => site_url('cart'),
            'contact' => array(
                'email' => array(
                    array('name' => 'Contact 1', 'email' => $b['branch_email_1']),
                    array('name' => 'Contact 2', 'email' => $b['branch_email_2'])                    
                ),
                'phone' => array(
                    array('name' => 'Contact 1', 'phone' => $b['branch_phone_1']),
                    array('name' => 'Contact 2', 'phone' => $b['branch_phone_2'])                    
                ),
                'address' => array(
                    "state" => $b['branch_province'],
                    "city" => $b['branch_city'],
                    "office" => $b['branch_address'],                  
                ),
                'work_hour' => $json['working_hour'],
                'map' => array(
                    'longitude' => $json['map']['longitude'],
                    'latitude' => $json['map']['latitude'],
                    'link' => $json['map']['link']
                )
            ),
            'social' => $json_social,
            'routing' => [
                'blog' => $this->blog_routing,
                'product' => $this->product_routing,
                'contact' => $this->contact_routing,
                'project' => $this->project_routing,
                'gallery' => $this->gallery_routing
            ],
            'article_category' => $this->Kategori_model->get_all_categoriess(['category_type'=>2,'category_flag'=>1],null,10,0,'category_name','asc'),
            'blog' => $this->News_model->get_all_newss(['news_type'=>1,'news_flag'=> 1],null,10,0,'news_id','asc'),
            'project' => $this->News_model->get_all_newss(['news_type'=>5,'news_flag'=> 1],null,10,0,'news_id','asc'),
            'gallery' => $this->News_model->get_all_newss_files(['news_type'=>6,'news_flag'=> 1],null,10,0,'news_id','asc'),
            'portofolio' => $this->News_model->get_all_newss(['news_type'=>7,'news_flag'=> 1],null,10,0,'news_id','asc'),
            'team' => $this->News_model->get_all_newss(['news_type'=>8,'news_flag'=> 1],null,10,0,'news_id','asc'),                                 
            'product_category' => $this->Kategori_model->get_all_categoriess(['category_type'=>1,'category_flag'=>1],null,10,null,'category_id','asc'),
            'products' => $this->Product_model->get_all_product(['product_flag'=>1,'product_type'=>1,'product_category_id > ' => 0],null,10,0,'product_id','asc'),
            'menu' => $this->News_model->get_all_newss(['news_type'=>0,'news_flag'=> 1],null,10,0,'news_id','asc'),
            'newsticker' => $json['header_title']
        );
        // echo json_encode($a['gallery']);die;
        return $a;
    }
    function index(){
        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
		$data['asset_dir']      = $this->nav['web']['asset']['dir'];		
		$data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        // $this->load->view($this->nav['web']['index'],$data);
        
        $data['controller'] = $this->blog_routing;

        $action = $this->input->post('action');
        $post = $this->input->post();        
        
        // var_dump($action);die;
        $return = new \stdClass();
        $return->status = 0;
        $return->message = '';
        $return->result = '';   
             
        switch ($action){
            case "search_product": //Product = Properti, Barang, Jasa, Other 
                $filter_search      = !empty($this->input->get('search')) ? $this->input->get('search') : null;

                // GET Method
                $datas = json_decode($this->input->post('data'), TRUE);
                // var_dump($datas);
                $filter_sort        = !empty($datas['filter_sort']) ? intval($datas['filter_sort']) : 0;
                $filter_city        = !empty($datas['filter_city']) ? intval($datas['filter_city']) : 0;
                $filter_type        = !empty($datas['filter_type']) ? intval($datas['filter_type']) : 0;
                $filter_ref         = !empty($datas['filter_ref']) ? intval($datas['filter_ref']) : 0;
                $filter_contact     = !empty($datas['filter_contact']) ? intval($datas['filter_contact']) : 0;
                $filter_bedroom     = !empty($datas['filter_bedroom']) ? intval($datas['filter_bedroom']) : 0;
                $filter_bathroom    = !empty($datas['filter_bathroom']) ? intval($datas['filter_bathroom']) : 0;
                $filter_price       = !empty($datas['filter_price']) ? $datas['filter_price'] : 0;
                $filter_square      = !empty($datas['filter_square']) ? $datas['filter_square'] : 0;

                //POST Method
                // $filter_sort        = !empty($this->input->get('filter_sort')) ? intval($this->input->get('filter_sort')) : 0;
                // $filter_city        = !empty($this->input->get('filter_city')) ? intval($this->input->get('filter_city')) : 0;
                // $filter_type        = !empty($this->input->get('filter_type')) ? intval($this->input->get('filter_type')) : 0;
                // $filter_ref         = !empty($this->input->get('filter_ref')) ? intval($this->input->get('filter_ref')) : 0;
                // $filter_bedroom     = !empty($this->input->get('filter_bedroom')) ? intval($this->input->get('filter_bedroom')) : 0;
                // $filter_bathroom    = !empty($this->input->get('filter_bathroom')) ? intval($this->input->get('filter_bathroom')) : 0;
                // $filter_price       = !empty($this->input->get('filter_price')) ? $this->input->get('filter_bathroom') : null;
                // $filter_square      = !empty($this->input->get('filter_square')) ? $this->input->get('filter_square') : null;
                
                $filter_price = str_replace('$', '', $filter_price);
                $filter_price = str_replace(' to ', '-', $filter_price);
                $filter_price = str_replace(',', '', $filter_price);
                $filter_price = explode('-', $filter_price);
                // var_dump($filter_price);die;

                $filter_square = str_replace('m2', '', $filter_square);
                $filter_square = str_replace(' ', '', $filter_square);
                $filter_square = str_replace('sd', '-', $filter_square);
                $filter_square = explode('-', $filter_square);
                // var_dump($filter_square);die;

                $params = array(
                    // 'product_type' => 1,
                    'product_flag' => 1
                );
                $search = null;
                $limit  = null;
                $start  = null;
                $order  = null;
                $dir    = null;

                !empty($filter_search) ? $search['product_name']=$filter_search : $search=null;
                // if($filter_sort > 0){
                //     $params['product_sort'] = $filter_sort;
                // }
                $filter_city > 0 ? $params['product_city_id'] = $filter_city : $params;
                $filter_type > 0 ? $params['product_type'] = $filter_type : $params;
                $filter_ref > 0 ? $params['product_ref_id'] = $filter_ref : $params;
                $filter_contact > 0 ? $params['product_contact_id'] = $filter_contact : $params;
                $filter_bedroom > 0 ? $params['product_bedroom'] = $filter_bedroom : $params;
                $filter_bathroom > 0 ? $params['product_bathroom'] = $filter_bathroom : $params;
                !empty($filter_price[0]) ? $params['product_price_sell >='] = $filter_price[0] : $params;
                !empty($filter_price[1]) ? $params['product_price_sell <='] = $filter_price[1] : $params;
                !empty($filter_square[0]) ? $params['product_square_size >='] = $filter_square[0] : $params;
                !empty($filter_square[1]) ? $params['product_square_size <='] = $filter_square[1] : $params;

                if($filter_sort == 1){
                    $order = 'product_visitor'; $dir='desc';
                }
                else if($filter_sort == 2){
                    $order = 'product_price_sell'; $dir='asc';
                }
                else{
                    $order = 'product_price_sell'; $dir='desc';
                }   

                // var_dump($order,$dir);die;
                $get_data=$this->Produk_model->get_all_produks($params,$search,$limit,$start,$order,$dir);
                $data_source = array();
                foreach($get_data AS $v){
                    $data_source[]=array(
                        'product_id' => $v['product_id'],
                        'product_title' => $v['product_name'],
                        'category' => array(
                            'name' => $v['category_name'],
                            'url' => site_url($this->product_routing).'/'.$v['category_url']
                        ),
                        'product_url' => site_url($this->product_routing).'/'.$v['category_url'].'/'.$v['product_url'],
                        'product_image' => site_url().$v['product_image'],
                        'product_price' => 'Rp. '.number_format($v['product_price_sell'],0),
                        'product_price_promo' => 'Rp. '.number_format($v['product_price_promo'],0),
                        'product_flag' => $v['product_flag'] == 1 ? 'Tersedia' : 'Tidak Tersedia',
                        'product_ref' => $v['product_ref_id'] == 1 ? 'Jual' : 'Sewa',
                        // 'product_type' => $this->product_type($v['product_type'],null)
                    );
                }
                // echo json_encode($data_source);die;
                // var_dump(count($data_source));die;
                // var_dump($get_data);die;
                if(!empty($get_data)){ //Data exist
                    $data_source=$data_source;$total=count($get_data);$return->status=1;
                    $return->message='Loaded';$return->total_records=$total;$return->result=$data_source;
                }else{ 
                    $data_source=0;$total=0;$return->status=0; 
                    $return->message='No data';$return->total_records=$total;$return->result=0;
                }
                $return->params = $params;
                $return->search = $search; 
                $return->order = $order;
                $return->dir = $dir;      
                echo json_encode($return);
                break;    
            case "search_blog": //News = Blog, Article, Banner, Slider 
                //POST Method
                $filter_search      = !empty($this->input->get('search')) ? $this->input->get('search') : null;      
                $filter_type        = !empty($this->input->get('filter_type')) ? intval($this->input->get('filter_type')) : 0;
                
                $search = array();
                $params = array(
                    'news_flag' => 1
                );
                !empty($filter_search) ? $search['news_title']=$filter_search : $search=null;
                // $filter_type > 0 ? $params['news_category_type'] = $filter_type : $params;

                $get_data=$this->News_model->get_all_newss($params,$search,null,null,null,null);
                foreach($get_data AS $n){
                    $data_source[] = array(
                            'id' => $n['news_id'],
                            'url' => site_url($this->blog_routing).'/'.$n['category_url'].'/'.$n['news_url'],
                            'category' => $n['category_name'],
                            'title' => $this->capitalize($n['news_title']),
                            'image' => $n['news_image'],
                            'flag' => $n['news_flag'] == 1 ? 'Publish' : 'Unpublish',
                            'date_created' => date("d-F-Y", strtotime($n['news_date_created']))
                    );
                }
                if(isset($get_data)){ //Data exist
                    $data_source=$data_source; $total=count($data_source);
                    $return->status=1; $return->message='Loaded'; $return->total_records=$total;
                    $return->result=$data_source;        
                }else{ 
                    $data_source=0; $total=0; 
                    $return->status=0; $return->message='No data'; $return->total_records=$total;
                    $return->result=0;    
                }
                $return->params = $params;
                $return->search = $search;
                echo json_encode($return);
                break;               
            case "search_contact": //Contact = Supplier, Customer, Employee, Agent 
                //POST Method
                $filter_search      = !empty($this->input->get('search')) ? $this->input->get('search') : null;      
                $filter_type        = !empty($this->input->get('filter_type')) ? intval($this->input->get('filter_type')) : 0;
                
                $search = array();
                $params = array(
                    'contact_flag' => 1
                );
                !empty($filter_search) ? $search['contact_name']=$filter_search : $search=null;
                // $filter_type > 0 ? $params['news_category_type'] = $filter_type : $params;

                $get_data=$this->Kontak_model->get_all_kontaks($params,$search,null,null,null,null);
                foreach($get_data AS $n){
                    $data_source[] = array(
                        'id' => $n['contact_id'],
                        'type' => 'Agent BESTPRO',
                        'name' => $n['contact_name'],
                        'phone' => $n['contact_phone_1'],
                        'email' => $n['contact_email_1'],
                        'url' => site_url($this->contact_routing).'/'.$n['contact_url'],
                        'image' => site_url().$n['contact_image'] 
                    );                                  
                }
                if(isset($get_data)){ //Data exist
                    $data_source=$data_source; $total=count($data_source);
                    $return->status=1; $return->message='Loaded'; $return->total_records=$total;
                    $return->result=$data_source;        
                }else{ 
                    $data_source=0; $total=0; 
                    $return->status=0; $return->message='No data'; $return->total_records=$total;
                    $return->result=0;    
                }
                $return->params = $params;
                $return->search = $search;                       
                echo json_encode($return);
                break;              
            case "subscribe": die;
                $return->status = 1;
                $return->action = $action;
                echo json_encode($return);
                break;
            case "search": die;
                $return->status = 1;
                $return->action = $action;
                echo json_encode($return);
                break;
            case "signin": die;
                $return->status = 1;
                $return->action = $action;
                echo json_encode($return);
                break;
            case "signup": die;
                $return->status = 1;
                $return->action = $action;
                echo json_encode($return);
                break;  
            case "cart":
                $return->status = 0;
                $trans_session = !empty(get_cookie('trans_session')) ? get_cookie('trans_session') : 0;
                if(strlen($trans_session) > 2){
                    $params = array(
                        'trans_item_trans_session' => $trans_session,
                        'trans_item_flag' => 0
                    );
                    $get_data = $this->Transaksi_model->get_all_transaksi_items($params,$search=null,100,0,'trans_item_id','asc');
                    if($get_data){
                        $datas = [];
                        foreach($get_data as $v):
                            $datas[] = array(
                                'item_id' => $v['trans_item_id'],
                                'item_trans_session' => $v['trans_item_trans_session'],
                                'item_qty' => $v['trans_item_out_qty'],
                                'item_price' => $v['trans_item_out_price'],
                                'item_discount' => $v['trans_item_discount'],
                                'item_total' => $v['trans_item_total'],
                                'item_sell_total' => $v['trans_item_sell_total'],
                                'product_name' => $v['product_name'],
                                'product_unit' => $v['product_unit'],
                                'product_image' => !empty($v['product_image']) ? base_url().$v['product_image'] : base_url('upload/noimage.png'),
                            );
                        endforeach;
                        $return->result  = $datas;
                        $return->status  = 1;
                        $return->message = 'Cart loaded';
                        $return->total_records = count($get_data);                        
                    }else{
                        $return->total_records = 0;
                        $return->status  = 0;
                        $return->message = 'Cart kosong';                        
                    }
                }
                $return->action = $action;
                echo json_encode($return);
                break;
            case "cart_add":
                $this->form_validation->set_rules('product_id', 'Produk', 'required');    
                $this->form_validation->set_message('required', '{field} wajib diisi');
                if ($this->form_validation->run() == FALSE){
                    $return->message = validation_errors();
                }else{

                    $session = get_cookie('trans_session');
                    // $trans_number = $this->request_number_for_transaction(2);

                    //Get Product 
                    $get_product = $this->Produk_model->get_produk($post['product_id']);

                    $params_items = array(
                        'trans_item_trans_id' => $trans_id,
                        // 'trans_item_id_order' => $data['order_id'],
                        // 'trans_item_id_order_detail' => $data['order_detail_id'],
                        'trans_item_product_id' => !empty($post['product_id']) ? $post['product_id'] : null,
                        'trans_item_location_id' => 1,
                        'trans_item_date' => date('YmdHis'),
                        'trans_item_unit' => $get_product['product_unit'],
                        // 'trans_item_in_qty' => $qty,
                        // 'trans_item_in_price' => $harga,
                        'trans_item_out_qty' => 1,
                        'trans_item_out_price' => $get_product['product_price_sell'],
                        'trans_item_sell_price' => $get_product['product_price_sell'],   
                        'trans_item_total' => $get_product['product_price_sell']*1,
                        'trans_item_sell_total' => $get_product['product_price_sell']*1,                                                
                        'trans_item_product_type' => 1,
                        'trans_item_type' => 2,
                        'trans_item_discount' => 0,
                        'trans_item_total' => $total,
                        'trans_item_date_created' => date("YmdHis"),
                        'trans_item_date_updated' => date("YmdHis"),
                        'trans_item_user_id' => $session_user_id,
                        'trans_item_branch_id' => $session_branch_id,
                        'trans_item_flag' => $flag,
                        // 'trans_item_ref' => $ref_number,
                        'trans_item_trans_session' => $session,
                        'trans_item_ppn' => 0,
                        'trans_item_position' => 2
                    );
                    $set_data = $this->Transaksi_model->add_transaksi_item($params_items);
                    $trans_id = $set_data;

                    $where_update = array(
                        'trans_item_trans_session' => $session
                    );
                    $params_update = array(
                        'trans_item_trans_id' => $trans_id,
                        'trans_item_date' => date('YmdHis'),
                    );

                    $update_item = $this->Transaksi_model->update_transaksi_item_custom($where_update,$params_update);
                        
                    $get_trans = $this->Transaksi_model->get_transaksi($trans_id);                    
                    
                    $return->status = 1;
                    $return->message = 'Berhasil checkout';
                    $return->trans = array(
                        'trans_id' => $trans_id,
                        'trans_number' => $trans_number,
                        'trans_total' => number_format($get_trans['trans_total'],0),
                        'trans_date' => date("d-F-Y, H:i", strtotime($get_trans['trans_date'])),
                        'contact_address' => $get_trans['trans_contact_address'],
                        'contact_name' => $get_trans['trans_contact_name'],
                        'contact_phone' => $get_trans['trans_contact_phone']
                    );
                }
                echo json_encode($return);
                break;                                           
            case "checkout":
                $this->form_validation->set_rules('checkout_name', 'Nama', 'required');
                $this->form_validation->set_rules('checkout_number', 'Nomor WhatsApp', 'required');
                $this->form_validation->set_rules('checkout_address', 'Alamat', 'required');
                $this->form_validation->set_rules('checkout_city', 'Kota', 'required');    
                $this->form_validation->set_message('required', '{field} wajib diisi');
                if ($this->form_validation->run() == FALSE){
                    $return->message = validation_errors();
                }else{

                    $session = get_cookie('trans_session');
                    $trans_number = $this->request_number_for_transaction(2);

                    $params = array(
                        'trans_number' => $trans_number,
                        'trans_session' => $session,
                        'trans_type' => 2,
                        'trans_date' => date('YmdHis'),
                        'trans_date_created' => date('YmdHis'),
                        'trans_date_udpated' => date('YmdHis'),
                        'trans_flag' => 0,
                        'trans_contact_name' => $post['checkout_name'],
                        'trans_contact_phone' => $post['checkout_number'],
                        'trans_contact_address' => $post['checkout_address'],
                        'trans_user_id' => 0,
                    );
                    $set_data = $this->Transaksi_model->add_transaksi($params);
                    $trans_id = $set_data;

                    $where_update = array(
                        'trans_item_trans_session' => $session
                    );
                    $params_update = array(
                        'trans_item_trans_id' => $trans_id,
                        'trans_item_date' => date('YmdHis'),
                    );

                    $update_item = $this->Transaksi_model->update_transaksi_item_custom($where_update,$params_update);
                        
                    $get_trans = $this->Transaksi_model->get_transaksi($trans_id);                    
                    
                    $return->status = 1;
                    $return->message = 'Berhasil checkout';
                    $return->trans = array(
                        'trans_id' => $trans_id,
                        'trans_number' => $trans_number,
                        'trans_total' => number_format($get_trans['trans_total'],0),
                        'trans_date' => date("d-F-Y, H:i", strtotime($get_trans['trans_date'])),
                        'contact_address' => $get_trans['trans_contact_address'],
                        'contact_name' => $get_trans['trans_contact_name'],
                        'contact_phone' => $get_trans['trans_contact_phone']
                    );
                }
                echo json_encode($return);
                break;                                           
            default:
                // redirect('produk','refresh');
                $this_file              = $this->content_file;
                $data['title']          = 'Website';
                $data['author']         = 'John Doe';
                $data['description']    = 'Its not about news, talk to each other something special from this site';
                $data['keywords']       = 'website, john doe, homepage';

                $data['_header']        = $this->nav['web']['header'];
                $data['_footer']        = $this->nav['web']['footer'];
                
                $product_data           = array();
                $category_data          = array();
                $menu_data              = array();
                $news_banner_data       = array();
                $news_popular_data      = array();
                $news_new_data          = array();

                /* News */
                    // $get_news_banner = $this->News_model->get_all_newss(array('news_type'=>1,'news_flag'=> 1,'news_position'=>1),null,8,0,'news_date_created','asc');
                    // foreach($get_news_banner as $b):
                    //     $url_category = $b['category_url'];
                    //     $url_news = $b['news_url'];
                    //     $news_banner_data[] = array(
                    //         'title' => $b['news_title'],
                    //         'url' => site_url($this->blog_routing).'/'.$url_category.'/'.$url_news,
                    //         'category' => array(
                    //             'category_name' => $b['category_name'],
                    //             'category_url' => site_url($this->blog_routing).'/'.$b['category_url']
                    //         ),
                    //         'author' => ucfirst($b['user_username']),
                    //         'image' => !empty($b['news_image']) ? site_url().$b['news_image'] : site_url('upload/noimage.png'),
                    //         'short' => $b['news_short'],
                    //         'content' => substr(strip_tags($b['news_content']),0,40),
                    //         'tags' => $b['news_tags'],
                    //         'keywords' => $b['news_tags'],
                    //         'visitor' => intval($b['news_visitor']),
                    //         'created' => $b['news_date_created'],
                    //         'publish' => ($b['news_flag'] == 1) ? 'Publish' : '',
                    //         // 'other_news' => $this->News_model->get_all_newss(array('news_flag'=>1),'',2,0,'news_visitor','asc')
                    //     );
                    // endforeach;
                /* End of News */

                /* News New */
                    // $get_news_new = $this->News_model->get_all_newss(array('news_type'=>1,'news_flag'=> 1),null,4,0,'news_date_created','asc');
                    // foreach($get_news_new as $b):
                    //     $url_category = $b['category_url'];
                    //     $url_news = $b['news_url'];
                    //     $news_new_data[] = array(
                    //         'title' => $b['news_title'],
                    //         'url' => site_url($this->blog_routing).'/'.$url_category.'/'.$url_news,
                    //         'category' => array(
                    //             'category_name' => $b['category_name'],
                    //             'category_url' => site_url($this->blog_routing).'/'.$b['category_url']
                    //         ),
                    //         'author' => ucfirst($b['user_username']),
                    //         'image' => !empty($b['news_image']) ? site_url().$b['news_image'] : site_url('upload/noimage.png'),
                    //         'short' => $b['news_short'],
                    //         'content' => substr(strip_tags($b['news_content']),0,40),
                    //         'tags' => $b['news_tags'],
                    //         'keywords' => $b['news_tags'],
                    //         'visitor' => intval($b['news_visitor']),
                    //         'created' => $b['news_date_created'],
                    //         'publish' => ($b['news_flag'] == 1) ? 'Publish' : '',
                    //         // 'other_news' => $this->News_model->get_all_newss(array('news_flag'=>1),'',2,0,'news_visitor','asc')
                    //     );
                    // endforeach;                
                /* End of News New */

                /* News Popular */
                    // $get_news_pp = $this->News_model->get_all_newss(array('news_type'=>1,'news_flag'=> 1),null,4,0,'news_visitor','asc');
                    // foreach($get_news_pp as $b):
                    //     $url_category = $b['category_url'];
                    //     $url_news = $b['news_url'];
                    //     $news_popular_data[] = array(
                    //         'title' => $b['news_title'],
                    //         'url' => site_url($this->blog_routing).'/'.$url_category.'/'.$url_news,
                    //         'category' => array(
                    //             'category_name' => $b['category_name'],
                    //             'category_url' => site_url($this->blog_routing).'/'.$b['category_url']
                    //         ),
                    //         'author' => ucfirst($b['user_username']),
                    //         'image' => !empty($b['news_image']) ? site_url().$b['news_image'] : site_url('upload/noimage.png'),
                    //         'short' => $b['news_short'],
                    //         'content' => substr(strip_tags($b['news_content']),0,40),
                    //         'tags' => $b['news_tags'],
                    //         'keywords' => $b['news_tags'],
                    //         'visitor' => intval($b['news_visitor']),
                    //         'created' => $b['news_date_created'],
                    //         'publish' => ($b['news_flag'] == 1) ? 'Publish' : '',
                    //         // 'other_news' => $this->News_model->get_all_newss(array('news_flag'=>1),'',2,0,'news_visitor','asc')
                    //     );
                    // endforeach;                
                /* End of News Popular */                

                /* Categories */
                    $get_category = $this->Kategori_model->get_all_categoriess(array('category_type' => 1,'category_flag'=>1),null,10,0,'category_name','asc');
                    foreach($get_category as $v):
                        $category_data[] = array(
                                'id' => $v['category_id'],
                                'url' => site_url($this->blog_routing).'/'.$v['category_url'],
                                'title' => $v['category_name'],
                                'flag' => intval($v['category_flag']),
                                'product_count' => intval($v['category_count']),
                                'image' => !empty($v['category_image']) ? site_url().$v['category_image'] : site_url('upload/noimage.png'),
                        );
                    endforeach;
                /* End of Categories Data */ 

                /* Product */
                    // $params_product = array('product_flag' => 1);
                    // $get_product = $this->Produk_model->get_all_produks($params_product,null,4,0,'product_id','asc');
                    // foreach($get_product as $v):
                    //     $product_data[] = array(
                    //             'id' => $v['product_id'],
                    //             'url' => site_url($this->product_routing).'/'.$v['category_url'].'/'.$v['product_url'],
                    //             'code' => $v['product_code'],
                    //             'title' => $v['product_name'],
                    //             'flag' => $v['product_flag'] == 1 ? 'Tersedia' : 'Tidak Tersedia',
                    //             // 'ref' => $v['product_ref_id'],
                    //             'price' => !empty($v['product_price_sell']) ? floatval($v['product_price_sell']) : 0,
                    //             'price_discount' => !empty($v['product_price_promo']) ? floatval($v['product_price']) : 0,
                    //             // 'note' => $v['product_note'],
                    //             // 'type' => $this->product_type($v['product_type'],null),
                    //             'image' => site_url().$v['product_image']
                    //     );
                    // endforeach;
                //End of Product Data 

                //Final Data to Front End
                $data['product'] = $product_data;
                $data['category'] = $category_data;
                $data['news'] = array(
                    'news_banner' => $news_banner_data,
                    'news_new' => $news_new_data,
                    'news_popular' => $news_popular_data 
                );

                $data['result'] = array(
                    'product' => !empty($data['product']) ? $data['product'] : [],
                    'category' => !empty($data['category']) ? $data['category'] : [],
                    'news' => !empty($data['news']) ? $data['news'] : [],
                );
                
                // echo json_encode($data['product']);die;
                $data['_content']       = $this->nav['web']['layout'].$this_file;
                // $data['_js']            = $this->nav['web']['layout'].$this_file.'_js';    
                $this->load->view($this->nav['web']['index'],$data);
                
            // End of default
        } // Enf of switch()
    }

    /* Demo Page */
    function about(){
        $params_check = array(
            'news_type' => 0,
            'news_flag' => 1,
            'news_url' => 'about'
        );
        $get_news   = $this->News_model->get_news_by_url($params_check);
        // $get_author = $this->User_model->get_user($get_news['news_user_id']);
        
        // $data['title']          = ucwords($get_news['news_title']);
        // $data['author']         = ucwords($get_author['user_username']);
        // $data['short']          = substr(strip_tags($get_news['news_short']),0,100);
        // // $data['description']    = substr(strip_tags($get_news['news_content']),0,20);
        // $data['description']    = $get_news['news_content'];        
        // $data['keywords']       = substr(strip_tags($get_news['news_content']),0,20);
        $data['title']          = 'Tentang Kami';
        $data['author']         = '';
        $data['short']          = '';
        // $data['description']    = substr(strip_tags($get_news['news_content']),0,20);
        $data['description']    = '';        
        $data['keywords']       = '';        

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->about_file;

        $this->load->view($this->nav['web']['index'],$data);
    }
    function privacy(){
        $params_check = array(
            'news_type' => 0,
            'news_flag' => 1,
            'news_url' => 'privacy'
        );
        $get_news   = $this->News_model->get_news_by_url($params_check);
        $get_author = $this->User_model->get_user($get_news['news_user_id']);
                
        $data['title']          = ucwords($get_news['news_title']);
        $data['author']         = ucwords($get_author['user_username']);
        $data['short']          = substr(strip_tags($get_news['news_short']),0,100);
        // $data['description']    = substr(strip_tags($get_news['news_content']),0,20);
        $data['description']    = $get_news['news_content'];        
        $data['keywords']       = substr(strip_tags($get_news['news_content']),0,20);

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->pp_file;

        $this->load->view($this->nav['web']['index'],$data);
    }    
    function term(){
        $params_check = array(
            'news_type' => 0,
            'news_flag' => 1,
            'news_url' => 'term-of-service'
        );
        $get_news   = $this->News_model->get_news_by_url($params_check);
        $get_author = $this->User_model->get_user($get_news['news_user_id']);
                
        $data['title']          = ucwords($get_news['news_title']);
        $data['author']         = ucwords($get_author['user_username']);
        $data['short']          = substr(strip_tags($get_news['news_short']),0,100);
        // $data['description']    = substr(strip_tags($get_news['news_content']),0,20);
        $data['description']    = $get_news['news_content'];        
        $data['keywords']       = substr(strip_tags($get_news['news_content']),0,20);

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->tos_file;

        $this->load->view($this->nav['web']['index'],$data);
    } 
    function career(){

        $params_check = array(
            'news_type' => 0,
            'news_flag' => 1,
            'news_url' => 'career'
        );
        $get_news   = $this->News_model->get_news_by_url($params_check);
        $get_author = $this->User_model->get_user($get_news['news_user_id']);

        $data['title']          = ucwords($get_news['news_title']);
        $data['author']         = ucwords($get_author['user_username']);
        $data['short']          = substr(strip_tags($get_news['news_short']),0,100);
        // $data['description']    = substr(strip_tags($get_news['news_content']),0,20);
        $data['description']    = $get_news['news_content'];        
        $data['keywords']       = substr(strip_tags($get_news['news_content']),0,20);

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->career_file;

        $this->load->view($this->nav['web']['index'],$data);
    }        
    function contact_us(){
        $data['title']          = 'Hubungi Kami';
        $data['author']         = 'John Doe';
        $data['description']    = 'Its not about news, talk to each other something special from this site';
        $data['keywords']       = 'website, john doe, homepage';

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->contact_us_file;

        $this->load->view($this->nav['web']['index'],$data);
    }
    function faqs(){ //Not
        $data['title']          = 'FAQs';
        $data['author']         = 'John Doe';
        $data['description']    = 'Its not about news, talk to each other something special from this site';
        $data['keywords']       = 'website, john doe, homepage';

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->faq_file;

        $this->load->view($this->nav['web']['index'],$data);
    }        
    function signin(){
        $data['title']          = 'Masuk';
        $data['author']         = 'John Doe';
        $data['description']    = 'Its not about news, talk to each other something special from this site';
        $data['keywords']       = 'website, john doe, homepage';

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->login_file;

        $this->load->view($this->nav['web']['index'],$data);
    }
    function cart(){ //Works
        $data['title']          = 'Cart';
        $data['author']         = 'John Doe';
        $data['description']    = 'Its not about news, talk to each other something special from this site';
        $data['keywords']       = 'website, john doe, homepage';

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->cart_file;

        $this->load->view($this->nav['web']['index'],$data);
    }
    function checkout(){ //Works
        $data['title']          = 'Checkout';
        $data['author']         = 'John Doe';
        $data['description']    = 'Its not about news, talk to each other something special from this site';
        $data['keywords']       = 'website, john doe, homepage';

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->checkout_file;

        $this->load->view($this->nav['web']['index'],$data);
    }
    function wishlist(){ //Works
        $data['title']          = 'Wishlist';
        $data['author']         = 'John Doe';
        $data['description']    = 'Its not about news, talk to each other something special from this site';
        $data['keywords']       = 'website, john doe, homepage';

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->wishlist_file;

        $this->load->view($this->nav['web']['index'],$data);
    }
    function keunggulan(){
        $params_check = array(
            'news_type' => 0,
            'news_flag' => 1,
            'news_url' => 'keunggulan-kami'
        );
        $get_news   = $this->News_model->get_news_by_url($params_check);
        $get_author = $this->User_model->get_user($get_news['news_user_id']);
        
        $data['title']          = ucwords($get_news['news_title']);
        $data['author']         = ucwords($get_author['user_username']);
        $data['short']          = substr(strip_tags($get_news['news_short']),0,100);
        // $data['description']    = substr(strip_tags($get_news['news_content']),0,20);
        $data['description']    = $get_news['news_content'];        
        $data['keywords']       = substr(strip_tags($get_news['news_content']),0,20);

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].'home/keunggulan';
        // var_dump($data['_content']);die;
        $this->load->view($this->nav['web']['index'],$data);
    }
    function layanan(){
        // $params_check = array(
        //     'news_type' => 0,
        //     'news_flag' => 1,
        //     'news_url' => 'keunggulan-kami'
        // );
        // $get_news   = $this->News_model->get_news_by_url($params_check);
        // $get_author = $this->User_model->get_user($get_news['news_user_id']);
        
        $data['title']          = ucwords('Layanan Kami');
        $data['author']         = ucwords('Admin');
        $data['short']          = '';
        // $data['description']    = substr(strip_tags($get_news['news_content']),0,20);
        $data['description']    = '';        
        $data['keywords']       = '';

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].'home/layanan';
        // var_dump($data['_content']);die;
        $this->load->view($this->nav['web']['index'],$data);
    }    

    function products(){ //Works //Template List HTML
        $data['title']          = 'Products';
        $data['author']         = 'John Doe';
        $data['description']    = 'Its not about news, talk to each other something special from this site';
        $data['keywords']       = 'website, john doe, homepage';

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->products_dir.'/'.$this->products_file;

        $this->load->view($this->nav['web']['index'],$data);
    }
    function product(){ //Works //Template Single HTML
        $data['title']          = 'Produk';
        $data['author']         = 'John Doe';
        $data['description']    = 'Its not about news, talk to each other something special from this site';
        $data['keywords']       = 'website, john doe, homepage';

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->products_dir.'/'.$this->product_file;

        $this->load->view($this->nav['web']['index'],$data);
    }
    function articles(){ //Works //Template List HTML
        $data['title']          = 'Artikels';
        $data['author']         = 'John Doe';
        $data['description']    = 'Its not about news, talk to each other something special from this site';
        $data['keywords']       = 'website, john doe, homepage';

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->blogs_dir.'/'.$this->blogs_file;

        $this->load->view($this->nav['web']['index'],$data);
    }
    function article(){ //Works //Template Single HTML, production move to 
        $data['title']          = 'Artikel';
        $data['author']         = 'John Doe';
        $data['description']    = 'Its not about news, talk to each other something special from this site';
        $data['keywords']       = 'website, john doe, homepage';

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->blogs_dir.'/'.$this->blog_file;
        // var_dump($data);die;
        $this->load->view($this->nav['web']['index'],$data);
    }    
    function payment(){ //Works
        $data['title']          = 'Payment';
        $data['author']         = 'John Doe';
        $data['description']    = 'Its not about news, talk to each other something special from this site';
        $data['keywords']       = 'website, john doe, homepage';

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];
        $data['_content']       = $this->nav['web']['layout'].$this->payment_file;

        $this->load->view($this->nav['web']['index'],$data);
    }
    function firebase(){
        $data['template'] = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';  
        $data['asset']    = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';     
        
        // $data['navigation'] = $this->product_type(null,null);        
        $data['title'] = 'Contact Us';
        $data['author'] = 'John Doe';
        $data['description'] = 'Its not about news, talk to each other something special from this site';
        $data['keywords'] = 'website, john doe, homepage';

        // $data['_header'] = $this->dir['header'];
        // $data['_view']   = $this->dir['content'];        
        // $data['_footer'] = $this->dir['footer'];

        $data['firebase'] = $this->get_firebase_config();
        $this->load->view($this->nav['admin']['layout'].'/firebase',$data);            
    }
    function notfound(){
        show_404();          
    }

    /* Dynamic Page */
    function blog($categories_url = '',$news_url = ''){ // Production
        $view = '';$news_short = ''; $news_content = ''; $news_tags = ''; $news_keywords = ''; 
        $news_image = ''; $news_visitor = ''; $news_created = ''; $news_author = ''; $news_status = '';
        
        $other_category     = array(); 
        $other_popular      = array(); 
        $final_url          = '';

        $url_news = '';
        $url_news_title ='';

        //Get All Categories
        $params = array(
            'category_flag' => 1,
            'category_type' => 2 // 2=News, 
        );
        $category_data = array();
        $get_all_category = $this->Kategori_model->get_all_categoriess($params,null,null,null,'category_name','asc');
        foreach ($get_all_category as $value) {
            $category_data[] = array(
                'category_name' => $value['category_name'],
                'category_url' => $value['category_url'],
                'category_url' => site_url($this->blog_routing).'/'.$value['category_url'],
                'category_count' => $value['category_count']                
            );
        }

        //Param URL Categories not Empty
        if(!empty($categories_url)){
            $params_check = array(
                'category_parent_id' => 0,
                'category_flag' => 1,
                'category_url' => $categories_url
            );             
            $get_categories = $this->Kategori_model->get_categories_by_params($params_check);
            if($get_categories){
                $url_news_category          = '/'.$get_categories['category_url']; $final_url = $url_news_category;
                $url_news_category_title    = ucwords($get_categories['category_name']);      
                $other_category = $this->News_model->get_all_newss(array('category_id'=>$get_categories['category_id']),'',8,0,'news_date_created','asc');
                $other_popular  = $this->News_model->get_all_newss(array('news_flag'=>1),'',2,0,'news_visitor','asc');              
            }
            $view = 'categories';
        }

        //Param URL News not Empty
        if(!empty($news_url)){
            $params_check = array(
                'news_flag' => 1,
                'news_category_id' => $get_categories['category_id'],
                'news_url' => $news_url
            );
            $get_news = $this->News_model->get_news_by_url($params_check);
            if($get_news){
                $this->News_model->update_news($get_news['news_id'],array('news_visitor' => $get_news['news_visitor']+1));
                
                $url_news       = '/'.$get_news['news_url'];
                $url_news_title = ucwords($get_news['news_title']);
                $final_url = $final_url.$url_news;           
                
                $author         = $this->User_model->get_user($get_news['news_user_id']);
                $news_short = $get_news['news_short'];
                $news_content = $get_news['news_content'];
                $news_tags = $get_news['news_tags'];
                $news_keywords = $get_news['news_keywords'];
                $news_image = !empty($get_news['news_image']) ? site_url().$get_news['news_image'] : site_url('upload/noimage.png');
                $news_visitor = $get_news['news_visitor'];
                // $news_created = date("d-M-Y",strtotime($get_news['news_date_created']));
                $news_created = $get_news['news_date_created'];
                $news_author = ucwords($author['user_username']);
                $news_status = $get_news['news_flag'];
            }else{
                // Not Found
            }
            $view = 'article';
        }

        $final_url = site_url($this->blog_routing).$final_url;
        $data['pages'] = array(
            'sitelink' => array(
                'home' => array(
                    'title' => 'Home',
                    'url' => site_url()
                ),
                'categories' => array(
                    'url' => site_url($this->blog_routing).$url_news_category,
                    'title' => $url_news_category_title,
                    'result' => $category_data,
                    'result_news' => $other_category,
                    'result_popular' => $other_popular
                ),
                'article' => array(
                    'url' => site_url($this->blog_routing).$url_news_category.$url_news,
                    'title' => $url_news_title,
                    'author' => $news_author,
                    'image' => $news_image,
                    'short' => $news_short,
                    'content' => $news_content,
                    'tags' => $news_tags,
                    'description' => '',
                    'keywords' => $news_keywords,
                    'visitor' => $news_visitor,
                    'created' => $news_created,
                    'publish' => ($news_status == 1) ? 'Publish' : '',
                ),
            ),
            'final_url' => $final_url,
            'view' => ''
        );
        // echo json_encode($data['pages']);die;
        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();
        // var_dump($data['link']);die;
        if($view == 'article'){ //www.any.com/article/param1/param2
            $data['title']          = $data['pages']['sitelink']['article']['title'];
            $data['author']         = $data['pages']['sitelink']['article']['author'];
            $data['description']    = substr($data['pages']['sitelink']['article']['content'],0,20);
            $data['keywords']       = $data['pages']['sitelink']['article']['content'];

            $data['image']          = $data['pages']['sitelink']['article']['image'];
            $data['url']            = $final_url;   

            $data['_content']       = $this->nav['web']['layout'].$this->blogs_dir.'/'.$this->blog_file;
            $this->load->view($this->nav['web']['index'],$data);                         
        
        }else if($view == 'categories'){ //www.any.com/article/param1
            $data['title']          = $data['pages']['sitelink']['categories']['title'];
            $data['author']         = 'Administrator';
            $data['description']    = '';
            $data['keywords']       = '';

            $data['url'] = $final_url;

            $data['_content']       = $this->nav['web']['layout'].$this->blogs_dir.'/'.$this->blogs_file;
            $this->load->view($this->nav['web']['index'],$data);                          
        
        }else{
            echo 1;die;
        }
    }
    function produk($categories_url = '',$produk_url = ''){ // Production
        $view = ''; $news_short = ''; $news_content = ''; $news_tags = ''; 
        $news_keywords = ''; $news_image = ''; $news_visitor = ''; $news_created = ''; $news_author = ''; $news_status = '';

        $pro_update = ''; $pro_price = ''; $pro_stock = ''; $pro_unit = ''; $pro_code = '';
        $pro_images = [];

        $other_category = array(); 
        $other_news     = array(); 
        $other_count    = 0;
        $final_url      = '';

        $url_news = '';
        $url_news_title ='';

        //Get All Categories
        $category_data = array();
        $params = array(
            'category_type' => 1,
            'category_flag' => 1
        );
        $get_all_category = $this->Kategori_model->get_all_categoriess($params,null,null,null,'category_name','asc');
        foreach ($get_all_category as $value) {
            $category_data[] = array(
                'category_id' => $value['category_id'],
                'category_name' => $value['category_name'],
                'category_url' => site_url($this->product_routing).'/'.$value['category_url'],
                'category_count' => $value['category_count'],
                'category_image' => !empty($value['category_image']) ? base_url().$value['category_image'] : base_url('upload/noimage2.png')               
            );
        }

        if((empty($categories_url)) && (empty($produk_url))){
            $cat_id = 0;
            $url_news_category = '';
            $url_news_category_title = ucfirst($this->product_routing);
        }

        //Param URL Categories not Empty
        if(!empty($categories_url)){
            $params_check = array(
                'category_parent_id' => 0,
                'category_flag' => 1,
                'category_url' => $categories_url
            );
            // $url_news_category = $categories_url;
            // $url_news_category_title = '';                
            $get_categories = $this->Kategori_model->get_categories_by_params($params_check);
            if($get_categories){
                $cat_id = $get_categories['category_id'];
                $url_news_category          = '/'.$get_categories['category_url'];
                $url_news_category_title    = ucwords($get_categories['category_name']);      
                $final_url                  = '/'.$get_categories['category_url'];
                $params_set = array(
                    'product_type' => 1,
                    'product_flag' => 1,
                    'product_category_id'=>$get_categories['category_id']
                );
                $other_category = $this->Product_model->get_all_product($params_set,null,4,0,'product_id','asc');
                $other_count = $this->Product_model->get_all_product_count($params_set,null);
                // $other_new = $this->News_model->get_all_newss(array('news_flag'=>1),'',8,0,'news_date_created','desc');                
            }
            $view = 'categories';
        }

        //Param URL News not Empty
        if(!empty($produk_url)){
            $params_check = array(
                'product_category_id' => $get_categories['category_id'],
                'product_url' => $produk_url
            );
            $get_news = $this->Product_model->get_product_custom($params_check);

            if($get_news){
                // $this->News_model->update_news($get_news['news_id'],array('news_visitor' => $get_news['news_visitor']+1));
                
                $url_news       = '/'.$get_news['product_url'];
                $url_news_title = ucwords($get_news['product_name']);
                $final_url = $final_url.$url_news;           
                
                $author = $this->User_model->get_user($get_news['product_user_id']);
                // $news_short = $get_news['news_short'];
                $news_content = '';
                if($get_news['product_stock'] > 0){
                    // $news_content = 'Stok '.number_format($get_news['product_stock'],0).', ';
                    $news_content .= 'In-Stock, '.$get_news['category_name'];
                }else{
                    $news_content .= $get_news['category_name'];
                }

                $news_content = $news_content.' '.$get_news['product_note'];
                // $news_tags = $get_news['news_tags'];
                // $news_keywords = $get_news['news_keywords'];
                $news_image = $get_news['product_image'];
                $news_visitor = $get_news['product_visitor'];
                $news_created = date("d-M-Y",strtotime($get_news['product_date_created']));
                $news_author = ucwords($author['user_username']);
                $news_status = $get_news['product_flag'];

                $pro_code = $get_news['product_code'];
                $pro_update = $get_news['product_date_updated'];
                $pro_price = $get_news['product_price_sell'];
                $pro_stock = $get_news['product_stock'];
                $pro_unit = $get_news['product_unit'];                

                $pro_images = $this->File_model->get_all_file(['file_from_table' => 'products', 'file_from_id' => $get_news['product_id']],null,null,null,'file_id','asc');

                $params_check = array(
                    'category_parent_id' => 0,
                    'category_flag' => 1,
                    'category_id' => $get_news['product_category_id']
                );
                $url_news_category                  = $categories_url;
                $url_news_category_title            = '';                
                $get_categories                     = $this->Kategori_model->get_categories_by_params($params_check);
                if($get_categories){
                    $url_news_category              = '/'.$get_categories['category_url'];
                    $url_news_category_title        = ucwords($get_categories['category_name']);     
                }
            }else{
                if(!empty($categories_url)){
                    $params_check = array(
                        'category_parent_id' => 0,
                        'category_flag' => 1,
                        'category_url' => $categories_url
                    );
                    $url_news_category              = $categories_url;
                    $url_news_category_title        = '';                
                    $get_categories                 = $this->Kategori_model->get_categories_by_params($params_check);
                    if($get_categories){
                        $url_news_category          = '/'.$get_categories['category_url'];
                        $url_news_category_title    = ucwords($get_categories['category_name']);                
                    }
                }  
            }
            $view = 'product';
        }

        $final_url = site_url($this->product_routing).$final_url;
        $data['pages'] = array(
            'sitelink' => array(
                'home' => array(
                    'title' => 'Home',
                    'url' => site_url()
                ),
                'categories' => array(
                    'id' => $cat_id,
                    'url' => site_url($this->product_routing).$url_news_category,
                    'title' => $url_news_category_title,
                    'result' => $category_data,
                    'other_product' => $other_category,
                    'other_count' => $other_count
                ),
                'product' => array(
                    'url' => site_url($this->product_routing).$url_news_category.$url_news,
                    'title' => $url_news_title,
                    'author' => $news_author,
                    'image' => site_url($news_image),
                    'images' => $pro_images,
                    'short' => $news_short,
                    'content' => $news_content,
                    'tags' => $news_tags,
                    'description' => '',
                    'keywords' => $news_keywords,
                    'visitor' => $news_visitor,
                    'created' => $news_created,
                        'code' => $pro_code,
                        'updated' => $pro_update,
                        'price' => $pro_price,
                        'stock' => $pro_stock,
                        'unit' => $pro_unit,
                    'publish' => ($news_status == 1) ? 'Publish' : '',
                    // 'other_news' => $this->News_model->get_all_newss(array('news_flag'=>1),'',2,0,'news_visitor','asc')
                ),
            ),
            'final_url' => $final_url,
            'view' => $view
        );
        // echo json_encode($data['pages']);die;

        $data['_header']        = $this->nav['web']['header'];
        $data['_footer']        = $this->nav['web']['footer'];

        $data['asset_folder']   = $this->nav['web']['asset']['folder'];
        $data['asset_dir']      = $this->nav['web']['asset']['dir'];		
        $data['asset']          = $this->nav['web']['asset']['dir'].$this->nav['web']['asset']['folder'].'/';
        $data['link']           = $this->sitelink();
        // echo json_encode($data['link']);die;
        if($view == 'product'){ //www.any.com/product/param1/param2
            $data['title']          = $data['pages']['sitelink']['product']['title'];
            $data['author']         = $data['pages']['sitelink']['product']['author'];
            $data['description']    = substr($data['pages']['sitelink']['product']['content'],0,20);
            $data['keywords']       = $data['pages']['sitelink']['product']['content'];

            $data['image']          = $data['pages']['sitelink']['product']['image'];
            $data['url']            = $final_url;   

            $data['_content']       = $this->nav['web']['layout'].$this->products_dir.'/'.$this->product_file;
            $this->load->view($this->nav['web']['index'],$data);                         
        
        }else if($view == 'categories'){ //www.any.com/product/param1
            $data['title']          = $data['pages']['sitelink']['categories']['title'];
            $data['author']         = 'John Doe';
            $data['description']    = 'Its not about news, talk to each other something special from this site';
            $data['keywords']       = 'website, john doe, homepage';

            $data['url'] = $final_url;

            $data['_content']       = $this->nav['web']['layout'].$this->products_dir.'/'.$this->products_file;
            $data['_js']            = $this->nav['web']['layout'].$this->products_dir.'/'.$this->products_file.'_js';       
            $this->load->view($this->nav['web']['index'],$data); 
        }else{
            // $data['title']          = $data['pages']['sitelink']['categories']['title'];
            $data['title']          = 'Avista Supplier daging berkualitas di Kota Semarang';            
            $data['author']         = 'Admin';
            $data['description']    = 'Menyediakan daging sapi kualitas terbaik';
            $data['keywords']       = 'daging sapi, daging, dagin impor, avista, daging murah semarang';

            $data['url'] = $final_url;

            $data['_content']       = $this->nav['web']['layout'].$this->products_dir.'/'.$this->products_dir;
            // $data['_js']            = $this->nav['web']['layout'].$this->products_dir.'/'.$this->products_dir.'_js';       
            $this->load->view($this->nav['web']['index'],$data);
        }
    }   
    function produk_reload(){
        $return = new \stdClass();
        $return->status = 0;
        $return->message = '';
        $return->result = '';

        $cat  = $this->input->post('categories');
        // $end    = $this->input->post('end');
        // $user   = $this->input->post('user');  

        $limit_start = !empty($this->input->post('limit_start')) ? $this->input->post('limit_start') : 1;
        $limit_end = !empty($this->input->post('limit_end')) ? $this->input->post('limit_end') : 4;

        $limit = ($limit_start * $limit_end) - $limit_end;
        // $limit_start = $this->input->post('limit_start');
        // $limit_end = $this->input->post('limit_end');         

          // $limit_start = 5; // jumlah item yg akan ditampilkan
          // $limit_end = ($this->input->post('limit_start') * $limit_end) - $limit_end; // pagination
        // var_dump($limit_start,$limit_end);die;
        // date("Y-m-d",strtotime($start)),date("Y-m-d",strtotime($end))
        $params = [
            'product_type' => 1,
            'product_category_id' => $cat,
            'product_flag' => 1
        ];
        $get_data=$this->Product_model->get_all_product($params,null,$limit_end,$limit_start,'product_id','asc');
        if(isset($get_data)){ //Data exist
        //     $data_source=$datas; $total=count($datas);
            $return->status=1; $return->message='Loaded'; $return->total_records=count($get_data);
            $return->result=$get_data;        
        //     $return->get_data=$get_data;
        }else{ 
        //     $data_source=0; $total=0; 
            $return->status=0; $return->message='No data'; $return->total_records=count($get_data);
            $return->result=0;    
        }
        $return->limit=$limit_start.','.$limit_end;  
        $return->site = base_url().'produk';
        echo json_encode($return);      
    }     
}