<?php
$config = include('config.php');

function generateSignature($rawData, $secretKey) {
    return hash_hmac('sha256', $rawData, $secretKey);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['orderId'];
    $orderInfo = $_POST['orderInfo'];
    $amount = $_POST['amount'];
    $requestId = time();
    $extraData = '';

    $rawSignature = "accessKey={$config['accessKey']}&amount={$amount}&extraData={$extraData}&ipnUrl={$config['notifyUrl']}&orderId={$orderId}&orderInfo={$orderInfo}&partnerCode={$config['partnerCode']}&redirectUrl={$config['notifyUrl']}&requestId={$requestId}&requestType=QR_CODE";
    $signature = generateSignature($rawSignature, $config['secretKey']);

    $data = [
        'partnerCode' => $config['partnerCode'],
        'accessKey' => $config['accessKey'],
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $config['notifyUrl'],
        'ipnUrl' => $config['notifyUrl'],
        'extraData' => $extraData,
        'requestType' => 'QR_CODE',
        'signature' => $signature
    ];

    $ch = curl_init('https://test-payment.momo.vn/v2/gateway/api/create');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);
    if (!empty($result['payUrl'])) {
        echo json_encode(['qrCodeUrl' => $result['payUrl']]);
    } else {
        echo json_encode(['error' => 'Tạo mã QR thất bại']);
    }
} else {
    echo json_encode(['error' => 'Phương thức yêu cầu không hợp lệ']);
}
?>
