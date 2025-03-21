<?php
require_once __DIR__ . "/../config/Database.php";


class NganhHoc
{
    private $conn;
    private $table = "NganhHoc";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($maNganh, $tenNganh)
    {
        $query = "INSERT INTO " . $this->table . " (MaNganh, TenNganh) VALUES (:maNganh, :tenNganh)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maNganh", $maNganh);
        $stmt->bindParam(":tenNganh", $tenNganh);
        return $stmt->execute();
    }
}
