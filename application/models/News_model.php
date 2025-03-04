<?php
/*
    @AUTHOR: Joe Witaya
*/ 
class News_model extends CI_Model{
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

    function set_join() {
        $this->db->join('categories', 'news_category_id=category_id','left');
        $this->db->join('users', 'news_user_id=user_id','left');
        $this->db->join('(SELECT * FROM files WHERE file_from_table="news" GROUP BY file_from_id ORDER BY file_id ASC) AS f','news_id=f.file_from_id','left');           
    }

    function set_select(){
    	$this->db->select('news.*, categories.*, IFNULL(news_image,0) AS news_images');
    }

    function get_all_newss($params = null, $search = null, $limit = null, $start = null, $order = null, $dir = null) {
        $this->db->select("news.*, categories.*, users.*, f.*");
        $this->set_params($params);
        $this->set_search($search);
        $this->set_join();

        if ($order) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('news_title', "asc");
        }

        if ($limit) {
            $this->db->limit($limit, $start);
        }
        
        return $this->db->get('news')->result_array();
    }
    function get_all_newss_count($params,$search){
        $this->db->from('news');   
        $this->set_join();
        $this->set_params($params);            
        $this->set_search($search);
        return $this->db->count_all_results();
    }
        
    function get_all_newss_files($params = null, $search = null, $limit = null, $start = null, $order = null, $dir = null) {
        $this->db->select("news.*, categories.*, users.*, f.*");
        $this->set_params($params);
        $this->set_search($search);
        $this->db->join('categories', 'news_category_id=category_id','left');
        $this->db->join('users', 'news_user_id=user_id','left');
        $this->db->join('files AS f','news_id=f.file_from_id AND f.file_from_table="news"','left'); 

        if ($order) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('news_title', "asc");
        }

        if ($limit) {
            $this->db->limit($limit, $start);
        }
        
        return $this->db->get('news')->result_array();
    }
    function get_all_newss_files_count($params,$search){
        $this->db->from('news');   
        $this->db->join('categories', 'news_category_id=category_id','left');
        $this->db->join('users', 'news_user_id=user_id','left');
        $this->db->join('files AS f','news_id=f.file_from_id','left'); 
        $this->set_params($params);            
        $this->set_search($search);
        return $this->db->count_all_results();
    }

    /* 
        ================
        CRUD 
        ================
    */        
    
    /* function to add new news */
    function add_news($params){
        $this->db->insert('news',$params);
        return $this->db->insert_id();
    }
    
    /* function to get news by id */
    function get_news($id){
        $this->set_select();
    	$this->set_join();
        return $this->db->get_where('news',array('news_id'=>$id))->row_array();
    }
    function get_news_custom($where){
        $this->set_select();
    	$this->set_join();
        return $this->db->get_where('news',$where)->row_array();
    }    
    function get_news_custom_result($where){
        $this->set_select();
    	$this->set_join();
        return $this->db->get_where('news',$where)->result_array();
    }        

    /* function to update news */
    function update_news($id,$params){
        $this->db->where('news_id',$id);
        return $this->db->update('news',$params);
    }
    function update_news_custom($where,$params){
        $this->db->where($where);
        return $this->db->update('news',$params);
    }    
    
    /* function to delete news */
    function delete_news($id){
        return $this->db->delete('news',array('news_id'=>$id));
    }
    function delete_news_custom($where){
        return $this->db->delete('news',$where);
    }    

    /* 
        ================
        CRUD CATEGORIES
        ================
    */        
    
    /* function to add new news_categories */
    function add_news_categories($params){
        $this->db->insert('categories',$params);
        return $this->db->insert_id();
    }
    
    /* function to get news_categories by id */
    function get_news_categories($id){
        return $this->db->get_where('categories',array('category_id'=>$id))->row_array();
    }

    /* function to update news_categories */
    function update_news_categories($id,$params){
        $this->db->where('category_id',$id);
        return $this->db->update('categories',$params);
    }
    
    /* function to delete news_categories */
    function delete_news_categories($id){
        return $this->db->delete('categories',array('category_id'=>$id));
    }

    function get_all_news_categories(){
        $this->db->order_by('category_name', 'asc');
        return $this->db->get('categories')->result_array();
    }

    /* function to count news_categories */    
    function get_all_newss_categories_count($params){
        $this->db->from('categories');   
        $this->set_params($params);            
        return $this->db->count_all_results();
    }

    // OTHER
    function check_data_exist($params){
        $this->db->where($params);
        $query = $this->db->get('news');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
    function check_data_exist_two_condition($where_not_in,$where_exist){
        if ($where_not_in) {
            foreach ($where_not_in as $k => $v) {
                $this->db->where($k.' !=', $v);
            }
        }
        if ($where_exist) {
            $n = 0;
            $this->db->group_start();
            foreach ($where_exist as $key => $val) {
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
        $query = $this->db->get('news');
        if ($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    function get_news_by_url($params){
        return $this->db->get_where('news',$params)->row_array();
    }   
    function get_news_categories_by_params($params){
        return $this->db->get_where('categories',$params)->row_array();
    }  
}
?>