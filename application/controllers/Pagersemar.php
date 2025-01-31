<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagersemar extends MY_Controller{

    var $folder        = 'layouts/admin/menu/pagersemar/';
    var $folder_upload = 'upload/name/';
    var $image_width   = 250;
    var $image_height  = 250;

    function __construct(){
        parent::__construct();
        $this->load->model('Branch_model');
        $this->load->model('Konfigurasi_model');        
        $this->load->model('User_model');
        $this->load->model('Kontak_model');
        $this->load->model('Card_model');        

        $this->load->helper('form');
        $this->load->library('form_validation');    
        
       //Get Branch
       $get_branch = $this->Branch_model->get_branch(1);
       $this->app_name          = $get_branch['branch_name'];
       $this->app_url           = site_url();  
       $this->app_logo          = site_url().$get_branch['branch_logo'];
       $this->app_logo_sidebar  = site_url().$get_branch['branch_logo_sidebar'];            
    }
    function index(){
        if ($this->input->post()) {
            $return = new \stdClass();
            $return->status = 0;
            $return->message = '';
            $return->result = '';

            $upload_directory = $this->folder_upload;     
            $upload_path_directory = $upload_directory;

            $data['session']        = $this->session->userdata();  
            $session_user_id        = !empty($data['session']['user_data']['user_id']) ? $data['session']['user_data']['user_id'] : null;
            $session_user_group_id  = !empty($data['session']['user_data']['user_group_id']) ? $data['session']['user_data']['user_group_id'] : null;       
            $session_branch_id      = !empty($data['session']['user_data']['branch']['id']) ? $data['session']['user_data']['branch']['id'] : null;
        
            $post = $this->input->post();
            $get  = $this->input->get();
            $action = !empty($this->input->post('action')) ? $this->input->post('action') : false;
            
            switch($action){
                case "card_activate":
                    $this->form_validation->set_rules('full_name', 'Nama', 'required');
                    $this->form_validation->set_rules('phone', 'Nomor WhatsApp', 'required');
                    $this->form_validation->set_rules('card_number', 'Nomor Kartu', 'required');
                    $this->form_validation->set_rules('captcha', 'Captcha', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $next = true;
    
                        $session            = $this->session->userdata();
                        $post = $this->input->post();
                        $contact_session          = $this->random_code(20);
                        // $activation_code    = $this->random_code(32);   
                        // $user_session       = $this->random_code(20); 
                        // $user_otp           = $this->random_number(6);  
                        $card_type = $post['card_type'];
                        $card_number  = $this->safe($this->sentencecase($post['card_number']));                    
                        $full_name  = $this->safe($this->sentencecase($post['full_name']));
                        $phone      = phone_format('62',$post['phone']);
    
                        $captcha            = !empty($post['captcha']) ? $post['captcha'] : false;        
                        $captcha_session    = $session['captcha'];                    
                        $generate_username = $this->generate_username($full_name);
    
                        // Captcha check
                        if($captcha !== $captcha_session){
                            $return->message='Captcha tidak sesuai dengan gambar';
                            $next=false;
                        }

                        if($next){
                            $get_card = $this->Card_model->get_all_card_count(['card_type'=> $card_type,'card_number' => $card_number,'card_flag'=>0],null);
                            if($get_card == 0){
                                $next = false;
                                $return->message = 'Tidak tersedia';
                            }
                        }
    
                        if($next){
                            $get_card = $this->Card_model->get_card_custom(['card_type'=> $card_type,'card_number'=>$card_number]);
                            $card_session = $get_card['card_session'];
    
                            $params = array(
                                'contact_branch_id' => !empty($session_branch_id) ? intval($session_branch_id) : null,
                                'contact_user_id' => !empty($session_user_id) ? intval($session_user_id) : null,
                                'contact_type' => 2,
                                'contact_type_name' => 'Customer',
                                // 'contact_code' => !empty($post['contact_code']) ? $post['contact_code'] : null,
                                'contact_name' => $full_name,
                                // 'contact_address' => !empty($post['contact_address']) ? $post['contact_address'] : null,
                                'contact_phone_1' => $this->safe($phone),
                                // 'contact_email_1' => !empty($post['contact_email_1']) ? $post['contact_email_1'] : null,
                                'contact_date_created' => date("YmdHis"),
                                // 'contact_date_updated' => !empty($post['contact_date_updated']) ? $post['contact_date_updated'] : null,
                                'contact_flag' => 1,
                                'contact_session' => $contact_session,
                                'contact_card_session' => $card_session,
                            );
                            // var_dump($params);die;
                            $save_member = $this->Kontak_model->add_kontak($params);
                            if($save_member){

                                $date_now = date('YmdHis');
                                $date = DateTime::createFromFormat('YmdHis', $date_now);
                                $date->modify('+1 year');
                                $date_after = $date->format('YmdHis');

                                $params_card = [
                                    'card_flag' => 1,
                                    'card_date_start' => $date_now,
                                    'card_date_end' => $date_after,
                                ];
                                $update_card = $this->Card_model->update_card_custom(['card_session'=>$card_session],$params_card);
    
                                /* Start Activity */
                                    /*
                                    $params = array(
                                        'activity_user_id' => $session_user_id,
                                        'activity_branch_id' => $session_branch_id,
                                        'activity_action' => 2,
                                        'activity_table' => 'users',
                                        'activity_table_id' => $set_data,
                                        'activity_text_1' => $set_transaction,
                                        'activity_text_2' => $generate_nomor,
                                        'activity_date_created' => date('YmdHis'),
                                        'activity_flag' => 1,
                                        'activity_transaction' => $set_transaction,
                                        'activity_type' => 2
                                    );
                                    $this->save_activity($params);
                                    */  
                                /* End Activity */            
                                $return->status = 1;
                                $return->message = 'Berhasil mendaftar';
                                $get_contact = $this->Card_model->get_card_custom(['card_session'=>$card_session]);                                 
                                $return->result= array(
                                    'c_id' => $get_contact['contact_id'],
                                    'c_session' => $get_contact['contact_session'],
                                    'return_url' => base_url('pagersemar/card_info/'.$card_session)
                                ); 
                                    // $this->session->set_flashdata('result',$get_contact);                            
                                    // $this->session->set_flashdata('message',''.$get_contact['contact_phone_1'].'');
                                    // $this->session->set_flashdata('phone',''.$get_contact['contact_phone_1'].'');
                                    // $this->session->set_flashdata('status',1);
                                    
                                // $this->whatsapp_template('register-and-confirmation-otp',$get_user['user_id']);
                            }
                        }
                    }                    
                    break;
                case "branch_load":
                    $columns = array(
                        '0' => 'branchs.branch_id',
                        '1' => 'branchs.branch_code',
                        '2' => 'branchs.branch_name',
                        '3' => 'branchs.branch_phone_1',
                        '4' => 'branchs.branch_email_1',                    
                        '5' => 'branchs.branch_address',
                    );   

                    $limit = $this->input->post('length');
                    $start = $this->input->post('start');
                    $order = $columns[$this->input->post('order')[0]['column']];
                    $dir = $this->input->post('order')[0]['dir'];
                    $search = [];
                     
                    if ($this->input->post('search')['value']) {
                        $s = $this->input->post('search')['value'];
                        foreach ($columns as $v) {
                            $search[$v] = $s;
                        }
                    }        

                    $params_datatable = array(
                        // 'flag' => 1
                    );   
                    if($session_user_group_id > 1){
                        $params_datatable['branch_id'] = intval($session_branch_id);
                    }else{
                        $params_datatable['branch_id >'] = 0;
                    }
                    // if($this->input->post('filter_specialist') > 0){
                    //     $params_datatable['branch_specialist_id'] = intval($this->input->post('filter_specialist'));
                    // }                    
                    if($this->input->post('filter_province') > 0){
                        $params_datatable['branch_province_id'] = intval($this->input->post('filter_province'));
                    }                    
                    if($this->input->post('filter_city') > 0){
                        $params_datatable['branch_city_id'] = intval($this->input->post('filter_city'));
                    }                    
                    $datas = $this->Branch_model->get_all_branch($params_datatable, $search, $limit, $start, $order, $dir);
                    $datas_count = $this->Branch_model->get_all_branch_count($params_datatable,$search);
                    
                    if($datas_count > 0){ //Data exist
                        $return->status=1; 
                        $return->message='Loaded'; 
                        $return->result=$datas;        
                    }else{ 
                        $return->status  = 0; 
                        $return->message = 'No data'; 
                        $return->result  = array();    
                    }
                    $return->recordsTotal       = $datas_count;
                    $return->recordsFiltered    = $datas_count;
                    $return->total_records      = $datas_count;                    
                    $return->params             = $params_datatable;
                    $return->search             = $search;
                    break;                
                case "branch_create": //Checked 
                    $kode       = !empty($this->input->post('kode')) ? $this->input->post('kode') : null;
                    $nama       = !empty($this->input->post('nama')) ? $this->input->post('nama') : null;   
                    $address    = !empty($this->input->post('alamat')) ? $this->input->post('alamat') : null;   
                    $phone      = !empty($this->input->post('telepon_1')) ? $this->input->post('telepon_1') : null;   
                    $email      = !empty($this->input->post('email_1')) ? $this->input->post('email_1') : null;   
                    $keterangan = !empty($this->input->post('keterangan')) ? $this->input->post('keterangan') : null;  
                    $status     = !empty($this->input->post('status')) ? $this->input->post('status') : null;         
                    $specialist = !empty($this->input->post('specialist')) ? $this->input->post('specialist') : null;  
                    $user       = !empty($this->input->post('user')) ? $this->input->post('user') : null;     
                    $with_stock = !empty($this->input->post('with_stock')) ? $this->input->post('with_stock') : null;  
                    $with_journal = !empty($this->input->post('with_journal')) ? $this->input->post('with_journal') : null;     
                    $province = !empty($this->input->post('provinsi')) ? $this->input->post('provinsi') : null;  
                    $city = !empty($this->input->post('kota')) ? $this->input->post('kota') : null;  
                    $district = !empty($this->input->post('kecamatan')) ? $this->input->post('kecamatan') : null;
                    $header = !empty($this->input->post('header')) ? $this->input->post('header') : null;
                    $footer = !empty($this->input->post('footer')) ? $this->input->post('footer') : null;
                    $params_check = array(
                        // 'branch_code' => $kode,
                        'branch_name' => $nama
                    );
                    $create_session = $this->random_session(20);                    
                    $params = array(
                        'branch_code' => $kode,
                        'branch_name' => $nama,
                        'branch_address' => $address,
                        'branch_phone_1' => $phone,
                        'branch_email_1' => $email,
                        'branch_note' => $keterangan,         
                        'branch_date_created' => date("YmdHis"),
                        'branch_date_updated' => date("YmdHis"),
                        'branch_flag' => $status,
                        'branch_user_id' => $user,
                        'branch_specialist_id' => $specialist,
                        // 'branch_transaction_with_stock' => $with_stock,
                        // 'branch_transaction_with_journal' => $with_journal,
                        'branch_transaction_with_stock' => 'Yes',
                        'branch_transaction_with_journal' => 'Yes',                    
                        'branch_province_id' => $province,
                        'branch_city_id' => $city,
                        'branch_district_id' => $district,
                        // 'branch_document_header' => $header,
                        // 'branch_document_footer' => $footer
                        'branch_session' => $create_session
                    );                    
                    //Check Data Exist
                    $check_exists = $this->Konfigurasi_model->check_data_exist('branchs',$params_check);
                    if($check_exists==false){
                        $set_data=$this->Konfigurasi_model->add_data('branchs',$params);
                        if($set_data==true){
                            $branch_id = $set_data;
                            $get_data = $this->Branch_model->get_branch($branch_id);
                            if(!empty($user)){
                                $this->User_model->update_user($user,array('user_branch_id'=>$branch_id));
                            }
                            //Croppie Upload Image
                            $post_upload = !empty($this->input->post('upload1')) ? $this->input->post('upload1') : "";
                            if(strlen($post_upload) > 10){
                                $upload_process = $this->file_upload_image($this->folder_upload,$post_upload);
                                if($upload_process->status == 1){
                                    if ($get_data && $get_data['branch_id']) {
                                        $params_image = array(
                                            'branch_logo' => $upload_process->result['file_location'],
                                            'branch_logo_sidebar' => $upload_process->result['file_location'],                                        
                                        );
                                        if($get_data['branch_logo'] !== 'upload/branch/default_logo.png'){
                                            if (!empty($get_data['branch_logo'])) {
                                                if (file_exists(FCPATH . $get_data['branch_logo'])) {
                                                    unlink(FCPATH . $get_data['branch_logo']);
                                                }
                                            }
                                        }
                                        $stat = $this->Branch_model->update_branch($branch_id, $params_image);
                                    }
                                }else{
                                    $return->message = 'Fungsi Gambar gagal';
                                }
                            }
                            //End of Croppie  
                            //Aktivitas
                            $params = array(
                                'activity_user_id' => $session['user_data']['user_id'],
                                'activity_action' => 2,
                                'activity_table' => 'branchs',
                                'activity_table_id' => $set_data,                            
                                'activity_text_1' => strtoupper($nama),
                                'activity_text_2' => ucwords(strtolower($nama)),                        
                                'activity_date_created' => date('YmdHis'),
                                'activity_flag' => 1
                            );
                            $this->save_activity($params);                
                            $return->status=1;
                            $return->message='Berhasil menambahkan '.$nama;
                            $return->result= array(
                                'id' => $set_data,
                                'nama' => $nama
                            );                         
                        }
                    }else{
                        $return->message='Data sudah ada';   
                        $return->params_check = $params_check;                 
                    }
                    break;
                case "branch_read": //Checked 
                    $data['id'] = $this->input->post('id');           
                    $datas = $this->Konfigurasi_model->get_data('branchs',$data['id']);
                    if($datas==true){
                        //Aktivitas
                        $params = array(
                            'activity_user_id' => $data['session']['user_data']['user_id'],
                            'activity_action' => 3,
                            'activity_table' => 'branchs',
                            'activity_table_id' => 'branch_id',
                            'activity_text_1' => strtoupper('branch_name'),
                            'activity_text_2' => ucwords(strtolower(strtoupper('branch_name'))),
                            'activity_date_created' => date('YmdHis'),
                            'activity_flag' => 0
                        );
                        $this->save_activity($params);  
                        $return->status=1;
                        $return->message='Success';
                        $return->result=$datas;
                    }                
                    break;
                case "branch_update": //Checked
                    $post_data = $this->input->post('data');
                    $data = json_decode($post_data, TRUE);
                    $id = !empty($data['id']) ? $data['id'] : $this->input->post('id');

                    $kode       = !empty($this->input->post('kode')) ? $this->input->post('kode') : null;
                    $nama       = !empty($this->input->post('nama')) ? $this->input->post('nama') : null;   
                    $address    = !empty($this->input->post('alamat')) ? $this->input->post('alamat') : null;   
                    $phone      = !empty($this->input->post('telepon_1')) ? $this->input->post('telepon_1') : null;   
                    $email      = !empty($this->input->post('email_1')) ? $this->input->post('email_1') : null;   
                    $keterangan = !empty($this->input->post('keterangan')) ? $this->input->post('keterangan') : null;  
                    $status     = !empty($this->input->post('status')) ? $this->input->post('status') : null;         
                    $specialist = !empty($this->input->post('specialist')) ? $this->input->post('specialist') : null;  
                    $user       = !empty($this->input->post('user')) ? $this->input->post('user') : null;     
                    $with_stock = !empty($this->input->post('with_stock')) ? $this->input->post('with_stock') : null;  
                    $with_journal = !empty($this->input->post('with_journal')) ? $this->input->post('with_journal') : null;     
                    $province = !empty($this->input->post('provinsi')) ? $this->input->post('provinsi') : null;  
                    $city = !empty($this->input->post('kota')) ? $this->input->post('kota') : null;  
                    $district = !empty($this->input->post('kecamatan')) ? $this->input->post('kecamatan') : null;
                                        
                    $params_update = array(
                        'branch_name' => $nama,
                        'branch_address' => $address,
                        'branch_phone_1' => $phone,
                        'branch_email_1' => $email,                    
                        'branch_note' => $keterangan,
                        'branch_date_updated' => date("YmdHis"),
                        'branch_flag' => $status,
                        'branch_user_id' => $user,                    
                        'branch_specialist_id' => $specialist,
                        // 'branch_transaction_with_stock' => $with_stock,
                        // 'branch_transaction_with_journal' => $with_journal                          
                        'branch_province_id' => $province,
                        'branch_city_id' => $city,
                        'branch_district_id' => $district,
                        // 'branch_document_header' => $header,
                        // 'branch_document_footer' => $footer
                    );

                    $set_update=$this->Konfigurasi_model->update_data('branchs',$id,$params_update);                
                    if($set_update==true){
                        $branch_id = $id;
                        $get_data = $this->Branch_model->get_branch($id);
                        if(!empty($user)){
                            $this->User_model->update_user($user,array('user_branch_id'=>$branch_id));
                        }
                        //Croppie Upload Image
                        $post_upload = !empty($this->input->post('upload1')) ? $this->input->post('upload1') : "";
                        if(strlen($post_upload) > 10){
                            $upload_process = $this->file_upload_image($this->folder_upload,$post_upload);
                            if($upload_process->status == 1){
                                if ($get_data && $get_data['branch_id']) {
                                    $params_image = array(
                                        'branch_logo' => $upload_process->result['file_location'],
                                        'branch_logo_sidebar' => $upload_process->result['file_location'],                                        
                                    );
                                    if($get_data['branch_logo'] !== 'upload/branch/default_logo.png'){
                                        if (!empty($get_data['branch_logo'])) {
                                            if (file_exists(FCPATH . $get_data['branch_logo'])) {
                                                unlink(FCPATH . $get_data['branch_logo']);
                                            }
                                        }
                                    }
                                    $stat = $this->Branch_model->update_branch($branch_id, $params_image);
                                }
                            }else{
                                $return->message = 'Fungsi Gambar gagal';
                            }
                        }
                        //End of Croppie         
                        //Aktivitas
                        $params = array(
                            'activity_user_id' => $data['session']['user_data']['user_id'],
                            'activity_action' => 4,
                            'activity_table' => 'branchs',
                            'activity_table_id' => $id,
                            'activity_text_1' => strtoupper($nama),
                            'activity_text_2' => ucwords(strtolower($nama)),
                            'activity_date_created' => date('YmdHis'),
                            'activity_flag' => 0
                        );
                        $this->save_activity($params);
                        $return->status=1;
                        $return->message='Berhasil memperbarui '.$nama;
                    }else{
                        $return->message='Gagal memperbarui';
                    }           
                    break;
                case "branch_set_active":
                    $id = $this->input->post('id');
                    $kode = $this->input->post('kode');        
                    $nama = $this->input->post('nama');                                
                    $flag = $this->input->post('flag');
                    if($flag==1){
                        $msg='aktifkan '.$nama;
                        $act=7;
                    }else if($flag==4){
                        $msg='menghapus '.$nama;
                        $act=5;
                    }else{
                        $msg='nonaktifkan  '.$nama;
                        $act=8;
                    }
                    $set_data=$this->Konfigurasi_model->update_data('branchs',$id,array('branch_flag'=>$flag));
                    if($set_data==true){    
                        //Aktivitas
                        $text_code = strtoupper($kode);
                        $params = array(
                            'activity_user_id' => $data['session']['user_data']['user_id'],
                            'activity_action' => $act,
                            'activity_table' => 'branchs',
                            'activity_table_id' => $id,
                            'activity_text_1' => $text_code,
                            'activity_text_2' => ucwords(strtolower($nama)),
                            'activity_date_created' => date('YmdHis'),
                            'activity_flag' => 0
                        );
                        $this->save_activity($params);                                          
                        $return->status=1;
                        $return->message='Berhasil '.$msg;
                    }                
                    break;
                default:
                    $return->message = 'No Action';
                    break; 
            }
            echo json_encode($return);
        }else{
            $data['session']    = $this->session->userdata();  

            // $data['captcha'] = $this->random_number(6);
            // $this->session->set_userdata('captcha',$data['captcha']);
            
            $data['branch'] = array(
                'branch_logo' => $this->app_logo,
                'branch_logo_login' => $this->app_logo,
                'branch_logo_sidebar' => $this->app_logo_sidebar          
            );
            $data['title']  = $this->app_name;
            $this->load->view($this->folder.'index',$data);  
        }
    }
    function member(){
        $data['identity'] = 2;
        $data['image_width'] = intval($this->image_width);
        $data['image_height'] = intval($this->image_height);
                
        $data['session']    = $this->session->userdata();  
        $data['theme']      = $this->User_model->get_user($data['session']['user_data']['user_id']);

        $data['title']  = 'Member';
        $data['_view']  = $this->folder.'customer';
        $data['_js']    = $this->folder.'customer_js';            
        $this->load->view('layouts/admin/index',$data);
    }
    function merchant(){
        $data['identity'] = 6;
        $data['image_width'] = intval($this->image_width);
        $data['image_height'] = intval($this->image_height);
            
        $data['session']    = $this->session->userdata();  
        $data['theme']      = $this->User_model->get_user($data['session']['user_data']['user_id']);

        $data['title']  = 'Merchant';
        $data['_view']  = $this->folder.'branch';
        $data['_js']    = $this->folder.'branch_js';            
        $this->load->view('layouts/admin/index',$data);
    }
    function user(){
        $data['session']    = $this->session->userdata();  
        $data['theme']      = $this->User_model->get_user($data['session']['user_data']['user_id']);

        $data['title']  = 'User';
        $data['_view']  = $this->folder.'user';
        $data['_js']    = $this->folder.'user_js';            
        $this->load->view('layouts/admin/index',$data);
    }
    function card(){
        $data['session']    = $this->session->userdata();  
        $data['theme']      = $this->User_model->get_user($data['session']['user_data']['user_id']);

        $data['title']  = 'Card';
        $data['_view']  = $this->folder.'card';
        $data['_js']    = $this->folder.'card_js';
        $this->load->view('layouts/admin/index',$data);
    }   
    function card_register(){
        if(!$this->is_logged_in()){
            $this->session->set_userdata('url_before',base_url(uri_string()));
            redirect(base_url("login/return_url"));              
        }

        $data['session']    = $this->session->userdata();  

        $data['captcha'] = $this->random_number(6);
        $this->session->set_userdata('captcha',$data['captcha']);
        
        $data['branch'] = array(
            'branch_logo' => $this->app_logo,
            'branch_logo_login' => $this->app_logo,
            'branch_logo_sidebar' => $this->app_logo_sidebar          
        );
        $data['title']  = 'Daftar Member';
        $this->load->view($this->folder.'register/card_register',$data);        
    }
    function card_scan(){
        if(!$this->is_logged_in()){
            $this->session->set_userdata('url_before',base_url(uri_string()));
            redirect(base_url("login/return_url"));              
        }

        $data['session']    = $this->session->userdata();  
        $data['branch'] = array(
            'branch_logo' => $this->app_logo,
            'branch_logo_login' => $this->app_logo,
            'branch_logo_sidebar' => $this->app_logo_sidebar          
        );
        $data['title']  = 'Scan';
        $this->load->view($this->folder.'register/card_scan',$data);        
    }    
    function card_info($card_session){
        $data['session']    = $this->session->userdata();  
        // $data['theme']      = $this->User_model->get_user($data['session']['user_data']['user_id']);

        $get_contact = $this->Card_model->get_card_custom(['card_session'=>$card_session]);     
        if($get_contact){        
            $this->session->set_flashdata('result',$get_contact);                            
            $this->session->set_flashdata('status',1);
            $this->session->set_flashdata('message','Sukses');
        }else{
            $this->session->set_flashdata('status',0);
            $this->session->set_flashdata('message','Data tidak ditemukan');            
        }

        $data['title']  = 'Card Information';
        // $data['_js']    = $this->folder.'user_js';            
        $this->load->view($this->folder.'register/card_info',$data);
    }
}

?>