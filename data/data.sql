CREATE DATABASE IF NOT EXISTS carbuydi CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE carbuydi;

-- Bảng xe (cars)
CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(255), -- Hãng xe
    model VARCHAR(255), -- Dòng xe
    version VARCHAR(255), -- Phiên bản
    year INT, -- Năm sản xuất
    `condition` VARCHAR(50), -- Tình trạng (Ví dụ: Mới, Đã qua sử dụng)
    mileage DECIMAL(10), -- Số KM
    price DECIMAL(15) -- Giá
);

-- Bảng chi tiết xe (cars_details)
CREATE TABLE cars_details (
    car_id INT PRIMARY KEY,
    title VARCHAR(255), -- Tiêu đề
    description TEXT, -- Mô tả
    transmission VARCHAR(50), -- Hộp số (Ví dụ: Số tự động, Số sàn)
    origin VARCHAR(255), -- Xuất xứ (Ví dụ: Nhập khẩu, Lắp ráp trong nước)
    body_style VARCHAR(50), -- Kiểu dáng (Ví dụ: Sedan, SUV, Hatchback)
    color VARCHAR(50), -- Màu sắc
    fuel_type VARCHAR(50), -- Loại nhiên liệu
    engine_capacity DECIMAL(5, 2), -- Dung tích động cơ (lít)
    seats INT, -- Số ghế
    FOREIGN KEY (car_id) REFERENCES cars (id)
);

-- Bảng hình ảnh xe (cars_image)
CREATE TABLE cars_image (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT,
    shop_image VARCHAR(255), -- Đường dẫn đến hình ảnh của xe
    front_image VARCHAR(255), -- Đường dẫn đến ảnh trước xe
    rear_image VARCHAR(255), -- Đường dẫn đến ảnh sau xe
    left_image VARCHAR(255), -- Đường dẫn đến ảnh bên trái xe
    right_image VARCHAR(255), -- Đường dẫn đến ảnh bên phải xe
    dashboard_image VARCHAR(255), -- Đường dẫn đến ảnh dashboard
    inspection_image VARCHAR(255), -- Đường dẫn đến ảnh đăng kiểm
    other_image VARCHAR(255), -- Đường dẫn đến ảnh khác
    FOREIGN KEY (car_id) REFERENCES cars (id)
);

-- Bảng người bán xe (sellers_car)
CREATE TABLE sellers_car (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255), -- Họ và tên người bán
    company_name VARCHAR(255), -- Tên công ty (Nếu có)
    province VARCHAR(255), -- Tỉnh/Thành phố
    address VARCHAR(255), -- Địa chỉ
    phone VARCHAR(20), -- Số điện thoại
    district VARCHAR(255), -- Quận/Huyện
    posted_date DATE, -- Ngày đăng thông tin về sản phẩm
    car_id INT, -- Mã xe (khóa ngoại từ bảng cars)
    image_url VARCHAR(255), -- Đường dẫn đến hình ảnh của người bán
    FOREIGN KEY (car_id) REFERENCES cars (id)
);

-- Bảng thông tin người dùng (users)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255), -- Họ và tên đầy đủ của người dùng
    phone_number VARCHAR(20), -- Số điện thoại
    address VARCHAR(255), -- Địa chỉ
    province VARCHAR(255), -- Tỉnh/Thành phố
    district VARCHAR(255), -- Quận/Huyện
    email VARCHAR(255) UNIQUE, -- Địa chỉ email (duy nhất)
    password VARCHAR(255) NOT NULL -- Mật khẩu (không được để trống)
);

-- Bảng gói đăng tin (listing_packages)
CREATE TABLE listing_packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL, -- Tên gói (ví dụ: Thường, VIP)
    description TEXT, -- Mô tả chi tiết về gói
    price DECIMAL(15, 2) NOT NULL, -- Giá của gói
    duration_days INT NOT NULL -- Thời gian sử dụng gói (số ngày)
);

-- Bảng giao dịch mua gói đăng tin (package_purchases)
CREATE TABLE package_purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, -- Mã người dùng (khóa ngoại từ bảng users)
    package_id INT NOT NULL, -- Mã gói đăng tin (khóa ngoại từ bảng listing_packages)
    purchase_date DATE NOT NULL, -- Ngày mua gói
    expiry_date DATE NOT NULL, -- Ngày hết hạn của gói
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (package_id) REFERENCES listing_packages (id)
);

-- Bảng thông tin thanh toán (payments)
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, -- Mã người dùng (khóa ngoại từ bảng users)
    package_id INT NOT NULL, -- Mã gói đăng tin (khóa ngoại từ bảng listing_packages)
    payment_date DATE NOT NULL, -- Ngày thanh toán
    amount DECIMAL(15, 2) NOT NULL, -- Số tiền thanh toán
    payment_method VARCHAR(50), -- Phương thức thanh toán (ví dụ: Thẻ tín dụng, Chuyển khoản)
    payment_status ENUM(
        'Pending',
        'Completed',
        'Failed'
    ) DEFAULT 'Pending', -- Trạng thái thanh toán
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (package_id) REFERENCES listing_packages (id)
);

