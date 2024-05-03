<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <select id="province" name="province" required onchange="filterDistricts()">
        <option value="" selected disabled></option>
        <option value="An Giang" <?php if ($selected_province == 'An Giang') echo 'selected'; ?>>An Giang</option>
        <!-- Thêm các tỉnh/thành phố khác nếu cần -->
        <option value="Bà Rịa - Vũng Tàu" <?php if ($selected_province == 'Bà Rịa - Vũng Tàu') echo 'selected'; ?>>Bà Rịa - Vũng Tàu</option>
        <option value="Bắc Giang" <?php if ($selected_province == 'Bắc Giang') echo 'selected'; ?>>Bắc Giang</option>
        <option value="Bắc Kạn" <?php if ($selected_province == 'Bắc Kạn') echo 'selected'; ?>>Bắc Kạn</option>
        <option value="Bạc Liêu" <?php if ($selected_province == 'Bạc Liêu') echo 'selected'; ?>>Bạc Liêu</option>
        <option value="Bắc Ninh" <?php if ($selected_province == 'Bắc Ninh') echo 'selected'; ?>>Bắc Ninh</option>
        <option value="Bến Tre" <?php if ($selected_province == 'Bến Tre') echo 'selected'; ?>>Bến Tre</option>
        <option value="Bình Định" <?php if ($selected_province == 'Bình Định') echo 'selected'; ?>>Bình Định</option>
        <option value="Bình Dương" <?php if ($selected_province == 'Bình Dương') echo 'selected'; ?>>Bình Dương</option>
        <option value="Bình Phước" <?php if ($selected_province == 'Bình Phước') echo 'selected'; ?>>Bình Phước</option>
        <!-- thêm nốt cho tôi những dữ liệu còn lại -->
        <option value="Bình Thuận" <?php if ($selected_province == 'Bình Thuận') echo 'selected'; ?>>Bình Thuận</option>
        <option value="Cà Mau" <?php if ($selected_province == 'Cà Mau') echo 'selected'; ?>>Cà Mau</option>
        <option value="Cao Bằng" <?php if ($selected_province == 'Cao Bằng') echo 'selected'; ?>>Cao Bằng</option>
        <option value="Đắk Lắk" <?php if ($selected_province == 'Đắk Lắk') echo 'selected'; ?>>Đắk Lắk</option>
        <option value="Đắk Nông" <?php if ($selected_province == 'Đắk Nông') echo 'selected'; ?>>Đắk Nông</option>
        <option value="Điện Biên" <?php if ($selected_province == 'Điện Biên') echo 'selected'; ?>>Điện Biên</option>
        <option value="Đồng Nai" <?php if ($selected_province == 'Đồng Nai') echo 'selected'; ?>>Đồng Nai</option>
        <option value="Đồng Tháp" <?php if ($selected_province == 'Đồng Tháp') echo 'selected'; ?>>Đồng Tháp</option>
        <option value="Gia Lai" <?php if ($selected_province == 'Gia Lai') echo 'selected'; ?>>Gia Lai</option>
        <option value="Hà Giang" <?php if ($selected_province == 'Hà Giang') echo 'selected'; ?>>Hà Giang</option>
        <!--  -->
        <option value="Hà Nam" <?php if ($selected_province == 'Hà Nam') echo 'selected'; ?>>Hà Nam</option>
        <option value="Hà Tĩnh" <?php if ($selected_province == 'Hà Tĩnh') echo 'selected'; ?>>Hà Tĩnh</option>
        <option value="Hải Dương" <?php if ($selected_province == 'Hải Dương') echo 'selected'; ?>>Hải Dương</option>
        <option value="Hải Phòng" <?php if ($selected_province == 'Hải Phòng') echo 'selected'; ?>>Hải Phòng</option>
        <option value="Hậu Giang" <?php if ($selected_province == 'Hậu Giang') echo 'selected'; ?>>Hậu Giang</option>
        <option value="Hòa Bình" <?php if ($selected_province == 'Hòa Bình') echo 'selected'; ?>>Hòa Bình</option>
        <option value="Hưng Yên" <?php if ($selected_province == 'Hưng Yên') echo 'selected'; ?>>Hưng Yên</option>
        <option value="Đồng Tháp" <?php if ($selected_province == 'Đồng Tháp') echo 'selected'; ?>>Đồng Tháp</option>
        <option value="Khánh Hòa" <?php if ($selected_province == 'Khánh Hòa') echo 'selected'; ?>>Khánh Hòa</option>
        <option value="Kiên Giang" <?php if ($selected_province == 'Kiên Giang') echo 'selected'; ?>>Kiên Giang</option>
        <!--  -->
        <option value="Kon Tum" <?php if ($selected_province == 'Kon Tum') echo 'selected'; ?>>Kon Tum</option>
        <option value="Lai Châu" <?php if ($selected_province == 'Lai Châu') echo 'selected'; ?>>Lai Châu</option>
        <option value="Lâm Đồng" <?php if ($selected_province == 'Lâm Đồng') echo 'selected'; ?>>Lâm Đồng</option>
        <option value="Lạng Sơn" <?php if ($selected_province == 'Lạng Sơn') echo 'selected'; ?>>Lạng Sơn</option>
        <option value="Lào Cai" <?php if ($selected_province == 'Lào Cai') echo 'selected'; ?>>Lào Cai</option>
        <option value="Long An" <?php if ($selected_province == 'Long An') echo 'selected'; ?>>Long An</option>
        <option value="Nam Định" <?php if ($selected_province == 'Nam Định') echo 'selected'; ?>>Nam Định</option>
        <option value="Nghệ An" <?php if ($selected_province == 'Nghệ An') echo 'selected'; ?>>Nghệ An</option>
        <option value="Ninh Bình" <?php if ($selected_province == 'Ninh Bình') echo 'selected'; ?>>Ninh Bình</option>
        <option value="Ninh Thuận" <?php if ($selected_province == 'Ninh Thuận') echo 'selected'; ?>>Ninh Thuận</option>
        <!--  -->
        <option value="Phú Thọ" <?php if ($selected_province == 'Phú Thọ') echo 'selected'; ?>>Phú Thọ</option>
        <option value="Quảng Bình" <?php if ($selected_province == 'Quảng Bình') echo 'selected'; ?>>Quảng Bình</option>
        <option value="Quảng Nam" <?php if ($selected_province == 'Quảng Nam') echo 'selected'; ?>>Quảng Nam</option>
        <option value="Quảng Ngãi" <?php if ($selected_province == 'Quảng Ngãi') echo 'selected'; ?>>Quảng Ngãi</option>
        <option value="Quảng Ninh" <?php if ($selected_province == 'Quảng Ninh') echo 'selected'; ?>>Quảng Ninh</option>
        <option value="Quảng Trị" <?php if ($selected_province == 'Quảng Trị') echo 'selected'; ?>>Quảng Trị</option>
        <option value="Sóc Trăng" <?php if ($selected_province == 'Sóc Trăng') echo 'selected'; ?>>Sóc Trăng</option>
        <option value="Sơn La" <?php if ($selected_province == 'Sơn La') echo 'selected'; ?>>Sơn La</option>
        <option value="Tây Ninh" <?php if ($selected_province == 'Tây Ninh') echo 'selected'; ?>>Tây Ninh</option>
        <option value="Thái Bình" <?php if ($selected_province == 'Thái Bình') echo 'selected'; ?>>Thái Bình</option>
        <!--  -->
        <option value="Thái Nguyên" <?php if ($selected_province == 'Thái Nguyên') echo 'selected'; ?>>Thái Nguyên</option>
        <option value="Thanh Hóa" <?php if ($selected_province == 'Thanh Hóa') echo 'selected'; ?>>Thanh Hóa</option>
        <option value="Thừa Thiên Huế" <?php if ($selected_province == 'Thừa Thiên Huế') echo 'selected'; ?>>Thừa Thiên Huế</option>
        <option value="Tiền Giang" <?php if ($selected_province == 'Tiền Giang') echo 'selected'; ?>>Tiền Giang</option>
        <option value="Tuyên Quang" <?php if ($selected_province == 'Tuyên Quang') echo 'selected'; ?>>Tuyên Quang</option>
        <option value="Vĩnh Long" <?php if ($selected_province == 'Vĩnh Long') echo 'selected'; ?>>Vĩnh Long</option>
        <option value="Vĩnh Phúc" <?php if ($selected_province == 'Vĩnh Phúc') echo 'selected'; ?>>Vĩnh Phúc</option>
        <option value="Yên Bái" <?php if ($selected_province == 'Yên Bái') echo 'selected'; ?>>Yên Bái</option>
        <option value="Cần Thơ" <?php if ($selected_province == 'Cần Thơ') echo 'selected'; ?>>Cần Thơ</option>
        <option value="Đà Nẵng" <?php if ($selected_province == 'Đà Nẵng') echo 'selected'; ?>>Đà Nẵng</option>
        <option value="Hà Nội" <?php if ($selected_province == 'Hà Nội') echo 'selected'; ?>>Hà Nội</option>
        <option value="Hải Phòng" <?php if ($selected_province == 'Hải Phòng') echo 'selected'; ?>>Hải Phòng</option>
        <option value="Thành phố Hồ Chí Minh" <?php if ($selected_province == 'Thành phố Hồ Chí Minh') echo 'selected'; ?>>Thành phố Hồ Chí Minh</option>
        <option value="Hà Tĩnh" <?php if ($selected_province == 'Hà Tĩnh') echo 'selected'; ?>>Hà Tĩnh</option>
    </select>
</body>

</html>