<?php
require_once '../config/config.php'; // Kết nối cơ sở dữ liệu

$row = []; // Khởi tạo biến $row trước khi sử dụng

// Kiểm tra xem có ID sản phẩm được truyền qua URL không
if (isset($_GET['id'])) {
    $id_product = $_GET['id']; // Lấy ID từ URL
    // Truy vấn sản phẩm có ID tương tự từ bảng cars
    $sql = "SELECT cars.*, cars_details.*, sellers_car.*, cars_image.image_url, COUNT(cars_image.id) AS image_count
        FROM cars 
        LEFT JOIN cars_details ON cars.id = cars_details.car_id 
        LEFT JOIN sellers_car ON cars.id = sellers_car.id 
        LEFT JOIN cars_image ON cars.id = cars_image.car_id
        WHERE cars.id = $id_product";

    $result = $conn->query($sql);

    // Kiểm tra xem có kết quả trả về không
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $posted_date = $row['posted_date'];
        $title = $row['title'];
        $price = $row['price'];
        $year = $row['year'];
        $mileage = $row['mileage'];
        $transmission = $row['transmission'];
        $fuel_type = $row['fuel_type'];
        $body_style = $row['body_style'];
        $color = $row['color'];
        $location = $row['address']; // Địa chỉ của người bán
        $seller_name = $row['name']; // Tên người bán
        $seller_phone = $row['phone']; // Số điện thoại người bán
        $image_url = $row['image_url']; // Số điện thoại người bán
        $image_count = $row['image_count']; // Số lượng hình ảnh

    } else {
        echo '<span class="msg">Đã xảy ra lỗi khi cập nhật sản phẩm!</span>';
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbuydi</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/details.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/list-car.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <?php
    require_once("header.php");
    ?>
    <div class="details" style="margin: 0 50px;">
        <p>Ngày đăng: <?php echo $row['posted_date']; ?></p>
        <div class="details0">
            <div class="products-details">
                <div class="products-details1">
                    <div class="container-details">
                        <div class="details-main">
                            <span class="control prev">
                                <i class="bx bx-chevron-left"></i>
                            </span>
                            <span class="control next">
                                <i class="bx bx-chevron-right"></i>
                            </span>
                            <div class="img-wrap">
                                <img src="<?php echo $row['image_url']; ?>" alt="" />
                            </div>
                            <p class="quantity-img"><?php echo $image_count; ?>/<?php echo $image_count; ?></p>
                        </div>
                        <div class="details-list-img">
                            <div>
                                <img src="<?php echo $row['image_url']; ?>" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="parameter">
                        <h2>Thông số kỹ thuật</h2>
                        <div class="parameter-table">
                            <div class="parameter-table0">
                                <h4>Tổng quan</h4>
                                <div style="border-bottom: 1px solid #1a6fb7; margin: 0 30px;"></div>
                                <div class="table1">
                                    <ul>
                                        <li>
                                            <p>Hãng xe</p>
                                            <td><?php echo $row['make']; ?></td>
                                        </li>
                                        <li>
                                            <p>Phiên bản</p>
                                            <td><?php echo $row['version']; ?></td>
                                        </li>
                                        <li>
                                            <p>Kiểu dáng</p>
                                            <td><?php echo $row['body_style']; ?></td>
                                        </li>
                                        <li>
                                            <p>Số ghế ngồi</p>
                                            <td><?php echo $row['seats']; ?></td>
                                        </li>
                                    </ul>
                                    <div style="margin: 15px;"></div>
                                    <ul>
                                        <li>
                                            <p>Dòng xe</p>
                                            <td><?php echo $row['model']; ?></td>
                                        </li>
                                        <li>
                                            <p>Năm sản xuất</p>
                                            <td><?php echo $row['year']; ?></td>
                                        </li>
                                        <li>
                                            <p>Xuất xứ</p>
                                            <td><?php echo $row['origin']; ?></td>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                            <div class="hidden" id="hiddenContent">
                                <div class="parameter-table0">
                                    <h4>Thông số kỹ thuật động cơ</h4>
                                    <div style="border-bottom: 1px solid #1a6fb7; margin: 0 30px;"></div>
                                    <div class="table1">
                                        <ul>
                                            <li>
                                                <p>Loại nhiên liệu</p>
                                                <td><?php echo $row['fuel_type']; ?></td>
                                            </li>
                                            <li>
                                                <p>Hộp số</p>
                                                <td><?php echo $row['transmission']; ?></td>
                                            </li>
                                        </ul>
                                        <div style="margin: 15px;"></div>
                                        <ul>
                                            <li>
                                                <p>Tình trạng:</p>
                                                <td><?php echo $row['condition']; ?></td>
                                            </li>
                                            <li>
                                                <p>Dung tích động cơ (lít):</p>
                                                <td><?php echo $row['engine_capacity']; ?></td>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="parameter-them">
                                <button id="toggleContentBtn">Xem thêm <i class='bx bxs-chevron-down'></i></button>
                            </div>
                        </div>
                    </div>
                    <h2 class="describe-h2">Mô tả</h2>
                    <div class="describe">
                        <div class="describe-text">
                            <p>🔥<?php echo $title; ?></p>
                            <div class="hidden" id="hiddenText">
                                <p><?php echo $row['description']; ?></p>
                            </div>
                        </div>
                        <div class="describe-btn">
                            <button id="toggleBtn">Xem thêm <i class='bx bxs-chevron-down'></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="details-xe">
                <div class="products-details2">
                    <h2 class="details-text">🔥<?php echo $title ?></h2>
                    <p class="price-details"><?php echo $price ?> tỷ</p>
                    <div class="details-2">
                        <div class="details-icon">
                            <i class='bx bx-calendar'></i>
                            <p>Năm sản xuất</p>
                        </div>
                        <span><?php echo $year ?></span>
                    </div>
                    <div class="details-2">
                        <div class="details-icon">
                            <i class='bx bx-gas-pump'></i>
                            <p>Nhiên liệu</p>
                        </div>
                        <span><?php echo $fuel_type ?></span>
                    </div>
                    <div class="details-2">
                        <div class="details-icon">
                            <i class='bx bx-palette'></i>
                            <p>Màu</p>
                        </div>
                        <span><?php echo $color ?></span>
                    </div>
                    <div class="details-2">
                        <div class="details-icon">
                            <i class='bx bx-line-chart'></i>
                            <p>Số KM</p>
                        </div>
                        <span><?php echo $mileage ?></span>
                    </div>
                    <div class="details-2">
                        <div class="details-icon">
                            <i class='bx bx-handicap'></i>
                            <p>Chỗ</p>
                        </div>
                        <span><?php echo $row['seats'] ?></span>
                    </div>
                    <div class="details-2">
                        <div class="details-icon">
                            <i class='bx bx-git-pull-request'></i>
                            <p>Hộ số</p>
                        </div>
                        <span><?php echo $transmission ?></span>
                    </div>
                    <div style="border-top: 1px solid #808080; margin: 20px;"></div>
                    <div class="details-2">
                        <div class="details-icon">
                            <i class='bx bx-map'></i>
                            <p>Vị trí</p>
                        </div>
                        <span><?php echo $location ?></span>
                    </div>

                    <div class="details-2">
                        <div class="details-icon">
                            <i class='bx bx-user-circle'></i>
                            <p>Đăng bởi</p>
                        </div>
                        <span><?php echo $seller_name ?></span>
                    </div>
                    <div class="details-2">
                        <button class="details-3" id="callSeller"><i class='bx bx-phone-call'></i>Gọi người bán</button>
                        <p id="phoneNumber" style="display: none;">Sdt: <?php echo $seller_phone ?></p>
                        <a href="https://zalo.me/<?php echo $seller_phone ?>">
                            <button class="details-4"><i class='bx bx-message-rounded'></i>Nhắn người bán </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var toggleBtn = document.getElementById("toggleContentBtn"); // Changed the ID
            var content = document.querySelector(".hidden"); // Corrected selector

            toggleBtn.addEventListener("click", function() {
                if (content.classList.contains("hidden")) {
                    content.classList.remove("hidden");
                    toggleBtn.innerHTML = "Thu gọn <i class='bx bxs-chevron-up'></i>";
                } else {
                    content.classList.add("hidden");
                    toggleBtn.innerHTML = "Xem thêm <i class='bx bxs-chevron-down'></i>";
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const callSellerBtn = document.getElementById('callSeller');
            const phoneNumber = document.getElementById('phoneNumber');

            callSellerBtn.addEventListener('click', function() {
                // Thay đổi văn bản của nút thành số điện thoại
                callSellerBtn.textContent = phoneNumber.textContent;
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggleBtn');
            const hiddenText = document.getElementById('hiddenText');

            toggleBtn.addEventListener('click', function() {
                if (hiddenText.classList.contains('hidden')) {
                    hiddenText.classList.remove('hidden');
                    toggleBtn.innerHTML = "Thu gọn <i class='bx bxs-chevron-up'></i>";
                } else {
                    hiddenText.classList.add('hidden');
                    toggleBtn.innerHTML = "Xem thêm <i class='bx bxs-chevron-down'></i>";
                }
            });
        });
    </script>

    <script src="../assets/script/script.js"></script>
</body>

</html>