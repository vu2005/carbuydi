<?php
require_once('../config/config.php');

// Xác định ID của sản phẩm cần xóa từ tham số truyền vào
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa bản ghi trong bảng cars_image trước
    $sql_image = "DELETE FROM cars_image WHERE car_id = $id";
    if ($conn->query($sql_image) === TRUE) {
        // Tiếp theo, xóa bản ghi trong bảng cars_details
        $sql_details = "DELETE FROM cars_details WHERE car_id = $id";
        if ($conn->query($sql_details) === TRUE) {
            // Sau đó, xóa bản ghi trong bảng cars
            $sql_cars = "DELETE FROM cars WHERE id = $id";
            if ($conn->query($sql_cars) === TRUE) {
                // Xóa bản ghi trong bảng sellers_car
                $sql_sellers = "DELETE FROM sellers_car WHERE car_id = $id";
                $conn->query($sql_sellers);

                // Hiển thị thông báo thành công bằng JavaScript và chuyển hướng sau một khoảng thời gian
                echo '<div class="toast success">';
                echo '<i class="fas fa-check-circle"></i>';
                echo '<span class="msg">Xóa sản phẩm thành công!</span>';
                echo '</div>';
                echo '<script>';
                echo 'setTimeout(function() {';
                echo '  window.location.href = "index.php?quanly=Products";'; // Chuyển hướng về trang sản phẩm
                echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (3000ms = 3 giây)
                echo '</script>';
            } else {
                // Hiển thị thông báo lỗi bằng JavaScript
                echo '<script>alert("Lỗi khi xóa dữ liệu: ' . $conn->error . '");</script>';
            }
        } else {
            // Hiển thị thông báo lỗi bằng JavaScript
            echo '<script>alert("Lỗi khi xóa dữ liệu: ' . $conn->error . '");</script>';
        }
    } else {
        // Hiển thị thông báo lỗi bằng JavaScript
        echo '<script>alert("Lỗi khi xóa dữ liệu: ' . $conn->error . '");</script>';
    }
}

// Đóng kết nối
$conn->close();
