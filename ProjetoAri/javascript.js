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
/* Carrossel Genérico */
const carousel = document.querySelector('.carousel'); // Carrossel genérico
const prevBtn = document.querySelector('.prev-btn'); // Botão anterior genérico
const nextBtn = document.querySelector('.next-btn'); // Botão próximo genérico
const cardWidth = 300; // Largura do card genérico
const visibleCards = 2; // Número de cards visíveis no carrossel genérico

if (nextBtn && prevBtn && carousel) {
    nextBtn.addEventListener('click', () => {
        carousel.scrollBy({ left: cardWidth * visibleCards, behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', () => {
        carousel.scrollBy({ left: -cardWidth * visibleCards, behavior: 'smooth' });
    });
}

/* Carrossel de Delegacias Especializadas 1 */
const carouselEspecializadas1 = document.querySelector('.especializadas-carousel-inner'); // Carrossel especializado 1
const prevBtnEspecializadas1 = document.querySelector('.especializadas-prev-btn-1'); // Botão anterior especializado 1
const nextBtnEspecializadas1 = document.querySelector('.delegacias-next-btn-1'); // Botão próximo especializado 1
const cardWidthEspecializadas1 = 300; // Largura de cada card no carrossel especializado 1
const visibleCardsEspecializadas1 = 2; // Número de cards visíveis no carrossel especializado 1

// Verifique se todos os elementos estão presentes no DOM
if (nextBtnEspecializadas1 && prevBtnEspecializadas1 && carouselEspecializadas1) {
    // Evento para o botão "next" (próximo) do carrossel 1
    nextBtnEspecializadas1.addEventListener('click', () => {
        const maxScrollLeft = carouselEspecializadas1.scrollWidth - carouselEspecializadas1.clientWidth;
        const scrollAmount = cardWidthEspecializadas1 * visibleCardsEspecializadas1;
        const currentScrollPosition = carouselEspecializadas1.scrollLeft;

        // Garante que não ultrapasse o máximo de rolagem
        if (currentScrollPosition + scrollAmount <= maxScrollLeft) {
            carouselEspecializadas1.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        } else {
            carouselEspecializadas1.scrollTo({ left: maxScrollLeft, behavior: 'smooth' });
        }
    });

    // Evento para o botão "prev" (anterior) do carrossel 1
    prevBtnEspecializadas1.addEventListener('click', () => {
        const scrollAmount = cardWidthEspecializadas1 * visibleCardsEspecializadas1;
        const currentScrollPosition = carouselEspecializadas1.scrollLeft;

        // Garante que não role mais que o mínimo
        if (currentScrollPosition - scrollAmount >= 0) {
            carouselEspecializadas1.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        } else {
            carouselEspecializadas1.scrollTo({ left: 0, behavior: 'smooth' });
        }
    });
}
/* Carrossel de Delegacias Especializadas 2 */
const carouselEspecializadas2 = document.querySelector('.especializadas-carousel-inner-2'); // Carrossel especializado 2
const prevBtnEspecializadas2 = document.querySelector('.especializadas-prev-btn-2'); // Botão anterior especializado 2
const nextBtnEspecializadas2 = document.querySelector('.delegacias-next-btn-2'); // Botão próximo especializado 2
const cardWidthEspecializadas2 = 300; // Largura de cada card no carrossel especializado 2
const visibleCardsEspecializadas2 = 2; // Número de cards visíveis no carrossel especializado 2

// Verifique se todos os elementos estão presentes no DOM
if (nextBtnEspecializadas2 && prevBtnEspecializadas2 && carouselEspecializadas2) {
    // Evento para o botão "next" (próximo) do carrossel 2
    nextBtnEspecializadas2.addEventListener('click', () => {
        const maxScrollLeft = carouselEspecializadas2.scrollWidth - carouselEspecializadas2.clientWidth;
        const scrollAmount = cardWidthEspecializadas2 * visibleCardsEspecializadas2;
        const currentScrollPosition = carouselEspecializadas2.scrollLeft;

        // Garante que não ultrapasse o máximo de rolagem
        if (currentScrollPosition + scrollAmount <= maxScrollLeft) {
            carouselEspecializadas2.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        } else {
            carouselEspecializadas2.scrollTo({ left: maxScrollLeft, behavior: 'smooth' });
        }
    });

    // Evento para o botão "prev" (anterior) do carrossel 2
    prevBtnEspecializadas2.addEventListener('click', () => {
        const scrollAmount = cardWidthEspecializadas2 * visibleCardsEspecializadas2;
        const currentScrollPosition = carouselEspecializadas2.scrollLeft;

        // Garante que não role mais que o mínimo
        if (currentScrollPosition - scrollAmount >= 0) {
            carouselEspecializadas2.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        } else {
            carouselEspecializadas2.scrollTo({ left: 0, behavior: 'smooth' });
        }
    });
}

