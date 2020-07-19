<?php
namespace Model\RegistrationModel
{
    include_once 'Database.php';
    use \PDOException;
    use Model\DatabaseModel\Database as DbCopy3;
    class RegistrationModel extends DbCopy3
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

        public function getAllRegistrations()
        {
            $sql = "SELECT reg.id AS RegistrationID, sr.first_name AS FirstName, sr.last_name AS LastName, cm.course AS Course FROM studentcourseregistration AS reg JOIN studentregistration AS sr ON sr.id = reg.studentid JOIN coursemaster AS cm ON cm.id = reg.courseid ORDER BY reg.id";
            try
            {
                $stmt = $this->conn->query($sql);
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            }
            catch(\PDOException $ex  )
            {
                print_r($ex->getMessage());
                exit;
            }
        }
    }
}