<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carbuydi";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Xác định ID của sản phẩm cần xóa từ tham số truyền vào
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL để xóa sản phẩm từ cơ sở dữ liệu
    $sql = "DELETE FROM sellers WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Hiển thị thông báo thành công bằng JavaScript và chuyển hướng sau một khoảng thời gian
        echo '<div class="toast success">';
        echo '<i class="fas fa-check-circle"></i>';
        echo '<span class="msg">Xóa người bán thành công!</span>';
        echo '</div>';
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "index.php?quanly=Sellers";'; // Chuyển hướng về trang sản phẩm
        echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (3000ms = 3 giây)
        echo '</script>';
    } else {
        // Hiển thị thông báo lỗi bằng JavaScript
        echo '<script>alert("Lỗi khi xóa dữ liệu: ' . $conn->error . '");</script>';
    }
}

// Đóng kết nối
$conn->close();
