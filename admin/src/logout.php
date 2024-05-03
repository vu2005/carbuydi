
<?php
session_start();
session_unset(); // Hủy tất cả các biến phiên
session_destroy(); // Hủy bỏ phiên
header("Location: ../index.php"); // Chuyển hướng đến trang đăng nhập
exit();
