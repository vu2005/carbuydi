let elToShow = document.querySelectorAll(".show-on-scroll");

let isElInViewPort = (el) => {
    let rect = el.getBoundingClientRect();
    // some browsers support innerHeight, others support documentElement.clientHeight
    let viewHeight =
        window.innerHeight || document.documentElement.clientHeight;

    return (
        (rect.top <= 0 && rect.bottom >= 0) ||
        (rect.bottom >= viewHeight && rect.top <= viewHeight) ||
        (rect.top >= 0 && rect.bottom <= viewHeight)
    );
};

function loop() {
    elToShow.forEach((item) => {
        if (isElInViewPort(item)) {
            item.classList.add("start");
        } else {
            item.classList.remove("start");
        }
    });
}

window.onscroll = loop;

loop();
document.addEventListener("DOMContentLoaded", function () {
    // Lắng nghe sự kiện click cho span "Đăng ký ngay"
    document
        .getElementById("registerBtn")
        .addEventListener("click", function () {
            // Lấy phần tử modal
            var modal = document.querySelector(".modal");
            // Thêm lớp "show" để hiển thị modal
            modal.classList.add("show");
        });

    // Lắng nghe sự kiện click cho span "Quên mật khẩu"
    document.getElementById("PassGet").addEventListener("click", function () {
        // Lấy phần tử modal
        var pass = document.querySelector(".pass");
        // Thêm lớp "show" để hiển thị modal
        pass.classList.add("show");
    });

    // Lắng nghe sự kiện click cho nút đóng modal
    document.querySelectorAll(".modal__header i").forEach(function (icon) {
        icon.addEventListener("click", function () {
            // Lấy phần tử modal
            var modal = this.closest(".modal");
            // Loại bỏ lớp "show" để ẩn modal
            modal.classList.remove("show");
        });
    });

    // Lắng nghe sự kiện click cho phần nền mờ của modal
    document.querySelectorAll(".modal").forEach(function (modal) {
        modal.addEventListener("click", function (event) {
            // Kiểm tra xem phần tử được click có phải là phần nền mờ không
            if (event.target.classList.contains("modal")) {
                // Nếu là phần nền mờ, ẩn modal
                event.target.classList.remove("show");
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const openModalBtn = document.querySelector(".open-modal-btn");
    const modal = document.querySelector(".modal");

    openModalBtn.addEventListener("click", function () {
        modal.classList.remove("hide");
    });

    // Đóng modal khi người dùng nhấn vào nút đóng hoặc bên ngoài modal
    const closeModalBtn = document.querySelector(".modal__header i");
    modal.addEventListener("click", function (event) {
        if (event.target === modal || event.target === closeModalBtn) {
            modal.classList.add("hide");
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const callSellerBtn = document.getElementById("callSeller");
    const phoneNumber = document.getElementById("phoneNumber");

    callSellerBtn.addEventListener("click", function () {
        // Thay đổi văn bản của nút thành số điện thoại
        callSellerBtn.textContent = phoneNumber.textContent;
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggleBtn");
    const hiddenText = document.getElementById("hiddenText");

    toggleBtn.addEventListener("click", function () {
        if (hiddenText.classList.contains("hidden")) {
            hiddenText.classList.remove("hidden");
            toggleBtn.innerHTML = "Thu gọn <i class='bx bxs-chevron-up'></i>";
        } else {
            hiddenText.classList.add("hidden");
            toggleBtn.innerHTML =
                "Xem thêm <i class='bx bxs-chevron-down'></i>";
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    var toggleBtn = document.getElementById("toggleContentBtn"); // Changed the ID
    var content = document.querySelector(".hidden"); // Corrected selector

    toggleBtn.addEventListener("click", function () {
        if (content.classList.contains("hidden")) {
            content.classList.remove("hidden");
            toggleBtn.innerHTML = "Thu gọn <i class='bx bxs-chevron-up'></i>";
        } else {
            content.classList.add("hidden");
            toggleBtn.innerHTML =
                "Xem thêm <i class='bx bxs-chevron-down'></i>";
        }
    });
});
function functionClick(element) {
    var functionNav = element.nextElementSibling;
    toggleDisplay(functionNav);
}

function functionClick1(element) {
    var functionBox = element.parentElement.nextElementSibling;
    toggleDisplay(functionBox);
}

function toggleDisplay(element) {
    if (window.getComputedStyle(element).display === "block") {
        element.style.display = "none";
    } else {
        element.style.display = "block";
    }
}
document.addEventListener("DOMContentLoaded", function () {
    const searchInputs = document.querySelectorAll(
        '.function-search input[type="text"]'
    );

    searchInputs.forEach(function (input) {
        input.addEventListener("input", function (event) {
            const searchText = event.target.value.trim().toLowerCase();
            const functionBox = input
                .closest(".function-nav")
                .querySelector(".function-box");

            const locations = functionBox.querySelectorAll(
                "p.location-make, p.location-address"
            );

            locations.forEach(function (location) {
                const listItem = location.closest("li");
                if (
                    location.textContent
                        .trim()
                        .toLowerCase()
                        .includes(searchText)
                ) {
                    listItem.style.display = ""; // Show matching item
                } else {
                    listItem.style.display = "none"; // Hide non-matching item
                }
            });
        });
    });
});
document.addEventListener("DOMContentLoaded", function () {
    // Lấy ra input radio của tùy chọn "Liên quan nhất"
    const defaultOption = document.querySelector('.index-fn:first-child input[type="radio"]');

    // Đặt thuộc tính checked cho input radio mặc định
    defaultOption.checked = true;
});

// Lấy phần tử nút và danh sách tùy chọn
const button = document.querySelector(".btn-function");
const cardList = document.querySelector(".card-list-function");

// Thêm sự kiện click cho nút
button.addEventListener("click", function () {
    // Kiểm tra trạng thái hiện tại của danh sách tùy chọn
    const isHidden = cardList.classList.contains("show");

    // Nếu đang ẩn, hiển thị danh sách và kích hoạt hiệu ứng slide từ phải sang trái
    // Nếu đang hiển thị, ẩn danh sách và kích hoạt hiệu ứng slide từ trái sang phải
    if (!isHidden) {
        cardList.classList.add("show");
    } else {
        cardList.classList.remove("show");
    }
});

// Lấy tất cả các input radio trong danh sách tùy chọn
const radioOptions = document.querySelectorAll('.index-fn input[type="radio"]');

// Lặp qua từng input radio và thêm sự kiện 'change' cho mỗi input
radioOptions.forEach(function (option) {
    option.addEventListener("change", function () {
        // Lấy ra phần tử span chứa nội dung hiện tại của thẻ "Sắp xếp"
        const sortText = document.querySelector(".btn-function span");

        // Lấy ra nội dung của tùy chọn đã chọn và gán cho thẻ "Sắp xếp"
        const selectedOptionText = this.nextElementSibling.textContent;
        sortText.textContent = selectedOptionText;

        // Ẩn danh sách tùy chọn sau khi chọn xong
        cardList.classList.remove("show");
    });
});