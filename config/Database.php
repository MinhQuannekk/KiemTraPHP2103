<?php
class Database
{
    private $host = "localhost:3306";
    private $db_name = "Test1";
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");

            echo "Kết nối thành công!";
        } catch (PDOException $exception) {
            die("Kết nối thất bại: " . $exception->getMessage());
        }

        return $this->conn;
    }
}