-- Bảng lưu trữ số dư tài khoản người dùng (account_balance)
CREATE TABLE account_balance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, -- Mã người dùng (khóa ngoại từ bảng users)
    total_amount DECIMAL(15, 2) NOT NULL, -- Tổng số tiền đã nạp vào tài khoản
    last_updated DATE NOT NULL, -- Ngày cập nhật cuối cùng
    FOREIGN KEY (user_id) REFERENCES users (id)
);

-- Bảng danh sách yêu thích (wishlist)
CREATE TABLE wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT, -- Mã người dùng (khóa ngoại từ bảng users)
    car_id INT, -- Mã xe (khóa ngoại từ bảng cars)
    added_date DATE, -- Ngày thêm vào danh sách yêu thích
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (car_id) REFERENCES cars (id)
);

-- Bảng thông tin người dùng bán xe (users_sell_cars)
CREATE TABLE users_sell_cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT, -- Mã người dùng (khóa ngoại từ bảng users)
    make VARCHAR(255), -- Hãng xe
    model VARCHAR(255), -- Dòng xe
    version VARCHAR(255), -- Phiên bản
    year INT, -- Năm sản xuất
    mileage INT, -- Số KM
    phone VARCHAR(20), -- Số điện thoại
    posted_date DATE, -- Ngày đăng thông tin
    FOREIGN KEY (user_id) REFERENCES users (id) -- Liên kết với bảng users
);

-- Bảng thông tin admin (admins)
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE, -- Tên đăng nhập (duy nhất)
    password VARCHAR(255), -- Mật khẩu
    email VARCHAR(255) UNIQUE, -- Địa chỉ email (duy nhất)
    full_name VARCHAR(255), -- Họ và tên đầy đủ của admin
    date_of_birth DATE, -- Ngày sinh
    role ENUM('admin', 'editor') DEFAULT 'admin' -- Vai trò của admin (admin hoặc editor)
);

-- Bảng thông tin đăng nhập và đăng bán xe của người dùng (user_car_listing)
CREATE TABLE user_car_listing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT, -- Mã người dùng (khóa ngoại từ bảng users)
    car_id INT, -- Mã xe (khóa ngoại từ bảng cars)
    package_id INT, -- Mã gói đăng tin (khóa ngoại từ bảng listing_packages)
    FOREIGN KEY (user_id) REFERENCES users (id), -- Liên kết với bảng users
    FOREIGN KEY (car_id) REFERENCES cars (id), -- Liên kết với bảng cars
    FOREIGN KEY (package_id) REFERENCES listing_packages (id) -- Liên kết với bảng listing_packages
);
-- Bảng cửa hàng của khách hàng (customer_stores)
CREATE TABLE customer_stores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL, -- Mã khách hàng (khóa ngoại từ bảng users)
    store_name VARCHAR(255) NOT NULL, -- Tên cửa hàng
    store_location VARCHAR(255), -- Địa điểm của cửa hàng
    store_province VARCHAR(255) NOT NULL,
    store_district VARCHAR(255) NOT NULL,
    store_description TEXT, -- Mô tả về cửa hàng
    store_phone VARCHAR(20), -- Số điện thoại của cửa hàng
    store_email VARCHAR(255), -- Địa chỉ email của cửa hàng
    store_website VARCHAR(255), -- Website của cửa hàng
    store_image1 VARCHAR(255), -- Đường dẫn đến hình ảnh 1 của cửa hàng
    store_image2 VARCHAR(255), -- Đường dẫn đến hình ảnh 2 của cửa hàng
    store_image3 VARCHAR(255), -- Đường dẫn đến hình ảnh 3 của cửa hàng
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Ngày và giờ tạo cửa hàng
    FOREIGN KEY (customer_id) REFERENCES users (id) -- Liên kết với bảng users
);

CREATE TABLE transaction_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    transaction_code VARCHAR(255), -- Thêm cột mới để lưu trữ mã giao dịch của khách hàng
    transaction_content TEXT NOT NULL,
    transaction_datetime DATETIME NOT NULL,
    credit DECIMAL(15, 2) DEFAULT 0,
    debit DECIMAL(15, 2) DEFAULT 0,
    status ENUM('Pending', 'Completed', 'Failed') DEFAULT 'Pending',
    gateway VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users (id)
);
CREATE TABLE customer_cars_management (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, -- Mã người dùng (khóa ngoại từ bảng users)
    car_id INT NOT NULL, -- Mã xe (khóa ngoại từ bảng cars)
    title VARCHAR(255) NOT NULL, -- Tiêu đề
    view_count INT DEFAULT 0, -- Lượt xem tin
    phone_view_count INT DEFAULT 0, -- Lượt xem SĐT
    message_count INT DEFAULT 0, -- Lượt gửi tin nhắn
    push_count INT DEFAULT 0, -- Số lượt đẩy tin
    expiry_date DATE NOT NULL, -- Ngày hết hạn
    status ENUM('listed', 'expired') DEFAULT 'listed', -- Trạng thái
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (car_id) REFERENCES cars (id)
);