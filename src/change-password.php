<?php
require_once '../config/config.php'; // Kết nối cơ sở dữ liệu

// Xử lý biến id từ URL
$id = $_GET['id'];

// Truy vấn dữ liệu admin với id tương ứng
$sql = "SELECT email, password FROM users WHERE id=$id";
$result = $conn->query($sql);

// Kiểm tra xem có dữ liệu trả về không
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Không có dữ liệu!";
    exit; // Thoát khỏi trang nếu không tìm thấy admin
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $email = $_POST['email'];
    $password = $_POST['password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Kiểm tra mật khẩu hiện tại từ dữ liệu người dùng nhập vào
    if ($row['password'] !== $password) {
        echo '<div id="error-toast" class="toast error">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo '<span class="msg">Mật khẩu hiện tại không đúng!</span>';
        echo '</div>';
        echo '<script>';
        echo 'document.getElementById("error-toast").style.display = "block";'; // Hiển thị thông báo lỗi
        echo 'setTimeout(function() {';
        echo '  document.getElementById("error-toast").style.display = "none";'; // Ẩn thông báo sau một khoảng thời gian
        echo '}, 2000);'; // Thời gian hiển thị thông báo (2000ms = 2 giây)
        echo '</script>';
        exit;
    }
    // Kiểm tra xem mật khẩu mới và xác nhận mật khẩu mới có khớp nhau không
    if ($newPassword !== $confirmPassword) {
        echo '<div id="error-toast" class="toast error">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo '<span class="msg">Nhập lại mật khẩu mới không khớp!</span>';
        echo '</div>';
        echo '<script>';
        echo 'document.getElementById("error-toast").style.display = "block";'; // Hiển thị thông báo lỗi
        echo 'setTimeout(function() {';
        echo '  document.getElementById("error-toast").style.display = "none";'; // Ẩn thông báo sau một khoảng thời gian
        echo '}, 2000);'; // Thời gian hiển thị thông báo (2000ms = 2 giây)
        echo '</script>';
        exit;
    }
    // Tiếp tục cập nhật mật khẩu mới
    // Cập nhật dữ liệu admin vào cơ sở dữ liệu
    $update_sql = "UPDATE users SET email='$email', password='$newPassword' WHERE id=$id";

    // Thực hiện cập nhật mật khẩu mới
    // Thực hiện cập nhật mật khẩu mới
    if ($conn->query($update_sql) === TRUE) {
        // Hiển thị thông báo thành công và không chuyển hướng người dùng
        echo '<div id="success-toast" class="toast success">';
        echo '<i class="fas fa-check-circle"></i>';
        echo '<span class="msg">Đổi mật khẩu thành công!</span>';
        echo '</div>';
        echo '<script>';
        echo 'document.getElementById("success-toast").style.display = "block";'; // Hiển thị thông báo thành công
        echo 'setTimeout(function() {';
        echo '  document.getElementById("success-toast").style.display = "none";'; // Ẩn thông báo sau một khoảng thời gian
        echo '}, 2000);'; // Thời gian hiển thị thông báo (5000ms = 5 giây)
        echo '</script>';
    } else {
        // Hiển thị thông báo lỗi nếu cập nhật không thành công
        echo '<div class="toast error">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo '<span class="msg">Đã xảy ra lỗi khi cập nhật thông tin của bạn!</span>';
        echo '</div>';
        echo '<script>';
        echo 'document.getElementById("success-toast").style.display = "block";'; // Hiển thị thông báo thành công
        echo 'setTimeout(function() {';
        echo '  document.getElementById("success-toast").style.display = "none";'; // Ẩn thông báo sau một khoảng thời gian
        echo '}, 2000);'; // Thời gian hiển thị thông báo (5000ms = 5 giây)
        echo '</script>';
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
    <title>Tài khoản của bạn</title>
    <link rel="stylesheet" href="../assets/css/account.css">

    <link rel="stylesheet" href="../assets/css/toast.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/list-car.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <?php require_once("header.php"); ?>
    <div class="account-all">
        <div class="account">
            <div class="account-header">
                <h1>Tài khoản của tôi</h1>
                <div class="account-bt">
                    <button class="ch">Tạo cửa hàng</button>
                    <button class="dt">Đăng tin</button>
                </div>
            </div>
            <div class="account-main">
                <?php
                include("./account.nav.php")
                ?>
                <div class="account-body">
                    <div class="account-container">
                        <h2>Đổi mật khẩu</h2>
                        <form action="" method="POST"  action="#" enctype="multipart/form-data">
                            <label for="email">Tên đăng nhập:</label>
                            <input type="text" class="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Nhập tên đăng nhập" required>
                            <br><br>
                            <label for="password">Mật khẩu hiện tại: <i style="color: red; font-size: 6px; margin-left: 5px;" class=" fa-solid fa-star-of-life"></i></label>
                            <div class="account-eye">

                                <input type="password" class="password" name="password" id="input-pass" placeholder="Nhập mật khẩu" required>
                                <i class="fa-solid fa-eye hide-password" id="show-pass"></i><br><br>
                            </div>

                            <label for="new_password">Mật khẩu mới: <i style="color: red; font-size: 6px; margin-left: 5px;" class=" fa-solid fa-star-of-life"></i></label>
                            <div class="account-eye">
                                <input type="password" name="new_password" id="input-pass1" placeholder="Nhập mật khẩu" required />
                                <i class="fa-solid fa-eye hide-password" id="show-pass1"></i><br><br>
                            </div>

                            <label for="confirm_password">Nhập lại mật khẩu mới:<i style="color: red; font-size: 6px; margin-left: 5px;" class="fa-solid fa-star-of-life"></i> </label>
                            <div class="account-eye">
                                <input type="password" class="confirm_password" name="confirm_password" id="input-pass2" placeholder="Nhập lại mật khẩu" required>
                                <i class="fa-solid fa-eye hide-password" id="show-pass2"></i> <br><br>
                            </div>
                            <input type="submit" class="control button" value="Cập nhật">
                        </form>


                        <script>
                            const btnShowPass = document.querySelector('#show-pass');
                            const inputPass = document.querySelector('#input-pass');

                            btnShowPass.addEventListener('click', function() {
                                btnShowPass.classList.toggle('active');
                                if (inputPass.type == "password") {
                                    inputPass.type = "text";
                                } else {
                                    inputPass.type = "password";
                                }
                            });
                            const btnShowPass1 = document.querySelector('#show-pass1');
                            const inputPass1 = document.querySelector('#input-pass1');
                            btnShowPass1.addEventListener('click', function() {
                                btnShowPass1.classList.toggle('active');
                                if (inputPass1.type == "password") {
                                    inputPass1.type = "text";
                                } else {
                                    inputPass1.type = "password";
                                }
                            })
                            const btnShowPass2 = document.querySelector('#show-pass2');
                            const inputPass2 = document.querySelector('#input-pass2');
                            btnShowPass2.addEventListener('click', function() {
                                btnShowPass2.classList.toggle('active');
                                if (inputPass2.type == "password") {
                                    inputPass2.type = "text";
                                } else {
                                    inputPass2.type = "password";
                                }
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("list-car.php"); ?>
        <?php require_once("footer.php"); ?>
        <script src="../assets/script/script.js"></script>
</body>

</html>