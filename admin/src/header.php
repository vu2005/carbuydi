<div class="admin-header" style="margin: 0 60px;">
    <div class="admin-1">
        <button style="display: flex;">
            <i class='bx bx-menu'></i>
        </button>

        <p>Hệ Thống Quản Lý</p>
    </div>
    <div class="admin-1">
        <div class="admin-1-search">
            <div class="admin-1-search-box">
                <input type="text" class="search-input" />
                <button class="search-btn">
                    <i class='bx bx-search'></i>
                </button>
            </div>
        </div>
        <div class="admin-1-date">
            <input type="date" name="" id="" value="2024-06-09">
        </div>
        <div class="admin-1-user show" onclick="toggleShow()">
            <div class="admin-header-box">
                <div class="logo">
                    <img src="https://lh3.googleusercontent.com/a/ACg8ocKK85jPdigdkRQTrwyyGqN4TIhe--nlHh30wtVQW4cmK7r0WRef=s360-c-no" alt="Logo">
                    <div class="status-dot online"></div> <!-- Chấm màu xanh -->
                </div>
                <div class="admin-user-info">
                    <div class="user-info">
                        <div class="logo">
                            <img src="https://lh3.googleusercontent.com/a/ACg8ocKK85jPdigdkRQTrwyyGqN4TIhe--nlHh30wtVQW4cmK7r0WRef=s360-c-no" alt="Logo">
                        </div>
                        <div class="admin-user-text">
                            <p class="username">Mark Williams</p>
                            <p class="email">mark@example.com</p>
                        </div>
                    </div>
                    <div class="profile-user">
                        <ul>
                            <li class="hover-reset">
                                <div class="admin-nav00">
                                    <div class="admin-nav01">
                                        <ul>
                                            <li><i class='bx bxs-circle' style="color: #28a745;"></i><a href="">Available</a></li>
                                            <li><i class='bx bxs-circle' style="color: #ffc107;"></i><a href="">Busy</a></li>
                                            <li><i class='bx bxs-circle' style="color: #f44336;"></i><a href="">Away</a></li>
                                            <div class="click-reset" style="border-top: 1px solid #808080; ">
                                                <li style="padding: 8px 20px; margin-top: 10px; list-style: none;"><a href="" style="text-decoration:  none; color: #000;">Reset status</a></li>
                                            </div>
                                        </ul>
                                    </div>
                                </div><span>Set status</span> <i class='bx bx-chevron-right'></i>
                            </li>
                            <li><a href="">Profile & account</a></li>
                            <li><a href="">Settings</a></li>
                        </ul>
                    </div>
                    <div class="profile-company">
                        <ul>
                            <li>
                                <div class="company-logo">
                                    <img src="https://www.carmudi.vn/images/aboutUs/image2132.png" alt="">
                                </div>
                                <div class="company-text">
                                    <p class="name-company" style="font-weight: 500;">Carbuydi</p>
                                    <p class="slogan">Top1 Việt Nam</p>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <div class="introduc-team" style="border-top: 1px solid #808080;">
                        <ul>
                            <li><span>My team</span> <i class='bx bx-chevron-right'></i></li>
                            <li>Customization</li>
                        </ul>
                    </div>

                    <div class="admin-sign-out">
                        <ul>
                            <li><a href="logout.php">Sign out</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>

    </style>

</div>
<script>
    function toggleShow() {
        var adminUserInfo = document.querySelector('.admin-user-info');
        adminUserInfo.classList.toggle('show');
    }
    document.querySelector('.search-btn').addEventListener('click', function() {
        this.parentElement.classList.toggle('open')
        this.previousElementSibling.focus()
    })
</script>