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

        public function updateStudentData($id,$firstname,$lastname,$dob,$contact)
        {
            $data = [
                "id" => $id,
                "first_name" => $firstname,
                "last_name" => $lastname,
                "dob" => $dob,
                "contact" => $contact
            ];
            $isUpdate = $this->studentObj->updateStudent($data);
            return $isUpdate;
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
        if(isset($_POST['flagger']) && $_POST['flagger'] == 1)
        {
            $firstname = $_POST['first_name'];
            $lastname = $_POST['last_name'];
            $dob = $_POST['dob'];
            $contact = $_POST['contact'];
            if($_POST['id'] == 0)
            {
                $home->insertStudentData($firstname,$lastname,$dob,$contact);
            }
            else
            {
                $id = $_POST['id'];
                $home->updateStudentData($id,$firstname,$lastname,$dob,$contact);
            }
        }
        
        if(isset($_POST['flagger']) && $_POST['flagger'] == 2)
        {
           $home->deleteStudentData($_POST['delete']);
        }

    }

   
}
