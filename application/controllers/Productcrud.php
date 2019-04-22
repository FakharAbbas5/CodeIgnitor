<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/10/2019
 * Time: 3:59 PM
 */

class Productcrud extends CI_Controller
{
    public function index()
    {
        $this->load->view('product');
    }
    public function addProduct()
    {
        $data['Product_Id']=$this->input->post('Product_Id',true);
        $data['Product_Name']=$this->input->post('Product_Name',true);
        $data['Brand']=$this->input->post('Brand',true);
        $data['Sale_Price']=$this->input->post('Sale_Price',true);
        $data['Purchase_Price']=$this->input->post('Purchase_Price',true);
        $data['Product_Qty']=$this->input->post('Product_Qty',true);
        $data['Product_Barcode']=$this->input->post('Product_Barcode',true);
        $data['Pack']=$this->input->post('Pack',true);
        $data['Discount']=$this->input->post('Discount',true);
        $data['product_category_id']=$this->input->post('product_category_id',true);

        if(empty($data['Product_Id']) || empty($data['Product_Name']) || empty($data['Brand']) ||
            empty($data['Sale_Price']) || empty($data['Purchase_Price']) || empty($data['Product_Qty']) ||
            empty($data['Product_Barcode']) || empty($data['Pack']) || empty($data['Discount']) ||
            empty($data['product_category_id']))
        {
            $this->session->set_flashdata('message','Please check required fields.');
            redirect('productcrud','');

        }
        else
        {
            $myreturn=$this->modproduct->addProduct($data);
            if($myreturn)
            {
                $this->session->set_flashdata('message',' Success!');
                redirect('productcrud','');


            }
            else
            {
                $this->session->set_flashdata('message','Failed!!!.');
                redirect('productcrud','');


            }


        }

    }

    public function allProduct()
    {
        $data['allProduct']=$this->modproduct->getAllRecords();
        $this->load->view('allProduct',$data);

    }

    public function editProduct($id=null)
    {

        $data['productRecord']=$this->modproduct->checkProduct($id);
        if(count($data['productRecord'])==1)
        {
            $this->load->view('editProduct',$data);
        }
        else
        {
            $this->session->set_flashdata('message','Record does not exist.');
            redirect('productcrud/allProduct','');

        }
    }

    public function updateProduct()
    {
        $data['Product_Name']=$this->input->post('Product_Name',true);
        $data['Brand']=$this->input->post('Brand',true);
        $data['Sale_Price']=$this->input->post('Sale_Price',true);
        $data['Purchase_Price']=$this->input->post('Purchase_Price',true);
        $data['Product_Qty']=$this->input->post('Product_Qty',true);
        $data['Product_Barcode']=$this->input->post('Product_Barcode',true);
        $data['Pack']=$this->input->post('Pack',true);
        $data['Discount']=$this->input->post('Discount',true);
        $data['product_category_id']=$this->input->post('product_category_id',true);
        $userId=$this->input->post('userId',true);

        if(empty($data['Product_Name']) || empty($data['Brand']) || empty($data['Sale_Price']) ||
            empty($data['Purchase_Price']) || empty($data['Product_Qty'])
            || empty($data['Product_Barcode']) || empty($data['Pack'])|| empty($data['Discount'])||
            empty($data['product_category_id']) || empty($userId) )
        {
            $this->session->set_flashdata('message','Fill Required Fields!');
            redirect('productcrud/allProduct/','');

        }
        else
        {
            $myreturn=$this->modproduct->updateProduct($data,$userId);
            if($myreturn)
            {
                $this->session->set_flashdata('message','Successfully Updated!');
                redirect('productcrud/allProduct/');


            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('productcrud/allProduct/');

            }


        }

    }

    public function deleteProduct($Product_Id=null)
    {
        if (empty($Product_Id))
        {
            $this->session->set_flashdata('message','Record can not be deleted');
            redirect('productcrud/allProduct/');

        }
        else
        {
            $idexi=$this->modproduct->checkProduct($Product_Id);
            if (count($idexi)==1)
            {
                $myreturn=$this->modproduct->deleteProduct($Product_Id);
                if($myreturn)
                {
                    $this->session->set_flashdata('message','Successfully Deleted!');
                    redirect('productcrud/allProduct/');
                }
                else
                {
                    $this->session->set_flashdata('message','Admin Record can not be deleted');
                    redirect('productcrud/allProduct/');

                }

            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('productcrud/allProduct/');

            }


        }
    }

}