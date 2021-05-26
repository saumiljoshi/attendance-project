<?php 
require_once("class/dbcontroller.php");
class student {
    private $db_handle;

    function __construct(){
        $this->db_handle = new dbcontroller();
    }
    function addStudent($roll_number,$name,$class){
        $query = "INSERT INTO tbl_student(roll_number,name,class) VALUES(?,?,?)";
        $paramtype = "sis";
        $paramvalue = array($roll_number,$name,$class);

        $insertID = $this->db_handle->insert($query,$paramtype,$paramvalue);
        return $insertID;
    }
    function getallStudent(){
        $sql = "SELECT * FROM tbl_student order by id";
        $result = $this->dbhandle->runbasequery($sql);
        return $result;
    }
    function deletestudent($student_id){
          $query = "DELETE FROM tbl_student WHERE id = ?";
          $paramtype = "i";
          $paramvalue = array($student_id);
          $this->db_handle->update($query,$paramtype,$paramvalue);
    }
    function editstudent($roll_number,$name,$class,$student_id)
    {
       $query = "UPDATE  tbl_student SET roll_number=?, name=?, class=? where id = ?";
       $paramtype = "i";
       $paramvalue = array($roll_number,$name,$class,$student_id);
       $this->db_handle->update($query,$paramtype,$paramvalue);
    }
}
?>