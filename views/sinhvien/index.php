<?php include '../partials/header.php'; ?>

<h2>Danh sách Sinh Viên</h2>
<a href="create.php">Thêm Sinh Viên</a>

<?php if (!empty($students) && is_array($students)): ?>
    <table border="1">
        <tr>
            <th>Mã SV</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Hình</th>
            <th>Ngành</th>
            <th>Hành Động</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['MaSV']) ?></td>
                <td><?= htmlspecialchars($student['HoTen']) ?></td>
                <td><?= htmlspecialchars($student['GioiTinh']) ?></td>
                <td><?= htmlspecialchars($student['NgaySinh']) ?></td>
                <td><img src="../uploads/<?= htmlspecialchars($student['Hinh']) ?>" width="50"></td>
                <td><?= htmlspecialchars($student['MaNganh']) ?></td>
                <td>
                    <a href="detail.php?maSV=<?= $student['MaSV'] ?>">Chi tiết</a> |
                    <a href="edit.php?maSV=<?= $student['MaSV'] ?>">Sửa</a> |
                    <a href="delete.php?maSV=<?= $student['MaSV'] ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Không có sinh viên nào.</p>
<?php endif; ?>

<?php include '../partials/footer.php'; ?>