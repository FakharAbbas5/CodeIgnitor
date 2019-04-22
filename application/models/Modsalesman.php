<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modsalesman extends CI_Model
{
    public function __construct() {
        parent::__construct();

        //load database library
     //   $this->load->database();
    }
    public function addSalesman($userdata)
    {
        return $this->db->insert('salesman',$userdata);

    }

/**    public function getAllRecords()
    {
        return $this->db->get('salesman');
    }

    public function checkSalesman($id)
    {
        return $this->db->get_where('salesman',array('Salesman_Id'=>$id))
            ->result_array();

    }
*/
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('salesman', array('Salesman_Id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('salesman');
            return $query->result_array();
        }
    }
   /** public function updateSalesman($data,$userId)
    {
        $this->db->where('Salesman_Id',$userId);
        return $this->db->update('salesman',$data);

    }*/
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            if(!array_key_exists('Salesman_Last_Login', $data)){
                $data['Salesman_Last_Login'] = date("Y-m-d H:i:s");
            }
            $update = $this->db->update('salesman', $data, array('Salesman_Id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }


  /*  public function deleteSalesman($Salesman_Id)
    {
        $this->db->where('Salesman_Id',$Salesman_Id);
        return $this->db->delete('salesman');

    }*/
    public function delete($id){
        $delete = $this->db->delete('salesman',array('Salesman_Id'=>$id));
        return $delete?true:false;
    }


}
?>