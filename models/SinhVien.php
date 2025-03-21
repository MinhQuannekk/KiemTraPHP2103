<?php
require_once __DIR__ . "/../config/Database.php";


class SinhVien
{
    private $conn;
    private $table = "SinhVien";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // public function getAll()
    // {
    //     $query = "SELECT * FROM " . $this->table;
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<pre>";
        print_r($result);
        echo "</pre>";

        return $result;
    }


    public function getById($maSV)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maSV", $maSV);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh)
    {
        $query = "INSERT INTO " . $this->table . " (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                  VALUES (:maSV, :hoTen, :gioiTinh, :ngaySinh, :hinh, :maNganh)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maSV", $maSV);
        $stmt->bindParam(":hoTen", $hoTen);
        $stmt->bindParam(":gioiTinh", $gioiTinh);
        $stmt->bindParam(":ngaySinh", $ngaySinh);
        $stmt->bindParam(":hinh", $hinh);
        $stmt->bindParam(":maNganh", $maNganh);
        return $stmt->execute();
    }

    public function update($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh)
    {
        $query = "UPDATE " . $this->table . " SET 
                  HoTen = :hoTen, GioiTinh = :gioiTinh, NgaySinh = :ngaySinh, Hinh = :hinh, MaNganh = :maNganh
                  WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maSV", $maSV);
        $stmt->bindParam(":hoTen", $hoTen);
        $stmt->bindParam(":gioiTinh", $gioiTinh);
        $stmt->bindParam(":ngaySinh", $ngaySinh);
        $stmt->bindParam(":hinh", $hinh);
        $stmt->bindParam(":maNganh", $maNganh);
        return $stmt->execute();
    }

    public function delete($maSV)
    {
        $query = "DELETE FROM " . $this->table . " WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maSV", $maSV);
        return $stmt->execute();
    }
}
