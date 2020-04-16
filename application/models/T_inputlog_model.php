<?php

 
class T_inputlog_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * function to add new t_inputlog
     */
    function add_t_inputlog($params, $db_server_other)
    {
       $db_server_other->insert('t_inputlog',$params);
        return$db_server_other->insert_id();
    }
}
