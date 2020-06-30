<?php

Class Login extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }

		function valid_code($inst_code)
       {
		   
		   //------------Connect demo DB ---------------//
			$this->db_second = $this->load->database('second', TRUE); 
			 $query = "SELECT * FROM institute_master WHERE  institute_code = '$inst_code' AND status = 'Active'";
			 $resultset = $this->db_second->query($query);
			 if($resultset->num_rows()>0){
				 
				 $data = array("institute_code"  => $inst_code);
                 $this->session->set_userdata($data);
				 $data= array("status" => "Active","msg" => "Your Account Is Active");
                 return $data;
			 } else {
				 $data= array("status" => "Deactive","msg" => "Your Account Is De-Activated");
                 return $data;
			 }
			$this->db_second->close();
			//------------Connect demo DB End---------------// 

       }
	   
       function login($email,$password)
       {
          $query = "SELECT * FROM edu_users WHERE  user_name = '$email'";
          $resultset=$this->db->query($query);
          if($resultset->num_rows()==1){
              $pwdcheck="SELECT * FROM edu_users WHERE user_name='$email' AND user_password='$password'";
            $res=$this->db->query($pwdcheck);

            if($res->num_rows()==1){
               foreach($res->result() as $rows){
                 $quer="SELECT status FROM edu_users WHERE user_id='$rows->user_id'";
                 $resultset=$this->db->query($quer);
                // return $resultset->result();
                 $status= $rows->status;
                 switch($status){
                    case "Active":
                        
                      $update_web_login="UPDATE edu_users SET web_login_count=web_login_count+1 WHERE user_id='$rows->user_id'";
                    $result_web_login=$this->db->query($update_web_login);
    
                        
                      $data = array("user_name"  => $rows->user_name,"msg"  =>"success","name"=>$rows->name, "school_id" => $rows->school_id,"user_type"=>$rows->user_type,"status"=>$rows->status,"user_id"=>$rows->user_id,"user_pic"=>$rows->user_pic);
					 // print_r($data);exit;
                      return $data;
                      //break;
                     
                      // break;
                    case "Deactive":

                            $data= array("status" => "Deactive","msg" => "Your Account Is De-Activated");
                            return $data;
                      break;


                 }


                //  if($rows->status=='A'){
                //    $data = array("user_name"  => $rows->user_name,"msg"  =>"success","name"=>$rows->name, "school_id" => $rows->school_id,"user_type"=>$rows->user_type,"status"=>$rows->status,"user_id"=>$rows->user_id,"user_pic"=>$rows->user_pic);
                //
                //  }

                   $data = array("user_name"  => $rows->user_name,"msg"  =>"success","name"=>$rows->name, "school_id" => $rows->school_id,"user_type"=>$rows->user_type,"status"=>$rows->status,"user_id"=>$rows->user_id,"user_pic"=>$rows->user_pic);
                   $this->session->set_userdata($data);
                   return $data;
                   }
                 }
                 else{
                  $data= array("status" => "notRegistered","msg" => "Password Wrong");
                  return $data;
                 }
                 }

                else{
                  $data= array("status" => "notRegistered","msg" => " Email invalid");
                  return $data;

            }

       }
       function getuser($user_id){
         $query="SELECT * FROM edu_users WHERE user_id='$user_id'";
         $resultset=$this->db->query($query);
         return $resultset->result();
       }

       function updateprofile($user_id,$oldpassword,$newpassword){
         $checkpassword="SELECT user_id FROM edu_users WHERE user_password='$oldpassword' AND user_id='$user_id'";
         $res=$this->db->query($checkpassword);
         if($res->num_rows()==1){
           $query="UPDATE edu_users SET user_password='$newpassword',updated_date=NOW() WHERE user_id='$user_id'";
           $ex=$this->db->query($query);
            $data= array("status" => "success");
           return $data;
         }else{
           $data= array("status" => "failure");
          return $data;
         }
       }

       function profileupdate($user_id,$name){
         $query="UPDATE edu_users SET name='$name' WHERE user_id='$user_id'";
          $ex=$this->db->query($query);
         $data= array("status" => "success");
         return $data;
       }


		function update_pic($user_id,$imageName)
       {
            $query6="UPDATE edu_users SET user_pic='$imageName',updated_date=NOW() WHERE user_id='$user_id' ";
             $res=$this->db->query($query6);
               if($res){
               $data= array("status" => "success");
               return $data;
             }else{
               $data= array("status" => "Failed to Update");
               return $data;
             }

        }


      function remove_img($user_id){
        $select="SELECT * from edu_users where user_id='$user_id'";
        $get_all=$this->db->query($select);
        $result=$get_all->result();
        foreach($result as $rows){}
        $filename='./assets/admin/profile/'.$rows->user_pic;
        unlink($filename);
        $get_all_gallery_img="UPDATE edu_users SET user_pic='',updated_date=NOW() WHERE user_id='$user_id' ";
        $get_all=$this->db->query($get_all_gallery_img);
        if ($get_all) {
          $data= array("status" => "success");
          return $data;
        } else {
          $data= array("status" => "Failed to Update");
          return $data;
        }
      }

}
?>
