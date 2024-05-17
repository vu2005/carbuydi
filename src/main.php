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
                $selects = array_map('trim', explode(",", $_GET["select"]));

                if (count($selects) > 1) {
                    include("results_search.php");
                } else {
                    require_once("allowed_pages.php"); // Bao gồm các mảng tách biệt

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
            } elseif (isset($_GET["price"])) {
                $price = array_map('trim', explode(",", $_GET["price"]));

                if ($price) {
                    include("results_price.php");
                } else {
                    require_once("allowed_pages.php"); // Bao gồm các mảng tách biệt

                    foreach ($price as $price) {
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
            } elseif (isset($_GET["mileage"])) {
                $mileage = array_map('trim', explode(",", $_GET["mileage"]));

                if ($mileage) {
                    include("results_mileage.php");
                } else {
                    require_once("allowed_pages.php"); // Bao gồm các mảng tách biệt

                    foreach ($mileage as $mileage) {
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
            } elseif (isset($_GET["year"])) {
                $year = array_map('trim', explode(",", $_GET["year"]));

                if ($year) {
                    include("results_year.php");
                } else {
                    require_once("allowed_pages.php"); // Bao gồm các mảng tách biệt

                    foreach ($year as $year) {
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
                include("products.php");
            }
            ?>
        </div>
    </div>
</div>