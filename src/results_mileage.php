<?php
if (isset($_GET['mileage'])) {
    require_once '../config/config.php'; // Kết nối cơ sở dữ liệu

    // Lấy giá trị từ URL
    $mileage = $_GET['mileage'];

    // Xây dựng câu lệnh SQL với tham số để tránh SQL Injection
    $sql = "SELECT 
    c.id,
    c.make,
    c.model,
    c.year,
    c.mileage,
    c.price,
    cd.title AS car_title,
    cd.transmission,
    cd.fuel_type,
    ci.front_image,
    ci.rear_image,
    ci.left_image,
    ci.right_image,
    ci.dashboard_image,
    ci.inspection_image,
    ci.other_image,
    sc.province
FROM cars c
INNER JOIN cars_details cd ON c.id = cd.car_id
INNER JOIN cars_image ci ON c.id = ci.car_id
INNER JOIN sellers_car sc ON c.id = sc.car_id
WHERE c.mileage <= ?"; // Sử dụng toán tử so sánh bằng thích hợp

    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($sql);

    // Bind tham số
    $stmt->bind_param("i", $mileage);

    // Thực thi câu lệnh
    $stmt->execute();


    // Lấy kết quả
    $result = $stmt->get_result();

    if (!$result) {
        die("Lỗi truy vấn: " . $conn->error);
    }


    if ($result->num_rows > 0) {
        echo "<p class='total-cars'>Tổng số lượng xe: " . $result->num_rows . "</p>";
        echo "<div class='products-sp'>";
        while ($row = $result->fetch_assoc()) {
            // Hiển thị thông tin của xe
            $formatted_mileage = number_format($row['mileage'], 0, '.');
            echo "<div class='products'>";
            echo "<a href='Details.php?id=" . $row['id'] . "&make=" . $row['make'] . "' class='products-a'>";


            echo "<div class='header-products'>";
            echo "<div class='carousel'>";
            // Hiển thị hình ảnh của sản phẩm
            echo "<div><img src='" . $row['front_image'] . "' alt=''></div>";
            echo "<div><img src='" . $row['rear_image'] . "' alt=''></div>";
            echo "<div><img src='" . $row['left_image'] . "' alt=''></div>";
            echo "<div><img src='" . $row['right_image'] . "' alt=''></div>";
            echo "<div><img src='" . $row['dashboard_image'] . "' alt=''></div>";
            echo "<div><img src='" . $row['inspection_image'] . "' alt=''></div>";
            echo "<div><img src='" . $row['other_image'] . "' alt=''></div>";

            echo "</div>";
            echo "</div>";
            echo "</a>";
            echo "<div class='text-products'>";
            // Hiển thị thông tin xe
            echo "<p><i class='bx bxs-hot'></i><i id='hot' class='bx bxs-hot'></i>" . $row["make"] . " " . $row["model"] . "</p>";
            // Hiển thị tiêu đề của sản phẩm từ bảng cars_details
            echo "<p>" . $row["car_title"] . "</p>";
            echo "</div>";
            echo "<div class='icon-products'>";
            echo "<ul>";
            // Hiển thị năm sản xuất và Nhiên Liệu
            echo "<li><img src='../assets/images/icon1.svg' alt=''>" . $row["year"] . "</li>";
            echo "<li><img src='../assets/images/icon2.svg' alt=''>" . $row["fuel_type"] . "</li>";
            echo "</ul>";
            echo "<ul>";
            // Hiển thị số km và hộ số
            echo "<li><img src='../assets/images/icon3.svg' alt=''>" . $formatted_mileage . " Km</li>";
            echo "<li><img src='../assets/images/icon4.svg' alt=''>" . $row["transmission"] . "</li>";
            echo "</ul>";
            echo "</div>";
            echo "<div class='map-products'>";
            // Hiển thị địa điểm
            echo "<p><i class='bx bx-map'></i>" . $row["province"] . "</p>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p class='total-cars'>Không có sản phẩm nào phù hợp</p>";
    }

    $conn->close();
}
