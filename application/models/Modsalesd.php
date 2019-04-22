<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/15/2019
 * Time: 4:20 AM
 */

class Modsalesd extends CI_Model
{
    public function addSales($userdata)
    {
        return $this->db->insert('salesdetail',$userdata);

    }

    public function getAllRecords()
    {
        return $this->db->get('salesdetail');
    }

    public function checkSales($id)
    {
        return $this->db->get_where('salesdetail',array('Sales_Id'=>$id))
            ->result_array();

    }

    public function updateSales($data,$userId)
    {
        $this->db->where('Sales_Id',$userId);
        return $this->db->update('salesdetail',$data);

    }

    public function deleteSales($Sales_Id)
    {
        $this->db->where('Sales_Id',$Sales_Id);
        return $this->db->delete('salesdetail');

    }

}