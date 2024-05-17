<div class="function-div">
    <div class="flex-function" onclick="functionClick(this)">
        <div class="fn-sp">
            <img src="../assets/images/fn8.svg" alt="">
            <p style="color: #31406f;">HỘP SỐ</p>

        </div> <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
    </div>
    <div class="function-nav">
        <div class="gear">
            <input type="checkbox" name="so_san" id="so_san" onchange="sortSelectedTransmission()">
            <p class="name-gear">Số sàn</p>
        </div>
        <div class="gear">
            <input type="checkbox" name="so_tu_dong" id="so_tu_dong"onchange="sortSelectedTransmission()">
            <p class="name-gear">Số tự động</p>
        </div>
    </div>
</div>
<script>
    // Function to handle checkbox selection and update URL
    function sortSelectedTransmission() {
        var selectedTransmission = [];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(function(checkbox) {
            selectedTransmission.push(checkbox.name);
        });
        var selectTransmission = selectedTransmission.join(",");
        // Check if selectTransmission is empty
        if(selectTransmission === "") {
            window.location.href = "index.php"; // Redirect to all_cars.php if no transmission is selected
        } else {
            window.location.href = "index.php?select=" + selectTransmission; // Redirect to index.php with selected makes
        }
    }
    function retainSelections() {
        var urlParams = new URLSearchParams(window.location.search);
        var selectedTransmission = urlParams.get('select');
        if (selectedTransmission) {
            selectedTransmission.split(',').forEach(function(transmission) {
                var checkbox = document.getElementById(transmission);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        }
    }
    window.onload = retainSelections;
</script>