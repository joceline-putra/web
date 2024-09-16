<?php
/*
    @AUTHOR: Joe Witaya
*/ 
class User_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function set_params($params) {
        if ($params) {
            foreach ($params as $k => $v) {
                $this->db->where($k, $v);
            }
        }
    }

    function set_search($search) {
        if ($search) {
            $n = 0;
            $this->db->group_start();
            foreach ($search as $key => $val) {
                if ($n == 0) {
                    $this->db->like($key, $val);
                } else {
                    $this->db->or_like($key, $val);
                }

                $n++;
            }
            $this->db->group_end();
        }
    }

    function set_join() {
        $this->db->join('users_groups AS ug', 'u.user_user_group_id=ug.user_group_id','left');
        $this->db->join('branchs AS b','u.user_branch_id=b.branch_id','left');
    }

    function get_all_users($params = null, $search = null, $limit = null, $start = null, $order = null, $dir = null) {
        $this->db->select("u.user_id, u.user_type, 
            u.user_code,
            u.user_activation_code, 
            u.user_username, 
            u.user_fullname, 
            u.user_email_1,
            u.user_phone_1,
            u.user_flag, 
            ug.user_group_name");
        $this->db->select("b.*");
        $this->db->select("fn_time_ago(u.user_date_last_login) AS time_ago");
        $this->set_params($params);
        $this->set_search($search);
        $this->set_join();

        if ($order) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('u.user_username', "asc");
        }

        if ($limit) {
            $this->db->limit($limit, $start);
        }
        
        return $this->db->get('users AS u')->result_array();
    }

    function get_user($id){
        $this->db->join('users_groups AS ug', 'u.user_user_group_id=ug.user_group_id','left');
        $this->db->join('branchs AS b','u.user_branch_id=b.branch_id','left');        
        return $this->db->get_where('users AS u',array('user_id'=>$id))->row_array();
    }
    function get_user_custom($where){
        return $this->db->get_where('users',$where)->row_array();
    }    
    function get_user_by_email($email){
        return $this->db->get_where('users',array('user_email_1'=>$email))->row_array();
    }       

    function get_all_user(){
        $this->db->order_by('user_username', 'asc');
        return $this->db->get('users')->result_array();
    }

    /*
    Get all user_group
    */
    function get_all_user_group(){
        $this->db->order_by('user_group_name', 'asc');
        return $this->db->get('users_groups')->result_array();
    }

    function get_all_users_count($params){
        $this->db->from('users');   
        $this->set_params($params);            
        return $this->db->count_all_results();
    }

    /*
    Data Table user
    */
    function get_datatable(){
        $this->db->select('users.*, users.user_id, user_groups.name AS group_name');
        $this->db->from('users');  
        $this->db->join('users_groups','user_groups.id=user.user_user_group_id','left');        
        return $this->db->get();
    }
        
    /*
    function to add new user
    */
    function add_user($params){
        $this->db->insert('users',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($id,$params){
        $this->db->where('user_id',$id);
        return $this->db->update('users',$params);
    }
    
    /*
     * function to delete user
     */
    function delete_user($id){
        return $this->db->delete('users',array('user_id'=>$id));
    }


    //** HAK AKSES **//

    /*
     * function get user menu info
     */
    function get_user_menu_info($id_user, $id_menu){      
        $this->db->select('users_menus.*, users.user_username as username, menus.menu_name as nama_menu');
        $this->db->from('users_menus');
        $this->db->join('users','user.user_id = users_menus.user_menu_user_id','left'); 
        $this->db->join('menus','menu.id = users_menus.user_menu_menu_id','left');         
        $this->db->where('users_menus.user_id',$id_user);
        $this->db->where('users_menus.menu_id',$id_menu);
        return $this->db->get()->row_array();           
    }

    /*
     * function check user menu
     */
    function check_user_have_menu($menu, $user){
        $sub_query = 'SELECT user_menu_user_id, user_menu_menu_id FROM users_menu 
        WHERE user_menu_menu_id = "'.$menu.'" AND user_menu_user_id = "'.$user.'"';
        $this->db->select("EXISTS($sub_query) AS menu_status");
        return $this->db->get()->row_array();      
    }
    

    function get_user_menu($id){
        return $this->db->get_where('users_menus',array('menu_id'=>$id))->row_array();
    }
    function add_user_menu($params){
        $this->db->insert('users_menus',$params);
        return $this->db->insert_id();
    }

    function get_user_menu_by_id_usermenu($id_user, $id_menu){
        return $this->db->get_where('users_menus',array('user_menu_user_id'=>$id_user, 'user_menu_menu_id'=>$id_menu ))->row_array();
    }
    
    /*
     * function to delete user_menu
     */
    function delete_user_menu($id){
        return $this->db->delete('users_menu',array('menu_id'=>$id));
    }

    function get_user_menu_akses($id_user){      
        $this->db->select('user_menus.*, users.user_username as username, menus.menu_name as nama_menu, menu_groups.name AS nama_menu_group');
        $this->db->from('users_menus');
        $this->db->join('users','users.user_id = user_menus.user_menu_user_id','left'); 
        $this->db->join('menus','menus.id = user_menus.user_menu_menu_id','left'); 
        $this->db->join('menu_groups','menus.menu_menu_group_id = menu_groups.menu_group_id','left');                 
        $this->db->where('user_menus.user_id',$id_user);
        return $this->db->get()->result_array();           
    }

    function get_all_user_approval(){
        $this->db->where('user_status',1);
        $this->db->order_by('user_first_name', 'asc');
        return $this->db->get('users')->result_array();
    }

    function check_data_exist($params){
        $this->db->where($params);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }  
    function check_data_exist_register($email,$telepon){
        $this->db->where('user_email_1',$email);
        $this->db->or_where('user_phone_1',$telepon);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }  
    function appointment(){
        $this->load->model('Order_model');          
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
                        '0' => 'order_item_start_date',
                        '1' => 'order_number',
                        '2' => 'order_contact_name',
                        '3' => 'order_contact_phone',
                        '4' => 'product_name',
                        '5' => 'order_total'
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
                    $params['order_type'] = 333;
                    /* If Form Mode Transaction CRUD not Master CRUD */
                    !empty($post['date_start']) ? $params['order_item_start_date >'] = date('Y-m-d H:i:s', strtotime($post['date_start'].' 23:59:59')) : $params;
                    !empty($post['date_end']) ? $params['order_item_start_date <'] = date('Y-m-d H:i:s', strtotime($post['date_end'].' 23:59:59')) : $params;

                    //Default Params for Master CRUD Form
                    // $params['faq_id']   = !empty($post['faq_id']) ? $post['faq_id'] : $params;
                    // $params['faq_name'] = !empty($post['faq_name']) ? $post['faq_name'] : $params;

                    /*
                        if($post['other_column'] && $post['other_column'] > 0) {
                            $params['other_column'] = $post['other_column'];
                        }
                    */
                    if($post['filter_flag'] !== "All") {
                        $params['order_flag'] = $post['filter_flag'];
                    }

                    if($post['filter_paid_flag'] !== "All") {
                        $params['order_paid'] = $post['filter_paid_flag'];
                    }                    

                    $get_count = $this->Order_model->get_all_orders_and_orders_items_count($params, $search);
                    if($get_count > 0){
                        $get_data = $this->Order_model->get_all_orders_and_orders_items($params, $search, $limit, $start, $order, $dir);
                        $return->total_records   = $get_count;
                        $return->status          = 1; 
                        $return->result          = $get_data;
                    }else{
                        $return->total_records   = 0;
                        $return->result          = [];
                    }
                    $return->params = $params;
                    $return->message             = 'Load '.$return->total_records.' data';
                    $return->recordsTotal        = $return->total_records;
                    $return->recordsFiltered     = $return->total_records;
                    break;
                case "create_update": die;
                    $this->form_validation->set_rules('faq_question', 'faq_question', 'required');
                    $this->form_validation->set_rules('faq_answer', 'faq_answer', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{

                        if(intval($post['faq_id']) > 0){ /* Update if Exist */ // if( (!empty($post['faq_session'])) && (strlen($post['faq_session']) > 10) ){ /* Update if Exist */

                            /* Check Existing Data */
                            $where_not = [
                                'faq_id' => intval($post['faq_id']),
                            ];
                            $where_new = [
                                'faq_question' => $post['faq_question']
                            ];
                            $check_exists = $this->Faq_model->check_data_exist_two_condition($where_not,$where_new);

                            /* Continue Update if not exist */
                            if(!$check_exists){
                                $where = array(
                                    'faq_id' => intval($post['faq_id']),
                                );
                                $params = array(
                                    'faq_question' => $post['faq_question'],
                                    'faq_answer' => $post['faq_answer'],                                    
                                    'faq_flag' => !empty($post['faq_flag']) ? $post['faq_flag'] : 0
                                );
                                $update = $this->Faq_model->update_faq_custom($where,$params);
                                if($update){
                                    $get_faq = $this->Faq_model->get_faq_custom($where);
                                    $return->status  = 1;
                                    $return->message = 'Berhasil memperbarui '.$post['faq_question'];
                                    $return->result= array(
                                        'faq_id' => $update,
                                        'faq_name' => $get_faq['faq_question']
                                    );
                                }else{
                                    $return->message = 'Gagal memperbarui ';
                                }
                            }else{
                                $return->message = 'Data sudah digunakan';
                            }
                        }else{ /* Save New Data */

                            /* Check Existing Data */
                            $params_check = [
                                'faq_question' => $post['faq_question']
                            ];
                            $check_exists = $this->Faq_model->check_data_exist($params_check);

                            /* Continue Save if not exist */
                            if(!$check_exists){
                                // $faq_session = strtoupper(substr(hash('sha256', date_timestamp_get(date_create())),0,20));
                                $params = array(
                                    'faq_question' => $post['faq_question'],
                                    'faq_answer' => $post['faq_answer'],                                    
                                    'faq_flag' => !empty($post['faq_flag']) ? $post['faq_flag'] : 0
                                );
                                $create = $this->Faq_model->add_faq($params);
                                if($create){
                                    $get_faq = $this->Faq_model->get_faq($create);
                                    $return->status  = 1;
                                    $return->message = 'Berhasil menambahkan '.$post['faq_question'];
                                    $return->result= array(
                                        'faq_id' => $create,
                                        'faq_name' => $get_faq['faq_question']
                                    );
                                }else{
                                    $return->message = 'Gagal menambahkan';
                                }
                            }else{
                                $return->message = 'Data sudah ada';
                            }
                        }
                    }
                    break;
                case "read":
                    $this->form_validation->set_rules('order_id', 'order_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{                
                        $order_id   = !empty($post['order_id']) ? $post['order_id'] : 0;
                        if(intval(strlen($order_id)) > 0){        
                            $datas = $this->Order_model->get_order($order_id);
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
                case "delete":
                    $this->form_validation->set_rules('order_id', 'order_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $order_id   = !empty($post['order_id']) ? $post['order_id'] : 0;
                        $order_number = !empty($post['order_number']) ? $post['order_number'] : null;

                        if(strlen($faq_id) > 0){
                            $get_data=$this->Order_model->get_order($order_id);
                            // $set_data=$this->Order_model->delete_order($order_id);
                            $set_data = $this->Order_model->update_order_custom(array('order_id'=>$order_id),array('order_flag'=>4));                
                            if($set_data){
                                /*
                                $file = FCPATH.$this->folder_upload.$get_data['order_image'];
                                if (file_exists($file)) {
                                    unlink($file);
                                }
                                */
                                $return->status=1;
                                $return->message='Berhasil menghapus '.$order_name;
                            }else{
                                $return->message='Gagal menghapus '.$order_name;
                            } 
                        }else{
                            $return->message='Data tidak ditemukan';
                        }
                    }
                    break;
                case "update_flag":
                    $this->form_validation->set_rules('order_id', 'order_id', 'required');
                    $this->form_validation->set_rules('order_flag', 'order_flag', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $order_id = !empty($post['order_id']) ? $post['order_id'] : 0;
                        if(intval($order_id) > 0){
                            
                            $params = array(
                                'order_flag' => !empty($post['order_flag']) ? intval($post['order_flag']) : 0,
                            );
                            
                            $where = array(
                                'order_id' => !empty($post['order_id']) ? intval($post['order_id']) : 0,
                            );
                            
                            $get_data = $this->Order_model->get_order_custom($where);
                            if($get_data){
                                $set_update=$this->Order_model->update_order_custom($where,$params);
                                if($set_update){
                                    if($post['order_flag'] == 4){
                                        /*
                                        $file = FCPATH.$this->folder_upload.$get_data['order_image'];
                                        if (file_exists($file)) {
                                            unlink($file);
                                        }
                                        */
                                    }
                                    $return->status  = 1;
                                    $return->message = 'Berhasil';
                                }else{
                                    $return->message='Gagal';
                                }
                            }else{
                                $return->message='Gagal mendapatkan data';
                            }   
                        }else{
                            $return->message = 'Tidak ada data';
                        } 
                    }
                    break;
                case "update_paid_flag":
                    $this->form_validation->set_rules('order_id', 'order_id', 'required');
                    $this->form_validation->set_rules('order_paid_flag', 'order_paid_flag', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $order_id = !empty($post['order_id']) ? $post['order_id'] : 0;
                        if(intval($order_id) > 0){
                            
                            $params = array(
                                'order_paid' => !empty($post['order_paid_flag']) ? intval($post['order_paid_flag']) : 0,
                            );
                            
                            $where = array(
                                'order_id' => !empty($post['order_id']) ? intval($post['order_id']) : 0,
                            );
                            
                            $get_data = $this->Order_model->get_order_custom($where);
                            if($get_data){
                                
                                if($post['order_paid_flag'] == 1){
                                    $params['order_total_paid'] = $get_data['order_total'];
                                }else{
                                    $params['order_total_paid'] = 0;
                                }

                                $set_update=$this->Order_model->update_order_custom($where,$params);
                                if($set_update){
                                    // if($post['order_paid'] == 4){
                                        /*
                                        $file = FCPATH.$this->folder_upload.$get_data['order_image'];
                                        if (file_exists($file)) {
                                            unlink($file);
                                        }
                                        */
                                    // }
                                    $return->status  = 1;
                                    $return->message = 'Berhasil';
                                }else{
                                    $return->message='Gagal';
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

            $data['image_width'] = intval($this->image_width);
            $data['image_height'] = intval($this->image_height);

            $data['title'] = 'Appointment';
            $data['_view'] = 'layouts/admin/menu/webpage/appointment';
            $this->load->view('layouts/admin/index',$data);
            $this->load->view('layouts/admin/menu/webpage/appointment_js.php',$data);
        }
    }   
    function user(){
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
                        '0' => 'user_username',
                        '1' => 'user_phone_1',
                        '3' => 'user_date_last_login'
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
                    !empty($post['date_start']) ? $params['user_date >'] = date('Y-m-d H:i:s', strtotime($post['date_start'].' 23:59:59')) : $params;
                    !empty($post['date_end']) ? $params['user_date <'] = date('Y-m-d H:i:s', strtotime($post['date_end'].' 23:59:59')) : $params;
                    */

                    //Default Params for Master CRUD Form
                    // $params['user_id']   = !empty($post['user_id']) ? $post['user_id'] : $params;
                    // $params['user_name'] = !empty($post['user_name']) ? $post['user_name'] : $params;

                        if($post['filter_group'] && $post['filter_group'] > 0) {
                            $params['user_user_group_id'] = $post['filter_group'];
                        }
                        // if($post['filter_type'] !== "All") {
                        //     $params['user_type'] = $post['filter_type'];
                        // }
                    
                    $get_count = $this->User_model->get_all_users_count($params, $search);
                    if($get_count > 0){
                        $get_data = $this->User_model->get_all_users($params, $search, $limit, $start, $order, $dir);
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
                    $this->form_validation->set_rules('user_user_group_id', 'Group', 'required');
                    $this->form_validation->set_rules('user_username', 'Username', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $user_name = strtolower($post['user_username']);
                        if( (!empty($post['user_id'])) && (intval($post['user_id']) > 0) ){ /* Update if Exist */

                            /* Check Existing Data */
                            $where_not = [
                                'user_id' => intval($post['user_id']),
                            ];
                            $where_new = [
                                'user_username' => $post['user_username']
                            ];
                            $check_exists = $this->User_model->check_data_exist_two_condition($where_not,$where_new);

                            /* Continue Update if not exist */
                            if(!$check_exists){
                                $where = array(
                                    'user_id' => intval($post['user_id']),
                                );
                                $params = array(
                                    'user_branch_id' => 1,
                                    'user_user_group_id' => !empty($post['user_user_group_id']) ? intval($post['user_user_group_id']) : null,
                                    'user_username' => !empty($post['user_username']) ? strtolower($post['user_username']) : null,
                                    'user_fullname' => !empty($post['user_username']) ? strtolower($post['user_username']) : null,
                                    'user_phone_1' => !empty($post['user_phone_1']) ? intval($post['user_phone_1']) : null,
                                    'user_email_1' => !empty($post['user_email_1']) ? $post['user_email_1'] : null,
                                    'user_theme' => !empty($post['user_theme']) ? $post['user_theme'] : null,
                                    'user_date_updated' => date("YmdHis"),
                                    'user_flag' => !empty($post['user_flag']) ? intval($post['user_flag']) : null,
                                    'user_activation' => 1,
                                    'user_date_activation' => date("YmdHis"),
                                    'user_menu_style' => 0
                                );

                                if(!empty($post['user_password'])){
                                    $params['user_password'] = md5($post['user_password']);
                                }

                                $update = $this->User_model->update_user_custom($where,$params);
                                if($update){
                                    $get_user = $this->User_model->get_user_custom($where);
                                    $return->status  = 1;
                                    $return->message = 'Berhasil memperbarui '.$user_name;
                                    $return->result= array(
                                        'user_id' => $update,
                                        'user_name' => $get_user['user_username'],
                                        'user_session' => $get_user['user_session']
                                    );
                                }else{
                                    $return->message = 'Gagal memperbarui '.$user_name;
                                }
                            }else{
                                $return->message = 'Data sudah digunakan';
                            }
                        }else{ /* Save New Data */

                            /* Check Existing Data */
                            $params_check = [
                                'user_username' => $user_name
                            ];
                            $check_exists = $this->User_model->check_data_exist($params_check);

                            /* Continue Save if not exist */
                            if(!$check_exists){
                                $user_session = strtoupper(substr(hash('sha256', date_timestamp_get(date_create())),0,20));
                                $params = array(
                                    'user_branch_id' => 1,
                                    'user_user_group_id' => !empty($post['user_user_group_id']) ? intval($post['user_user_group_id']) : null,
                                    'user_username' => !empty($post['user_username']) ? strtolower($post['user_username']) : null,
                                    'user_fullname' => !empty($post['user_username']) ? strtolower($post['user_username']) : null,
                                    'user_phone_1' => !empty($post['user_phone_1']) ? intval($post['user_phone_1']) : null,
                                    'user_email_1' => !empty($post['user_email_1']) ? $post['user_email_1'] : null,
                                    'user_password' => !empty($post['user_password']) ? md5($post['user_password']) : md5(strtolower($post['user_username'])),
                                    'user_theme' => !empty($post['user_theme']) ? $post['user_theme'] : null,
                                    'user_date_created' => date("YmdHis"),
                                    'user_flag' => !empty($post['user_flag']) ? intval($post['user_flag']) : null,
                                    'user_activation' => 1,
                                    'user_date_activation' => date("YmdHis"),
                                    'user_session' => $user_session,
                                    'user_menu_style' => 0
                                );
                                $create = $this->User_model->add_user($params);
                                if($create){
                                    $get_user = $this->User_model->get_user($create);
                                    $return->status  = 1;
                                    $return->message = 'Berhasil menambahkan '.$user_name;
                                    $return->result= array(
                                        'user_id' => $create,
                                        'user_name' => $get_user['user_name'],
                                        'user_session' => $get_user['user_session']
                                    );
                                }else{
                                    $return->message = 'Gagal menambahkan '.$user_name;
                                }
                            }else{
                                $return->message = 'Data sudah ada';
                            }
                        }
                    }
                    break;
                case "read":
                    $this->form_validation->set_rules('user_id', 'user_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{                
                        $user_id   = !empty($post['user_id']) ? $post['user_id'] : 0;
                        if(intval(strlen($user_id)) > 0){        
                            $datas = $this->User_model->get_user($user_id);
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
                case "delete": die;
                    $this->form_validation->set_rules('user_id', 'user_id', 'required');
                    if ($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $user_id   = !empty($post['user_id']) ? $post['user_id'] : 0;
                        $user_name = !empty($post['user_name']) ? $post['user_name'] : null;

                        if(strlen($user_id) > 0){
                            $get_data=$this->User_model->get_user($user_id);
                            // $set_data=$this->User_model->delete_user($user_id);
                            $set_data = $this->User_model->update_user_custom(array('user_id'=>$user_id),array('user_flag'=>4));                
                            if($set_data){
                                /*
                                $file = FCPATH.$this->folder_upload.$get_data['user_image'];
                                if (file_exists($file)) {
                                    unlink($file);
                                }
                                */
                                $return->status=1;
                                $return->message='Berhasil menghapus '.$user_name;
                            }else{
                                $return->message='Gagal menghapus '.$user_name;
                            } 
                        }else{
                            $return->message='Data tidak ditemukan';
                        }
                    }
                    break;
                case "update_flag":
                    $this->form_validation->set_rules('user_id', 'user_id', 'required');
                    $this->form_validation->set_rules('user_flag', 'user_flag', 'required');
                    $this->form_validation->set_message('required', '{field} wajib diisi');
                    if($this->form_validation->run() == FALSE){
                        $return->message = validation_errors();
                    }else{
                        $user_id = !empty($post['user_id']) ? $post['user_id'] : 0;
                        if(intval($user_id) > 0){
                            
                            $params = array(
                                'user_flag' => !empty($post['user_flag']) ? intval($post['user_flag']) : 0,
                            );
                            
                            $where = array(
                                'user_id' => !empty($post['user_id']) ? intval($post['user_id']) : 0,
                            );
                            
                            if($post['user_flag']== 0){
                                $set_msg = 'nonaktifkan';
                            }else if($post['user_flag']== 1){
                                $set_msg = 'mengaktifkan';
                            }else if($post['user_flag']== 4){
                                $set_msg = 'menghapus';
                            }else{
                                $set_msg = 'mendapatkan data';
                            }

                            if($post['user_flag'] == 4){
                                $params['user_url'] = null;
                            }

                            $get_data = $this->User_model->get_user_custom($where);
                            if($get_data){
                                $set_update=$this->User_model->update_user_custom($where,$params);
                                if($set_update){
                                    $return->status  = 1;
                                    $return->message = 'Berhasil '.$set_msg.' '.$get_data['user_username'];
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

            $data['image_width'] = intval($this->image_width);
            $data['image_height'] = intval($this->image_height);
            
            $data['title'] = 'User';
            $data['_view'] = 'layouts/admin/menu/webpage/user';
            $this->load->view('layouts/admin/index',$data);
            $this->load->view('layouts/admin/menu/webpage/user_js.php',$data);
        }
    }     
}
