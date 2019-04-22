<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/10/2019
 * Time: 4:38 AM
 */

class Productccrud extends CI_Controller
{
    public function index()
    {
        $this->load->view('productc');
    }
    public function addProductc()
    {
        $data['Product_Category_Id']=$this->input->post('Product_Category_Id',true);
        $data['Product_Category_Name']=$this->input->post('Product_Category_Name',true);

        if(empty($data['Product_Category_Id']) || empty($data['Product_Category_Name']) )
        {
            $this->session->set_flashdata('message','Please check required fields.');
            redirect('productccrud','');

        }

        else
        {
            $myreturn=$this->modproductc->addProductc($data);
            if($myreturn)
            {
                $this->session->set_flashdata('message',' Success!');
                redirect('productccrud','');


            }
            else
            {
                $this->session->set_flashdata('message','Failed!!!.');
                redirect('productccrud','');


            }


        }

    }

    public function allProductc()
    {
        $data['allProductc']=$this->modproductc->getAllRecords();
        $this->load->view('allProductc',$data);

    }

    public function editProductc($id=null)
    {

        $data['productcRecord']=$this->modproductc->checkProductc($id);
        if(count($data['productcRecord'])==1)
        {
            $this->load->view('editProductc',$data);
        }
        else
        {
            $this->session->set_flashdata('message','Record does not exist.');
            redirect('productccrud/allProductc','');

        }
    }

    public function updateProductc()
    {

        $data['Product_Category_Name']=$this->input->post('Product_Category_Name',true);
        $userId=$this->input->post('userId',true);

        if(empty($data['Product_Category_Name'])
            || empty($userId))
        {
            $this->session->set_flashdata('message','Fill Required Fields!');
            redirect('productccrud/allProductc/','');

        }
        else
        {
            $myreturn=$this->modproductc->updateProductc($data,$userId);
            if($myreturn)
            {
                $this->session->set_flashdata('message','Successfully Updated!');
                redirect('productccrud/allProductc/');


            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('productccrud/allProductc/');

            }


        }

    }

    public function deleteProductc($Product_Category_Id=null)
    {
        if (empty($Product_Category_Id))
        {
            $this->session->set_flashdata('message','Record can not be deleted');
            redirect('productccrud/allProductc/');

        }
        else
        {
            $idexi=$this->modproductc->checkProductc($Product_Category_Id);
            if (count($idexi)==1)
            {
                $myreturn=$this->modproductc->deleteProductc($Product_Category_Id);
                if($myreturn)
                {
                    $this->session->set_flashdata('message','Successfully Deleted!');
                    redirect('productccrud/allProductc/');
                }
                else
                {
                    $this->session->set_flashdata('message','Product Category Record can not be deleted');
                    redirect('productccrud/allProductc/');

                }

            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('productccrud/allProductc/');

            }


        }
    }

}