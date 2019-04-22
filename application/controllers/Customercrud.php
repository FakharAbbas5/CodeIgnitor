<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/5/2019
 * Time: 4:40 PM
 */

class Customercrud extends CI_Controller
{
    public function index()
    {
        $this->load->view('customer');
    }
    public function addCustomer()
    {
        $data['Customer_Id']=$this->input->post('Customer_Id',true);
        $data['Customer_Name']=$this->input->post('Customer_Name',true);
        $data['Email']=$this->input->post('Email',true);
        $data['Password']=$this->input->post('Password',true);
        $data['Customer_Join_Date']=$this->input->post('Customer_Join_Date',true);
        $data['Picture']=$this->input->post('Picture',true);
        $data['Contact']=$this->input->post('Contact',true);

        if(empty($data['Customer_Id']) || empty($data['Customer_Name']) || empty($data['Email']) ||
            empty($data['Password']) || empty($data['Customer_Join_Date'])
            || empty($data['Contact']))
        {
            $this->session->set_flashdata('message','Please check required fields.');
            redirect('customercrud','');

        }

        else
        {
            $myreturn=$this->modcustomer->addCustomer($data);
            if($myreturn)
            {
                $this->session->set_flashdata('message',' Success!');
                redirect('customercrud','');


            }
            else
            {
                $this->session->set_flashdata('message','Failed!!!.');
                redirect('customercrud','');
            }


        }

    }

    public function allCustomer()
    {
        $data['allCustomer']=$this->modcustomer->getAllRecords();
        $this->load->view('allCustomer',$data);

    }

    public function editCustomer($id=null)
    {

        $data['customerRecord']=$this->modcustomer->checkCustomer($id);
        if(count($data['customerRecord'])==1)
        {
            $this->load->view('editCustomer',$data);
        }
        else
        {
            $this->session->set_flashdata('message','Record does not exist.');
            redirect('customercrud/allCustomer','');

        }
    }

    public function updateCustomer()
    {

        $data['Customer_Name']=$this->input->post('Customer_Name',true);
        $data['Email']=$this->input->post('Email',true);
        $data['Contact']=$this->input->post('Contact',true);
        $data['Password']=$this->input->post('Password',true);
        $data['Customer_Join_Date']=$this->input->post('Customer_Join_Date',true);
        $data['Picture']=$this->input->post('Picture',true);
        $userId=$this->input->post('userId',true);

        if(empty($data['Customer_Name']) || empty($data['Email']) || empty($data['Password']) ||
            empty($data['Customer_Join_Date']) || empty($userId) || empty($data['Contact']))
        {
            $this->session->set_flashdata('message','Fill Required Fields!');
            redirect('customercrud/allCustomer/','');

        }
        else
        {
            $myreturn=$this->modcustomer->updateCustomer($data,$userId);
            if($myreturn)
            {
                $this->session->set_flashdata('message','Successfully Updated!');
                redirect('customercrud/allCustomer/');


            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('customercrud/allCustomer/');

            }


        }

    }

    public function deleteCustomer($Customer_Id=null)
    {
        if (empty($Customer_Id))
        {
            $this->session->set_flashdata('message','Record can not be deleted');
            redirect('customercrud/allCustomer/');

        }
        else
        {
            $idexi=$this->modcustomer->checkCustomer($Customer_Id);
            if (count($idexi)==1)
            {
                $myreturn=$this->modcustomer->deleteCustomer($Customer_Id);
                if($myreturn)
                {
                    $this->session->set_flashdata('message','Successfully Deleted!');
                    redirect('customercrud/allCustomer/');
                }
                else
                {
                    $this->session->set_flashdata('message','Admin Record can not be deleted');
                    redirect('customercrud/allCustomer/');

                }

            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('customercrud/allCustomer/');

            }


        }
    }


}