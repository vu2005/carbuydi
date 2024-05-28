<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Thanh toán không thành công</title>
        <link rel="stylesheet" href="../assets/css/about.css" />
        <link rel="stylesheet" href="../assets/css/footer.css" />
        <link rel="stylesheet" href="../assets/css/modal.css" />
        <link rel="stylesheet" href="../assets/css/header.css" />
        <link rel="stylesheet" href="../assets/css/store.css" />
        <link rel="stylesheet" href="../assets/css/list-car.css" />
        <link rel="stylesheet" href="../assets/css/toast.css" />
        <link rel="stylesheet" href="../assets/css/ban-xe.css" />
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
        />
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        />
        <style>
            .pay_failed {
                text-align: center;
                background: white;
                border-radius: 8px;
                height: 360px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                width: 730px;
            }
            .pay_box img {
                width: 100px;
                margin: 20px 0;
                height: 100px;
            }
            .pay_failed a {
                display: inline-block;
                color: #1a6fb7;
                text-decoration: none;
                border-radius: 5px;
            }
            .pay_failed p {
                margin-bottom: 5px;
            }
            .pay_failed h1 {
                line-height: 46px;
                margin-bottom: 15px;
                font-size: 35px;
            }
            .pay_main {
                display: flex;
                justify-content: center;
                align-items: center;height: 100vh;
            }
        </style>
    </head>
    <body>
        <div class="pay_main">
            <div class="pay_failed">
                <div class="pay_box">
                    <img src="../assets/images/failed.svg" alt="Failed Icon" />
                </div>
                <h1>Thanh toán không thành công!</h1>
                <p>Vui lòng kiểm tra lại phương thức thanh toán hoặc gọi</p>
                <p>
                    <a href="https://zalo.me/84384804325"
                        >Hotline: 0384804325</a
                    >
                    để được hỗ trợ ngay
                </p>
                <p>Cám ơn bạn đã sử dụng dịch vụ của Carmudi.</p>
                <div class="form_group" style="margin-top: 20px">
                    <button type="submit">Trở về trang chủ</button>
                </div>
            </div>
        </div>
    </body>
</html>
