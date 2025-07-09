<?php
session_start();
include '../includes/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $age = intval($_POST['age']);
    $major = trim($_POST['major']);
    if (!empty($name) && !empty($major)) {
        $stmt = $conn->prepare("INSERT INTO students (name, age, major) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $name, $age, $major);
        $stmt->execute();
        header("Location: list_students.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm sinh viên</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<h2>Thêm Sinh Viên</h2>
<form method="POST">
    Tên: <input type="text" name="name" required><br>
    Tuổi: <input type="number" name="age" required><br>
    Ngành: <input type="text" name="major" required><br>
    <button type="submit">Thêm</button>
</form>
<a href="../includes/menu.php">⬅ Quay lại Menu</a>
</body>
</html>
