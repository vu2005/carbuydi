<?php
session_start();
require_once './config/config.php'; // Kết nối cơ sở dữ liệu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // Sửa từ 'username' thành 'email'
    $password = $_POST['password'];

    // Truy vấn cơ sở dữ liệu để kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['user_id'] = $row['id']; // Lưu ID người dùng vào phiên
        header("Location: src/index.php"); // Chuyển hướng đến trang chính
    } else {
        echo '<div class="toast error">';
        echo '<i class="fa-solid fa-circle-exclamation"></i>';

        echo '<span class="msg">Tên hoặc mật khẩu không đúng!</span>';
        echo '</div>';

        echo '<script>
             document.addEventListener("DOMContentLoaded", function () {
                 const toast = document.querySelector(".toast");
                 setTimeout(function () {
                     toast.style.display = "none";
                 }, 2000);
             });
          </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/toast.css" />

</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post">
                    <h2>Login Admin</h2>

                    <div class="inputbox">
                        <ion-icon name="mail"><i class="bx bx-envelope"></i></ion-icon>
                        <input type="email" required id="email" name="email" placeholder="Email" />
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed"><i class="bx bx-lock-alt"></i></ion-icon>
                        <input type="password" required id="password" name="password" placeholder="Password" />
                    </div>
                    <div class="forget">
                        <label for="remember">
                            <input type="checkbox" id="remember" /> Ghi Nhớ?
                            <a href="#">Quên Mật Khẩu?</a>
                        </label>
                    </div>
                    <button class="login-btn" type="submit">Log in</button>
                    <div class="register">
                        <p>
                            No tengo una cuenta <a href="">Registrarse?</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var emailInput = document.getElementById('email');
            var passwordInput = document.getElementById('password');
            var rememberCheckbox = document.getElementById('remember');

            // Kiểm tra localStorage để điền thông tin đăng nhập tự động
            if (localStorage.getItem('rememberedEmail')) {
                emailInput.value = localStorage.getItem('rememberedEmail');
                rememberCheckbox.checked = true; // Check checkbox
            }

            if (localStorage.getItem('rememberedPassword')) {
                passwordInput.value = localStorage.getItem('rememberedPassword');
            }

            // Xử lý sự kiện khi người dùng thay đổi checkbox "Ghi Nhớ"
            rememberCheckbox.addEventListener('change', function() {
                if (rememberCheckbox.checked) {
                    // Lưu thông tin đăng nhập vào localStorage
                    localStorage.setItem('rememberedEmail', emailInput.value);
                    localStorage.setItem('rememberedPassword', passwordInput.value);
                } else {
                    // Xóa thông tin đăng nhập khỏi localStorage nếu checkbox không được chọn
                    localStorage.removeItem('rememberedEmail');
                    localStorage.removeItem('rememberedPassword');
                }
            });

            // Xử lý sự kiện khi người dùng gửi form đăng nhập
            document.getElementById('loginForm').addEventListener('submit', function(event) {
                if (!rememberCheckbox.checked) {
                    // Xóa thông tin đăng nhập khỏi localStorage nếu checkbox không được chọn trước khi gửi form
                    localStorage.removeItem('rememberedEmail');
                    localStorage.removeItem('rememberedPassword');
                }
                // Nếu checkbox được chọn, thông tin đăng nhập đã được lưu vào localStorage và sẽ tự động điền vào form ở lần sau
            });
        });
    </script>

</body>

</html>