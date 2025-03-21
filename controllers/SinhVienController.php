<?php
require_once __DIR__ . '/../models/SinhVien.php';


class SinhVienController
{
    private $model;

    public function __construct()
    {
        $this->model = new SinhVien();
    }

    public function index()
    {
        $students = $this->model->getAll(); // Lấy danh sách sinh viên từ model
        include __DIR__ . '/../views/sinhvien/index.php'; // Đảm bảo đường dẫn đúng
    }


    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->model->create($_POST['maSV'], $_POST['hoTen'], $_POST['gioiTinh'], $_POST['ngaySinh'], $_POST['hinh'], $_POST['maNganh']);
            header("Location: index.php");
            exit();
        }
        include "views/sinhvien/create.php";
    }

    public function edit($maSV)
    {
        $sinhVien = $this->model->getById($maSV);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->model->update($maSV, $_POST['hoTen'], $_POST['gioiTinh'], $_POST['ngaySinh'], $_POST['hinh'], $_POST['maNganh']);
            header("Location: index.php");
            exit();
        }
        include "views/sinhvien/edit.php";
    }

    public function delete($maSV)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->model->delete($maSV);
            header("Location: index.php");
            exit();
        }
        $sinhVien = $this->model->getById($maSV);
        include "views/sinhvien/delete.php";
    }

    public function detail($maSV)
    {
        $sinhVien = $this->model->getById($maSV);
        include "views/sinhvien/detail.php";
    }
}
