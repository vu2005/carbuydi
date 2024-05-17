<div class="function-div">
    <div class="flex-function" onclick="functionClick(this)">
        <div class="fn-sp">
            <img src="../assets/images/fn7.svg" alt="">
            <p style="color: #31406f;">NHIÊN LIỆU</p>

        </div> <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
    </div>
    <div class="function-nav">
        <div class="fuel">
            <input type="checkbox" name="xang" id="xang" onchange="sortSelectedFuels()">
            <p class="name-fuel">Xăng</p>
        </div>
        <div class="fuel">
            <input type="checkbox" name="dau" id="dau" onchange="sortSelectedFuels()">
            <p class="name-fuel">Dầu</p>
        </div>
        <div class="fuel">
            <input type="checkbox" name="dien" id="dien" onchange="sortSelectedFuels()">
            <p class="name-fuel">Điện</p>
        </div>
        <div class="fuel">
            <input type="checkbox" name="gas" id="gas" onchange="sortSelectedFuels()">
            <p class="name-fuel">Gas</p>
        </div>

    </div>
</div>
<script>
    // Function to handle checkbox selection and update URL
    function sortSelectedFuels() {
        var selectedFuels = [];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(function(checkbox) {
            selectedFuels.push(checkbox.name);
        });
        var selectedFuelsString = selectedFuels.join(",");
        // Check if selectedFuelsString is empty
        if(selectedFuelsString === "") {
            window.location.href = "index.php"; // Redirect to all_cars.php if no fuels is selected
        } else {
            window.location.href = "index.php?select=" + selectedFuelsString; // Redirect to index.php with selected makes
        }
    }
    function retainSelections() {
        var urlParams = new URLSearchParams(window.location.search);
        var selectedFuels = urlParams.get('select');
        if (selectedFuels) {
            selectedFuels.split(',').forEach(function(fuels) {
                var checkbox = document.getElementById(fuels);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        }
    }
    window.onload = retainSelections;
</script>