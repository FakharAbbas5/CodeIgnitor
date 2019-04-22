<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/15/2019
 * Time: 4:11 AM
 */

class Salesdcrud extends CI_Controller
{
    public function index()
    {
        $this->load->view('salesd');
    }
    public function addSales()
    {
        $data['Sales_Id']=$this->input->post('Sales_Id',true);
        $data['Product_Name']=$this->input->post('Product_Name',true);
        $data['Description']=$this->input->post('Description',true);
        $data['Quantity']=$this->input->post('Quantity',true);
        $data['Discount']=$this->input->post('Discount',true);
        $data['Net_Price']=$this->input->post('Net_Price',true);

        if(empty($data['Sales_Id']) || empty($data['Product_Name']) || empty($data['Quantity'])
            || empty($data['Description']) || empty($data['Discount'])  || empty($data['Net_Price']))
        {
            $this->session->set_flashdata('message','Please check required fields.');
            redirect('salesdcrud','');

        }
        else
        {
            $myreturn=$this->modsalesd->addSales($data);
            if($myreturn)
            {
                $this->session->set_flashdata('message',' Success!');
                redirect('salesdcrud','');


            }
            else
            {
                $this->session->set_flashdata('message','Failed!!!.');
                redirect('salesdcrud','');


            }


        }

    }

    public function allSales()
    {
        $data['allSales']=$this->modsalesd->getAllRecords();
        $this->load->view('allSalesd',$data);

    }

    public function editSales($id=null)
    {

        $data['salesRecord']=$this->modsales->checkSales($id);
        if(count($data['salesRecord'])==1)
        {
            $this->load->view('editSales',$data);
        }
        else
        {
            $this->session->set_flashdata('message','Record does not exist.');
            redirect('salescrud/allSales','');

        }
    }

    public function updateSales()
    {
        $data['Product_Name']=$this->input->post('Product_Name',true);
        $data['Salesman_Name']=$this->input->post('Salesman_Name',true);
        $data['Date']=$this->input->post('Date',true);
        $data['Quantity']=$this->input->post('Quantity',true);
        $data['Sale_Price']=$this->input->post('Sale_Price',true);
        $data['Description']=$this->input->post('Description',true);
        $data['Reference']=$this->input->post('Reference',true);
        $data['Sale_Type']=$this->input->post('Sale_Type',true);
        $data['Total_Price']=$this->input->post('Total_Price',true);
        $userId=$this->input->post('userId',true);

        if(empty($data['Product_Name']) || empty($data['Salesman_Name']) || empty($data['Date']) ||
            empty($data['Quantity']) || empty($data['Sale_Price'])
            || empty($data['Description']) || empty($data['Reference'])|| empty($data['Sale_Type'])||
            empty($data['Total_Price']) || empty($userId) )
        {
            $this->session->set_flashdata('message','Fill Required Fields!');
            redirect('salescrud/allSales/','');

        }
        else
        {
            $myreturn=$this->modsales->updateSales($data,$userId);
            if($myreturn)
            {
                $this->session->set_flashdata('message','Successfully Updated!');
                redirect('salescrud/allSales/');


            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('salescrud/allSales/');

            }


        }

    }

    public function deleteSales($Sales_Id=null)
    {
        if (empty($Sales_Id))
        {
            $this->session->set_flashdata('message','Record can not be deleted');
            redirect('salescrud/allSales/');

        }
        else
        {
            $idexi=$this->modsales->checkSales($Sales_Id);
            if (count($idexi)==1)
            {
                $myreturn=$this->modsales->deleteSales($Sales_Id);
                if($myreturn)
                {
                    $this->session->set_flashdata('message','Successfully Deleted!');
                    redirect('salescrud/allSales/');
                }
                else
                {
                    $this->session->set_flashdata('message','Sales Record can not be deleted');
                    redirect('salescrud/allSales/');

                }

            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('salescrud/allSales/');

            }


        }
    }

}