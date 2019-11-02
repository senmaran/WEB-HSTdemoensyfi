<?php
Class Apisuperadminmodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }


    function get_all_staff_details()
    {
        $query = "SELECT teacher_id,role_type_id,name,status,created_at FROM edu_teachers";
        $res    = $this->db->query($query);
        return $res->result();
    }


    



}
?>
