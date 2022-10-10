<?php
header("Content-type: text/html; charset=utf-8");
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ql_ban_sua';
$conn = mysqli_connect($server, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');
if ($conn->connect_error) {
    die("Kết nối db không thành công: " . $conn->connect_error);
}
