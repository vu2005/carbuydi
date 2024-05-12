
<?php
require_once('../config/config.php');

// Nếu biến được truyền vào từ form
if (isset($_POST['search_term']) && !empty($_POST['search_term'])) {
    $searchTerm = $_POST['search_term'];
    // Câu lệnh SQL để lọc dữ liệu theo hãng xe hoặc tên
    $sql = "SELECT * FROM cars WHERE make LIKE '%$searchTerm%' OR model LIKE '%$searchTerm%'";
    $sql = "SELECT * FROM cars WHERE make = '%$term%' OR make = '%$term%'";
    // Thực thi câu lệnh SQL và xử lý kết quả
    $result = mysqli_query($connection, $sql);
    if ($result) {
        // Xử lý kết quả và hiển thị dữ liệu
    } else {
        echo "Lỗi truy vấn: " . mysqli_error($connection);
    }
}
?>
<div class="function-div">
    <div class="flex-function" onclick="functionClick(this)">
        <div class="fn-sp">
            <img src="../assets/images/fn1.svg" alt="">
            <p style="color: #31406f;">HÃNG XE, DÒNG XE</p>
        </div>
        <i class='bx bx-chevron-down' style="color: #3f4047;"></i>
    </div>
    <div class="function-nav">
        <div class="function-search" tabindex="0">
            <div class="fn-box">
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Tìm kiếm theo hãng xe">
            </div>
        </div>
        <div class="function-box">
            <ul>
                <li>
                    <input type="checkbox" name="Toyota" id="Toyota" value="">
                    <p class="location-make">Toyota</p>
                    <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                </li>
                <div class="function-box1">
                    <ul>
                        <li>
                            <input type="checkbox" name="Camry" id="Camry">
                            <p>Camry</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Corolla" id="Corolla">
                            <p>Corolla</p>
                        </li>
                        <li>
                            <input type="checkbox" name="RAV4" id="RAV4">
                            <p>RAV4</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Highlander" id="Highlander">
                            <p>Highlander</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Tacoma" id="Tacoma">
                            <p>Tacoma</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Prius" id="Prius">
                            <p>Prius</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Sienna" id="Sienna">
                            <p>Sienna</p>
                        </li>
                        <li>
                            <input type="checkbox" name="4Runner" id="4Runner">
                            <p>4Runner</p>
                        </li>
                    </ul>
                </div>
            </ul>
            <ul>
                <li>
                    <input type="checkbox" name="Honda" id="Honda" value="">
                    <p class="location-make">Honda</p>
                    <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                </li>
                <div class="function-box1">
                    <ul>
                        <li>
                            <input type="checkbox" name="Civic" id="Civic">
                            <p>Civic</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Accord" id="Accord">
                            <p>Accord</p>
                        </li>
                        <li>
                            <input type="checkbox" name="CR-V" id="CR-V">
                            <p>CR-V</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Pilot" id="Pilot">
                            <p>Pilot</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Odyssey" id="Odyssey">
                            <p>Odyssey</p>
                        </li>
                        <li>
                            <input type="checkbox" name="HR-V" id="HR-V">
                            <p>HR-V</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Fit" id="Fit">
                            <p>Fit</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Ridgeline" id="Ridgeline">
                            <p>Ridgeline</p>
                        </li>
                    </ul>
                </div>
            </ul>
            <ul>
                <li>
                    <input type="checkbox" name="Mercedes-Benz" id="Mercedes-Benz" value="">
                    <p class="location-make">Mercedes-Benz</p>
                    <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                </li>
                <div class="function-box1">
                    <ul>
                        <li>
                            <input type="checkbox" name="C-Class" id="C-Class">
                            <p>C-Class</p>
                        </li>
                        <li>
                            <input type="checkbox" name="C-Class" id="C-Class">
                            <p>E-Class</p>
                        </li>
                        <li>
                            <input type="checkbox" name="S-Class" id="S-Class">
                            <p>S-Class</p>
                        </li>
                        <li>
                            <input type="checkbox" name="GLC-Class" id="GLC-Class">
                            <p>GLC-Class</p>
                        </li>
                        <li>
                            <input type="checkbox" name="GLE-Class" id="GLE-Class">
                            <p>GLE-Class</p>
                        </li>
                        <li>
                            <input type="checkbox" name="GLS-Class" id="GLS-Class">
                            <p>GLS-Class</p>
                        </li>
                        <li>
                            <input type="checkbox" name="A-Class" id="A-Class">
                            <p>A-Class</p>
                        </li>
                        <li>
                            <input type="checkbox" name="CLA-Class" id="CLA-Class">
                            <p>CLA-Class</p>
                        </li>
                    </ul>
                </div>
            </ul>
            <ul>
                <li>
                    <input type="checkbox" name="Ford" id="Ford" value="">
                    <p class="location-make">Ford</p>
                    <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                </li>
                <div class="function-box1">
                    <ul>
                        <li>
                            <input type="checkbox" name="F-150" id="F-150">
                            <p>F-150</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Escape" id="Escape">
                            <p>Escape</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Explorer" id="Explorer">
                            <p>Explorer</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Fusion" id="Fusion">
                            <p>Fusion</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Mustang" id="Mustang">
                            <p>Mustang</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Edge" id="Edge">
                            <p>Edge</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Ranger" id="Ranger">
                            <p>Ranger</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Expedition" id="Expedition">
                            <p>Expedition</p>
                        </li>
                    </ul>
                </div>
            </ul>
            <ul>
                <li>
                    <input type="checkbox" name="BMW" id="BMW" value="">
                    <p class="location-make">BMW</p>
                    <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                </li>
                <div class="function-box1">
                    <ul>
                        <li>
                            <input type="checkbox" name="3_Series" id="3_Series">
                            <p>3 Series</p>
                        </li>
                        <li>
                            <input type="checkbox" name="5_Series" id="5_Series">
                            <p>5 Series</p>
                        </li>
                        <li>
                            <input type="checkbox" name="X3" id="X3">
                            <p>X3</p>
                        </li>
                        <li>
                            <input type="checkbox" name="X5" id="X5">
                            <p>X5</p>
                        </li>
                        <li>
                            <input type="checkbox" name="7_Series" id="7_Series">
                            <p>7 Series</p>
                        </li>
                        <li>
                            <input type="checkbox" name="X1" id="X1">
                            <p>X1</p>
                        </li>
                        <li>
                            <input type="checkbox" name="X7" id="X7">
                            <p>X7</p>
                        </li>
                        <li>
                            <input type="checkbox" name="2_Series" id="2_Series">
                            <p>2 Series</p>
                        </li>
                    </ul>
                </div>
            </ul>
            <ul>
                <li>
                    <input type="checkbox" name="Chevrolet" id="Chevrolet" value="">
                    <p class="location-make">Chevrolet</p>
                    <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                </li>
                <div class="function-box1">
                    <ul>
                        <li>
                            <input type="checkbox" name="Silverado" id="Silverado">
                            <p>Silverado</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Equinox" id="Equinox">
                            <p>Equinox</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Traverse" id="Traverse">
                            <p>Traverse</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Malibu" id="Malibu">
                            <p>Malibu</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Tahoe" id="Tahoe">
                            <p>Tahoe</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Camaro" id="Camaro">
                            <p>Camaro</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Suburban" id="Suburban">
                            <p>Suburban</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Colorado" id="Colorado">
                            <p>Colorado</p>
                        </li>
                    </ul>
                </div>
            </ul>
            <ul>
                <li>
                    <input type="checkbox" name="Hyundai" id="Hyundai" value="">
                    <p class="location-make">Hyundai</p>
                    <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                </li>
                <div class="function-box1">
                    <ul>
                        <li>
                            <input type="checkbox" name="Hyundai_Elantra" id="Hyundai_Elantra">
                            <p>Elantra</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Hyundai_Sonata" id="Hyundai_Sonata">
                            <p>Sonata</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Hyundai_SantaFe" id="Hyundai_SantaFe">
                            <p>Santa Fe</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Hyundai_Tucson" id="Hyundai_Tucson">
                            <p>Tucson</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Hyundai_Kona" id="Hyundai_Kona">
                            <p>Kona</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Hyundai_Palisade" id="Hyundai_Palisade">
                            <p>Palisade</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Hyundai_Venue" id="Hyundai_Venue">
                            <p>Venue</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Hyundai_Accent" id="Hyundai_Accent">
                            <p>Accent</p>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox" name="Kia_Optima" id="Kia_Optima">
                            <p>Optima</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Kia_Sorento" id="Kia_Sorento">
                            <p>Sorento</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Kia_Sportage" id="Kia_Sportage">
                            <p>Sportage</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Kia_Forte" id="Kia_Forte">
                            <p>Forte</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Kia_Soul" id="Kia_Soul">
                            <p>Soul</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Kia_Telluride" id="Kia_Telluride">
                            <p>Telluride</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Kia_Rio" id="Kia_Rio">
                            <p>Rio</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Kia_Stinger" id="Kia_Stinger">
                            <p>Stinger</p>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox" name="Mazda_Mazda3" id="Mazda_Mazda3">
                            <p>Mazda3</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Mazda_Mazda6" id="Mazda_Mazda6">
                            <p>Mazda6</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Mazda_CX5" id="Mazda_CX5">
                            <p>CX-5</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Mazda_CX9" id="Mazda_CX9">
                            <p>CX-9</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Mazda_MX5Miata" id="Mazda_MX5Miata">
                            <p>MX-5 Miata</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Mazda_CX30" id="Mazda_CX30">
                            <p>CX-30</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Mazda_CX3" id="Mazda_CX3">
                            <p>CX-3</p>
                        </li>
                        <li>
                            <input type="checkbox" name="Mazda_Mazda5" id="Mazda_Mazda5">
                            <p>Mazda5</p>
                        </li>
                    </ul>
                </div>
            </ul>
            <ul>
                <li>
                    <input type="checkbox" name="VinFast" id="VinFast" value="">
                    <p class="location-make">VinFast</p>
                    <i class='bx bx-chevron-down' style="color: #3f4047; cursor: pointer; font-size: 22px;" onclick="functionClick1(this)"></i>
                </li>
                <div class="function-box1">
                    <ul>
                        <li>
                            <input type="checkbox" name="VinFast_LuxA2.0" id="VinFast_LuxA2.0">
                            <p>Lux A2.0</p>
                        </li>
                        <li>
                            <input type="checkbox" name="VinFast_LuxSA2.0" id="VinFast_LuxSA2.0">
                            <p>Lux SA2.0</p>
                        </li>
                        <li>
                            <input type="checkbox" name="VinFast_Fadil" id="VinFast_Fadil">
                            <p>Fadil</p>
                        </li>
                        <li>
                            <input type="checkbox" name="VinFast_President" id="VinFast_President">
                            <p>President</p>
                        </li>
                        <li>
                            <input type="checkbox" name="VinFast_LUXV8" id="VinFast_LUXV8">
                            <p>LUX V8</p>
                        </li>
                        <li>
                            <input type="checkbox" name="VinFast_LUXAS2.0" id="VinFast_LUXAS2.0">
                            <p>LUX AS2.0</p>
                        </li>
                        <li>
                            <input type="checkbox" name="VinFast_LUXSA2.0" id="VinFast_LUXSA2.0">
                            <p>LUX SA2.0</p>
                        </li>
                        <li>
                            <input type="checkbox" name="VinFast_LUXA2.0Sedan" id="VinFast_LUXA2.0Sedan">
                            <p>LUX A2.0 Sedan</p>
                        </li>
                    </ul>
                </div>
            </ul>
            <ul>
                <li>
                    <button onclick="sortSelectedMakes()">Sắp xếp theo hãng xe đã chọn</button>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    // Hàm chuyển đổi hãng xe đã chọn thành chuỗi và load lại trang
    function sortSelectedMakes() {
        var selectedMakes = [];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(function(checkbox) {
            selectedMakes.push(checkbox.name);
        });
        var selectedMakesString = selectedMakes.join(",");
        window.location.href = "index.php?select=" + selectedMakesString;
    }
</script>