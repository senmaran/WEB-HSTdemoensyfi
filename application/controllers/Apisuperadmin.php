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
		//-----------------------------------------------//

		public function version_check()
		{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Mobile Check";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}


		$version_code = $this->input->post("version_code");
		$data['result']=$this->apisuperadminmodel->version_check($version_code);
		$response = $data['result'];
		echo json_encode($response);
		}

		//-----------------------------------------------//
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


		public function get_user_count()
		{

			$_POST = json_decode(file_get_contents("php://input"), TRUE);

			if(!$this->checkMethod())
			{
				return FALSE;
			}
			$data['result']=$this->apisuperadminmodel->get_user_count();
			$response = $data['result'];
			echo json_encode($response);
		}




}
