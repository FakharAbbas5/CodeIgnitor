<?php
header("Access-Control-Allow-Origin: *");
if (!defined('BASEPATH')) exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Salesmancrud extends REST_Controller
{
    public function __construct() {
        parent::__construct();

        //load user model
     //   $this->load->model('user');
    }
    /*
    public function index()
    {
        $this->load->view('salesman');
    }*/
    public function salesman_post()
    {/**
        $data['Salesman_Id']=$this->input->post('Salesman_Id',true);
        $data['Salesman_Name']=$this->input->post('Salesman_Name',true);
        $data['Email']=$this->input->post('Email',true);
        $data['Password']=$this->input->post('Password',true);
        $data['Salesman_Join_Date']=$this->input->post('Salesman_Join_Date',true);
        $data['Salesman_Last_Login']=$this->input->post('Salesman_Last_Login',true);
        $data['Picture']=$this->input->post('Picture',true);
        $data['Contact']=$this->input->post('Contact',true);

        if(empty($data['Salesman_Id']) || empty($data['Salesman_Name']) || empty($data['Email']) ||
            empty($data['Password']) || empty($data['Salesman_Join_Date']) || empty($data['Salesman_Last_Login'])
        || empty($data['Contact']))
        {
            $this->session->set_flashdata('message','Please check required fields.');
            redirect('salesmancrud','');

        }

        else
        {
            $myreturn=$this->modsalesman->addSalesman($data);
            if($myreturn)
            {
                $this->session->set_flashdata('message',' Success!');
                redirect('salesmancrud','');

            }
            else
            {
                $this->session->set_flashdata('message','Failed!!!.');
                redirect('salesmancrud','');
            }


        }
*/
        $userData = array();
        $userData['Salesman_Id'] = $this->post('Salesman_Id');
        $userData['Salesman_Name'] = $this->post('Salesman_Name');
        $userData['Email'] = $this->post('Email');
        $userData['Password'] = $this->post('Password');
        $userData['Salesman_Join_Date'] = $this->post('Salesman_Join_Date');
        $userData['Salesman_Last_Login'] = $this->post('Salesman_Last_Login');
        $userData['Picture'] = $this->post('Picture');
        $userData['Contact'] = $this->post('Contact');

        if(!empty($userData['Salesman_Id']) && !empty($userData['Salesman_Name']) && !empty($userData['Email'])
            && !empty($userData['Password']) && !empty($userData['Salesman_Join_Date'])&&
            !empty($userData['Salesman_Last_Login'])
            && !empty($userData['Picture'])&& !empty($userData['Contact'])){
            //insert user data
            $insert = $this->modsalemsan->addSalesman($userData);

            //check if the user data inserted
            if($insert){
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User has been added successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            //BAD_REQUEST (400) being the HTTP response code
            $this->response("Provide complete user information to create.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function salesman_get($id=0)
    {

        //$data['allSalesman']=$this->modsalesman->getAllRecords();
        //$this->load->view('allSalesman',$data);
        $users = $this->modsalesman->getRows($id);

        //check if the user data exists
        if(!empty($users)){
            //set the response and exit
            //OK (200) being the HTTP response code
            $this->response($users, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => FALSE,
                'message' => 'No user were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }

  /**  public function editSalesman($id=null)
    {

        $data['salesmanRecord']=$this->modsalesman->checkSalesman($id);
        if(count($data['salesmanRecord'])==1)
        {
            $this->load->view('editSalesman',$data);
        }
        else
        {
            $this->session->set_flashdata('message','Record does not exist.');
            redirect('salesmancrud/allSalesman','');

        }
    }

    public function updateSalesman()
    {

        $data['Salesman_Name']=$this->input->post('Salesman_Name',true);
        $data['Email']=$this->input->post('Email',true);
        $data['Contact']=$this->input->post('Contact',true);
        $data['Password']=$this->input->post('Password',true);
        $data['Salesman_Join_Date']=$this->input->post('Salesman_Join_Date',true);
        $data['Salesman_Last_Login']=$this->input->post('Salesman_Last_Login',true);
        $data['Picture']=$this->input->post('Picture',true);
        $userId=$this->input->post('userId',true);

        if(empty($data['Salesman_Name']) || empty($data['Email']) || empty($data['Password']) ||
            empty($data['Salesman_Join_Date']) || empty($data['Salesman_Join_Date'])
            || empty($data['Picture']) || empty($userId) || empty($data['Contact']))
        {
            $this->session->set_flashdata('message','Fill Required Fields!');
            redirect('salesmancrud/allSalesman/','');

        }
        else
        {
            $myreturn=$this->modsalesman->updateSalesman($data,$userId);
            if($myreturn)
            {
                $this->session->set_flashdata('message','Successfully Updated!');
                redirect('salesmancrud/allSalesman/');


            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('salesmancrud/allSalesman/');

            }


        }

    }*/
    public function salesman_put() {
        $userData = array();
        $id = $this->put('Salesman_Id');
        $userData['Salesman_Id'] = $this->post('Salesman_Id');
        $userData['Salesman_Name'] = $this->post('Salesman_Name');
        $userData['Email'] = $this->post('Email');
        $userData['Password'] = $this->post('Password');
        $userData['Salesman_Join_Date'] = $this->post('Salesman_Join_Date');
        $userData['Salesman_Last_Login'] = $this->post('Salesman_Last_Login');
        $userData['Picture'] = $this->post('Picture');
        $userData['Contact'] = $this->post('Contact');
        if(!empty($userData['Salesman_Id']) && !empty($userData['Salesman_Name']) && !empty($userData['Email'])
            && !empty($userData['Password']) && !empty($userData['Salesman_Join_Date'])&&
            !empty($userData['Salesman_Last_Login'])
            && !empty($userData['Picture'])&& !empty($userData['Contact'])){
            //update user data
            $update = $this->modsalesman->update($userData, $id);

            //check if the user data updated
            if($update){
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User has been updated successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            $this->response("Provide complete user information to update.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
   /* public function deleteSalesman($Salesman_Id=null)
    {
        if (empty($Salesman_Id))
        {
            $this->session->set_flashdata('message','Record can not be deleted');
            redirect('salesmancrud/allSalesman/');

        }
        else
        {
            $idexi=$this->modsalesman->checkSalesman($Salesman_Id);
            if (count($idexi)==1)
            {
                $myreturn=$this->modsalesman->deleteSalesman($Salesman_Id);
                if($myreturn)
                {
                    $this->session->set_flashdata('message','Successfully Deleted!');
                    redirect('salesmancrud/allSalesman/');
                }
                else
                {
                    $this->session->set_flashdata('message','Admin Record can not be deleted');
                    redirect('salesmancrud/allSalesman/');

                }

            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('salesmancrud/allSalesman/');

            }


        }
    }*/
    public function salesman_delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->modsalesman->delete($id);

            if($delete){
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User has been removed successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No user were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

}