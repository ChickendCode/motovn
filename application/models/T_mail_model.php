<?php

 
class T_mail_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_mail by mailid
     */
    function get_t_mail($mailid)
    {
        return $this->db->get_where('t_mail',array('mailid'=>$mailid))->row_array();
    }
        
    /*
     * Get all t_mail
     */
    function get_all_t_mail()
    {
        $this->db->order_by('mailid', 'desc');
        return $this->db->get('t_mail')->result_array();
    }
        
    /*
     * function to add new t_mail
     */
    function add_t_mail($params)
    {
        $this->db->insert('t_mail',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_mail
     */
    function update_t_mail($mailid,$params)
    {
        $this->db->where('mailid',$mailid);
        return $this->db->update('t_mail',$params);
    }
    
    /*
     * function to delete t_mail
     */
    function delete_t_mail($mailid)
    {
        return $this->db->delete('t_mail',array('mailid'=>$mailid));
    }
}
