<div class="function-admin">
    <div class="admin-siderbar">
        <div class="carousel-container">
            <div class="carousel" id="slider">
                <div class="carousel-item">
                    <img src="../assets/images/admin.jpeg" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="../assets/images/admin1.jpeg" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="../assets/images/admin2.jpeg" alt="Slide 3">
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once("statistic.php");

    ?>
</div>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log("DOM loaded");
        document.querySelector('.next').addEventListener('click', function() {
            console.log("Next button clicked");
            document.querySelector('.carousel-container').scrollBy({
                top: 460,
                behavior: 'smooth'
            });
        });

        document.querySelector('.prev').addEventListener('click', function() {
            console.log("Previous button clicked");
            document.querySelector('.carousel-container').scrollBy({
                top: -460,
                behavior: 'smooth'
            });
        });
    });
</script> -->
<style>
    .admin-siderbar .carousel-container {
        width: auto;
        height: 460px;
        overflow-x: auto;
        overflow-y: hidden;
        position: relative;
    }

    .admin-siderbar .carousel-item img {
        margin-top: 40px;
        max-width: 1100px;
        max-height: 445px;
    }
</style>