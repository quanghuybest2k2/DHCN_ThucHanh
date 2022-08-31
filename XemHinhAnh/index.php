<?php require_once './header.php' ?>

<body>
    <div class='container mt-5'>
        <div class='row justify-content-center'>
            <div class='col-12 col-md-8 col-lg-6 col-xl-5'>
                <form action='./XuLy.php' method='POST' style="background-color: #bbeedb;">
                    <h4 class="text-center" style="background-color: #339999;">XEM THƯ MỤC HÌNH ẢNH</h4>
                    <div class='form-group'>
                        <label>Chọn thư mục hình:</label>
                        <select name="thuMucHinh" id="thuMucHinh" class="form-select">
                            <option value="Hoa">Hoa</option>
                            <option value="Cho">Chó</option>
                            <option value="nguoi">Con người</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label>Kích cỡ hiển thị:</label>
                        <select name="kichCo" id="kichCo" class="form-select">
                            <option value="100x100">100x100</option>
                            <option value="128x128">128x128</option>
                            <option value="170x170">170x170</option>
                            <option value="180x180">180x180</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type='submit' class='btn btn-primary'>Xem hình ảnh</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require_once './footer.php' ?>
</body>

</html>