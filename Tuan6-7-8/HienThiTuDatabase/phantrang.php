<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$num_per_page = 02;
$start_from = ($page - 1) * 02;

// $query = "select * from khach_hang limit $start_from,$num_per_page";
// $result = mysqli_query($conn, $query);
