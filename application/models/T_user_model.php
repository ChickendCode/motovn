<?php

 
class T_user_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_user by userid
     */
    function get_t_user($username)
    {
        return $this->db->get_where('t_users',array('username'=>$username))->row_array();
    }

    /*
     * Get t_user by userid
     */
    function get_t_user_by_pwd($userpwd)
    {
        return $this->db->get_where('t_users', array('userpwd'=>$userpwd))->row_array();
    }
        
    /*
     * Get all t_users
     */
    function get_all_t_users()
    {
        $this->db->order_by('userid', 'desc');
        return $this->db->get('t_users')->result_array();
    }
        
    /*
     * function to add new t_user
     */
    function add_t_user($params)
    {
        $this->db->insert('t_users',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_user
     */
    function update_t_user($userid,$params)
    {
        $this->db->where('userid',$userid);
        return $this->db->update('t_users',$params);
    }
    
    /*
     * function to delete t_user
     */
    function delete_t_user($userid)
    {
        return $this->db->delete('t_users',array('userid'=>$userid));
    }
}
