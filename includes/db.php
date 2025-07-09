<?php
$host = "localhost";
$user = "root";
$pass = ""; // Mặc định XAMPP không có mật khẩu
$dbname = "qlsv1";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
// Thiết lập mã hóa ký tự
$conn->set_charset("utf8");
