<?php
require_once '../config/config.php'; // Kết nối cơ sở dữ liệu

?>
<div class="body-all">
    <div class="body-main">
        <?php
        require_once("function.php");
        ?>


        <div class="body-search" style="max-width: 1090px;">
            <div class="body-input">
                <div class="icon-search"><i class='bx bx-search'></i></div>

                <input type="text" list="items" placeholder="Tìm kiếm xe theo hãng xe, Dòng xe hoặc từ khóa ">
                <datalist id="items">
                    <option value="Lamborghini">Lamborghini</option>
                    <option value="Honda">Honda</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Kia">Kia</option>
                    <option value="VinFast">VinFast</option>
                </datalist>
            </div>

            <div class="btn-clen">
                <button class="btn-function"><a href="index.php">BỎ LỌC</a></button>
            </div>
            <div class="text-typing">
                <h1>Carbuydi.vn-Mua Bán Xe Hơi Toàn Quốc</h1>
                <button class="btn-function">
                    <p>SẮP XẾP:</p><span onclick="showFunction()">Liên quan nhất </span><i class='bx bx-chevron-down'></i>
                    <div class="card-list-function">
                        <div class="card-list-function-body">
                            <form action="#">
                                <div class="index-fn">
                                    <label for="">
                                        <input type="radio" name="sorting" checked onclick="closeCardList()">
                                        <span>Liên quan nhất</span>
                                    </label>
                                </div>
                                <div class="index-fn">
                                    <p>Ngày đăng</p>
                                    <label for=""><input type="radio" name="sorting" checked onclick="closeCardList()"><span>Mới nhất</span></label>
                                    <label for=""><input type="radio" name="sorting" checked onclick="closeCardList()"><span>Cũ nhất</span></label>
                                </div>
                                <div class="index-fn">
                                    <p>Giá</p>
                                    <label for=""><input type="radio" name="sorting" checked onclick="closeCardList()"><span>Tăng dần</span></label>
                                    <label for=""><input type="radio" name="sorting" checked onclick="closeCardList()"><span>Giảm dần</span></label>
                                </div>
                                <div class="index-fn">
                                    <p>Số km</p>
                                    <label for=""><input type="radio" name="sorting" checked onclick="closeCardList()"><span>Tăng dần</span></label>
                                    <label for=""><input type="radio" name="sorting" checked onclick="closeCardList()"><span>Giảm dần</span></label>
                                </div>
                                <div class="index-fn" style="border-bottom: none;">
                                    <p>Năm sản xuất</p>
                                    <label for=""><input type="radio" name="sorting" checked onclick="closeCardList()"><span>Mới đến cũ</span></label>
                                    <label for=""><input type="radio" name="sorting" checked onclick="closeCardList()"><span>Cũ đến mới</span></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </button>

            </div>

            <style>
                @keyframes typing {

                    0%,
                    100% {
                        width: 0%;
                    }

                    70%,
                    90% {
                        width: 35%;
                    }
                }

                @keyframes blink {

                    0%,
                    100% {
                        border-right: 10px solid transparent;
                    }

                    50% {
                        border-right: 10px solid #1a6fb7;
                    }
                }
            </style>
                <?php
                include_once("function.php");
                ?>
                <?php
                if (isset($_GET["select"])) {
                    $tam = $_GET["select"];
                } else {
                    $tam = "";
                }
                if ($tam == "Toyota") {
                    include("Toyota.php");
                } else if ($tam == "Honda") {
                    include("Honda.php");
                } else if ($tam == "Mercedes-Benz") {
                    include("Mercedes-Benz.php");
                } else if ($tam == "Ford") {
                    include("Ford.php");
                } else if ($tam == "BMW") {
                    include("BMW.php");
                } else if ($tam == "Chevrolet") {
                    include("Chevrolet.php");
                } else if ($tam == "Hyundai") {
                    include("Hyundai.php");
                } else if ($tam == "Kia") {
                    include("Kia.php");
                } else if ($tam == "Mazda") {
                    include("Mazda.php");
                } else if ($tam == "VinFast") {
                    include("VinFast.php");
                } else if ($tam == "Mercedes-Benz-GL-Class") {
                    include("Mercedes-Benz-GL-Class.php");
                } else if ($tam == "Mercedes-Benz-E-Class") {
                    include("Mercedes-Benz-E-Class.php");
                } else if ($tam == "Mitsubishi-Xpander-Cross") {
                    include("Mitsubishi-Xpander-Cross.php");
                } else if ($tam == "Toyota-Fortuner") {
                    include("Toyota-Fortuner.php");
                } else if ($tam == "Mercedes-Benz-S-Class") {
                    include("Mercedes-Benz-S-Class.php");
                } else if ($tam == "Mercedes-Benz-C-Class") {
                    include("Mercedes-Benz-C-Class.php");
                } else if ($tam == "Hyundai-Santafe") {
                    include("Hyundai-Santafe.php");
                } else if ($tam == "Toyota-Corolla-Cross") {
                    include("Toyota-Corolla-Cross.php");
                } else if ($tam == "Ford-Everest") {
                    include("Ford-Everest.php");
                } else if ($tam == "Toyota-Vios") {
                    include("Toyota-Vios.php");
                } else if ($tam == "Duoi-500-tr") {
                    include("Duoi-500-tr.php");
                } else if ($tam == "500-700tr") {
                    include("500-700tr.php");
                } else if ($tam == "700-1t") {
                    include("700-1t.php");
                } else if ($tam == "tren1t") {
                    include("tren1t.php");
                } else {
                    include("products.php");
                }

                ?>
        </div>
    </div>
    <?php
    require_once('page-item.php');
    ?>
</div>