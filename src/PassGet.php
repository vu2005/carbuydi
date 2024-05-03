<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/toast.css">
</head>

<body>
    <form method="post" action="regitration.php" enctype="multipart/form-data">
        <div class="modal pass hide">
            <div class="modal__inner" style="margin: 160px auto;">
                <div class="modal__header">
                    <i class="fas fa-times"></i>
                </div>
                <div class="modal__text">
                    <h1>Quên mật khẩu</h1>
                    <p>Vui lòng điền email của bạn</p>
                </div>
                <div class="modal__body">
                    <input type="email" id="email" name="email" placeholder="Nhập email của bạn ☺" required />
                </div>
                <div class="modal__btn">
                    <button type="submit">Lấy mã <i class='bx bx-right-arrow-alt'></i></button>
                </div>
                <div class="modal__footer">
                    <p>Bằng cách nhấn vào nút Tiếp Tục, bạn sẽ nhận được mã OTP từ email Carbuydi☺</p>
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