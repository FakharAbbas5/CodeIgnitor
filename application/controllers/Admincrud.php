<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/5/2019
 * Time: 12:27 AM
 */

class Admincrud extends CI_Controller
{
/*public function index()
{
    if ($this->session->userdata('Admin_Id')) {
        $this->load->view('admin');
    } else {
        $this->load->view('adminLogin');

    }
}*/

    public function allAdmin()
    {
        $data['allAdmin']=$this->modAdmin->getAllRecords();
        $this->load->view('allAdmin',$data);
        
}

    public function editAdmin($id=null)
    {

       $data['adminRecord']=$this->modAdmin->checkAdmin($id);
       if(count($data['adminRecord'])==1)
       {
        $this->load->view('editAdmin',$data);
       }
       else
       {
           $this->session->set_flashdata('message','Record does not exist.');
           redirect('admincrud/allAdmin','');

       }
}

    public function updateAdmin()
    {

        $data['Admin_Name']=$this->input->post('Admin_Name',true);
        $data['Admin_Email']=$this->input->post('Admin_Email',true);
        $data['Admin_Password']=$this->input->post('Admin_Password',true);
        $data['Admin_Join_Date']=$this->input->post('Admin_Join_Date',true);
        $data['Admin_Last_Login']=$this->input->post('Admin_Last_Login',true);
        $data['Picture']=$this->input->post('Picture',true);
        $userId=$this->input->post('userId',true);

        if(empty($data['Admin_Name']) || empty($data['Admin_Email']) || empty($data['Admin_Password']) ||
            empty($data['Admin_Join_Date']) || empty($data['Admin_Last_Login'])
            || empty($data['Picture']) || empty($userId))
        {
            $this->session->set_flashdata('message','Fill Required Fields!');
            redirect('admincrud/allAdmin/','');

        }
        else
        {
            $myreturn=$this->modAdmin->updateAdmin($data,$userId);
            if($myreturn)
            {
                $this->session->set_flashdata('message','Successfully Updated!');
                redirect('admincrud/allAdmin/');


            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('admincrud/allAdmin/');

            }


        }

    }

    public function deleteAdmin($Admin_Id=null)
    {
        if (empty($Admin_Id))
        {
            $this->session->set_flashdata('message','Record can not be deleted');
            redirect('admincrud/allAdmin/');

        }
        else
        {
            $idexi=$this->modAdmin->checkAdmin($Admin_Id);
            if (count($idexi)==1)
            {
                $myreturn=$this->modAdmin->deleteAdmin($Admin_Id);
                if($myreturn)
                {
                    $this->session->set_flashdata('message','Successfully Deleted!');
                    redirect('admincrud/allAdmin/');
                }
                else
                {
                    $this->session->set_flashdata('message','Admin Record can not be deleted');
                    redirect('admincrud/allAdmin/');

                }

            }
            else
            {
                $this->session->set_flashdata('message','Something went wrong!');
                redirect('admincrud/allAdmin/');

            }


        }
    }

    public function checkAdmin()
    {
        $data['Admin_Name']=$this->input->post('Admin_Name');
        $data['Admin_Password']=$this->input->post('Admin_Password');

        if(!empty($data['Admin_Name']) && !empty($data['Admin_Password'])){
            $admin = $this->modAdmin->checkLogin($data);

            if(count($admin)==1){
                $forsession=array(
                    'Admin_Id'=>$admin[0]['Admin_Id'],
                    'Admin_Name'=>$admin[0]['Admin_Name'],
                    'Admin_Email'=>$admin[0]['Admin_Email'],
                );
                $this->session->set_userdata($forsession);
                if($this->session->userdata('Admin_Id')){
                    redirect();
                }
                else{
                    echo "session not created!";
                }
            }
            else{
                $this->session->set_flashdata('message','User Name and password don\'t match!!');
                redirect('admincrud');
            }
        }
        else{
            $this->session->set_flashdata('message','Please Provide Admin name and password');
            redirect('admincrud');

        }

    }

    public function logout()
    {
        if($this->session->userdata('Admin_Id')){
            $this->session->set_userdata('Admin_Id','');
            $this->session->set_flashdata('message','logged out');

            redirect('admincrud');
        }
        else{
            $this->session->set_flashdata('message','Couldn\'t Logout successfully');
            redirect('admincrud');


        }


    }
}//class ends here
