import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// preview upload image
var images = document.querySelectorAll('.image');
images.forEach(function (element) {
    element.addEventListener("change", function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imagePreview = document.querySelector('.image-preview');
                imagePreview.setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});


// multi select without ctrl
let options = document.querySelectorAll('select[multiple] option');
options.forEach(function (element) {
    element.addEventListener("mousedown", function (e) {
        e.preventDefault();
        this.selected = !this.selected;
        return false;
    });
});
