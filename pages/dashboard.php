<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../includes/db.php';       // Kết nối CSDL
include '../includes/menu.php';   // Header + Menu

// Thêm sinh viên
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $name = trim($_POST['name']);
//     $age = intval($_POST['age']);
//     $major = trim($_POST['major']);

//     if (!empty($name) && !empty($major) && $age > 0) {
//         $stmt = $conn->prepare("INSERT INTO students (name, age, major) VALUES (?, ?, ?)");
//         $stmt->bind_param("sis", $name, $age, $major);
//         $stmt->execute();
//         header("Location: dashboard.php"); // Reload lại trang sau khi thêm
//         exit();
//     }
// }

// // Xóa sinh viên
// if (isset($_GET['delete'])) {
//     $id = intval($_GET['delete']);
//     $conn->query("DELETE FROM students WHERE id = $id");
//     header("Location: dashboard.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="main-content">
    <h2>Thêm Sinh Viên</h2>
    <form method="POST" class="form-container">
        <label>Tên:</label>
        <input type="text" name="name" required>
        <label>Tuổi:</label>
        <input type="number" name="age" required>
        <label>Ngành:</label>
        <input type="text" name="major" required>
        <button type="submit">Thêm</button>
    </form>

    <h2>Danh Sách Sinh Viên</h2>
    <table class="styled-table">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Tuổi</th>
            <th>Ngành</th>
            <th>Hành động</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM students ORDER BY id DESC");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo htmlspecialchars($row['major']); ?></td>
            <td>
                <a href="edit_student.php?id=<?php echo $row['id']; ?>">Sửa</a> |
                <a href="dashboard.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
