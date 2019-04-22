<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/20/2019
 * Time: 2:46 PM
 */

class User_model extends CI_Model
{
    public function insert_user($user_data)
    {
        //return $this->insert_data($user_data);
        return $this->db->insert('admin',$user_data);
        
    }

    public function fetch_all_users()
    {
        $this->db->select('*')
            ->get('admin');
        return $this->db->result();
    }

}