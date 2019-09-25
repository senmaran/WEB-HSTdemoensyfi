<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends CI_Controller {

	function __construct() {
		 parent::__construct();
		  $this->load->model('admissionmodel');
		  $this->load->model('yearsmodel');
		  $this->load->model('classmodel');
		  $this->load->helper('url');
		  $this->load->library('session');
 }

 	public function home(){
	 		$datas = $this->session->userdata();
	 		$user_id = $this->session->userdata('user_id');
			
	 		//$datas['result'] = $this->classmodel->getclass();
			$datas['class'] = $this->classmodel->getclass();
			$datas['result'] = $this->yearsmodel->getall_years();
			$datas['lang'] = $this->admissionmodel->getall_language_proposed();
			$datas['blood'] = $this->admissionmodel->getall_blood_group();
			$user_type=$this->session->userdata('user_type');
			if($user_type==1){
				 $this->load->view('header');
				 $this->load->view('admission/add',$datas);
				 $this->load->view('footer');
	 		 }
	 		 else{
	 				redirect('/');
	 		 }
	 	}


		public function create()
		{
			$datas=$this->session->userdata();
			 $user_id=$this->session->userdata('user_id');
			 $user_type=$this->session->userdata('user_type');
		 	if($user_type==1){
				$admission_year=$this->input->post('admission_year');
				$admission_no=$this->input->post('admission_no');
				$emsi_num=$this->input->post('emsi_num');
				$admission_date=$this->input->post('admission_date');

				$dateTime1 = new DateTime($admission_date);
				$formatted_date=date_format($dateTime1,'Y-m-d' );

				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$sec_email=$this->input->post('sec_email');
				$sex=$this->input->post('sex');
				
				$dob=$this->input->post('dob');
				$dateTime = new DateTime($dob);
				$dob_date=date_format($dateTime,'Y-m-d' );
				
				$mobile=$this->input->post('mobile');
				$sec_mobile=$this->input->post('sec_mobile');
				$age=$this->input->post('age');
				$nationality=$this->input->post('nationality');
				$religion=$this->input->post('religion');
				$community_class=$this->input->post('community_class');
				$community=$this->input->post('community');
				$mother_tongue=$this->input->post('mother_tongue');
				$language=$this->input->post('lang');
				$blood_group=$this->input->post('blood_group');

				$student_pic = $_FILES['student_pic']['name'];
				
				if(empty($student_pic)){
						$userFileName="";
				} else {
					$temp = pathinfo($student_pic, PATHINFO_EXTENSION);
					$file_name      = time() . rand(1, 5);
					$userFileName   = $file_name. '.' .$temp;
					$uploaddir      = 'assets/students/';
					$profilepic     = $uploaddir . $userFileName;
					move_uploaded_file($_FILES['student_pic']['tmp_name'], $profilepic); 
				}
				
				$last_sch=$this->input->post('sch_name');
				$last_studied=$this->input->post('class_name');
				$qual=$this->input->post('qual');
				$tran_cert=$this->input->post('trn_cert');
				
				$tc_copy      = $_FILES['tc_copy']['name'];
				
				if(empty($tc_copy)){
					$tcFileName="";
				} else {
					$temp = pathinfo($tc_copy, PATHINFO_EXTENSION);
					$file_name      = time() . rand(1, 5);
					$tcFileName   = $file_name. '.' .$temp;
					$uploaddir      = 'assets/students/tccopy/';
					$copy_tc     = $uploaddir . $tcFileName;
					move_uploaded_file($_FILES['tc_copy']['tmp_name'], $copy_tc); 
				}
				$recod_sheet=$this->input->post('rec_sheet');
				$status=$this->input->post('status');

				$datas=$this->admissionmodel->ad_create($admission_year,$admission_no,$emsi_num,$formatted_date,$name,$sex,$dob_date,$age,$nationality,$religion,$community_class,$community,$mother_tongue,$language,$mobile,$sec_mobile,$email,$sec_email,$userFileName,$last_sch,$last_studied,$qual,$tran_cert,$tcFileName,$recod_sheet,$blood_group,$status);
			   
				if($datas['status']=="success"){
					$id = $datas['last_id'];
					redirect('/parents/home/'.$id.'');
				}else if($datas['status']=="Email Already Exist"){
					$this->session->set_flashdata('msg', 'Email Already Exist');
					redirect('admission/home');
				}	else if($datas['status']=="Already Mobile Number Exist"){
					$this->session->set_flashdata('msg', 'Already Number Exist');
					redirect('admission/home');
				}else{
					$this->session->set_flashdata('msg', 'Failed to Add');
					redirect('admission/home');
				}
			 }
			 else{
					redirect('/');
			 }
		}

// GET ALL ADMISSION DETAILS

		public function view()
		{
			 $datas=$this->session->userdata();
			 $user_id=$this->session->userdata('user_id');
			 $user_type=$this->session->userdata('user_type');
			 $gender=$this->input->post('gender');

			 $datas['result'] = $this->admissionmodel->get_all_admission();
			 if(!empty($gender)){
				$datas['gender'] = $this->admissionmodel->get_sorting_gender_details($gender);
			 }
		     if($user_type==1){
			 $this->load->view('header');
			 $this->load->view('admission/view',$datas);
			 $this->load->view('footer');
			 }
			 else{
					redirect('/');
			 }
		}
        //-----------Sorting----------------


		public function get_ad_id($admission_id){
		 $datas=$this->session->userdata();
		 $user_id=$this->session->userdata('user_id');
		 $user_type=$this->session->userdata('user_type');

		 $datas['result'] = $this->yearsmodel->getall_years();
		 $datas['class'] = $this->classmodel->getclass();
		 $datas['res']=$this->admissionmodel->get_ad_id($admission_id);
		 $datas['lang'] = $this->admissionmodel->getall_language_proposed();
		 $datas['blood'] = $this->admissionmodel->getall_blood_group();
		//echo "<pre>";print_r($datas['res']);exit;

		if($user_type==1){
		 $this->load->view('header');
		 $this->load->view('admission/edit',$datas);
		 $this->load->view('footer');
		 }
		 else{
				redirect('/');
		 }
		}
		
		
		public function get_ad_id1($admission_id){
		 $datas=$this->session->userdata();
		 $user_id=$this->session->userdata('user_id');

		 $datas['result'] = $this->yearsmodel->getall_years();

		 $datas['res']=$this->admissionmodel->get_ad_id1($admission_id);
		 $datas['lang'] = $this->admissionmodel->getall_language_proposed();
		 $datas['blood'] = $this->admissionmodel->getall_blood_group();

		$user_type=$this->session->userdata('user_type');
		if($user_type==1){
		 $this->load->view('header');
		 $this->load->view('admission/edit',$datas);
		 $this->load->view('footer');
		 }
		 else{
				redirect('/');
		 }
		}


		public function save_ad()
		{
			 $datas=$this->session->userdata();
			 $user_id=$this->session->userdata('user_id');
			 $user_type=$this->session->userdata('user_type');
			 if($user_type==1)
			 {
				$admission_id=$this->input->post('admission_id');
				$admission_year=$this->input->post('admission_year');
				$admission_no=$this->input->post('admission_no');
				$admission_date=$this->input->post('admission_date');
				$dateTime1 = new DateTime($admission_date);
				$formatted_date=date_format($dateTime1,'Y-m-d' );
				
				$emsi_num=$this->input->post('emsi_num');
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$sex=$this->input->post('sex');
				
				$dob=$this->input->post('dob');
				$dateTime = new DateTime($dob);
				$dob_date=date_format($dateTime,'Y-m-d' );
				
				$age=$this->input->post('age');
				$nationality=$this->input->post('nationality');
				$religion=$this->input->post('religion');
				$community_class=$this->input->post('community_class');
				$community=$this->input->post('community');
				$mother_tongue=$this->input->post('mother_tongue');
				$lang=$this->input->post('lang');
				$blood_group=$this->input->post('blood_group');
				$mobile=$this->input->post('mobile');

				$sec_mobile=$this->input->post('sec_mobile');
				$sec_email=$this->input->post('sec_email');


				$last_sch=$this->input->post('sch_name');
				$last_studied=$this->input->post('class_name');
				$qual=$this->input->post('qual');
				 $tran_cert=$this->input->post('trn_cert');
				 $recod_sheet=$this->input->post('rec_sheet');

				$user_pic_old=$this->input->post('user_pic_old');
				$user_tc_old=$this->input->post('user_tc_old');

				$student_pic = $_FILES["student_pic"]["name"];
			 
				/* $userFileName =$admission_no.'-'.$student_pic;
				$uploaddir = 'assets/students/';
				$profilepic = $uploaddir.$userFileName;
				move_uploaded_file($_FILES['student_pic']['tmp_name'], $profilepic); */
				
				if(empty($student_pic)){
						$userFileName=$user_pic_old;
				} else {
					$temp = pathinfo($student_pic, PATHINFO_EXTENSION);
					$file_name      = time() . rand(1, 5);
					$userFileName   = $file_name. '.' .$temp;
					$uploaddir      = 'assets/students/';
					$profilepic     = $uploaddir . $userFileName;
					move_uploaded_file($_FILES['student_pic']['tmp_name'], $profilepic); 
				
				}
				
				
				$tc_copy      = $_FILES['tc_copy']['name'];
				if(empty($tc_copy)){
					$tcFileName=$user_tc_old;
				} else {
					$temp = pathinfo($tc_copy, PATHINFO_EXTENSION);
					$file_name      = time() . rand(1, 5);
					$tcFileName   = $file_name. '.' .$temp;
					$uploaddir      = 'assets/students/tccopy/';
					$copy_tc     = $uploaddir . $tcFileName;
					move_uploaded_file($_FILES['tc_copy']['tmp_name'], $copy_tc); 
				}
				
				
				if ($tran_cert == ""){
					$tcFileName = "";
				}
				$status=$this->input->post('status');

				$datas=$this->admissionmodel->save_ad($admission_id,$admission_year,$admission_no,$emsi_num,$formatted_date,$name,$sex,$dob_date,$age,$nationality,$religion,$community_class,$community,$mother_tongue,$lang,$mobile,$sec_mobile,$email,$sec_email,$userFileName,$last_sch,$last_studied,$qual,$tran_cert,$tcFileName,$recod_sheet,$blood_group,$status);

				if($datas['status']=="success"){
					$this->session->set_flashdata('msg', 'Updated Successfully');
					redirect('admission/view');
				}else if($datas['status']=="Email Already Exist"){
					$this->session->set_flashdata('msg', 'Email Already Exist');
					redirect('admission/view');
				}else{
					$this->session->set_flashdata('msg', 'Failed to Add');
					redirect('admission/view');
				}
			 }
			 else{
					redirect('/');
			 }
		}

		public function check_email_exists($email){
			$email=$this->input->post('email');
			$data=$this->admissionmodel->check_email($email);
		}

		public function check_email_id()
		{
			$email = $this->input->post('email');
			$data['res'] = $this->admissionmodel->check_email_id($email);
		}

		 public function check_admission_number(){
			$admission_no=$this->input->post('admission_no');
			$data['res']= $this->admissionmodel->check_admission_number($admission_no);
		}

		public function check_mobile_number()
		{
			$cell = $this->input->post('mobile');
			$data['res']= $this->admissionmodel->check_mobile_number($cell);
		}
		public function check_emsi_num(){
			$emsi_num = $this->input->post('emsi_num');
			$data['res']= $this->admissionmodel->check_emsi_num($emsi_num);
		}

		public function check_email_id_exist()
		{
			$id=$this->uri->segment(3);
			$email = $this->input->post('email');
			$data['res'] = $this->admissionmodel->check_email_id_exist($email,$id);
		}

		public function check_admission_number_exist(){
			$id=$this->uri->segment(3);
			$admission_no=$this->input->post('admission_no');
			$data['res']= $this->admissionmodel->check_admission_number_exist($admission_no,$id);
		}

		public function check_mobile_number_exist()
		{
			$id=$this->uri->segment(3);
			$cell = $this->input->post('mobile');
			$data['res']= $this->admissionmodel->check_mobile_number_exist($cell,$id);
		}
		public function check_emsi_num_exist()
		{
			$id=$this->uri->segment(3);
			$emsi_num = $this->input->post('emsi_num');
			$data['res']= $this->admissionmodel->check_emsi_num_exist($emsi_num,$id);
		}



}
