<div class="pagination">
    <div class="pagination1">
        <a href="#" aria-label="Previous">&laquo;</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#" aria-label="Next">&raquo;</a>
    </div>
</div>
<style>
    .pagination {
        display: flex;
        justify-content: flex-end;
        margin: 70px 0;
    }

    .pagination1>a {
        padding: 10px 15px;
        border-radius: 5px;
        border: 1px solid #808080;
        color: #000;
        font-size: 16px;
        text-decoration: none;
    }

    .pagination1>a:hover {
        border: 1px solid #1a6fb7;
        background: #1a6fb7;
        color: #fff;
    }

    .click {
        background: #1a6fb7;
        color: #fff;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy tất cả các phần tử <a> trong .pagination1
        var paginationLinks = document.querySelectorAll('.pagination1 > a');

        // Duyệt qua mỗi phần tử và thêm sự kiện click
        paginationLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

                // Loại bỏ lớp "click" từ tất cả các phần tử trong .pagination1
                paginationLinks.forEach(function(link) {
                    link.classList.remove('click');
                });

                // Thêm lớp "click" vào phần tử được click
                this.classList.add('click');

                // Thực hiện các hành động khác sau khi click vào phần tử, nếu cần
                // Ví dụ: Điều hướng đến trang mới, tải dữ liệu, vv.
            });
        });
    });
</script>