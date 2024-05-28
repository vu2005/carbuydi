<?php
$config = include('config.php');

function generateSignature($rawData, $secretKey) {
    return hash_hmac('sha256', $rawData, $secretKey);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $rawSignature = "accessKey={$config['accessKey']}&amount={$data['amount']}&extraData={$data['extraData']}&orderId={$data['orderId']}&orderInfo={$data['orderInfo']}&orderType={$data['orderType']}&partnerCode={$data['partnerCode']}&requestId={$data['requestId']}&responseTime={$data['responseTime']}&resultCode={$data['resultCode']}&transId={$data['transId']}";
    $expectedSignature = generateSignature($rawSignature, $config['secretKey']);

    if ($data['signature'] === $expectedSignature) {
        if ($data['resultCode'] == 0) {
            // Xử lý thanh toán thành công tại đây
            http_response_code(200);
            echo json_encode(['message' => 'Thanh toán thành công']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Thanh toán thất bại']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Chữ ký không hợp lệ']);
    }
} else {
    echo 'Phương thức yêu cầu không hợp lệ';
}
?>
