<?php
echo "<div class='products-sp'>"; // Mở thẻ cha products-sp ở đây
$id_to_match = $_GET['id']; // Lấy ID từ URL
$sql = "SELECT * FROM cars WHERE id = $id_to_match"; // Chọn sản phẩm có ID tương tự
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Duyệt qua từng hàng dữ liệu
    while ($row = $result->fetch_assoc()) {
        // Hiển thị sản phẩm
        echo "<div class='products'>";
        echo "<a href='Details.php?id="  . $row['id']. "&" . "Make=" .  $row['make']  . "' class='products-a'>";
        echo "<div class='header-products'>";
        echo "<div class='carousel'>";
        echo "<div><img src='https://carpla.vn/blog/wp-content/uploads/2023/11/xe-5-cho-gam-cao.jpg' alt=''></div>";
        echo "  <div><img src='https://media-cdn-v2.laodong.vn/Storage/NewsPortal/2023/1/30/1142340/Honda-Wr-V.jpeg' alt=''></div>";
        echo "<div><img src='https://skds.1cdn.vn/2023/09/15/phapluatbandoc.mediacdn.vn-218655490646380544-2023-8-18-_anh-4-42-1691976890513-16919768907701205372855-1692343344922-1692343345099540569436.jpg' alt=''></div>";
        echo "</div>";
        echo "</div>";
        echo "</a>";
        echo "<div class='text-products'>";
        echo "<p><i class='bx bxs-hot'></i><i id='hot' class='bx bxs-hot'></i>" . $row["make"] . " " . $row["model"] . "</p>";
        echo "</div>";
        echo "<div class='icon-products'>";
        echo "<ul>";
        echo "<li><i class='bx bx-calendar'></i>" . $row["year"] . "</li>";
        echo "<li><i class='bx bx-gas-pump'></i>" . $row["fuel_type"] . "</li>";
        echo "</ul>";
        echo "<ul>";
        echo "<li><i class='bx bx-line-chart'></i>" . $row["mileage"] . " Km</li>";
        echo "<li><i class='bx bx-git-compare'></i>" . $row["transmission"] . "</li>";
        echo "</ul>";
        echo "</div>";
        echo "<div class='price-products'>";
        echo "<h2>" . $row["price"] . "</h2>";
        echo "</div>";
        echo "<div class='map-products'>";
        echo "<p><i class='bx bx-map'></i>" . $row["location"] . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    // Hiển thị thông báo nếu không tìm thấy sản phẩm
    echo "Không có sản phẩm nào tương tự";
}

// Đóng kết nối
$conn->close();

?>