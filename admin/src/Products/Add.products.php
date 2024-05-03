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
    // Lấy dữ liệu từ form và gán giá trị mặc định là "Nodata" nếu trường đó không được điền
    $id = $_POST["id"];
    $make = empty($_POST['make']) ? "Nodata" : $_POST['make'];
    $model = empty($_POST['model']) ? "Nodata" : $_POST['model'];
    $year = empty($_POST['year']) ? "Nodata" : $_POST['year'];
    $mileage = empty($_POST['mileage']) ? "Nodata" : $_POST['mileage'];
    $price = empty($_POST['price']) ? "Nodata" : $_POST['price'];
    $transmission = empty($_POST['transmission']) ? "Nodata" : $_POST['transmission'];
    $fuel_type = empty($_POST['fuel_type']) ? "Nodata" : $_POST['fuel_type'];
    $body_style = empty($_POST['body_style']) ? "Nodata" : $_POST['body_style'];
    $color = empty($_POST['color']) ? "Nodata" : $_POST['color'];
    $description = empty($_POST['description']) ? "Nodata" : $_POST['description'];
    $location = empty($_POST['location']) ? "Nodata" : $_POST['location'];
    $seller_id = empty($_POST['seller_id']) ? "Nodata" : $_POST['seller_id'];

    // Kiểm tra xem dữ liệu hình ảnh đã được gửi lên và không có lỗi
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Lấy đường dẫn tạm thời của tệp tải lên
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_name = $_FILES['image/*']['name'];
        $file_destination = "../assets/images/" . $file_name; // Thư mục lưu trữ tệp hình ảnh

        // Di chuyển tệp tạm thời vào thư mục đích
        if (move_uploaded_file($file_tmp, $file_destination)) {
            // SQL để thêm dữ liệu vào bảng Xe
            $sql = "INSERT INTO cars (id, make, model, year, mileage, price, transmission, fuel_type, body_style, color, description, images, location, seller_id) 
                VALUES ('$id', '$make', '$model', '$year', '$mileage', '$price', '$transmission', '$fuel_type', '$body_style', '$color', '$description', '$file_destination', '$location', '$seller_id')";


            if ($conn->query($sql) === TRUE) {
                // Hiển thị thông báo thành công
                echo '<div class="toast success">';
                echo '<i class="fas fa-check-circle"></i>';
                echo '<span class="msg">Thêm sản phẩm thành công!</span>';
                echo '</div>';
                echo '<script>';
                echo 'setTimeout(function() {';
                echo '  window.location.href = "index.php?quanly=Products";'; // Chuyển hướng về trang sản phẩm
                echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (3000ms = 3 giây)
                echo '</script>';
            } else {
                // Hiển thị thông báo lỗi
                echo '<div class="toast error">';
                echo '<i class="fas fa-exclamation-triangle"></i>';
                echo '<span class="msg">Đã xảy ra lỗi khi thêm sản phẩm!</span>';
                echo '</div>';
            }
        } else {
            // Hiển thị thông báo lỗi nếu di chuyển tệp không thành công
            echo '<div class="toast error">';
            echo '<i class="fas fa-exclamation-triangle"></i>';
            echo '<span class="msg">Vui lòng thêm hình ảnh!</span>';
            echo '</div>';
        }
    } else {
        // Hiển thị thông báo lỗi nếu dữ liệu hình ảnh không được gửi lên
        echo '<div class="toast warning">';
        echo '<i class="fas fa-exclamation-circle"></i>';
        echo '<span class="msg">Vui lòng chọn hình ảnh!</span>';
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
    <title>Thêm mới sản phẩm</title>
</head>

<body>
    <div class="container" style="margin: 20px auto;">
        <h1>Thêm sản phẩm</h1>
        <form id="productForm" action="#" method="POST" enctype="multipart/form-data">
            <div class="form-edit">
                <div class="form-edit0">

                    <label for="id">ID:</label>
                    <input type="text" id="id
                    " name="id
                    " required><br>

                    <label for="make">Hãng Xe:</label>
                    <input type="text" id="make" name="make" required><br>

                    <label for="model">Model Xe:</label>
                    <input type="text" id="model" name="model" required><br>

                    <label for="year">Năm sản xuất:</label>
                    <input type="text" id="year" name="year" required><br>

                    <label for="mileage">Số km đã đi:</label>
                    <input type="text" id="mileage" name="mileage" value=""><br>

                    <label for="price">Giá Bán:</label>
                    <input type="number" id="price" name="price" step="any" required><br>

                    <label for="transmission">Hộp số:</label>
                    <select id="transmission" name="transmission">
                        <option value="Số tự động">Tự động</option>
                        <option value="Số sàn">Số sàn</option>
                        <option value="Số cơ">Số cơ</option>
                    </select><br>
                    <label for="fuel_type">
                        Loại nhiên liệu:</label>
                    <div class="radio_group">
                        <input type="radio" id="fuel_type_dau" name="fuel_type" value="Dầu"> Dầu
                        <input type="radio" id="fuel_type_xang" name="fuel_type" value="Xăng"> Xăng
                        <input type="radio" id="fuel_type_gas" name="fuel_type" value="Gas"> Gas
                        <input type="radio" id="fuel_type_dien" name="fuel_type" value="Điện"> Điện
                    </div>
                    <br>
                </div>
                <div class="form-edit1">
                    <label for="body_style">Kiểu Dáng Xe:</label>
                    <input type="text" id="body_style" name="body_style" required><br>

                    <label for="color">Màu Sắc:</label>
                    <input type="text" id="color" name="color" required><br>

                    <label for="description">Mô Tả:</label><br>
                    <textarea id="description" name="description" rows="4" required></textarea><br>

                    <label for="images">Hình Ảnh:</label>
                    <input type="file" id="images" name="images" multiple accept="image/*" required><br>

                    <label for="location">Vị Trí:</label>
                    <input type="text" id="location" name="location" required><br>

                    <label for="seller_id">Mã Người Bán:</label>
                    <input type="number" id="seller_id" name="seller_id" required><br>

                    <button class="control button" type="submit">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>