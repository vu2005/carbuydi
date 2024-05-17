<form action="filter.php" method="POST">
    <div class="function-div">
        <div class="flex-function" onclick="functionClick(this)">
            <div class="fn-sp">
                <img src="../assets/images/fn3.svg" alt="">
                <p style="color: #31406f;">GIÁ</p>
            </div>
            <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
        </div>
        <div class="function-nav">
            <input type="range" min="400" name="sliding_price" max="5000" value="0" class="price-slider" id="priceRange">
            <input type="hidden" name="sorting" value=""> <!-- Dùng hidden input để lưu giá trị sorting -->
            <div class="flex-price">
                <p>Tối Thiểu: </p>
                <p>Tối Đa:</p>
            </div>
            <div id="flex-price">
                <span id="priceValue"></span>
                <span>
                    <p>5 tỷ</p>
                </span>
            </div>
            <p class="suggest">
                Gợi ý
            </p>
            <div class="option">
                <label>
                    <input type="radio" name="sorting" value="under_500"> Dưới 500tr
                </label>
                <label>
                    <input type="radio" name="sorting" value="500_to_700"> 500tr - 700tr
                </label>
                <label>
                    <input type="radio" name="sorting" value="700_to_1000"> 700tr - 1 tỷ
                </label>
                <label>
                    <input type="radio" name="sorting" value="above_1b"> Trên 1 tỷ
                </label>
            </div>
            <button type="submit">Lọc Giá</button>
        </div>
    </div>
</form>

<!-- Thêm mã JavaScript sau form -->
<script>
    var priceSlider = document.getElementById("priceRange");
    var priceValue = document.getElementById("priceValue");

    // Hiển thị giá trị ban đầu của thanh trượt
    priceValue.innerHTML = priceSlider.value + "TR";

    // Cập nhật giá trị khi người dùng di chuyển thanh trượt
    function updatePriceValue() {
        var value = parseInt(priceSlider.value); // Chuyển đổi giá trị sang số nguyên
        var displayValue; // Biến để lưu giá trị hiển thị

        // Cập nhật giá trị cho input hidden
        document.getElementById("slidingPrice").value = value;

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
    }

    // Gán sự kiện oninput cho priceSlider
    priceSlider.oninput = function() {
        updatePriceValue(); // Gọi hàm updatePriceValue
    };

    // Gọi hàm updatePriceValue để cập nhật giá trị khi trang được tải
    updatePriceValue();
</script>