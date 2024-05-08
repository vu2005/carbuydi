<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$logined = '';

if ($user) {
    $logined = '<li><a href="account.php?id=' . $user_id . '">Tài khoản</a></li>
                <li><a href="logout.php">Đăng xuất</a></li>';
} else {
    $logined = '<li><a href="login.php">Đăng nhập</a></li>';
    // Nếu người dùng chưa đăng nhập, gán user_id = 0 để tránh lỗi khi truy cập CarSell.php
    $user_id = 0;
}
?>


<div class="header">
    <div class="navbar">
        <div class="nav">
            <div class="logo">
                <a href="index.php">
                    <img src="../assets/images/logo.png" alt="Logo">
                </a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li class="hover-nav" style="font-weight: 500;">
                        Mua Xe
                        <i class="bx bxs-chevron-down"></i>
                        <div class="nav1">
                            <div class="nav1-icon">
                                <i class="bx bxs-checkbox"></i>
                            </div>
                            <div class="nav1-container">
                                <ul>
                                    <h4 class="nav1-heading">HÃNG XE PHỔ BIẾN</h4>
                                    <li><a href="index.php?select=Toyota">Toyota</a></li>
                                    <li><a href="index.php?select=Honda">Honda</a></li>
                                    <li>
                                        <a href="index.php?select=Mercedes-Benz">Mercedes-Benz</a>
                                    </li>
                                    <li><a href="index.php?select=Ford">Ford</a></li>
                                    <li><a href="index.php?select=BMW">BMW</a></li>
                                    <li>
                                        <a href="index.php?select=Chevrolet">Chevrolet</a>
                                    </li>
                                    <li><a href="index.php?select=Hyundai">Hyundai</a></li>
                                    <li><a href="index.php?select=Kia">Kia</a></li>
                                    <li><a href="index.php?select=Mazda">Mazda</a></li>
                                    <li><a href="index.php?select=VinFast">VinFast</a></li>
                                    <div class="nav-all">
                                        <p>
                                            <a href="index.php">Xem tất cả xe</a>
                                        </p>
                                    </div>
                                </ul>
                                <ul>
                                    <h4 class="nav1-heading">
                                        DÒNG XE PHỔ BIẾN
                                    </h4>
                                    <li>
                                        <a href="index.php?select=Mercedes-Benz-GL-Class">Mercedes-Benz GL
                                            Class</a>
                                    </li>
                                    <li>
                                        <a href="index.php?select=Mercedes-Benz-E-Class">Mercedes-Benz E
                                            Class</a>
                                    </li>
                                    <li>
                                        <a href="index.php?select=Mitsubishi-Xpander-Cross">Mitsubishi Xpander
                                            Cross</a>
                                    </li>
                                    <li>
                                        <a href="index.php?select=Toyota-Fortuner">Toyota Fortuner</a>
                                    </li>
                                    <li>
                                        <a href="index.php?select=Mercedes-Benz-S-Class">Mercedes-Benz S
                                            Class</a>
                                    </li>
                                    <li>
                                        <a href="index.php?select=Mercedes-Benz-C-Class">Mercedes-Benz C
                                            Class</a>
                                    </li>
                                    <li>
                                        <a href="index.php?select=Hyundai-Santafe">Hyundai Santafe</a>
                                    </li>
                                    <li>
                                        <a href="index.php?select=Toyota-Corolla-Cross">Toyota Corolla Cross</a>
                                    </li>
                                    <li>
                                        <a href="index.php?select=Ford-Everest">Ford Everest</a>
                                    </li>
                                    <li>
                                        <a href="index.php?select=Toyota-Vios">Toyota Vios</a>
                                    </li>
                                </ul>
                                <ul>
                                    <h4 class="nav1-heading">
                                        GIÁ XE
                                    </h4>
                                    <li>
                                        <a href="index.php?select=Duoi-500-tr">Dưới 500 triệu</a>
                                    </li>
                                    <li>
                                        <a href="index.php?select=500-700tr">Từ 500-700 triệu</a>
                                    </li>
                                    <li>
                                        <a href="index.php?select=700-1t">Từ 700 -1tỷ</a>
                                    </li>
                                    <li>
                                        <a href="index.php?select=tren1t">Trên 1 tỷ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?php echo 'CarSell.php?user_id=' . ($user_id ? $user_id : 0); ?>">Bán Xe </a></li>
                    <li><a href="about.php">Giới Thiệu</a></li>
                    <li><a href="New.php">Tin Tức</a></li>
                </ul>
            </nav>
        </div>
        <div class="customers">
            <a href="post-news.php">
                <button class="btn btn-primary">
                    <i class='bx bx-car'></i>
                    Đăng tin
                </button>
            </a>
            <div class="contact-1">
                <a href="https://zalo.me/84384804325">
                    <button class="btn btn-outline">
                        <i id="phoneIcon" class="bx bx-phone-call"></i>
                        0384804325
                    </button>
                </a>
            </div>
            <style>
                @keyframes shake {
                    0% {
                        transform: rotate(0deg);
                    }

                    25% {
                        transform: rotate(-10deg);
                    }

                    50% {
                        transform: rotate(10deg);
                    }

                    75% {
                        transform: rotate(-10deg);
                    }

                    100% {
                        transform: rotate(0deg);
                    }

                }

                #phoneIcon {
                    animation: shake 0.5s infinite;
                }
            </style>
            <div class="user">
                <ul>
                    <li><i class='bx bxs-user-circle'></i>
                        <p>Tài Khoản</p><i class="bx bxs-chevron-down"></i>
                        <div class="nav2">
                            <div class="box">
                                <i class='bx bxs-checkbox'></i>
                            </div>
                            <ul>
                                <?= $logined ?>
                                <li><a class="open-modal-btn">Đăng ký</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
include("register.php");
?>