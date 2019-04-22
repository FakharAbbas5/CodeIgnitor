<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/5/2019
 * Time: 4:49 PM
 */

class Modcustomer extends CI_Model
{
    public function addCustomer($userdata)
    {
        return $this->db->insert('customer',$userdata);

    }

    public function getAllRecords()
    {
        return $this->db->get('customer');
    }

    public function checkCustomer($id)
    {
        return $this->db->get_where('customer',array('Customer_Id'=>$id))
            ->result_array();

    }

    public function updateCustomer($data,$userId)
    {
        $this->db->where('Customer_Id',$userId);
        return $this->db->update('customer',$data);

    }

    public function deleteCustomer($Customer_Id)
    {
        $this->db->where('Customer_Id',$Customer_Id);
        return $this->db->delete('customer');

    }

}