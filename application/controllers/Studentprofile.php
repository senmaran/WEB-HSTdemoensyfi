<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studentprofile extends CI_Controller {


	function __construct() {
		 parent::__construct();
		  $this->load->model('studentprofilemodel');
		  $this->load->model('yearsmodel');
		  $this->load->model('classmodel');
		  $this->load->helper('url');
		  $this->load->library('session');
 }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 // Class section




		public function profile_update()
		{

			 $datas=$this->session->userdata();
			 $user_id=$this->session->userdata('user_id');
			 $user_type=$this->session->userdata('user_type');
			 $datas['res'] = $this->studentprofilemodel->getuser($user_id);
			 $datas['class'] = $this->classmodel->getclass();
				if($user_type==3){
				$this->load->view('adminstudent/student_header');
				$this->load->view('adminstudent/profile_update',$datas);
				$this->load->view('adminstudent/student_footer');
				}
				else{
					 redirect('/');
				}
		}

		public function post_img()
		{
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==3)
			{
				 $data=$_POST["image"];
				 $image_array_1 = explode(";", $data);
				 $image_array_2 = explode(",", $image_array_1[1]);
				 $data = base64_decode($image_array_2[1]);
				 $imageName = time() . '.png';
				 file_put_contents('assets/students/profile/'.$imageName, $data);
				 $datas=$this->studentprofilemodel->update_parents($user_id,$imageName);
				 if($datas['status']=="success"){
					 echo "success";
				 }else{
					 echo "failed";
				 }

			 }else{
					 redirect('/');

			 }

		}

		public function remove_img(){
			$datas=$this->session->userdata();
		 $user_id=$this->session->userdata('user_id');
		 $user_type=$this->session->userdata('user_type');
		 if($user_type==3)
		 {
			 $datas=$this->studentprofilemodel->remove_img($user_id);
			 if($datas['status']=="success"){
				 echo "success";
			 }else{
				 echo "failed";
			 }
		 }else{
			 redirect('/');
		 }
		}



		public function pwd_reset()
		{
			 $datas=$this->session->userdata();
			 $user_id=$this->session->userdata('user_id');
			//echo $user_id;exit;
			 $datas['result'] = $this->studentprofilemodel->change_pwd($user_id);
			 $user_type=$this->session->userdata('user_type');
				// echo $user_type;exit;
				 if($user_type==3){
					$this->load->view('adminstudent/student_header');
					$this->load->view('adminstudent/resetpassword',$datas);
					$this->load->view('adminstudent/student_footer');
					}
					else{
						 redirect('/');
					}
		}

		public function changepwd()
		{
			    $datas=$this->session->userdata();
				$user_name=$this->session->userdata('user_name');
				$user_type=$this->session->userdata('user_type');
				if($user_type==3)
				{
						$user_id=$this->input->post('user_id');
						//echo $user_id;exit;

						$name=$this->input->post('name');
						$oldpassword=md5($this->input->post('oldpassword'));
						$newpassword=md5($this->input->post('newpassword'));

					    $user_password_old=$this->input->post('user_password_old');

						$res=$this->studentprofilemodel->updatepwd($user_id,$oldpassword,$newpassword);

						if($res['status']=="success"){
							  $this->session->set_flashdata('msg', 'Update Successfully');
							  redirect('studentprofile/pwd_reset');
						  }else{
								$this->session->set_flashdata('msg', 'Failed to update');
								redirect('studentprofile/pwd_reset');
							  }
			 }else{
					redirect('/');
			 }
		}
		
		
		public function notification_status(){
			 $datas=$this->session->userdata();
			 $user_id=$this->session->userdata('user_id');
			 $datas['res'] = $this->studentprofilemodel->getuser($user_id);
			 $user_type=$this->session->userdata('user_type');
			 if($user_type==3){
				$datas['notification_status']=$this->studentprofilemodel->check_notification($user_id);
				$this->load->view('adminstudent/student_header',$datas);
		        $this->load->view('adminstudent/update_notification',$datas);
		        $this->load->view('adminstudent/student_footer');
			}
			else{
					 redirect('/');
			}
	}
	
	
	public function update_notification()
	{
		$datas=$this->session->userdata();
		$user_name=$this->session->userdata('user_name');
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
	 	if($user_type==3){

			$Sms = $this->input->post('Sms');
			$Mail = $this->input->post('Mail');
			$Push = $this->input->post('Push');
			
			$res=$this->studentprofilemodel->update_notification($Sms,$Mail,$Push,$user_id);

			if($res['status']=="success"){
				 $this->session->set_flashdata('msg', 'Update Successfully');
					redirect('studentprofile/notification_status');
			 }else{
				 $this->session->set_flashdata('msg', 'Failed to update');
						redirect('studentprofile/notification_status');
			 }
		}
		else{
			redirect('/');
		}
	}



}
