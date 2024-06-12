// Adicionando animação ao background
const bg = document.getElementById('bg');

let angle = 0;

function animateBackground() {
    angle += 1;
    bg.style.setProperty('--angle', angle + 'deg');
    requestAnimationFrame(animateBackground);
}

requestAnimationFrame(animateBackground);
