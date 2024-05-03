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

// Kiểm tra xem biến id có được truyền từ URL không
$id = $_GET['id'];
$sql = "SELECT * FROM cars WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Lấy dữ liệu từ cơ sở dữ liệu và gán vào các biến
    $make = $row['make'];
    $model = $row['model'];
    $year = $row['year'];
    $mileage = $row['mileage'];
    $price = $row['price'];
    $transmission = $row['transmission'];
    $fuel_type = $row['fuel_type'];
    $body_style = $row['body_style'];
    $color = $row['color'];
    $description = $row['description'];
    $location = $row['location'];
    $seller_id = $row['seller_id'];
    $images = explode(",", $row['images']); // Chia chuỗi các đường dẫn ảnh thành mảng


    // Cập nhật dữ liệu admin vào cơ sở dữ liệu
    $update_sql = "UPDATE cars SET make='$make', model='$model', year='$year', mileage='$mileage', price='$price', transmission='$transmission', fuel_type='$fuel_type', body_style='$body_style', color='$color', description='$description', location='$location', seller_id='$seller_id' WHERE id=$id";
    if ($conn->query($update_sql) === TRUE) {
        // Hiển thị thông báo thành công và chuyển hướng về trang quản lý admin
        echo '<div class="toast success">';
        echo '<i class="fas fa-check-circle"></i>';
        echo '<span class="msg">Cập nhật thông tin sản phẩm thành công!</span>';
        echo '</div>';
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "index.php?quanly=Products";'; // Chuyển hướng về trang quản lý admin
        echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (1000ms = 1 giây)
        echo '</script>';
    } else {
        // Hiển thị thông báo lỗi nếu cập nhật không thành công
        echo '<div class="toast error">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo '<span class="msg">Đã xảy ra lỗi khi cập nhật sản phẩm!</span>';
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
    <title>Chỉnh sửa thông tin sản phẩm</title>
</head>

<body>
    <div class="container" style="margin: 20px auto;">
        <h1>Sửa sản phẩm</h1>
        <form id="productForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-edit">
                <div class="form-edit0">
                    <label for="make">Hãng Xe:</label>
                    <input type="text" id="make" name="make" value="<?php echo $make; ?>" required><br>

                    <label for="model">Model Xe:</label>
                    <input type="text" id="model" name="model" value="<?php echo $model; ?>" required><br>

                    <label for="year">Năm sản xuất:</label>
                    <input type="text" id="year" name="year" value="<?php echo $year; ?>" required><br>

                    <label for="mileage">Số km đã đi:</label>
                    <input type="text" id="mileage" name="mileage" value="<?php echo $mileage; ?>"><br>

                    <label for="price">Giá Bán:</label>
                    <br>
                    <input type="number" id="price" name="price" step="any" value="<?php echo $price; ?>" required><br>

                    <label for="transmission">Hộp số:</label>
                    <select id="transmission" name="transmission">
                        <option value="Số tự động" <?php if ($transmission == "Số tự động") echo "selected"; ?>>Tự động</option>
                        <option value="Số sàn" <?php if ($transmission == "Số sàn") echo "selected"; ?>>Số sàn</option>
                        <option value="Số cơ" <?php if ($transmission == "Số cơ") echo "selected"; ?>>Số cơ</option>
                    </select><br>
                    <label for="fuel_type" class="fuel_type left-align">
                        <p style="   text-align: left;">Loại nhiên liệu:</p>
                    </label>

                    <div class="radio_group">
                        <input type="radio" id="fuel_type_dau" name="fuel_type" value="Dầu" <?php if ($fuel_type == "Dầu") echo "checked"; ?>> Dầu
                        <input type="radio" id="fuel_type_xang" name="fuel_type" value="Xăng" <?php if ($fuel_type == "Xăng") echo "checked"; ?>> Xăng
                        <input type="radio" id="fuel_type_gas" name="fuel_type" value="Gas" <?php if ($fuel_type == "Gas") echo "checked"; ?>> Gas
                        <input type="radio" id="fuel_type_dien" name="fuel_type" value="Điện" <?php if ($fuel_type == "Điện") echo "checked"; ?>> Điện
                    </div>
                    <br>

                </div>
                <div class="form-edit1">
                    <label for="body_style">Kiểu Dáng Xe:</label>
                    <input type="text" id="body_style" name="body_style" value="<?php echo $body_style; ?>" required><br>

                    <label for="color">Màu Sắc:</label>
                    <input type="text" id="color" name="color" value="<?php echo $color; ?>" required><br>

                    <label for="description">Mô Tả:</label><br>
                    <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea><br>

                    <label for="images">Hình Ảnh:</label>
                    <input type="file" id="images" name="images" multiple accept="image/*"><br>

                    <?php
                    // Hiển thị các hình ảnh sản phẩm để người dùng có thể xem và thay đổi
                    if (!empty($images)) {
                        foreach ($images as $path) {
                            echo '<img src="../assets/images/' . $path . '" alt="Product Image" style="width: 100px; height: 100px; margin-right: 10px;">';
                        }
                    }
                    ?><br>

                    <label for="location">Vị Trí:</label>
                    <input type="text" id="location" name="location" value="<?php echo $location; ?>" required><br>

                    <label for="seller_id">Mã Người Bán:</label>
                    <input type="number" id="seller_id" name="seller_id" value="<?php echo $seller_id; ?>" required><br>

                    <button class="control button" type="submit">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>