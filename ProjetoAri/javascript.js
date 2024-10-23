// Alternar retração da sidebar
document.querySelector('.toggle-btn').addEventListener('click', function () {
    document.querySelector('.sidebar').classList.toggle('retraida');
    document.querySelector('.main-content').classList.toggle('retraida');
});

// Alternar contraste
let currentContrast = 0;
const contrastButton = document.getElementById('toggle-contrast');

contrastButton.addEventListener('click', () => {
    currentContrast = (currentContrast + 1) % 3; // Alterna entre 3 modos de contraste
    document.body.className = ''; // Reseta as classes do body

    if (currentContrast === 1) {
        document.body.classList.add('high-contrast'); // Ativa alto contraste
    } else if (currentContrast === 2) {
        document.body.classList.add('inverted-contrast'); // Ativa contraste invertido
    }
});

/* Formulário de contato */
function showTab(event, tabName) {
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach((tab) => {
        tab.style.display = 'none';
    });

    const tabs = document.querySelectorAll('.tab');
    tabs.forEach((tab) => {
        tab.classList.remove('active');
    });

    document.getElementById(tabName).style.display = 'block';
    event.currentTarget.classList.add('active');
}

// Mostrar a aba de "Canais de Atendimento" por padrão
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('defaultTab').click();
});

/* Carrossel */
const carousel = document.querySelector('.carousel');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const cardWidth = 300; // Largura do card
const visibleCards = 3; // Número de cards visíveis

nextBtn.addEventListener('click', () => {
    const maxScrollLeft = carousel.scrollWidth - carousel.clientWidth;
    carousel.scrollBy({ left: cardWidth * visibleCards, behavior: 'smooth' });
});

prevBtn.addEventListener('click', () => {
    carousel.scrollBy({ left: -cardWidth * visibleCards, behavior: 'smooth' });
});
