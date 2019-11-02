<?php
Class Apisuperadminmodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }


    function get_all_staff_details($role_type_id)
    {
        $query = "SELECT teacher_id,role_type_id,name,status,created_at FROM edu_teachers WHERE role_type_id='$role_type_id'";
        $res    = $this->db->query($query);
        if($res->num_rows()==0){
          $data=array('status'=>"error");
        }else{
          $result=$res->result();
          $data=array('status'=>"success","staff_data"=>$result);
        }
        return $data;
    }



    function get_user_count(){
      $query="SELECT count(user_id) as user_count,eu.user_type,er.user_type_name from edu_users as eu left join edu_role as er on er.role_id=eu.user_type GROUP by eu.user_type";
      $res    = $this->db->query($query);
      if($res->num_rows()==0){
        $data=array('status'=>"error");
      }else{
        $result=$res->result();
        $data=array('status'=>"success","user_data"=>$result);
      }
      return $data;
    }






}
?>
