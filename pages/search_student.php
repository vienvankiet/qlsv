<?php
session_start();
include '../includes/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$keyword = '';
$students = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keyword = trim($_POST['keyword']);
    $stmt = $conn->prepare("SELECT * FROM students WHERE name LIKE ?");
    $search = "%$keyword%";
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $students = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tìm kiếm sinh viên</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<h2>Tìm Kiếm Sinh Viên</h2>
<form method="POST">
    Từ khóa: <input type="text" name="keyword" value="<?php echo htmlspecialchars($keyword); ?>" required>
    <button type="submit">Tìm</button>
</form>

<?php if (!empty($students) && $students->num_rows > 0) { ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Tuổi</th>
            <th>Ngành</th>
        </tr>
        <?php while ($row = $students->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['major']; ?></td>
            </tr>
        <?php } ?>
    </table>
<?php } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
    <p>Không tìm thấy kết quả.</p>
<?php } ?>

<a href="../includes/menu.php">⬅ Quay lại Menu</a>
</body>
</html>
