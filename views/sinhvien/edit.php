// views/sinhvien/edit.php
<?php include '../partials/header.php'; ?>
<h2>Chỉnh sửa Sinh Viên</h2>
<form method="POST" action="edit.php?maSV=<?= $sinhVien['MaSV'] ?>">
    <input type="text" name="hoTen" value="<?= $sinhVien['HoTen'] ?>" required>
    <select name="gioiTinh">
        <option value="Nam" <?= $sinhVien['GioiTinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
        <option value="Nữ" <?= $sinhVien['GioiTinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
    </select>
    <input type="date" name="ngaySinh" value="<?= $sinhVien['NgaySinh'] ?>" required>
    <input type="file" name="hinh">
    <input type="text" name="maNganh" value="<?= $sinhVien['MaNganh'] ?>" required>
    <button type="submit">Cập Nhật</button>
</form>
<?php include '../partials/footer.php'; ?>