const imageInput = document.getElementById("imageInput");
const imagePreview = document.getElementById("imagePreview");

imageInput.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            imagePreview.innerHTML = `<img src="${this.result}" alt="Preview Image">`;
        });

        reader.readAsDataURL(file);
    }
});
