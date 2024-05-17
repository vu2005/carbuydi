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
            <input type="hidden" name="sliding_mileage" id="slidingMileage" value="0">

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
document.addEventListener("DOMContentLoaded", function () {
    // Lấy các phần tử DOM cần thiết
    const mileageRange = document.getElementById("mileage");
    const mileageDisplay = document.getElementById("mileageRange");
    const slidingMileage = document.getElementById("slidingMileage");

    // Cập nhật giá trị số KM được chọn khi trang được tải lại
    updateMileageDisplay(mileageRange, mileageDisplay, slidingMileage);

    // Cập nhật giá trị số KM được chọn khi thanh trượt được kéo
    mileageRange.addEventListener("input", function () {
        updateMileageDisplay(mileageRange, mileageDisplay, slidingMileage);
    });
});

function updateMileageDisplay(rangeElement, displayElement, hiddenInputElement) {
    const value = Number(rangeElement.value);
    displayElement.textContent = value.toLocaleString('en-US'); // Sử dụng 'en-US' để sử dụng định dạng số tiêu chuẩn của tiếng Anh
    hiddenInputElement.value = value;
}

// Xử lý sự kiện khi người dùng kết thúc kéo thanh trượt
document.getElementById("mileage").addEventListener("mouseup", function () {
    setTimeout(function () {
        var slidingMileageValue = document.getElementById("mileage").value;
        window.location.href = "index.php?mileage=" + slidingMileageValue;
    }, 2000); // 2000 milliseconds = 2 seconds
});


</script>