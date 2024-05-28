<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/account.css">
    <link rel="stylesheet" href="../assets/css/about.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/store.css">
    <link rel="stylesheet" href="../assets/css/list-car.css">
    <link rel="stylesheet" href="../assets/css/toast.css">
    <link rel="stylesheet" href="../assets/css/ban-xe.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <?php
    require_once("header.php");
    ?>
    <div class="store_all">
        <div class="store_bar">
            <h1>Tạo cửa hàng xe</h1>
        </div>
        <div class="store_body">
            <div class="store_ul">
                <ul>
                    <li data-page="page1" class="active-tab">
                        <div class="store_border">1</div>
                        <p>Giới thiệu xe</p>
                    </li>
                    <li data-page="page2">
                        <div class="bar"></div>
                        <div class="store_border">2</div>
                        <p>Thông tin cửa hàng</p>
                    </li>
                    <li data-page="page3">
                        <div class="bar"></div>
                        <div class="store_border">3</div>
                        <p>Thanh toán</p>
                    </li>
                    <li data-page="page4">
                        <div class="bar"></div>
                        <div class="store_border">4</div>
                        <p>Kích hoạt & Hoàn tất</p>
                    </li>
                </ul>
            </div>
            <form action="#">
                <div id="page1" class="store_page">
                    <div class="store_gt">
                        <h1>Các lợi ích khi mở cửa hàng trên sàn Carbuydi.vn</h1>
                        <div class="store_li">
                            <div class="store_img1">
                                <img src="../assets/images/store1.webp" alt="" />
                                <b>Tăng khả năng hiển thị cửa hàng</b>
                            </div>
                            <div class="store_img1">
                                <img src="../assets/images/store2.webp" alt="" />
                                <b>Tối ưu công cụ tìm kiếm</b>
                            </div>
                            <div class="store_img1">
                                <img src="../assets/images/store3.webp" alt="" />
                                <b>Xây dựng thương hiệu cá nhân</b>
                            </div>
                        </div>
                        <div class="dk_store">
                            <input type="checkbox" id="agreeCheckbox2" />
                            <p>
                                Bằng việc chọn tạo Cửa hàng, bạn đồng ý với
                                <a href="#">Điều khoản sử dụng</a> của Carbuydi
                            </p>
                        </div>
                        <div type="submit" id="submitButtonPage1">Mở cửa hàng ngay</div>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const agreeCheckbox = document.getElementById("agreeCheckbox2");
                        const submitButton = document.getElementById("submitButtonPage1");

                        // Set initial button color (disabled)
                        submitButton.style.backgroundColor = "#c1cfda";

                        agreeCheckbox.addEventListener("change", function() {
                            if (this.checked) {
                                submitButton.disabled = false;
                                submitButton.style.backgroundColor = "#1a6fb7"; // Change color to #1a6fb7
                            } else {
                                submitButton.disabled = true;
                                submitButton.style.backgroundColor = "#c1cfda"; // Reset color to #c1cfda
                            }
                        });
                    });
                </script>
                <div id="page2" class="store_page" style="display: none;">
                    <div class="store_information">
                        <h2>Thông tin cửa hàng</h2>
                        <div style="display: flex">
                            <p>Hình ảnh cửa hàng (Bạn có thể upload tối đa 3 tấm hình về cửa hàng)</p>
                            <i class="fa-solid fa-star-of-life"></i>
                        </div>
                        <div class="store_container">
                            <label for="input-img" class="preview">
                                <i class="fa-solid fa-camera"></i>
                                <span>Kéo thả các file hình ảnh, video vào đây hoặc duyệt tập tin để tải lên</span>
                            </label>
                            <input type="file" hidden id="input-img" name="store_images[]" multiple accept="image/*"/>
                        </div>
                        <div id="preview-container" class="preview"></div>
                        <div class="form_group">
                            <label for="store_name">Tên cửa hàng xe <i class="fa-solid fa-star-of-life"></i></label>
                            <input type="text" id="store_name" name="store_name" placeholder="Nhập tên cửa hàng xe" />
                            <small>Lưu ý: cửa hàng không thể thay đổi sau khi kích hoạt</small>
                        </div>
                        <div class="form_group">
                            <label for="store_address">
                                <p>Địa chỉ cửa hàng</p>
                                <i class="fa-solid fa-star-of-life"></i>
                            </label>
                            <input type="text" id="store_address" name="store_address"/>
                        </div>
                        <div class="form_group_1">
                            <div class="form_group" style="width: 50%">
                                <label for="province">
                                    <p>Tỉnh/ Thành phố:</p>
                                    <i class="fa-solid fa-star-of-life"></i>
                                </label>
                                <select id="province" name="province">
                                    <option value="" selected disabled>Chọn tỉnh/thành phố</option>
                                    <option value="An Giang">An Giang</option>

                                </select>
                            </div>
                            <div class="form_group" style="width: 50%">
                                <label for="district">
                                    <p>Quận/ Huyện:</p>
                                    <i class="fa-solid fa-star-of-life"></i>
                                </label>
                                <select id="district" name="district">
                                    <option value="" selected disabled>Chọn quận/huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="store_description">
                                <p>Giới thiệu cửa hàng</p>
                                <i class="fa-solid fa-star-of-life"></i>
                            </label>
                            <textarea id="store_description" name="store_description" placeholder="Thông tin cửa hàng của bạn sẽ được giới thiệu trên Carbuydi"></textarea>
                            <small>Lưu ý: thông tin giới thiệu của bạn sẽ không được hiển thị nếu bạn không nhập</small>
                        </div>
                        <div class="form_group_1">
                            <div class="form_group" style="width: 50%">
                                <label for="phone">
                                    <p>Số điện thoại</p>
                                    <i class="fa-solid fa-star-of-life"></i>
                                </label>
                                <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" />
                            </div>
                            <div class="form_group" style="width: 50%">
                                <label for="email">
                                    <p>Email</p>
                                    <i class="fa-solid fa-star-of-life"></i>
                                </label>
                                <input type="email" id="email" name="email" placeholder="Nhập email" />
                            </div>
                        </div>
                        <div class="form_group">
                            <div type="submit" class="op_modal">Lưu & Thanh toán</div>
                        </div>
                    </div>
                </div>
                <div class="new_modal" id="modal">
                    <div class="modal_content">
                        <div class="flex_modal">
                            <h3>Chọn gói của hàng</h3>
                            <span class="close_modal">&times;</span>
                        </div>
                        <div class="package_option">
                            <input type="radio" id="monthly" name="package" checked />
                            <div class="flex_right">
                                <label for="monthly"><b>Tháng</b> sử dụng</label>
                                <span class="price">
                                    <span class="current_price">300.000 đ</span>
                                    <span class="original_price">300.000 đ</span>
                                </span>
                                <span class="discount">-0%</span>
                            </div>
                        </div>
                        <div class="buy_now" id="submitButtonPage2">300.000 đ - Mua ngay</div>
                    </div>
                </div>
                <div id="page3" class="store_page" style="display: none;">
                    <div class="store_payment">
                        <div class="store_mony">
                            <div class="form_mt" style="margin-right: 10px">
                                <h1>Thanh toán</h1>
                                <br />
                                <p style="margin-bottom: 10px; font-weight: 400">
                                    Vui lòng chọn 1 trong các phương thức thanh toán
                                    sau đây:
                                </p>
                                <div class="form_mt1" style="padding: 20px">
                                    <div style="display: flex">
                                        <input type="radio" name="payment" id="coin" value="coin" />
                                        <p style="font-weight: 400">
                                            Thanh toán bằng xu (Kiểm tra tài khoản của bạn đủ xu không)
                                        </p>
                                    </div>
                                    <img src="../assets/images/coin.svg" alt="momo_atm" style="height: 35px; width: 35px" />
                                </div>
                                <div class="form_mt1" style="padding: 20px">
                                    <div style="display: flex">
                                        <input type="radio" name="payment" id="momo_atm" value="momo_atm" />
                                        <p style="font-weight: 400">
                                            Thanh toán Momo (Thẻ ATM nội địa /
                                            Internet Banking / Thẻ quốc tế Visa,
                                            Master, JCB)
                                        </p>
                                    </div>
                                    <img src="../assets/images/atm.svg" alt="momo_atm" style="height: 35px; width: 35px" />
                                </div>
                                <div class="form_mt1" style="padding: 20px">
                                    <div style="display: flex">
                                        <input type="radio" name="payment" id="momo_qr" value="momo_qr" />
                                        <p style="font-weight: 400">
                                            Thanh toán bằng ví Momo (Quét mã QR)
                                        </p>
                                    </div>
                                    <img src="../assets/images/momo.svg" alt="Momo" style="height: 35px; width: 35px" />
                                </div>
                            </div>
                            <div class="form_mt">
                                <div class="form_mt02" style="margin-top: 90px">
                                    <div class="bill">
                                        <div class="flex_row">
                                            <div class="fw400">Gói đang chọn</div>
                                            <p>Gói salon 1 tháng</p>
                                        </div>
                                        <div class="flex_row">
                                            <div class="fw400">Thời gian</div>
                                            <p>1 tháng</p>
                                        </div>
                                        <div class="flex_row">
                                            <div class="fw400">Mã giảm giá</div>
                                            <p>0 đ</p>
                                        </div>
                                    </div>
                                    <div class="bill">
                                        <div class="flex_row">
                                            <div class="fw400">
                                                Thành tiền trước thuế
                                            </div>
                                            <p>300.000 đ</p>
                                        </div>
                                        <div class="flex_row">
                                            <div class="fw400">8% VAT</div>
                                            <p>24.000 đ</p>
                                        </div>
                                    </div>
                                    <div class="bill">
                                        <div class="flex_row">
                                            <b>Thành tiền <br />
                                                <p class="fw400">
                                                    (Đã bao gồm VAT)
                                                </p>
                                            </b>
                                            <div>324.000 đ</div>
                                        </div>
                                        <div class="flex_row">
                                            <b>Thành tiền</b>
                                            <b>324.000 đ</b>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="submitButtonPage3">Thanh toán</button>
                                <p style="font-size: 13px; text-align: center">
                                    (Xin vui lòng kiểm tra lại đơn hàng trước khi Thanh toán)
                                </p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="page4" class="store_page" style="display: none;">
                    <h1 style="text-align: center;">Kích hoạt & Hoàn tất</h1>
                    <div class="store_success">
                        <p class="blink-text" style="text-align: center; font-size: 18px; color: green;margin: 50px 0;">Xin chúc mừng! Bạn đã kích hoạt thành công tài khoản của mình.</p>
                        <p style="text-align: center; font-size: 16px;">Bây giờ bạn có thể bắt đầu mua sắm và tận hưởng các ưu đãi độc quyền từ cửa hàng của chúng tôi.</p>
                        <div style="text-align: center; margin: 30px 0; font-size: 14px;">
                            <p>Nếu bạn cần hỗ trợ, vui lòng liên hệ với chúng tôi qua email <a href="mailto:support@example.com">support@example.com</a> hoặc gọi số điện thoại <a href="tel:+84987654321">+84 987 654 321</a>.</p>
                        </div>
                        <div style="text-align: center">
                            <a class="hover_bt_store" href="index.html" style="text-decoration: none; padding: 10px 20px; border-radius: 5px; border: 1px solid #1a6fb7; color: 1a6fb7;">Quay lại Trang Chủ</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputImg = document.getElementById('input-img');
            const imagePreviewContainer = document.getElementById('preview-container');

            inputImg.addEventListener('change', function(event) {
                const files = event.target.files;

                if (files.length > 3) {
                    alert('Bạn chỉ có thể tải lên tối đa 3 hình ảnh.');
                    inputImg.value = ''; // Clear the input
                    return;
                }

                imagePreviewContainer.innerHTML = ''; // Clear previous previews

                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '100px';
                        img.style.height = '100px';
                        imagePreviewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = document.getElementById("modal");
            var modalButton = document.querySelector(".op_modal");
            var closeModal = document.querySelector(".close_modal");
            var modalContent = document.querySelector(".modal_content");
            var buyNowButton = document.getElementById("submitButtonPage2"); // Thêm dòng này để chọn nút "Mua ngay"

            modalButton.addEventListener("click", function() {
                modal.style.display = "block";
                setTimeout(() => {
                    modalContent.classList.add("slide-in");
                }, 10); // Thêm một độ trễ ngắn để kích hoạt lại hiệu ứng CSS
            });

            closeModal.addEventListener("click", function() {
                modalContent.classList.remove("slide-in");
                setTimeout(() => {
                    modal.style.display = "none";
                }, 500); // Đợi hiệu ứng kết thúc rồi mới ẩn modal
            });

            buyNowButton.addEventListener("click", function() {
                // Thêm event listener cho nút "Mua ngay"
                modalContent.classList.remove("slide-in");
                setTimeout(() => {
                    modal.style.display = "none";
                }, 500); // Đợi hiệu ứng kết thúc rồi mới ẩn modal
            });

            window.addEventListener("click", function(event) {
                if (event.target == modal) {
                    modalContent.classList.remove("slide-in");
                    setTimeout(() => {
                        modal.style.display = "none";
                    }, 500); // Đợi hiệu ứng kết thúc rồi mới ẩn modal
                }
            });
        });
    </script>
    <script>
        var ProvinceSelect = document.getElementById('province');
        var DistrictSelect = document.getElementById('district');
        ProvinceSelect.addEventListener('change', function() {
            var selectedProvince = ProvinceSelect.value;
            var DistrictArray = districtsData[selectedProvince] || [];

            // Xóa tất cả các tùy chọn cũ trước khi cập nhật
            DistrictSelect.innerHTML = '<option value="" selected disabled>Chọn quận/huyện</option>';

            // Thêm các tùy chọn mới cho dòng xe
            DistrictArray.forEach(function(district) {
                var option = document.createElement('option');
                option.value = district;
                option.textContent = district;
                DistrictSelect.appendChild(option);
            });
        });

        var districtsData = {
            "An Giang": ["An Phú", "Châu Phú", "Châu Thành", "Chợ Mới", "Phú Tân", "Thới Bình", "Thoại Sơn", "Tịnh Biên", "Tri Tôn"],


        };
    </script>
    <?php
    require_once('reason.php');
    require_once("list-car.php");
    require_once("footer.php");
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.carousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                dots: true
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const listItems = document.querySelectorAll('.store_ul li');
            const pages = document.querySelectorAll('.store_page');
            const submitButtonPage1 = document.getElementById('submitButtonPage1');
            const submitButtonPage2 = document.getElementById('submitButtonPage2');
            const buyNowButton = document.getElementById('buyNowButton');
            const submitButtonPage3 = document.getElementById('submitButtonPage3');

            function showPage(pageId) {
                pages.forEach(page => {
                    if (page.id === pageId) {
                        page.style.display = 'block';
                    } else {
                        page.style.display = 'none';
                    }
                });

                listItems.forEach(item => {
                    if (item.getAttribute('data-page') === pageId) {
                        item.classList.add('active-tab');
                    } else {
                        item.classList.remove('active-tab');
                    }
                });
            }

            listItems.forEach(item => {
                item.addEventListener('click', function() {
                    const pageId = this.getAttribute('data-page');
                    showPage(pageId);
                });
            });

            submitButtonPage1.addEventListener('click', function() {
                showPage('page2');
            });

            submitButtonPage2.addEventListener('click', function() {
                showPage('page3');
            });

            buyNowButton.addEventListener('click', function() {
                showPage('page3');
            });

            submitButtonPage3.addEventListener('click', function() {
                showPage('page4');
            });
        });
    </script>
    <script src="../assets/script/script.js"></script>
</body>

</html>