<div class="wallpaper">
    <div class="container">
        <div class="card-img">
            <img style="margin-right: 10px;" src="../assets/images/card-title1.png" alt="" />
        </div>
        <div class="card-img">
            <img style="margin-right: 10px;" src="../assets/images/card-title2.png" alt="" />
        </div>
        <div class="card-img">
            <img style="margin-right: 10px;" src="../assets/images/card-title3.png" alt="" />
        </div>
        <div class="card-img">
            <img style="margin-right: 10px;" src="../assets/images/card-title4.png" alt="" />
        </div>
        <div class="card-img">
            <img src="../assets/images/card-title5.png" alt="" />
        </div>
    </div>
    <div class="event-button">
        <span class="control" id="prev">
            <i class='bx bxs-chevron-left'></i>
        </span>
        <span class="control" id="next">
            <i class='bx bxs-chevron-right'></i>
        </span>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('next').addEventListener('click', function() {
            document.querySelector('.container').scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });

        document.getElementById('prev').addEventListener('click', function() {
            document.querySelector('.container').scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });
    });
</script>