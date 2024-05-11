<?php
require_once('../config/config.php');

// Kiểm tra xem biến search_result đã được truyền từ trang trước hay không
if (isset($_GET['search_result'])) {
    // Lấy kết quả tìm kiếm từ biến truyền qua URL
    $searchResult = $_GET['search_result'];
    
    // Thực hiện xử lý kết quả tìm kiếm ở đây
    // Ví dụ: thực hiện truy vấn SQL để lọc dữ liệu hoặc hiển thị kết quả tùy thuộc vào yêu cầu của bạn
    $sql = "SELECT * FROM cars WHERE make IN ('$searchResult') OR model IN ('$searchResult')";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        // Hiển thị kết quả tìm kiếm
        // Ví dụ: in ra thông tin các xe tìm kiếm được
    } else {
        echo "Lỗi truy vấn: " . mysqli_error($connection);
    }
} else {
    // Nếu không có kết quả tìm kiếm được truyền, hiển thị thông báo hoặc xử lý mặc định tại đây
    echo "Không có kết quả tìm kiếm.";
}
?>