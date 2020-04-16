<?php
 
class T_serverdata_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_serverdatum by Id
     */
    function get_t_serverdatum($Id)
    {
        return $this->db->get_where('t_serverdata',array('Id'=>$Id))->row_array();
    }
        
    /*
     * Get all t_serverdata
     */
    function get_all_t_serverdata()
    {
        $this->db->order_by('Id', 'desc');
        return $this->db->get('t_serverdata')->result_array();
    }
        
    /*
     * function to add new t_serverdatum
     */
    function add_t_serverdatum($params)
    {
        $this->db->insert('t_serverdata',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_serverdatum
     */
    function update_t_serverdatum($Id,$params)
    {
        $this->db->where('Id',$Id);
        return $this->db->update('t_serverdata',$params);
    }
    
    /*
     * function to delete t_serverdatum
     */
    function delete_t_serverdatum($Id)
    {
        return $this->db->delete('t_serverdata',array('Id'=>$Id));
    }
}
