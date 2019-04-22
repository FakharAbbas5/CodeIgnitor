<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/10/2019
 * Time: 12:37 AM
 */

class Modcomplaint extends CI_Model
{
    public function addComplaint($userdata)
    {
        return $this->db->insert('complaints',$userdata);

    }

    public function getAllRecords()
    {
        return $this->db->get('complaints');
    }

    public function checkComplaint($id)
    {
        return $this->db->get_where('complaints',array('Complaints_Id'=>$id))
            ->result_array();

    }

    public function updateComplaint($data,$userId)
    {
        $this->db->where('Complaints_Id',$userId);
        return $this->db->update('complaints',$data);

    }

    public function deleteComplaint($Complaints_Id)
    {
        $this->db->where('Complaints_Id',$Complaints_Id);
        return $this->db->delete('complaints');

    }


}
