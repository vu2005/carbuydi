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

// Xử lý dữ liệu từ form khi form được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $company = $_POST["company"];

    // Kiểm tra xem ID đã tồn tại trong bảng sellers hay chưa
    $check_id_sql = "SELECT id FROM sellers WHERE id='$id'";
    $check_id_result = $conn->query($check_id_sql);

    if ($check_id_result->num_rows > 0) {
        // Hiển thị thông báo lỗi nếu ID đã tồn tại
        echo '<div class="toast error">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo '<span class="msg">ID đã tồn tại! Vui lòng chọn ID khác.</span>';
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "index.php?quanly=Sellers";'; // Chuyển hướng về trang Người bán
        echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (3000ms = 3 giây)
        echo '</script>';
        echo '</div>';
    } else {
        // SQL để thêm dữ liệu vào bảng người bán
        $sql = "INSERT INTO sellers (id, name, email, phone, address, company) 
                VALUES ('$id', '$name', '$email', '$phone', '$address', '$company')";

        if ($conn->query($sql) === TRUE) {
            // Hiển thị thông báo thành công
            echo '<div class="toast success">';
            echo '<i class="fas fa-check-circle"></i>';
            echo '<span class="msg">Thêm người bán thành công!</span>';
            echo '</div>';
            echo '<script>';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "index.php?quanly=Sellers";'; // Chuyển hướng về trang Người bán
            echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (3000ms = 3 giây)
            echo '</script>';
        } else {
            // Hiển thị thông báo lỗi
            echo '<div class="toast error">';
            echo '<i class="fas fa-exclamation-triangle"></i>';
            echo '<span class="msg">Đã xảy ra lỗi khi thêm người bán!</span>';
            echo '</div>';
        }
    }
}

// Đóng kết nối
$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Người Bán</title>
</head>

<body>
    <div class="container">
        <h2>Thêm Người Bán</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            <label for="id">ID:</label><br>
            <input type="text" id="id" name="id" required><br>
            <label for="name">Tên:</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="phone">Số điện thoại:</label><br>
            <input type="text" id="phone" name="phone" required><br>
            <label for="address">Địa chỉ:</label><br>
            <input type="text" id="address" name="address" required><br>
            <label for="company">Tên công ty (nếu có):</label><br>
            <input type="text" id="company" name="company"><br><br>
            <input type="submit" class="control button" value="Thêm Người Bán">
        </form>
    </div>
</body>

</html>