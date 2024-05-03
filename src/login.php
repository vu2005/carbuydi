<?php
session_start();

require_once '../config/config.php'; // Kết nối cơ sở dữ liệu

if (isset($_POST['btnlogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Truy vấn cơ sở dữ liệu để tìm người dùng với tên đăng nhập cụ thể
    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password); // Chỉnh sửa đây để pass cả password vào

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['user'] = $email; // Lưu tên người dùng vào session
        $_SESSION['user_id'] = $row['id']; // Lưu ID người dùng vào session 
        header("Location: index.php"); // Chuyển hướng đến trang chính
        exit();
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
    <title>Carbuydi</title>
    <link rel="stylesheet" href="../assets/css/toast.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/list-car.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <?php
    require_once("header.php");

    ?>
    <div class="form-login">
        <div class="box-login">
            <div class="login">
                <div class="form-box">
                    <h4>Đăng nhập</h4>
                    <p>Trang đăng nhập để trở thành Đối tác của Carbuydi</p>
                </div>
                <form id="loginForm" method="post" action="#">
                    <div class="input-group">
                        <label for="email">Nhập Email</label>
                        <input type="email" id="email" name="email" placeholder="Vd: vusena@gmail.com" required />
                    </div>
                    <div class="input-group">
                        <label for="password">Nhập Password</label>
                        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required />
                    </div>
                    <input type="submit" value="Đăng Nhập" name="btnlogin" />
                    <div id="footer">
                        <span id="PassGet">Quên mật khẩu?</span>
                        <div>
                            Chưa có tài khoản?<span id="registerBtn">
                                Đăng ký ngay</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    require_once("list-car.php");
    require_once("PassGet.php");
    require_once("footer.php");
    ?>
    <script src="../assets/script/script.js"></script>
</body>

</html>