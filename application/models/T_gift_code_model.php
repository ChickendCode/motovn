<?php

 
class T_gift_code_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_gift_code by id
     */
    function get_t_gift_code($id)
    {
        return $this->db->get_where('t_gift_code',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all t_gift_code
     */
    function get_all_t_gift_code()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('t_gift_code')->result_array();
    }
        
    /*
     * function to add new t_gift_code
     */
    function add_t_gift_code($params)
    {
        $this->db->insert('t_gift_code',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_gift_code
     */
    function update_t_gift_code($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('t_gift_code',$params);
    }
    
    /*
     * function to delete t_gift_code
     */
    function delete_t_gift_code($id)
    {
        return $this->db->delete('t_gift_code',array('id'=>$id));
    }
}
