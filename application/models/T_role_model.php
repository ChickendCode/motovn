<?php

 
class T_role_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_role by userid
     */
    function get_t_role($userid, $db_server_other)
    {
        return $db_server_other->get_where('t_roles',array('userid'=>$userid, 'isdel'=>0))->result_array();
    }
        
    /*
     * Get all t_roles
     */
    function get_all_t_roles()
    {
        $this->db->order_by('rid', 'desc');
        return $this->db->get('t_roles')->result_array();
    }
        
    /*
     * function to add new t_role
     */
    function add_t_role($params)
    {
        $this->db->insert('t_roles',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_role
     */
    function update_t_role($rid,$params)
    {
        $this->db->where('rid',$rid);
        return $this->db->update('t_roles',$params);
    }
    
    /*
     * function to delete t_role
     */
    function delete_t_role($rid)
    {
        return $this->db->delete('t_roles',array('rid'=>$rid));
    }
}
