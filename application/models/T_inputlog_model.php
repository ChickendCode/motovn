<?php

 
class T_inputlog_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_inputlog by Id
     */
    function get_t_inputlog($Id)
    {
        return $this->db->get_where('t_inputlog',array('Id'=>$Id))->row_array();
    }
        
    /*
     * Get all t_inputlog
     */
    function get_all_t_inputlog()
    {
        $this->db->order_by('Id', 'desc');
        return $this->db->get('t_inputlog')->result_array();
    }
        
    /*
     * function to add new t_inputlog
     */
    function add_t_inputlog($params)
    {
        $this->db->insert('t_inputlog',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_inputlog
     */
    function update_t_inputlog($Id,$params)
    {
        $this->db->where('Id',$Id);
        return $this->db->update('t_inputlog',$params);
    }
    
    /*
     * function to delete t_inputlog
     */
    function delete_t_inputlog($Id)
    {
        return $this->db->delete('t_inputlog',array('Id'=>$Id));
    }
}
