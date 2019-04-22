<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/10/2019
 * Time: 4:11 PM
 */

class Modproduct extends CI_Model
{
    public function addProduct($userdata)
    {
        return $this->db->insert('product',$userdata);

    }

    public function getAllRecords()
    {
        return $this->db->get('product');
    }

    public function checkProduct($id)
    {
        return $this->db->get_where('product',array('Product_Id'=>$id))
            ->result_array();

    }

    public function updateProduct($data,$userId)
    {
        $this->db->where('Product_Id',$userId);
        return $this->db->update('product',$data);

    }

    public function deleteProduct($Product_Id)
    {
        $this->db->where('Product_Id',$Product_Id);
        return $this->db->delete('product');

    }


}