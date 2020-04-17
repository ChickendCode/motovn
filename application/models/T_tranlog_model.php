<?php

 
class T_tranlog_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_tranlog by id
     */
    function get_t_tranlog($uid)
    {
        return $this->db->get_where('t_tranlog',array('uid'=>$uid))->result_array();
    }
        
    /*
     * Get all t_tranlog
     */
    function get_all_t_tranlog()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('t_tranlog')->result_array();
    }
        
    /*
     * function to add new t_tranlog
     */
    function add_t_tranlog($params)
    {
        $this->db->insert('t_tranlog',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_tranlog
     */
    function update_t_tranlog($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('t_tranlog',$params);
    }
    
    /*
     * function to delete t_tranlog
     */
    function delete_t_tranlog($id)
    {
        return $this->db->delete('t_tranlog',array('id'=>$id));
    }
}
