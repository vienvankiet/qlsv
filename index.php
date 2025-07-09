<?php
session_start();

// Nếu đã đăng nhập thì chuyển vào dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: pages/dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên - Trang Chủ</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <header class="header">
        <div class="logo">
            <img src="assets/images/logo.png" alt="Logo QLSV">
            <h1>Hệ Thống Quản Lý Sinh Viên</h1>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="pages/login.php">Đăng Nhập</a></li>
                <li><a href="pages/register.php">Đăng Ký</a></li>
            </ul>
        </nav>
        <button id="mode-toggle">🌙</button>
    </header>

    <main class="main-content">
        <h2>Chào mừng bạn đến với hệ thống Quản Lý Sinh Viên</h2>
        <p>Đăng nhập để sử dụng các chức năng quản lý sinh viên.</p>
    </main>

    <footer class="footer">
        <p>&copy; 2025 Quản Lý Sinh Viên. All rights reserved.</p>
    </footer>

    <script>
        const modeToggle = document.getElementById('mode-toggle');
        modeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
        });
    </script>

</body>
</html>
