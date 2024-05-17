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
                <input type="checkbox" name="Coupe" id="Coupe" onchange="sortSelectedStyle()">
            </div>
            <div class="designs">
                <img src="../assets/images/kieuxe2.webp" alt="">
                <p>Wagon</p>
                <input type="checkbox" name="Wagon" id="Wagon" onchange="sortSelectedStyle()">
            </div>
            <div class="designs">
                <img src="../assets/images/kieuxe3.webp" alt="">
                <p>Minivan</p>
                <input type="checkbox" name="Minivan" id="Minivan" onchange="sortSelectedStyle()">
            </div>
            <div class="designs">
                <img src="../assets/images/kieuxe4.webp" alt="">
                <p>Pick-up</p>
                <input type="checkbox" name="Pick-up" id="Pick-up" onchange="sortSelectedStyle()">
            </div>
            <div class="designs">
                <img src="../assets/images/kieuxe5.webp" alt="">
                <p>Hatchback</p>
                <input type="checkbox" name="Hatchback" id="Hatchback" onchange="sortSelectedStyle()">
            </div>
            <div class="designs">
                <img src="../assets/images/kieuxe6.webp" alt="">
                <p>MPV</p>
                <input type="checkbox" name="MPV" id="MPV" onchange="sortSelectedStyle()">
            </div>
            <div class="designs">
                <img src="../assets/images/kieuxe7.webp" alt="">
                <p>SUV</p>
                <input type="checkbox" name="SUV" id="SUV" onchange="sortSelectedStyle()">
            </div>
            <div class="designs">
                <img src="../assets/images/kieuxe8.webp" alt="">
                <p>Sedan</p>
                <input type="checkbox" name="Sedan" id="Sedan" onchange="sortSelectedStyle()">
            </div>
        </div>
    </div>
</div>
<script>
    // Function to handle checkbox selection and update URL
    function sortSelectedStyle() {
        var selectedStyle = [];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(function(checkbox) {
            selectedStyle.push(checkbox.name);
        });
        var selectedStyleString = selectedStyle.join(",");
        // Check if selectedStyleString is empty
        if(selectedStyleString === "") {
            window.location.href = "index.php"; // Redirect to all_cars.php if no make is selected
        } else {
            window.location.href = "index.php?select=" + selectedStyleString; // Redirect to index.php with selected makes
        }
    }
    function retainSelections() {
        var urlParams = new URLSearchParams(window.location.search);
        var selectedStyle = urlParams.get('select');
        if (selectedStyle) {
            selectedStyle.split(',').forEach(function(style) {
                var checkbox = document.getElementById(style);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        }
    }
    window.onload = retainSelections;
</script>