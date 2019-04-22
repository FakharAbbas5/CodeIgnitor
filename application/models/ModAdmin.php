<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/5/2019
 * Time: 1:35 AM
 */

class ModAdmin extends CI_Model
{
    public function addAdmin($userdata)
    {
        return $this->db->insert('admin',$userdata);

    }

    public function checkEmail($userdata)
    {
        return $this->db->get_where('admin',array('Admin_Email'=>$userdata['Admin_Email']));
    }

    public function getAllRecords()
    {
        return $this->db->get('admin');
    }

    public function checkAdmin($id)
    {
        return $this->db->get_where('admin',array('Admin_Id'=>$id))
            ->result_array();
        
    }

    public function updateAdmin($data,$userId)
    {
        $this->db->where('Admin_Id',$userId);
        return $this->db->update('admin',$data);
        
    }

    public function deleteAdmin($Admin_Id)
    {
        $this->db->where('Admin_Id',$Admin_Id);
        return $this->db->delete('admin');
        
    }

    public function checkLogin($data)
    {
        return $this->db->get_where('admin',$data)
        ->result_array();

    }

}