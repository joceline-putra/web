<?php 
/* 
    @Author: Yoceline Witaya 
*/ 
class Card_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function set_params($params){
        if ($params) {
            foreach ($params as $k => $v) {
                $this->db->where($k, $v);
            }
        }
    }

    function set_search($search){
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

    function set_join(){
        $this->db->join('contacts','contact_card_session=card_session','left');
    }

    function set_select(){
        $this->db->select("cards.*");
        $this->db->select("contact_id, contact_session, contact_code, contact_name, contact_phone_1, contact_email_1, contact_flag, contact_card_session");        
    }

    function get_all_card($params = null, $search = null, $limit = null, $start = null, $order = null, $dir = null) {
        $this->set_select();
        $this->set_params($params);
        $this->set_search($search);
        $this->set_join();

        if ($order) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('card_id', "asc");
        }

        if ($limit) {
            $this->db->limit($limit, $start);
        }
        
        return $this->db->get('cards')->result_array();
    }  
    function get_all_card_count($params,$search){
        $this->db->from('cards');
        $this->set_params($params);
        $this->set_search($search);
        return $this->db->count_all_results();
    } 

    /* 
        ================
        CRUD Card
        ================
    */        
    
    /* function to add new card */
    function add_card($params){
        $this->db->insert('cards',$params);
        return $this->db->insert_id();
    }
    
    /* function to get card by id */
    function get_card($id){
        $this->set_select();
        $this->set_join();
        return $this->db->get_where('cards',array('card_id'=>$id))->row_array();
    }
    function get_card_custom($where){
        $this->set_select();
        $this->set_join();
        return $this->db->get_where('cards',$where)->row_array();
    }
    function get_card_custom_result($where){
        $this->set_select();
        $this->set_join();
        return $this->db->get_where('cards',$where)->result_array();
    }

    /* function to update card */
    function update_card($id,$params){
        $this->db->where('card_id',$id);
        return $this->db->update('cards',$params);
    }
    function update_card_custom($where,$params){
        $this->db->where($where);
        return $this->db->update('cards',$params);
    }

    /* function to delete card */
    function delete_card($id){
        return $this->db->delete('cards',array('card_id'=>$id));
    }
    function delete_card_custom($where){
        return $this->db->delete('cards',$where);
    }

    /* function to check data exists card */
    function check_data_exist($params){
        $this->db->where($params);
        $query = $this->db->get('cards');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
    /* function to check data exists card of two condition */
    function check_data_exist_two_condition($where_not_in,$where_exist){
        if ($where_not_in) {
            foreach ($where_not_in as $k => $v) {
                $this->db->where($k.' !=', $v);
            }
        }
        if ($where_exist) {
            $n = 0;
            $this->db->group_start();
            foreach($where_exist as $key => $val) {
                if ($n == 0) {
                    $this->db->where($key, $val);
                } else {
                    $this->db->where($key, $val);
                }
                $n++;
            }
            $this->db->group_end();
        }
        $this->db->limit(1,0);
        $query = $this->db->get('cards');
        if ($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

}
?>