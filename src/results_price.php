<?php

if (isset($_GET['price'])) {
    $search_query = $_GET['price'];
    
    // Chuyển đổi giá trị "under_500" thành số cụ thể cho truy vấn SQL
    switch ($search_query) {
        case 'under_500':
            $price_limit = 500000000;
            break;
        case '500_to_700':
            $price_limit = 700000000;
            break;
        case '700_to_1000':
            $price_limit = 1000000000;
            break;
        case 'above_1b':
            $price_limit = 5000000000;
            break;
        default:
            $price_limit = (int)$search_query;
            break;
    }

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
            WHERE c.price <= ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $price_limit);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<p class='total-cars'>Tổng số lượng xe: " . $result->num_rows . "</p>";
        echo "<div class='products-sp'>";
        while ($row = $result->fetch_assoc()) {
            $formatted_mileage = number_format($row['mileage'], 0, '.', ',');
            echo "<div class='products'>";
            echo "<a href='Details.php?id=" . $row['id'] . "&make=" . $row['make'] . "' class='products-a'>";

            echo "<div class='header-products'>";
            echo "<div class='carousel'>";
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
            echo "<p><i class='bx bxs-hot'></i><i id='hot' class='bx bxs-hot'></i>" . $row["make"] . " " . $row["model"] . "</p>";
            echo "<p>" . $row["car_title"] . "</p>";
            echo "</div>";
            echo "<div class='icon-products'>";
            echo "<ul>";
            echo "<li><img src='../assets/images/icon1.svg' alt=''>" . $row["year"] . "</li>";
            echo "<li><img src='../assets/images/icon2.svg' alt=''>" . $row["fuel_type"] . "</li>";
            echo "</ul>";
            echo "<ul>";
            echo "<li><img src='../assets/images/icon3.svg' alt=''>" .  $formatted_mileage . " Km</li>";
            echo "<li><img src='../assets/images/icon4.svg' alt=''>" . $row["transmission"] . "</li>";
            echo "</ul>";
            echo "</div>";
            echo "<div class='map-products'>";
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
