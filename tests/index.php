<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_car";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra nếu biểu mẫu đã được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Bắt đầu một giao dịch
    $conn->begin_transaction();

    try {
        // Xử lý giá trị nhập vào
        $formatted_price = str_replace('.', '', $_POST['price']); // Xóa dấu chấm trong giá trị nhập vào

        // Thêm dữ liệu vào bảng cars
        $sql = "INSERT INTO cars (make, model, version, year, `condition`, mileage, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssisdi",
            $_POST['make'],
            $_POST['model'],
            $_POST['version'],
            $_POST['year'],
            $_POST['condition'],
            $_POST['mileage'],
            $formatted_price // Sử dụng giá trị đã định dạng
        );
        $stmt->execute();

        // Thêm giá trị đã định dạng vào trường ẩn
        $_POST['formatted_price'] = $formatted_price;

        // Commit giao dịch
        $conn->commit();

        // Thông báo thành công
        echo '<div class="toast success">';
        echo '<i class="fa-solid fa-circle-check"></i>';
        echo '<span class="msg">Đăng tin thành công!</span>';
        echo '</div>';

        // In ra giá trị đã được định dạng
        $price_in_words = convertNumberToWords($formatted_price);
        echo '<p class="price-details">' . $price_in_words . '</p>';
    } catch (Exception $e) {
        // Rollback giao dịch nếu có lỗi xảy ra
        $conn->rollback();
        echo "Lỗi: " . $e->getMessage();
    }

    // Đóng kết nối
    $conn->close();
}

// Hàm chuyển đổi số thành chuỗi
function convertNumberToWords($number)
{
    $suffixes = ["", "nghìn", "triệu", "tỷ", "ngàn tỷ"]; // Suffixes for thousands, millions, billions, trillions
    $index = 0;
    while ($number >= 1000) {
        $number /= 1000;
        $index++;
    }
    return round($number, 2) . ' ' . $suffixes[$index];
}
?>
<div class="form-group">
    <label for="price">Giá muốn bán:
        <div id="result" style="margin: 0 5px;"></div>
    </label>
    <input type="text" id="price" name="price" oninput="handleInput()" />
    <!-- Trường ẩn để lưu giá trị đã định dạng -->
    <input type="hidden" id="formatted_price" name="formatted_price" />
</div>
<div class="control button" onclick="nextTab('tab1')">Tiếp tục</div>
<script>
    function addCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function handleInput() {
        var price = document.getElementById("price");
        var value = price.value.trim();
        if (value === "") return;
        var number = value.replace(/\./g, "");
        var formattedNumber = addCommas(number);
        price.value = formattedNumber;
        var convertedNumber = convertNumberToWords(number);
        var resultDiv = document.getElementById("result");
        resultDiv.textContent = "[" + convertedNumber + "]";

        // Lưu giá trị đã định dạng vào trường ẩn
        document.getElementById("formatted_price").value = number;
    }

    function convertNumberToWords(number) {
        var suffixes = ["đ", "K", "Triệu", "Tỷ", "Ngàn Tỷ"]; // Suffixes for thousands, millions, billions, trillions
        if (number === "") {
            return "0";
        }
        var num = parseInt(number);
        var suffixIndex = Math.floor((number.length - 1) / 3);
        var scaledNumber = num / Math.pow(1000, suffixIndex);
        scaledNumber = Math.round(scaledNumber * 10) / 10;
        var result = scaledNumber + " " + suffixes[suffixIndex];
        return result;
    }
</script>