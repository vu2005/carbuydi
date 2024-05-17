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
    FOREIGN KEY (car_id) REFERENCES cars(id)
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
    FOREIGN KEY (car_id) REFERENCES cars(id)
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
    FOREIGN KEY (car_id) REFERENCES cars(id)
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
    FOREIGN KEY (user_id) REFERENCES users(id) -- Liên kết với bảng users
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
    FOREIGN KEY (user_id) REFERENCES users(id), -- Liên kết với bảng users
    FOREIGN KEY (car_id) REFERENCES cars(id) -- Liên kết với bảng cars
);