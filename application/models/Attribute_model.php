<?php 
/* 
    @Author: Yoceline Witaya 
*/ 
class Attribute_model extends CI_Model{
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
        /* $this->db->join('','','left'); */
    }

    function set_join_option(){
        $this->db->join('attributes','opt_attr_session=attr_session','left');
    }

    function set_join_product(){
        $this->db->join('products','pa_product_session=product_session','left');
        $this->db->join('attributes','pa_attribute_session=attr_session','left');            
    }
    
    function set_join_category(){
        $this->db->join('categories','ca_category_session=category_session','left');            
        $this->db->join('attributes','ca_attribute_session=attr_session','left');            
    }

    function set_select(){
        $this->db->select("*");
    }

    function set_select_option(){
        $this->db->select("*");
    }

    function set_select_product(){
        $this->db->select("attr_session, attr_name, pa_value")
            ->select("product_session, product_name, product_code, product_unit, product_price_sell");
    }    

    function set_select_category(){
        $this->db->select("attr_session, attr_name")
            ->select("category_session, category_name, category_type")
            ->select("ca_category_session, ca_attribute_session");
    }        

    function get_all_attribute($params = null, $search = null, $limit = null, $start = null, $order = null, $dir = null) {
        $this->set_select();
        $this->set_params($params);
        $this->set_search($search);
        $this->set_join();

        if ($order) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('attr_id', "asc");
        }

        if ($limit) {
            $this->db->limit($limit, $start);
        }
        
        return $this->db->get('attributes')->result_array();
    }  
    function get_all_attribute_count($params,$search){
        $this->db->from('attributes');
        $this->set_params($params);
        $this->set_search($search);
        return $this->db->count_all_results();
    }
        function get_all_attribute_option($params = null, $search = null, $limit = null, $start = null, $order = null, $dir = null) {
            $this->set_select_option();
            $this->set_params($params);
            $this->set_search($search);
            $this->set_join_option();

            if ($order) {
                $this->db->order_by($order, $dir);
            } else {
                $this->db->order_by('opt_id', "asc");
            }

            if ($limit) {
                $this->db->limit($limit, $start);
            }
            
            return $this->db->get('attributes_options')->result_array();
        }  
        function get_all_attribute_option_count($params,$search){
            $this->db->from('attributes_options');
            $this->set_params($params);
            $this->set_search($search);
            return $this->db->count_all_results();
        } 
        
        function get_all_product($params = null, $search = null, $limit = null, $start = null, $order = null, $dir = null) {
            $this->set_select_product();
            $this->set_params($params);
            $this->set_search($search);
            $this->set_join_product();

            if ($order) {
                $this->db->order_by($order, $dir);
            } else {
                $this->db->order_by('pa_id', "asc");
            }

            if ($limit) {
                $this->db->limit($limit, $start);
            }
            
            return $this->db->get('products_attributes')->result_array();
        }  
        function get_all_product_count($params,$search){
            $this->db->from('products_attributes');
            $this->set_params($params);
            $this->set_search($search);
            return $this->db->count_all_results();
        }  
        
        function get_all_category($params = null, $search = null, $limit = null, $start = null, $order = null, $dir = null) {
            $this->set_select_category();
            $this->set_params($params);
            $this->set_search($search);
            $this->set_join_category();

            if ($order) {
                $this->db->order_by($order, $dir);
            } else {
                $this->db->order_by('ca_id', "asc");
            }

            if ($limit) {
                $this->db->limit($limit, $start);
            }
            
            return $this->db->get('categories_attributes')->result_array();
        }  
        function get_all_category_count($params,$search){
            $this->db->from('categories_attributes');
            $this->set_params($params);
            $this->set_search($search);
            return $this->db->count_all_results();
        }          

        function get_all_product_attr($params = null, $search = null, $limit = null, $start = null, $order = null, $dir = null) {
            $outer_join = '(
                SELECT pa_attribute_session, pa_value, pa_id FROM 
                products_attributes WHERE pa_product_session="'.$search.'"
            ) AS pa';

            $this->db->select("categories_attributes.*, attr_name, attr_session, pa.pa_id, pa.pa_value");
            $this->db->join('attributes','ca_attribute_session=attr_session','left'); 
            $this->db->join($outer_join,'attr_session=pa_attribute_session','left');
            
            $this->set_params($params);

            if ($order) {
                $this->db->order_by($order, $dir);
            } else {
                $this->db->order_by('attr_name', "asc");
            }

            if ($limit) {
                $this->db->limit($limit, $start);
            }
            
            return $this->db->get('categories_attributes')->result_array();
        }  
        function get_all_product_attr_count($params,$search){
            $this->db->from('categories_attributes');
            $this->set_params($params);
            return $this->db->count_all_results();
        }          
    /* 
        ================
        CRUD Attribute
        ================
    */        
    
    /* function to add new attribute */
    function add_attribute($params){
        $this->db->insert('attributes',$params);
        return $this->db->insert_id();
    }
    
    /* function to get attribute by id */
    function get_attribute_custom($where){
        $this->set_select();
        $this->set_join();
        return $this->db->get_where('attributes',$where)->row_array();
    }
    function get_attribute_custom_result($where){
        $this->set_select();
        $this->set_join();
        return $this->db->get_where('attributes',$where)->result_array();
    }

    /* function to update attribute */
    function update_attribute_custom($where,$params){
        $this->db->where($where);
        return $this->db->update('attributes',$params);
    }

    /* function to delete attribute */
    function delete_attribute_custom($where){
        return $this->db->delete('attributes',$where);
    }

    /* function to check data exists attribute */
    function check_data_exist($params){
        $this->db->where($params);
        $query = $this->db->get('attributes');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
    /* function to check data exists attribute of two condition */
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
        $query = $this->db->get('attributes');
        if ($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    /* 
        ================
        CRUD Option / Product / Categories
        ================
    */
    
        /* function to add new attribute items */
        function add_attribute_option($params){
            $this->db->insert('attributes_options',$params);
            return $this->db->insert_id();
        }
            function add_product($params){
                $this->db->insert('products_attributes',$params);
                return $this->db->insert_id();
            }    
            function add_category($params){
                $this->db->insert('categories_attributes',$params);
                return $this->db->insert_id();
            }                
        
        /* function to get attribute items by id */
        function get_attribute_option_custom($where){
            $this->set_select_option();
            $this->set_join_option();
            return $this->db->get_where('attributes_options',$where)->row_array();
        }
            function get_product_custom($where){
                $this->set_select_product();
                $this->set_join_product();
                return $this->db->get_where('products_attributes',$where)->row_array();
            }
            function get_category_custom($where){
                $this->set_select_option();
                $this->set_join_option();
                return $this->db->get_where('categories_attributes',$where)->row_array();
            }                
        function get_attribute_option_custom_result($where){
            $this->set_select_option();
            $this->set_join_option();
            return $this->db->get_where('attributes_options',$where)->result_array();
        }
            function get_product_custom_result($where){
                $this->set_select_product();
                $this->set_join_product();
                return $this->db->get_where('products_attributes',$where)->result_array();
            }
            function get_category_custom_result($where){
                $this->set_select_category();
                $this->set_join_category();
                return $this->db->get_where('categories_attributes',$where)->result_array();
            }                

        /* function to update attribute items */
        function update_attribute_option_custom($where,$params){
            $this->db->where($where);
            return $this->db->update('attribute_options',$params);
        }    
            function update_product_custom($where,$params){
                $this->db->where($where);
                return $this->db->update('products_attributes',$params);
            }    
            function update_category_custom($where,$params){
                $this->db->where($where);
                return $this->db->update('categories_attributes',$params);
            }                        
        
        /* function to delete attribute items */
        function delete_attribute_option_custom($where){
            return $this->db->delete('attributes_options',$where);
        }
            function delete_product_custom($where){
                return $this->db->delete('products_attributes',$where);
            }        
            function delete_category_custom($where){
                return $this->db->delete('categories_attributes',$where);
            }

        /* function to check data exists attribute_options */
        function check_data_exist_options($params){
            $this->db->where($params);
            $query = $this->db->get('attributes_options');
            if ($query->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }
            function check_data_exist_product($params){
                $this->db->where($params);
                $query = $this->db->get('products_attributes');
                if ($query->num_rows() > 0){
                    return true;
                }
                else{
                    return false;
                }
            }
            function check_data_exist_category($params){
                $this->db->where($params);
                $query = $this->db->get('categories_attributes');
                if ($query->num_rows() > 0){
                    return true;
                }
                else{
                    return false;
                }
            }                    
        /* function to check data exists attribute of two condition */
        function check_data_exist_options_two_condition($where_not_in,$where_exist){
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
            $query = $this->db->get('attributes_options');
            if ($query->num_rows() > 0){
                return true;
            }else{
                return false;
            }
        }
            function check_data_exist_product_two_condition($where_not_in,$where_exist){
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
                $query = $this->db->get('products_attributes');
                if ($query->num_rows() > 0){
                    return true;
                }else{
                    return false;
                }
            }  
            function check_data_exist_category_two_condition($where_not_in,$where_exist){
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
                $query = $this->db->get('categories_attributes');
                if ($query->num_rows() > 0){
                    return true;
                }else{
                    return false;
                }
            }                    
}
?>