<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/10/2019
 * Time: 3:19 PM
 */

class Modproductc extends CI_Model
{
    public function addProductc($userdata)
    {
        return $this->db->insert('productcategory',$userdata);

    }

    public function getAllRecords()
    {
        return $this->db->get('productcategory');
    }

    public function checkProductc($id)
    {
        return $this->db->get_where('productcategory',array('Product_Category_Id'=>$id))
            ->result_array();

    }

    public function updateProductc($data,$userId)
    {
        $this->db->where('Product_Category_Id',$userId);
        return $this->db->update('productcategory',$data);

    }

    public function deleteProductc($Product_Category_Id)
    {
        $this->db->where('Product_Category_Id',$Product_Category_Id);
        return $this->db->delete('productcategory');

    }

}
