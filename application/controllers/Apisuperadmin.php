<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apisuperadmin extends CI_Controller {

	function __construct() {
		 parent::__construct();

        $this->load->model('apisuperadminmodel');
        $this->load->helper('url');
        $this->load->library('session');
}

    public function index()
    {
    	$this->load->view('welcome_message');
    }
		public function checkMethod()
		{
			if($_SERVER['REQUEST_METHOD'] != 'POST')
			{
				$res = array();
				$res["scode"] = 203;
				$res["message"] = "Request Method not supported";

				echo json_encode($res);
				return FALSE;
			}
			return TRUE;
		}

    public function get_all_staff_details()
    {

    	$_POST = json_decode(file_get_contents("php://input"), TRUE);

    	if(!$this->checkMethod())
    	{
    		return FALSE;
    	}
			$role_type_id = $this->uri->segment(3);
    	$data['result']=$this->apisuperadminmodel->get_all_staff_details($role_type_id);
    	$response = $data['result'];
    	echo json_encode($response);
    }



}
