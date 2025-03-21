// views/sinhvien/detail.php
<?php include '../partials/header.php'; ?>
<h2>Chi tiết Sinh Viên</h2>
<p>Mã SV: <?= $sinhVien['MaSV'] ?></p>
<p>Họ Tên: <?= $sinhVien['HoTen'] ?></p>
<p>Giới Tính: <?= $sinhVien['GioiTinh'] ?></p>
<p>Ngày Sinh: <?= $sinhVien['NgaySinh'] ?></p>
<p><img src="../uploads/<?= $sinhVien['Hinh'] ?>" width="100"></p>
<p>Mã Ngành: <?= $sinhVien['MaNganh'] ?></p>
<a href="index.php">Quay lại</a>
<?php include '../partials/footer.php'; ?>