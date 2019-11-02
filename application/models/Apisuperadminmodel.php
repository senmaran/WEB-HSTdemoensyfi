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






}
?>
