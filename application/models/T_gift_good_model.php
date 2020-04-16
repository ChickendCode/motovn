<?php

 
class T_gift_good_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_gift_good by id
     */
    function get_t_gift_good($id)
    {
        return $this->db->get_where('t_gift_goods',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all t_gift_goods
     */
    function get_all_t_gift_goods()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('t_gift_goods')->result_array();
    }
        
    /*
     * function to add new t_gift_good
     */
    function add_t_gift_good($params)
    {
        $this->db->insert('t_gift_goods',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_gift_good
     */
    function update_t_gift_good($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('t_gift_goods',$params);
    }
    
    /*
     * function to delete t_gift_good
     */
    function delete_t_gift_good($id)
    {
        return $this->db->delete('t_gift_goods',array('id'=>$id));
    }
}
