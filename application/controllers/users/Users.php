<?php
use Restserver\Libraries\REST_Controller;
require(APPPATH.'libraries/REST_Controller.php');

class Users extends REST_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');

        
    }
    /**
     * add new user
     * @method : POST
     */
    public function add_users_post()
    {
        
    }
    /**
     * fetch all users
     * @method : GET
     */
    public function fetch_all_users_get()
    {
        header("Access-Control-Allow-Origin: *");
        $data=$this->user_model->fetch_all_users();
        //$data=array('returned ');

        $this->response($data);
        
    }
}