<div class="function-div">
    <div class="flex-function" onclick="functionClick(this)">
        <div class="fn-sp">
            <img src="../assets/images/fn9.svg" alt="">
            <p style="color: #31406f;">MÀU SẮC</p>
        </div>
        <i class='bx bx-chevron-down' color="color: #3f4047;"></i>
    </div>
    <div class="function-nav">
        <div class="color">
            <div class="box-color">
                <div class="hover-color black selected" name="black" id="black"></div>
                <span class="hidden-text"> Đen</span>
            </div>
            <div class="box-color">
                <div class="hover-color red selected" name="red" id="red"></div>
                <span class="hidden-text"> Đỏ</span>
            </div>
            <div class="box-color">
                <div class="hover-color yellow selected" name="yellow" id="yellow"></div>
                <span class="hidden-text"> Vàng</span>
            </div>
            <div class="box-color">
                <div class="hover-color white selected" name="white" id="white"></div>
                <span class="hidden-text"> Trắng</span>
            </div>
            <div class="box-color">
                <div class="hover-color brown selected" name="brown" id="brown"></div>
                <span class="hidden-text"> Nâu</span>
            </div>
            <div class="box-color">
                <div class="hover-color orange selected" name="orange" id="orange"></div>
                <span class="hidden-text"> Cam</span>
            </div>
            <div class="box-color">
                <div class="hover-color silver selected" name="silver" id="silver"></div>
                <span class="hidden-text"> Bạc</span>
            </div>
            <div class="box-color">
                <div class="hover-color grey selected" name="grey" id="grey"></div>
                <span class="hidden-text"> Xám</span>
            </div>
            <div class="box-color">
                <div class="hover-color yellow copper selected" name="yellow_copper" id="yellow_copper"></div>
                <span class="hidden-text"> Vàng đồng</span>
            </div>
            <div class="box-color">
                <div class="hover-color blue selected" name="blue" id="blue"></div>
                <span class="hidden-text"> Xanh dương</span>
            </div>
            <div class="box-color">
                <div class="hover-color green selected" name="green" id="green"></div>
                <span class="hidden-text"> Xanh lá</span>
            </div>
            <div class="box-color">
                <div class="hover-color Violet selected" name="Violet" id="Violet"></div>
                <span class="hidden-text"> Tím</span>
            </div>
            <div class="box-color">
                <div class="hover-color pink selected" name="pink" id="pink"></div>
                <span class="hidden-text"> Hồng</span>
            </div>
            <div class="box-color">
                <div class="hover-color copper selected" name="copper" id="copper"></div>
                <span class="hidden-text"> Đồng</span>
            </div>
            <div class="box-color">
                <div class="hover-color sand gold selected" name="sand_gold" id="sand_gold"></div>
                <span class="hidden-text"> vàng cát</span>
            </div>
            <div class="box-color">
                <div class="hover-color earthy orange selected" name="earthy_orange" id="earthy_orange"></div>
                <span class="hidden-text"> Cam đất</span>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.hover-color').forEach(item => {
        item.addEventListener('click', function() {
            this.classList.toggle('box-shadow');
            updateSelectedColors();
        });
    });

    function updateSelectedColors() {
        let selectedColors = [];
        document.querySelectorAll('.hover-color.box-shadow').forEach(item => {
            selectedColors.push(item.getAttribute('name'));
        });
        let selectedColorString = selectedColors.join(',');
        window.location.href = "index.php?select=" + selectedColorString;
    }   
</script>