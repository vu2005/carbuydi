<?php
session_start(); // Khởi tạo session ở đầu file
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['amount'] = $_POST['amount']; // Lưu giá trị amount vào session
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="../assets/css/account.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/list-car.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
</head>

<body>
    <?php require_once("header.php"); ?>
    <div class="method">
        <div class="method_pay">
            <form id="paymentForm" method="POST">
                <h1>Thanh toán</h1>
                <p>Vui lòng chọn 1 trong các phương thức thanh toán sau đây:</p>
                <div class="form_mt_all">
                    <div class="form_mt">
                        <div class="form_mt1">
                            <div style="display: flex;">
                                <input type="radio" name="payment" id="momo_atm" value="momo_atm">
                                <p>Thanh toán Momo (Thẻ ATM nội địa / Internet Banking / Thẻ quốc tế Visa, Master, JCB)</p>
                            </div>
                            <img src="../assets/images/atm.svg" alt="momo_atm">
                        </div>
                        <div class="form_mt1">
                            <div style="display: flex;">
                                <input type="radio" name="payment" id="momo" value="momo">
                                <p>Thanh toán bằng ví Momo (Quét mã QR) </p>
                            </div>
                            <img src="../assets/images/momo.svg" alt="Momo">
                        </div>
                    </div>
                    <div class="form_mt">
                        <div class="form_mt01">
                            <b>Thành tiền</b>
                            <b id="amountDisplay"><?php echo number_format($_POST['amount'], 0, ',', '.') . ' đ'; ?></b>
                            <input type="hidden" id="amount" name="amount" value="<?php echo $_POST['amount']; ?>">
                        </div>
                        <button type="submit" id="submitBtn">Nạp xu</button>
                        <p style="font-size: 13px; text-align: center;">(Xin vui lòng kiểm tra lại đơn hàng trước khi Thanh toán)</p>
                    </div>
                    <script>
                        document.getElementById('submitButtonPage3').addEventListener('click', function(e) {
                            e.preventDefault(); // Ngăn không cho form submit theo cách thông thường
                            var form = document.querySelector('form'); // Giả sử rằng bạn có một form bao quanh các input này, bạn cần thêm một thẻ <form> nếu chưa có

                            var paymentMethod = document.querySelector('input[name="payment"]:checked').value; // Lấy giá trị của input radio được chọn

                            // Kiểm tra phương thức thanh toán và thiết lập action cho form
                            switch (paymentMethod) {
                                case 'coin':
                                    form.action = 'coin_pay.php';
                                    break;
                                case 'momo_atm':
                                    form.action = 'momo_atm.php';
                                    break;
                                case 'momo_qr':
                                    form.action = 'momo.php';
                                    break;
                                default:
                                    alert('Vui lòng chọn một phương thức thanh toán.');
                                    return; // Dừng xử lý nếu không có phương thức nào được chọn
                            }

                            form.submit(); // Submit form với action mới
                        });
                    </script>
                </div>
            </form>
        </div>
    </div>
    <?php require_once("footer.php"); ?>
    <script src="../assets/script/script.js"></script>
    <script>
        document.getElementById('submitBtn').addEventListener('click', function(e) {
            var paymentForm = document.getElementById('paymentForm');
            var momo_atm = document.getElementById('momo_atm');
            var momo = document.getElementById('momo');

            if (momo_atm.checked) {
                paymentForm.action = 'momo_atm.php';
            } else if (momo.checked) {
                paymentForm.action = 'momo.php';
            } else {
                e.preventDefault();
                alert('Vui lòng chọn phương thức thanh toán.');
            }
        });
    </script>
</body>

</html>