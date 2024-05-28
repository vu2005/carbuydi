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

function handleRadioChange(event) {
    const selectedOption = event.target.value;
    localStorage.setItem("selectedSortOption", selectedOption);
}

const button = document.querySelector(".btn-function");
const cardList = document.querySelector(".card-list-function");
const changeListText = document.querySelector(".change-list");

// Load the selected option from localStorage on page load
document.addEventListener("DOMContentLoaded", function () {
    const savedSortOption = localStorage.getItem("selectedSortOption");
    if (savedSortOption) {
        changeListText.textContent = savedSortOption;
        const radioInput = document.querySelector(
            `input[value="${savedSortOption}"]`
        );
        if (radioInput) {
            radioInput.checked = true;
        }
    }
});

// Add click event listener to the button
button.addEventListener("click", function () {
    const isHidden = cardList.classList.contains("show");
    if (!isHidden) {
        cardList.classList.add("show");
    } else {
        cardList.classList.remove("show");
    }
});

// Add change event listener to all radio buttons
const radioButtons = document.querySelectorAll(".index-fn input[type='radio']");
radioButtons.forEach((radio) => {
    radio.addEventListener("change", function (event) {
        changeListText.textContent = this.value;
        handleRadioChange(event); // Store selected option in localStorage
        const link = this.closest("a");
        if (link) {
            window.location.href = link.href;
        }
    });
});
