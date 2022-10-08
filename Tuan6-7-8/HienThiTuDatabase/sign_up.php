<?php
require_once './db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['termOfService']) && $_POST['termOfService'] == "yes") {
        $MaKH = $_POST["MaKH"];
        $TenKH = $_POST["TenKH"];
        $UserName = $_POST["UserName"];
        $getPassword = $_POST["Password"];
        $Confirm_password = $_POST["Confirm_password"];
        $Password = "";
        if ($getPassword == $Confirm_password) {
            $Password = $getPassword;
        } else {
            die("<script> alert('Mật khẩu không khớp!'); </script>");
        }
        $getGioiTinh = $_POST["GioiTinh"];
        $GioiTinh = "";
        if ($getGioiTinh == "Nam") {
            $GioiTinh = "0";
        } elseif ($getGioiTinh == "Nu") {
            $GioiTinh = "1";
        } else {
            $GioiTinh = "2";
        }
        $DiaChi = $_POST["DiaChi"];
        $DienThoai = $_POST["DienThoai"];
        $query = "INSERT INTO `khach_hang`(`MaKH`, `TenKH`, `UserName`, `Password`, `GioiTinh`, `DiaChi`, `DienThoai`) VALUES ('$MaKH','$TenKH','$UserName','$Password','$GioiTinh','$DiaChi','$DienThoai')";
        if (mysqli_query($conn, $query)) {
            echo "<script> alert('Đăng ký thành công!'); </script>";
            header("Location: login.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo "Bạn phải đồng ý với điều khoản của chúng tôi.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* .gradient-custom {
            background: #f093fb;
            background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));
            background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
        } */

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }
    </style>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Đăng ký tài khoản</h3>
                            <form action="" method="post">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label">Mã khách hàng</label>
                                            <input type="text" class="form-control form-control-lg" placeholder="KH001" name="MaKH" required />
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label">Tên khách hàng</label>
                                            <input type="text" class="form-control form-control-lg" placeholder="Tên khách hàng?" name="TenKH" required />
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label class="form-label">Tên tài khoản</label>
                                            <input type="text" class="form-control form-control-lg" placeholder="Tên tài khoản?" name="UserName" required />
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <h6 class="mb-2 pb-1">Giới tính: </h6>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">Nữ</label>
                                            <input class="form-check-input" type="radio" name="GioiTinh" value="Nu" />
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">Nam</label>
                                            <input class="form-check-input" type="radio" name="GioiTinh" value="Nam" />
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">Khác</label>
                                            <input class="form-check-input" type="radio" name="GioiTinh" value="Khac" />
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control form-control-lg" placeholder="Nhập địa chỉ..." name="DiaChi" required />
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label">Số điện thoại</label>
                                            <input type="tel" class="form-control form-control-lg" placeholder="Số điện thoại?" name="DienThoai" required />
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label">Mật khẩu</label>
                                            <input type="password" class="form-control form-control-lg" placeholder="Nhập mật khẩu..." name="Password" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label">Nhập lại mật khẩu</label>
                                            <input type="password" class="form-control form-control-lg" placeholder="Nhập lại mật khẩu..." name="Confirm_password" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input me-2" type="checkbox" value="yes" name="termOfService" />
                                    <label class="form-check-label">
                                        Tôi đồng ý tất cả các <a href="#">Điều khoản dịch vụ</a>
                                    </label>
                                </div>
                                <div class="text-center mt-4 pt-2">
                                    <button type="submit" class="btn btn-primary btn-lg">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>