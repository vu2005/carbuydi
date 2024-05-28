
<?php
require_once '../config/config.php'; // Kết nối cơ sở dữ liệu

// Function to convert number to words
function convertNumberToWords($total_amount)
{
    $suffixes = ["", "k", "triệu", "tỷ", "ngàn tỷ"]; // Suffixes for thousands, millions, billions, trillions
    $index = 0;
    while ($total_amount >= 1000) {
        $total_amount /= 1000;
        $index++;
    }
    return round($total_amount, 2) . ' ' . $suffixes[$index];
}

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy ID của khách hàng từ URL
$user_id = $_GET['id']; // Chắc chắn kiểm tra và xử lý dữ liệu trước khi sử dụng trong truy vấn SQL

// Câu lệnh SQL để lấy lịch sử giao dịch của khách hàng với user_id đã chuyền qua URL
$sql = "SELECT * FROM transaction_history WHERE user_id = ?";

// Chuẩn bị câu lệnh SQL và thực thi truy vấn
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    // Kiểm tra xem có kết quả nào không
    if ($result->num_rows > 0) {
        // Lặp qua kết quả và hiển thị dữ liệu
        while ($row = $result->fetch_assoc()) {
            $transaction_code = $row['transaction_code'];
            $transaction_content = $row['transaction_content'];
            $transaction_datetime = $row['transaction_datetime'];
            $credit = $row['credit'];
            $debit = $row['debit'];
            $status = $row['status'];
            $gateway = $row['gateway'];

            echo '<div class="pd_30" style="padding: 20px;">';
            echo '<div class="filter-car" style="padding: 0;">';
            echo '<div class="filter_1">';
            echo '<p>Có <b>1</b> giao dịch</p>';
            echo '<div class="search_cars"> <input type="text" placeholder="Nhập mã giao dịch"> <i class="fa-solid fa-magnifying-glass"></i></div>';
            echo '</div>';
            echo '<div class="filter_2">';
            echo '<div class="cars_select_1">';
            echo '<select id="filter_news" name="filter_news" required>';
            echo '<option value="" selected disabled>Lọc tin</option>';
            echo '<option value="Tất cả">Tất cả</option>';
            echo '<option value="Chờ thanh toán">Chờ thanh toán</option>';
            echo '<option value="Thành công">Thành công</option>';
            echo '<option value="Hủy thanh toán">Hủy thanh toán</option>';
            echo '<option value="Thanh toán lỗi">Thanh toán lỗi</option>';
            echo '</select>';
            echo '</div>';
            echo '<div class="cars_select_2">';
            echo '<select id="organize_news" name="organize_news" required>';
            echo '<option value="" selected disabled>Sắp xếp</option>';
            echo '<option value="Tất cả">Tất cả</option>';
            echo '<option value="Mới nhất">Mới nhất</option>';
            echo '<option value="Cũ nhất">Cũ nhất</option>';
            echo '</select>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="cars_menu pay">';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Mã giao dịch</th>';
            echo '<th>Nội dung</th>';
            echo '<th>Ngày giờ</th>';
            echo '<th>Cộng (xu)</th>';
            echo '<th>Trừ (xu)</th>';
            echo '<th>Trạng thái</th>';
            echo '<th>Cổng</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<th style="color: #1a6fb7;">' . $transaction_code . '</th>';
            echo '<th>' . $transaction_content . '</th>';
            echo '<th>' . $transaction_datetime . '</th>';
            echo '<th>' . convertNumberToWords($credit) . ' xu </th>';
            echo '<th>' . convertNumberToWords($debit) . '</th>';
            echo '<th class="status">' . $status . '</th>';
            echo '<th>' . $gateway . '</th>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        // Hiển thị thông báo khi không có giao dịch
        echo '<div style="padding: 20px;">Chưa có giao dịch</div>';
    }

    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>