<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/15/2019
 * Time: 3:10 AM
 */

class Modorderd extends CI_Model
{
    public function addOrder($userdata)
    {
        return $this->db->insert('order',$userdata);

    }

    public function getAllRecords()
    {
        return $this->db->get('order');
    }

    public function checkOrder($id)
    {
        return $this->db->get_where('order',array('Order_Id'=>$id))
            ->result_array();

    }

    public function updateOrder($data,$userId)
    {
        $this->db->where('Order_Id',$userId);
        return $this->db->update('order',$data);

    }

    public function deleteOrder($Order_Id)
    {
        $this->db->where('Order_Id',$Order_Id);
        return $this->db->delete('order');

    }

}