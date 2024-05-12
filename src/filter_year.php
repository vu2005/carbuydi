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