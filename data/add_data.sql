INSERT INTO cars (make, model, version, year, `condition`, mileage, price) VALUES
('Toyota', 'Camry', 'SE', 2020, 'New', 0, 240000000.00),
('Honda', 'Civic', 'EX', 2018, 'Used', 15000, 18000000.00),
('Ford', 'Focus', 'Titanium', 2019, 'Used', 120000000, 16000.00);
INSERT INTO cars_details (car_id, title, description, transmission, origin, body_style, color, fuel_type, engine_capacity, seats) VALUES
(1, 'Toyota Camry SE 2020', 'New car with excellent features.', 'Automatic', 'Imported', 'Sedan', 'Black', 'Gasoline', 2.5, 5),
(2, 'Honda Civic EX 2018', 'Used car in good condition.', 'Manual', 'Domestic', 'Sedan', 'White', 'Gasoline', 1.8, 5),
(3, 'Ford Focus Titanium 2019', 'Well-maintained used car.', 'Automatic', 'Imported', 'Hatchback', 'Blue', 'Gasoline', 2.0, 5);
INSERT INTO cars_image (car_id, shop_image, front_image, rear_image, left_image, right_image, dashboard_image, inspection_image, other_image) VALUES
(1, '../assets/images/main-image.jpg', '../assets/images/front_image1.jpg', '../assets/images/rear_image1.jpg', '../assets/images/left_image1.jpg', '../assets/images/right_image1.jpg', '../assets/images/dashboard_image1.jpg', '../assets/images/inspection_image1.jpg', '../assets/images/other_image1.jpg'),
(2, '../assets/images/main-image.jpg', '../assets/images/front_image2.jpg', '../assets/images/rear_image2.jpg', '../assets/images/left_image2.jpg', '../assets/images/right_image2.jpg', '../assets/images/dashboard_image2.jpg', '../assets/images/inspection_image2.jpg', '../assets/images/other_image2.jpg'),
(3, '../assets/images/main-image.jpg', '../assets/images/front_image3.jpg', '../assets/images/rear_image3.jpg', '../assets/images/left_image3.jpg', '../assets/images/right_image3.jpg', '../assets/images/dashboard_image3.jpg', '../assets/images/inspection_image3.jpg', '../assets/images/other_image3.jpg');
INSERT INTO sellers_car (name, company_name, province, address, phone, district, posted_date, car_id, image_url) VALUES
('Nguyen Van A', 'Car Dealership A', 'Hanoi', '123 Street, Hanoi', '0912345678', 'Dong Da', '2024-05-20', 1, 'seller_image1.jpg'),
('Tran Thi B', NULL, 'Ho Chi Minh', '456 Avenue, HCM', '0987654321', 'District 1', '2024-05-19', 2, 'seller_image2.jpg'),
('Le Van C', 'Car Dealership B', 'Da Nang', '789 Road, Da Nang', '0909090909', 'Hai Chau', '2024-05-18', 3, 'seller_image3.jpg');
INSERT INTO users (full_name, phone_number, address, province, district, email, password) VALUES
('Nguyen Van D', '0912345678', '123 Street, Hanoi', 'Hanoi', 'Dong Da', 'nguyenvand@gmail.com', 'password123'),
('Tran Thi E', '0987654321', '456 Avenue, HCM', 'Ho Chi Minh', 'District 1', 'tranthie@gmail.com', 'password456'),
('Le Van F', '0909090909', '789 Road, Da Nang', 'Da Nang', 'Hai Chau', 'levanf@gmail.com', 'password789');
INSERT INTO listing_packages (name, description, price, duration_days) VALUES
('Standard', 'Standard package for listing', 100.00, 30),
('Premium', 'Premium package with more features', 200.00, 60),
('VIP', 'VIP package with maximum exposure', 300.00, 90);
INSERT INTO package_purchases (user_id, package_id, purchase_date, expiry_date) VALUES
(1, 1, '2024-05-01', '2024-05-31'),
(2, 2, '2024-05-15', '2024-07-14'),
(3, 3, '2024-05-20', '2024-08-18');
INSERT INTO payments (user_id, package_id, payment_date, amount, payment_method, payment_status) VALUES
(1, 1, '2024-05-01', 100.00, 'Credit Card', 'Completed'),
(2, 2, '2024-05-15', 200.00, 'Bank Transfer', 'Completed'),
(3, 3, '2024-05-20', 300.00, 'Credit Card', 'Completed');
INSERT INTO account_balance (user_id, total_amount, last_updated) VALUES
(1, 100.00, '2024-05-01'),
(2, 200.00, '2024-05-15'),
(3, 300.00, '2024-05-20');
INSERT INTO wishlist (user_id, car_id, added_date) VALUES
(1, 1, '2024-05-10'),
(2, 2, '2024-05-12'),
(3, 3, '2024-05-15');
INSERT INTO users_sell_cars (user_id, make, model, version, year, mileage, phone, posted_date) VALUES
(1, 'Toyota', 'Corolla', 'LE', 2021, 5000, '0912345678', '2024-05-05'),
(2, 'Honda', 'Accord', 'Sport', 2019, 10000, '0987654321', '2024-05-10'),
(3, 'Ford', 'Mustang', 'GT', 2020, 2000, '0909090909', '2024-05-15');
INSERT INTO admins (username, password, email, full_name, date_of_birth, role) VALUES
('admin1', 'adminpass1', 'admin1@example.com', 'Admin One', '1980-01-01', 'admin'),
('editor1', 'editorpass1', 'editor1@example.com', 'Editor One', '1985-02-02', 'editor');
INSERT INTO user_car_listing (user_id, car_id, package_id) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);
INSERT INTO customer_stores (customer_id, store_name, store_description, store_location, store_province, store_district, store_phone, store_email, store_website, store_image1, store_image2, store_image3)
VALUES 
(1, 'Cửa hàng Ô tô ABC', 'Cửa hàng chuyên bán các loại ô tô mới và đã qua sử dụng.', '123 Đường ABC, Quận XYZ, Thành phố HCM', 'HCM', 'XYZ', '0123456789', 'info@otoabc.com', 'https://otoabc.com', 'images/store1/image1.jpg', 'images/store1/image2.jpg', 'images/store1/image3.jpg'),
(2, 'Cửa hàng Xe Máy XYZ', 'Chuyên cung cấp các loại xe máy phân khối lớn và phụ kiện đi kèm.', '456 Đường XYZ, Quận ABC, Thành phố Hà Nội', 'Hà Nội', 'ABC', '0987654321', 'contact@xemayxyz.com', 'https://xemayxyz.com', 'images/store2/image1.jpg', 'images/store2/image2.jpg', 'images/store2/image3.jpg'),
(3, 'Cửa hàng Phụ Tùng 123', 'Cửa hàng chuyên cung cấp phụ tùng ô tô chất lượng cao.', '789 Đường 123, Quận XYZ, Thành phố Đà Nẵng', 'Đà Nẵng', 'XYZ', '0365478912', 'phutung123@gmail.com', 'https://phutung123.com', NULL, NULL, NULL);
-- Insert data into transaction_history table
INSERT INTO transaction_history (user_id, transaction_content, transaction_datetime, credit, debit, status, gateway) VALUES
(1, 'Purchased listing package', '2024-05-01 10:00:00', 100.00, 0, 'Completed', 'Credit Card'),
(2, 'Purchased listing package', '2024-05-15 14:30:00', 200.00, 0, 'Completed', 'Bank Transfer'),
(3, 'Purchased listing package', '2024-05-20 16:45:00', 300.00, 0, 'Completed', 'Credit Card');

-- Insert data into customer_cars_management table
INSERT INTO customer_cars_management (user_id, car_id, title, view_count, phone_view_count, message_count, push_count, expiry_date, status) VALUES
(1, 1, 'Toyota Camry SE 2020 for Sale', 50, 10, 5, 1, '2024-05-31', 'listed'),
(2, 2, 'Honda Civic EX 2018 for Sale', 30, 7, 3, 0, '2024-07-14', 'listed'),
(3, 3, 'Ford Focus Titanium 2019 for Sale', 40, 8, 4, 2, '2024-08-18', 'listed');
