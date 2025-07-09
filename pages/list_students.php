<?php
session_start();
include '../includes/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<h2>Danh Sách Sinh Viên</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Tuổi</th>
        <th>Ngành</th>
        <th>Hành động</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM students");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['age']}</td>
            <td>{$row['major']}</td>
            <td>
                <a href='edit_student.php?id={$row['id']}'>Sửa</a> |
                <a href='delete_student.php?id={$row['id']}' onclick=\"return confirm('Xóa sinh viên này?');\">Xóa</a>
            </td>
        </tr>";
    }
    ?>
</table>
<a href="../includes/menu.php">⬅ Quay lại Menu</a>
</body>
</html>
