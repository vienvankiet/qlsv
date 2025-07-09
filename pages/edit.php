<!-- <?php
// session_start();
// include 'db.php';

// // Kiểm tra đăng nhập
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

// Lấy ID sinh viên từ URL
// if (!isset($_GET['id'])) {
//     header("Location: dashboard.php");
//     exit();
// }

// $id = intval($_GET['id']);

// // Xử lý khi nhấn nút Cập nhật
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $name = trim($_POST['name']);
//     $age = intval($_POST['age']);
//     $major = trim($_POST['major']);

//     $stmt = $conn->prepare("UPDATE students SET name = ?, age = ?, major = ? WHERE id = ?");
//     $stmt->bind_param("sisi", $name, $age, $major, $id);

//     if ($stmt->execute()) {
//         header("Location: dashboard.php");
//         exit();
//     } else {
//         echo "❌ Lỗi cập nhật.";
//     }
// }

// Lấy dữ liệu sinh viên hiện tại để hiển thị
// $stmt = $conn->prepare("SELECT name, age, major FROM students WHERE id = ?");
// $stmt->bind_param("i", $id);
// $stmt->execute();
// $stmt->bind_result($name, $age, $major);
// $stmt->fetch();
// ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sửa sinh viên</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Sửa Thông Tin Sinh Viên</h2>
<form method="POST">
    Tên: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required><br>
    Tuổi: <input type="number" name="age" value="<?php echo $age; ?>" required><br>
    Ngành: <input type="text" name="major" value="<?php echo htmlspecialchars($major); ?>" required><br>
    <button type="submit">Cập nhật</button>
</form>

<br>
<a href="dashboard.php">Quay lại danh sách</a>

</body>
</html> -->