<div class="admin-main" >
    <div class="admin-box3">
        <a href="index.php">
            <i class='bx bx-border-all'></i>
            <p>Hệ Thống Quản Lý</p>
        </a>
    </div>
    <div class="admin-list">
        <p>Danh Mục Quản Lý</p>
        <div class="box-list" onclick="toggleAdminNav(this)"><i class='bx bx-layer'></i>
            <p>Quản Lý Sản Phẩm</p><i class='bx bx-chevron-down'></i>
            <div class="admin-nav">
                <ul><a href="index.php?quanly=Products">
                        <li>Sản Phẩm</li>
                    </a>
                    <a href="index.php?quanly=Sellers">
                        <li>Danh sách đối tác</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="box-list" onclick="toggleAdminNav(this)"><i class='bx bx-layer'></i>
            <p>Quản Lý Đơn Hàng</p><i class='bx bx-chevron-down'></i>
            <div class="admin-nav">
                <ul><a href="index.php?quanly=Order">
                        <li>Order</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="box-list" onclick="toggleAdminNav(this)"><i class='bx bx-layer'></i>
            <p>Quản Lý Khách Hàng</p><i class='bx bx-chevron-down'></i>
            <div class="admin-nav">
                <ul><a href="index.php?quanly=Customer">
                        <li>Danh sách khách hàng bán xe</li>
                    </a>
                    <a href="index.php?quanly=AccountCustomer">
                        <li>Danh sách tài khoản của khách hàng</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="box-list" onclick="toggleAdminNav(this)"><i class='bx bx-layer'></i>
            <p>Quản Lý Tài Khoản</p><i class='bx bx-chevron-down'></i>
            <div class="admin-nav">
                <ul>
                    <a href="index.php?quanly=User">
                        <li>List of User Accounts
                        </li>
                    </a>
                    <a href="index.php?quanly=Admin">
                        <li>List of Admin Accounts
                        </li>
                    </a>

                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleAdminNav(element) {
        var adminNav = element.getElementsByClassName("admin-nav")[0];
        adminNav.classList.toggle("active");
    }
</script>
<style>
    .admin-box3 i {
        font-size: 30px;
        color: #000;
    }

    .admin-box3>a {
        text-decoration: none;
        display: flex;
        margin: 40px 0;
    }

    .admin-box3>a>p {
        font-weight: 400;
        color: #1a6fb7;
        font-size: 15px;
        padding: 0 10px;
        font-family: "Roboto", system-ui, "Segoe UI", "Open Sans", "Helvetica Neue";
    }

    .admin-list {
        width: 220px;
        height: auto;
        align-items: center;
        cursor: pointer;
    }

    .admin-control .admin-list {
        display: flex;
        padding: 10px 0;
        flex-wrap: wrap;
    }

    .admin-list>p {
        font-weight: bold;
        margin: 0 5px;
        font-family: "Roboto", system-ui, "Segoe UI", "Open Sans", "Helvetica Neue";
    }

    .box-list {
        display: flex;
        width: 220px;
        border-radius: 5px;
        height: auto;
        margin: 5px 0;
        flex-wrap: wrap;
        cursor: pointer;
        align-items: center;
        justify-content: space-between;
    }

    .box-list:hover {
        background: white;
        transition: 0.2s ease-in-out;
    }

    .box-list p {
        margin: 20px 0;
        margin-right: 25px;
        font-family: "Roboto", system-ui, "Segoe UI", "Open Sans", "Helvetica Neue";
    }

    .box-list i {
        font-size: 20px;
    }

    .admin-nav ul li {
        padding: 8px;
        margin: 10px;
        list-style: none;
        border-radius: 5px;
        transition: all 0.3s ease;
        /* Thêm hiệu ứng transition cho các thuộc tính */
        transform: translateY(-20px);
        /* Đẩy phần tử lên trên */
        opacity: 0;
        /* Ẩn phần tử */
    }

    .admin-nav.active ul li {
        transform: translateY(0);
        /* Di chuyển vị trí Y về 0 */
        opacity: 1;
        /* Hiển thị phần tử */
    }

    .admin-nav.active ul {
        max-height: 1000px;
        /* Giá trị lớn để đảm bảo nội dung đủ lớn để hiển thị */
    }

    .admin-nav ul a:hover {
        transition: 0.2s ease-in-out;
        color: #1a6fb7;
    }

    .admin-nav ul li:hover {
        background: #e9e9e9;
    }

    .admin-nav ul a {
        color: #000;
        font-weight: 400;
        text-decoration: none;
        font-size: 14px;
        font-family: "Roboto", system-ui, "Segoe UI", "Open Sans", "Helvetica Neue";
    }

    .admin-list i {
        font-size: 20px;
        margin-top: 5px;
    }

    .admin-control:hover {
        background: #fff;
    }

    .admin-control {
        width: 220px;
        border-radius: 5px;
        height: auto;
        cursor: pointer;
    }

    .admin-nav ul {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease;
    }
</style>