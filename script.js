let menu = document.querySelector('#menu');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('active');
};

window.onscroll = () => {
    menu.classList.remove('bx-x');
    navbar.classList.remove('active');
};
const typed = new Typed('.deco', {
    strings: ['Be Strong','Be Grant','Be Young','Be Happy'],
    typeSpeed: 60,
    backSpeed:60,
    backDelay:1000,
    loop:true

  });