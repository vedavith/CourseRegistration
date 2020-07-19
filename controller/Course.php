<?php 
namespace Controller\CourseController
{
    require "../config/autoload.php";
    require "../models/CourseModel.php";
    
    use \Model\CourseModel\CourseModel as CourseData;
    class Course extends CourseData
    {
        private $courseObj;

        public function __construct()
        {
            $this->courseObj = CourseData::getInstance();
        }

        public function render_home()
        {
            $data = $this->courseObj->getAllCourses();
            render_view("header","header");
            render_view("course","course",$data);
            render_view("header","footer");
        }

        public function insertCourseData($course,$description)
        {
            $data = [
                "course" => $course,
                "description" => $description
            ];
            
            $isInsert = $this->courseObj->insertCourse($data);
            return $isInsert;
        }

        public function updateCourseData($id,$course,$description)
        {
            $data = [
                "id" => $id,
                "course" => $course,
                "description" => $description
            ];
            $isUpdate = $this->courseObj->updateCourse($data);
            return $isUpdate;
        }

        public function deleteCourseData($id)
        {
            $isDelete = $this->courseObj->deleteCourse($id);
            return $isDelete;
        }
    }

    use Controller\CourseController\Course as Cou;
    $home = new Cou();
    $home->render_home();

    if(isset($_POST))
    {
        if(isset($_POST['flagger']) && $_POST['flagger'] == 1)
        {
            $course = $_POST['course'];
            $description = $_POST['description'];
            if($_POST['id'] == 0)
            {
                $home->insertCourseData($course,$description);
            }
            else
            {
                $id = $_POST['id'];
                $home->updateCourseData($id,$course,$description);
            }
        }
        
        if(isset($_POST['flagger']) && $_POST['flagger'] == 2)
        {
           $home->deleteCourseData($_POST['delete']);
        }
    }
}