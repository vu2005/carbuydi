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
<div class="list-tags">
    <div class="body-input">
        <div class="icon-search"><i class='bx bx-search'></i></div>
        <input type="text" id="inputItems" placeholder="Tìm kiếm xe theo hãng xe, Dòng xe hoặc từ khóa">
    </div>
    <button class="search-btn" style="display: none;" value="submit">Tìm</button>
    <div class="list-search">
        <ul class="list-tag" id="tags"></ul>
    </div>
</div>
<button class="btn-removeAll">BỎ lỌC</button>
<script>
    const ul = document.getElementById("tags"),
        input = document.getElementById("inputItems"),
        searchBtn = document.querySelector(".search-btn"),
        removeAllBtn = document.querySelector(".btn-removeAll");

    let tags = [];

    function createTag(tag) {
        const liTag = document.createElement("li");
        liTag.textContent = tag;

        const removeIcon = document.createElement("i");
        removeIcon.classList.add("bx", "bx-x");
        removeIcon.onclick = function() {
            removeTag(liTag);
        };
        liTag.appendChild(removeIcon);
        ul.appendChild(liTag);
        toggleSearchButton(); // Gọi hàm để kiểm tra và hiển thị nút Tìm
    }

    function removeTag(tagElement) {
        const index = Array.from(ul.children).indexOf(tagElement);
        tags.splice(index, 1);
        tagElement.remove();
        toggleSearchButton(); // Gọi hàm để kiểm tra và hiển thị nút Tìm
    }

    function toggleSearchButton() {
        // Hiển thị nút Tìm khi có ít nhất một tag được thêm vào
        if (tags.length > 0) {
            searchBtn.style.display = "inline-block";
            searchBtn.classList.add("active");
        } else {
            searchBtn.style.display = "none";
            searchBtn.classList.remove("active");
        }
    }

    function addTag(e) {
        if (e.key == "Enter") {
            const tag = e.target.value.trim();
            if (tag !== "" && !tags.includes(tag)) {
                tags.push(tag);
                createTag(tag);
                e.target.value = ""; // Xóa nội dung sau khi thêm tag
            }
        } else {
            // Nếu không phải phím Enter, kiểm tra trường nhập liệu để ẩn hoặc hiển thị nút Tìm
            toggleSearchButton();
        }
    }

    input.addEventListener("keyup", addTag);

    removeAllBtn.addEventListener("click", () => {
        tags = [];
        ul.innerHTML = ""; // Xóa tất cả các tag
        toggleSearchButton(); // Gọi hàm để kiểm tra và hiển thị nút Tìm
    });

    searchBtn.addEventListener("click", () => {
        let searchResult = tags.join(",");
        // Chuyển hướng sang trang search_results.php và truyền biến searchResult
        window.location.href = "index.php?select=" + searchResult;
    });
</script>