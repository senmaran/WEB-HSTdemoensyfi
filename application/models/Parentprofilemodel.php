<?php

Class Parentprofilemodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }

  function getuser($user_id)
   {
	   //$query="SELECT ed.*,ed.user_pic as profile_pic,ep.* FROM edu_users AS ed,edu_parents AS ep WHERE ed.parent_id=ep.id AND ed.user_id='$user_id'";
     $query="SELECT ed.user_id,ed.user_pic,ed.name FROM edu_users AS ed,edu_parents AS ep WHERE ed.parent_id=ep.id AND ed.user_id='$user_id'";
       $resultset=$this->db->query($query);
       return $resultset->result();
   }

    function get_parentuser($user_id)
      {
         $query="SELECT * FROM edu_users WHERE user_id='$user_id'";
         $resultset=$this->db->query($query);
         return $resultset->result();
       }

	   function update_parents($user_id,$imageName)
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
      $filename='./assets/parents/profile/'.$rows->user_pic;
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


  function updateprofilepwd($user_id,$oldpassword,$newpassword)
  {
         $checkpassword="SELECT user_id FROM edu_users WHERE user_password='$oldpassword' AND user_id='$user_id'";
         $res=$this->db->query($checkpassword);
         if($res->num_rows()==1)
		 {
           $query="UPDATE edu_users SET user_password='$newpassword',updated_date=NOW() WHERE user_id='$user_id'";
           $ex=$this->db->query($query);
            $data= array("status" => "success");
           return $data;
         }else{
           $data= array("status" => "failure");
          return $data;
         }
       }




}
