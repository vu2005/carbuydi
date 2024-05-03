<?php
require_once '../config/config.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra kết nối cơ sở dữ liệu
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Truy vấn dữ liệu số lượng xe trong bảng cars
$sql_count = "SELECT COUNT(*) AS total FROM cars";
$result_count = $conn->query($sql_count);
if (!$result_count) {
    die("Lỗi truy vấn: " . $conn->error);
}
$row_count = $result_count->fetch_assoc();
$total_cars = $row_count['total'];

// In ra tổng số lượng xe
echo "<p class='total-cars'>Tổng số lượng xe: " . $total_cars . "</p>";
echo "<div class='products-sp'>"; // Mở thẻ cha products-sp ở đây

// Truy vấn dữ liệu sản phẩm từ các bảng cars, cars_details, cars_image và sellers_car
$sql = "SELECT cars.*, cars_details.transmission, cars_details.title AS car_title, cars_image.image_url, sellers_car.address 
        FROM cars 
        LEFT JOIN cars_details ON cars.id = cars_details.car_id 
        LEFT JOIN cars_image ON cars.id = cars_image.car_id 
        LEFT JOIN sellers_car ON cars.id = sellers_car.id";
$result = $conn->query($sql);

if (!$result) {
    die("Lỗi truy vấn: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Duyệt qua từng hàng dữ liệu
    while ($row = $result->fetch_assoc()) {
        // Kiểm tra nếu trường 'car_id' tồn tại trong kết quả trước khi sử dụng
        if (isset($row['id'])) {
            // Hiển thị sản phẩm
            echo "<div class='products'>";
            echo "<a href='Details.php?id=" . $row['id'] . "' class='products-a'>";

            echo "<div class='header-products'>";
            echo "<div class='carousel'>";
            // Hiển thị hình ảnh của sản phẩm
            echo "<div><img src='" . $row['image_url'] . "' alt=''></div>";
            echo "</div>";
            echo "</div>";
            echo "</a>";
            echo "<div class='text-products'>";
            // Hiển thị thông tin về hãng và dòng xe
            echo "<p><i class='bx bxs-hot'></i><i id='hot' class='bx bxs-hot'></i>" . $row["make"] . " " . $row["model"] . "</p>";
            // Hiển thị tiêu đề của sản phẩm từ bảng cars_details
            echo "<p>" . $row["car_title"] . "</p>";
            echo "</div>";
            echo "<div class='icon-products'>";
            echo "<ul>";
            // Hiển thị năm sản xuất và số KM
            echo "<li><img src='../assets/images/icon1.svg' alt=''>" . $row["year"] . "</li>";
            echo "<li><img src='../assets/images/icon2.svg' alt=''>" . $row["mileage"] . " Km</li>";
            echo "</ul>";
            echo "<ul>";
            // Hiển thị hộp số và giá
            echo "<li><img src='../assets/images/icon3.svg' alt=''>" . $row["transmission"] . "</li>";
            echo "<li><img src='../assets/images/icon4.svg' alt=''>" . $row["price"] . "</li>";
            echo "</ul>";
            echo "</div>";
            echo "<div class='map-products'>";
            // Hiển thị địa điểm
            echo "<p><i class='bx bx-map'></i>" . $row["address"] . "</p>";
            echo "</div>";
            echo "</div>";
        }
    }
} else {
    // Hiển thị thông báo nếu không có sản phẩm trong cơ sở dữ liệu
    echo "Không có sản phẩm nào";
}

echo "</div>"; // Đóng thẻ cha products-sp ở đây

// Đóng kết nối
$conn->close();
