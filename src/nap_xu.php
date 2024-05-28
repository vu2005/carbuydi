<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản của bạn</title>
    <link rel="stylesheet" href="../assets/css/account.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/list-car.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
</head>

<body>
    <?php require_once("header.php"); ?>
    <div class="nap-xu-pay">
        <div class="nx-box">
            <div class="form-pay">
                <form action="method_pay.php?id=<?php echo $_SESSION['user_id']; ?>" method="POST">
                    <h1>Chọn số tiền cần nạp</h1>
                    <select id="amount" name="amount" required>
                        <option value="" selected disabled>Chọn số tiền</option>
                        <option value="10000">10,000đ</option>
                        <option value="20000">20,000đ</option>
                        <option value="50000">50,000đ</option>
                        <option value="100000">100,000đ</option>
                        <option value="200000">200,000đ</option>
                        <option value="500000">500,000đ</option>
                        <option value="1000000">1,000,000đ</option>
                        <option value="2000000">2,000,000đ</option>
                        <option value="5000000">5,000,000đ</option>
                        <option value="10000000">10,000,000đ</option>
                    </select>
                    <button type="submit">Nạp xu</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('napXuForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var amount = document.getElementById('amount').value;
            if (amount) {
                window.location.href = window.location.pathname + "?price=" + amount;
            }
        });
    </script>
    <?php require_once("footer.php"); ?>
    <script src="../assets/script/script.js"></script>
</body>

</html>