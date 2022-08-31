<?php require_once './header.php' ?>

<body>
    <div class="container mt-5">
        <div class="d-flex align-content-stretch flex-wrap">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $dir_path = "";
                $width = "";
                $height = "";
                $extensions_array = array('jpg', 'png', 'jpeg');

                $chonLoai = $_POST["thuMucHinh"];
                $kichCo = $_POST["kichCo"];

                switch ($chonLoai) {
                    case 'Hoa':
                        $dir_path = "./images/hoa/";
                        break;
                    case 'Cho':
                        $dir_path = "./images/cho/";
                        break;
                    case 'nguoi':
                        $dir_path = "./images/nguoi/";
                        break;
                }
                switch ($kichCo) {
                    case '100x100':
                        $width = "100px";
                        $height = "100px";
                        break;
                    case '128x128':
                        $width = "128px";
                        $height = "128px";
                        break;
                    case '170x170':
                        $width = "170px";
                        $height = "170px";
                        break;
                    case '180x180':
                        $width = "180px";
                        $height = "180px";
                        break;
                }
                if (is_dir($dir_path)) {
                    $files = scandir($dir_path);

                    for ($i = 0; $i < count($files); $i++) {
                        if ($files[$i] != '.' && $files[$i] != '..') {
                            // get file name
                            // echo "File Name -> $files[$i]<br>";
                            // get file extension
                            $file = pathinfo($files[$i]);
                            $extension = $file['extension'];
                            // echo "File Extension-> $extension<br>";

                            // check file extension
                            if (in_array($extension, $extensions_array)) {
                                // show image
                                echo "<img src='$dir_path$files[$i]' style='width:$width;height:$height;'>";
                            }
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
    <?php require_once './footer.php' ?>
</body>

</html>