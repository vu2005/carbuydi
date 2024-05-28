<?php
session_start();
require_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
    $check_email_query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_email_query);
    if ($result->num_rows > 0) {
        echo '<div class="toast error">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo '<span class="msg">Email của bạn đã tồn tại trong dữ liệu!</span>';
        echo '</div>';

        echo '<script>
             document.addEventListener("DOMContentLoaded", function () {
                 const toast = document.querySelector(".toast");
                 setTimeout(function () {
                     toast.style.display = "none";
                 }, 2000);
             });
          </script>';
    } else {
        // Email không tồn tại, thực hiện truy vấn INSERT
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo '<div class="toast success">';
            echo '<i class="fas fa-check-circle"></i>';
            echo '<span class="msg">Đăng ký thành công!</span>';
            echo '</div>';
            echo '<script>
                 document.addEventListener("DOMContentLoaded", function () {
                     const toast = document.querySelector(".toast");
                     setTimeout(function () {
                         toast.style.display = "none";
                     }, 2000);
                 });
              </script>';
            // Chuyển hướng sau khi xử lý dữ liệu
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
