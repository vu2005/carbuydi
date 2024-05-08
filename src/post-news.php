<?php
require_once '../config/config.php';

// Kiểm tra nếu biểu mẫu đã được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Bắt đầu một giao dịch
    $conn->begin_transaction();

    try {
        // Thêm dữ liệu vào bảng cars
        $sql = "INSERT INTO cars (make, model, version, year, `condition`, mileage, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssisdi",
            $_POST['make'],
            $_POST['model'],
            $_POST['version'],
            $_POST['year'],
            $_POST['condition'],
            $_POST['mileage'],
            $_POST['price']
        );
        $stmt->execute();

        // Lấy ID của dòng vừa chèn vào bảng cars
        $car_id = $stmt->insert_id;

        // Thêm dữ liệu vào bảng cars_details
        $sql = "INSERT INTO cars_details (car_id, title, description, transmission, origin, body_style, color, fuel_type, engine_capacity, seats) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "isssssssdi",
            $car_id,
            $_POST['title'],
            $_POST['description'],
            $_POST['transmission'],
            $_POST['origin'],
            $_POST['body_style'],
            $_POST['color'],
            $_POST['fuel_type'],
            $_POST['engine_capacity'],
            $_POST['seats']
        );
        $stmt->execute();

        // Thêm dữ liệu vào bảng cars_image
        $sql = "INSERT INTO cars_image (car_id, products_image, front_image, rear_image, left_image, right_image, dashboard_image, inspection_image, other_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $products_image = uploadImage($_FILES['products_image']);
        $front_image = uploadImage($_FILES['front_image']);
        $rear_image = uploadImage($_FILES['rear_image']);
        $left_image = uploadImage($_FILES['left_image']);
        $right_image = uploadImage($_FILES['right_image']);
        $dashboard_image = uploadImage($_FILES['dashboard_image']);
        $inspection_image = uploadImage($_FILES['inspection_image']);
        $other_image = uploadImage($_FILES['other_image']);
        $stmt->bind_param(
            "issssssss",
            $car_id,
            $products_image,
            $front_image,
            $rear_image,
            $left_image,
            $right_image,
            $dashboard_image,
            $inspection_image,
            $other_image
        );

        $stmt->execute();

        // Lấy car_id từ bảng cars_details
        $sql_car_id = "SELECT id FROM cars ORDER BY id DESC LIMIT 1"; // Lấy ID của xe vừa thêm vào
        $result_car_id = $conn->query($sql_car_id);
        $row_car_id = $result_car_id->fetch_assoc();
        $car_id = $row_car_id['id'];

        // Chuẩn bị posted_date và company_name
        $posted_date = !empty($_POST['posted_date']) ? $_POST['posted_date'] : date("Y-m-d H:i:s");
        $company_name = !empty($_POST['company_name']) ? $_POST['company_name'] : "Đang cập nhật";

        // Thêm dữ liệu vào bảng sellers_car
        $sql = "INSERT INTO sellers_car (name, company_name, province, address, phone, district, posted_date, car_id, image_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssssssis",
            $_POST['name'],
            $company_name,
            $_POST['province'],
            $_POST['address'],
            $_POST['phone'],
            $_POST['district'],
            $posted_date,
            $car_id,
            $_POST['image_url']
        );
        $stmt->execute();

        // Commit giao dịch
        $conn->commit();

        // Thông báo thành công
        echo '<div class="toast success">';
        echo '<i class="fa-solid fa-circle-check"></i>';
        echo '<span class="msg">Đăng tin thành công!</span>';
        echo '</div>';
    } catch (Exception $e) {
        // Rollback giao dịch nếu có lỗi xảy ra
        $conn->rollback();
        echo "Lỗi: " . $e->getMessage();
    }

    // Đóng kết nối
    $conn->close();
}

