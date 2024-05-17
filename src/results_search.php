<?php
require_once '../config/config.php'; // Kết nối cơ sở dữ liệu

if (isset($_GET['select'])) {
    $search_query = $_GET['select']; // Lấy tham số 'select' từ URL
    $search_terms = explode(",", $search_query);
    
    // Chuẩn bị câu lệnh SQL cơ bản
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
            cd.body_style,
            cd.color,
            cd.seats,
            ci.front_image,
            ci.rear_image,
            ci.left_image,
            ci.right_image,
            ci.dashboard_image,
            ci.inspection_image,
            ci.other_image,
            sc.province
        FROM 
            cars c
        INNER JOIN 
            cars_details cd ON c.id = cd.car_id
        INNER JOIN 
            cars_image ci ON c.id = ci.car_id
        INNER JOIN 
            sellers_car sc ON c.id = sc.car_id
        WHERE ";

    // Chuẩn bị điều kiện tìm kiếm
    $conditions = [];
    $params = [];
    foreach ($search_terms as $term) {
        $term = trim($term); // Loại bỏ khoảng trắng thừa
        $conditions[] = "(c.make LIKE ? OR c.model LIKE ? OR (c.make LIKE ? AND cd.body_style LIKE ?))";
        $param = "%$term%";
        array_push($params, $param, $param, $param, $param);
    }
    $sql .= implode(" OR ", $conditions);

    // Thêm các bộ lọc khác nếu có
    $filter_conditions = [];
    
    if (isset($_GET['year'])) {
        $year = $_GET['year'];
        $filter_conditions[] = "c.year = ?";
        array_push($params, $year);
    }
    
    if (isset($_GET['fuel_type'])) {
        $fuel_type = $_GET['fuel_type'];
        $filter_conditions[] = "cd.fuel_type = ?";
        array_push($params, $fuel_type);
    }

    if (isset($_GET['body_style'])) {
        $body_style = $_GET['body_style'];
        $filter_conditions[] = "cd.body_style = ?";
        array_push($params, $body_style);
    }

    if (isset($_GET['max_mileage'])) {
        $max_mileage = $_GET['max_mileage'];
        $filter_conditions[] = "c.mileage <= ?";
        array_push($params, $max_mileage);
    }

    if (isset($_GET['color'])) {
        $color = $_GET['color'];
        $filter_conditions[] = "cd.color = ?";
        array_push($params, $color);
    }

    if (isset($_GET['seats'])) {
        $seats = $_GET['seats'];
        $filter_conditions[] = "cd.seats = ?";
        array_push($params, $seats);
    }

    if (isset($_GET['posted_by'])) {
        $posted_by = $_GET['posted_by'];
        if ($posted_by == 'admin') {
            $filter_conditions[] = "c.id IN (SELECT car_id FROM user_car_listing WHERE user_id IN (SELECT id FROM users WHERE role = 'admin'))";
        } else if ($posted_by == 'user') {
            $filter_conditions[] = "c.id IN (SELECT car_id FROM user_car_listing WHERE user_id IN (SELECT id FROM users WHERE role = 'user'))";
        }
    }

    if (!empty($filter_conditions)) {
        $sql .= " AND " . implode(" AND ", $filter_conditions);
    }

    // Chuẩn bị câu lệnh
    $stmt = $conn->prepare($sql);
    
    // Gán tham số
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    
    // Thực thi truy vấn
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Lỗi truy vấn: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        echo "<p class='total-cars'>Tổng số lượng xe: " . $result->num_rows . "</p>";
        echo "<div class='products-sp'>";
        while ($row = $result->fetch_assoc()) {
            $formatted_mileage = number_format($row['mileage'], 0, '.', ',');
            // Hiển thị thông tin của xe
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
            // Hiển thị số km và hộp số
            echo "<li><img src='../assets/images/icon3.svg' alt=''>" .  $formatted_mileage . " Km</li>";
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

    $stmt->close();
    $conn->close();
}
?>
