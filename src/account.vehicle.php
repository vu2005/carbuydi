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
                <?php
                include("./account.nav.php")
                ?>
                <div class="account-body">
                    <div class="account_text">
                        <h2>Quản lý xe</h2>
                        <div class="store-menu">
                            <ul>
                                <li><a href="account.store.php">Quản lý cửa hàng</a></li>
                                <li><a href="account.vehicle.php">Quản lý xe</a></li>
                                <li><a href="account.transaction.php">Lịch sử giao dịch</a></li>
                            </ul>
                        </div>
                        <div class="cars-main">
                            <div class="cars-container">
                                <div class="pd_30">
                                    <div class="navbar-cars">
                                        <div class="post-1"><b style="font-size: 14px;font-weight: 500;">Số tin đang bán còn lại:</b>
                                            <ul style="margin-top: 5px;">
                                                <li><b>0</b> Tin VIP</li>
                                                <li><b>0</b> Tin thường</li>
                                                <li><b>0</b> Đẩy tin</li>
                                            </ul>
                                        </div>
                                        <div class="post-2"><b style="font-size: 14px; font-weight: 500;">Loại tin</b>
                                            <ul style="margin-top: 5px;">
                                                <li><b>0</b> Tin đang bán</li>
                                                <li><b>0</b>Tin đang duyệt</li>
                                                <li><b>0</b> Tin hết hạn</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="filter-car">
                                        <div class="filter_1">
                                            <p>Có <b>2</b> tin đăng </p>
                                            <div class="search_cars"> <input type="text" placeholder="Tìm kiếm"> <i class="fa-solid fa-magnifying-glass"></i></div>
                                        </div>
                                        <div class="filter_2">
                                            <div class="cars_select_1">
                                                <select id="filter_news" name="filter_news" required>
                                                    <option value="" selected disabled>Lọc tin</option>
                                                    <option value="Tất cả">Tất cả</option>
                                                    <option value="Đang bán">Đang bán</option>
                                                    <option value="Hết hạn">Hết hạn</option>
                                                    <option value="Đã bán">Đã bán</option>
                                                </select>
                                            </div>
                                            <div class="cars_select_2">
                                                <select id="organize_news" name="organize_news" required>
                                                    <option value="" selected disabled>Sắp xếp tin</option>
                                                    <option value="Ngày tạo giảm dần">Ngày tạo giảm dần</option>
                                                    <option value="Ngày tạo tăng dần">Ngày tạo tăng dần</option>
                                                    <option value="Giá tăng dần">Giá tăng dần</option>
                                                    <option value="Giá giảm dần">Giá giảm dần</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cars_menu">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Tiêu đề</th>
                                                    <th>Lượt xem tin</th>
                                                    <th>Lượt xem SĐT</th>
                                                    <th>Lượt gửi tin nhắn</th>
                                                    <th>Số lượt đẩy tin</th>
                                                    <th>Ngày hết hạn</th>
                                                    <th>Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="image">
                                                        <img src="https://via.placeholder.com/60" alt="Image">
                                                        <div class="id_name">
                                                            <b>Student1469597</b>
                                                            <p>ID: 498289 | Tin thường</p>
                                                        </div>
                                                    </td>
                                                    <td>228</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>22/05/2024<br>02:12:02</td>
                                                    <td class="status">
                                                        ĐANG BÁN
                                                        <div class="action">
                                                            <a href="#">
                                                                <button><i class="fa-solid fa-eye"></i>
                                                                    <p>Xem tin</p>
                                                                </button>
                                                            </a>
                                                            <a href="#">
                                                                <button><i class="fa-solid fa-pen"></i>
                                                                    <p>Sửa</p>
                                                                </button>
                                                            </a>
                                                            <a href="#">
                                                                <button><i class="fa-solid fa-arrow-up"></i>
                                                                    <p>Đẩy tin</p>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="image">
                                                        <img src="https://via.placeholder.com/60" alt="Image">
                                                        <div class="id_name">
                                                            <b>Student1469597</b>
                                                            <p>ID: 498289 | Tin thường</p>
                                                        </div>
                                                    </td>
                                                    <td>228</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>22/05/2024<br>02:12:02</td>
                                                    <td class="status">
                                                        ĐANG BÁN
                                                        <div class="action">
                                                            <a href="#">
                                                                <button><i class="fa-solid fa-eye"></i>
                                                                    <p>Xem tin</p>
                                                                </button>
                                                            </a>
                                                            <a href="#">
                                                                <button><i class="fa-solid fa-pen"></i>
                                                                    <p>Sửa</p>
                                                                </button>
                                                            </a>
                                                            <a href="#">
                                                                <button><i class="fa-solid fa-arrow-up"></i>
                                                                    <p>Đẩy tin</p>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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