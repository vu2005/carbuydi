

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
    <div class="account-all">
        <div class="account">
            <div class="account-header">
                <h1>Tài khoản của tôi</h1>
                <div class="account-bt">
                    <button class="ch">Tạo cửa hàng</button>
                    <button class="dt">Đăng tin</button>
                </div>
            </div>
            <div class="account-main">
                <?php
                include("./account.nav.php")
                ?>
                <div class="account-body">
                    <div class="account-container">
                        <h2>Lịch sử giao dịch</h2>
                       
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("list-car.php"); ?>
        <?php require_once("footer.php"); ?>
        <script src="../assets/script/script.js"></script>
</body>

</html>