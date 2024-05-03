<div class="list-function">
    <h4>BỘ LỌC</h4>
    <div class="function-all">
        <div class="function-div">
            <div class="flex-function" onclick="functionClick(this)">
                <div class="fn-sp">
                    <img src="../assets/images/fn1.svg" alt="">
                    <p style="color: #31406f;">HÃNG XE, DÒNG XE</p>
                </div>
                <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
            </div>
            <div class="function-nav">
                <div class="function-search" tabindex="0">
                    <div class="fn-box">
                        <i class='bx bx-search'></i>
                        <input type="text" placeholder="Tìm kiếm theo hãng xe">
                    </div>
                </div>

                <div class="function-box">
                    <ul>
                        <li>
                            <input type="checkbox" name="" id="">
                            <p>Acura</p>
                            <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                        </li>
                        <div class="function-box1">
                            <ul>
                                <li>
                                    <input type="checkbox" name="" id="">
                                    <p>Acura Mdx</p>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
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
                            <input type="checkbox" name="" id="">
                            <p>Hà Nội</p>
                            <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                        </li>
                        <div class="function-box1">
                            <ul>
                                <li>
                                    <input type="checkbox" name="" id="">
                                    <p>Ba Đình</p>
                                </li>

                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="function-div">
            <div class="flex-function" onclick="functionClick(this)">
                <div class="fn-sp">
                    <img src="../assets/images/fn3.svg" alt="">
                    <p style="color: #31406f;">GIÁ</p>
                </div>
                <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
            </div>
            <div class="function-nav">
                <input type="range" min="400" max="5000" value="0" class="price-slider" id="priceRange">
                <div class="flex-price">
                    <p>Tối Thiểu: </p>
                    <p>Tối Đa:</p>
                </div>
                <div id="flex-price">
                    <span>
                        <p>400tr</p>
                    </span>
                    <span>
                        <p><span id="priceValue"></span></p>
                    </span>
                </div>
                <p class="suggest">
                    Gợi ý
                </p>
                <div class="option">
                    <button>
                        <p>Dưới 500tr</p>
                    </button>
                    <button>
                        <p>500tr - 700tr</p>
                    </button>
                    <button>
                        <p>700tr - 1 tỷ</p>
                    </button>
                    <button>
                        <p>Trên 1 tỷ</p>
                    </button>
                </div>
            </div>
        </div>
        <script>
            var priceSlider = document.getElementById("priceRange");
            var priceValue = document.getElementById("priceValue");

            // Hiển thị giá trị ban đầu của thanh kéo
            priceValue.innerHTML = priceSlider.value + "TR";

            // Cập nhật giá trị khi người dùng di chuyển thanh kéo
            priceSlider.oninput = function() {
                var value = parseInt(this.value); // Chuyển đổi giá trị sang số nguyên
                var displayValue; // Biến để lưu giá trị hiển thị

                if (value >= 1000) { // Nếu giá trị vượt quá 1000, đổi sang đơn vị tỷ
                    displayValue = value / 1000;
                    if (displayValue % 1 === 0) { // Kiểm tra xem có phải là số nguyên không
                        priceValue.innerHTML = displayValue + " tỷ";
                    } else {
                        priceValue.innerHTML = displayValue.toFixed(1) + " tỷ"; // Làm tròn đến 1 chữ số thập phân
                    }
                } else { // Nếu giá trị nhỏ hơn 1000, sử dụng đơn vị triệu
                    priceValue.innerHTML = value + " Triệu";
                }
            };
        </script>
        <div class="function-div">
            <div class="flex-function" onclick="functionClick(this)">
                <div class="fn-sp">
                    <img src="../assets/images/fn4.svg" alt="">
                    <p style="color: #31406f;">NGÀY SẢN XUẤT</p>
                </div>
                <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
            </div>
            <div class="function-nav">

                <div id="flex-year">
                    <input type="range" id="yearRange" class="yearRange" min="2000" max="2024" value="2000">
                </div>
                <div class="flex-year">
                    <p>Tối Thiểu: </p>
                    <p>Tối Đa:</p>
                </div>
                <div id="flex-year">
                    <span>
                        <p><span id="selectedYear"></span></p>
                    </span>
                    <span>
                        <p>2024</p>
                    </span>
                </div>

            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var yearRange = document.getElementById("yearRange");
                var selectedYear = document.getElementById("selectedYear");

                // Function to update selected year
                function updateSelectedYear() {
                    selectedYear.textContent = yearRange.value;
                }

                // Initial call to update selected year when page loads
                updateSelectedYear();

                // Event listener to update selected year when slider value changes
                yearRange.addEventListener("input", updateSelectedYear);
            });
        </script>
        <div class="function-div">
            <div class="flex-function" onclick="functionClick(this)">
                <div class="fn-sp">
                    <img src="../assets/images/fn5.svg" alt="">
                    <p style="color: #31406f;">SỐ KM</p>
                </div>
                <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
            </div>
            <div class="function-nav">

                <div id="flex-mileage">
                    <input type="range" id="mileage" class="mileage" min="0" max="500000" value="0">
                </div>
                <div class="flex-mileage">
                    <p>Tối Thiểu: </p>
                    <p>Tối Đa: </p>
                </div>
                <div id="flex-mileage">
                    <span>
                        <p><span id="mileageRange"></span> KM</p>
                    </span>
                    <span>
                        <p>500,000 KM</p>
                    </span>
                </div>
            </div>
        </div>
        <script>
            var slider = document.getElementById("mileage");
            var output = document.getElementById("mileageRange");
            output.innerHTML = numberWithCommas(slider.value);

            slider.oninput = function() {
                output.innerHTML = numberWithCommas(this.value);
            }

            // Hàm định dạng số với dấu phẩy
            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        </script>
        <div class="function-div">
            <div class="flex-function" onclick="functionClick(this)">
                <div class="fn-sp">
                    <img src="../assets/images/fn6.svg" alt="">
                    <p style="color: #31406f;">KIỂU DÁNG</p>

                </div> <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
            </div>
            <div class="function-nav">
                <div class="warp">
                    <div class="designs">
                        <img src="../assets/images/kieuxe1.webp" alt="">
                        <p>Coupe</p>
                        <input type="checkbox">
                    </div>
                    <div class="designs">
                        <img src="../assets/images/kieuxe2.webp" alt="">
                        <p>Wagon</p>
                        <input type="checkbox">
                    </div>
                    <div class="designs">
                        <img src="../assets/images/kieuxe3.webp" alt="">
                        <p>Minivan</p>
                        <input type="checkbox">
                    </div>
                    <div class="designs">
                        <img src="../assets/images/kieuxe4.webp" alt="">
                        <p>Pick-up</p>
                        <input type="checkbox">
                    </div>
                    <div class="designs">
                        <img src="../assets/images/kieuxe5.webp" alt="">
                        <p>Hatchback</p>
                        <input type="checkbox">
                    </div>
                    <div class="designs">
                        <img src="../assets/images/kieuxe6.webp" alt="">
                        <p>MPV</p>
                        <input type="checkbox">
                    </div>
                    <div class="designs">
                        <img src="../assets/images/kieuxe7.webp" alt="">
                        <p>SUV</p>
                        <input type="checkbox">
                    </div>
                    <div class="designs">
                        <img src="../assets/images/kieuxe8.webp" alt="">
                        <p>Sedan</p>
                        <input type="checkbox">
                    </div>
                </div>
            </div>
        </div>
        <div class="function-div">
            <div class="flex-function" onclick="functionClick(this)">
                <div class="fn-sp">
                    <img src="../assets/images/fn7.svg" alt="">
                    <p style="color: #31406f;">NHIÊN LIỆU</p>

                </div> <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
            </div>
            <div class="function-nav">
                <div class="fuel">
                    <input type="checkbox" name="" id="">
                    <p class="name-fuel">Xăng</p>
                </div>
                <div class="fuel">
                    <input type="checkbox" name="" id="">
                    <p class="name-fuel">Dầu</p>
                </div>
                <div class="fuel">
                    <input type="checkbox" name="" id="">
                    <p class="name-fuel">Điện</p>
                </div>
                <div class="fuel">
                    <input type="checkbox" name="" id="">
                    <p class="name-fuel">Gas</p>
                </div>

            </div>
        </div>
        <div class="function-div">
            <div class="flex-function" onclick="functionClick(this)">
                <div class="fn-sp">
                    <img src="../assets/images/fn8.svg" alt="">
                    <p style="color: #31406f;">HỘP SỐ</p>

                </div> <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
            </div>
            <div class="function-nav">
                <div class="gear">
                    <input type="checkbox" name="" id="">
                    <p class="name-gear">Số sàn</p>
                </div>
                <div class="gear">
                    <input type="checkbox" name="" id="">
                    <p class="name-gear">Số tự động</p>
                </div>
            </div>
        </div>
        <div class="function-div">
            <div class="flex-function" onclick="functionClick(this)">
                <div class="fn-sp">
                    <img src="../assets/images/fn9.svg" alt="">
                    <p style="color: #31406f;">MÀU SẮC</p>

                </div> <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
            </div>
            <div class="function-nav">
                <div class="color">
                    <div class="box-color">
                        <button class="hover-color black"></button>
                        <span class="hidden-text"> Đen</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color red"></button>
                        <span class="hidden-text"> Đỏ</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color yellow"></button>
                        <span class="hidden-text"> Vàng</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color white"></button>
                        <span class="hidden-text"> Trắng</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color brown"></button>
                        <span class="hidden-text"> Nâu</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color orange"></button>
                        <span class="hidden-text"> Cam</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color silver"></button>
                        <span class="hidden-text"> Bạc</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color grey"></button>
                        <span class="hidden-text"> Xám</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color yellow copper"></button>
                        <span class="hidden-text"> Vàng đồng</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color blue"></button>
                        <span class="hidden-text"> Xanh dương</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color green"></button>
                        <span class="hidden-text"> Xanh lá</span>
                    </div>

                    <div class="box-color">
                        <button class="hover-color Violet"></button>
                        <span class="hidden-text"> Tím</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color pink"></button>
                        <span class="hidden-text"> Hồng</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color copper"></button>
                        <span class="hidden-text"> Đồng</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color sand gold"></button>
                        <span class="hidden-text"> vàng cát</span>
                    </div>
                    <div class="box-color">
                        <button class="hover-color earthy orange"></button>
                        <span class="hidden-text"> Cam đất</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="function-div">
            <div class="flex-function" onclick="functionClick(this)">
                <div class="fn-sp">
                    <img src="../assets/images/fn10.svg" alt="">
                    <p style="color: #31406f;">CHỖ NGỒI</p>

                </div> <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
            </div>
            <div class="function-nav">
                <div class="place">
                    <input type="checkbox" name="" id="">
                    <p class="name-place">4</p>
                </div>
                <div class="place">
                    <input type="checkbox" name="" id="">
                    <p class="name-place">5</p>
                </div>
                <div class="place">
                    <input type="checkbox" name="" id="">
                    <p class="name-place">6</p>
                </div>
                <div class="place">
                    <input type="checkbox" name="" id="">
                    <p class="name-place">7</p>
                </div>
                <div class="place">
                    <input type="checkbox" name="" id="">
                    <p class="name-place">8</p>
                </div>
                <div class="place">
                    <input type="checkbox" name="" id="">
                    <p class="name-place">9</p>
                </div>
            </div>
        </div>
        <div class="function-div">
            <div class="flex-function" onclick="functionClick(this)">
                <div class="fn-sp">
                    <img src="../assets/images/fn11.svg" alt="">
                    <p style="color: #31406f;">ĐĂNG BỞI</p>
                </div> <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
            </div>
            <div class="function-nav">
                <div class="post-user">
                    <input type="checkbox" name="" id="">
                    <p class="name-post">
                        Cá nhân
                    </p>
                </div>
                <div class="post-user">
                    <input type="checkbox" name="" id="">
                    <p class="name-post">
                        Đối tác Carbuydi
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function functionClick(element) {
        var functionNav = element.nextElementSibling;
        toggleDisplay(functionNav);
    }

    function functionClick1(element) {
        var functionBox = element.parentElement.nextElementSibling;
        toggleDisplay(functionBox);
    }


    function toggleDisplay(element) {
        if (window.getComputedStyle(element).display === "block") {
            element.style.display = "none";
        } else {
            element.style.display = "block";
        }
    }
</script>