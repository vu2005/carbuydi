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

const modal = document.querySelector(".modal");
const openModalBtn = document.querySelector(".open-modal-btn");
const iconCloseModal = document.querySelector(".modal__header i");

function toggleModal() {
    modal.classList.toggle("hide");
}

openModalBtn.addEventListener("click", toggleModal);
iconCloseModal.addEventListener("click", toggleModal);

modal.addEventListener("click", (e) => {
    if (e.target == e.currentTarget) toggleModal();
});
function showFunction() {
    var cardList = document.querySelector(".card-list-function");
    cardList.classList.toggle("show"); // Thêm hoặc xóa lớp 'show'
}
function closeCardList() {
    var cardList = document.querySelector(".card-list-function");
    cardList.classList.remove("show");
}
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
