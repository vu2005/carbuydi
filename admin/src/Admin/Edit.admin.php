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

// Xử lý biến id từ URL
$id = $_GET['id'];

// Truy vấn dữ liệu admin với id tương ứng
$sql = "SELECT * FROM admins WHERE id=$id";
$result = $conn->query($sql);

// Kiểm tra xem có dữ liệu trả về không
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Không tìm thấy admin!";
    exit; // Thoát khỏi trang nếu không tìm thấy admin
}

// Kiểm tra xem biểu mẫu đã được gửi đi chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $role = $_POST['role'];

    // Cập nhật dữ liệu admin vào cơ sở dữ liệu
    $update_sql = "UPDATE admins SET username='$username', password='$password', email='$email', full_name='$full_name', date_of_birth='$date_of_birth', role='$role' WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        // Hiển thị thông báo thành công và chuyển hướng về trang quản lý admin
        echo '<div class="toast success">';
        echo '<i class="fas fa-check-circle"></i>';
        echo '<span class="msg">Cập nhật thông tin admin thành công!</span>';
        echo '</div>';
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "index.php?quanly=Admin";'; // Chuyển hướng về trang quản lý admin
        echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (1000ms = 1 giây)
        echo '</script>';
    } else {
        // Hiển thị thông báo lỗi nếu cập nhật không thành công
        echo '<div class="toast error">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo '<span class="msg">Đã xảy ra lỗi khi cập nhật thông tin admin!</span>';
        echo '</div>';
    }
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
</head>

<body>
    <div class="container">
        <h2>Edit Admin</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>"><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>"><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo $row['full_name']; ?>"><br><br>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>"><br><br>

            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="admin" <?php if ($row['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="editor" <?php if ($row['role'] == 'editor') echo 'selected'; ?>>Editor</option>
            </select><br><br>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>

</html>