<?php
require_once '../config/config.php'; // Kết nối cơ sở dữ liệu
?>
<div class="body-all">
    <div class="body-main">
        <?php
        require_once("function.php");
        ?>
        <div class="body-search" style="max-width: 1090px;">
            <?php
            require_once("search.php");
            ?>
            <div class="text-typing">
                <h1>Carbuydi.vn-Mua Bán Xe Hơi Toàn Quốc</h1>

                <?php
                require_once("right-filter.php");
                ?>
            </div>

            
            <?php
            include_once("function.php");
            ?>
            <?php
            // Kiểm tra xem biến $_GET["select"] đã được truyền vào hay chưa
            if (isset($_GET["select"])) {
                // Tách chuỗi $_GET["select"] thành các phần riêng biệt bằng dấu phẩy và loại bỏ khoảng trắng ở đầu và cuối chuỗi
                $selects = array_map('trim', explode(",", $_GET["select"]));

                // Nếu có nhiều hơn một lựa chọn, chuyển hướng đến trang search_multiple.php
                if (count($selects) > 1) {
                    include("search_multiple.php");
                } else {
                    // Danh sách các trang cho phép
                    $allowedPages = array(
                        "toyota", "honda", "mercedes-benz", "ford", "bmw", "chevrolet", "hyundai", "kia",
                        "mazda", "vinfast", "mercedes-benz-gl-class", "mercedes-benz-e-class", "mitsubishi-xpander-cross",
                        "toyota-fortuner", "mercedes-benz-s-class", "mercedes-benz-c-class", "hyundai-santafe",
                        "toyota-corolla-cross", "ford-everest", "toyota-vios", "duoi-500-tr", "500-700tr", "700-1t", "tren1t", "search-cars"
                    );

                    // Kiểm tra từng phần trong danh sách các hãng xe được chọn
                    foreach ($selects as $select) {
                        // Chuyển đổi thành chữ thường
                        $select = strtolower($select);

                        // Kiểm tra xem trang được yêu cầu có tồn tại trong danh sách trang cho phép hay không
                        if (in_array($select, $allowedPages)) {
                            // Nếu trang được yêu cầu tồn tại trong danh sách trang cho phép, include trang tương ứng
                            include("$select.php");
                        } else {
                            // Nếu trang không tồn tại, chuyển hướng đến trang 404.php và kết thúc vòng lặp
                            include("404.php");
                            break;
                        }
                    }
                }
            } else {
                // Nếu không có biến $_GET["select"] được truyền vào, hiển thị trang mặc định là products.php
                include("products.php");
            }
            ?>



        </div>
    </div>
    <?php
    require_once('page-item.php');
    ?>
</div>