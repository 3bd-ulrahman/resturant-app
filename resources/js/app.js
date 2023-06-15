import './bootstrap';
import axios from 'axios';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// export default axios;

// check html validate on blure
let inputs = document.querySelectorAll('input');
inputs.forEach(function (input) {
    input.addEventListener('blur', function () {
        input.reportValidity();
    });
});

// preview upload image
let images = document.querySelectorAll('.image');
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

// mark input|select as red if it`s validation failed
var errors = document.querySelectorAll('[error]');
errors.forEach(function (el) {
    let input = document.querySelector(`input[name=${el.id}]`);

    if (input) {
        input.classList.add('border-red-600', 'dark:border-red-400');
    }

    let select = document.querySelector(`select[name=${el.id}]`);

    if (select) {
        select.classList.add('border-red-600', 'dark:border-red-400');
    }
});
