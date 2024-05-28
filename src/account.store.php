<?php
require_once '../config/config.php'; // Kết nối cơ sở dữ liệu

// Khởi tạo biến $row và các biến khác với giá trị mặc định
$row = [];
$store_location = 'Đang cập nhật';
$address = 'Đang cập nhật';
$total_amount = 'Đang cập nhật';
$package_name = 'Đang cập nhật';
$created_at = 'Đang cập nhật';

// Lấy ID người dùng từ GET request
$id_user = isset($_GET['id']) ? intval($_GET['id']) : null;

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cập nhật số tiền nếu có tham số 'amount'
if (isset($_GET['amount'])) {
    $amount = intval($_GET['amount']);
    $update_sql = "UPDATE account_balance SET total_amount = total_amount + ? WHERE user_id = ?";
    if ($update_stmt = $conn->prepare($update_sql)) {
        $update_stmt->bind_param("ii", $amount, $id_user);
        $update_stmt->execute();
        $update_stmt->close();
        echo '<div class="toast success">';
        echo '<i class="fas fa-check-circle"></i>';
        echo '<span class="msg">Nạp xu vào tài khoản thành công!</span>';
        echo '</div>';
        echo '<script>
             document.addEventListener("DOMContentLoaded", function () {
                 const toast = document.querySelector(".toast");
                 setTimeout(function () {
                     toast.style.display = "none";
                 }, 2000);
             });
          </script>';
    } else {
        echo '<div class="toast warning">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo '<span class="msg">Nạp xu vài tài khoản thất bại!</span>';
        echo '</div>';
        echo '<script>
             document.addEventListener("DOMContentLoaded", function () {
                 const toast = document.querySelector(".toast");
                 setTimeout(function () {
                     toast.style.display = "none";
                 }, 2000);
             });
          </script>';
    }
}

// Truy vấn thông tin người dùng và cửa hàng bất kể có giao dịch nạp tiền hay không
$info_sql = "SELECT 
            cs.store_name,
            cs.store_location,
            cs.created_at,
            u.address,
            ab.total_amount,
            lp.name AS package_name
            FROM customer_stores cs
            JOIN users u ON cs.customer_id = u.id
            JOIN account_balance ab ON u.id = ab.user_id
            JOIN user_car_listing ucl ON u.id = ucl.user_id
            JOIN listing_packages lp ON ucl.package_id = lp.id
            WHERE u.id = ?";
if ($info_stmt = $conn->prepare($info_sql)) {
    $info_stmt->bind_param("i", $id_user);
    $info_stmt->execute();
    $result = $info_stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $store_location = $row['store_location'];
        $address = $row['address'];
        $total_amount = $row['total_amount'];
        $package_name = $row['package_name'];
        $created_at = $row['created_at'];
    }
    $info_stmt->close();
}

$conn->close(); // Đóng kết nối

function convertNumberToWords($total_amount)
{
    $suffixes = ["", "k", " triệu", " tỷ", " ngàn tỷ"];
    $index = 0;
    while ($total_amount >= 1000) {
        $total_amount /= 1000;
        $index++;
    }
    return round($total_amount, 2) . $suffixes[$index];
}

$formatted_amount = $total_amount !== 'Đang cập nhật' ? convertNumberToWords($total_amount) : $total_amount;
?>
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
                    <a href="create_row.php" class="ch">Tạo cửa hàng</a>
                    <a href="post-news.php" class="dt">Đăng tin</a>
                </div>
            </div>
            <div class="account-main">
                <?php include("./account.nav.php") ?>
                <div class="account-body">
                    <div class="account-container">
                        <h2>Quản lý cửa hàng</h2>
                        <div class="store-menu">
                            <ul>
                                <li><a href="account.store.php">Quản lý cửa hàng</a></li>
                                <li><a href="account.vehicle.php">Quản lý xe</a></li>
                                <li><a href="account.transaction.php">Lịch sử giao dịch</a></li>
                            </ul>
                        </div>
                        <div class="store-main">
                            <div class="store-img"><img src="../assets/images/no-image.webp" alt=""></div>
                            <div class="store-info">
                                <ul>
                                    <li>Thông tin cửa hàng</li>
                                    <li><b><?php echo htmlspecialchars($store_location); ?></b></li>
                                    <li>Ngày tham gia: <?php echo htmlspecialchars($created_at); ?></li>
                                    <li>Địa chỉ: <?php echo htmlspecialchars($address); ?></li>
                                </ul>
                            </div>
                            <div class="nap-xu">
                                <div class="nx-body">
                                    <p>Tài khoản chính</p>
                                    <b><?php echo htmlspecialchars($formatted_amount); ?> xu</b>
                                    <a href="nap_xu.php?id=<?php echo $_SESSION['user_id']; ?>"><button>Nạp xu</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="store-ft">
                            <p>Gói đang sử dụng: <b><?php echo htmlspecialchars($package_name); ?></b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("list-car.php"); ?>
        <?php require_once("footer.php"); ?>
        <script src="../assets/script/script.js"></script>
</body>

</html>