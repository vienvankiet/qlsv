<?php
session_start();
include '../includes/db.php';
include '../includes/menu.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT name, age, major FROM students WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($name, $age, $major);
$stmt->fetch();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_name = trim($_POST['name']);
    $new_age = intval($_POST['age']);
    $new_major = trim($_POST['major']);
    $stmt = $conn->prepare("UPDATE students SET name=?, age=?, major=? WHERE id=?");
    $stmt->bind_param("sisi", $new_name, $new_age, $new_major, $id);
    $stmt->execute();
    header("Location: list_students.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa sinh viên</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<h2>Sửa Sinh Viên</h2>
<form method="POST">
    Tên: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required><br>
    Tuổi: <input type="number" name="age" value="<?php echo $age; ?>" required><br>
    Ngành: <input type="text" name="major" value="<?php echo htmlspecialchars($major); ?>" required><br>
    <button type="submit">Cập nhật</button>
</form>
<a href="../includes/menu.php">⬅ Quay lại Menu</a>
</body>
</html>
