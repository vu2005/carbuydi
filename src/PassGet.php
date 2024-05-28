<?php
if (isset($_POST['nutguiyeucau']) == true) {
    $email = $_POST['email'];
    try {
        // Corrected the charset to utf8
        $conn = new PDO("mysql:host=localhost;dbname=carbuydi;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM users WHERE email = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $count = $stmt->rowCount();

        if ($count == 0) {
            echo '<div class="toast error">';
            echo '<i class="fas fa-exclamation-triangle"></i>';
            echo '<span class="msg">Tài khoản này chưa đăng ký!</span>';
            echo '</div>';

            echo '<script>
                 document.addEventListener("DOMContentLoaded", function () {
                     const toast = document.querySelector(".toast");
                     setTimeout(function () {
                         toast.style.display = "none";
                     }, 2000);
                 });
          </script>';
        } else {
            $matkhaumoi = substr(md5(rand(0, 999999)), 0, 8);
            $sql = "UPDATE users SET password = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$matkhaumoi, $email]);

            echo '<div class="toast success">';
            echo '<i class="fas fa-check-circle"></i>';
            echo '<span class="msg">Gửi mật khẩu qua email thành công!</span>';
            echo '</div>';
            echo '<script>
                 document.addEventListener("DOMContentLoaded", function () {
                     const toast = document.querySelector(".toast");
                     setTimeout(function () {
                         toast.style.display = "none";
                     }, 2000);
                 });
              </script>';
            Guimatkhaumoi($email, $matkhaumoi);
        }
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function Guimatkhaumoi($email, $matkhau)
{
    require "../email/PHPMailer-master/src/PHPMailer.php";
    require "../email/PHPMailer-master/src/SMTP.php";
    require '../email/PHPMailer-master/src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'bahatmittt@gmail.com'; // SMTP username
        $mail->Password = 'gpnp cxyq qxcq wrgf';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('bahatmittt@gmail.com', 'vusena');
        $mail->addAddress($email);
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Thư lấy lại mật khẩu mới';
        $noidungthu = "
        <h2>Website Carbuydi.vn</h2>
        <p>Mật khẩu mới của bạn là: <b>{$matkhau}</b></p>";
        $mail->Body = $noidungthu;
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo 'Đã gửi mail xong';
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }
}
?>
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
    <form method="POST" action="#" enctype="multipart/form-data">
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
                    <input type="email" id="email" name="email" placeholder="Nhập email của bạn ☺" value="<?php if (isset($email) == true) echo $email ?>" required />
                </div>
                <div class="modal__btn">
                    <button type="submit" name="nutguiyeucau">Lấy mã <i class='bx bx-right-arrow-alt'></i></button>
                </div>
                <div class="modal__footer">
                    <p>Bằng cách nhấn vào nút Tiếp Tục, bạn sẽ nhận được mã OTP từ email Carbuydi☺</p>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
