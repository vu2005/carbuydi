<div class="function-div">
    <div class="flex-function" onclick="functionClick(this)">
        <div class="fn-sp">
            <img src="../assets/images/fn11.svg" alt="">
            <p style="color: #31406f;">ĐĂNG BỞI</p>
        </div> <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
    </div>
    <div class="function-nav">
        <div class="post-user">
            <input type="checkbox" name="ca_nhan" id="ca_nhan" onchange="sortSelectedPosted()">
            <p class="name-post">
                Cá nhân
            </p>
        </div>
        <div class="post-user">
            <input type="checkbox" name="doi_tac" id="doi_tac" onchange="sortSelectedPosted()">
            <p class="name-post">
                Carbuydi
            </p>
        </div>
    </div>
</div>
<script>
    function sortSelectedPosted() {
        var selectedPosted = [];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(function(checkbox) {
            selectedPosted.push(checkbox.name);
        });
        var selectedPostedString = selectedPosted.join(",");
        // Check if selectedPostedString is empty
        if(selectedPostedString === "") {
            window.location.href = "index.php"; // Redirect to all_cars.php if no seats is selected
        } else {
            window.location.href = "index.php?select=" + selectedPostedString; // Redirect to index.php with selected makes
        }
    }
    function retainSelections() {
        var urlParams = new URLSearchParams(window.location.search);
        var selectedPosted = urlParams.get('select');
        if (selectedPosted) {
            selectedPosted.split(',').forEach(function(seats) {
                var checkbox = document.getElementById(seats);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        }
    }
    window.onload = retainSelections;
</script>