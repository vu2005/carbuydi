<div class="function-div">
    <div class="flex-function" onclick="functionClick(this)">
        <div class="fn-sp">
            <img src="../assets/images/fn10.svg" alt="">
            <p style="color: #31406f;">CHỖ NGỒI</p>

        </div> <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
    </div>
    <div class="function-nav">
        <div class="place">
            <input type="checkbox" name="seats_4" id="seats_4" onchange="sortSelectedSeats()">
            <p class="name-place">4</p>
        </div>
        <div class="place">
            <input type="checkbox" name="seats_5" id="seats_5" onchange="sortSelectedSeats()">
            <p class="name-place">5</p>
        </div>
        <div class="place">
            <input type="checkbox" name="seats_6" id="seats_6" onchange="sortSelectedSeats()">
            <p class="name-place">6</p>
        </div>
        <div class="place">
            <input type="checkbox" name="seats_7" id="seats_7" onchange="sortSelectedSeats()">
            <p class="name-place">7</p>
        </div>
        <div class="place">
            <input type="checkbox" name="seats_8" id="seats_8" onchange="sortSelectedSeats()">
            <p class="name-place">8</p>
        </div>
        <div class="place">
            <input type="checkbox" name="seats_9" id="seats_9" onchange="sortSelectedSeats()">
            <p class="name-place">9</p>
        </div>
    </div>
</div>
<script>
    // Function to handle checkbox selection and update URL
    function sortSelectedSeats() {
        var selectedSeats = [];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(function(checkbox) {
            selectedSeats.push(checkbox.name);
        });
        var selectedSeatsString = selectedSeats.join(",");
        // Check if selectedSeatsString is empty
        if(selectedSeatsString === "") {
            window.location.href = "index.php"; // Redirect to all_cars.php if no seats is selected
        } else {
            window.location.href = "index.php?select=" + selectedSeatsString; // Redirect to index.php with selected makes
        }
    }
    function retainSelections() {
        var urlParams = new URLSearchParams(window.location.search);
        var selectedSeats = urlParams.get('select');
        if (selectedSeats) {
            selectedSeats.split(',').forEach(function(seats) {
                var checkbox = document.getElementById(seats);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        }
    }
    window.onload = retainSelections;
</script>