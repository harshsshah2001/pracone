console.log('Admin script loaded');

document.addEventListener('DOMContentLoaded', function(){
    // simple interactivity placeholder
    const cards = document.querySelectorAll('.card');
    cards.forEach(c=> c.addEventListener('click', ()=> c.classList.toggle('highlight')));
});
