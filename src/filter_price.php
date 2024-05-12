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
            <span id="priceValue"></span>
            <span>
                <p>5 tỷ</p>
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