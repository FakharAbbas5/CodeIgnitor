<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/15/2019
 * Time: 3:05 AM
 */

class Orderdcrud extends CI_Controller
{
    public function index()
    {
        $this->load->view('orderd');
    }
    public function addOrder()
    {
        $data['Order_Id']=$this->input->post('Order_Id',true);
        $data['Customer_Name']=$this->input->post('Customer_Name',true);
        $data['Order_Total_Amount']=$this->input->post('Order_Total_Amount',true);
        $data['Order_Date']=$this->input->post('Order_Date',true);
        $data['Order_Description']=$this->input->post('Order_Description',true);

        if(empty($data['Order_Id']) || empty($data['Customer_Name']) || empty($data['Order_Total_Amount'])
            || empty($data['Order_Date'])|| empty($data['Order_Description']) )
        {
            $this->session->set_flashdata('message','Please check required fields.');
            redirect('orderdcrud','');

        }

        else
        {
            $myreturn=$this->modorderd->addOrder($data);
            if($myreturn)
            {
                $this->session->set_flashdata('message',' Success!');
                redirect('orderdcrud','');


            }
            else
            {
                $this->session->set_flashdata('message','Failed!!!.');
                redirect('orderdcrud','');


            }


        }

    }

    public function allOrder()
    {
        $data['allOrder']=$this->modorderd->getAllRecords();
        $this->load->view('allOrderd',$data);

    }

    public function editOrder($id=null)
    {

        $data['orderRecord']=$this->modorderd->checkOrder($id);
        if(count($data['orderRecord'])==1)
        {
            $this->load->view('editOrderd',$data);
        }
        else
        {
            $this->session->set_flashdata('message','Record does not exist.');
            redirect('orderdcrud/allOrder','');

        }
    }

    public function updateOrder()
    {

        $data['Customer_Name']=$this->input->post('Customer_Name',true);
        $data['Order_Total_Amount']=$this->input->post('Order_Total_Amount',true);
        $data['Order_Date']=$this->input->post('Order_Date',true);
        $data['Description']=$this->input->post('Description',true);
        $userId=$this->input->post('userId',true);

        if(empty($data['Customer_Name']) || empty($data['Order_Total_Amount']) || empty($data['Order_Date'])
            || empty($data['Description'])|| empty($userId))
        {
            $this->session->set_flashdata('message','Fill Required Fields!');
            redirect('orderdcrud/allOrder/','');

        }
        else
        {
            $myreturn=$this->modorderd->updateOrder($data,$userId);
            if($myreturn)
            {
                $this->session->set_flashdata('message','Successfully Updated!');
                redirect('orderdcrud/allOrder/');


            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('orderdcrud/allOrder/');

            }


        }

    }

    public function deleteOrder($Order_Id=null)
    {
        if (empty($Order_Id))
        {
            $this->session->set_flashdata('message','Record can not be deleted');
            redirect('orderdcrud/allOrder/');

        }
        else
        {
            $idexi=$this->modorderd->checkOrder($Order_Id);
            if (count($idexi)==1)
            {
                $myreturn=$this->modorderd->deleteOrder($Order_Id);
                if($myreturn)
                {
                    $this->session->set_flashdata('message','Successfully Deleted!');
                    redirect('orderdcrud/allOrder/');
                }
                else
                {
                    $this->session->set_flashdata('message','Product Category Record can not be deleted');
                    redirect('orderdcrud/allOrder/');

                }

            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('orderdcrud/allOrder/');

            }


        }
    }

}