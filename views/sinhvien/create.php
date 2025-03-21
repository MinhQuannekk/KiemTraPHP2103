// views/sinhvien/create.php
<?php include '../partials/header.php'; ?>
<h2>Thêm Sinh Viên</h2>
<form method="POST" action="create.php">
    <input type="text" name="maSV" placeholder="Mã SV" required>
    <input type="text" name="hoTen" placeholder="Họ Tên" required>
    <select name="gioiTinh">
        <option value="Nam">Nam</option>
        <option value="Nữ">Nữ</option>
    </select>
    <input type="date" name="ngaySinh" required>
    <input type="file" name="hinh" required>
    <input type="text" name="maNganh" placeholder="Mã Ngành" required>
    <button type="submit">Thêm</button>
</form>
<?php include '../partials/footer.php'; ?>