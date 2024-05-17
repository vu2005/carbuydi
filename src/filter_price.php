<div class="function-div">
    <div class="flex-function" onclick="functionClick(this)">
        <div class="fn-sp">
            <img src="../assets/images/fn3.svg" alt="">
            <p style="color: #31406f;">GIÁ</p>
        </div>
        <i class='bx bx-chevron-down'></i>
    </div>
    <div class="function-nav">
        <input type="range" min="400000000" name="sorting" max="5000000000" value="400000000" class="price-slider" id="priceRange">
        <input type="hidden" name="sliding_price" id="slidingPrice" value="400000000">
        <div class="flex-price">
            <p>Tối Thiểu: </p>
            <p>Tối Đa:</p>
        </div>
        <div id="flex-price">
            <span id="priceValue">400 Tr</span>
            <span>
                <p>5 tỷ</p>
            </span>
        </div>
        <p class="suggest">Gợi ý</p>
        <div class="option">
            <button name="sorting" value="under_500" onclick="setPriceFilter('under_500')">Dưới 500tr</button>
            <button name="sorting" value="500_to_700" onclick="setPriceFilter('500_to_700')">500tr - 700tr</button>
            <button name="sorting" value="700_to_1000" onclick="setPriceFilter('700_to_1000')">700tr - 1 tỷ</button>
            <button name="sorting" value="above_1b" onclick="setPriceFilter('above_1b')">Trên 1 tỷ</button>

        </div>
    </div>
</div>
<script>
        function formatPrice(price) {
            if (price >= 1000000000) {
                return (price / 1000000000).toFixed(1) + " Tỷ";
            } else {
                return (price / 1000000).toFixed(0) + " Tr";
            }
        }

        function updatePriceValue() {
            var slider = document.getElementById("priceRange");
            var output = document.getElementById("priceValue");
            output.innerHTML = formatPrice(parseInt(slider.value));
            document.getElementById("slidingPrice").value = slider.value;
        }

        function setPriceFilter(priceRange) {
            window.location.href = "index.php?price=" + priceRange;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var slider = document.getElementById("priceRange");
            slider.addEventListener("mouseup", function() {
                setTimeout(function() {
                    var slidingPrice = slider.value;
                    window.location.href = "index.php?price=" + slidingPrice;
                }, 2000); // 2000 milliseconds = 2 seconds
            });
            slider.addEventListener("input", function() {
                updatePriceValue();
            });

            updatePriceValue(); // Initialize the price value on load
        });
    </script>