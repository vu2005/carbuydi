<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$name = "root";
$password = "";
$dbname = "carbuydi";

// Tạo kết nối
$conn = new mysqli($servername, $name, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Xử lý biến id từ URL
$id = $_GET['id'];

// Truy vấn dữ liệu Sellers với id tương ứng
$sql = "SELECT * FROM sellers WHERE id=$id";
$result = $conn->query($sql);

// Kiểm tra xem có dữ liệu trả về không
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo '<div class="toast warning">';
    echo '<i class="fas fa-check-circle"></i>';
    echo '<span class="msg">Không tìm thấy người bán!</span>';
    echo '</div>';
    echo '<script>';
    echo 'setTimeout(function() {';
    echo '  window.location.href = "index.php?quanly=Sellers";'; // Chuyển hướng về trang quản lý Sellers
    echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (1000ms = 1 giây)
    echo '</script>';
    exit; // Thoát khỏi trang nếu không tìm thấy Sellers
}

// Kiểm tra xem biểu mẫu đã được gửi đi chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $id = $_POST["id"];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $company = $_POST['company'];

    // Cập nhật dữ liệu Sellers vào cơ sở dữ liệu
    $update_sql = "UPDATE sellers SET name='$name', email='$email', phone='$phone', address='$address', company='$company' WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        // Hiển thị thông báo thành công và chuyển hướng về trang quản lý Sellers
        echo '<div class="toast success">';
        echo '<i class="fas fa-check-circle"></i>';
        echo '<span class="msg">Cập nhật thông tin Sellers thành công!</span>';
        echo '</div>';
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "index.php?quanly=Sellers";'; // Chuyển hướng về trang quản lý Sellers
        echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (1000ms = 1 giây)
        echo '</script>';
    } else {
        // Hiển thị thông báo lỗi nếu cập nhật không thành công
        echo '<div class="toast error">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo '<span class="msg">Đã xảy ra lỗi khi cập nhật thông tin Sellers!</span>';
        echo '</div>';
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
    <title>Sửa Thông Tin Người Bán</title>
</head>

<body>
    <div class="container">
        <h2>Sửa Thông Tin Người Bán</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="name">Tên:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br>

            <label for="phone">Số điện thoại:</label><br>
            <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required><br>

            <label for="address">Địa chỉ:</label><br>
            <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required><br>

            <label for="company">Tên công ty (nếu có):</label><br>
            <input type="text" id="company" name="company" value="<?php echo $row['company']; ?>"><br><br>

            <input type="submit" class="control button" value="Lưu Thay Đổi">
        </form>
    </div>
</body>

</html>