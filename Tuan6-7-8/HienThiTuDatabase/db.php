<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ql_ban_sua';
$conn = new mysqli($server, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối db không thành công: " . $conn->connect_error);
}