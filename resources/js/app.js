import './bootstrap';

import Alpine from 'alpinejs';
import { drop, functionsIn } from 'lodash';

window.Alpine = Alpine;

Alpine.start();

// Theme toggle button
window.toggle = function() {
    const tog = document.getElementById("toggler");

    tog.style.translate = ("25px");
};


// Hero Section Slideshow!
const imgs = document.querySelectorAll(".slideshow img");
const hero_text = document.getElementById("hero_text");

let currentIndex = 0;
let time = 10000;

const defClass = (startPos, index) => {
    for (let i = startPos; i < imgs.length; i++) {
        imgs[i].style.display = "none";
    }

    imgs[index].style.display = "block";
    if (window.innerWidth < 1240){
        imgs[index].style.width = hero_text.style.width;
        imgs[index].style.height = hero_text.style.height;
    }else{
        imgs[index].style.width = "528px";
        imgs[index].style.height = "443px";
    }
};

defClass(1, 0);

const startAutoSlide = () => {
    setInterval(() => {
        currentIndex >= imgs.length-1 ? currentIndex = 0 : currentIndex++;
        defClass(0, currentIndex);
    }, time);
};

startAutoSlide();

