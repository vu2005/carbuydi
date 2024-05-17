    <div class="function-div">
        <div class="flex-function" onclick="functionClick(this)">
            <div class="fn-sp">
                <img src="../assets/images/fn2.svg" alt="">
                <p style="color: #31406f;">ĐỊA ĐIỂM</p>
            </div>
            <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
        </div>
        <div class="function-nav">
            <div class="function-search" tabindex="0">
                <div class="fn-box">
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Tìm kiếm theo địa điểm">
                </div>
            </div>
            <div class="function-box">
                <ul>
                    <li>
                        <input type="checkbox" name="ha_noi" id="ha_noi" value="province_hanoi" onchange="sortSelectedAdress()">
                        <p class="location-address">Hà Nội</p>
                        <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                    </li>
                    <div class="function-box1">
                        <ul>
                            <li>
                                <input type="checkbox" name="ba_dinh" id="ba_dinh" onchange="sortSelectedAdress()">
                                <p>Ba Đình</p>
                            </li>
                            <li>
                                <input type="checkbox" name="bac_tu_liem" id="bac_tu_liem" onchange="sortSelectedAdress()">
                                <p>Bắc Từ Liêm</p>
                            </li>
                            <li>
                                <input type="checkbox" name="cau_giay" id="cau_giay" onchange="sortSelectedAdress()">
                                <p>Cầu Giấy</p>
                            </li>
                            <li>
                                <input type="checkbox" name="dong_da" id="dong_da" onchange="sortSelectedAdress()">
                                <p>Đống Đa</p>
                            </li>
                            <li>
                                <input type="checkbox" name="ha_dong" id="ha_dong" onchange="sortSelectedAdress()">
                                <p>Hà Đông</p>
                            </li>
                            <li>
                                <input type="checkbox" name="hai_ba_trung" id="hai_ba_trung" onchange="sortSelectedAdress()">
                                <p>Hai Bà Trưng</p>
                            </li>
                            <li>
                                <input type="checkbox" name="hoan_kiem" id="hoan_kiem" onchange="sortSelectedAdress()">
                                <p>Hoàn Kiếm</p>
                            </li>
                            <li>
                                <input type="checkbox" name="hoang_mai" id="hoang_mai" onchange="sortSelectedAdress()">
                                <p>Hoàng Mai</p>
                            </li>
                            <li>
                                <input type="checkbox" name="long_bien" id="long_bien" onchange="sortSelectedAdress()">
                                <p>Long Biên</p>
                            </li>
                            <li>
                                <input type="checkbox" name="nam_tu_liem" id="nam_tu_liem" onchange="sortSelectedAdress()">
                                <p>Nam Từ Liêm</p>
                            </li>
                            <li>
                                <input type="checkbox" name="tay_ho" id="tay_ho" onchange="sortSelectedAdress()">
                                <p>Tây Hồ</p>
                            </li>
                            <li>
                                <input type="checkbox" name="thanh_xuan" id="thanh_xuan" onchange="sortSelectedAdress()">
                                <p>Thanh Xuân</p>
                            </li>
                            <li>
                                <input type="checkbox" name="chuong_my" id="chuong_my" onchange="sortSelectedAdress()">
                                <p>Chương Mỹ</p>
                            </li>
                            <li>
                                <input type="checkbox" name="dan_phuong" id="dan_phuong" onchange="sortSelectedAdress()">
                                <p>Đan Phượng</p>
                            </li>
                            <li>
                                <input type="checkbox" name="dong_anh" id="dong_anh" onchange="sortSelectedAdress()">
                                <p>Đông Anh</p>
                            </li>
                            <li>
                                <input type="checkbox" name="gia_lam" id="gia_lam" onchange="sortSelectedAdress()">
                                <p>Gia Lâm</p>
                            </li>
                            <li>
                                <input type="checkbox" name="hoai_duc" id="hoai_duc" onchange="sortSelectedAdress()">
                                <p>Hoài Đức</p>
                            </li>
                            <li>
                                <input type="checkbox" name="me_linh" id="me_linh" onchange="sortSelectedAdress()">
                                <p>Mê Linh</p>
                            </li>
                            <li>
                                <input type="checkbox" name="my_duc" id="my_duc" onchange="sortSelectedAdress()">
                                <p>Mỹ Đức</p>
                            </li>
                            <li>
                                <input type="checkbox" name="phu_xuyen" id="phu_xuyen" onchange="sortSelectedAdress()">
                                <p>Phú Xuyên</p>
                            </li>
                            <li>
                                <input type="checkbox" name="phu_tho" id="phu_tho" onchange="sortSelectedAdress()">
                                <p>Phúc Thọ</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quoc_oai" id="quoc_oai" onchange="sortSelectedAdress()">
                                <p>Quốc Oai</p>
                            </li>
                            <li>
                                <input type="checkbox" name="soc_son" id="soc_son" onchange="sortSelectedAdress()">
                                <p>Sóc Sơn</p>
                            </li>
                            <li>
                                <input type="checkbox" name="thach_that" id="thach_that" onchange="sortSelectedAdress()">
                                <p>Thạch Thất</p>
                            </li>
                            <li>
                                <input type="checkbox" name="thanh_oai" id="thanh_oai" onchange="sortSelectedAdress()">
                                <p>Thanh Oai</p>
                            </li>
                            <li>
                                <input type="checkbox" name="thanh_tri" id="thanh_tri" onchange="sortSelectedAdress()">
                                <p>Thanh Trì</p>
                            </li>
                            <li>
                                <input type="checkbox" name="thuong_tin" id="thuong_tin" onchange="sortSelectedAdress()">
                                <p>Thường Tín</p>
                            </li>
                            <li>
                                <input type="checkbox" name="ung_hoa" id="ung_hoa" onchange="sortSelectedAdress()">
                                <p>Ứng Hòa</p>
                            </li>
                        </ul>

                    </div>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox" name="ho_chi_minh" id="ho_chi_minh" value="province_hcm" onchange="sortSelectedAdress()">
                        <p class="location-address">Thành Phố Hồ Chí Minh</p>
                        <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                    </li>
                    <div class="function-box1">
                        <ul>
                            <li>
                                <input type="checkbox" name="binh_chanh" id="binh_chanh" onchange="sortSelectedAdress()">
                                <p>Bình Chánh</p>
                            </li>
                            <li>
                                <input type="checkbox" name="binh_tan" id="binh_tan" onchange="sortSelectedAdress()">
                                <p>Bình Tân</p>
                            </li>
                            <li>
                                <input type="checkbox" name="binh_thanh" id="binh_thanh" onchange="sortSelectedAdress()">
                                <p>Bình Thạnh</p>
                            </li>
                            <li>
                                <input type="checkbox" name="can_gio" id="can_gio" onchange="sortSelectedAdress()">
                                <p>Cần Giờ</p>
                            </li>
                            <li>
                                <input type="checkbox" name="cu_chi" id="cu_chi" onchange="sortSelectedAdress()">
                                <p>Củ Chi</p>
                            </li>
                            <li>
                                <input type="checkbox" name="go_vap" id="go_vap" onchange="sortSelectedAdress()">
                                <p>Gò Vấp</p>
                            </li>
                            <li>
                                <input type="checkbox" name="hoc_mon" id="hoc_mon" onchange="sortSelectedAdress()">
                                <p>Hóc Môn</p>
                            </li>
                            <li>
                                <input type="checkbox" name="nha_be" id="nha_be" onchange="sortSelectedAdress()">
                                <p>Nhà Bè</p>
                            </li>
                            <li>
                                <input type="checkbox" name="phu_nhuan" id="phu_nhuan" onchange="sortSelectedAdress()">
                                <p>Phú Nhuận</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quan_1" id="quan_1" onchange="sortSelectedAdress()">
                                <p>Quận 1</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quan_10" id="quan_10" onchange="sortSelectedAdress()">
                                <p>Quận 10</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quan_11" id="quan_11" onchange="sortSelectedAdress()">
                                <p>Quận 11</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quan_12" id="quan_12" onchange="sortSelectedAdress()">
                                <p>Quận 12</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quan_2" id="quan_2" onchange="sortSelectedAdress()">
                                <p>Quận 2</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quan_3" id="quan_3" onchange="sortSelectedAdress()">
                                <p>Quận 3</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quan_4" id="quan_4" onchange="sortSelectedAdress()">
                                <p>Quận 4</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quan_5" id="quan_5" onchange="sortSelectedAdress()">
                                <p>Quận 5</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quan_6" id="quan_6" onchange="sortSelectedAdress()">
                                <p>Quận 6</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quan_7" id="quan_7" onchange="sortSelectedAdress()">
                                <p>Quận 7</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quan_8" id="quan_8" onchange="sortSelectedAdress()">
                                <p>Quận 8</p>
                            </li>
                            <li>
                                <input type="checkbox" name="quan_9" id="quan_9" onchange="sortSelectedAdress()">
                                <p>Quận 9</p>
                            </li>
                            <li>
                                <input type="checkbox" name="tan_binh" id="tan_binh" onchange="sortSelectedAdress()">
                                <p>Tân Bình</p>
                            </li>
                            <li>
                                <input type="checkbox" name="tan_phu" id="tan_phu" onchange="sortSelectedAdress()">
                                <p>Tân Phú</p>
                            </li>
                            <li>
                                <input type="checkbox" name="thu_duc" id="thu_duc" onchange="sortSelectedAdress()">
                                <p>Thủ Đức</p>
                            </li>
                        </ul>
                    </div>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox" name="binh_duong" id="binh_duong" value="province_binh_duong" onchange="sortSelectedAdress()">
                        <p class="location-address">Bình Dương</p>
                        <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                    </li>
                    <div class="function-box1">
                        <ul>
                            <li><input type="checkbox" name="bau_bang" id="bau_bang" onchange="sortSelectedAdress()">
                                <p>Bàu Bàng</p>
                            </li>
                            <li><input type="checkbox" name="bac_tan_uyen" id="bac_tan_uyen" onchange="sortSelectedAdress()">
                                <p>Bắc Tân Uyên</p>
                            </li>
                            <li><input type="checkbox" name="ben_cat" id="ben_cat" onchange="sortSelectedAdress()">
                                <p>Bến Cát</p>
                            </li>
                            <li><input type="checkbox" name="dau_tieng" id="dau_tieng" onchange="sortSelectedAdress()">
                                <p>Dầu Tiếng</p>
                            </li>
                            <li><input type="checkbox" name="di_an" id="di_an" onchange="sortSelectedAdress()">
                                <p>Dĩ An</p>
                            </li>
                            <li><input type="checkbox" name="phu_giao" id="phu_giao" onchange="sortSelectedAdress()">
                                <p>Phú Giáo</p>
                            </li>
                            <li><input type="checkbox" name="tan_uyen" id="tan_uyen" onchange="sortSelectedAdress()">
                                <p>Tân Uyên</p>
                            </li>
                            <li><input type="checkbox" name="thuan_an" id="thuan_an" onchange="sortSelectedAdress()">
                                <p>Thuận An</p>
                            </li>
                        </ul>
                    </div>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox" name="dong_nai" id="dong_nai" value="province_dong_nai" onchange="sortSelectedAdress()">
                        <p class="location-address">Đồng Nai</p>
                        <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                    </li>
                    <div class="function-box1">
                        <ul>
                            <li><input type="checkbox" name="bien_hoa" id="bien_hoa" onchange="sortSelectedAdress()">
                                <p>Biên Hòa</p>
                            </li>
                            <li><input type="checkbox" name="cam_my" id="cam_my" onchange="sortSelectedAdress()">
                                <p>Cẩm Mỹ</p>
                            </li>
                            <li><input type="checkbox" name="dinh_quan" id="dinh_quan" onchange="sortSelectedAdress()">
                                <p>Định Quán</p>
                            </li>
                            <li><input type="checkbox" name="long_khanh" id="long_khanh" onchange="sortSelectedAdress()">
                                <p>Long Khánh</p>
                            </li>
                            <li><input type="checkbox" name="long_thanh" id="long_thanh" onchange="sortSelectedAdress()">
                                <p>Long Thành</p>
                            </li>
                            <li><input type="checkbox" name="nhon_trach" id="nhon_trach" onchange="sortSelectedAdress()">
                                <p>Nhơn Trạch</p>
                            </li>
                            <li><input type="checkbox" name="tan_phu" id="tan_phu" onchange="sortSelectedAdress()">
                                <p>Tân Phú</p>
                            </li>
                            <li><input type="checkbox" name="thong_nhat" id="thong_nhat" onchange="sortSelectedAdress()">
                                <p>Thống Nhất</p>
                            </li>
                            <li><input type="checkbox" name="trang_bom" id="trang_bom" onchange="sortSelectedAdress()">
                                <p>Trảng Bom</p>
                            </li>
                            <li><input type="checkbox" name="vinh_cuu" id="vinh_cuu" onchange="sortSelectedAdress()">
                                <p>Vĩnh Cửu</p>
                            </li>
                            <li><input type="checkbox" name="xuan_loc" id="xuan_loc" onchange="sortSelectedAdress()">
                                <p>Xuân Lộc</p>
                            </li>
                        </ul>
                    </div>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox" name="bac_ninh" id="bac_ninh" value="province_bac_ninh" onchange="sortSelectedAdress()">
                        <p class="location-address">Bắc Ninh</p>
                        <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                    </li>
                    <div class="function-box1">
                        <ul>
                            <li>
                                <input type="checkbox" name="gia_binh" id="gia_binh" onchange="sortSelectedAdress()">
                                <p>Gia Bình</p>
                            </li>
                            <li>
                                <input type="checkbox" name="luong_tai" id="luong_tai" onchange="sortSelectedAdress()">
                                <p>Lương Tài</p>
                            </li>
                            <li>
                                <input type="checkbox" name="que_vo" id="que_vo" onchange="sortSelectedAdress()">
                                <p>Quế Võ</p>
                            </li>
                            <li>
                                <input type="checkbox" name="thuan_thanh" id="thuan_thanh" onchange="sortSelectedAdress()">
                                <p>Thuận Thành</p>
                            </li>
                            <li>
                                <input type="checkbox" name="tien_du" id="tien_du" onchange="sortSelectedAdress()">
                                <p>Tiên Du</p>
                            </li>
                            <li>
                                <input type="checkbox" name="tu_son" id="tu_son" onchange="sortSelectedAdress()">
                                <p>Từ Sơn</p>
                            </li>
                            <li>
                                <input type="checkbox" name="yen_phong" id="yen_phong" onchange="sortSelectedAdress()">
                                <p>Yên Phong</p>
                            </li>
                        </ul>
                    </div>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox" name="long_an" id="long_an" value="province_long_an" onchange="sortSelectedAdress()">
                        <p class="location-address">Long An</p>
                        <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                    </li>
                    <div class="function-box1">
                        <ul>
                            <li>
                                <input type="checkbox" name="ben_luc" id="ben_luc" onchange="sortSelectedAdress()">
                                <p>Bến Lức</p>
                            </li>
                            <li>
                                <input type="checkbox" name="can_duoc" id="can_duoc" onchange="sortSelectedAdress()">
                                <p>Cần Đước</p>
                            </li>
                            <li>
                                <input type="checkbox" name="can_giuoc" id="can_giuoc" onchange="sortSelectedAdress()">
                                <p>Cần Giuộc</p>
                            </li>
                            <li>
                                <input type="checkbox" name="chau_thanh" id="chau_thanh" onchange="sortSelectedAdress()">
                                <p>Châu Thành</p>
                            </li>
                            <li>
                                <input type="checkbox" name="duc_hoa" id="duc_hoa" onchange="sortSelectedAdress()">
                                <p>Đức Hòa</p>
                            </li>
                            <li>
                                <input type="checkbox" name="duc_hue" id="duc_hue" onchange="sortSelectedAdress()">
                                <p>Đức Huệ</p>
                            </li>
                            <li>
                                <input type="checkbox" name="moc_hoa" id="moc_hoa" onchange="sortSelectedAdress()">
                                <p>Mộc Hóa</p>
                            </li>
                            <li>
                                <input type="checkbox" name="tan_hung" id="tan_hung" onchange="sortSelectedAdress()">
                                <p>Tân Hưng</p>
                            </li>
                            <li>
                                <input type="checkbox" name="tan_thanh" id="tan_thanh" onchange="sortSelectedAdress()">
                                <p>Tân Thạnh</p>
                            </li>
                            <li>
                                <input type="checkbox" name="tan_tru" id="tan_tru" onchange="sortSelectedAdress()">
                                <p>Tân Trụ</p>
                            </li>
                            <li>
                                <input type="checkbox" name="thanh_hoa" id="thanh_hoa" onchange="sortSelectedAdress()">
                                <p>Thạnh Hóa</p>
                            </li>
                            <li>
                                <input type="checkbox" name="thu_thua" id="thu_thua" onchange="sortSelectedAdress()">
                                <p>Thủ Thừa</p>
                            </li>
                            <li>
                                <input type="checkbox" name="vinh_hung" id="vinh_hung" onchange="sortSelectedAdress()">
                                <p>Vĩnh Hưng</p>
                            </li>
                        </ul>
                    </div>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox" name="hai_duong" id="hai_duong" value="province_hai_duong" onchange="sortSelectedAdress()">
                        <p class="location-address">Hải Dương</p>
                        <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                    </li>
                    <div class="function-box1">
                        <ul>
                            <li>
                                <input type="checkbox" name="binh_giang" id="binh_giang" onchange="sortSelectedAdress()">
                                <p>Bình Giang</p>
                            </li>
                            <li>
                                <input type="checkbox" name="cam_giang" id="cam_giang" onchange="sortSelectedAdress()">
                                <p>Cẩm Giàng</p>
                            </li>
                            <li>
                                <input type="checkbox" name="chi_linh" id="chi_linh" onchange="sortSelectedAdress()">
                                <p>Chí Linh</p>
                            </li>
                            <li>
                                <input type="checkbox" name="gia_loc" id="gia_loc" onchange="sortSelectedAdress()">
                                <p>Gia Lộc</p>
                            </li>
                            <li>
                                <input type="checkbox" name="kim_thanh" id="kim_thanh" onchange="sortSelectedAdress()">
                                <p>Kim Thành</p>
                            </li>
                            <li>
                                <input type="checkbox" name="kinh_mon" id="kinh_mon" onchange="sortSelectedAdress()">
                                <p>Kinh Môn</p>
                            </li>
                            <li>
                                <input type="checkbox" name="nam_sach" id="nam_sach" onchange="sortSelectedAdress()">
                                <p>Nam Sách</p>
                            </li>
                            <li>
                                <input type="checkbox" name="thanh_ha" id="thanh_ha" onchange="sortSelectedAdress()">
                                <p>Thanh Hà</p>
                            </li>
                            <li>
                                <input type="checkbox" name="thanh_mien" id="thanh_mien" onchange="sortSelectedAdress()">
                                <p>Thanh Miện</p>
                            </li>
                            <li>
                                <input type="checkbox" name="tu_ky" id="tu_ky" onchange="sortSelectedAdress()">
                                <p>Tứ Kỳ</p>
                            </li>
                        </ul>
                    </div>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox" name="khanh_hoa" id="khanh_hoa" value="province_khanh_hoa" onchange="sortSelectedAdress()">
                        <p class="location-address">Khánh Hòa</p>
                        <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                    </li>
                    <div class="function-box1">
                        <ul>
                            <li>
                                <input type="checkbox" name="cam_lam" id="cam_lam" onchange="sortSelectedAdress()">
                                <p>Cam Lâm</p>
                            </li>
                            <li>
                                <input type="checkbox" name="cam_ranh" id="cam_ranh" onchange="sortSelectedAdress()">
                                <p>Cam Ranh</p>
                            </li>
                            <li>
                                <input type="checkbox" name="dien_khanh" id="dien_khanh" onchange="sortSelectedAdress()">
                                <p>Diên Khánh</p>
                            </li>
                            <li>
                                <input type="checkbox" name="khanh_son" id="khanh_son" onchange="sortSelectedAdress()">
                                <p>Khánh Sơn</p>
                            </li>
                            <li>
                                <input type="checkbox" name="khanh_vinh" id="khanh_vinh" onchange="sortSelectedAdress()">
                                <p>Khánh Vĩnh</p>
                            </li>
                            <li>
                                <input type="checkbox" name="ninh_hoa" id="ninh_hoa" onchange="sortSelectedAdress()">
                                <p>Ninh Hòa</p>
                            </li>
                            <li>
                                <input type="checkbox" name="truong_sa" id="truong_sa" onchange="sortSelectedAdress()">
                                <p>Trường Sa</p>
                            </li>
                            <li>
                                <input type="checkbox" name="van_ninh" id="van_ninh" onchange="sortSelectedAdress()">
                                <p>Vạn Ninh</p>
                            </li>
                        </ul>
                    </div>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox" name="da_nang" id="da_nang" value="province_da_nang" onchange="sortSelectedAdress()">
                        <p class="location-address">Đà Nẵng</p>
                        <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                    </li>
                    <div class="function-box1">
                        <ul>
                            <li>
                                <input type="checkbox" name="cam_le" id="cam_le" onchange="sortSelectedAdress()">
                                <p>Cẩm Lệ</p>
                            </li>
                            <li>
                                <input type="checkbox" name="hoa_vang" id="hoa_vang" onchange="sortSelectedAdress()">
                                <p>Hòa Vang</p>
                            </li>
                            <li>
                                <input type="checkbox" name="lien_chieu" id="lien_chieu" onchange="sortSelectedAdress()">
                                <p>Liên Chiểu</p>
                            </li>
                            <li>
                                <input type="checkbox" name="ngu_hanh_son" id="ngu_hanh_son" onchange="sortSelectedAdress()">
                                <p>Ngũ Hành Sơn</p>
                            </li>
                            <li>
                                <input type="checkbox" name="son_tra" id="son_tra" onchange="sortSelectedAdress()">
                                <p>Sơn Trà</p>
                            </li>
                        </ul>
                    </div>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox" name="hai_phong" id="hai_phong" value="province_hai_phong" onchange="sortSelectedAdress()">
                        <p class="location-address">Hải Phòng</p>
                        <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                    </li>
                    <div class="function-box1">
                        <ul>
                            <li>
                                <input type="checkbox" name="an_duong" id="an_duong" onchange="sortSelectedAdress()">
                                <p>An Dương</p>
                            </li>
                            <li>
                                <input type="checkbox" name="an_lao" id="an_lao" onchange="sortSelectedAdress()">
                                <p>An Lão</p>
                            </li>
                            <li>
                                <input type="checkbox" name="bach_long_vi" id="bach_long_vi" onchange="sortSelectedAdress()">
                                <p>Bạch Long Vĩ</p>
                            </li>
                            <li>
                                <input type="checkbox" name="cat_hai" id="cat_hai" onchange="sortSelectedAdress()">
                                <p>Cát Hải</p>
                            </li>
                            <li>
                                <input type="checkbox" name="kien_thuy" id="kien_thuy" onchange="sortSelectedAdress()">
                                <p>Kiến Thụy</p>
                            </li>
                            <li>
                                <input type="checkbox" name="thuy_nguyen" id="thuy_nguyen" onchange="sortSelectedAdress()">
                                <p>Thủy Nguyên</p>
                            </li>
                            <li>
                                <input type="checkbox" name="tien_lang" id="tien_lang" onchange="sortSelectedAdress()">
                                <p>Tiên Lãng</p>
                            </li>
                            <li>
                                <input type="checkbox" name="vinh_bao" id="vinh_bao" onchange="sortSelectedAdress()">
                                <p>Vĩnh Bảo</p>
                            </li>
                        </ul>
                    </div>
                </ul>

            </div>
        </div>
    </div>
    <script>
        // Function to handle checkbox selection and update URL
        function sortSelectedAdress() {
            var selectedAdress = [];
            var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            checkboxes.forEach(function(checkbox) {
                selectedAdress.push(checkbox.name);
            });
            var selectedAdressString = selectedAdress.join(",");
            // Check if selectedAdressString is empty
            if (selectedAdressString === "") {
                window.location.href = "index.php"; // Redirect to all_cars.php if no adres is selected
            } else {
                window.location.href = "index.php?select=" + selectedAdressString; // Redirect to index.php with selected Adress
            }
        }

        // Function to retain selected checkboxes on page load
        function retainSelections() {
            var urlParams = new URLSearchParams(window.location.search);
            var selectedAdress = urlParams.get('select');
            if (selectedAdress) {
                selectedAdress.split(',').forEach(function(adres) {
                    var checkbox = document.getElementById(adres);
                    if (checkbox) {
                        checkbox.checked = true;
                    }
                });
            }
        }

        // Execute retainSelections on page load
        window.onload = retainSelections;
    </script>