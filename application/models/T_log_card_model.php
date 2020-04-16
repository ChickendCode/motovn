<?php

 
class T_log_card_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get t_log_card by card_id
     */
    function get_t_log_card($card_id)
    {
        return $this->db->get_where('t_log_card',array('card_id'=>$card_id))->row_array();
    }
        
    /*
     * Get all t_log_card
     */
    function get_all_t_log_card()
    {
        $this->db->order_by('card_id', 'desc');
        return $this->db->get('t_log_card')->result_array();
    }
        
    /*
     * function to add new t_log_card
     */
    function add_t_log_card($params)
    {
        $this->db->insert('t_log_card',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update t_log_card
     */
    function update_t_log_card($card_id,$params)
    {
        $this->db->where('card_id',$card_id);
        return $this->db->update('t_log_card',$params);
    }
    
    /*
     * function to delete t_log_card
     */
    function delete_t_log_card($card_id)
    {
        return $this->db->delete('t_log_card',array('card_id'=>$card_id));
    }
}
