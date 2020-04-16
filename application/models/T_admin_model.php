<?php

 
class T_admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_admin by id
     */
    function get_t_admin($id)
    {
        return $this->db->get_where('t_admin',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all t_admin
     */
    function get_all_t_admin()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('t_admin')->result_array();
    }
        
    /*
     * function to add new t_admin
     */
    function add_t_admin($params)
    {
        $this->db->insert('t_admin',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_admin
     */
    function update_t_admin($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('t_admin',$params);
    }
    
    /*
     * function to delete t_admin
     */
    function delete_t_admin($id)
    {
        return $this->db->delete('t_admin',array('id'=>$id));
    }
}
