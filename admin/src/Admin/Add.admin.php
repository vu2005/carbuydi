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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $username = empty($_POST['username']) ? "Nodata" : $_POST['username'];
    $password = empty($_POST['password']) ? "Nodata" : $_POST['password'];
    $email = empty($_POST['email']) ? "Nodata" : $_POST['email'];
    $full_name = empty($_POST['full_name']) ? "Nodata" : $_POST['full_name'];
    $date_of_birth = empty($_POST['date_of_birth']) ? "Nodata" : $_POST['date_of_birth'];
    $role = empty($_POST['role']) ? "Nodata" : $_POST['role'];

    // Kiểm tra xem ID đã tồn tại trong cơ sở dữ liệu hay chưa
    $check_id_sql = "SELECT id FROM admins WHERE id='$id'";
    $check_id_result = $conn->query($check_id_sql);
    if ($check_id_result->num_rows > 0) {
        // Hiển thị thông báo lỗi nếu ID đã tồn tại
        echo '<div class="toast error">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo '<span class="msg">ID đã tồn tại! Vui lòng chọn ID khác.</span>';
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "index.php?quanly=Admin-add";'; // Chuyển hướng về trang sản phẩm
        echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (3000ms = 3 giây)
        echo '</script>';
        echo '</div>';
    } else {
        // Thêm dữ liệu mới vào cơ sở dữ liệu
        $sql = "INSERT INTO admins (id, username, password, email, full_name, date_of_birth, role) 
                VALUES ('$id', '$username', '$password', '$email', '$full_name', '$date_of_birth', '$role')";
        if ($conn->query($sql) === TRUE) {
            // Hiển thị thông báo thành công và chuyển hướng về trang quản lý admin
            echo '<div class="toast success">';
            echo '<i class="fas fa-check-circle"></i>';
            echo '<span class="msg">Thêm dữ liệu thành công!</span>';
            echo '</div>';
            echo '<script>';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "index.php?quanly=Admin";'; // Chuyển hướng về trang sản phẩm
            echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (3000ms = 3 giây)
            echo '</script>';
        } else {
            // Hiển thị thông báo lỗi
            echo '<div class="toast error">';
            echo '<i class="fas fa-exclamation-triangle"></i>';
            echo '<span class="msg">Đã xảy ra lỗi khi thêm dữ liệu!</span>';
            echo '<script>';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "index.php?quanly=Admin-add";'; // Chuyển hướng về trang sản phẩm
            echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (3000ms = 3 giây)
            echo '</script>';
            echo '</div>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
</head>

<body>
    <div class="container">
        <h2>Add Admin</h2>
        <form action="#" method="post" enctype="multipart/form-data">

            <label for="id">ID:</label>
            <input type="text" id="id" name="id" required><br><br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name"><br><br>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth"><br><br>

            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="admin">Admin</option>
                <option value="editor">Editor</option>
            </select><br><br>

            <input type="submit" class="control button" value="Add Admin">
        </form>
    </div>
</body>

</html>