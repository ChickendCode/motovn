<?php

 
class T_tempmoney_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
        
    /*
     * function to add new t_tempmoney
     */
    function add_t_tempmoney($params,  $db_server_other)
    {
         $db_server_other->insert('t_tempmoney',$params);
        return  $db_server_other->insert_id();
    }
}
