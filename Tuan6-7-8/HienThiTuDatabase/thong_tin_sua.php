<?php
require_once './db.php';
require_once './phantrang.php';
$query = "SELECT tths.MaSua, tths.TenSua, hs.TenHS, ls.TenLoaiSua, tths.TrongLuong, tths.DonGia, tths.TPDD, tths.LoiIch, tths.HinhAnh FROM hang_sua as hs, thong_tin_sua as tths, loai_sua as ls Where hs.MaHS = tths.HangSua and ls.MaLoaiSua = tths.LoaiSua limit $start_from,$num_per_page";
$result = mysqli_query($conn, $query);
// 
require_once './header.php';
?>
<!-- content -->
<div class='container'>
    <div class="row">
        <div class="col-12">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                Thêm sữa mới
            </button>
            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">THÊM SỮA MỚI</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="./ketquaThem.php" method='POST' class="row g-3" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <label class='form-label'>Mã sữa:</label>
                                    <input type='text' class='form-control' id='' placeholder='NTF008' name='MaSua' required />
                                </div>
                                <div class="col-md-6">
                                    <label class='form-label'>Tên sữa:</label>
                                    <input type='text' class='form-control' id='' placeholder='Sunny Maman Chocolate' name='TenSua' required />
                                </div>
                                <div class="col-md-6">
                                    <label class='form-label'>Hẵng sữa:</label>
                                    <select class='form-select' name="HangSua" id='' required>
                                        <option value="Nutifood">Nutifood</option>
                                        <option value="Vinamilk">Vinamilk</option>
                                        <option value="Daisy">Daisy</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class='form-label'>Loại sữa:</label>
                                    <select class='form-select' name="LoaiSua" id='' required>
                                        <option value="SuaChua">Sữa chua</option>
                                        <option value="SuaKhongDuong">Sữa không đường</option>
                                        <option value="SuaTuoi">Sữa tươi</option>
                                        <option value="SuaTietTrung">Sữa tiệt trùng</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class='form-label'>Trọng lượng:</label>
                                    <input type='number' class='form-control' id='' placeholder='800gr' name='TrongLuong' required />
                                </div>
                                <div class="col-md-6">
                                    <label class='form-label'>Đơn giá:</label>
                                    <input type='number' class='form-control' id='' placeholder='166000đ' name='DonGia' required />
                                </div>
                                <div class="col-md-6">
                                    <label class='form-label'>Thành phần dinh dưỡng:</label>
                                    <textarea class='form-control' rows="3" id='' placeholder='Các vitamin, khoáng chất, canxi, folicacid, DHA...' name='TPDD' required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class='form-label'>Lợi ích:</label>
                                    <textarea class='form-control' rows="3" id='' placeholder='Bổ sung các chất dinh dưỡng dành cho phụ nữ có thai và cho con bú' name='LoiIch' required></textarea>
                                </div>
                                <div class="col-12">
                                    <label class='form-label'>Hình ảnh:</label>
                                    <input type="file" class="form-control" name="HinhAnh" required />
                                </div>
                                <div class="col-12 text-center">
                                    <button type='submit' class='btn btn-primary'>Thêm mới</button>
                                </div>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
            <h1 class="text-center">Thông tin sữa</h1>
            <!-- table-striped -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã sữa</th>
                        <th scope="col">Tên sữa</th>
                        <th scope="col">Hẵng sữa</th>
                        <th scope="col">Loại sữa</th>
                        <th scope="col">Trọng lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Thành phần dinh dưỡng</th>
                        <th scope="col">Lợi ích</th>
                        <th scope="col">Hình ảnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $style = array('even', 'odd');
                    if ($result->num_rows > 0) {
                        $index = 1;
                        $stt = 1;
                        //load khach hang
                        while ($row = mysqli_fetch_assoc($result)) {
                            $hinh_anh = $row["HinhAnh"];
                            echo
                            "<tr class=" . $style[$index % 2] . ">
                                <th scope='col'>" . $stt . "</th>
                                <th>" . $row['MaSua'] . "</th>
                                <td>" . $row['TenSua'] . "</td>
                                <td>" . $row['TenHS'] . "</td>
                                <td>" . $row['TenLoaiSua'] . "</td>
                                <td>" . $row['TrongLuong'] . "gr" . "</td>
                                <td>" . $row['DonGia'] . "đ" . "</td>
                                <td>" . $row['TPDD'] . "</td>
                                <td>" . $row['LoiIch'] . "</td>
                                <td>" . "<img src='uploads/$hinh_anh' alt='' width='70' height='70'>" . "</td>
                                <td>
                                    <div class='d-flex flex-row  mb-3'>
                                        <div><a href=''><button type='button' class='btn btn-success'><i class='fas fa-edit'></i></button></a></div>
                                        <div><a href=''><button type='button' class='btn btn-danger'><i class='far fa-trash-alt'></i></button></a></div>
                                    </div>
                                </td>
                            </tr>";
                            $index++;
                            $stt++;
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="container mt-3">
                <?php
                $pr_query = "SELECT tths.MaSua, tths.TenSua, hs.TenHS, ls.TenLoaiSua, tths.TrongLuong, tths.DonGia, tths.TPDD, tths.LoiIch, tths.HinhAnh FROM hang_sua as hs, thong_tin_sua as tths, loai_sua as ls Where hs.MaHS = tths.HangSua and ls.MaLoaiSua = tths.LoaiSua";
                $pr_result = mysqli_query($conn, $pr_query);
                $total_record = mysqli_num_rows($pr_result);

                $total_page = ceil($total_record / $num_per_page);

                if ($page > 1) {
                    echo "<a href='thong_tin_sua.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous</a>";
                }


                for ($i = 1; $i < $total_page; $i++) {
                    echo "<a href='thong_tin_sua.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
                }

                if ($i > $page) {
                    echo "<a href='thong_tin_sua.php?page=" . ($page + 1) . "' class='btn btn-danger'>Next</a>";
                }

                ?>
            </div>
        </div>
    </div>
</div>
<?php require_once './footer.php'; ?>