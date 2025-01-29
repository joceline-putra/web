<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagersemar extends MY_Controller{

    var $folder_upload = 'upload/name/';
    var $image_width   = 250;
    var $image_height  = 250;

    function __construct(){
        parent::__construct();
        $this->load->model('Branch_model');
        $this->load->model('Konfigurasi_model');        
        $this->load->model('User_model');
        $this->load->model('Kontak_model');

        $this->load->helper('form');
        $this->load->library('form_validation');        
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
            $session_user_group_id = $data['session']['user_data']['user_group_id'];       
            $session_branch_id = $data['session']['user_data']['branch']['id'];
        
            $post = $this->input->post();
            $get  = $this->input->get();
            $action = !empty($this->input->post('action')) ? $this->input->post('action') : false;
            
            switch($action){
                case "load":
                    $columns = array(
                        '0' => 'name_id',
                        '1' => 'name_name'
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
                    !empty($post['date_start']) ? $params['name_date >'] = date('Y-m-d H:i:s', strtotime($post['date_start'].' 23:59:59')) : $params;
                    !empty($post['date_end']) ? $params['name_date <'] = date('Y-m-d H:i:s', strtotime($post['date_end'].' 23:59:59')) : $params;
                    */

                    //Default Params for Master CRUD Form
                    $params['name_id']   = !empty($post['name_id']) ? $post['name_id'] : $params;
                    $params['name_name'] = !empty($post['name_name']) ? $post['name_name'] : $params;

                    /*
                        if($post['other_column'] && $post['other_column'] > 0) {
                            $params['other_column'] = $post['other_column'];
                        }
                        if($post['filter_type'] !== "All") {
                            $params['name_type'] = $post['filter_type'];
                        }
                    */
                    
                    $get_count = $this->Pagersemar_model->get_all_name_count($params, $search);
                    if($get_count > 0){
                        $get_data = $this->Pagersemar_model->get_all_name($params, $search, $limit, $start, $order, $dir);
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
                    $this->form_validation->set_rules('name_id', 'name_id', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{

                        if(intval($post['name_id']) > 0){ /* Update if Exist */ // if( (!empty($post['name_session'])) && (strlen($post['name_session']) > 10) ){ /* Update if Exist */

                            /* Check Existing Data */
                            $where_not = [
                                'name_id' => intval($post['name_id']),
                            ];
                            $where_new = [
                                'name_name' => $name_name
                            ];
                            $check_exists = $this->Pagersemar_model->check_data_exist_two_condition($where_not,$where_new);

                            /* Continue Update if not exist */
                            if(!$check_exists){
                                $where = array(
                                    'name_id' => intval($post['name_id']),
                                );
                                $params = array(
                                    'name_name' => $name_name,
                                    'name_flag' => !empty($post['name_flag']) ? $post['name_flag'] : 0
                                );
                                $update = $this->Pagersemar_model->update_name_custom($where,$params);
                                if($update){
                                    $get_name = $this->Pagersemar_model->get_name_custom($where);
                                    $return->status  = 1;
                                    $return->message = 'Berhasil memperbarui '.$name_name;
                                    $return->result= array(
                                        'name_id' => $update,
                                        'name_name' => $get_name['name_name'],
                                        'name_session' => $get_name['name_session']
                                    );
                                }else{
                                    $return->message = 'Gagal memperbarui '.$name_name;
                                }
                            }else{
                                $return->message = 'Data sudah digunakan';
                            }
                        }else{ /* Save New Data */

                            /* Check Existing Data */
                            $params_check = [
                                'name_name' => $name_name
                            ];
                            $check_exists = $this->Pagersemar_model->check_data_exist($params_check);

                            /* Continue Save if not exist */
                            if(!$check_exists){
                                $name_session = strtoupper(substr(hash('sha256', date_timestamp_get(date_create())),0,20));
                                $params = array(
                                    'name_session' => $name_session,
                                    'name_name' => $name_name,
                                    'name_flag' => !empty($post['name_flag']) ? $post['name_flag'] : 0
                                );
                                $create = $this->Pagersemar_model->add_name($params);
                                if($create){
                                    $get_name = $this->Pagersemar_model->get_name($create);
                                    $return->status  = 1;
                                    $return->message = 'Berhasil menambahkan '.$name_name;
                                    $return->result= array(
                                        'name_id' => $create,
                                        'name_name' => $get_name['name_name'],
                                        'name_session' => $get_name['name_session']
                                    );
                                }else{
                                    $return->message = 'Gagal menambahkan '.$name_name;
                                }
                            }else{
                                $return->message = 'Data sudah ada';
                            }
                        }
                    }
                    break;
                case "create":
                    // $data = base64_decode($post); $data = json_decode($post, TRUE);
                    $this->form_validation->set_rules('name_name', 'name_name', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{

                        $name_name = !empty($post['name_name']) ? $post['name_name'] : null;
                        $name_flag = !empty($post['name_flag']) ? $post['name_flag'] : 0;
                        $name_session = strtoupper(substr(hash('sha256', date_timestamp_get(date_create())),0,20));

                        $params = array(
                            'name_name' => $name_name,
                            'name_flag' => $name_flag
                        );

                        //Check Data Exist
                        $params_check = array(
                            'name_name' => $name_name
                        );
                        $check_exists = $this->Pagersemar_model->check_data_exist($params_check);
                        if(!$check_exists){

                            $set_data=$this->Pagersemar_model->add_name($params);
                            if($set_data){

                                $name_id = $set_data;
                                $data = $this->Pagersemar_model->get_name($name_id);

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

                                            if ($data && $data['name_id']) {
                                                $params_image = array(
                                                    'name_image' => $upload_directory . $raw_photo
                                                );
                                                if (!empty($data['name_image'])) {
                                                    if (file_exists($upload_path_directory . $data['name_image'])) {
                                                        unlink($upload_path_directory . $data['name_image']);
                                                    }
                                                }
                                                $stat = $this->Pagersemar_model->update_name_custom(array('name_id' => $set_data), $params_image);
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
                                        if ($data && $data['name_id']) {
                                            $params_image = array(
                                                'name_url' => $upload_process->result['file_location']
                                            );
                                            if (!empty($data['name_url'])) {
                                                if (file_exists($upload_path_directory . $data['name_url'])) {
                                                    unlink($upload_path_directory . $data['name_url']);
                                                }
                                            }
                                            $stat = $this->Pagersemar_model->update_name_custom(array('name_id' => $set_data), $params_image);
                                        }
                                    }else{
                                        $return->message = 'Fungsi Gambar gagal';
                                    }
                                }
                                //End of Croppie

                                $return->status=1;
                                $return->message='Berhasil menambahkan '.$post['name_name'];
                                $return->result= array(
                                    'id' => $set_data,
                                    'name' => $post['name_name'],
                                    'session' => $name_session
                                ); 
                            }else{
                                $return->message='Gagal menambahkan '.$post['name_name'];
                            }
                        }else{
                            $return->message='Data sudah ada';
                        }
                    }
                    break;
                case "read":
                    $this->form_validation->set_rules('name_id', 'name_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{                
                        $name_id   = !empty($post['name_id']) ? $post['name_id'] : 0;
                        if(intval(strlen($name_id)) > 0){        
                            $datas = $this->Pagersemar_model->get_name($name_id);
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
                    $this->form_validation->set_rules('name_id', 'name_id', 'required');
                    $this->form_validation->set_message('required', '{field} tidak ditemukan');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $name_id = !empty($post['name_id']) ? $post['name_id'] : $post['name_id'];
                        $name_name = !empty($post['name_name']) ? $post['name_name'] : $post['name_name'];
                        $name_flag = !empty($post['name_flag']) ? $post['name_flag'] : $post['name_flag'];

                        if(strlen($name_id) > 1){
                            $params = array(
                                'name_name' => $name_name,
                                'name_date_updated' => date("YmdHis"),
                                'name_flag' => $name_flag
                            );

                            /*
                            if(!empty($data['password'])){
                                $params['password'] = md5($data['password']);
                            }
                            */
                           
                            $set_update=$this->Pagersemar_model->update_name($name_id,$params);
                            if($set_update){
                                
                                $get_data = $this->Pagersemar_model->get_name($name_id);
                                    
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
                                                    'name_image' => base_url($upload_directory) . $raw_photo
                                                );
                                                if (!empty($get_data['name_image'])) {
                                                    $file = FCPATH.$this->folder_upload.$get_data['name_image'];
                                                    if (file_exists($file)) {
                                                        unlink($file);
                                                    }
                                                }
                                                $stat = $this->Pagersemar_model->update_name_custom(array('name_id' => $name_id), $params_image);
                                            }
                                        }
                                    }
                                }
                                //End of Save Image

                                $return->status  = 1;
                                $return->message = 'Berhasil memperbarui '.$name_name;
                            }else{
                                $return->message='Gagal memperbarui '.$name_name;
                            }   
                        }else{
                            $return->message = "Gagal memperbarui";
                        } 
                    }
                    break;
                case "delete":
                    $this->form_validation->set_rules('name_id', 'name_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $name_id   = !empty($post['name_id']) ? $post['name_id'] : 0;
                        $name_name = !empty($post['name_name']) ? $post['name_name'] : null;

                        if(strlen($name_id) > 0){
                            $get_data=$this->Pagersemar_model->get_name($name_id);
                            // $set_data=$this->Pagersemar_model->delete_name($name_id);
                            $set_data = $this->Pagersemar_model->update_name_custom(array('name_id'=>$name_id),array('name_flag'=>4));                
                            if($set_data){
                                /*
                                $file = FCPATH.$this->folder_upload.$get_data['name_image'];
                                if (file_exists($file)) {
                                    unlink($file);
                                }
                                */
                                $return->status=1;
                                $return->message='Berhasil menghapus '.$name_name;
                            }else{
                                $return->message='Gagal menghapus '.$name_name;
                            } 
                        }else{
                            $return->message='Data tidak ditemukan';
                        }
                    }
                    break;
                case "update_flag":
                    $this->form_validation->set_rules('name_id', 'name_id', 'required');
                    $this->form_validation->set_rules('name_flag', 'name_flag', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $name_id = !empty($post['name_id']) ? $post['name_id'] : 0;
                        if(strlen(intval($name_id)) > 1){
                            
                            $params = array(
                                'name_flag' => !empty($post['name_flag']) ? intval($post['name_flag']) : 0,
                            );
                            
                            $where = array(
                                'name_id' => !empty($post['name_id']) ? intval($post['name_id']) : 0,
                            );
                            
                            if($post['name_flag']== 0){
                                $set_msg = 'nonaktifkan';
                            }else if($post['name_flag']== 1){
                                $set_msg = 'mengaktifkan';
                            }else if($post['name_flag']== 4){
                                $set_msg = 'menghapus';
                            }else{
                                $set_msg = 'mendapatkan data';
                            }

                            if($post['name_flag'] == 4){
                                $params['name_url'] = null;
                            }

                            $get_data = $this->Pagersemar_model->get_name_custom($where);
                            if($get_data){
                                $set_update=$this->Pagersemar_model->update_name_custom($where,$params);
                                if($set_update){
                                    if($post['name_flag'] == 4){
                                        /*
                                        $file = FCPATH.$this->folder_upload.$get_data['name_image'];
                                        if (file_exists($file)) {
                                            unlink($file);
                                        }
                                        */
                                    }
                                    $return->status  = 1;
                                    $return->message = 'Berhasil '.$set_msg.' '.$get_data['name_name'];
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
                case "create_name_item":
                    // $data = base64_decode($post);
                    // $data = json_decode($post, TRUE);

                    $this->form_validation->set_rules('name_item_name', 'name_item_name', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{

                        $name_item_name = !empty($post['name_item_name']) ? $post['name_item_name'] : null;
                        $name_item_flag = !empty($post['name_item_flag']) ? $post['name_item_flag'] : 0;
                        $name_item_session = strtoupper(substr(hash('sha256', date_timestamp_get(date_create())),0,20));

                        $params = array(
                            'name_item_name' => $name_item_name,
                            'name_item_flag' => $name_item_flag
                        );

                        //Check Data Exist
                        $params_check = array(
                            'name_item_name' => $name_item_name
                        );
                        $check_exists = $this->Pagersemar_model->check_data_exist_name_item($params_check);
                        if(!$check_exists){

                            $set_data=$this->Pagersemar_model->add_name_item($params);
                            if($set_data){

                                $name_item_id = $set_data;
                                $data = $this->Pagersemar_model->get_name_item($name_item_id);
                                $return->status=1;
                                $return->message='Berhasil menambahkan '.$post['name_item_name'];
                                $return->result= array(
                                    'id' => $set_data,
                                    'name' => $post['name_item_name'],
                                    'session' => $name_item_session
                                ); 
                            }else{
                                $return->message='Gagal menambahkan '.$post['name_item_name'];
                            }
                        }else{
                            $return->message='Data sudah ada';
                        }
                    }
                    break;
                case "read_name_item":
                    $this->form_validation->set_rules('name_item_id', 'name_item_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{                
                        $name_item_id   = !empty($post['name_item_id']) ? $post['name_item_id'] : 0;
                        if(intval(strlen($name_item_id)) > 0){        
                            $datas = $this->Pagersemar_model->get_name_item($name_item_id);
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
                case "update_name_item":
                    $this->form_validation->set_rules('name_item_id', 'name_item_id', 'required');
                    $this->form_validation->set_message('required', '{field} tidak ditemukan');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $name_item_id = !empty($post['name_item_id']) ? $post['name_item_id'] : $post['name_item_id'];
                        $name_item_name = !empty($post['name_item_name']) ? $post['name_item_name'] : $post['name_item_name'];
                        $name_item_flag = !empty($post['name_item_flag']) ? $post['name_item_flag'] : $post['name_item_flag'];

                        if(strlen($name_item_id) > 0){
                            $params = array(
                                'name_item_name' => $name_item_name,
                                'name_item_date_updated' => date("YmdHis"),
                                'name_item_flag' => $name_item_flag
                            );
                           
                            $set_update=$this->Pagersemar_model->update_name_item($name_item_id,$params);
                            if($set_update){
                                $get_data = $this->Pagersemar_model->get_name_item($name_item_id);
                                $return->status  = 1;
                                $return->message = 'Berhasil memperbarui '.$name_item_name;
                            }else{
                                $return->message='Gagal memperbarui '.$name_item_name;
                            }   
                        }else{
                            $return->message = "Gagal memperbarui";
                        } 
                    }
                    break;
                case "update_name_item_flag":
                    $this->form_validation->set_rules('name_item_id', 'name_item_id', 'required');
                    $this->form_validation->set_rules('name_item_flag', 'name_item_flag', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $name_item_id = !empty($post['name_item_id']) ? $post['name_item_id'] : 0;
                        if(strlen(intval($name_item_id)) > 0){
                            
                            $params = array(
                                'name_item_flag' => !empty($post['name_item_flag']) ? intval($post['name_item_flag']) : 0,
                            );
                            
                            $where = array(
                                'name_item_id' => !empty($post['name_item_id']) ? intval($post['name_item_id']) : 0,
                            );
                            
                            if($post['name_item_flag']== 0){
                                $set_msg = 'nonaktifkan';
                            }else if($post['name_item_flag']== 1){
                                $set_msg = 'mengaktifkan';
                            }else if($post['name_item_flag']== 4){
                                $set_msg = 'menghapus';
                            }else{
                                $set_msg = 'mendapatkan data';
                            }

                            $set_update=$this->Pagersemar_model->update_name_item_custom($where,$params);
                            if($set_update){
                                $get_data = $this->Pagersemar_model->get_name_item_custom($where);
                                $return->status  = 1;
                                $return->message = 'Berhasil '.$set_msg.' '.$get_data['name_item_name'];
                            }else{
                                $return->message='Gagal '.$set_msg;
                            }   
                        }else{
                            $return->message = 'Gagal mendapatkan data';
                        } 
                    }
                    break;
                case "delete_name_item":
                    $this->form_validation->set_rules('name_item_id', 'name_item_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $name_item_id   = !empty($post['name_item_id']) ? $post['name_item_id'] : 0;
                        $name_item_name = !empty($post['name_item_name']) ? $post['name_item_name'] : null;                                

                        if(strlen($name_item_id) > 0){
                            $get_data=$this->Pagersemar_model->get_name_item($name_item_id);
                            // $set_data=$this->Pagersemar_model->delete_name_item($name_item_id);
                            $set_data = $this->Pagersemar_model->update_name_item_custom(array('name_item_id'=>$name_item_id),array('name_item_flag'=>4));                
                            if($set_data){
                                /*
                                if (file_exists($get_data['name_item_image'])) {
                                    unlink($get_data['name_item_image']);
                                } 
                                */
                                $return->status=1;
                                $return->message='Berhasil menghapus '.$name_item_name;
                            }else{
                                $return->message='Gagal menghapus '.$name_item_name;
                            } 
                        }else{
                            $return->message='Data tidak ditemukan';
                        }
                    }
                    break;
                case "load_name_item":
                    $columns = array(
                        '0' => 'name_item_id',
                        '1' => 'name_item_name'
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
                    $params['name_item_id']   = !empty($post['name_item_id']) ? $post['name_item_id'] : $params;
                    $params['name_item_name'] = !empty($post['name_item_name']) ? $post['name_item_name'] : $params;

                    /*
                    if($post['other_item_column'] && $post['other_item_column'] > 0) {
                        $params['other_item_column'] = $post['other_item_column'];
                    }
                    */
                    
                    $get_count = $this->Pagersemar_model->get_all_name_item_count($params, $search);
                    if($get_count > 0){
                        $get_data = $this->Pagersemar_model->get_all_name_item($params, $search, $limit, $start, $order, $dir);
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
                case "load_name_item_2":
                    $params = array(); $total  = 0;
                    $this->form_validation->set_rules('name_item_name_id', 'name_item_name_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $name_item_name_id   = !empty($post['name_item_name_id']) ? $post['name_item_name_id'] : 0;
                        if(intval(strlen($name_item_name_id)) > 0){
                            $params = array(
                                'name_item_name_id' => $name_item_name_id
                            );
                            $search = null;
                            $start  = null;
                            $limit  = null;
                            $order  = "name_item_id";
                            $dir    = "asc";
                            $get_data = $this->Pagersemar_model->get_all_name_item($params, $search, $limit, $start, $order, $dir);
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
                    $return->message='No Action';
                    break; 
            }
            echo json_encode($return);
        }
    }
    function member(){
        $data['identity'] = 2;
        $data['image_width'] = intval($this->image_width);
        $data['image_height'] = intval($this->image_height);
                
        $data['session']    = $this->session->userdata();  
        $data['theme']      = $this->User_model->get_user($data['session']['user_data']['user_id']);

        $data['title']  = 'Member';
        $data['_view']  = 'layouts/admin/menu/pagersemar/customer';
        $data['_js']    = 'layouts/admin/menu/pagersemar/customer_js';            
        $this->load->view('layouts/admin/index',$data);
    }
    function card(){
        $data['session']    = $this->session->userdata();  
        $data['theme']      = $this->User_model->get_user($data['session']['user_data']['user_id']);

        $data['title']  = 'Card';
        $data['_view']  = 'layouts/admin/menu/pagersemar/card';
        $data['_js']    = 'layouts/admin/menu/pagersemar/card_js';            
        $this->load->view('layouts/admin/index',$data);
    }  
    function merchant(){
        $data['identity'] = 6;
        $data['image_width'] = intval($this->image_width);
        $data['image_height'] = intval($this->image_height);
            
        $data['session']    = $this->session->userdata();  
        $data['theme']      = $this->User_model->get_user($data['session']['user_data']['user_id']);

        $data['title']  = 'Merchant';
        $data['_view']  = 'layouts/admin/menu/pagersemar/branch';
        $data['_js']    = 'layouts/admin/menu/pagersemar/branch_js';            
        $this->load->view('layouts/admin/index',$data);
    }
    function user(){
        $data['session']    = $this->session->userdata();  
        $data['theme']      = $this->User_model->get_user($data['session']['user_data']['user_id']);

        $data['title']  = 'User';
        $data['_view']  = 'layouts/admin/menu/pagersemar/user';
        $data['_js']    = 'layouts/admin/menu/pagersemar/user_js';            
        $this->load->view('layouts/admin/index',$data);
    }        
}

?>