<?php
/**
 * Created by PhpStorm.
 * User: Khalid Bashir
 * Date: 4/4/2019
 * Time: 7:45 AM
 */

class Crud extends CI_Controller
{
    public function index()
    {
        $this->load->view('product');
    }

}