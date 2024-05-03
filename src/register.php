

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Khoản</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/toast.css">
</head>

<body>
    <form method="post" action="regitration.php" enctype="multipart/form-data">
        <div class="modal hide">
            <div class="modal__inner" style="margin: 100px auto;">
                <div class="modal__header">
                    <i class="fas fa-times"></i>
                </div>
                <div class="modal__text">
                    <h1>Đăng Ký Tài Khoản</h1>
                    <p>Vui lòng điền đầy đủ thông tin</p>
                </div>
                <div class="modal__body">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Nhập Email" required />
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required />
                    <label for="confirm_password">Nhập lại mật khẩu:</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" required />
                </div>
                <div class="modal__btn">
                    <button type="submit">Đăng ký <i class='bx bx-right-arrow-alt'></i></button>
                </div>
                <div class="modal__footer">
                    <p>Bằng cách nhấn vào nút Đăng ký, bạn sẽ là thành viên của Carbuydi☺</p>
                </div>
            </div>
        </div>
    </form>
</body>

</html>

<script>
    window.onload = function() {
        document.getElementById("password").onchange = validatePassword;
        document.getElementById("confirm_password").onchange = validatePassword;
    }

    function validatePassword() {
        var password = document.getElementById("password");
        var confirm_password = document.getElementById("confirm_password");

        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Mật khẩu không khớp!");
        } else {
            confirm_password.setCustomValidity("");
        }
    }
</script>