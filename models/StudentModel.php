<?php 
namespace Model\StudentModel
{
    include_once 'Database.php';
    use Model\DatabaseModel\Database as DbCopy1;
    class StudentModel extends DbCopy1
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

        public function updateStudent($data)
        {
            $sql = "UPDATE studentregistration SET first_name ='".$data['first_name']."' , last_name = '".$data['last_name']."' ,dob = '".$data['dob']."' ,contact = '".$data['contact']."' WHERE id = '".$data['id']."'";
            $stmt =  $this->conn->prepare($sql);
            return $stmt->execute();
        }
    }
}
