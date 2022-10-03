<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$num_per_page = 7;
$start_from = ($page - 1) * 7;

// $query = "select * from khach_hang limit $start_from,$num_per_page";
// $result = mysqli_query($conn, $query);
