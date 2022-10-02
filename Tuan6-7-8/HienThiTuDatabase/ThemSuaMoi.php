<?php require_once './header.php'; ?>
<!-- content -->
<div class='container mt-5 text-bg-danger p-3'>
    <div class='row justify-content-center'>
        <h1 class="text-center">THÊM SỮA MỚI</h1>
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
</div>
<?php require_once './footer.php'; ?>