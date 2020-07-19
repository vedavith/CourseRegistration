<?php
namespace Model\CourseModel
{
    require 'Database.php';
    use Model\DatabaseModel\Database as Db;
    class CourseModel extends Db
    {
        private $conn;
        private static $instance;
        private function __construct()
        {
            $this->conn = parent::__construct();
        }

        public static function getInstance()
        {
            if ( is_null( self::$instance ) )
            {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function getAllCourses()
        {
            $sql = "SELECT * FROM coursemaster ORDER BY id";
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

        public function insertCourse($data)
        {
            $sql = "INSERT INTO coursemaster (course,description)VALUES('".$data['course']."','".$data['description']."')";
            $stmt =  $this->conn->prepare($sql);
            return $stmt->execute();
        }

        public function deleteCourse($id)
        {
            $sql = "DELETE FROM coursemaster WHERE id = '".$id."'";
            $stmt =  $this->conn->prepare($sql);
            return $stmt->execute();
        }

        public function updateCourse($data)
        {
            $sql = "UPDATE coursemaster SET course ='".$data['course']."' , description = '".$data['description']."' WHERE id = '".$data['id']."'";
            $stmt =  $this->conn->prepare($sql);
            return $stmt->execute();
        }
    }
}