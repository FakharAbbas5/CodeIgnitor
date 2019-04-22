<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/15/2019
 * Time: 1:44 AM
 */

class Ordercrud extends CI_Controller
{
    public function index()
    {
        $this->load->view('order');
    }
    public function addOrder()
    {
        $data['Order_Id']=$this->input->post('Order_Id',true);
        $data['Product_Name']=$this->input->post('Product_Name',true);
        $data['Description']=$this->input->post('Description',true);
        $data['Quantity']=$this->input->post('Quantity',true);
        $data['Discount']=$this->input->post('Discount',true);
        $data['Net_Price']=$this->input->post('Net_Price',true);

        if(empty($data['Order_Id']) || empty($data['Product_Name']) || empty($data['Description'])
            || empty($data['Quantity'])|| empty($data['Discount']) || empty($data['Net_Price']))
        {
            $this->session->set_flashdata('message','Please check required fields.');
            redirect('ordercrud','');

        }

        else
        {
            $myreturn=$this->modorder->addOrder($data);
            if($myreturn)
            {
                $this->session->set_flashdata('message',' Success!');
                redirect('ordercrud','');


            }
            else
            {
                $this->session->set_flashdata('message','Failed!!!.');
                redirect('ordercrud','');


            }


        }

    }

    public function allOrder()
    {
        $data['allOrder']=$this->modorder->getAllRecords();
        $this->load->view('allOrder',$data);

    }

    public function editOrder($id=null)
    {

        $data['orderRecord']=$this->modorder->checkOrder($id);
        if(count($data['orderRecord'])==1)
        {
            $this->load->view('editOrder',$data);
        }
        else
        {
            $this->session->set_flashdata('message','Record does not exist.');
            redirect('ordercrud/allOrder','');

        }
    }

    public function updateOrder()
    {

        $data['Product_Name']=$this->input->post('Product_Name',true);
        $data['Description']=$this->input->post('Description',true);
        $data['Quantity']=$this->input->post('Quantity',true);
        $data['Discount']=$this->input->post('Discount',true);
        $data['Net_Price']=$this->input->post('Net_Price',true);
        $userId=$this->input->post('userId',true);

        if(empty($data['Product_Name']) || empty($data['Description']) || empty($data['Quantity'])
            || empty($data['Discount'])|| empty($data['Net_Price']) || empty($userId))
        {
            $this->session->set_flashdata('message','Fill Required Fields!');
            redirect('ordercrud/allOrder/','');

        }
        else
        {
            $myreturn=$this->modorder->updateOrder($data,$userId);
            if($myreturn)
            {
                $this->session->set_flashdata('message','Successfully Updated!');
                redirect('ordercrud/allOrder/');


            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('ordercrud/allOrder/');

            }


        }

    }

    public function deleteOrder($Order_Id=null)
    {
        if (empty($Order_Id))
        {
            $this->session->set_flashdata('message','Record can not be deleted');
            redirect('ordercrud/allOrder/');

        }
        else
        {
            $idexi=$this->modorder->checkOrder($Order_Id);
            if (count($idexi)==1)
            {
                $myreturn=$this->modorder->deleteOrder($Order_Id);
                if($myreturn)
                {
                    $this->session->set_flashdata('message','Successfully Deleted!');
                    redirect('ordercrud/allOrder/');
                }
                else
                {
                    $this->session->set_flashdata('message','Product Category Record can not be deleted');
                    redirect('ordercrud/allOrder/');

                }

            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('ordercrud/allOrder/');

            }


        }
    }

}