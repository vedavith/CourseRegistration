<?php 
namespace Controller\RegistrationController
{
    require "../config/autoload.php";
    require "../models/RegistrationModel.php";
    require "../models/CourseModel.php";
    require "../models/StudentModel.php";

    use Model\CourseModel\CourseModel;
    use \Model\RegistrationModel\RegistrationModel as RegData;
    use Model\StudentModel\StudentModel;

class Registration extends RegData
    {
        private $RegObject;
        private $courseObj;
        private $studentObj;

        public function __construct()
        {
            $this->RegObject = RegData::getInstance();
            $this->courseObj = CourseModel::getInstance();
            $this->studentObj = StudentModel::getInstance();
        }

        public function render_home()
        {
            $data['registrationData'] = $this->RegObject->getAllRegistrations();
            $data['studentData'] = $this->studentObj->getAllStudents();
            $data['courseData'] = $this->courseObj->getAllCourses();
            
            render_view("header","header");
            render_view("registration","registration",$data);
            render_view("header","footer");
        }
    }

    use Controller\RegistrationController\Registration as Reg;
    $home = new Reg();
    $home->render_home();

   
}