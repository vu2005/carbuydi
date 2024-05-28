<?php
require_once '../config/config.php'; // Kết nối cơ sở dữ liệu

// Xử lý biến id từ URL
$id = $_GET['id'];

// Truy vấn dữ liệu admin với id tương ứng
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Không có dữ liệu!";
    exit; // Thoát khỏi trang nếu không tìm thấy admin
}

// Kiểm tra xem biểu mẫu đã được gửi đi chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $email = $_POST['email'];
    // Cập nhật dữ liệu admin vào cơ sở dữ liệu
    $update_sql = "UPDATE users SET full_name='$full_name', phone_number='$phone_number', address='$address', province='$province', district='$district', email='$email' WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        // Hiển thị thông báo thành công và chuyển hướng về trang quản lý admin
        echo '<div id="success-toast" class="toast success">';
        echo '<i class="fas fa-check-circle"></i>';
        echo '<span class="msg">Cập nhật thông tin thành công!</span>';
        echo '</div>';
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "index.php";'; // Chuyển hướng về trang quản lý admin
        echo '}, 1000);'; // Thời gian chờ trước khi chuyển hướng (1000ms = 1 giây)
        echo '</script>';
    } else {
        // Hiển thị thông báo lỗi nếu cập nhật không thành công
        echo '<div class="toast error">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo '<span class="msg">Đã xảy ra lỗi khi cập nhật thông tin của bạn!</span>';
        echo '</div>';
    }
}

