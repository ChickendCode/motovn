<?php

 
class T_log_gifcode_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_log_gifcode by id
     */
    function get_t_log_gifcode($id)
    {
        return $this->db->get_where('t_log_gifcode',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all t_log_gifcode
     */
    function get_all_t_log_gifcode()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('t_log_gifcode')->result_array();
    }
        
    /*
     * function to add new t_log_gifcode
     */
    function add_t_log_gifcode($params)
    {
        $this->db->insert('t_log_gifcode',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_log_gifcode
     */
    function update_t_log_gifcode($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('t_log_gifcode',$params);
    }
    
    /*
     * function to delete t_log_gifcode
     */
    function delete_t_log_gifcode($id)
    {
        return $this->db->delete('t_log_gifcode',array('id'=>$id));
    }
}
