<?php
// process_forgot_password.php

// Kết nối tới cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "carbuydi");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu không
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Tạo token
        $token = bin2hex(random_bytes(50));

        // Lưu token vào cơ sở dữ liệu với email tương ứng
        $sql = "UPDATE users SET reset_token = ?, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // Gửi email
        $to = $email;
        $subject = "Đặt lại mật khẩu của bạn";
        $message = "Bấm vào liên kết sau để đặt lại mật khẩu của bạn: ";
        $message .= "http://yourdomain.com/reset_password.php?token=" . $token;
        $headers = "From: no-reply@yourdomain.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "Một email đặt lại mật khẩu đã được gửi tới địa chỉ email của bạn.";
        } else {
            echo "Đã xảy ra lỗi khi gửi email.";
        }
    } else {
        echo "Không tìm thấy địa chỉ email.";
    }
}
