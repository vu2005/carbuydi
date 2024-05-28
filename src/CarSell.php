<?php
require_once('../config/config.php');
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0; // Kiểm tra nếu biến user_id được truyền qua POST

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!is_numeric($_POST["mileage"])) {
        // Nếu không phải số, hiển thị cảnh báo và không thêm vào cơ sở dữ liệu
        echo '<div class="toast warning">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo '<span class="msg">Số km chỉ được nhập số!</span>';
        echo '</div>';
        echo '<script>
         document.addEventListener("DOMContentLoaded", function () {
             const toast = document.querySelector(".toast");
             setTimeout(function () {
                 toast.style.display = "none";
             }, 2000);
         });
      </script>';
    } else {
        $make = $_POST["make"];
        $version = $_POST["version"];
        $mileage = $_POST["mileage"];
        $model = $_POST["model"];
        $year = $_POST["year"];
        $phone = $_POST["phone"];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $posted_date = date("Y-m-d H:i:s");

        $sql = "INSERT INTO users_sell_cars (make, version, mileage, model, year, phone, posted_date) 
                VALUES ('$make', '$version', '$mileage', '$model', '$year', '$phone', '$posted_date')";
        if ($conn->query($sql) === TRUE) {
            // Kiểm tra nếu user_id lớn hơn 0 thì hiển thị thông báo thành công
            if ($user_id == 0) {
                echo '<div class="toast warning">';
                echo '<i class="fas fa-exclamation-triangle"></i>';
                echo '<span class="msg">Vui lòng đăng nhập để tiếp tục!</span>';
                echo '</div>';
                echo '<script>
             document.addEventListener("DOMContentLoaded", function () {
                 const toast = document.querySelector(".toast");
                 setTimeout(function () {
                     toast.style.display = "none";
                 }, 2000);
             });
          </script>';
            } else {
                echo '<div class="toast success">';
                echo '<i class="fas fa-check-circle"></i>';
                echo '<span class="msg">Thông tin đã được gửi thành công!</span>';
                echo '</div>';
                echo '<script>
             document.addEventListener("DOMContentLoaded", function () {
                 const toast = document.querySelector(".toast");
                 setTimeout(function () {
                     toast.style.display = "none";
                 }, 2000);
             });
          </script>';
            }
        } else {
            // Hiển thị thông báo lỗi nếu có lỗi xảy ra khi thêm dữ liệu vào cơ sở dữ liệu
            echo '<div class="toast warning">';
            echo '<i class="fas fa-exclamation-triangle"></i>';
            echo '<span class="msg">Đã xảy ra lỗi!</span>';
            echo '</div>';
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/about.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/list-car.css">
    <link rel="stylesheet" href="../assets/css/toast.css">
    <link rel="stylesheet" href="../assets/css/ban-xe.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <?php
    require_once("header.php");
    ?>
    <div class="ban-xe-all">
        <div class="ban-xe">
            <div class="ban-xe1">
                <form class="flex-banxe" action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-bx0">
                        <h3>Nhập thông tin chi tiết của bạn và nhận giá xe của bạn ngay lập tức</h3>
                        <div class="ban-xe-sp">
                            <div class="form-bx" style="margin-right: 11px;">
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" required>
                                <label for="make">Hãng xe:</label>
                                <select id="make" name="make" required>
                                    <option value="" selected disabled>Chọn hãng xe</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                                    <option value="Ford">Ford</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Chevrolet">Chevrolet</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Kia">Kia</option>
                                    <option value="Mazda">Mazda</option>
                                    <option value="VinFast">VinFast</option>
                                </select>
                                <label for="version">Phiên bản:</label>
                                <select id="version" name="version" required>
                                    <option value="" selected disabled hidden>Chọn phiên bản xe</option>
                                    <option value="Cao cấp">Cao cấp</option>
                                    <option value="Nâng cao">Nâng cao</option>
                                    <option value="Tiêu chuẩn">Tiêu chuẩn</option>
                                    <option value="Khác">Khác</option>
                                </select><br>

                                <label for="mileage">Số KM:</label>
                                <input type="text" id="mileage" name="mileage" placeholder="Nhập số km đã đi" required>
                            </div>
                            <div class="form-bx">
                                <label for="model">Dòng xe:</label>
                                <select id="model" name="model" required>
                                    <option value="" selected disabled>Chọn dòng xe</option>
                                    <!-- Các tùy chọn dòng xe -->
                                </select>

                                <label for="year">Năm sản xuất:</label>
                                <input type="text" id="year" name="year" placeholder="Nhập năm sản xuất" required><br>

                                <label for="phone">Số điện thoại:</label>
                                <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" required><br>
                            </div>
                        </div>
                        <button class="btn-bx">Định giá và bán xe ngay!</button>
                        <p class="note">Để tiếp tục, tôi đồng ý với <a href="">Chính sách quyền riêng tư,</a><a href=""> Điều khoản sử dụng</a> & <a href="">Điều khoản & điều kiện niêm yết.</a></p>
                    </div>
                    <script>
                        var modelData = {
                            "Toyota": ["Camry", "Corolla", "RAV4", "Highlander", "Tacoma", "Prius", "Sienna", "4Runner"],
                            "Honda": ["Civic", "Accord", "CR-V", "Pilot", "Odyssey", "HR-V", "Fit", "Ridgeline"],
                            "Mercedes-Benz": ["C-Class", "E-Class", "S-Class", "GLC-Class", "GLE-Class", "GLS-Class", "A-Class", "CLA-Class"],
                            "Ford": ["F-150", "Escape", "Explorer", "Fusion", "Mustang", "Edge", "Ranger", "Expedition"],
                            "BMW": ["3 Series", "5 Series", "X3", "X5", "7 Series", "X1", "X7", "2 Series"],
                            "Chevrolet": ["Silverado", "Equinox", "Traverse", "Malibu", "Tahoe", "Camaro", "Suburban", "Colorado"],
                            "Hyundai": ["Elantra", "Sonata", "Santa Fe", "Tucson", "Kona", "Palisade", "Venue", "Accent"],
                            "Kia": ["Optima", "Sorento", "Sportage", "Forte", "Soul", "Telluride", "Rio", "Stinger"],
                            "Mazda": ["Mazda3", "Mazda6", "CX-5", "CX-9", "MX-5 Miata", "CX-30", "CX-3", "Mazda5"],
                            "VinFast": ["Lux A2.0", "Lux SA2.0", "Fadil", "President", "LUX V8", "LUX AS2.0", "LUX SA2.0", "LUX A2.0 Sedan"]
                        };

                        var makeSelect = document.getElementById('make');
                        var modelSelect = document.getElementById('model');

                        makeSelect.addEventListener('change', function() {
                            var selectedMake = makeSelect.value;
                            var modelArray = modelData[selectedMake] || [];

                            // Xóa tất cả các tùy chọn cũ trước khi cập nhật
                            modelSelect.innerHTML = '<option value="" selected disabled>Chọn dòng xe</option>';

                            // Thêm các tùy chọn mới cho dòng xe
                            modelArray.forEach(function(model) {
                                var option = document.createElement('option');
                                option.value = model;
                                option.textContent = model;
                                modelSelect.appendChild(option);
                            });
                        });
                    </script>
                </form>
            </div>

            <?php
            require_once("./setting.php");
            ?>


        </div>
    </div>
    <?php
    require_once("list-car.php");

    require_once("footer.php");
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Đường dẫn đến thư viện Slick Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.carousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                dots: true
            });
        });
    </script>

    <script src="../assets/script/script.js"></script>
</body>

</html>