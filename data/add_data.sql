-- Thêm dữ liệu vào bảng cars
INSERT INTO cars (make, model, version, year, `condition`, mileage, price) 
VALUES 
('Toyota', 'Corolla', 'XLE', 2020, 'Mới', 0, 25000.00),
('Honda', 'Civic', 'Touring', 2019, 'Đã qua sử dụng', 20000, 18000.00),
('Ford', 'Mustang', 'GT Premium', 2018, 'Đã qua sử dụng', 15000, 35000.00);

-- Thêm dữ liệu vào bảng cars_details
INSERT INTO cars_details (car_id, title, description, transmission, origin, body_style, color, fuel_type, engine_capacity, seats)
VALUES 
(1, 'Toyota Corolla XLE 2020', 'Mô tả chi tiết về xe Toyota Corolla XLE 2020', 'Số tự động', 'Nhập khẩu', 'Sedan', 'Trắng', 'Xăng', 1.8, 5),
(2, 'Honda Civic Touring 2019', 'Mô tả chi tiết về xe Honda Civic Touring 2019', 'Số tự động', 'Lắp ráp trong nước', 'Sedan', 'Đen', 'Xăng', 1.5, 5),
(3, 'Ford Mustang GT Premium 2018', 'Mô tả chi tiết về xe Ford Mustang GT Premium 2018', 'Số tự động', 'Nhập khẩu', 'Coupe', 'Đỏ', 'Xăng', 5.0, 4);

-- Thêm dữ liệu vào bảng sellers_car
INSERT INTO sellers_car (name, company_name, province, address, phone, district, posted_date, car_id)
VALUES 
('Nguyễn Văn A', 'Công ty ABC', 'Hà Nội', '123 Đường ABC', '0123456789', 'Quận ABC', '2024-05-07', 1),
('Trần Thị B', 'Công ty XYZ', 'Hồ Chí Minh', '456 Đường XYZ', '0987654321', 'Quận XYZ', '2024-05-08', 2),
('Lê Văn C', 'Công ty DEF', 'Đà Nẵng', '789 Đường DEF', '0369852147', 'Quận DEF', '2024-05-09', 3);

-- Thêm dữ liệu vào bảng users
INSERT INTO users (full_name, phone_number, address, province, district, email, password)
VALUES 
('Nguyễn Thị D', '0123456789', '123 Đường ABC', 'Hà Nội', 'Quận ABC', 'admin1@gmail.com', 'password123'),
('Trần Văn E', '0987654321', '456 Đường XYZ', 'Hồ Chí Minh', 'Quận XYZ', 'bahatmittt@gmail.com', 'abc@123'),
('Phạm Thị F', '0369852147', '789 Đường DEF', 'Đà Nẵng', 'Quận DEF', 'nhuvu@gmail.com', 'pass@word');

-- Thêm dữ liệu vào bảng users_sell_cars
INSERT INTO users_sell_cars (user_id, make, model, version, year, mileage, phone, posted_date)
VALUES 
(1, 'Toyota', 'Corolla', 'XLE', 2020, 0, '0123456789', '2024-05-10'),
(2, 'Honda', 'Civic', 'Touring', 2019, 20000, '0987654321', '2024-05-11'),
(3, 'Ford', 'Mustang', 'GT Premium', 2018, 15000, '0369852147', '2024-05-12');

-- Thêm dữ liệu vào bảng admins
INSERT INTO admins (username, password, email, full_name, date_of_birth, role)
VALUES 
('admin1', '123', 'admin1@gmail.com', 'Admin 1', '1990-01-01', 'admin'),
('admin2', 'admin@456', 'admin2@gmail.com', 'Admin 2', '1995-05-05', 'editor');
-- Thêm dữ liệu vào bảng users_image
INSERT INTO users_image (user_id, avt_image, shop_image) 
VALUES 
(1, 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQHnhWFBFpqpDEQE_DyEaYEXHwa8QY4mAsBTeZaif0XvmL1sXI2', 'https://s.bonbanh.com/uploads/users/122309/salon/l_1546932173.jpg'), 
(2, 'https://assets.goal.com/images/v3/bltcb938010210e6cd4/Cristiano_Ronaldo_Portugal_2023.jpg?auto=webp&format=pjpg&width=3840&quality=60', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQAjR0FgKPwf-gjvAX7yNiFoz0p6MOCQ04h7gQVWNkz3g&s'), 
(3, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSAOnLXSaPbc4K0IId0dSTI050OfwusYAyfQzMiCF6mrwNPVdmN', NULL);

INSERT INTO cars_image (car_id, shop_image, front_image, rear_image, left_image, right_image, dashboard_image, inspection_image, other_image)
VALUES 
(1, 'https://thuthuatnhanh.com/wp-content/uploads/2019/08/anh-sieu-xe-Audi-mau-do.jpg', 'https://images.pexels.com/photos/225841/pexels-photo-225841.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/712618/pexels-photo-712618.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/919073/pexels-photo-919073.jpeg?auto=compress&cs=tinysrgb&w=600', 'https://images.pexels.com/photos/1131575/pexels-photo-1131575.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/240222/pexels-photo-240222.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/707046/pexels-photo-707046.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
(2, 'https://thuthuatnhanh.com/wp-content/uploads/2019/08/anh-sieu-xe-Audi-mau-do.jpg', 'https://images.pexels.com/photos/225841/pexels-photo-225841.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/712618/pexels-photo-712618.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/919073/pexels-photo-919073.jpeg?auto=compress&cs=tinysrgb&w=600', 'https://images.pexels.com/photos/1131575/pexels-photo-1131575.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/240222/pexels-photo-240222.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/707046/pexels-photo-707046.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),

(3, 'https://s.bonbanh.com/uploads/users/75508/salon/l_1655257150.jpg', 'https://images.pexels.com/photos/225841/pexels-photo-225841.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/712618/pexels-photo-712618.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/919073/pexels-photo-919073.jpeg?auto=compress&cs=tinysrgb&w=600', 'https://images.pexels.com/photos/1131575/pexels-photo-1131575.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/240222/pexels-photo-240222.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'https://images.pexels.com/photos/707046/pexels-photo-707046.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
