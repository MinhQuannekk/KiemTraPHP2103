<?php include '../partials/header.php'; ?>
<h2>Xóa Sinh Viên</h2>
<p>Bạn có chắc chắn muốn xóa sinh viên <?= $sinhVien['HoTen'] ?> không?</p>
<form method="POST" action="../../controllers/SinhVienController.php?action=delete&maSV=<?= $sinhVien['MaSV'] ?>">
    <button type="submit">Xóa</button>
    <a href="index.php">Hủy</a>
</form>
<?php include '../partials/footer.php'; ?>