// Hàm xử lý tải lên ảnh và trả về đường dẫn
function uploadImage($file)
{
    if (isset($file['name']) && !empty($file['name'])) {
        $target_dir = "../assets/images/"; // Thư mục lưu trữ ảnh
        $target_file = $target_dir . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $target_file);
        return $target_file;
    }
    return null;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/post-news.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/list-car.css">
    <link rel="stylesheet" href="../assets/css/toast.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <?php
    require_once("header.php");
    ?>
    <div class="post-news">
        <div class="post-header">
            <div class="header-tab">
                <button class="tablinks" onclick="openTab(event, 'tab1')">
                    <div class="radius50">
                        <p>1</p>
                    </div>
                    <p class="tab-p">Bạn đang bán xe gì?</p>
                </button>
                <button class="tablinks" onclick="openTab(event, 'tab2')">
                    <div class="radius50">
                        <p>2</p>
                    </div>
                    <p class="tab-p">Chi tiết về xe</p>
                </button>
                <button class="tablinks" onclick="openTab(event, 'tab3')">
                    <div class="radius50">
                        <p>3</p>
                    </div>
                    <p class="tab-p">Hình ảnh xe</p>
                </button>
                <button class="tablinks" onclick="openTab(event, 'tab4')">
                    <div class="radius50">
                        <p>4</p>
                    </div>
                    <p class="tab-p">Thông tin người bán</p>
                </button>
                <button class="tablinks" onclick="openTab(event, 'tab5')">
                    <div class="radius50">
                        <p>5</p>
                    </div>
                    <p class="tab-p">Đăng tin ngay</p>
                </button>

            </div>
        </div>

        <form id="#" action="#" method="POST" enctype="multipart/form-data">
            <div class="post-main">
                <div class="post-1 tabcontent" id="tab1" style="display: none;">
                    <h2>Bạn đang bán xe gì?</h2>
                    <div style="margin: 0 auto;" class="form">
                        <div class="form-group">
                            <label for="make">Hãng xe:</label>
                            <select id="make" name="make">
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
                        </div>
                        <div class="form-group">
                            <label for="model">Dòng xe:</label>
                            <select id="model" name="model" required>
                                <option value="" selected disabled>Chọn dòng xe</option>
                                <!-- Các tùy chọn dòng xe -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="version">Phiên bản:</label>
                            <select id="version" name="version">
                                <option value="" selected disabled hidden>Chọn phiên bản xe</option>
                                <option value="Cao cấp">Cao cấp</option>
                                <option value="Nâng cao">Nâng cao</option>
                                <option value="Tiêu chuẩn">Tiêu chuẩn</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="year">Năm sản xuất:</label>
                            <select id="year" name="year">
                                <option value="" selected disabled hidden>Chọn năm sản xuất</option>
                            </select>

                            <script>
                                var yearSelect = document.getElementById("year");
                                for (var i = 2024; i >= 2001; i--) {
                                    var option = document.createElement("option");
                                    option.value = i;
                                    option.textContent = i;
                                    yearSelect.appendChild(option);
                                }
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="condition">Tình trạng:</label>
                            <select id="condition" name="condition">
                                <option value="" selected disabled hidden>Chọn tình trạng xe</option>
                                <option value="Mới">Mới</option>
                                <option value="Cũ">Cũ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mileage">Số KM:</label>
                            <input type="text" id="mileage" name="mileage">
                        </div>
                        <div class="form-group">
                            <label for="price">Giá muốn bán:
                                <div id="result" style="margin: 0 5px;"></div>
                            </label>
                            <input type="text" id="price" name="price" oninput="handleInput()" />
                        </div>
                        <div class="control button" onclick="nextTab('tab1')">Tiếp tục</div>
                        <script>
                            function addCommas(number) {
                                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            }

                            function handleInput() {
                                var price = document.getElementById("price");
                                var value = price.value.trim();
                                if (value === "") return;
                                var number = value.replace(/\./g, "");
                                var formattedNumber = addCommas(number);
                                price.value = formattedNumber;
                                var convertedNumber = convertNumberToWords(number);
                                var resultDiv = document.getElementById("result");
                                resultDiv.textContent = "[" + convertedNumber + "]";
                            }


                            function convertNumberToWords(number) {
                                var suffixes = ["đ", "K", "Triệu", "Tỷ", "Ngìn tỷ"]; // Suffixes for thousands, millions, billions, trillions
                                if (number === "") {
                                    return "0";
                                }
                                var num = parseInt(number);
                                var suffixIndex = Math.floor((number.length - 1) / 3);
                                var scaledNumber = num / Math.pow(1000, suffixIndex);
                                scaledNumber = Math.round(scaledNumber * 10) / 10;
                                var result = scaledNumber + " " + suffixes[suffixIndex];
                                return result;
                            }
                        </script>
                        <script>
                            var model = {
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
                                var selectedmake = makeSelect.value;
                                var modelArray = model[selectedmake] || [];

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
                    </div>
                </div>
                <div class="post-2 tabcontent" id="tab2" style="display: none;">
                    <h2>Chi tiết về xe</h2>
                    <div style="margin: 0 auto;" class="form">
                        <div class="form-0">
                            <div class="form-1">
                                <div class="form-group">
                                    <label for="transmission">Hộp số:</label>
                                    <select id="transmission" name="transmission">
                                        <option value="" selected disabled hidden>Chọn hộp số</option>
                                        <option value="Mới">Số sàn</option>
                                        <option value="Cũ">Số tự động</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="origin">Xuất xứ:</label>
                                    <input type="text" id="origin" name="origin">
                                </div>

                                <div class="form-group">
                                    <label for="body_style">Kiểu dáng:</label>
                                    <select id="body_style" name="body_style">
                                        <option value="" selected disabled hidden>Chọn kiểu dáng</option>
                                        <option value="Coupe">Coupe</option>
                                        <option value="Wagon">Wagon</option>
                                        <option value="Minivan">Minivan</option>
                                        <option value="Pick-up">Pick-up</option>
                                        <option value="Hatchback">Hatchback</option>
                                        <option value="MPV">MPV</option>
                                        <option value="SUV">SUV</option>
                                        <option value="Sedan">Sedan</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="color">Màu sắc:</label>
                                    <select id="color" name="color">
                                        <option value="" selected disabled hidden>Chọn màu xe</option>
                                        <option value="Đen">Đen</option>
                                        <option value="Đỏ">Đỏ</option>
                                        <option value="Vàng">Vàng</option>
                                        <option value="Trắng">Trắng</option>
                                        <option value="Nâu">Nâu</option>
                                        <option value="Cam">Cam</option>
                                        <option value="Bạc">Bạc</option>
                                        <option value="Xám">Xám</option>
                                        <option value="Vàng đồng">Vàng đồng</option>
                                        <option value="Xanh dương">Xanh dương</option>
                                        <option value="Xanh lá cây">Xanh lá cây</option>
                                        <option value="Tím">Tím</option>
                                        <option value="Hồng">Hồng</option>
                                        <option value="Đồng">Đồng</option>
                                        <option value="Vàng cát">Vàng cát</option>
                                        <option value="Cam đất">Cam đất</option>

                                    </select>
                                </div>

                            </div>
                            <div class="form-2">
                                <div class="form-group">
                                    <label for="fuel_type">Nhiên liệu:</label>
                                    <select name="fuel_type" id="fuel_type">
                                        <option value="Gas">Gas</option>
                                        <option value="Gas">Xăng</option>
                                        <option value="Gas">Dầu</option>
                                        <option value="Gas">Điện</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="engine_capacity">Dung tích động cơ (lít):</label>
                                    <input type="text" id="engine_capacity" name="engine_capacity">
                                </div>
                                <div class="form-group">
                                    <label for="seats">Số ghế:</label>
                                    <select name="seats" id="seats">
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu đề:</label>
                            <input type="text" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả:</label>
                            <textarea id="description" name="description"></textarea>
                        </div>
                        <div class="btn-form">
                            <div class="btn-white" onclick="prevTab('tab2')">Quay lại</div>
                            <div class="btn-blue" onclick="nextTab('tab2')">Tiếp tục</div>
                        </div>
                    </div>
                </div>
                <div class="post-3 tabcontent" style="display: none;" id="tab3">
                    <h2>Hình ảnh xe</h2>
                    <div style="margin: 0 auto;" class="form">
                        <div class="form-group-img">
                            <label for="front_image">Ảnh trước xe</label>
                            <div id="front_image_container" class="image-container" onclick="handleImageUpload('front_image_container', 'front_image')">
                                <img id="front_image_display" src="../assets/images/anhxe1.webp" alt="Front Image" />
                            </div>
                            <input type="file" id="front_image" name="front_image" style="display: none" />
                        </div>
                        <!-- Thêm input cho ảnh sau xe -->
                        <div class="form-group-img">
                            <label for="rear_image">Ảnh sau xe</label>
                            <div id="rear_image_container" class="image-container" onclick="handleImageUpload('rear_image_container', 'rear_image')">
                                <img id="rear_image_display" src="../assets/images/anhxe2.webp" alt="Rear Image" />
                            </div>
                            <input type="file" id="rear_image" name="rear_image" style="display: none" />
                        </div>
                        <!-- Thêm input cho ảnh bên trái xe -->
                        <div class="form-group-img">
                            <label for="left_image">Ảnh bên trái xe</label>
                            <div id="left_image_container" class="image-container" onclick="handleImageUpload('left_image_container', 'left_image')">
                                <img id="left_image_display" src="../assets/images/anhxe3.webp" alt="Left Image" />
                            </div>
                            <input type="file" id="left_image" name="left_image" style="display: none" />
                        </div>
                        <!-- Thêm input cho ảnh bên phải xe -->
                        <div class="form-group-img">
                            <label for="right_image">Ảnh bên phải xe</label>
                            <div id="right_image_container" class="image-container" onclick="handleImageUpload('right_image_container', 'right_image')">
                                <img id="right_image_display" src="../assets/images/anhxe4.webp" alt="Right Image" />
                            </div>
                            <input type="file" id="right_image" name="right_image" style="display: none" />
                        </div>

                        <!-- Thêm input cho ảnh dashboard -->
                        <div class="form-group-img">
                            <label for="dashboard_image">Ảnh Dashboard</label>
                            <div id="dashboard_image_container" class="image-container" onclick="handleImageUpload('dashboard_image_container', 'dashboard_image')">
                                <img id="dashboard_image_display" src="../assets/images/anhxe5.webp" alt="Dashboard Image" />
                            </div>
                            <input type="file" id="dashboard_image" name="dashboard_image" style="display: none" />
                        </div>

                        <!-- Thêm input cho ảnh đăng kiểm -->
                        <div class="form-group-img">
                            <label for="inspection_image">Ảnh đăng kiểm</label>
                            <div id="inspection_image_container" class="image-container" onclick="handleImageUpload('inspection_image_container', 'inspection_image')">
                                <img id="inspection_image_display" src="../assets/images/anhxe6.webp" alt="Inspection Image" />
                            </div>
                            <input type="file" id="inspection_image" name="inspection_image" style="display: none" />
                        </div>

                        <!-- Thêm input cho ảnh khác -->
                        <div class="form-group-img">
                            <label for="other_image">Ảnh khác</label>
                            <div id="other_image_container" class="image-container" onclick="handleImageUpload('other_image_container', 'other_image')">
                                <img id="other_image_display" src="../assets/images/anhxe7.png" alt="Other Image" />
                            </div>
                            <input type="file" id="other_image" name="other_image" style="display: none" />
                        </div>

                        <script>
                            function handleImageUpload(containerId, inputId) {
                                // Trigger the input file click event
                                document.getElementById(inputId).click();

                                // Handle image preview after selection
                                document.getElementById(inputId).onchange = function(
                                    event
                                ) {
                                    var input = event.target;
                                    var reader = new FileReader();
                                    reader.onload = function() {
                                        var imgElement = document
                                            .getElementById(containerId)
                                            .querySelector("img");
                                        imgElement.src = reader.result;
                                    };
                                    reader.readAsDataURL(input.files[0]);
                                };
                            }
                        </script>
                        <div class="btn-form">
                            <div class="btn-white" onclick="prevTab('tab3')">Quay lại</div>
                            <div class="btn-blue" onclick="nextTab('tab3')">Tiếp tục</div>
                        </div>
                    </div>
                </div>
                <div class="post-4 tabcontent" id="tab4" style="display: none;">
                    <h2>Thông tin người bán</h2>
                    <div style="margin: 0 auto;" class="form">
                        <div class="form-0">
                            <div class="form-1">
                                <div class="form-group">
                                    <input type="hidden" name="id">
                                    <label for="name">Họ tên:</label>
                                    <input type="text" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="province">Tỉnh/ Thành phố:</label>
                                    <select id="province" name="province">
                                        <option value="" selected disabled>Chọn tỉnh/thành phố</option>
                                        <option value="An Giang">An Giang</option>
                                        <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                        <option value="Bắc Giang">Bắc Giang</option>
                                        <option value="Bắc Kạn">Bắc Kạn</option>
                                        <option value="Bạc Liêu">Bạc Liêu</option>
                                        <option value="Bắc Ninh">Bắc Ninh</option>
                                        <option value="Bến Tre">Bến Tre</option>
                                        <option value="Bình Định">Bình Định</option>
                                        <option value="Bình Dương">Bình Dương</option>
                                        <option value="Bình Phước">Bình Phước</option>
                                        <!-- thêm nốt cho tôi những dữ liệu còn lại -->
                                        <option value="Bình Thuận">Bình Thuận</option>
                                        <option value="Cà Mau">Cà Mau</option>
                                        <option value="Cao Bằng">Cao Bằng</option>
                                        <option value="Đắk Lắk">Đắk Lắk</option>
                                        <option value="Đắk Nông">Đắk Nông</option>
                                        <option value="Điện Biên">Điện Biên</option>
                                        <option value="Đồng Nai">Đồng Nai</option>
                                        <option value="Đồng Tháp">Đồng Tháp</option>
                                        <option value="Gia Lai">Gia Lai</option>
                                        <option value="Hà Giang">Hà Giang</option>
                                        <!--  -->
                                        <option value="Hà Nam">Hà Nam</option>
                                        <option value="Hà Tĩnh">Hà Tĩnh</option>
                                        <option value="Hải Dương">Hải Dương</option>
                                        <option value="Hải Phòng">Hải Phòng</option>
                                        <option value="Hậu Giang">Hậu Giang</option>
                                        <option value="Hòa Bình">Hòa Bình</option>
                                        <option value="Hưng Yên">Hưng Yên</option>
                                        <option value="Đồng Tháp">Đồng Tháp</option>
                                        <option value="Khánh Hòa">Khánh Hòa</option>
                                        <option value="Kiên Giang">Kiên Giang</option>
                                        <!--  -->
                                        <option value="Kon Tum">Kon Tum</option>
                                        <option value="Lai Châu">Lai Châu</option>
                                        <option value="Lâm Đồng">Lâm Đồng</option>
                                        <option value="Lạng Sơn">Lạng Sơn</option>
                                        <option value="Lào Cai">Lào Cai</option>
                                        <option value="Long An">Long An</option>
                                        <option value="Nam Định">Nam Định</option>
                                        <option value="Nghệ An">Nghệ An</option>
                                        <option value="Ninh Bình">Ninh Bình</option>
                                        <option value="Ninh Thuận">Ninh Thuận</option>
                                        <!--  -->
                                        <option value="Phú Thọ">Phú Thọ</option>
                                        <option value="Quảng Bình">Quảng Bình</option>
                                        <option value="Quảng Nam">Quảng Nam</option>
                                        <option value="Quảng Ngãi">Quảng Ngãi</option>
                                        <option value="Quảng Ninh">Quảng Ninh</option>
                                        <option value="Quảng Trị">Quảng Trị</option>
                                        <option value="Sóc Trăng">Sóc Trăng</option>
                                        <option value="Sơn La">Sơn La</option>
                                        <option value="Tây Ninh">Tây Ninh</option>
                                        <option value="Thái Bình">Thái Bình</option>
                                        <!--  -->
                                        <option value="Thái Nguyên">Thái Nguyên</option>
                                        <option value="Thanh Hóa">Thanh Hóa</option>
                                        <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                        <option value="Tiền Giang">Tiền Giang</option>
                                        <option value="Tuyên Quang">Tuyên Quang</option>
                                        <option value="Vĩnh Long">Vĩnh Long</option>
                                        <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                        <option value="Yên Bái">Yên Bái</option>
                                        <option value="Cần Thơ">Cần Thơ</option>
                                        <option value="Đà Nẵng">Đà Nẵng</option>
                                        <option value="Hà Nội">Hà Nội</option>
                                        <option value="Hải Phòng">Hải Phòng</option>
                                        <option value="Thành phố Hồ Chí Minh">Thành phố Hồ Chí Minh</option>
                                        <option value="Hà Tĩnh">Hà Tĩnh</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-2">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại:</label>
                                    <input type="text" id="phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="district">Quận/ Huyện:</label>
                                    <select id="district" name="district">
                                        <option value="" selected disabled>Chọn quận/huyện</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ:</label>
                            <input type="text" id="address" name="address">
                        </div>
                        <script>
                            var ProvinceSelect = document.getElementById('province');
                            var DistrictSelect = document.getElementById('district');


                            ProvinceSelect.addEventListener('change', function() {
                                var selectedProvince = ProvinceSelect.value;
                                var DistrictArray = districtsData[selectedProvince] || [];

                                // Xóa tất cả các tùy chọn cũ trước khi cập nhật
                                DistrictSelect.innerHTML = '<option value="" selected disabled>Chọn quận/huyện</option>';

                                // Thêm các tùy chọn mới cho dòng xe
                                DistrictArray.forEach(function(district) {
                                    var option = document.createElement('option');
                                    option.value = district;
                                    option.textContent = district;
                                    DistrictSelect.appendChild(option);
                                });
                            });



                            var districtsData = {
                                "An Giang": ["An Phú", "Châu Phú", "Châu Thành", "Chợ Mới", "Phú Tân", "Thới Bình", "Thoại Sơn", "Tịnh Biên", "Tri Tôn"],
                                "Bà Rịa - Vũng Tàu": ["Bà Rịa", "Châu Đức", "Côn Đảo", "Đất Đỏ", "Long Điền", "Tân Thành", "Vũng Tàu", "Xuyên Mộc"],
                                "Bắc Giang": ["Bắc Giang", "Hiệp Hòa", "Lạng Giang", "Lục Nam", "Lục Ngạn", "Sơn Động", "Tân Yên", "Việt Yên", "Yên Dũng", "Yên Thế"],
                                "Bắc Kạn": ["Bắc Kạn", "Ba Bể", "Bạch Thông", "Chợ Đồn", "Chợ Mới", "Na Rì", "Ngân Sơn", "Pác Nặm"],
                                "Bạc Liêu": ["Bạc Liêu", "Đông Hải", "Giá Rai", "Hòa Binh", "Hồng Dân", "Phước Long"],
                                "Bắc Ninh": ["Bắc Ninh", "Gia Bình", "Lương Tài", "Quế Võ", "Thuận Thành", "Tiên Du", "Từ Sơn"],
                                "Bến Tre": ["Bến Tre", "Ba Tri", "Bình Đại", "Châu Thành", "Chợ Lách", "Giồng Trôm", "Mỏ Cày", "Thạnh Phú"],
                                "Bình Định": ["An Lão", "An Nhơn", "Hoài Ân", "Hoài Nhơn", "Phù Mỹ", "Tây Sơn", "Tuy Phước", "Vân Canh", "Vĩnh Thạnh"],
                                "Bình Dương": ["Bến Cát", "Dầu Tiếng", "Dĩ An", "Phú Giáo", "Tân Uyên", "Thủ Dầu Một"],
                                "Bình Phước": ["Bình Long", "Bù Đốp", "Bù Đăng", "Bù Gia Mập", "Chơn Thành", "Đồng Phú", "Hớn Quản", "Lộc Ninh", "Phú Riềng"],
                                "Bình Thuận": ["Bắc Bình", "Đức Linh", "Hàm Tân", "Hàm Thuận Bắc", "Hàm Thuận Nam", "La Gi", "Phan Thiết", "Tánh Linh", "Tuy Phong"],
                                "Cà Mau": ["Cà Mau", "Cái Nước", "Đầm Dơi", "Năm Căn", "Ngọc Hiển", "Phú Tân", "Thới Bình", "Trần Văn Thời", "U Minh"],
                                "Cao Bằng": ["Bảo Lạc", "Bảo Lâm", "Hạ Lang", "Hà Quảng", "Hòa An", "Nguyên Bình", "Phục Hòa", "Quảng Uyên", "Thạch An"],
                                "Đắk Lắk": ["Buôn Đôn", "Buôn Hồ", "Buôn Ma Thuột", "Cư Kuin", "Cư M'gar", "Krông Ana", "Krông Bông", "Krông Buk", "Krông Năng", "Krông Pắc", "Lắk", "M'Đrắk"],
                                "Đắk Nông": ["Cư Jút", "Đắk GLong", "Đắk Mil", "Đắk RLấp", "Đắk Song", "Krông Nô", "Tuy Đức"],
                                "Điện Biên": ["Điện Biên", "Điện Biên Đông", "Điện Biên Phủ", "Mường Ảng", "Mường Chà", "Mường Nhé", "Nậm Pồ", "Tủa Chùa", "Tuần Giáo"],
                                "Đồng Nai": ["Biên Hòa", "Cẩm Mỹ", "Định Quán", "Long Khánh", "Long Thành", "Nhơn Trạch", "Tân Phú", "Thống Nhất", "Trảng Bom", "Vĩnh Cửu", "Xuân Lộc"],
                                "Đồng Tháp": ["Cao Lãnh", "Châu Thành", "Hồng Ngự", "Lai Vung", "Lấp Vò", "Tam Nông", "Tân Hồng", "Thanh Bình", "Tháp Mười"],
                                "Gia Lai": ["Chư Păh", "Chư Prông", "Chư Pưh", "Chư Sê", "Đắk Đoa", "Đắk Pơ", "Đức Cơ", "Ia Grai", "Ia Pa", "K'Bang", "KBông", "KBang", "Phú Thiện"],
                                "Hà Giang": ["Bắc Mê", "Bắc Quang", "Đồng Văn", "Hà Giang", "Hoàng Su Phì", "Mèo Vạc", "Quản Bạ", "Quang Bình", "Vị Xuyên", "Xín Mần", "Yên Minh"],
                                "Hà Nam": ["Bình Lục", "Duy Tiên", "Kim Bảng", "Lý Nhân", "Thanh Liêm"],
                                "Hà Tĩnh": ["Cẩm Xuyên", "Can Lộc", "Đức Thọ", "Hà Tĩnh", "Hồng Lĩnh", "Hương Khê", "Hương Sơn", "Kỳ Anh", "Lộc Hà", "Nghi Xuân", "Thạch Hà", "Vũ Quang"],
                                "Hải Dương": ["Bình Giang", "Cẩm Giàng", "Chí Linh", "Gia Lộc", "Hải Dương", "Kim Thành", "Kinh Môn", "Nam Sách", "Ninh Giang", "Thanh Hà", "Thanh Miện", "Tứ Kỳ"],
                                "Hải Phòng": ["An Dương", "An Lão", "Bạch Long Vĩ", "Cát Hải", "Đông Hải", "Kiến Thụy", "Thủy Nguyên", "Tiên Lãng", "Vĩnh Bảo"],
                                "Hậu Giang": ["Châu Thành", "Châu Thành A", "Long Mỹ", "Phụng Hiệp", "Vị Thủy", "Vị Thuỷ"],
                                "Hòa Bình": ["Cao Phong", "Đà Bắc", "Kim Bôi", "Lạc Sơn", "Lạc Thủy", "Lương Sơn", "Mai Châu", "Tân Lạc", "Yên Thủy"],
                                "Hưng Yên": ["Ân Thi", "Hưng Hà", "Khoái Châu", "Kim Động", "Mỹ Hào", "Phù Cừ", "Tiên Lữ", "Văn Giang", "Văn Lâm", "Yên Mỹ"],
                                "Khánh Hòa": ["Cam Lâm", "Cam Ranh", "Diên Khánh", "Khánh Sơn", "Khánh Vĩnh", "Nha Trang", "Ninh Hòa", "Trường Sa", "Vạn Ninh"],
                                "Kiên Giang": ["An Biên", "An Minh", "Châu Thành", "Giang Thành", "Giồng Riềng", "Gò Quao", "Hòn Đất", "Kiên Hải", "Kiên Lương", "Phú Quốc", "Tân Hiệp", "U Minh Thượng", "Vĩnh Thuận"],
                                "Kon Tum": ["Đắk Glei", "Đắk Hà", "Đắk Tô", "Kon Plông", "Kon Rẫy", "Ngọc Hồi", "Sa Thầy", "Tu Mơ Rông"],
                                "Lai Châu": ["Lai Châu", "Mường Tè", "Phong Thổ", "Sìn Hồ", "Tam Đường", "Tân Uyên", "Than Uyên"],
                                "Lâm Đồng": ["Bảo Lâm", "Bảo Lộc", "Cát Tiên", "Đạ Huoai", "Đạ Tẻh", "Đam Rông", "Di Linh", "Đơn Dương", "Đức Trọng", "Lạc Dương", "Lâm Hà"],
                                "Lạng Sơn": ["Bắc Sơn", "Bình Gia", "Cao Lộc", "Chi Lăng", "Đình Lập", "Hữu Lũng", "Lạng Sơn", "Lộc Bình", "Tràng Định", "Văn Lãng", "Văn Quan"],
                                "Lào Cai": ["Bảo Thắng", "Bảo Yên", "Bát Xát", "Bắc Hà", "Lào Cai", "Mường Khương", "Sa Pa", "Si Ma Cai", "Văn Bàn"],
                                "Long An": ["Bến Lức", "Cần Đước", "Cần Giuộc", "Châu Thành", "Đức Hòa", "Đức Huệ", "Mộc Hóa", "Tân Hưng", "Tân Thạnh", "Tân Trụ", "Thạnh Hóa", "Thủ Thừa", "Vĩnh Hưng"],
                                "Nam Định": ["Giao Thủy", "Hải Hậu", "Mỹ Lộc", "Nam Định", "Nam Trực", "Nghĩa Hưng", "Trực Ninh", "Vụ Bản", "Xuân Trường", "Ý Yên"],
                                "Nghệ An": ["Anh Sơn", "Con Cuông", "Cửa Lò", "Diễn Châu", "Đô Lương", "Hoàng Mai", "Hưng Nguyên", "Kỳ Sơn", "Nam Đàn", "Nghi Lộc", "Nghĩa Đàn", "Quế Phong", "Quỳ Châu", "Quỳ Hợp", "Quỳnh Lưu", "Tân Kỳ", "Thái Hòa", "Thanh Chương", "Tương Dương", "Yên Thành"],
                                "Ninh Bình": ["Gia Viễn", "Hoa Lư", "Kim Sơn", "Nho Quan", "Ninh Bình", "Tam Điệp", "Yên Khánh", "Yên Mô"],
                                "Ninh Thuận": ["Bác Ái", "Ninh Hải", "Ninh Phước", "Ninh Sơn", "Phan Rang - Tháp Chàm", "Thuận Bắc", "Thuận Nam"],
                                "Phú Thọ": ["Cẩm Khê", "Đoan Hùng", "Hạ Hoà", "Lâm Thao", "Phù Ninh", "Tam Nông", "Tân Sơn", "Thanh Ba", "Thanh Sơn", "Thanh Thuỷ", "Yên Lập"],
                                "Quảng Bình": ["Bố Trạch", "Đồng Hới", "Lệ Thủy", "Minh Hóa", "Quảng Ninh", "Quảng Trạch", "Tuyên Hóa"],
                                "Quảng Nam": ["Bắc Trà My", "Đại Lộc", "Điện Bàn", "Đông Giang", "Duy Xuyên", "Hiệp Đức", "Nam Giang", "Nam Trà My", "Nông Sơn", "Núi Thành", "Phú Ninh", "Phước Sơn", "Quế Sơn", "Tam Kỳ", "Tây Giang", "Thăng Bình"],
                                "Quảng Ngãi": ["Ba Tơ", "Bình Sơn", "Đức Phổ", "Lý Sơn", "Minh Long", "Mộ Đức", "Nghĩa Hành", "Sơn Hà", "Sơn Tây", "Sơn Tịnh", "Tây Trà", "Trà Bồng", "Tư Nghĩa"],
                                "Quảng Ninh": ["Ba Chẽ", "Bình Liêu", "Cẩm Phả", "Cô Tô", "Đầm Hà", "Đông Triều", "Hải Hà", "Hoành Bồ", "Tiên Yên", "Uông Bí", "Vân Đồn"],
                                "Quảng Trị": ["Cam Lộ", "Cồn Cỏ", "Đa Krông", "Gio Linh", "Hải Lăng", "Hướng Hóa", "Triệu Phong", "Vĩnh Linh"],
                                "Sóc Trăng": ["Châu Thành", "Cù Lao Dung", "Kế Sách", "Long Phú", "Mỹ Tú", "Mỹ Xuyên", "Ngã Năm", "Sóc Trăng", "Thạnh Trị", "Trần Đề", "Vĩnh Châu"],
                                "Sơn La": ["Bắc Yên", "Mai Sơn", "Mộc Châu", "Mường La", "Phù Yên", "Quỳnh Nhai", "Sông Mã", "Sốp Cộp", "Thuận Châu", "Vân Hồ", "Yên Châu"],
                                "Tây Ninh": ["Bến Cầu", "Châu Thành", "Dương Minh Châu", "Gò Dầu", "Hòa Thành", "Tân Biên", "Tân Châu", "Trảng Bàng"],
                                "Thái Bình": ["Đông Hưng", "Hưng Hà", "Kiến Xương", "Quỳnh Phụ", "Thái Bình", "Thái Thụy", "Tiền Hải", "Vũ Thư"],
                                "Thái Nguyên": ["Đại Từ", "Định Hóa", "Đồng Hỷ", "Phổ Yên", "Phú Bình", "Phú Lương", "Sông Công", "Võ Nhai"],
                                "Thanh Hóa": ["Bá Thước", "Cẩm Thủy", "Đông Sơn", "Hà Trung", "Hậu Lộc", "Hoằng Hóa", "Lang Chánh", "Mường Lát", "Nga Sơn", "Như Thanh", "Như Xuân", "Nông Cống", "Quan Hóa", "Quan Sơn", "Quảng Xương", "Thạch Thành", "Thiệu Hóa", "Thọ Xuân", "Thường Xuân", "Tĩnh Gia", "Triệu Sơn", "Vĩnh Lộc", "Yên Định"],
                                "Thừa Thiên Huế": ["A Lưới", "Huế", "Hương Thủy", "Hương Trà", "Nam Đông", "Phong Điền", "Phú Lộc", "Phú Vang", "Quảng Điền"],
                                "Tiền Giang": ["Cái Bè", "Cai Lậy", "Châu Thành", "Chợ Gạo", "Gò Công Đông", "Gò Công Tây", "Tân Phú Đông", "Tân Phước", "Vũng Liêm"],
                                "Tuyên Quang": ["Chiêm Hóa", "Hàm Yên", "Lâm Bình", "Na Hang", "Sơn Dương", "Thanh Ba", "Yên Sơn"],
                                "Vĩnh Long": ["Bình Minh", "Bình Tân", "Long Hồ", "Mang Thít", "Tam Bình", "Trà Ôn", "Vũng Liêm"],
                                "Vĩnh Phúc": ["Bình Xuyên", "Lập Thạch", "Phúc Yên", "Sông Lô", "Tam Dương", "Tam Đảo", "Vĩnh Tường", "Yên Lạc"],
                                "Yên Bái": ["Lục Yên", "Mù Căng Chải", "Trạm Tấu", "Trấn Yên", "Văn Chấn", "Văn Yên", "Yên Bình", "Yên Bình", "Yên Bình"],
                                "Cần Thơ": ["Bình Thủy", "Cái Răng", "Cờ Đỏ", "Ninh Kiều", "Ô Môn", "Thốt Nốt", "Vĩnh Thạnh"],
                                "Đà Nẵng": ["Cẩm Lệ", "Hải Châu", "Hoà Vang", "Liên Chiểu", "Ngũ Hành Sơn", "Sơn Trà", "Thanh Khê"],
                                "Hà Nội": ["Ba Đình", "Bắc Từ Liêm", "Cầu Giấy", "Đống Đa", "Hà Đông", "Hai Bà Trưng", "Hoàn Kiếm", "Hoàng Mai", "Long Biên", "Nam Từ Liêm", "Tây Hồ", "Thanh Xuân", "Chương Mỹ", "Đan Phượng", "Đông Anh", "Gia Lâm", "Hoài Đức", "Mê Linh", "Mỹ Đức", "Phú Xuyên", "Phúc Thọ", "Quốc Oai", "Sóc Sơn", "Thạch Thất", "Thanh Oai", "Thanh Trì", "Thường Tín", "Ứng Hòa"],
                                "Hải Phòng": ["An Dương", "An Lão", "Bạch Long Vĩ", "Cát Hải", "Đồ Sơn", "Dương Kinh", "Hải An", "Hồng Bàng", "Kiến An", "Kiến Thụy", "Lê Chân", "Ngô Quyền", "Thủy Nguyên", "Tiên Lãng", "Vĩnh Bảo"],
                                "Thành phố Hồ Chí Minh": ["Bình Chánh", "Bình Tân", "Bình Thạnh", "Cần Giờ", "Củ Chi", "Gò Vấp", "Hóc Môn", "Nhà Bè", "Phú Nhuận", "Quận 1", "Quận 10", "Quận 11", "Quận 12", "Quận 2", "Quận 3", "Quận 4", "Quận 5", "Quận 6", "Quận 7", "Quận 8", "Quận 9", "Tân Bình", "Tân Phú", "Thủ Đức"]

                            };
                        </script>
                        <div class="btn-form">
                            <div class="btn-white" onclick="prevTab('tab4')">Quay lại</div>
                            <div class="btn-blue" onclick="nextTab('tab4')">Tiếp tục</div>
                        </div>
                    </div>
                </div>
                <div class="post-5 tabcontent" id="tab5" style="display: none;">
                    <h2>Chọn loại tin</h2>
                    <div class="post-form">
                        <div class="post1">
                            <div class="post0">
                                <div class="p-header">
                                    <div class="p-box-img">
                                        <img src="../assets/images/board.png" alt="">
                                    </div>
                                    <div class="p-box-title">
                                        <h4>TIN VIP</h4>
                                        <span>Còn tin VIP</span>
                                    </div>
                                </div>
                                <div class="p-main">
                                    <i class='bx bxs-layer'></i>
                                    <span><b>Vị trí hiển thị</b>
                                        <p>Vị trí hàng đầu trong box VIP của cùng hãng xe, dòng xe, tỉnh thành.</p>
                                    </span>
                                </div>
                                <div class="btn-post-news">
                                    <button>Đăng Ngay</button>
                                </div>
                            </div>
                        </div>
                        <div class="post2">
                            <div class="post0">
                                <div class="p-header">
                                    <div class="p-box-img">
                                        <img src="../assets/images/board.png" alt="">
                                    </div>
                                    <div class="p-box-title">
                                        <h4>TIN THƯỜNG</h4>
                                        <span>Còn tin thường</span>
                                    </div>
                                </div>
                                <div class="p-main often">
                                    <i class='bx bxs-layer'></i>
                                    <span><b>Vị trí hiển thị</b>
                                        <p>Dưới tin VIP và đẩy tin</p>
                                    </span>
                                </div>
                                <div class="btn-post-news">
                                    <button>Đăng Ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    require_once("gg-map.php");

    require_once("list-car.php");
    require_once("footer.php");

    ?>
    <script src="../assets/script/script.js"></script>
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(
                    " active",
                    ""
                );
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        function nextTab(tabName) {
            var currentTab = document.getElementById(tabName);
            var nextTab = currentTab.nextElementSibling;

            // Hide the current tab
            currentTab.style.display = "none";

            // Display the next tab
            if (nextTab) {
                nextTab.style.display = "block";

                // Remove 'active' class from the current tab button
                var currentTabButton = document.querySelector('[onclick="openTab(event, \'' + tabName + '\')"]');
                if (currentTabButton) {
                    currentTabButton.classList.remove("active");
                }

                // Add 'active' class to the next tab button
                var nextTabButton = document.querySelector('[onclick="openTab(event, \'' + nextTab.id + '\')"]');
                if (nextTabButton) {
                    nextTabButton.classList.add("active");
                }
            }
        }

        function prevTab(tabName) {
            var currentTab = document.getElementById(tabName);
            var prevTab = currentTab.previousElementSibling;

            // Hide the current tab
            currentTab.style.display = "none";

            // Display the previous tab
            if (prevTab) {
                prevTab.style.display = "block";

                // Remove 'active' class from the current tab button
                var currentTabButton = document.querySelector('[onclick="openTab(event, \'' + tabName + '\')"]');
                if (currentTabButton) {
                    currentTabButton.classList.remove("active");
                }

                // Add 'active' class to the previous tab button
                var prevTabButton = document.querySelector('[onclick="openTab(event, \'' + prevTab.id + '\')"]');
                if (prevTabButton) {
                    prevTabButton.classList.add("active");
                }
            }
        }
        // Hàm mở tab mặc định khi trang được tải
        function openDefaultTab() {
            var defaultTabName = 'tab1'; // Tên của tab mặc định
            var defaultTab = document.getElementById(defaultTabName);
            if (defaultTab) {
                defaultTab.style.display = "block"; // Hiển thị tab mặc định
                var defaultTabButton = document.querySelector('[onclick="openTab(event, \'' + defaultTabName + '\')"]');
                if (defaultTabButton) {
                    defaultTabButton.classList.add("active"); // Thêm class 'active' cho tablink mặc định
                }
            }
        }

        // Gọi hàm khi trang được tải
        window.onload = function() {
            openDefaultTab();
        };
    </script>


</body>

</html>