// Đóng kết nối
$conn->close();
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
                <h1 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Tài khoản của tôi</h1>
                <div class="account-bt">
                    <a href="create_row.php" class="ch">Tạo cửa hàng</a>
                    <a href="post-news.php" class="dt">Đăng tin</a>
                </div>
            </div>
            <div class="account-main">
                <?php include("./account.nav.php") ?>
                <div class="account-body">
                        <div class="account-container">
                            <h2>Thông tin tài khoản</h2>
                            <form action="#" method="post" enctype="multipart/form-data" id="updateForm">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <label for="full_name">Họ tên:</label>
                                <input type="text" id="full_name" name="full_name" value="<?php echo $row['full_name']; ?>"><br><br>
                                <label for="phone_number">Số điện thoại:</label>
                                <input type="text" id="phone_number" name="phone_number" value="<?php echo $row['phone_number']; ?>"><br><br>
                                <label for="address">Địa chỉ:</label>
                                <input type="address" id="address" name="address" value="<?php echo $row['address']; ?>"><br><br>
                                <div class="account-fl">
                                    <div>
                                        <label for="province">Tỉnh/ Thành phố:</label>
                                        <select id="province" name="province" required>
                                            <option value="" selected disabled></option>
                                            <?php
                                            // Lấy dữ liệu về các tỉnh/thành phố từ cơ sở dữ liệu của bạn
                                            $provinces = ["An Giang", "Bà Rịa - Vũng Tàu", "Bắc Giang", "Bắc Kạn", "Bạc Liêu", "Bắc Ninh", "Bến Tre", "Bình Định", "Bình Dương", "Bình Phước", "Bình Thuận", "Cà Mau", "Cao Bằng", "Đắk Lắk", "Đắk Nông", "Điện Biên", "Đồng Nai", "Đồng Tháp", "Gia Lai", "Hà Giang", "Hà Nam", "Hà Tĩnh", "Hải Dương", "Hải Phòng", "Hậu Giang", "Hòa Bình", "Hưng Yên", "Khánh Hòa", "Kiên Giang", "Kon Tum", "Lai Châu", "Lâm Đồng", "Lạng Sơn", "Lào Cai", "Long An", "Nam Định", "Nghệ An", "Ninh Bình", "Ninh Thuận", "Phú Thọ", "Quảng Bình", "Quảng Nam", "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng", "Sơn La", "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa", "Thừa Thiên Huế", "Tiền Giang", "Tuyên Quang", "Vĩnh Long", "Vĩnh Phúc", "Yên Bái", "Cần Thơ", "Đà Nẵng", "Hà Nội", "Hồ Chí Minh"];

                                            // Hiển thị các tùy chọn cho tỉnh/thành phố
                                            foreach ($provinces as $province) {
                                                $selected = ($row['province'] == $province) ? 'selected' : ''; // Kiểm tra và đặt thuộc tính "selected"
                                                echo '<option value="' . $province . '" ' . $selected . '>' . $province . '</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div>
                                        <label for="district">Quận/ Huyện:</label>
                                        <select id="district" name="district" required>
                                            <option value="" selected disabled>Chọn quận/huyện</option>
                                            <?php
                                            // Thêm điều kiện để chọn giá trị mặc định cho trường "district"
                                            foreach ($districtsData[$row['province']] as $district) {
                                                $selected = ($district == $row['district']) ? 'selected' : ''; // Kiểm tra và đặt thuộc tính "selected"
                                                echo '<option value="' . $district . '" ' . $selected . '>' . $district . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <script>
                                    // Lưu giá trị quận/huyện đã chọn vào biến khi thay đổi tỉnh/thành phố
                                    var selectedDistrict = "<?php echo $row['district']; ?>";

                                    var districtsData = {
                                        "An Giang": ["An Phú", "Châu Phú", "Châu Thành", "Chợ Mới", "Phú Tân", "Thới Bình", "Thoại Sơn", "Tịnh Biên", "Tri Tôn"],
                                        "Bà Rịa - Vũng Tàu": ["Bà Rịa", "Châu Đức", "Côn Đảo", "Đất Đỏ", "Long Điền", "Tân Thành", "Vũng Tàu", "Xuyên Mộc"],
                                        "Bắc Giang": ["Bắc Giang", "Hiệp Hòa", "Lạng Giang", "Lục Nam", "Lục Ngạn", "Sơn Động", "Tân Yên", "Việt Yên", "Yên Dũng", "Yên Thế"],
                                        "Bắc Kạn": ["Bắc Kạn", "Ba Bể", "Bạch Thông", "Chợ Đồn", "Chợ Mới", "Na Rì", "Ngân Sơn", "Pác Nặm"],
                                        "Bạc Liêu": ["Bạc Liêu", "Đông Hải", "Giá Rai", "Hòa Binh", "Hồng Dân", "Phước Long"],
                                        "Bắc Ninh": ["Bắc Ninh", "Gia Bình", "Lương Tài", "Quế Võ", "Thuận Thành", "Tiên Du", "Từ Sơn"],
                                        "Bến Tre": ["Bến Tre", "Ba Tri", "Bình Đại", "Châu Thành", "Chợ Lách", "Giồng Trôm", "Mỏ Cày", "Thạnh Phú"],
                                        "Bình Định": ["An Lão", "An Nhơn", "Hoài Ân", "Hoài Nhơn", "Phù Mỹ", "Tây Sơn", "Tuy Phước", "Vân Canh", "Vĩnh Thạnh"],
                                        "Bình Dương": ["Bến Cát", "Dầu Tiếng", "Dĩ An", "Phú Giáo", "Tân Uyên", "Thủ Dầu Một"],
                                        "Bình Phước": ["Bình Long", "Bù Đốp", "Bù Đăng", "Bù Gia Mập", "Chơn Thành", "Đồng Phú", "Hớn Quản", "Lộc Ninh", "Phú Riềng"],
                                        "Bình Thuận": ["Bắc Bình", "Đức Linh", "Hàm Tân", "Hàm Thuận Bắc", "Hàm Thuận Nam", "La Gi", "Phan Thiết", "Tánh Linh", "Tuy Phong"],
                                        "Cà Mau": ["Cà Mau", "Cái Nước", "Đầm Dơi", "Năm Căn", "Ngọc Hiển", "Phú Tân", "Thới Bình", "Trần Văn Thời", "U Minh"],
                                        "Cao Bằng": ["Bảo Lạc", "Bảo Lâm", "Hạ Lang", "Hà Quảng", "Hòa An", "Nguyên Bình", "Phục Hòa", "Quảng Uyên", "Thạch An"],
                                        "Đắk Lắk": ["Buôn Đôn", "Buôn Hồ", "Buôn Ma Thuột", "Cư Kuin", "Cư M'gar", "Krông Ana", "Krông Bông", "Krông Buk", "Krông Năng", "Krông Pắc", "Lắk", "M'Đrắk"],
                                        "Đắk Nông": ["Cư Jút", "Đắk GLong", "Đắk Mil", "Đắk RLấp", "Đắk Song", "Krông Nô", "Tuy Đức"],
                                        "Điện Biên": ["Điện Biên", "Điện Biên Đông", "Điện Biên Phủ", "Mường Ảng", "Mường Chà", "Mường Nhé", "Nậm Pồ", "Tủa Chùa", "Tuần Giáo"],
                                        "Đồng Nai": ["Biên Hòa", "Cẩm Mỹ", "Định Quán", "Long Khánh", "Long Thành", "Nhơn Trạch", "Tân Phú", "Thống Nhất", "Trảng Bom", "Vĩnh Cửu", "Xuân Lộc"],
                                        "Đồng Tháp": ["Cao Lãnh", "Châu Thành", "Hồng Ngự", "Lai Vung", "Lấp Vò", "Tam Nông", "Tân Hồng", "Thanh Bình", "Tháp Mười"],
                                        "Gia Lai": ["Chư Păh", "Chư Prông", "Chư Pưh", "Chư Sê", "Đắk Đoa", "Đắk Pơ", "Đức Cơ", "Ia Grai", "Ia Pa", "K'Bang", "KBông", "KBang", "Phú Thiện"],
                                        "Hà Giang": ["Bắc Mê", "Bắc Quang", "Đồng Văn", "Hà Giang", "Hoàng Su Phì", "Mèo Vạc", "Quản Bạ", "Quang Bình", "Vị Xuyên", "Xín Mần", "Yên Minh"],
                                        "Hà Nam": ["Bình Lục", "Duy Tiên", "Kim Bảng", "Lý Nhân", "Thanh Liêm"],
                                        "Hà Tĩnh": ["Cẩm Xuyên", "Can Lộc", "Đức Thọ", "Hà Tĩnh", "Hồng Lĩnh", "Hương Khê", "Hương Sơn", "Kỳ Anh", "Lộc Hà", "Nghi Xuân", "Thạch Hà", "Vũ Quang"],
                                        "Hải Dương": ["Bình Giang", "Cẩm Giàng", "Chí Linh", "Gia Lộc", "Hải Dương", "Kim Thành", "Kinh Môn", "Nam Sách", "Ninh Giang", "Thanh Hà", "Thanh Miện", "Tứ Kỳ"],
                                        "Hải Phòng": ["An Dương", "An Lão", "Bạch Long Vĩ", "Cát Hải", "Đông Hải", "Kiến Thụy", "Thủy Nguyên", "Tiên Lãng", "Vĩnh Bảo"],
                                        "Hậu Giang": ["Châu Thành", "Châu Thành A", "Long Mỹ", "Phụng Hiệp", "Vị Thủy", "Vị Thuỷ"],
                                        "Hòa Bình": ["Cao Phong", "Đà Bắc", "Kim Bôi", "Lạc Sơn", "Lạc Thủy", "Lương Sơn", "Mai Châu", "Tân Lạc", "Yên Thủy"],
                                        "Hưng Yên": ["Ân Thi", "Hưng Hà", "Khoái Châu", "Kim Động", "Mỹ Hào", "Phù Cừ", "Tiên Lữ", "Văn Giang", "Văn Lâm", "Yên Mỹ"],
                                        "Khánh Hòa": ["Cam Lâm", "Cam Ranh", "Diên Khánh", "Khánh Sơn", "Khánh Vĩnh", "Nha Trang", "Ninh Hòa", "Trường Sa", "Vạn Ninh"],
                                        "Kiên Giang": ["An Biên", "An Minh", "Châu Thành", "Giang Thành", "Giồng Riềng", "Gò Quao", "Hòn Đất", "Kiên Hải", "Kiên Lương", "Phú Quốc", "Tân Hiệp", "U Minh Thượng", "Vĩnh Thuận"],
                                        "Kon Tum": ["Đắk Glei", "Đắk Hà", "Đắk Tô", "Kon Plông", "Kon Rẫy", "Ngọc Hồi", "Sa Thầy", "Tu Mơ Rông"],
                                        "Lai Châu": ["Lai Châu", "Mường Tè", "Phong Thổ", "Sìn Hồ", "Tam Đường", "Tân Uyên", "Than Uyên"],
                                        "Lâm Đồng": ["Bảo Lâm", "Bảo Lộc", "Cát Tiên", "Đạ Huoai", "Đạ Tẻh", "Đam Rông", "Di Linh", "Đơn Dương", "Đức Trọng", "Lạc Dương", "Lâm Hà"],
                                        "Lạng Sơn": ["Bắc Sơn", "Bình Gia", "Cao Lộc", "Chi Lăng", "Đình Lập", "Hữu Lũng", "Lạng Sơn", "Lộc Bình", "Tràng Định", "Văn Lãng", "Văn Quan"],
                                        "Lào Cai": ["Bảo Thắng", "Bảo Yên", "Bát Xát", "Bắc Hà", "Lào Cai", "Mường Khương", "Sa Pa", "Si Ma Cai", "Văn Bàn"],
                                        "Long An": ["Bến Lức", "Cần Đước", "Cần Giuộc", "Châu Thành", "Đức Hòa", "Đức Huệ", "Mộc Hóa", "Tân Hưng", "Tân Thạnh", "Tân Trụ", "Thạnh Hóa", "Thủ Thừa", "Vĩnh Hưng"],
                                        "Nam Định": ["Giao Thủy", "Hải Hậu", "Mỹ Lộc", "Nam Định", "Nam Trực", "Nghĩa Hưng", "Trực Ninh", "Vụ Bản", "Xuân Trường", "Ý Yên"],
                                        "Nghệ An": ["Anh Sơn", "Con Cuông", "Cửa Lò", "Diễn Châu", "Đô Lương", "Hoàng Mai", "Hưng Nguyên", "Kỳ Sơn", "Nam Đàn", "Nghi Lộc", "Nghĩa Đàn", "Quế Phong", "Quỳ Châu", "Quỳ Hợp", "Quỳnh Lưu", "Tân Kỳ", "Thái Hòa", "Thanh Chương", "Tương Dương", "Yên Thành"],
                                        "Ninh Bình": ["Gia Viễn", "Hoa Lư", "Kim Sơn", "Nho Quan", "Ninh Bình", "Tam Điệp", "Yên Khánh", "Yên Mô"],
                                        "Ninh Thuận": ["Bác Ái", "Ninh Hải", "Ninh Phước", "Ninh Sơn", "Phan Rang - Tháp Chàm", "Thuận Bắc", "Thuận Nam"],
                                        "Phú Thọ": ["Cẩm Khê", "Đoan Hùng", "Hạ Hoà", "Lâm Thao", "Phù Ninh", "Tam Nông", "Tân Sơn", "Thanh Ba", "Thanh Sơn", "Thanh Thuỷ", "Yên Lập"],
                                        "Quảng Bình": ["Bố Trạch", "Đồng Hới", "Lệ Thủy", "Minh Hóa", "Quảng Ninh", "Quảng Trạch", "Tuyên Hóa"],
                                        "Quảng Nam": ["Bắc Trà My", "Đại Lộc", "Điện Bàn", "Đông Giang", "Duy Xuyên", "Hiệp Đức", "Nam Giang", "Nam Trà My", "Nông Sơn", "Núi Thành", "Phú Ninh", "Phước Sơn", "Quế Sơn", "Tam Kỳ", "Tây Giang", "Thăng Bình"],
                                        "Quảng Ngãi": ["Ba Tơ", "Bình Sơn", "Đức Phổ", "Lý Sơn", "Minh Long", "Mộ Đức", "Nghĩa Hành", "Sơn Hà", "Sơn Tây", "Sơn Tịnh", "Tây Trà", "Trà Bồng", "Tư Nghĩa"],
                                        "Quảng Ninh": ["Ba Chẽ", "Bình Liêu", "Cẩm Phả", "Cô Tô", "Đầm Hà", "Đông Triều", "Hải Hà", "Hoành Bồ", "Tiên Yên", "Uông Bí", "Vân Đồn"],
                                        "Quảng Trị": ["Cam Lộ", "Cồn Cỏ", "Đa Krông", "Gio Linh", "Hải Lăng", "Hướng Hóa", "Triệu Phong", "Vĩnh Linh"],
                                        "Sóc Trăng": ["Châu Thành", "Cù Lao Dung", "Kế Sách", "Long Phú", "Mỹ Tú", "Mỹ Xuyên", "Ngã Năm", "Sóc Trăng", "Thạnh Trị", "Trần Đề", "Vĩnh Châu"],
                                        "Sơn La": ["Bắc Yên", "Mai Sơn", "Mộc Châu", "Mường La", "Phù Yên", "Quỳnh Nhai", "Sông Mã", "Sốp Cộp", "Thuận Châu", "Vân Hồ", "Yên Châu"],
                                        "Tây Ninh": ["Bến Cầu", "Châu Thành", "Dương Minh Châu", "Gò Dầu", "Hòa Thành", "Tân Biên", "Tân Châu", "Trảng Bàng"],
                                        "Thái Bình": ["Đông Hưng", "Hưng Hà", "Kiến Xương", "Quỳnh Phụ", "Thái Bình", "Thái Thụy", "Tiền Hải", "Vũ Thư"],
                                        "Thái Nguyên": ["Đại Từ", "Định Hóa", "Đồng Hỷ", "Phổ Yên", "Phú Bình", "Phú Lương", "Sông Công", "Võ Nhai"],
                                        "Thanh Hóa": ["Bá Thước", "Cẩm Thủy", "Đông Sơn", "Hà Trung", "Hậu Lộc", "Hoằng Hóa", "Lang Chánh", "Mường Lát", "Nga Sơn", "Như Thanh", "Như Xuân", "Nông Cống", "Quan Hóa", "Quan Sơn", "Quảng Xương", "Thạch Thành", "Thiệu Hóa", "Thọ Xuân", "Thường Xuân", "Tĩnh Gia", "Triệu Sơn", "Vĩnh Lộc", "Yên Định"],
                                        "Thừa Thiên Huế": ["A Lưới", "Huế", "Hương Thủy", "Hương Trà", "Nam Đông", "Phong Điền", "Phú Lộc", "Phú Vang", "Quảng Điền"],
                                        "Tiền Giang": ["Cái Bè", "Cai Lậy", "Châu Thành", "Chợ Gạo", "Gò Công Đông", "Gò Công Tây", "Tân Phú Đông", "Tân Phước", "Vũng Liêm"],
                                        "Tuyên Quang": ["Chiêm Hóa", "Hàm Yên", "Lâm Bình", "Na Hang", "Sơn Dương", "Thanh Ba", "Yên Sơn"],
                                        "Vĩnh Long": ["Bình Minh", "Bình Tân", "Long Hồ", "Mang Thít", "Tam Bình", "Trà Ôn", "Vũng Liêm"],
                                        "Vĩnh Phúc": ["Bình Xuyên", "Lập Thạch", "Phúc Yên", "Sông Lô", "Tam Dương", "Tam Đảo", "Vĩnh Tường", "Yên Lạc"],
                                        "Yên Bái": ["Lục Yên", "Mù Căng Chải", "Trạm Tấu", "Trấn Yên", "Văn Chấn", "Văn Yên", "Yên Bình", "Yên Bình", "Yên Bình"],
                                        "Cần Thơ": ["Bình Thủy", "Cái Răng", "Cờ Đỏ", "Ninh Kiều", "Ô Môn", "Thốt Nốt", "Vĩnh Thạnh"],
                                        "Đà Nẵng": ["Cẩm Lệ", "Hải Châu", "Hoà Vang", "Liên Chiểu", "Ngũ Hành Sơn", "Sơn Trà", "Thanh Khê"],
                                        "Hà Nội": ["Ba Đình", "Bắc Từ Liêm", "Cầu Giấy", "Đống Đa", "Hà Đông", "Hai Bà Trưng", "Hoàn Kiếm", "Hoàng Mai", "Long Biên", "Nam Từ Liêm", "Tây Hồ", "Thanh Xuân", "Chương Mỹ", "Đan Phượng", "Đông Anh", "Gia Lâm", "Hoài Đức", "Mê Linh", "Mỹ Đức", "Phú Xuyên", "Phúc Thọ", "Quốc Oai", "Sóc Sơn", "Thạch Thất", "Thanh Oai", "Thanh Trì", "Thường Tín", "Ứng Hòa"],
                                        "Hải Phòng": ["An Dương", "An Lão", "Bạch Long Vĩ", "Cát Hải", "Đồ Sơn", "Dương Kinh", "Hải An", "Hồng Bàng", "Kiến An", "Kiến Thụy", "Lê Chân", "Ngô Quyền", "Thủy Nguyên", "Tiên Lãng", "Vĩnh Bảo"],
                                        "Thành phố Hồ Chí Minh": ["Bình Chánh", "Bình Tân", "Bình Thạnh", "Cần Giờ", "Củ Chi", "Gò Vấp", "Hóc Môn", "Nhà Bè", "Phú Nhuận", "Quận 1", "Quận 10", "Quận 11", "Quận 12", "Quận 2", "Quận 3", "Quận 4", "Quận 5", "Quận 6", "Quận 7", "Quận 8", "Quận 9", "Tân Bình", "Tân Phú", "Thủ Đức"]
                                    };

                                    var provinceSelect = document.getElementById('province');
                                    var districtSelect = document.getElementById('district');

                                    // Hàm để tạo option cho select quận/huyện
                                    function createDistrictOptions(selectedDistrict) {
                                        var selectedProvince = provinceSelect.value;
                                        var districtArray = districtsData[selectedProvince] || [];

                                        districtSelect.innerHTML = '<option value="" selected disabled>Chọn quận/huyện</option>';

                                        // Thêm các tùy chọn mới cho quận/huyện
                                        districtArray.forEach(function(district) {
                                            var option = document.createElement('option');
                                            option.value = district;
                                            option.textContent = district;
                                            // Kiểm tra và đặt thuộc tính "selected" nếu quận/huyện trùng khớp với giá trị đã lưu
                                            if (district === selectedDistrict) {
                                                option.selected = true;
                                            }
                                            districtSelect.appendChild(option);
                                        });
                                    }

                                    // Gọi hàm khi trang được tải lại để giữ lại dữ liệu quận/huyện đã chọn
                                    createDistrictOptions(selectedDistrict);

                                    // Xử lý sự kiện thay đổi tỉnh/thành phố
                                    provinceSelect.addEventListener('change', function() {
                                        createDistrictOptions();
                                    });
                                </script>
                                <label for="role">Email:</label>
                                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
                                <input type="submit" class="control button" value="Cập nhật">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("list-car.php");
        include("footer.php") ?>
        <script src="../assets/script/script.js"></script>
    </div>
</body>

</html>