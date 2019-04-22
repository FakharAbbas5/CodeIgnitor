<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/10/2019
 * Time: 12:28 AM
 */

class Complaintcrud extends CI_Controller
{
    public function index()
    {
        $this->load->view('complaint');
    }
    public function addComplaint()
    {
        $data['Complaints_Id']=$this->input->post('Complaints_Id',true);
        $data['Customer_Name']=$this->input->post('Customer_Name',true);
        $data['Complaint_Type']=$this->input->post('Complaint_Type',true);
        $data['Complaint_Description']=$this->input->post('Complaint_Description',true);
        $data['Date']=$this->input->post('Date',true);
        $data['Status']=$this->input->post('Status',true);

        if(empty($data['Complaints_Id']) || empty($data['Customer_Name']) || empty($data['Complaint_Type']) ||
            empty($data['Complaint_Description']) || empty($data['Date']) || empty($data['Status']))
        {
            $this->session->set_flashdata('message','Please check required fields.');
            redirect('complaintcrud','');

        }

        else
        {
            $myreturn=$this->modcomplaint->addComplaint($data);
            if($myreturn)
            {
                $this->session->set_flashdata('message',' Success!');
                redirect('complaintcrud','');


            }
            else
            {
                $this->session->set_flashdata('message','Failed!!!.');
                redirect('complaintcrud','');


            }


        }

    }

    public function allComplaint()
    {
        $data['allComplaint']=$this->modcomplaint->getAllRecords();
        $this->load->view('allComplaint',$data);

    }

    public function editComplaint($id=null)
    {

        $data['complaintRecord']=$this->modcomplaint->checkComplaint($id);
        if(count($data['complaintRecord'])==1)
        {
            $this->load->view('editComplaint',$data);
        }
        else
        {
            $this->session->set_flashdata('message','Record does not exist.');
            redirect('complaintcrud/allComplaint','');

        }
    }

    public function updateComplaint()
    {

        $data['Customer_Name']=$this->input->post('Customer_Name',true);
        $data['Complaint_Type']=$this->input->post('Complaint_Type',true);
        $data['Complaint_Description']=$this->input->post('Complaint_Description',true);
        $data['Date']=$this->input->post('Date',true);
        $data['Status']=$this->input->post('Status',true);
        $userId=$this->input->post('userId',true);

        if(empty($data['Customer_Name']) || empty($data['Complaint_Type']) || empty($data['Complaint_Description']) ||
            empty($data['Date']) || empty($data['Status'])
             || empty($userId))
        {
            $this->session->set_flashdata('message','Fill Required Fields!');
            redirect('complaintcrud/allComplaint/','');

        }
        else
        {
            $myreturn=$this->modcomplaint->updateComplaint($data,$userId);
            if($myreturn)
            {
                $this->session->set_flashdata('message','Successfully Updated!');
                redirect('complaintcrud/allComplaint/');


            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('complaintcrud/allComplaint/');

            }


        }

    }

    public function deleteComplaint($Complaints_Id=null)
    {
        if (empty($Complaints_Id))
        {
            $this->session->set_flashdata('message','Record can not be deleted');
            redirect('complaintcrud/allComplaint/');

        }
        else
        {
            $idexi=$this->modcomplaint->checkComplaint($Complaints_Id);
            if (count($idexi)==1)
            {
                $myreturn=$this->modcomplaint->deleteComplaint($Complaints_Id);
                if($myreturn)
                {
                    $this->session->set_flashdata('message','Successfully Deleted!');
                    redirect('complaintcrud/allComplaint/');
                }
                else
                {
                    $this->session->set_flashdata('message','Admin Record can not be deleted');
                    redirect('complaintcrud/allComplaint/');

                }

            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('complaintcrud/allComplaint/');

            }


        }
    }

}