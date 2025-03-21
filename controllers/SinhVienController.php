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
        $students = $this->model->getAll();
        include __DIR__ . '/../views/sinhvien/index.php';
    }




    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSV = $_POST['maSV'] ?? null;
            $hoTen = $_POST['hoTen'] ?? null;
            $gioiTinh = $_POST['gioiTinh'] ?? null;
            $ngaySinh = $_POST['ngaySinh'] ?? null;
            $maNganh = $_POST['maNganh'] ?? null;

            // Kiểm tra lỗi upload file
            $hinh = null;
            if (!empty($_FILES['hinh']['name'])) {
                $uploadDir = __DIR__ . '/../uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileName = time() . "_" . basename($_FILES['hinh']['name']);
                $targetPath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $targetPath)) {
                    $hinh = $fileName;
                } else {
                    die("Lỗi khi tải ảnh lên.");
                }
            }

            // Kiểm tra dữ liệu trước khi insert
            if (!$maSV || !$hoTen || !$gioiTinh || !$ngaySinh || !$maNganh) {
                die("Vui lòng nhập đầy đủ thông tin.");
            }

            // Gọi model để lưu vào DB
            if ($this->model->create($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh)) {
                header("Location: index.php");
                exit();
            } else {
                die("Lỗi khi thêm dữ liệu vào DB.");
            }
        }

        include __DIR__ . '/../views/sinhvien/create.php';
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
