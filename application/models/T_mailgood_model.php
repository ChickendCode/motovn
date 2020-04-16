<?php

 
class T_mailgood_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_mailgood by Id
     */
    function get_t_mailgood($Id)
    {
        return $this->db->get_where('t_mailgoods',array('Id'=>$Id))->row_array();
    }
        
    /*
     * Get all t_mailgoods
     */
    function get_all_t_mailgoods()
    {
        $this->db->order_by('Id', 'desc');
        return $this->db->get('t_mailgoods')->result_array();
    }
        
    /*
     * function to add new t_mailgood
     */
    function add_t_mailgood($params)
    {
        $this->db->insert('t_mailgoods',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_mailgood
     */
    function update_t_mailgood($Id,$params)
    {
        $this->db->where('Id',$Id);
        return $this->db->update('t_mailgoods',$params);
    }
    
    /*
     * function to delete t_mailgood
     */
    function delete_t_mailgood($Id)
    {
        return $this->db->delete('t_mailgoods',array('Id'=>$Id));
    }
}
