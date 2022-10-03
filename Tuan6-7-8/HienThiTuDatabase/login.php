<?php
session_start();
require_once './db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserName = $_POST["username"];
    $PassWord = $_POST["password"];
    $getUser = "";
    $getPass = "";
    $getCustomerName = "";
    $query = "SELECT * FROM khach_hang WHERE UserName = '$UserName'";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        //load hang sua
        while ($row = mysqli_fetch_assoc($result)) {
            $getCustomerName = $row["TenKH"];
            $getUser =  $row["UserName"];
            $getPass =  $row["Password"];
        }
    }

    if ($UserName == $getUser && $PassWord == $getPass) {
        $_SESSION["customer_name"] = $getCustomerName;
        header("Location: home.php");
    } else {
        echo "Đã có lỗi xảy ra!";
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
    <div class='container mt-5'>
        <div class='row justify-content-center'>
            <div class='col-12 col-md-8 col-lg-6 col-xl-5'>
                <form action='' method='POST'>
                    <div class='mb-3 mt-3'>
                        <label class='form-label'>Tài khoản:</label>
                        <input type='text' class='form-control' id='' placeholder='Nhập tên tài khoản...' name='username' required />
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Mật khẩu:</label>
                        <input type='password' class='form-control' id='' placeholder='Nhập mật khẩu...' name='password' required />
                    </div>
                    <div class='form-check mb-3'>
                        <label class='form-check-label'>
                            <input class='form-check-input' type='checkbox' name='remember'> Remember me</label>
                    </div>
                    <button type='submit' class='btn btn-primary'>Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>