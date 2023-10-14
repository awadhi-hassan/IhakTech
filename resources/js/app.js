import './bootstrap';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

window.Alpine = Alpine;
Alpine.plugin(focus);
Alpine.start();

// Dark and Light Mode Toggle
const lightIcons = document.querySelectorAll('#lightmode');
const darkIcons = document.querySelectorAll('#darkmode');
const userTheme = localStorage.getItem('theme');

const themeToggle = () => {
    lightIcons.forEach(icon => icon.classList.toggle('display-none'));
    darkIcons.forEach(icon => icon.classList.toggle('display-none'));
};

const themeCheck = () => {
    if (userTheme === 'dark') {
        document.documentElement.classList.add('dark');
        darkIcons.forEach(icon => icon.classList.add('display-none'));
    } else {
        lightIcons.forEach(icon => icon.classList.add('display-none'));
    }
};

const themeSwitch = () => {
    if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
    } else {
        document.documentElement.classList.add('dark');
    }
    themeToggle();
};

lightIcons.forEach(icon => {
    icon.addEventListener('click', () => {
        localStorage.setItem('theme', 'light');
        particlesJS('particles-js', lightModeConfig);
        themeSwitch();
    });
});

darkIcons.forEach(icon => {
    icon.addEventListener('click', () => {
        localStorage.setItem('theme', 'dark');
        particlesJS('particles-js', darkModeConfig);
        themeSwitch();
    });
});

themeCheck();

// Services Dropdown
const dropdown = document.getElementById('services');
const dropdownIcon = document.getElementById('dropdown_icon');

dropdown.addEventListener('click', () => {
    dropdownIcon.style.transform = dropdownIcon.style.transform === 'rotate(180deg)' ? 'rotate(0deg)' : 'rotate(180deg)';
});

// Responsive Services Dropdown
const rs = document.getElementById('responsive_services');
const expand_icons = document.querySelectorAll('#profile_dropdown_icon');

rs.addEventListener('click', () => {
    expand_icons[1].style.transform = expand_icons[1].style.transform === 'rotate(180deg)' ? 'rotate(0deg)' : 'rotate(180deg)';
    if (rs.classList.contains('overflow-hidden')) {
        rs.classList.remove('h-8', 'overflow-hidden');
        rs.children[0].classList.add('font-bold');
    } else {
        rs.classList.add('h-8', 'overflow-hidden');
        rs.children[0].classList.remove('font-bold');
    }
});

// Responsive Profile Dropdown
const rp = document.getElementById('profile_dropdown');

rp.addEventListener('click', () => {
    expand_icons[0].style.transform = expand_icons[0].style.transform === 'rotate(180deg)' ? 'rotate(0deg)' : 'rotate(180deg)';
    if (rp.classList.contains('overflow-hidden')) {
        rp.classList.remove('h-16', 'overflow-hidden');
    } else {
        rp.classList.add('h-16', 'overflow-hidden');
    }
});

// Slideshow
let slideIndex = 0;

function showSlides() {
    const slides = document.querySelectorAll(".slide");
    const mSlides = document.querySelectorAll(".mslide");
    const desc = document.querySelectorAll('#desc');
    const textElements = document.querySelectorAll('#text');
    const gs = document.querySelectorAll('.gs');

    for (let i = 0; i < slides.length; i++) {
        if (slides[i].classList.contains('h-500')) {
            slides[i].classList.add('sm:hidden');
            desc.forEach((description) => {
                description.classList.add('sm:hidden');
            });
            textElements.forEach((te) => {
                te.classList.add('hidden');
            });
        }

        gs.forEach((button) => {
            button.classList.add('hidden');
        });

        desc.forEach((description) => {
            description.classList.add('hidden');
        });
        mSlides[i].classList.add('hidden');
    }

    slideIndex++;

    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    if (slides[slideIndex - 1].classList.contains('h-500')) {
        slides[slideIndex - 1].classList.remove('sm:hidden');
        var src = slides[slideIndex - 1].src;
        let a = src.split('slideshow/')[1];
        desc.forEach((description) => {
            description.innerHTML = a.replace('.png', ' ');
        });
        desc[slideIndex - 1].classList.remove('sm:hidden');
    }
    desc[slideIndex - 1].classList.remove('hidden');
    mSlides[slideIndex - 1].classList.remove('hidden');
    gs[slideIndex - 1].classList.remove('hidden');

    textElements[slideIndex - 1].classList.remove('hidden');

    const text = textElements[slideIndex - 1].textContent;

    textElements[slideIndex - 1].textContent = '';

    let charIndex = 0;

    function typeText() {
        if (charIndex < text.length) {
            textElements[slideIndex - 1].textContent += text.charAt(charIndex);
            charIndex++;
            setTimeout(typeText, 10);
        }
    }

    typeText();

    setTimeout(showSlides, 10000);
}

showSlides();
