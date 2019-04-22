<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Example extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
    }

    public function users_get()
    {
        // Users from a data store e.g. database
        $salesman = [
            ['Salesman_Id' => 1, 'Salesman_Name' => 'Khubaib', 'Password' => 'hhunnhnh', 'Contact' => '12313'
                , 'Picture' => 'Loves coding', 'Email' => 'kk', 'Salesman_Join_Date' => '2019-02-02',
                'Salesman_Last_Login' => '2019-02-02 00:00:00'];

        $Salesman_Id= $this->get('Salesman_Id');

        // If the id parameter doesn't exist return all the users

        if ($Salesman_Id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($salesman)
            {
                // Set the response and exit
                $this->response($salesman, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $Salesman_Id = (int) $Salesman_Id;

        // Validate the id.
        if ($Salesman_Id <= 0)
        {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $salesman = NULL;

        if (!empty($salesman))
        {
            foreach ($salesman as $key => $value)
            {
                if (isset($value['Salesman_Id']) && $value['Salesman_Id'] === $Salesman_Id)
                {
                    $salesman = $value;
                }
            }
        }

        if (!empty($salesman))
        {
            $this->set_response($salesman, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function users_post()
    {
        // $this->some_model->update_user( ... );
        $salesman = [
            ['Salesman_Id' => 1, 'Salesman_Name' => 'Khubaib', 'Password' => 'hhunnhnh', 'Contact' => '12313'
                , 'Picture' => 'Loves coding', 'Email' => 'kk', 'Salesman_Join_Date' => '2019-02-02',
                'Salesman_Last_Login' => '2019-02-02 00:00:00'];


        $this->set_response($salesman, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function users_delete()
    {
        $Salesman_Id = (int) $this->get('Salesman_Id');

        // Validate the id.
        if ($Salesman_Id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $salesman = [
            'Salesman_Id' => $Salesman_Id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($salesman, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }

}
