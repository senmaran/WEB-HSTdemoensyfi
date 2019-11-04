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
        $total_count=array('status'=>"error");
      }else{
        $result=$res->result();
        $total_count=array('status'=>"success","user_data"=>$result);
      }

      $query_student="SELECT count(admit_year) as student,ee.admit_year,DATE_FORMAT(ey.from_month,'%Y-%M') as from_year,DATE_FORMAT(ey.to_month,'%Y-%M') as to_year FROM edu_enrollment as ee left join edu_academic_year as ey on ey.year_id=ee.admit_year GROUP BY admit_year";
      $res_student    = $this->db->query($query_student);
      if($res_student->num_rows()==0){
        $year_based_student=array('status'=>"error");
      }else{
        $result_student=$res_student->result();
        $year_based_student=array('status'=>"success","year_stu_count"=>$result_student);
      }

      $response=array("status"=>"success","total_count"=>$total_count,"year_based_count"=>$year_based_student);
      return $response;
    }






}
?>
