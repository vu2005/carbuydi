<?php
// Đảm bảo bạn đã cài đặt thư viện phpqrcode
require 'path/to/your/phpqrcode/qrlib.php';

if (isset($_POST['qrData'])) {
    $qrData = $_POST['qrData'];
    // Giải mã thông tin từ mã QR
    parse_str(parse_url($qrData, PHP_URL_QUERY), $params);

    $amount = isset($params['amount']) ? $params['amount'] : 'Không xác định';
    $bank = isset($params['bank']) ? $params['bank'] : 'Không xác định';

    // Thực hiện xử lý thanh toán hoặc các bước tiếp theo
    echo "Thông tin giao dịch: Số tiền - $amount, Ngân hàng - $bank";
} else {
    echo "Không có dữ liệu QR được gửi.";
}
?>
