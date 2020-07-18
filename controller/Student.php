<?php 
namespace Controller\StudentController
{
    require "../config/autoload.php";
    require "../models/StudentModel.php";
    
    use \Model\StudentModel\StudentModel as StudentData;
    class Student extends StudentData
    {
        private $studentObj;

        public function __construct() 
        {

          $this->studentObj = StudentData::getInstance();
        }
    
        public function render_home()
        {
            $data = $this->studentObj->getAllStudents();
            render_view("header","header");
            render_view("student","student",$data);
            render_view("header","footer");
        }

        public function insertStudentData($firstname,$lastname,$dob,$contact)
        {
            $data = [
                    "first_name" => $firstname,
                    "last_name" => $lastname,
                    "dob" => $dob,
                    "contact" => $contact
            ];
           $isInsert = $this->studentObj->insertStudents($data);
           return $isInsert;
        }

        public function deleteStudentData($id)
        {
            $isDelete =  $this->studentObj->deleteStudent($id);
            return $isDelete;
        }

    }
 
    use Controller\StudentController\Student as Stu;
    $home = new Stu();
    $home->render_home();
    if(isset($_POST))
    {
       // $home = new Stu();
        if(isset($_POST['flagger']))
        {
            $firstname = $_POST['first_name'];
            $lastname = $_POST['first_name'];
            $dob = $_POST['dob'];
            $contact = $_POST['contact'];
           if($home->insertStudentData($firstname,$lastname,$dob,$contact))
           {
               echo "<script>alert('Student Created'); location.reload(true);</script>";
           }
        }
        else
        {
            return false;
           // $home->updateStudentData();
        }
    }

    if(isset($_GET))
    {
        if(isset($_GET['delete']))
        {
            print_r($_GET);
            exit;
            $isDelete = $home->deleteStudentData($_GET['delete']);
            if($isDelete)
            {
                echo "<script> alert('deleted'); </script>";
            }
        }
    }
}
