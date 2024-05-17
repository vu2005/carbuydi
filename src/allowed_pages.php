<?php
// Hãng xe
$carMakes = array(
    "toyota", "honda", "mercedes-benz", "ford", "bmw", "chevrolet", "hyundai", "kia",
    "mazda", "vinfast", "mercedes-benz-gl-class", "mercedes-benz-e-class", "mitsubishi-xpander-cross",
    "toyota-fortuner", "mercedes-benz-s-class", "mercedes-benz-c-class", "hyundai-santafe",
    "toyota-corolla-cross", "ford-everest", "toyota-vios", "search-cars", "all_cars"
);

// Dòng xe
$carModels = array(
    "camry", "corolla", "rav4", "highlander", "tacoma", "prius", "siena", "4runner", 
    "civic", "accord", "cr-v", "pilot", "odyssey", "hr-v", "fit", "ridgeline", 
    "c-class", "e-class", "s-class", "glc-class", "gle-class", "gls-class", "a-class", "gla-class", 
    "f-150", "escape", "escape", "fusion", "mustang", "edge", "ranger", "expedition", 
    "3_series", "5_series", "7_series", "x3", "x5", "x7", "4_series", "2_series", 
    "silverado", "equinox", "traverse", "malibu", "tahoe", "camaro", "suburban", "colorado", 
    "Hyundai_Elantra", "Hyundai_Sonata", "Hyundai_SantaFe", "Hyundai_Tucson", "Hyundai_Kona", 
    "Hyundai_Palisade", "Hyundai_Venue", "Hyundai_Accent", 
    "Kia_Optima", "Kia_Sorento", "Kia_Sportage", "Kia_Forte", "Kia_Soul", "Kia_Telluride", "Kia_Rio", "Kia_Stinger", 
    "Mazda_Mazda3", "Mazda_Mazda6", "Mazda_CX5", "Mazda_CX9", "Mazda_MX5Miata", "Mazda_CX30", "Mazda_CX3", "Mazda_Mazda5", 
    "VinFast_LuxA2.0", "VinFast_LuxSA2.0", "VinFast_Fadil", "VinFast_President", "VinFast_LUXV8", "VinFast_LUXAS2.0", "VinFast_LUXSA2.0", 
    "VinFast_LUXA2.0Sedan"
);

// Địa chỉ
$addresses = array(
    "ha_noi", "ho_chi_minh", "binh_duong", "dong_nai", "bac_ninh", "long_an", "hai_duong",
    "khanh_hoa", "da_nang", "hai_phong"
);

// Địa chỉ cụ thể
$specificAddresses = array(
    "ba_dinh", "bac_tu_liem", "cau_giay", "dong_da", "ha_dong", "hai_ba_trung", "hoan_kiem", "hoang_mai", "long_bien", "nam_tu_liem", "tay_ho", 
    "thanh_xuan", "chuong_my", "dan_phuong", "dong_anh", "gia_lam", "hoai_duc", "me_linh", "my_duc", "phu_xuyen", "phu_tho", "quoc_oai", "soc_son", "thach_that", 
    "thanh_oai", "thanh_tri", "thuong_tin", "ung_hoa", 
    "binh_chanh", "binh_tan", "binh_thanh", "can_gio", "cu_chi", "go_vap", "hoc_mon", "nha_be", "phu_nhuan", "quan_1", "quan_10", "quan_11", 
    "quan_12", "quan_2", "quan_3", "quan_4", "quan_5", "quan_6", "quan_7", "quan_8", "quan_9", "tan_binh", "tan_phu", "thu_duc", 
    "bau_bang", "bac_tan_uyen", "ben_cat", "dau_tieng", "di_an", "phu_giao", "tan_uyen", "thuan_an", 
    "bien_hoa", "cam_my", "dinh_quan", "long_khanh", "long_thanh", "nhon_trach", "tan_phu", "thong_nhat", "trang_bom", "vinh_cuu", "xuan_loc", 
    "gia_binh", "luong_tai", "que_vo", "thuan_thanh", "tien_du", "tu_son", "yen_phong", 
    "ben_luc", "can_duoc", "can_giuoc", "chau_thanh", "duc_hoa", "duc_hue", "moc_hoa", "tan_hung", "tan_thanh", "tan_tru", "thanh_hoa", "thu_thua", "vinh_hung", 
    "binh_giang", "cam_giang", "chi_linh", "gia_loc", "kim_thanh", "kinh_mon", "nam_sach", "thanh_ha", "thanh_mien", "tu_ky", 
    "cam_lam", "cam_ranh", "dien_khanh", "khanh_son", "khanh_vinh", "ninh_hoa", "truong_sa", "van_ninh", 
    "cam_le", "hoa_vang", "lien_chieu", "ngu_hanh_son", "son_tra", 
    "an_duong", "an_lao", "bach_long_vi", "cat_hai", "kien_thuy", "thuy_nguyen", "tien_lang", "vinh_bao"
);

// Giá
$priceRanges = array(
    "under_500", "500_to_700", "700_to_1000", "above_1b", "up_price", "dow_price", "results_price"
);

// Năm sản xuất
$years = array(
    "year_new", "year_old", "posted_date_new", "posted_date_old"
);

// Số km
$mileageRanges = array(
    "up_mileage", "dow_mileage"
);

// Kiểu dáng
$bodyStyles = array(
    "coupe", "wagon", "minivan", "pick-up", "hatchback", "mpv", "suv", "sedan"
);

// Nhiên liệu
$fuelTypes = array(
    "xang", "dau", "dien", "gas"
);

// Hộp số
$transmissions = array(
    "so_san", "so_tu_dong"
);

// Màu sắc
$colors = array(
    "black", "red", "yellow", "white", "brown", "orange", "silver", "grey", "yellow_copper", "blue", 
    "green", "violet", "pink", "copper", "sand_gold", "earthy_orange"
);

// Chỗ ngồi
$seats = array(
    "seats_4", "seats_5", "seats_6", "seats_7", "seats_8", "seats_9"
);

// Tổng hợp tất cả các mảng con vào một mảng duy nhất
$allowedPages = array_merge($carMakes, $carModels, $addresses, $specificAddresses, $priceRanges, $years, $mileageRanges, $bodyStyles, $fuelTypes, $transmissions, $colors, $seats);

?>
