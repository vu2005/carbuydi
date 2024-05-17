<div class="function-div">
    <div class="flex-function" onclick="functionClick(this)">
        <div class="fn-sp">
            <img src="../assets/images/fn4.svg" alt="">
            <p style="color: #31406f;">NĂM SẢN XUẤT</p>
        </div>
        <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
    </div>
    <div class="function-nav">

        <div id="flex-year">
            <input type="range" id="yearRange" class="yearRange" min="2000" max="2024" value="2000">
            <input type="hidden" name="sliding_year" id="slidingYear" value="2000">

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
    document.addEventListener("DOMContentLoaded", function () {
        // Lấy các phần tử DOM cần thiết
        const yearRange = document.getElementById("yearRange");
        const selectedYear = document.getElementById("selectedYear");
        const slidingYear = document.getElementById("slidingYear");

        // Cập nhật giá trị năm được chọn khi trang được tải lại
        selectedYear.textContent = yearRange.value;
        slidingYear.value = yearRange.value;

        // Cập nhật giá trị năm được chọn khi thanh trượt được kéo
        yearRange.addEventListener("input", function () {
            selectedYear.textContent = this.value;
            slidingYear.value = this.value;
        });
    });
    document
        .getElementById("yearRange")
        .addEventListener("mouseup", function () {
            setTimeout(function () {
                var slidingPrice = document.getElementById("yearRange").value;
                window.location.href = "index.php?year=" + slidingPrice;
            }, 2000); // 2000 milliseconds = 2 seconds
        });
</script>
