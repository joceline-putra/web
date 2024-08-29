<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller{

    public $folder_upload            = 'upload/news/'; // 1
    public $folder_upload_project    = 'upload/project/'; // 5   
    public $folder_upload_gallery    = 'upload/gallery/'; // 6
    public $folder_upload_product    = 'upload/product/'; // 6    

    public $allowed_types = 'jpg|png|jpeg|mp4';
    public $image_width = 480;
    public $image_height = 480;

    public $allowed_file_size = 1024; // 5 MB -> 5000 KB

    // var $blog_route         = 'blog';
    // var $project_route      = 'project'; 
    // var $gallery_route      = 'gallery'; 
    var $product_route      = 'product';               

    function __construct(){
        parent::__construct();
        if(!$this->is_logged_in()){
            redirect(base_url("login"));
        }
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->model('File_model');        
        $this->load->model('News_model');
        $this->load->model('Kategori_model');
        $this->load->model('Aktivitas_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        // $this->folder_upload = 'upload/news/';
        // $this->allowed_types = 'jpg|png|jpeg|mp4';
        // $this->image_width   = 480;
        // $this->image_height  = 480;
        // $this->allowed_file_size     = 1024; // 5 MB -> 5000 KB
    }
    function index(){
        $session = $this->session->userdata();
        $session_branch_id = $session['user_data']['branch']['id'];
        $session_user_id = $session['user_data']['user_id'];

        if ($this->input->post()) {    
            $return = new \stdClass();
            $return->status = 0;
            $return->message = '';
            $return->result = '';

            $upload_directory = $this->folder_upload;     
            $upload_path_directory = $upload_directory;

            $post = $this->input->post();
            $get  = $this->input->get();
            $action = !empty($this->input->post('action')) ? $this->input->post('action') : false;
            
            switch($action){
                case "load":
                    $columns = array(
                        '0' => 'product_id',
                        '1' => 'product_name'
                    );

                    $limit     = !empty($post['length']) ? $post['length'] : 10;
                    $start     = !empty($post['start']) ? $post['start'] : 0;
                    $order     = !empty($post['order']) ? $columns[$post['order'][0]['column']] : $columns[0];
                    $dir       = !empty($post['order'][0]['dir']) ? $post['order'][0]['dir'] : "asc";
                    
                    $search    = [];
                    if(!empty($post['search']['value'])) {
                        $s = $post['search']['value'];
                        foreach ($columns as $v) {
                            $search[$v] = $s;
                        }
                    }

                    $params = array();
                    
                    /* If Form Mode Transaction CRUD not Master CRUD
                    !empty($post['date_start']) ? $params['product_date >'] = date('Y-m-d H:i:s', strtotime($post['date_start'].' 23:59:59')) : $params;
                    !empty($post['date_end']) ? $params['product_date <'] = date('Y-m-d H:i:s', strtotime($post['date_end'].' 23:59:59')) : $params;
                    */

                    //Default Params for Master CRUD Form
                    // $params['product_id']   = !empty($post['product_id']) ? $post['product_id'] : $params;
                    // $params['product_name'] = !empty($post['product_name']) ? $post['product_name'] : $params;

                    /*
                        if($post['other_column'] && $post['other_column'] > 0) {
                            $params['other_column'] = $post['other_column'];
                        }
                        if($post['filter_type'] !== "All") {
                            $params['product_type'] = $post['filter_type'];
                        }
                    */
                    
                    $get_count = $this->Product_model->get_all_product_count($params, $search);
                    if($get_count > 0){
                        $get_data = $this->Product_model->get_all_product($params, $search, $limit, $start, $order, $dir);
                        $dd = [];
                        foreach($get_data as $v){
                            $dd[] = array(
                                'product_id' => intval($v['product_id']),
                                'product_branch_id' => intval($v['product_branch_id']),
                                'product_category_id' => intval($v['product_category_id']),
                                'product_ref_id' => intval($v['product_ref_id']),
                                'product_type' => intval($v['product_type']),
                                'product_barcode' => $v['product_barcode'],
                                'product_code' => intval($v['product_code']),
                                'product_name' => $v['product_name'],
                                'product_unit' => $v['product_unit'],
                                'product_note' => $v['product_note'],
                                'product_price_buy' => intval($v['product_price_buy']),
                                'product_price_sell' => intval($v['product_price_sell']),
                                'product_fee_1' => intval($v['product_fee_1']),
                                'product_fee_2' => intval($v['product_fee_2']),
                                'product_image' => $v['product_image'],
                                'product_url' => $v['product_url'],
                                'product_user_id' => intval($v['product_user_id']),
                                'product_date_created' => $v['product_date_created'],
                                'product_date_updated' => $v['product_date_updated'],
                                'product_flag' => intval($v['product_flag']),
                                'product_stock' => intval($v['product_stock']),
                                'product_visitor' => intval($v['product_visitor']),
                                'product_contact_id' => $v['product_contact_id'],
                                'product_price_promo' => intval($v['product_price_promo']),
                                'product_dimension_size' => $v['product_dimension_size'],
                                'product_reminder' => $v['product_reminder'],
                                'product_reminder_date' => $v['product_reminder_date'],
                                'category_id' => $v['category_id'],
                                'category_name' => $v['category_name'],
                                'category_url' => $v['category_url']
                            );
                        }
                        $return->total_records   = $get_count;
                        $return->status          = 1; 
                        $return->result          = $dd;
                    }else{
                        $return->total_records   = 0;
                        $return->result          = [];
                    }
                    $return->message             = 'Load '.$return->total_records.' data';
                    $return->recordsTotal        = $return->total_records;
                    $return->recordsFiltered     = $return->total_records;
                    break;
                case "create_project_or_gallery":
                    $next = true;

                    // Cek if any Files
                    if(!empty($_FILES['files'])){
                        $files_count = count($_FILES['files']['name']);
                        if($files_count > 0){
                            for($i=0; $i<$files_count; $i++){
                                if(intval($_FILES['files']['size'][$i] / 1024) > ($this->allowed_file_size)){
                                    $next = false;
                                    $set_msg = 'Gagal, ukuran melebihi '.($this->allowed_file_size / 1024).' Mb'; $next = false;
                                    $return->message = $set_msg;
                                    echo json_encode($return); die;
                                }else{
                                    $next = true;
                                }
                            }
                        }
                    }

                    if($next){
                        $title = !empty($this->input->post('title')) ? $this->safe($this->input->post('title')) : '';
                        $url = $this->generate_seo_link($title);                
                        
                        if(strlen($title) > 0){
                            $params_save = array(
                                'product_branch_id' => $session_branch_id,
                                'product_category_id' => !empty($this->input->post('categories')) ? $this->input->post('categories') : null,
                                'product_type' => 1,
                                'product_name' => $title,
                                // 'product_unit' => !empty($post['product_unit']) ? $post['product_unit'] : null,
                                'product_note' => !empty($this->input->post('content')) ? $this->input->post('content') : null,
                                // 'product_price_buy' => !empty($post['product_price_buy']) ? intval($post['product_price_buy']) : null,
                                // 'product_price_sell' => !empty($post['product_price_sell']) ? intval($post['product_price_sell']) : null,
                                // 'product_image' => !empty($post['product_image']) ? $post['product_image'] : null,
                                'product_url' => $url,
                                'product_user_id' => $session_user_id,
                                'product_date_created' => date("YmdHis"),
                                // 'product_date_updated' => date("YmdHis"),
                                'product_flag' => !empty($this->input->post('status')) ? $this->input->post('status') : 0,
                                // 'product_stock' => !empty($post['product_stock']) ? intval($post['product_stock']) : 0,
                                // 'product_visitor' => !empty($post['product_visitor']) ? intval($post['product_visitor']) : 0,
                                // 'product_reminder' => !empty($post['product_reminder']) ? $post['product_reminder'] : null,
                                // 'product_reminder_date' => !empty($post['product_reminder_date']) ? $post['product_reminder_date'] : null,
                            );            
                            // var_dump($params);die;                
                            // $params_save = array(
                            //     'news_type' => !empty($this->input->post('tipe')) ? intval($this->input->post('tipe')) : 5,
                            //     'news_category_id' => !empty($this->input->post('categories')) ? $this->input->post('categories') : null,
                            //     'news_title' => $title,
                            //     'news_url' => $url,
                            //     'news_short' => !empty($this->input->post('short')) ? $this->input->post('short') : null,
                            //     'news_content' => !empty($this->input->post('content')) ? $this->input->post('content') : null,
                            //     'news_tags' => !empty($this->input->post('tags')) ? $this->input->post('tags') : null,
                            //     'news_keywords' => !empty($this->input->post('keywords')) ? $this->input->post('keywords') : null,
                            //     'news_date_created' => date("YmdHis"),
                            //     'news_date_updated' => date("YmdHis"),
                            //     'news_user_id' => $session_user_id,    
                            //     'news_branch_id' => $session_branch_id,              
                            //     'news_flag' => !empty($this->input->post('status')) ? $this->input->post('status') : 0,
                            //     'news_position' => !empty($this->input->post('posisi')) ? $this->input->post('posisi') : null
                            // );

                            // $params_update = array(
                            //     'news_category_id' => !empty($this->input->post('categories')) ? $this->input->post('categories') : null,
                            //     'news_title' => $title,
                            //     'news_url' => $url,
                            //     'news_short' => !empty($this->input->post('short')) ? $this->input->post('short') : null,
                            //     'news_content' => !empty($this->input->post('content')) ? $this->input->post('content') : null,
                            //     'news_tags' => !empty($this->input->post('tags')) ? $this->input->post('tags') : null,
                            //     'news_keywords' => !empty($this->input->post('keywords')) ? $this->input->post('keywords') : null,
                            //     'news_date_updated' => date("YmdHis"),
                            //     // 'news_user_id' => $session_user_id,    
                            //     // 'news_branch_id' => $session_branch_id,              
                            //     'news_flag' => !empty($this->input->post('status')) ? $this->input->post('status') : 0,
                            //     'news_position' => !empty($this->input->post('posisi')) ? $this->input->post('posisi') : null
                            // );

                            //Check Data Exist UPDATE
                            if(!empty($this->input->post('id')) && ($this->input->post('id') > 0)){
                                $operator = 2; $mes = 'memperbarui';
                                $where_not = array('product_id'=>$this->input->post('id'));
                                $params_check = array(
                                    'product_name' => $title,
                                    'product_url' => $url,
                                    'product_type' => $post['tipe']
                                );
                                $check_exists = $this->Product_model->check_data_exist_two_condition($where_not,$params_check);                                
                            }else{ // SAVE
                                $operator = 1; $mes = 'menyimpan';
                                $params_check = array(
                                    'product_name' => $title,
                                    'product_url' => $url,
                                    'product_type' => $post['tipe']
                                );
                                $check_exists = $this->Product_model->check_data_exist($params_check);
                            }
                            
                            if($check_exists==false){
                                // if($next){

                                    if($operator == 1){
                                        $set_data=$this->Product_model->add_product($params_save);
                                        $data = $this->Product_model->get_product($set_data);
                                    }else{
                                        $update_data = $this->Product_model->update_product($this->input->post('id'),$params_update);
                                        $set_data = $this->input->post('id');
                                    }

                                    // Call Helper for Upload
                                    if(!empty($_FILES['files'])){
                                        //Process for Upload
                                        $image_config=array(
                                            'compress' => 1,
                                            'width'=>$this->image_width,
                                            'height'=>$this->image_height
                                        );
                                        $folder = $this->folder_upload_product;

                                        $upload_helper = upload_file_array($folder, $_FILES['files'],$image_config);
                                        if ($upload_helper['status'] == 1) {

                                            foreach($upload_helper['result'] as $v){
                                                $file_session = $this->random_session(20);
                                                $params = array(
                                                    'file_from_table' => 'products',
                                                    'file_from_id' => $set_data,
                                                    'file_session' => $file_session,
                                                    'file_date_created' => date("YmdHis"),
                                                    'file_user_id' => $session_user_id,
                                                    'file_type' => 1,
                                                    'file_name' => $v['file_old_name'],
                                                    'file_format' => $v['file_ext'],
                                                    'file_url' => $v['file_location'],
                                                    'file_size' => $v['file_size']                                                                        
                                                );
                                                $save_data = $this->File_model->add_file($params);
                                            }
                                            //Add Image for params before update
                                            // $params['news_image'] = $this->folder_upload_project.$upload_helper['file'];
                                            $set_msg = 'Berhasil menyimpan dengan Gambar';
                                        }else{
                                            $set_msg = 'Error: '.$upload_helper['message'];
                                        }  
                                    } else{
                                        $set_msg = 'Menyimpan tanpa gambar';
                                    }   
                                    // End Call Helper for Upload 
                                    
                                    $return->status=1;
                                    $return->message='Berhasil '.$mes;
                                    $return->result= array(
                                        'id' => $set_data,
                                        'title' => $data['product_name']
                                    );  

                                    /* Start Activity */
                                    $params = array(
                                        'activity_user_id' => $session['user_data']['user_id'],
                                        'activity_action' => ($operator==1) ? 2 : 4,
                                        'activity_table' => 'product',
                                        'activity_table_id' => $set_data,                            
                                        'activity_text_1' => strtoupper($data['product_name']),
                                        'activity_text_2' => ucwords(strtolower($data['product_name'])),                        
                                        'activity_date_created' => date('YmdHis'),
                                        'activity_flag' => 1
                                    );
                                    $this->save_activity($params);
                                    /* End Activity */
                                // }
                            }else{
                                $return->message='Nama Produk sudah digunakan';                    
                            }
                        }else{
                            $return->message = 'Nama Produk harus diisi';
                        }
                    }                   
                    break;
                case "create_update":
                    $this->form_validation->set_rules('product_id', 'product_id', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{

                        if(intval($post['product_id']) > 0){ /* Update if Exist */ // if( (!empty($post['product_session'])) && (strlen($post['product_session']) > 10) ){ /* Update if Exist */

                            /* Check Existing Data */
                            $where_not = [
                                'product_id' => intval($post['product_id']),
                            ];
                            $where_new = [
                                'product_name' => $product_name
                            ];
                            $check_exists = $this->Product_model->check_data_exist_two_condition($where_not,$where_new);

                            /* Continue Update if not exist */
                            if(!$check_exists){
                                $where = array(
                                    'product_id' => intval($post['product_id']),
                                );
                                $params = array(
                                    'product_name' => $product_name,
                                    'product_flag' => !empty($post['product_flag']) ? $post['product_flag'] : 0
                                );
                                $update = $this->Product_model->update_product_custom($where,$params);
                                if($update){
                                    $get_product = $this->Product_model->get_product_custom($where);
                                    $return->status  = 1;
                                    $return->message = 'Berhasil memperbarui '.$product_name;
                                    $return->result= array(
                                        'product_id' => $update,
                                        'product_name' => $get_product['product_name'],
                                        'product_session' => $get_product['product_session']
                                    );
                                }else{
                                    $return->message = 'Gagal memperbarui '.$product_name;
                                }
                            }else{
                                $return->message = 'Data sudah digunakan';
                            }
                        }else{ /* Save New Data */

                            /* Check Existing Data */
                            $params_check = [
                                'product_name' => $product_name
                            ];
                            $check_exists = $this->Product_model->check_data_exist($params_check);

                            /* Continue Save if not exist */
                            if(!$check_exists){
                                $product_session = strtoupper(substr(hash('sha256', date_timestamp_get(date_create())),0,20));
                                $params = array(
                                    'product_session' => $product_session,
                                    'product_name' => $product_name,
                                    'product_flag' => !empty($post['product_flag']) ? $post['product_flag'] : 0
                                );
                                $create = $this->Product_model->add_product($params);
                                if($create){
                                    $get_product = $this->Product_model->get_product($create);
                                    $return->status  = 1;
                                    $return->message = 'Berhasil menambahkan '.$product_name;
                                    $return->result= array(
                                        'product_id' => $create,
                                        'product_name' => $get_product['product_name'],
                                        'product_session' => $get_product['product_session']
                                    );
                                }else{
                                    $return->message = 'Gagal menambahkan '.$product_name;
                                }
                            }else{
                                $return->message = 'Data sudah ada';
                            }
                        }
                    }
                    break;
                case "read":
                    $this->form_validation->set_rules('product_id', 'product_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{                
                        $product_id   = !empty($post['product_id']) ? $post['product_id'] : 0;
                        if(intval(strlen($product_id)) > 0){        
                            $datas = $this->Product_model->get_product($product_id);
                            if($datas){
                                $return->status=1;
                                $return->message='Berhasil mendapatkan data';
                                $return->result=$datas;
                            }else{
                                $return->message = 'Data tidak ditemukan';
                            }
                        }else{
                            $return->message='Data tidak ada';
                        }
                    }
                    break;
                case "read_files":   
                    $data['id'] = $this->input->post('id');    
                    $get_files = $this->File_model->get_all_file(['file_from_table'=>'products','file_from_id'=>$data['id']],null,null,null,'file_id','id');
                    $return->status=1;
                    $return->message='Success';
                    $return->result=$get_files;   
                    break;  
                case "remove_with_files":
                    $data['id'] = $this->input->post('id');           
                    $datas = $this->File_model->get_all_file(['file_from_table'=>'products','file_from_id'=>$data['id']],null,null,null,'file_id','asc');
                    // if($datas==true){
                        //Delete old files
                        foreach($datas as $v){
                            if (!empty($v['file_url'])) {
                                if (file_exists(FCPATH . $v['file_url'])) {
                                    unlink(FCPATH . $v['file_url']);
                                }
                            }
                        }
                        $this->News_model->delete_news($data['id']);
                        /* Activity */
                        /*
                        $params = array(
                            'activity_user_id' => $session['user_data']['user_id'],
                            'activity_action' => 4,
                            'activity_table' => 'news',
                            'activity_table_id' => $datas['id'],
                            'activity_text_1' => strtoupper($datas['kode']),
                            'activity_text_2' => ucwords(strtolower($datas['username'])),
                            'activity_date_created' => date('YmdHis'),
                            'activity_flag' => 0
                        );
                        $this->save_activity($params);                    
                        /* End Activity */
                        $return->status=1;
                        $return->message='Berhasil menghapus';
                        $return->result=$datas;
                    // }                         
                    break; 
                case "remove_file":
                    $data['id'] = $this->input->post('id');           
                    $ge = $this->File_model->get_file($data['id']);
                    if (!empty($ge['file_url'])) {
                        if (file_exists(FCPATH . $ge['file_url'])) {
                            unlink(FCPATH . $ge['file_url']);
                        }
                    }
                        $this->File_model->delete_file($data['id']);
                        /* Activity */
                        /*
                        $params = array(
                            'activity_user_id' => $session['user_data']['user_id'],
                            'activity_action' => 4,
                            'activity_table' => 'news',
                            'activity_table_id' => $datas['id'],
                            'activity_text_1' => strtoupper($datas['kode']),
                            'activity_text_2' => ucwords(strtolower($datas['username'])),
                            'activity_date_created' => date('YmdHis'),
                            'activity_flag' => 0
                        );
                        $this->save_activity($params);                    
                        /* End Activity */
                        $return->status=1;
                        $return->message='Berhasil menghapus';
                        // $return->result=;
                    // }                         
                    break;                               
                case "delete":
                    $this->form_validation->set_rules('product_id', 'product_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $product_id   = !empty($post['product_id']) ? $post['product_id'] : 0;
                        $product_name = !empty($post['product_name']) ? $post['product_name'] : null;

                        if(strlen($product_id) > 0){
                            $get_data=$this->Product_model->get_product($product_id);
                            // $set_data=$this->Product_model->delete_product($product_id);
                            $set_data = $this->Product_model->update_product_custom(array('product_id'=>$product_id),array('product_flag'=>4));                
                            if($set_data){
                                /*
                                $file = FCPATH.$this->folder_upload.$get_data['product_image'];
                                if (file_exists($file)) {
                                    unlink($file);
                                }
                                */
                                $return->status=1;
                                $return->message='Berhasil menghapus '.$product_name;
                            }else{
                                $return->message='Gagal menghapus '.$product_name;
                            } 
                        }else{
                            $return->message='Data tidak ditemukan';
                        }
                    }
                    break;
                case "update_flag":
                    $this->form_validation->set_rules('product_id', 'product_id', 'required');
                    $this->form_validation->set_rules('product_flag', 'product_flag', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $product_id = !empty($post['product_id']) ? $post['product_id'] : 0;
                        if(strlen(intval($product_id)) > 1){
                            
                            $params = array(
                                'product_flag' => !empty($post['product_flag']) ? intval($post['product_flag']) : 0,
                            );
                            
                            $where = array(
                                'product_id' => !empty($post['product_id']) ? intval($post['product_id']) : 0,
                            );
                            
                            if($post['product_flag']== 0){
                                $set_msg = 'nonaktifkan';
                            }else if($post['product_flag']== 1){
                                $set_msg = 'mengaktifkan';
                            }else if($post['product_flag']== 4){
                                $set_msg = 'menghapus';
                            }else{
                                $set_msg = 'mendapatkan data';
                            }

                            if($post['product_flag'] == 4){
                                $params['product_url'] = null;
                            }

                            $get_data = $this->Product_model->get_product_custom($where);
                            if($get_data){
                                $set_update=$this->Product_model->update_product_custom($where,$params);
                                if($set_update){
                                    if($post['product_flag'] == 4){
                                        /*
                                        $file = FCPATH.$this->folder_upload.$get_data['product_image'];
                                        if (file_exists($file)) {
                                            unlink($file);
                                        }
                                        */
                                    }
                                    $return->status  = 1;
                                    $return->message = 'Berhasil '.$set_msg.' '.$get_data['product_name'];
                                }else{
                                    $return->message='Gagal '.$set_msg;
                                }
                            }else{
                                $return->message='Gagal mendapatkan data';
                            }   
                        }else{
                            $return->message = 'Tidak ada data';
                        } 
                    }
                    break;
                default:
                    $return->message='No Action';
                    break; 
            }
            echo json_encode($return);
        }else{
            // Default First Date & End Date of Current Month
            $firstdate = new DateTime('first day of this month');
            $firstdateofmonth = $firstdate->format('d-m-Y');

            $data['session'] = $this->session->userdata();  
            $session_user_id = !empty($data['session']['user_data']['user_id']) ? $data['session']['user_data']['user_id'] : null;

            $data['first_date'] = $firstdateofmonth;
            $data['end_date'] = date("d-m-Y");
            $data['hour'] = date("H:i");
            $data['theme'] = $this->User_model->get_user($data['session']['user_data']['user_id']);

            $data['allowed_file_type'] = $this->allowed_types;
            $data['allowed_file_size'] = $this->allowed_file_size;

            $data['image_width'] = intval($this->image_width);
            $data['image_height'] = intval($this->image_height);
            /*
            // Reference Model
            $this->load->model('Reference_model');
            $data['reference'] = $this->Reference_model->get_all_reference();
            */

            $data['_route'] = $this->product_route;   

            $data['title'] = 'Product';
            $data['_view'] = 'layouts/admin/menu/webpage/product';
            $this->load->view('layouts/admin/index',$data);
            $this->load->view('layouts/admin/menu/webpage/product_js.php',$data);
        }
    }
}

?>