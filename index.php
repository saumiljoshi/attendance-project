<?php 
$action = "";
if(!empty($_GET["action"])){
   $action = $_GET["action"];
}
 switch ($action) {
     case 'student-add':
         if(isset($_POST["add"])){
             $roll_number = $_post["roll_number"];
             $name = $_POST["name"];
             $class = $_POST["class"];

             $student = new Student();
             $insertID = $student->addStudent($roll_number,$name,$class);

             if(empty($insertID)){
                 $response = array("message" => "problem in adding new record", "type" => "error");
             }else{
                 header("Location:index.php");
             }
         }
         require_once("web/student.php");
         break;
         case 'student-delete':
           $student_id = $_GET["id"];
                $student = new Student();
                $student->deletestudent($student_id);
                $query = "delete from tbl_student where id = ?";
                $paramtype = "i";
                $paramvalue = array("student_id");
                $this->db_handle->update($query, $paramtype, $paramvalue);
         
            require_once("web/student.php");
            break;
            case 'student-edit':
                $student_id = $_GET["id"];
                     $student = new Student();
                     if (isset($_POST['add'])) {
                         $name = $_POST["name"];
                         $roll_number = $_POST["roll_number"];
                         $class = $_POST["class"];
                     
                     $student->editstudent($roll_number,$name,$class,$student_id);
                     header("Location:index.php");
                    }
                 break;
     default:
         $student = new Student();
         $result = $student->getallstudent();
         require_once("web/student.php");
         break;
 }
?>