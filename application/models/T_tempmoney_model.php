<?php

 
class T_tempmoney_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_tempmoney by id
     */
    function get_t_tempmoney($id)
    {
        return $this->db->get_where('t_tempmoney',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all t_tempmoney
     */
    function get_all_t_tempmoney()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('t_tempmoney')->result_array();
    }
        
    /*
     * function to add new t_tempmoney
     */
    function add_t_tempmoney($params)
    {
        $this->db->insert('t_tempmoney',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_tempmoney
     */
    function update_t_tempmoney($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('t_tempmoney',$params);
    }
    
    /*
     * function to delete t_tempmoney
     */
    function delete_t_tempmoney($id)
    {
        return $this->db->delete('t_tempmoney',array('id'=>$id));
    }
}
