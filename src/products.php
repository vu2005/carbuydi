<?php

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

$sql = "
SELECT 
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
    sc.address
FROM cars c
INNER JOIN cars_details cd ON c.id = cd.car_id
INNER JOIN cars_image ci ON c.id = ci.car_id
INNER JOIN sellers_car sc ON c.id = sc.car_id;
";

$result = $conn->query($sql);

if (!$result) {
    die("Lỗi truy vấn: " . $conn->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị của trường lựa chọn từ form
    $sortingOption = $_POST["sorting"];

    // Thực hiện sắp xếp và lọc sản phẩm dựa trên lựa chọn
    switch ($sortingOption) {
        case "all_cars":
            // Lấy tất cả các sản phẩm
            $sql = "
            SELECT 
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
                sc.address
            FROM cars c
            INNER JOIN cars_details cd ON c.id = cd.car_id
            INNER JOIN cars_image ci ON c.id = ci.car_id
            INNER JOIN sellers_car sc ON c.id = sc.car_id;
            ";
            break;

            //ngày đăng mới nhất đến cũ nhất
        case "newest":
            $sql = "
            SELECT 
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
                sc.address
            FROM cars c
            INNER JOIN cars_details cd ON c.id = cd.car_id
            INNER JOIN cars_image ci ON c.id = ci.car_id
            INNER JOIN sellers_car sc ON c.id = sc.car_id
            ORDER BY sc.posted_date DESC;
            ";
            break;
        case "oldest":
            // Lấy các sản phẩm theo thứ tự cũ nhất đến mới nhất
            $sql = "
            SELECT 
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
                sc.address
            FROM cars c
            INNER JOIN cars_details cd ON c.id = cd.car_id
            INNER JOIN cars_image ci ON c.id = ci.car_id
            INNER JOIN sellers_car sc ON c.id = sc.car_id
            ORDER BY sc.posted_date ASC;
            ";
            break;
        case "price_asc":
            // Lấy các sản phẩm theo thứ tự giá tăng dần
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
            sc.address
        FROM cars c
        INNER JOIN cars_details cd ON c.id = cd.car_id
        INNER JOIN cars_image ci ON c.id = ci.car_id
        INNER JOIN sellers_car sc ON c.id = sc.car_id
        ORDER BY c.price ASC";
            break;
        case "price_desc":
            // Lấy các sản phẩm theo thứ tự giá giảm dần
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
            sc.address
        FROM cars c
        INNER JOIN cars_details cd ON c.id = cd.car_id
        INNER JOIN cars_image ci ON c.id = ci.car_id
        INNER JOIN sellers_car sc ON c.id = sc.car_id
        ORDER BY c.price DESC";
            break;
        case "mileage_asc":
            // Lấy các sản phẩm theo thứ tự số km tăng dần
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
            sc.address
        FROM cars c
        INNER JOIN cars_details cd ON c.id = cd.car_id
        INNER JOIN cars_image ci ON c.id = ci.car_id
        INNER JOIN sellers_car sc ON c.id = sc.car_id
        ORDER BY c.mileage ASC";
            break;
        case "mileage_desc":
            // Lấy các sản phẩm theo thứ tự số km giảm dần
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
            sc.address
        FROM cars c
        INNER JOIN cars_details cd ON c.id = cd.car_id
        INNER JOIN cars_image ci ON c.id = ci.car_id
        INNER JOIN sellers_car sc ON c.id = sc.car_id
        ORDER BY c.mileage DESC";
            break;
        case "year_asc":
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
            sc.address
        FROM cars c
        INNER JOIN cars_details cd ON c.id = cd.car_id
        INNER JOIN cars_image ci ON c.id = ci.car_id
        INNER JOIN sellers_car sc ON c.id = sc.car_id
        ORDER BY c.year ASC";
            break;
        case "year_desc":
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
            sc.address
        FROM cars c
        INNER JOIN cars_details cd ON c.id = cd.car_id
        INNER JOIN cars_image ci ON c.id = ci.car_id
        INNER JOIN sellers_car sc ON c.id = sc.car_id
        ORDER BY c.year DESC";
            break;
    }
}

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
            echo "<li><img src='../assets/images/icon3.svg' alt=''>" . $row["mileage"] . " Km</li>";
            echo "<li><img src='../assets/images/icon4.svg' alt=''>" . $row["transmission"] . "</li>";
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
