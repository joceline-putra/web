<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Attributes extends MY_Controller{

    var $folder_upload = 'upload/attribute/';
    var $image_width   = 250;
    var $image_height  = 250;

    function __construct(){
        parent::__construct();
        if(!$this->is_logged_in()){
            redirect(base_url("login"));
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('User_model');
        $this->load->model('Kategori_model');
        $this->load->model('Product_model');                
        $this->load->model('Attribute_model');

    }
    function index(){
        if ($this->input->post()) {    
            $return = new \stdClass();
            $return->status = 0;
            $return->message = '';
            $return->result = '';

            $upload_directory = $this->folder_upload;     
            $upload_path_directory = $upload_directory;

            $data['session'] = $this->session->userdata();  
            $session_user_id = !empty($data['session']['user_data']['user_id']) ? $data['session']['user_data']['user_id'] : null;

            $post = $this->input->post();
            $get  = $this->input->get();
            $action = !empty($this->input->post('action')) ? $this->input->post('action') : false;
            
            switch($action){
                case "load":
                    $columns = array(
                        '0' => 'attribute_id',
                        '1' => 'attribute_name'
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
                    !empty($post['date_start']) ? $params['attribute_date >'] = date('Y-m-d H:i:s', strtotime($post['date_start'].' 23:59:59')) : $params;
                    !empty($post['date_end']) ? $params['attribute_date <'] = date('Y-m-d H:i:s', strtotime($post['date_end'].' 23:59:59')) : $params;
                    */

                    //Default Params for Master CRUD Form
                    $params['attribute_id']   = !empty($post['attribute_id']) ? $post['attribute_id'] : $params;
                    $params['attribute_name'] = !empty($post['attribute_name']) ? $post['attribute_name'] : $params;

                    /*
                        if($post['other_column'] && $post['other_column'] > 0) {
                            $params['other_column'] = $post['other_column'];
                        }
                        if($post['filter_type'] !== "All") {
                            $params['attribute_type'] = $post['filter_type'];
                        }
                    */
                    
                    $get_count = $this->Attribute_model->get_all_attribute_count($params, $search);
                    if($get_count > 0){
                        $get_data = $this->Attribute_model->get_all_attribute($params, $search, $limit, $start, $order, $dir);
                        $return->total_records   = $get_count;
                        $return->status          = 1; 
                        $return->result          = $get_data;
                    }else{
                        $return->total_records   = 0;
                        $return->result          = [];
                    }
                    $return->message             = 'Load '.$return->total_records.' data';
                    $return->recordsTotal        = $return->total_records;
                    $return->recordsFiltered     = $return->total_records;
                    break;
                case "create_update":
                    $this->form_validation->set_rules('attribute_id', 'attribute_id', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{

                        if(intval($post['attribute_id']) > 0){ /* Update if Exist */ // if( (!empty($post['attribute_session'])) && (strlen($post['attribute_session']) > 10) ){ /* Update if Exist */

                            /* Check Existing Data */
                            $where_not = [
                                'attribute_id' => intval($post['attribute_id']),
                            ];
                            $where_new = [
                                'attribute_name' => $attribute_name
                            ];
                            $check_exists = $this->Attribute_model->check_data_exist_two_condition($where_not,$where_new);

                            /* Continue Update if not exist */
                            if(!$check_exists){
                                $where = array(
                                    'attribute_id' => intval($post['attribute_id']),
                                );
                                $params = array(
                                    'attribute_name' => $attribute_name,
                                    'attribute_flag' => !empty($post['attribute_flag']) ? $post['attribute_flag'] : 0
                                );
                                $update = $this->Attribute_model->update_attribute_custom($where,$params);
                                if($update){
                                    $get_attribute = $this->Attribute_model->get_attribute_custom($where);
                                    $return->status  = 1;
                                    $return->message = 'Berhasil memperbarui '.$attribute_name;
                                    $return->result= array(
                                        'attribute_id' => $update,
                                        'attribute_name' => $get_attribute['attribute_name'],
                                        'attribute_session' => $get_attribute['attribute_session']
                                    );
                                }else{
                                    $return->message = 'Gagal memperbarui '.$attribute_name;
                                }
                            }else{
                                $return->message = 'Data sudah digunakan';
                            }
                        }else{ /* Save New Data */

                            /* Check Existing Data */
                            $params_check = [
                                'attribute_name' => $attribute_name
                            ];
                            $check_exists = $this->Attribute_model->check_data_exist($params_check);

                            /* Continue Save if not exist */
                            if(!$check_exists){
                                $attribute_session = strtoupper(substr(hash('sha256', date_timestamp_get(date_create())),0,20));
                                $params = array(
                                    'attribute_session' => $attribute_session,
                                    'attribute_name' => $attribute_name,
                                    'attribute_flag' => !empty($post['attribute_flag']) ? $post['attribute_flag'] : 0
                                );
                                $create = $this->Attribute_model->add_attribute($params);
                                if($create){
                                    $get_attribute = $this->Attribute_model->get_attribute($create);
                                    $return->status  = 1;
                                    $return->message = 'Berhasil menambahkan '.$attribute_name;
                                    $return->result= array(
                                        'attribute_id' => $create,
                                        'attribute_name' => $get_attribute['attribute_name'],
                                        'attribute_session' => $get_attribute['attribute_session']
                                    );
                                }else{
                                    $return->message = 'Gagal menambahkan '.$attribute_name;
                                }
                            }else{
                                $return->message = 'Data sudah ada';
                            }
                        }
                    }
                    break;
                case "create":
                    // $data = base64_decode($post); $data = json_decode($post, TRUE);
                    $this->form_validation->set_rules('attribute_name', 'attribute_name', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{

                        $attribute_name = !empty($post['attribute_name']) ? $post['attribute_name'] : null;
                        $attribute_flag = !empty($post['attribute_flag']) ? $post['attribute_flag'] : 0;
                        $attribute_session = strtoupper(substr(hash('sha256', date_timestamp_get(date_create())),0,20));

                        $params = array(
                            'attribute_name' => $attribute_name,
                            'attribute_flag' => $attribute_flag
                        );

                        //Check Data Exist
                        $params_check = array(
                            'attribute_name' => $attribute_name
                        );
                        $check_exists = $this->Attribute_model->check_data_exist($params_check);
                        if(!$check_exists){

                            $set_data=$this->Attribute_model->add_attribute($params);
                            if($set_data){

                                $attribute_id = $set_data;
                                $data = $this->Attribute_model->get_attribute($attribute_id);

                                // Image Save Upload
                                $post_files = !empty($_FILES) ? $_FILES['files'] : "";
                                if(!empty($post_files)){
                                    //Save Image if Exist
                                    $config['image_library'] = 'gd2';
                                    $config['upload_path'] = $upload_path_directory;
                                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                                    $this->upload->initialize($config);
                                    if ($this->upload->do_upload('files')) {
                                        $upload = $this->upload->data();
                                        $raw_photo = time() . $upload['file_ext'];
                                        $old_name = $upload['full_path'];
                                        $new_name = $upload_path_directory . $raw_photo;
                                        if (rename($old_name, $new_name)) {
                                            $compress['image_library'] = 'gd2';
                                            $compress['source_image'] = $upload_path_directory . $raw_photo;
                                            $compress['create_thumb'] = FALSE;
                                            $compress['maintain_ratio'] = TRUE;
                                            $compress['width'] = $this->image_width;
                                            $compress['height'] = $this->image_height;
                                            $compress['new_image'] = $upload_path_directory . $raw_photo;
                                            $this->load->library('image_lib', $compress);
                                            $this->image_lib->resize();

                                            if ($data && $data['attribute_id']) {
                                                $params_image = array(
                                                    'attribute_image' => $upload_directory . $raw_photo
                                                );
                                                if (!empty($data['attribute_image'])) {
                                                    if (file_exists($upload_path_directory . $data['attribute_image'])) {
                                                        unlink($upload_path_directory . $data['attribute_image']);
                                                    }
                                                }
                                                $stat = $this->Attribute_model->update_attribute_custom(array('attribute_id' => $set_data), $params_image);
                                            }
                                        }
                                    }
                                }
                                //End of Save Image

                                //Croppie Upload Image
                                $post_upload = !empty($this->input->post('upload1')) ? $this->input->post('upload1') : "";
                                if(!empty($post_upload)){
                                    $upload_process = $this->file_upload_image($this->folder_upload,$post_upload);
                                    if($upload_process->status == 1){
                                        if ($data && $data['attribute_id']) {
                                            $params_image = array(
                                                'attribute_url' => $upload_process->result['file_location']
                                            );
                                            if (!empty($data['attribute_url'])) {
                                                if (file_exists($upload_path_directory . $data['attribute_url'])) {
                                                    unlink($upload_path_directory . $data['attribute_url']);
                                                }
                                            }
                                            $stat = $this->Attribute_model->update_attribute_custom(array('attribute_id' => $set_data), $params_image);
                                        }
                                    }else{
                                        $return->message = 'Fungsi Gambar gagal';
                                    }
                                }
                                //End of Croppie

                                $return->status=1;
                                $return->message='Berhasil menambahkan '.$post['attribute_name'];
                                $return->result= array(
                                    'id' => $set_data,
                                    'name' => $post['attribute_name'],
                                    'session' => $attribute_session
                                ); 
                            }else{
                                $return->message='Gagal menambahkan '.$post['attribute_name'];
                            }
                        }else{
                            $return->message='Data sudah ada';
                        }
                    }
                    break;
                case "read":
                    $this->form_validation->set_rules('attribute_id', 'attribute_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{                
                        $attribute_id   = !empty($post['attribute_id']) ? $post['attribute_id'] : 0;
                        if(intval(strlen($attribute_id)) > 0){        
                            $datas = $this->Attribute_model->get_attribute($attribute_id);
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
                case "update":
                    $this->form_validation->set_rules('attribute_id', 'attribute_id', 'required');
                    $this->form_validation->set_message('required', '{field} tidak ditemukan');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $attribute_id = !empty($post['attribute_id']) ? $post['attribute_id'] : $post['attribute_id'];
                        $attribute_name = !empty($post['attribute_name']) ? $post['attribute_name'] : $post['attribute_name'];
                        $attribute_flag = !empty($post['attribute_flag']) ? $post['attribute_flag'] : $post['attribute_flag'];

                        if(strlen($attribute_id) > 1){
                            $params = array(
                                'attribute_name' => $attribute_name,
                                'attribute_date_updated' => date("YmdHis"),
                                'attribute_flag' => $attribute_flag
                            );

                            /*
                            if(!empty($data['password'])){
                                $params['password'] = md5($data['password']);
                            }
                            */
                           
                            $set_update=$this->Attribute_model->update_attribute($attribute_id,$params);
                            if($set_update){
                                
                                $get_data = $this->Attribute_model->get_attribute($attribute_id);
                                    
                                //Update Image if Exist
                                $post_files = !empty($_FILES) ? $_FILES['files'] : "";
                                if(!empty($post_files)){
                                    $config['image_library'] = 'gd2';
                                    $config['upload_path'] = $upload_path_directory;
                                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                                    $this->upload->initialize($config);
                                    if ($this->upload->do_upload('files')) {
                                        $upload = $this->upload->data();
                                        $raw_photo = time() . $upload['file_ext'];
                                        $old_name = $upload['full_path'];
                                        $new_name = $upload_path_directory . $raw_photo;
                                        if (rename($old_name, $new_name)) {
                                            $compress['image_library'] = 'gd2';
                                            $compress['source_image'] = $upload_path_directory . $raw_photo;
                                            $compress['create_thumb'] = FALSE;
                                            $compress['maintain_ratio'] = TRUE;
                                            $compress['width'] = $this->image_width;
                                            $compress['height'] = $this->image_height;
                                            $compress['new_image'] = $upload_path_directory . $raw_photo;
                                            $this->load->library('image_lib', $compress);
                                            $this->image_lib->resize();
                                            if ($get_data) {
                                                $params_image = array(
                                                    'attribute_image' => base_url($upload_directory) . $raw_photo
                                                );
                                                if (!empty($get_data['attribute_image'])) {
                                                    $file = FCPATH.$this->folder_upload.$get_data['attribute_image'];
                                                    if (file_exists($file)) {
                                                        unlink($file);
                                                    }
                                                }
                                                $stat = $this->Attribute_model->update_attribute_custom(array('attribute_id' => $attribute_id), $params_image);
                                            }
                                        }
                                    }
                                }
                                //End of Save Image

                                $return->status  = 1;
                                $return->message = 'Berhasil memperbarui '.$attribute_name;
                            }else{
                                $return->message='Gagal memperbarui '.$attribute_name;
                            }   
                        }else{
                            $return->message = "Gagal memperbarui";
                        } 
                    }
                    break;
                case "update_category_attr": //Done
                    $this->form_validation->set_rules('category_id', 'category_id', 'required');
                    $this->form_validation->set_rules('attribute', 'attribute', 'required');                    
                    $this->form_validation->set_message('required', '{field} tidak ditemukan');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $category_id = !empty($post['category_id']) ? $post['category_id'] : $post['category_id'];
                        $attribute = !empty($post['attribute']) ? json_decode($post['attribute']) : $post['attribute'];

                        if(intval($category_id) > 0){

                            $get_cat = $this->Kategori_model->get_categories($category_id);
                            $cat_session = $get_cat['category_session']; 

                            if (strlen($get_cat['category_session']) == 0) {
                                $cat_session = strtoupper(substr(hash('sha256', date_timestamp_get(date_create())),0,6));
                                $this->Kategori_model->update_categories($category_id,['category_session'=>$cat_session]);
                            }

                            $do = true;
                            
                            //Insert
                            if(count($attribute) > 0){

                                //Compare Old Data First
                                $look = [
                                    'ca_category_session' => $cat_session
                                ];
                                $get_data = $this->Attribute_model->get_all_category($look, null, null, null, 'ca_attribute_session', 'asc');

                                $new_attribute = [];
                                foreach($attribute as $i => $v){
                                    array_push($new_attribute,$v->value);
                                }

                                $old_attribute = [];
                                foreach($get_data as $o){
                                    array_push($old_attribute,$o['ca_attribute_session']);
                                }

                                if(count($new_attribute) > count($old_attribute)){
                                    //Insert if not found in Database
                                    foreach($new_attribute as $v){
                                        if (!in_array($v, $old_attribute)) {
                                            // echo $v." not found in the array.<br>";
                                            $where = [
                                                'ca_category_session' => $cat_session,
                                                'ca_attribute_session' => $v
                                            ];
                                            $check_exists = $this->Attribute_model->check_data_exist_category($where);
                                            if (!$check_exists){
                                                $do = $this->Attribute_model->add_category($where);
                                            } 
                                        }
                                    }
                                }else{
                                    //Remove if not found in HTML
                                    foreach($old_attribute as $v){
                                        if (!in_array($v, $new_attribute)) {
                                            // echo $v." not found in the array.<br>";
                                            $where = [
                                                'ca_category_session' => $cat_session,
                                                'ca_attribute_session' => $v
                                            ];
                                            $do = $this->Attribute_model->delete_category_custom($where);
                                        } else {
                                            // echo $v." is found in the array.<br>";
                                        }
                                    }
                                }

                            }else{
                                //Remove all if not found
                                $where = [
                                    'ca_category_session' => $cat_session
                                ];
                                $do = $this->Attribute_model->delete_category_custom($where);
                            }

                            if($do){
                                $return->status  = 1;
                                $return->message = 'Berhasil memperbarui';
                            }else{
                                $return->message='Gagal memperbarui';
                            }   
                        }else{
                            $return->message = "Gagal memperbarui cat_attr";
                        } 
                    }
                    break;                    
                case "delete":
                    $this->form_validation->set_rules('attribute_id', 'attribute_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $attribute_id   = !empty($post['attribute_id']) ? $post['attribute_id'] : 0;
                        $attribute_name = !empty($post['attribute_name']) ? $post['attribute_name'] : null;

                        if(strlen($attribute_id) > 0){
                            $get_data=$this->Attribute_model->get_attribute($attribute_id);
                            // $set_data=$this->Attribute_model->delete_attribute($attribute_id);
                            $set_data = $this->Attribute_model->update_attribute_custom(array('attribute_id'=>$attribute_id),array('attribute_flag'=>4));                
                            if($set_data){
                                /*
                                $file = FCPATH.$this->folder_upload.$get_data['attribute_image'];
                                if (file_exists($file)) {
                                    unlink($file);
                                }
                                */
                                $return->status=1;
                                $return->message='Berhasil menghapus '.$attribute_name;
                            }else{
                                $return->message='Gagal menghapus '.$attribute_name;
                            } 
                        }else{
                            $return->message='Data tidak ditemukan';
                        }
                    }
                    break;
                case "update_flag":
                    $this->form_validation->set_rules('attribute_id', 'attribute_id', 'required');
                    $this->form_validation->set_rules('attribute_flag', 'attribute_flag', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $attribute_id = !empty($post['attribute_id']) ? $post['attribute_id'] : 0;
                        if(strlen(intval($attribute_id)) > 1){
                            
                            $params = array(
                                'attribute_flag' => !empty($post['attribute_flag']) ? intval($post['attribute_flag']) : 0,
                            );
                            
                            $where = array(
                                'attribute_id' => !empty($post['attribute_id']) ? intval($post['attribute_id']) : 0,
                            );
                            
                            if($post['attribute_flag']== 0){
                                $set_msg = 'nonaktifkan';
                            }else if($post['attribute_flag']== 1){
                                $set_msg = 'mengaktifkan';
                            }else if($post['attribute_flag']== 4){
                                $set_msg = 'menghapus';
                            }else{
                                $set_msg = 'mendapatkan data';
                            }

                            if($post['attribute_flag'] == 4){
                                $params['attribute_url'] = null;
                            }

                            $get_data = $this->Attribute_model->get_attribute_custom($where);
                            if($get_data){
                                $set_update=$this->Attribute_model->update_attribute_custom($where,$params);
                                if($set_update){
                                    if($post['attribute_flag'] == 4){
                                        /*
                                        $file = FCPATH.$this->folder_upload.$get_data['attribute_image'];
                                        if (file_exists($file)) {
                                            unlink($file);
                                        }
                                        */
                                    }
                                    $return->status  = 1;
                                    $return->message = 'Berhasil '.$set_msg.' '.$get_data['attribute_name'];
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
                case "create_attribute_item":
                    // $data = base64_decode($post);
                    // $data = json_decode($post, TRUE);

                    $this->form_validation->set_rules('attribute_item_name', 'attribute_item_name', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{

                        $attribute_item_name = !empty($post['attribute_item_name']) ? $post['attribute_item_name'] : null;
                        $attribute_item_flag = !empty($post['attribute_item_flag']) ? $post['attribute_item_flag'] : 0;
                        $attribute_item_session = strtoupper(substr(hash('sha256', date_timestamp_get(date_create())),0,20));

                        $params = array(
                            'attribute_item_name' => $attribute_item_name,
                            'attribute_item_flag' => $attribute_item_flag
                        );

                        //Check Data Exist
                        $params_check = array(
                            'attribute_item_name' => $attribute_item_name
                        );
                        $check_exists = $this->Attribute_model->check_data_exist_attribute_item($params_check);
                        if(!$check_exists){

                            $set_data=$this->Attribute_model->add_attribute_item($params);
                            if($set_data){

                                $attribute_item_id = $set_data;
                                $data = $this->Attribute_model->get_attribute_item($attribute_item_id);
                                $return->status=1;
                                $return->message='Berhasil menambahkan '.$post['attribute_item_name'];
                                $return->result= array(
                                    'id' => $set_data,
                                    'name' => $post['attribute_item_name'],
                                    'session' => $attribute_item_session
                                ); 
                            }else{
                                $return->message='Gagal menambahkan '.$post['attribute_item_name'];
                            }
                        }else{
                            $return->message='Data sudah ada';
                        }
                    }
                    break;
                case "read_attribute_item":
                    $this->form_validation->set_rules('attribute_item_id', 'attribute_item_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{                
                        $attribute_item_id   = !empty($post['attribute_item_id']) ? $post['attribute_item_id'] : 0;
                        if(intval(strlen($attribute_item_id)) > 0){        
                            $datas = $this->Attribute_model->get_attribute_item($attribute_item_id);
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
                case "update_attribute_item":
                    $this->form_validation->set_rules('attribute_item_id', 'attribute_item_id', 'required');
                    $this->form_validation->set_message('required', '{field} tidak ditemukan');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $attribute_item_id = !empty($post['attribute_item_id']) ? $post['attribute_item_id'] : $post['attribute_item_id'];
                        $attribute_item_name = !empty($post['attribute_item_name']) ? $post['attribute_item_name'] : $post['attribute_item_name'];
                        $attribute_item_flag = !empty($post['attribute_item_flag']) ? $post['attribute_item_flag'] : $post['attribute_item_flag'];

                        if(strlen($attribute_item_id) > 0){
                            $params = array(
                                'attribute_item_name' => $attribute_item_name,
                                'attribute_item_date_updated' => date("YmdHis"),
                                'attribute_item_flag' => $attribute_item_flag
                            );
                           
                            $set_update=$this->Attribute_model->update_attribute_item($attribute_item_id,$params);
                            if($set_update){
                                $get_data = $this->Attribute_model->get_attribute_item($attribute_item_id);
                                $return->status  = 1;
                                $return->message = 'Berhasil memperbarui '.$attribute_item_name;
                            }else{
                                $return->message='Gagal memperbarui '.$attribute_item_name;
                            }   
                        }else{
                            $return->message = "Gagal memperbarui";
                        } 
                    }
                    break;
                case "update_attribute_item_flag":
                    $this->form_validation->set_rules('attribute_item_id', 'attribute_item_id', 'required');
                    $this->form_validation->set_rules('attribute_item_flag', 'attribute_item_flag', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $attribute_item_id = !empty($post['attribute_item_id']) ? $post['attribute_item_id'] : 0;
                        if(strlen(intval($attribute_item_id)) > 0){
                            
                            $params = array(
                                'attribute_item_flag' => !empty($post['attribute_item_flag']) ? intval($post['attribute_item_flag']) : 0,
                            );
                            
                            $where = array(
                                'attribute_item_id' => !empty($post['attribute_item_id']) ? intval($post['attribute_item_id']) : 0,
                            );
                            
                            if($post['attribute_item_flag']== 0){
                                $set_msg = 'nonaktifkan';
                            }else if($post['attribute_item_flag']== 1){
                                $set_msg = 'mengaktifkan';
                            }else if($post['attribute_item_flag']== 4){
                                $set_msg = 'menghapus';
                            }else{
                                $set_msg = 'mendapatkan data';
                            }

                            $set_update=$this->Attribute_model->update_attribute_item_custom($where,$params);
                            if($set_update){
                                $get_data = $this->Attribute_model->get_attribute_item_custom($where);
                                $return->status  = 1;
                                $return->message = 'Berhasil '.$set_msg.' '.$get_data['attribute_item_name'];
                            }else{
                                $return->message='Gagal '.$set_msg;
                            }   
                        }else{
                            $return->message = 'Gagal mendapatkan data';
                        } 
                    }
                    break;
                case "delete_attribute_item":
                    $this->form_validation->set_rules('attribute_item_id', 'attribute_item_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $attribute_item_id   = !empty($post['attribute_item_id']) ? $post['attribute_item_id'] : 0;
                        $attribute_item_name = !empty($post['attribute_item_name']) ? $post['attribute_item_name'] : null;                                

                        if(strlen($attribute_item_id) > 0){
                            $get_data=$this->Attribute_model->get_attribute_item($attribute_item_id);
                            // $set_data=$this->Attribute_model->delete_attribute_item($attribute_item_id);
                            $set_data = $this->Attribute_model->update_attribute_item_custom(array('attribute_item_id'=>$attribute_item_id),array('attribute_item_flag'=>4));                
                            if($set_data){
                                /*
                                if (file_exists($get_data['attribute_item_image'])) {
                                    unlink($get_data['attribute_item_image']);
                                } 
                                */
                                $return->status=1;
                                $return->message='Berhasil menghapus '.$attribute_item_name;
                            }else{
                                $return->message='Gagal menghapus '.$attribute_item_name;
                            } 
                        }else{
                            $return->message='Data tidak ditemukan';
                        }
                    }
                    break;
                case "load_attribute_item":
                    $columns = array(
                        '0' => 'attribute_item_id',
                        '1' => 'attribute_item_name'
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

                    //Default Params for Master CRUD Form
                    $params['attribute_item_id']   = !empty($post['attribute_item_id']) ? $post['attribute_item_id'] : $params;
                    $params['attribute_item_name'] = !empty($post['attribute_item_name']) ? $post['attribute_item_name'] : $params;

                    /*
                    if($post['other_item_column'] && $post['other_item_column'] > 0) {
                        $params['other_item_column'] = $post['other_item_column'];
                    }
                    */
                    
                    $get_count = $this->Attribute_model->get_all_attribute_item_count($params, $search);
                    if($get_count > 0){
                        $get_data = $this->Attribute_model->get_all_attribute_item($params, $search, $limit, $start, $order, $dir);
                        $return->total_records   = $get_count;
                        $return->status          = 1; 
                        $return->result          = $get_data;
                    }else{
                        $return->total_records   = 0;
                        $return->result          = [];
                    }
                    $return->message             = 'Load '.$return->total_records.' data';
                    $return->recordsTotal        = $return->total_records;
                    $return->recordsFiltered     = $return->total_records;
                    break;
                case "load_attribute_item_2":
                    $params = array(); $total  = 0;
                    $this->form_validation->set_rules('attribute_item_attribute_id', 'attribute_item_attribute_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $attribute_item_attribute_id   = !empty($post['attribute_item_attribute_id']) ? $post['attribute_item_attribute_id'] : 0;
                        if(intval(strlen($attribute_item_attribute_id)) > 0){
                            $params = array(
                                'attribute_item_attribute_id' => $attribute_item_attribute_id
                            );
                            $search = null;
                            $start  = null;
                            $limit  = null;
                            $order  = "attribute_item_id";
                            $dir    = "asc";
                            $get_data = $this->Attribute_model->get_all_attribute_item($params, $search, $limit, $start, $order, $dir);
                            if($get_data){
                                $total = count($get_data);
                                $return->status=1;
                                $return->message='Berhasil mendapatkan data';
                                $return->result=$get_data;
                            }else{
                                $return->message = 'Data tidak ditemukan';
                            }
                        }else{
                            $return->message='Data tidak ada';
                        }
                    }
                    $return->params          =$params;
                    $return->total_records   = $total;
                    $return->recordsTotal    = $total;
                    $return->recordsFiltered = $total;
                    break;
                case "load_category_attr": //Done
                    $params = array(); $total  = 0;
                    $this->form_validation->set_rules('category_id', 'category_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $category_id   = !empty($post['category_id']) ? $post['category_id'] : 0;
                        if(strlen($category_id) > 0){
                            $cat_session = $category_id;
                            if(strlen($category_id) < 6){
                                $get_cat = $this->Kategori_model->get_categories($category_id);
                                $cat_session = $get_cat['category_session']; 
                            }

                            $params = array(
                                'ca_category_session' => $cat_session
                            );
                            $search = null;
                            $start  = null;
                            $limit  = null;
                            $order  = "attr_name";
                            $dir    = "asc";
                            // var_dump($params);die;
                            $get_data = $this->Attribute_model->get_all_category($params, $search, $limit, $start, $order, $dir);
                            if($get_data){
                                $total = count($get_data);
                                $return->status=1;
                                $return->message='Berhasil mendapatkan data';
                                $return->result=$get_data;
                            }else{
                                $return->message = 'Data tidak ditemukan';
                            }
                        }else{
                            $return->message='Data tidak ada';
                        }
                    }
                    $return->params          =$params;
                    $return->total_records   = $total;
                    $return->recordsTotal    = $total;
                    $return->recordsFiltered = $total;
                    break;
                case "load_product_attr": //Done
                    $params = array(); $total  = 0;
                    $this->form_validation->set_rules('product_id', 'product_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $product_id   = !empty($post['product_id']) ? $post['product_id'] : 0;
                        if(strlen($product_id) > 0){
                            $pro_session = $product_id;
                            if(strlen($product_id) < 6){
                                $get_pro = $this->Product_model->get_product($product_id);
                                $pro_session = $get_pro['product_session']; 
                            }

                            $params = array(
                                'ca_category_session' => $get_pro['category_session']
                            );
                            $search = $pro_session;

                            $start  = null;
                            $limit  = null;
                            $order  = "attr_name";
                            $dir    = "asc";

                            $get_data = $this->Attribute_model->get_all_product_attr($params, $search, $limit, $start, $order, $dir);
                            if($get_data){
                                $total = count($get_data);
                                $return->status=1;
                                $return->message='Berhasil mendapatkan data';
                                $return->result=$get_data;
                            }else{
                                $return->message = 'Data tidak ditemukan';
                            }
                        }else{
                            $return->message='Data tidak ada';
                        }
                    }
                    $return->params          =$params;
                    $return->total_records   = $total;
                    $return->recordsTotal    = $total;
                    $return->recordsFiltered = $total;
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

            $data['image_width'] = intval($this->image_width);
            $data['image_height'] = intval($this->image_height);
            /*
            // Reference Model
            $this->load->model('Reference_model');
            $data['reference'] = $this->Reference_model->get_all_reference();
            */

            $data['title'] = 'Attribute';
            $data['_view'] = 'layouts/admin/menu/webpage/attribute';
            $this->load->view('layouts/admin/index',$data);
            $this->load->view('layouts/admin/menu/webpage/attribute_js.php',$data);
        }
    }
}

?>