<?php 
namespace Model\DatabaseModel
{   
    use \PDO;
    use \PDOException;
    Class Database
    {
        private $conn;
        public function __construct()
        {
           return $this->DbConnect();
        }

        private function DbConnect()
        {
            $dsn = 'mysql:dbname=studentcourse;host=localhost';
            $user = 'root';
            $password = '';

            try 
            {
                return $this->conn = new PDO($dsn, $user, $password);
            } 
            catch (PDOException $e) 
            {
                return $this->conn = $e->getMessage();
            }
        }

    }
}
?>