<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carbuydi";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ cơ sở dữ liệu
$sql = "SELECT * FROM contact";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews</title>
    <!-- Các file CSS và JavaScript -->
</head>

<body>
    <div class="container">
        <h2 style="margin-bottom: 30px;">FedsBacks List</h2>
        <table class="table-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Date and Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kiểm tra xem có dữ liệu trả về không
                if ($result->num_rows > 0) {
                    // Duyệt qua từng hàng dữ liệu
                    while ($row = $result->fetch_assoc()) {
                        // Hiển thị thông tin admin trong từng hàng của bảng
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";

                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["message"] . "</td>";
                        echo "<td>" . $row["date_time"] . "</td>";

                        echo "<td>";
                        echo "<a href='index.php?quanly=FedsBacks-delete&id=" . $row["id"] . "' class='btn-delete'>Xóa</a>";
                        echo "</td>";

                        echo "</tr>";



                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Không có admin trong cơ sở dữ liệu!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>