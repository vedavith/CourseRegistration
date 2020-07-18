<?php 
namespace Model\StudentModel
{
    require 'Database.php';
    use Model\DatabaseModel\Database as Db;
    class StudentModel extends Db
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

        public function getAllStudents()
        {
            $sql = "SELECT * FROM studentregistration ORDER BY id";
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
        public function insertStudents($data)
        {
            $getValues = $data;
            $sql = "INSERT INTO studentregistration (first_name,last_name,dob,contact)VALUES('".$data['first_name']."','".$data['last_name']."','".$data['dob']."','".$data['contact']."')";
            $stmt =  $this->conn->prepare($sql);
            return $stmt->execute();
        }

        public function deleteStudent($id)
        {
            $sql = "DELETE FROM studentregistration WHERE id = '".$id."'";
            $stmt =  $this->conn->prepare($sql);
            return $stmt->execute();
        }
    }
}
