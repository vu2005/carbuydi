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