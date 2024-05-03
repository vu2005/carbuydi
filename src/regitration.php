<?php
session_start();
require_once '../config/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

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
        echo '<div class="toast error">';
        echo '<i class="fas fa-check-circle"></i>';
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
    }
}
